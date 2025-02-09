extends CharacterBody2D

const MOTION_SPEED = 160  # Pixels/second
var food_info = null
var last_direction = Vector2(1, 0)
var food_held: Node2D = null
var plat_image: Texture = null
var plat_id = 0
var plat_nom = ""
var plat_pris = false

var anim_directions = {
	"idle": [
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
		["back_walk", false],
		["45back_right_walk", false],
	],
}

func _ready():
	var delivery_area = get_parent().get_node("DeliveryArea")
	if delivery_area:
		delivery_area.connect("plat_livre", Callable(self, "_on_plat_livre"))

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

	if plat_pris:
		var label = $PlatStatusLabel
		if label:
			label.text = "Plat en cours : " + plat_nom + " (ID: " + str(plat_id) + ")"

func update_animation(anim_set):
	var angle = rad_to_deg(last_direction.angle()) + 22.5
	var slice_dir = floor(angle / 45)
	$Sprite.play(anim_directions[anim_set][slice_dir][0])
	$Sprite.flip_h = anim_directions[anim_set][slice_dir][1]

func _process(delta):
	if Input.is_action_just_pressed("recover"):  # "A" dans les Input Map
		if is_near_plat():
			recuperer_plat()
		elif is_near_marmite():
			var marmite = get_nearby_marmite()
			if marmite and marmite.plat_prete:
				marmite.recuperer_plat()

	elif Input.is_action_just_pressed("pick"):  # "F" dans les Input Map
		if food_held:
			if is_near_marmite():
				add_food_to_marmite()
			elif is_near_plat():
				recuperer_plat()
			else:
				drop_food()
		else:
			pick_food()
	elif Input.is_action_just_pressed("interact"):  # "E" dans les Input Map
		if is_near_marmite():
			var marmite = get_nearby_marmite()
			if marmite:
				marmite.afficher_ingredients_necessaires()
		elif is_near_delivery_area():
			livrer_plat()

func pick_food():
	var areas = $PickupArea.get_overlapping_areas()
	if areas.size() > 0:
		areas.sort_custom(func(a, b): return global_position.distance_to(a.global_position) < global_position.distance_to(b.global_position))
		var closest_food = areas[0]
		if closest_food.is_in_group("ingredients") or closest_food.is_in_group("plats"):
			food_held = closest_food
			food_held.get_parent().remove_child(food_held)
			add_child(food_held)
			food_held.position = Vector2(0, -40)
			var sprite = closest_food.get_node_or_null("Sprite2D")
			if sprite and sprite.texture:
				var sprite_path = sprite.texture.resource_path
				for ingredient in GetIngredient.food_data:
					var path = "res://assets/" + ingredient["sprite"]
					if path in sprite_path:
						food_info = ingredient
						print("Nourriture ramassée :", food_info["nom"])
						break
				if not food_info:
					food_info = {"nom": plat_nom, "sprite": sprite.texture.resource_path}
					print("Plat ramassé :", plat_nom)
			else:
				print("Erreur : Sprite introuvable ou sans texture")
		else:
			print("Aucun ingrédient ou plat trouvé à proximité")

func drop_food():
	if food_held and is_instance_valid(food_held):
		remove_child(food_held)
		get_parent().add_child(food_held)
		food_held.global_position = global_position + Vector2(20, 20)
		food_held = null
		print("Objet lâché !")
	else:
		print("Erreur : food_held est invalide.")

func is_near_marmite():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("marmite"):
			return true
	return false

func is_near_plat():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("plats"):
			return true
	return false

func is_near_delivery_area():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("delivery_area"):
			return true
	return false

func get_nearby_marmite():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("marmite"):
			return area.get_parent()
	return null

func add_food_to_marmite():
	if food_held and is_instance_valid(food_held):
		for area in $PickupArea.get_overlapping_areas():
			if area.is_in_group("marmite"):
				var marmite = area.get_parent()
				if marmite.has_method("add_ingredient"):
					marmite.add_ingredient(food_info, food_held)
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
				marmite.afficher_ingredients_necessaires()
				return

func recuperer_plat():
	var areas = $PickupArea.get_overlapping_areas()
	for area in areas:
		if area.is_in_group("plats"):
			var plat_sprite = area.get_parent()
			if plat_sprite.has_method("recuperer_plat"):
				plat_sprite.recuperer_plat()
				plat_pris = true
				print("Plat récupéré :", plat_nom, "ID du plat :", plat_id)
				return

func livrer_plat():
	if plat_pris:
		print("Plat livré :", plat_nom, "ID du plat :", plat_id)
		var delivery_area = get_parent().get_node("DeliveryArea")
		if delivery_area:
			delivery_area.emit_signal("plat_livre", plat_id)
		plat_image = null
		plat_id = 0
		plat_nom = ""
		plat_pris = false
		var plat_sprite = $PlatSprite
		if plat_sprite:
			plat_sprite.texture = null

func set_plat_image(image_path):
	plat_image = load(image_path)
	print("Image du plat définie :", image_path)

func set_plat_id(id):
	plat_id = id
	print("ID du plat défini :", id)

func set_plat_nom(nom):
	plat_nom = nom
	print("Nom du plat défini :", nom)

func _on_plat_livre():
	print("Le plat a été livré.")
	plat_image = null
	plat_id = 0
	plat_nom = ""
	plat_pris = false
	var plat_sprite = $PlatSprite
	if plat_sprite:
		plat_sprite.texture = null
