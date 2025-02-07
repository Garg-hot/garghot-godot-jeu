extends Area2D

func add_ingredient(ingredient):
	print("🔥 Marmite reçoit :", ingredient.name)
	send_to_database(ingredient.name)
	ingredient.queue_free()  # Supprime l'ingrédient de la scène
	

func send_to_database(ingredient_name):
	var http_request = HTTPRequest.new()
	add_child(http_request)
	http_request.connect("request_completed", Callable(self, "_on_request_completed"))
	
	var url = "http://localhost/cuisine_game_ap/add_ingredient.php"
	var headers = ["Content-Type: application/x-www-form-urlencoded"]
	var body = "ingredient=" + ingredient_name
	
	http_request.request(url, headers, HTTPClient.METHOD_POST, body)

func _on_request_completed(result, response_code, headers, body):
	if response_code == 200:
		print("✅ Ingrédient ajouté à la base de données !")
	else:
		print("❌ Erreur d'ajout :", response_code)
