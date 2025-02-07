extends Node

const FeuScene = preload("res://surface.tscn")  # Charge la scène du feu
@onready var main = $"."  # Référence directe à la scène principale

var commandes_data = []  # Liste des commandes disponibles
var commandes_en_cours = []  # Liste des commandes en cours
var commande_en_cours = false  # Variable pour suivre si une commande est en cours
var nb_feux = 3
var feux = []

func _ready():
	generer_feux()
	fetch_commandes()  # Récupère les commandes initialement

# Fonction pour récupérer les commandes depuis le serveur
func fetch_commandes():
	var http_request = $HTTPRequest
	http_request.connect("request_completed", Callable(self, "_on_HTTPRequest_request_completed"))
	http_request.request("http://localhost/cuisine_game_ap/get_plats.php")  # URL modifiée pour les commandes

# Callback lorsque la requête HTTP est terminée
func _on_HTTPRequest_request_completed(result, response_code, headers, body):
	if response_code == 200:
		var json_instance = JSON.new()  # Création d'une instance de la classe JSON
		var err = json_instance.parse(body.get_string_from_utf8())  # Décodage du JSON
		if err != OK:
			print("Erreur de décodage JSON!")
			return
		commandes_data = json_instance.get_data()  # Récupère directement le tableau des commandes
		print("Données des commandes reçues : ", commandes_data)  # Débogage : vérifier la structure des données
		display_commandes()  # Affichage des commandes

# Fonction pour afficher les commandes dans la scène
func display_commandes():
	var y_position = 0  # Position verticale de départ
	for commande in commandes_data:
		var label = Label.new()  # Crée un nouveau Label
		label.text = "Commande " + str(commande["commande_id"]) + " - Client: " + commande["client_nom"]  # Définit le texte du label avec les infos de la commande
		label.set_position(Vector2(50, y_position))  # Positionne le label sur l'écran
		y_position += 40  # Incrémente la position verticale pour le prochain label
		add_child(label)  # Ajoute le label à la scène

		# Affiche les plats pour cette commande
		for plat in commande["plats"]:
			if plat.has("nom_plat"):
				var plat_button = Button.new()
				plat_button.text = plat["nom_plat"]
				plat_button.set_position(Vector2(70, y_position))
				plat_button.connect("pressed", Callable(self, "_on_plat_clicked").bind(plat))
				y_position += 20  # Incrémente la position verticale pour le prochain plat
				add_child(plat_button)
			else:
				print("Erreur : le plat ne contient pas la clé 'nom_plat'. Contenu du plat : ", plat)
		y_position += 20  # Espacement supplémentaire entre les commandes

# Fonction appelée lorsque un bouton de plat est cliqué
func _on_plat_clicked(plat):
	print("Plat cliqué: ", plat["nom_plat"])
	# Ajoutez ici le code pour gérer l'événement de clic sur un plat

# Fonction pour terminer une commande (par exemple, quand la commande est prête)
func terminer_commande():
	commande_en_cours = false  # Réinitialise la commande en cours
	commandes_en_cours.clear()  # Vide la liste des commandes en cours
	# Réactiver les boutons
	for node in get_children():
		if node is Button:
			node.disabled = false
	print("Commande terminée et liste réinitialisée")
	fetch_commandes()  # Récupère à nouveau les commandes après la terminaison d'une commande

func generer_feux():
	var spacing = 75  # Espacement entre chaque feu (ajuste selon tes besoins)
	
	for i in range(nb_feux):
		var feu_instance = FeuScene.instantiate()
		feu_instance.name = "Feu_" + str(i)

		main.add_child(feu_instance)
		main.move_child(feu_instance, 1)
		feux.append(feu_instance)

		# Positionnement manuel (ex: en ligne horizontale)
		var offset = Vector2(600, 150)
		feu_instance.position = Vector2(i * spacing, i * spacing/2) + offset
