<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biens_immobiliers";
$port = "3308";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    alert("erreur de connexion à la bas de donnée");
}

$location = $_GET['location'];
$min_price = $_GET['min_price'];
$max_price = $_GET['max_price'];
$property_type = $_GET['property_type'];

// Construire la requête SQL
$sql = "SELECT * FROM Proprietes WHERE 1=1";

if (!empty($location)) {
    $sql .= " AND ville LIKE '%" . $conn->real_escape_string($location) . "%'";
}
if (!empty($min_price)) {
    $sql .= " AND prix >= " . intval($min_price);
}
//utiliser cette mise en forme quand on cherche un entier
if (!empty($max_price)) {
    $sql .= " AND prix <= " . intval($max_price);
}
// utiliser cette mise en forme quand on cherche de la chaine de caractères
if (!empty($property_type)) {
    $sql .= " AND type = '" . $conn->real_escape_string($property_type) . "'";
}
// print($sql)
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Résultats de la recherche</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Type: " . $row["type"]. " - Adresse: " . $row["adresse"]. " - Prix: " . $row["prix"]. "€<br>";
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>
