extends Area2D

signal plat_livre

func _ready():
	connect("body_entered", Callable(self, "_on_DeliveryZone_body_entered"))

func _on_DeliveryZone_body_entered(body):
	if body.has_method("is_plat"):
		body.queue_free()
		emit_signal("plat_livre")
