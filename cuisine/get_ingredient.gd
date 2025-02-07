extends Node

var request_sent = false
var food_data = []
var http_request

func _ready():
	#if request_sent:
		#return
	# Vérifier si le nœud HTTPRequest existe
	http_request = $HTTPRequest if has_node("HTTPRequest") else null
	http_request = HTTPRequest.new()
	add_child(http_request)  # Ajoute dynamiquement le nœud à l'arbre de scène

	if http_request:
		http_request.connect("request_completed", Callable(self, "_on_HTTPRequest_request_completed"))
		http_request.request("http://localhost/cuisine_game_ap/connexion.php")
	else:
		print("Erreur : Le nœud HTTPRequest est introuvable.")
	request_sent = true

func _on_HTTPRequest_request_completed(result, response_code, headers, body):
	if response_code == 200:
		var json = JSON.parse_string(body.get_string_from_utf8())
		if json:
			food_data = json
			var position = 0
			for food in food_data:
				var food_info = {
					"id": int(food["id"]),
					"sprite": food["sprite"],
					"nom": food["nom"]
				}
				print("ID: ", food["id"], ", Nom: ", food["nom"], ", Sprite: ", food["sprite"])
				spawn_food(food_info, position)
				position += 50
			request_sent = false

func spawn_food(food_info, position):
	var main_scene = get_tree().get_root().find_child("Main", true, false)
	
	if not main_scene:
		print("Erreur : Impossible de trouver la scène principale 'Main'.")
		return

	var ingredient_scene = load("res://ingredient.tscn")
	if not ingredient_scene:
		print("Erreur : Impossible de charger la scène 'ingredient.tscn'.")
		return

	var new_ingredient = ingredient_scene.instantiate()
	var sprite = new_ingredient.get_node("Area2D/Sprite2D")
	if not sprite:
		print("Erreur : Impossible de trouver le Sprite2D dans la scène 'ingredient.tscn'.")
		return

	var texture = load("res://assets/" + food_info["sprite"])
	if texture:
		sprite.texture = texture
		var target_size = Vector2(30, 30)
		var texture_size = texture.get_size()
		sprite.scale = target_size / texture_size
		print(food_info)
	
	new_ingredient.position = Vector2(position, 100)
	main_scene.add_child(new_ingredient)
