extends Node2D

var plat_selectionne = null  # Propriété pour stocker le plat sélectionné
var ingredients_necessaires = []  # Propriété pour stocker les ingrédients nécessaires pour le plat assigné
var timer = null  # Timer pour la cuisson
var cooking_progress = 0  # Progression de la cuisson
var plat_image_path = ""  # Propriété pour stocker le chemin de l'image du plat
var message_affiche = false  # Propriété pour suivre l'état du message affiché

@export var cooking_time = 10.0  # Temps de cuisson en secondes
var plat_prete = false  # Propriété pour suivre l'état du plat prêt

func _ready():
	timer = $Timer  # Assigne le Timer de la scène à la variable
	if timer:
		timer.connect("timeout", Callable(self, "_on_cooking_complete"))  # Connexion du signal de timeout
	else:
		print("Erreur : Timer non trouvé.")

	var progress_bar = $ProgressBar  # Assigne le ProgressBar de la scène à la variable
	if progress_bar:
		progress_bar.visible = false  # Masquer le ProgressBar initialement
	else:
		print("Erreur : ProgressBar non trouvé.")

	var message_label = $Label  # Assigne le Label de la scène à la variable
	if message_label:
		message_label.visible = false  # Masquer le Label initialement
	else:
		print("Erreur : Label non trouvé.")

func add_ingredient(ingredient, area):
	if not plat_selectionne:
		print("Aucun plat assigné à cette marmite.")
		return
	
	var found = false
	for ing in ingredients_necessaires:
		if ing["nom"] == ingredient["nom"]:
			print("Ingrédient ajouté : ", ingredient["nom"])
			ingredients_necessaires.erase(ing)  # Retire l'ingrédient de la liste une fois ajouté
			area.queue_free()  # Supprime l'ingrédient de la scène
			afficher_ingredients_necessaires()  # Met à jour l'affichage des ingrédients nécessaires
			found = true

			# Vérifie si tous les ingrédients ont été ajoutés
			if ingredients_necessaires.size() == 0:
				commencer_cuisson()

			break

	if not found:
		print("Ingrédient non accepté : ", ingredient["nom"])

# Méthode pour vérifier si la marmite est prête pour un nouveau plat
func is_ready_for_new_plat():
	return plat_selectionne == null

# Méthode pour assigner un plat à la marmite
func assign_plat(plat):
	plat_selectionne = plat
	ingredients_necessaires = plat["ingredients"].duplicate()  # Assigne la liste des ingrédients nécessaires
	if "sprite" in plat:
		plat_image_path = "res://plat/" + plat["sprite"]  # Stocke le chemin de l'image du plat
	else:
		print("Erreur : La clé 'sprite' est absente du dictionnaire du plat.")
	print("Plat assigné à la marmite : ", plat["nom_plat"])
	afficher_ingredients_necessaires()
	message_affiche = false  # Réinitialiser l'état du message affiché

# Méthode pour afficher les ingrédients nécessaires du plat assigné
func afficher_ingredients_necessaires():
	if plat_selectionne:
		print("Ingrédients nécessaires pour ", plat_selectionne["nom_plat"], " :")
		for ingredient in ingredients_necessaires:
			print("- ", ingredient["nom"])
	else:
		print("Aucun plat assigné à cette marmite.")

# Méthode pour commencer la cuisson
func commencer_cuisson():
	print("Tous les ingrédients sont ajoutés. Commencez la cuisson de ", plat_selectionne["nom_plat"])
	# Réinitialiser les propriétés de la marmite après la cuisson
	plat_selectionne = null
	ingredients_necessaires.clear()
	cooking_progress = 0  # Réinitialise la progression de la cuisson
	plat_prete = false  # Le plat n'est pas encore prêt
	if timer:
		timer.start(cooking_time)  # Démarre la minuterie de cuisson
	var progress_bar = $ProgressBar
	if progress_bar:
		progress_bar.visible = true  # Rend la jauge de progression visible

# Méthode pour mettre à jour la progression de la cuisson
func _process(delta):
	if timer and timer.time_left > 0:
		cooking_progress = (cooking_time - timer.time_left) / cooking_time
		var progress_bar = $ProgressBar
		if progress_bar:
			progress_bar.value = cooking_progress * 100  # Met à jour la jauge de progression

# Méthode appelée lorsque la cuisson est terminée
func _on_cooking_complete():
	print("La cuisson est terminée !")
	var progress_bar = $ProgressBar
	if progress_bar:
		progress_bar.visible = false  # Cache la jauge de progression
	
	var message_label = $Label
	if message_label:
		message_label.text = "Plat prêt ! Appuyez sur A pour reprendre le plat."
		message_label.visible = true  # Affiche le message
	
	plat_prete = true  # Le plat est prêt
	message_affiche = true  # Indique que le message a été affiché

# Méthode pour permettre au joueur de récupérer le plat
func recuperer_plat():
	if plat_prete:  # Vérifie si le plat est prêt
		var message_label = $Label
		if message_label:
			message_label.visible = false  # Cache le message
		
		# Envoie l'image du plat récupéré au joueur
		var player = get_tree().get_root().get_node("Player")  # Remplace "Player" par le chemin du nœud joueur
		if player:
			player.set_plat_image(plat_image_path)
		print("Le plat a été récupéré.")
		
		plat_prete = false  # Réinitialise l'état du plat prêt
		liberer_marmite()  # Réinitialise et libère la marmite

# Méthode pour réinitialiser et libérer la marmite
func liberer_marmite():
	plat_selectionne = null
	ingredients_necessaires.clear()
	plat_image_path = ""
	plat_prete = false
	var message_label = $Label
	if message_label:
		message_label.visible = false  # Masquer le message
	message_affiche = false  # Réinitialise l'état du message affiché
	print("La marmite est prête pour un nouveau plat.")
