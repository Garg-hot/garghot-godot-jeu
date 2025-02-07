extends Node

var plats_data = []  # Liste des plats disponibles
var plats_en_cours = []  # Liste des plats en cours
var commande_en_cours = false  # Variable pour suivre si une commande est en cours

func _ready():
	# Connexion à la requête HTTP
	var http_request = $HTTPRequest
	http_request.connect("request_completed", Callable(self, "_on_HTTPRequest_request_completed"))
	http_request.request("http://localhost/cuisine_game_ap/get_plats.php")  # URL modifiée pour les plats

# Callback lorsque la requête HTTP est terminée
func _on_HTTPRequest_request_completed(result, response_code, headers, body):
	if response_code == 200:
		var json_instance = JSON.new()  # Création d'une instance de la classe JSON
		var err = json_instance.parse(body.get_string_from_utf8())  # Décodage du JSON
		if err != OK:
			print("Erreur de décodage JSON!")
			return
		plats_data = json_instance.get_data()  # Récupère directement le tableau des plats
		display_plats()  # Affichage des plats

# Fonction pour afficher les plats dans la scène
func display_plats():
	var y_position = 0  # Position verticale de départ
	for plat in plats_data:
		var button = Button.new()  # Crée un nouveau Button au lieu d'un Label
		button.text = plat["nom_plat"]  # Définit le texte du bouton avec le nom du plat
		button.set_position(Vector2(50, y_position))  # Positionne le bouton sur l'écran
		button.connect("pressed", Callable(self, "_on_plat_selected").bind(plat, button))  # Connecte le signal 'pressed' au bouton
		button.disabled = commande_en_cours  # Désactive le bouton si une commande est en cours
		y_position += 40  # Incrémente la position verticale pour le prochain bouton
		add_child(button)  # Ajoute le bouton à la scène

# Fonction appelée lorsque un bouton est cliqué
func _on_plat_selected(plat, button):
	if not commande_en_cours:  # Vérifie si aucune commande n'est en cours
		commande_en_cours = true  # Définit la commande en cours
		plats_data.erase(plat)  # Supprime le plat de la liste des plats disponibles
		plats_en_cours.append(plat)  # Ajoute le plat à la liste des plats en cours
		button.queue_free()  # Supprime le bouton de la scène
		print("Plat ajouté aux plats en cours: ", plat["nom_plat"])  # Affiche le nom du plat dans la console
		# Mettre à jour l'affichage des plats en cours
		display_plats_en_cours()
		# Désactiver les autres boutons
		for node in get_children():
			if node is Button:
				node.disabled = true

# Fonction pour afficher les plats en cours dans la scène
func display_plats_en_cours():
	# Suppression des boutons existants avant de les recréer
	for node in get_children():
		if node is Button and node.global_position.x == 300:
			node.queue_free()

	var y_position = 0  # Position verticale de départ pour les plats en cours
	for plat in plats_en_cours:
		var button = Button.new()  # Crée un nouveau Button au lieu d'un Label
		button.text = plat["nom_plat"]  # Définit le texte du bouton avec le nom du plat
		button.set_position(Vector2(300, y_position))  # Positionne le bouton sur l'écran
		button.connect("pressed", Callable(self, "_on_plat_en_cours_selected").bind(plat))  # Connecte le signal 'pressed' au bouton
		y_position += 40  # Incrémente la position verticale pour le prochain bouton
		add_child(button)  # Ajoute le bouton à la scène

func _on_plat_en_cours_selected(plat):
	print("Plat en cours sélectionné: ", plat["nom_plat"])
	afficher_ingredients_plat(plat)

# Fonction pour afficher la liste des ingrédients du plat sélectionné
func afficher_ingredients_plat(plat):
	var ingredients = obtenir_ingredients_du_plat(plat["id"])
	print("Ingrédients pour ", plat["nom_plat"], ":")
	for ingredient in ingredients:
		print("- ", ingredient["nom"])

# Fonction pour obtenir les ingrédients d'un plat à partir de l'ID du plat
func obtenir_ingredients_du_plat(plat_id):
	# Simuler l'interrogation de la base de données pour obtenir les ingrédients du plat
	# Normalement, vous feriez une requête à votre serveur ou base de données
	var ingredients = []
	match plat_id:
		1:
			ingredients.append({"nom": "Poulet", "sprite": "res://assets/poulet.png"})
			ingredients.append({"nom": "Fromage", "sprite": "res://assets/cheese.png"})
		# Ajouter d'autres plats et leurs ingrédients si nécessaire
	return ingredients

# Fonction pour terminer une commande (par exemple, quand la commande est prête)
func terminer_commande():
	commande_en_cours = false  # Réinitialise la commande en cours
	plats_en_cours.clear()  # Vide la liste des plats en cours
	# Réactiver les boutons
	for node in get_children():
		if node is Button:
			node.disabled = false
	print("Commande terminée et liste réinitialisée")
