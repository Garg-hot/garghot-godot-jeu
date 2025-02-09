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

	var progress_bar = $ProgressBar
	if progress_bar:
		progress_bar.visible = false

	var plat_sprite = $PlatSprite
	if plat_sprite:
		plat_sprite.visible = false

	var message_label = $Label
	if message_label:
		message_label.visible = false

func add_ingredient(ingredient, area):
	if not plat_selectionne:
		print("Aucun plat assigné à cette marmite.")
		return

	for i in range(ingredients_necessaires.size()):
		if ingredients_necessaires[i]["nom"] == ingredient["nom"]:
			print("Ingrédient ajouté : ", ingredient["nom"])
			ingredients_necessaires.remove_at(i)
			area.queue_free()
			afficher_ingredients_necessaires()

			if ingredients_necessaires.size() == 0:
				commencer_cuisson()
			return

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
		print("Ingrédients nécessaires pour ", plat_selectionne["nom_plat"], " :")
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

	if not message_affiche:
		var message_label = $Label
		if message_label:
			message_label.text = "Le plat est prêt !"
			message_label.visible = true
		message_affiche = true

	afficher_plat_a_cote()

func afficher_plat_a_cote():
	var ingredient_scene = load("res://ingredient.tscn")  # Remplace par le chemin correct
	if ingredient_scene:
		var new_plat = ingredient_scene.instantiate()  # Utilise instantiate() pour Godot 4.x
		new_plat.name = plat_nom
		new_plat.position = position + Vector2(50, 0)
		add_child(new_plat)
		new_plat.add_to_group("plats")
	else:
		print("Erreur : Impossible de charger la scène 'ingredient.tscn'.")

func recuperer_plat():
	if plat_prete:
		var plat_sprite = $PlatSprite
		if plat_sprite:
			plat_sprite.visible = false

		var message_label = $Label
		if message_label:
			message_label.visible = false

		var player = get_tree().get_root().get_node("Player")
		if player:
			player.set_plat_image(plat_image_path)
			player.set_plat_id(plat_id)
			player.set_plat_nom(plat_nom)
		print("Le plat a été récupéré. ID du plat : ", plat_id, ", Nom du plat : ", plat_nom)

		plat_prete = false
		liberer_marmite()

func liberer_marmite():
	plat_selectionne = null
	ingredients_necessaires.clear()
	plat_image_path = ""
	plat_id = 0
	plat_nom = ""
	plat_prete = false
	var message_label = $Label
	if message_label:
		message_label.visible = false
	message_affiche = false
	print("La marmite est prête pour un nouveau plat.")
