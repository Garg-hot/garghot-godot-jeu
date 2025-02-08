<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cuisine";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connexion échouée : " . $conn->connect_error]));
}

// Récupère les commandes
$commandes_result = $conn->query("
    SELECT Commande.id AS commande_id, Commande.id_client, Commande.statut, 
           Clients.nom AS client_nom
    FROM Commande
    JOIN Clients ON Commande.id_client = Clients.id
");

$commandes = [];
while ($commande_row = $commandes_result->fetch_assoc()) {
    $commande_id = $commande_row["commande_id"];
    
    // Récupère les plats pour chaque commande
    $plats_result = $conn->query("
        SELECT Plat.id, Plat.nom_plat
        FROM Commande_Plat
        JOIN Plat ON Commande_Plat.id_plat = Plat.id
        WHERE Commande_Plat.id_commande = $commande_id
    ");
    
    $plats = [];
    while ($plat_row = $plats_result->fetch_assoc()) {
        $plat_id = $plat_row["id"];
        
        // Récupère les ingrédients pour chaque plat
        $ingredients_result = $conn->query("
            SELECT ingredients.nom, ingredients.sprite
            FROM Plat_ingredient
            JOIN ingredients ON Plat_ingredient.id_ingredient = ingredients.id
            WHERE Plat_ingredient.id_plat = $plat_id
        ");
        
        $ingredients = [];
        while ($ingredient_row = $ingredients_result->fetch_assoc()) {
            $ingredients[] = $ingredient_row;
        }
        
        $plat_row["ingredients"] = $ingredients;  // Ajoute les ingrédients au plat
        $plats[] = $plat_row;
    }
    
    $commande_row["plats"] = $plats;  // Ajoute les plats à la commande
    $commandes[] = $commande_row;
}

echo json_encode($commandes, JSON_PRETTY_PRINT);
$conn->close();
?>
