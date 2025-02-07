<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cuisine";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM ingredients ORDER BY RAND() LIMIT 1");

$foods = [];
while ($row = $result->fetch_assoc()) {
    $foods[] = $row;
}

echo json_encode($foods);
$conn->close();
?>
