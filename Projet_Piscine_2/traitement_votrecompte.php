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

$email = $_GET['email'];
$mdp = $_GET['mdp'];
// Construire la requête SQL    
$sql = "SELECT * FROM utilisateurs WHERE 1=1";

if (!empty($email)) {
    $sql .= " AND email LIKE '" . $conn->real_escape_string($email) . "'";
}

if (!empty($mdp)) {
    $sql .= " AND mot_de_passe LIKE '" . $conn->real_escape_string($mdp) . "'";
}
print($sql);
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<h2>Résultats de la recherche</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Prénom: " . $row["prenom"]. " - Nom: " . $row["nom"]. " - email: " . $row["email"]. " - Adresse: " . $row["adresse"]. " - telephone: " . $row["telephone"]. "<br>";
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>
