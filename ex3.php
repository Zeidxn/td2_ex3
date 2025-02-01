<?php
// fichier index.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'ID passé en GET et utiliser directement dans la requête SQL
$user_id = $_GET['id']; // L'ID de l'utilisateur est passé par l'URL
$sql = "SELECT * FROM users WHERE id = '$user_id'"; // Requête vulnérable à une SQL Injection

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
