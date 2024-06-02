<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnes Immobilier - Rendez-vous</title>
    <link rel="stylesheet" href="styles.css"> <!-- Référence au fichier CSS combiné -->
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Styles pour centrer la barre de recherche */
        .search-container {
            text-align: center;
            margin-top: 100px; /* Espacement de la barre de recherche par rapport au haut de la page */
            background-image: url('background.jpeg'); /* Chemin vers l'image de fond */
            background-size: 100% 100%; /* Adapter la taille de l'image pour qu'elle remplisse entièrement la zone sans être déformée */
            background-repeat: no-repeat; /* Ne pas répéter l'image */
            padding: 50px; /* Ajouter un peu de marge intérieure pour améliorer la lisibilité */
            border-radius: 20px; /* Ajouter une bordure arrondie */
            max-width: 500px; /* Définir une largeur maximale pour la section */
            margin-left: auto; /* Centrer horizontalement */
            margin-right: auto; /* Centrer horizontalement */
        }
        .search-container input[type="text"] {
            width: 70%; /* Largeur de la barre de recherche */
        }
        .search-container button {
            width: 15%; /* Largeur du bouton de recherche */
        }
    </style>
</head>
<body class="search-page"> <!-- Ajout de la classe search-page au body -->
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
    <!--*-->
    <section class="search-container">
        <h2>Trouvez la propriété de vos rêves</h2>
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="Rechercher...">
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <!-- ************************************************************************************************************************-->
    <footer>
        <p>Contactez-nous:</p>
        <p>Email: contact@omnesimmobilier.com</p>
        <p>Téléphone: 06 98 26 84 48</p>
        <p>Adresse: 10 rue Sextius Michel, 75015 Paris</p>
        <div id="map"></div>
    </footer>
    <!-- **************************************************************************************-->
  
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([48.8512225, 2.2886441], 15);

        // Ajouter une couche OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter un marqueur sur la carte
        L.marker([48.8512225, 2.2886441]).addTo(map)
            .bindPopup('<h3>10 rue Sextius Michel, 75015 Paris</h3>')
            .openPopup();
    </script>
</body>
</html>
