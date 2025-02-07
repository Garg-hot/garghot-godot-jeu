extends Node

var food_data = []


func _ready():
	var http_request = $HTTPRequest
	http_request.connect("request_completed", Callable(self, "_on_HTTPRequest_request_completed"))
	http_request.request("http://localhost/cuisine_game_ap/connexion.php")

func _on_HTTPRequest_request_completed(result, response_code, headers, body):
	if response_code == 200:
		var json = JSON.parse_string(body.get_string_from_utf8())
		if json:
			food_data = json
			var position = 0
			for food in food_data:
				print("ID: ", food["id"], ", Nom: ", food["nom"], ", Sprite: ", food["sprite"])
				spawn_food(food, position)
				position = position + 500

func spawn_food(food, position):
	var sprite = Sprite2D.new()
	sprite.texture = load(food["sprite"])
	sprite.position = Vector2(randf_range(0, position), randf_range(0, position))
	add_child(sprite)
