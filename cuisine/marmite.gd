extends Node2D

func add_ingredient(ingredient):
	print("Ingrédient ajouté à la marmite : ", ingredient.name)
	ingredient.queue_free()  # Supprime l'ingrédient de la scène
