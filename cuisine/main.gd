extends Node

const FeuScene = preload("res://Marmite.tscn")  # Charge la scène du feu
@onready var main = $"."  # Référence directe à la scène principale
@onready var ui_layer = $UI  # Référence au CanvasLayer
@onready var commandes_container = $UI/CommandesContainer  # Conteneur pour les commandes
@onready var plats_en_cours_container = $UI/PlatsEnCoursContainer  # Conteneur pour les plats en cours
@onready var ingredients_container = $UI/IngredientsContainer  # Conteneur pour les ingrédients

var commandes_data = []  # Liste des commandes disponibles
var plats_en_cours = []  # Liste des plats en cours
var commande_en_cours = false  # Variable pour suivre si une commande est en cours
var nb_feux = 3  # Nombre de feux
var feux = []  # Liste des feux
var first_free_marmite = null  # Propriété pour stocker la première marmite libre

func _ready():
	generer_feux()
	fetch_commandes()  # Récupère les commandes initialement

# Fonction pour récupérer les commandes depuis le serveur
func fetch_commandes():
	var http_request = $HTTPRequest
	http_request.connect("request_completed", Callable(self, "_on_HTTPRequest_request_completed"))
	http_request.request("https://garg-hot-web.onrender.com/api/commandes/")  # URL modifiée pour les commandes

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
	clear_container(commandes_container)  # Supprime les boutons et labels existants
	for commande in commandes_data:
		print("Commande actuelle : ", commande)  # Impression pour vérifier la structure de chaque commande
		if commande.has("commande_id"):
			var commande_label = Label.new()  # Crée un nouveau Label
			commande_label.text = "Commande " + str(commande["commande_id"])
			commandes_container.add_child(commande_label)  # Ajoute le label au conteneur

			# Affiche les plats pour cette commande
			for plat in commande["plats"]:
				if plat.has("nom_plat"):
					var plat_button = Button.new()
					plat_button.text = plat["nom_plat"]
					plat_button.connect("pressed", Callable(self, "_on_plat_clicked").bind(commande, plat, plat_button))
					commandes_container.add_child(plat_button)
				else:
					print("Erreur : le plat ne contient pas la clé 'nom_plat'. Contenu du plat : ", plat)
		else:
			print("Erreur : la commande ne contient pas la clé 'commande_id'. Contenu de la commande : ", commande)

# Fonction appelée lorsque un bouton de plat est cliqué
func _on_plat_clicked(commande, plat, plat_button):
	if first_free_marmite == null:
		# Trouver la première marmite libre
		for marmite in feux:
			if marmite.is_ready_for_new_plat():  # Vérifie si la marmite est prête pour un nouveau plat
				first_free_marmite = marmite
				break

	if first_free_marmite != null:
		plats_en_cours.append(plat)
		commande["plats"].erase(plat)  # Supprime le plat de la commande
		plat_button.queue_free()  # Supprime le bouton du plat de la scène
		print("Plat sélectionné et ajouté à la liste des plats en cours : ", plat["nom_plat"])
		display_plats_en_cours()

		first_free_marmite.assign_plat(plat)  # Assigne le plat à la marmite
		first_free_marmite = null  # Réinitialise la marmite libre
	else:
		print("Aucune marmite libre disponible.")

# Fonction pour afficher les plats en cours
func display_plats_en_cours():
	clear_container(plats_en_cours_container)  # Supprime les boutons existants
	for plat in plats_en_cours:
		var plat_button = Button.new()
		plat_button.text = plat["nom_plat"]
		plat_button.connect("pressed", Callable(self, "_on_plat_en_cours_clicked").bind(plat))
		plats_en_cours_container.add_child(plat_button)

# Fonction appelée lorsque un bouton de plat en cours est cliqué
func _on_plat_en_cours_clicked(plat):
	print("Plat en cours cliqué : ", plat["nom_plat"])
	afficher_ingredients_plat(plat)

# Fonction pour afficher la liste des ingrédients du plat sélectionné
func afficher_ingredients_plat(plat):
	var ingredients = plat["ingredients"]  # Récupère les ingrédients directement de l'objet plat
	print("Ingrédients pour ", plat["nom_plat"], ":")
	for ingredient in ingredients:
		print("- ", ingredient["nom"])
	display_ingredients(ingredients)

# Fonction pour afficher les ingrédients dans la scène
func display_ingredients(ingredients):
	clear_container(ingredients_container)  # Supprime les labels existants
	for ingredient in ingredients:
		var ingredient_label = Label.new()
		ingredient_label.text = ingredient["nom"]
		ingredients_container.add_child(ingredient_label)

# Fonction pour supprimer les enfants d'un conteneur
func clear_container(container):
	for child in container.get_children():
		container.remove_child(child)
		child.queue_free()

# Fonction pour terminer une commande (par exemple, quand la commande est prête)
func terminer_commande():
	commande_en_cours = false  # Réinitialise la commande en cours
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
		feu_instance.position = Vector2(i * spacing, i * spacing / 2) + offset
