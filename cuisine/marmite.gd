extends Node2D

var plat_selectionne = null
var ingredients_necessaires = []
var timer = null
var cooking_progress = 0
var plat_image_path = ""
var plat_id = 0
var plat_nom = ""
var plat_prete = false
var message_affiche = false

@export var cooking_time = 10.0
signal plat_prete_signal

func _ready():
	timer = $Timer
	if timer:
		timer.connect("timeout", Callable(self, "_on_cooking_complete"))
	else:
		print("Erreur : Timer non trouvé.")
	
	var deliver_button = $DeliverButton
	if deliver_button:
		deliver_button.connect("pressed", Callable(self, "_on_DeliverButton_pressed"))
		deliver_button.visible = false  # Masquer le bouton au démarrage

	var progress_bar = $ProgressBar
	if progress_bar:
		progress_bar.visible = false
	else:
		print("Erreur : ProgressBar non trouvé.")

	var plat_sprite = $PlatSprite
	if plat_sprite:
		plat_sprite.visible = false
	else:
		print("Erreur : PlatSprite non trouvé.")

	var message_label = $Label
	if message_label:
		message_label.visible = false
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
			ingredients_necessaires.erase(ing)
			area.queue_free()
			afficher_ingredients_necessaires()
			found = true

			if ingredients_necessaires.size() == 0:
				commencer_cuisson()

			break

	if not found:
		print("Ingrédient non accepté : ", ingredient["nom"])

func is_ready_for_new_plat():
	return plat_selectionne == null

func assign_plat(plat):
	plat_selectionne = plat
	plat_id = plat["id"]
	plat_nom = plat["nom_plat"]
	ingredients_necessaires = plat["ingredients"].duplicate()
	if "sprite" in plat:
		plat_image_path = "res://path_to_images/" + plat["sprite"]
	else:
		print("Erreur : La clé 'sprite' est absente du dictionnaire du plat.")
	print("Plat assigné à la marmite : ", plat["nom_plat"])
	afficher_ingredients_necessaires()
	message_affiche = false

func afficher_ingredients_necessaires():
	if plat_selectionne:
		print( plat_selectionne["nom_plat"], " :")
		for ingredient in ingredients_necessaires:
			print("- ", ingredient["nom"])
	else:
		print("Aucun plat assigné à cette marmite.")

func commencer_cuisson():
	print("Tous les ingrédients sont ajoutés. Commencez la cuisson de ", plat_selectionne["nom_plat"])
	plat_prete = false
	if timer:
		timer.start(cooking_time)
	var progress_bar = $ProgressBar
	if progress_bar:
		progress_bar.visible = true

func _process(delta):
	if timer and timer.time_left > 0:
		cooking_progress = (cooking_time - timer.time_left) / cooking_time
		var progress_bar = $ProgressBar
		if progress_bar:
			progress_bar.value = cooking_progress * 100

func _on_cooking_complete():
	if plat_prete or not plat_selectionne:
		return  # Empêche l'impression multiple du message "La cuisson est terminée !" et vérifie s'il y a un plat assigné
		
	print("La cuisson est terminée !")
	var progress_bar = $ProgressBar
	if progress_bar:
		progress_bar.visible = false
	
	var plat_sprite = $PlatSprite
	if plat_sprite:
		plat_sprite.texture = load(plat_image_path)
		plat_sprite.visible = true

	plat_prete = true
	emit_signal("plat_prete_signal")

	var deliver_button = $DeliverButton
	if deliver_button:
		deliver_button.text = "Livrer " + plat_nom + " (ID: " + str(plat_id) + ")"
		deliver_button.visible = true  # Afficher le bouton de livraison
		deliver_button.size = (50, 50)

	#if not message_affiche:
		#var message_label = $Label
		#if message_label:
			#message_label.text = "Le plat est prêt !"
			#message_label.visible = true
		#message_affiche = true

func _on_DeliverButton_pressed():
	print("Le plat est bien livré")
	var deliver_button = $DeliverButton
	if deliver_button:
		deliver_button.visible = false  # Masquer le bouton après la livraison
	
	var player = get_tree().get_root().get_node("Player")
	if player:
		# Déclarer le plat comme livré
		player.set_plat_id(plat_id)
		player.set_plat_nom(plat_nom)
		print("Le plat a été livré. ID du plat : ", plat_id, ", Nom du plat : ", plat_nom)
	
	liberer_marmite()

func liberer_marmite():
	plat_selectionne = null
	ingredients_necessaires.clear()
	plat_image_path = ""
	plat_id = ""
	plat_nom = ""
	plat_prete = false
	var message_label = $Label
	if message_label:
		message_label.visible = false
	message_affiche = false
	print("La marmite est prête pour un nouveau plat.")
