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

$query = isset($_GET['query']) ? $_GET['query'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';
$property_type = isset($_GET['property_type']) ? $_GET['property_type'] : '';

// Construire la requête SQL
$sql = "SELECT * FROM Proprietes WHERE 1=1";

if (!empty($location)) {
    $sql .= " AND ville LIKE '%" . $conn->real_escape_string($location) . "%'";
}
if (!empty($min_price)) {
    $sql .= " AND prix >= " . intval($min_price);
}
if (!empty($max_price)) {
    $sql .= " AND prix <= " . intval($max_price);
}
if (!empty($property_type)) {
    $sql .= " AND type = '" . $conn->real_escape_string($property_type) . "'";
}

$result = $conn->query($sql);
$proprietes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $proprietes[] = $row;
    }
} else {
    $proprietes = null;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de la recherche - Omnes Immobilier</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .result-container {
            text-align: center;
            margin-top: 50px;
        }
        .result-details {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
        #map {
            height: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body class="result-page">
    <header>
        <div class="header-left">
            <img src="logo.png" alt="Omnes Immobilier Logo" class="logo">
            <img src="titre.jpg" alt="Titre" class="titre-image">
        </div>
        <nav class="header-right">
            <ul>
                <li><a href="index.php"><img src="accueil.jpeg" alt="Accueil"></a></li>
                <li><a href="toutparcourir.php"><img src="Tout_parcourir.png" alt="Tout parcourir"></a></li>
                <li><a href="recherche.php"><img src="rechercher.jpeg" alt="Rechercher"></a></li>
                <li><a href="rdv.php"><img src="Rendez_vous.png" alt="Rendez-vous"></a></li>
                <li><a href="connexion.php"><img src="Votre_compte.png" alt="Votre Compte"></a></li>
            </ul>
        </nav>
    </header>

    <section class="result-container">
        <h2>Résultats de la recherche pour: <?php echo htmlspecialchars($query); ?></h2>
        <?php if ($proprietes): ?>
            <?php foreach ($proprietes as $propriete): ?>
                <div class="result-details">
                    <h3><?php echo htmlspecialchars($propriete['titre'] ?? ''); ?></h3>
                    <p><strong>Adresse:</strong> <?php echo htmlspecialchars($propriete['adresse'] ?? ''); ?></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($propriete['description'] ?? ''); ?></p>
                    <p><strong>Prix:</strong> <?php echo htmlspecialchars($propriete['prix'] ?? ''); ?> €</p>
                    <div id="map<?php echo $propriete['id']; ?>" class="map"></div>
                    <script>
                        var map<?php echo $propriete['id']; ?> = L.map('map<?php echo $propriete['id']; ?>').setView([<?php echo $propriete['latitude'] ?? 0; ?>, <?php echo $propriete['longitude'] ?? 0; ?>], 15);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map<?php echo $propriete['id']; ?>);

                        L.marker([<?php echo $propriete['latitude'] ?? 0; ?>, <?php echo $propriete['longitude'] ?? 0; ?>]).addTo(map<?php echo $propriete['id']; ?>)
                            .bindPopup('<h3><?php echo htmlspecialchars($propriete['titre'] ?? ''); ?></h3><p><?php echo htmlspecialchars($propriete['adresse'] ?? ''); ?></p>')
                            .openPopup();
                    </script>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun résultat trouvé</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>Contactez-nous:</p>
        <p>Email: contact@omnesimmobilier.com</p>
        <p>Téléphone: 06 98 26 84 48</p>
        <p>Adresse: 10 rue Sextius Michel, 75015 Paris</p>
    </footer>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>
