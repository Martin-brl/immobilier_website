<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnes Immobilier - Rendez-vous</title>
    <link rel="stylesheet" href="styles.css"> <!-- Référence au fichier CSS combiné -->
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
    <section>
        <h2>Trouvez la propriété de vos rêves</h2>
        <form action="search.php" method="GET">
            <input type="text" name="location" placeholder="Ville">
            <input type="number" name="min_price" placeholder="Prix Minimum" min="0">
            <input type="number" name="max_price" placeholder="Prix Maximum" min="0">
            <select name="property_type">
                <option value="">Type de Propriété</option>
                <option value="Maison">Maison</option>
                <option value="Appartement">Appartement</option>
                <option value="Studio">Studio</option>
                <option value="Loft">Loft</option>
                <option value="Duplex">Commercial</option>
            </select>
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