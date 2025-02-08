extends CharacterBody2D

const MOTION_SPEED = 160  # Pixels/second
var food_info = null
var last_direction = Vector2(1, 0)
var food_held: Node2D = null  # Stocke l'objet ramassé
var plat_image: Texture = null  # Propriété pour stocker l'image du plat récupéré

var anim_directions = {
	"idle": [  # list of [animation name, horizontal flip]
		["side_right_idle", false],
		["45front_right_idle", false],
		["front_idle", false],
		["45front_left_idle", false],
		["side_left_idle", false],
		["45back_left_idle", false],
		["back_idle", false],
		["45back_right_idle", false],
	],

	"walk": [
		["side_right_walk", false],
		["45front_right_walk", false],
		["front_walk", false],
		["45front_left_walk", false],
		["side_left_walk", false],
		["45back_left_walk", false],
		["back_walk", false],
		["45back_right_walk", false],
	],
}

func _physics_process(_delta):
	var motion = Vector2()
	motion.x = Input.get_action_strength("move_right") - Input.get_action_strength("move_left")
	motion.y = Input.get_action_strength("move_down") - Input.get_action_strength("move_up")
	motion.y /= 2
	motion = motion.normalized() * MOTION_SPEED
	set_velocity(motion)
	move_and_slide()
	var dir = velocity

	if dir.length() > 0:
		last_direction = dir
		update_animation("walk")
	else:
		update_animation("idle")

	if plat_image:
		var plat_sprite = $PlatSprite
		if plat_sprite:
			plat_sprite.texture = plat_image

func update_animation(anim_set):
	var angle = rad_to_deg(last_direction.angle()) + 22.5
	var slice_dir = floor(angle / 45)

	$Sprite.play(anim_directions[anim_set][slice_dir][0])
	$Sprite.flip_h = anim_directions[anim_set][slice_dir][1]

func _process(delta):
	if Input.is_action_just_pressed("pick"):  # "F" dans les Input Map
		if food_held:
			# Vérifie si le joueur est à proximité de la marmite
			if is_near_marmite():
				add_food_to_marmite()
			else:
				drop_food()
		else:
			pick_food()
	elif Input.is_action_just_pressed("interact"):  # "E" dans les Input Map
		if is_near_marmite():
			afficher_ingredients_marmite()
	elif Input.is_action_just_pressed("recover"):  # "A" dans les Input Map
		if is_near_marmite():
			recuperer_plat()

func pick_food():
	var areas = $PickupArea.get_overlapping_areas()
	if areas.size() > 0:
		# Trouve l'aliment le plus proche du joueur
		areas.sort_custom(func(a, b): return global_position.distance_to(a.global_position) < global_position.distance_to(b.global_position))
		var closest_food = areas[0]  # Prend l'aliment le plus proche
		if closest_food.is_in_group("ingredients"):
			food_held = closest_food
			food_held.get_parent().remove_child(food_held)
			add_child(food_held)
			food_held.position = Vector2(0, -40)  # Position relative au joueur
			var sprite = closest_food.get_node_or_null("Sprite2D")
			if sprite and sprite.texture:
				var sprite_path = sprite.texture.resource_path
				for ingredient in GetIngredient.food_data:
					var path = "res://assets/" + ingredient["sprite"]
					if path in sprite_path:
						food_info = ingredient
						print("Nourriture ramassée :", food_info["nom"])
						break
			else:
				print("tsisy")

func drop_food():
	if food_held and is_instance_valid(food_held):
		remove_child(food_held)
		get_parent().add_child(food_held)
		food_held.global_position = global_position + Vector2(20, 20)  # Dépose un peu plus loin
		food_held = null
		print("Nourriture lâchée !")
	else:
		print("Erreur : food_held est invalide.")

func is_near_marmite():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("marmite"):
			return true
	return false

func add_food_to_marmite():
	if food_held and is_instance_valid(food_held):
		for area in $PickupArea.get_overlapping_areas():
			if area.is_in_group("marmite"):
				var marmite = area.get_parent()
				if marmite.has_method("add_ingredient"):
					marmite.add_ingredient(food_info, food_held)  # Appelle la fonction dans `marmite.gd`
					food_held = null
				else:
					print("Erreur : le nœud marmite n'a pas de méthode 'add_ingredient'.")
				return
	else:
		print("Erreur : food_held est invalide.")

func afficher_ingredients_marmite():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("marmite"):
			var marmite = area.get_parent()
			if marmite.has_method("afficher_ingredients_necessaires"):
				marmite.afficher_ingredients_necessaires()  # Affiche les ingrédients nécessaires
				return

func recuperer_plat():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("marmite"):
			var marmite = area.get_parent()
			if marmite.has_method("recuperer_plat"):
				marmite.recuperer_plat()  # Appelle la fonction dans `marmite.gd`
				return

func set_plat_image(image_path):
	plat_image = load(image_path)
	print("Image du plat définie :", image_path)
