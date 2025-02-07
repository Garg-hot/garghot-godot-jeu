<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cuisine_game_ap";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(" echec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ingredient = $_POST["ingredient"];
    $sql = "INSERT INTO table_marmite (ingredient) VALUES ('$ingredient')";

    if ($conn->query($sql) === TRUE) {
        echo " Ingredient ajoute avec succes";
    } else {
        echo " Erreur : " . $conn->error;
    }
}



$conn->close();
?>
