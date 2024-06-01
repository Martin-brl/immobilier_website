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
}

// Vérifier si les variables GET sont définies
if (isset($_GET['client_id']) && isset($_GET['propriete_adresse']) && isset($_GET['date']) && isset($_GET['heure']) && isset($_GET['status'])) {
    
    // Récupérer le plus haut ID de la table rendezvous
    $sql_highest_id = "SELECT MAX(id) FROM rendezvous";
    $highest_id = $conn->query($sql_highest_id);

    if ($highest_id->num_rows > 0) {
        $row_highest_id = $result_highest_id->fetch_assoc();
        $highest_id = $row_highest_id['highest_id'];
        $new_id = $highest_id + 1;
    } else {
        // Si aucune entrée n'existe, commencer par 1
        $new_id = 1;
    }
    
    
    $client_id = $_GET['client_id'];
    $propriete_adresse = $_GET['propriete_adresse'];
    $date = $_GET['date'];
    $heure = $_GET['heure'];
    $status = $_GET['status'];

    // Trouver l'ID de la propriété et l'ID de l'agent associé
    $sql_propriete = "SELECT id FROM proprietes WHERE adresse = '" . $conn->real_escape_string($propriete_adresse) . "'";
    $sql_agent = "SELECT agent_id FROM proprietes WHERE adresse = '" . $conn->real_escape_string($propriete_adresse) . "'";
    $propriete_id = $conn->query($sql_propriete);
    $agent_id = $conn->query($sql_agent);
    $stmt_propriete = $conn->prepare($sql_propriete);

    $sql = sprintf("INSERT INTO rendezvous (id, client_id, agent_id, propriete_id, date, heure, status) VALUES (%d, %d, %d, %s, %d, %s)", $conn->real_escape_string($new_id), $conn->real_escape_string($client_id), $conn->real_escape_string($agent_id), $conn->real_escape_string($propriete_id), $conn->real_escape_string($date), $conn->real_escape_string($heure), 'confirmé');
}

$conn->close();
?>
