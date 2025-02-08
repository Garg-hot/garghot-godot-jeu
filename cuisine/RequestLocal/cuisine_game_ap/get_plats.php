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

$result = $conn->query("SELECT * FROM Plat");

$plats = [];
while ($row = $result->fetch_assoc()) {
    $plats[] = $row;
}

echo json_encode($plats);
$conn->close();
?>
