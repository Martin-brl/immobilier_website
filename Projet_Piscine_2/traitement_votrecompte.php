<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Requête SQL pour vérifier les informations de connexion
    $sql = "SELECT id, prenom, nom FROM utilisateurs WHERE email = ? AND mot_de_passe = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param("ss", $email, $mdp);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_prenom'] = $row['prenom'];
            $_SESSION['user_nom'] = $row['nom'];

            // Redirection vers la page d'accueil
            header("Location: index.php");
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }

        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête: " . $conn->error;
    }
}

$conn->close();
?>
