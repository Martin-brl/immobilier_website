<?php
session_start();
if(!@$_SESSION['user_id']) die("not logged");   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnes Immobilier - Accueil</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 300px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Splash Screen -->
    <div id="splash-screen">
        <div class="splash-content">
            <img src="splash-image.jpeg" alt="Image de démarrage" class="splash-image">
            <p>Soirée de rencontre CLIENT / PROPRIETAIRE !<br> Samedi 8 juin venez rencontrer votre futur ACHETEUR / PROPRIETAIRE à la grosse soirée Omnes Immobilier ! <br>Aux programmes : <br> Rencontre client, Juste-Prix sur des propriétés, Jeu "Trouve-ton proprio", Conférence "Comment garder la caution à coup sûr ?" </p> 
            <button id="close-splash">X</button>
        </div>
    </div>

   <!-- **************************************************************************************-->
        <header>
            <div class="header-left">
                <img src="logo.png" alt="Omnes Immobilier Logo" class="logo">
                <img src="titre.jpg" alt="Titre" class="titre-image">
                <div><?php echo $_SESSION['user_prenom'],' ', $_SESSION['user_nom']; ?></div>
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
<!-- **************************************************************************************-->
       <section class="welcome-section">
    <div class="welcome-content">
        <h1>Bienvenue chez Omnes Immobilier</h1>
        <h2>L'agence numéro <span class="highlight">1</span> sur Paris</h2>
        <h2><span class="highlight">+25 000</span> biens vendus</h2>
    </div>
        </section>
<!-- **************************************************************************************-->
        <section class="carousel-section">
            <h3>Nos nouvelles annonces parisiennes</h3>

            <div class="carousel-container">
                <button id="carousel-prev" class="carousel-button">⬅️</button>
                <div class="carousel-track-container">
                    <ul class="carousel-track">
                        <li class="carousel-slide"><img src="annonce1.jpeg" alt="Annonce 1"></li>
                        <li class="carousel-slide"><img src="annonce2.jpeg" alt="Annonce 2"></li>
                        <li class="carousel-slide"><img src="annonce3.jpeg" alt="Annonce 3"></li>
                        <li class="carousel-slide"><img src="annonce4.jpeg" alt="Annonce 4"></li>
                        <li class="carousel-slide"><img src="annonce5.jpeg" alt="Annonce 5"></li>
                        <li class="carousel-slide"><img src="annonce6.jpeg" alt="Annonce 6"></li>
                        <li class="carousel-slide"><img src="annonce7.jpeg" alt="Annonce 7"></li>
                        <li class="carousel-slide"><img src="annonce8.jpeg" alt="Annonce 8"></li>
                        <li class="carousel-slide"><img src="annonce9.jpeg" alt="Annonce 9"></li>
                        <li class="carousel-slide"><img src="annonce10.jpeg" alt="Annonce 10"></li>
                        <li class="carousel-slide"><img src="annonce11.jpeg" alt="Annonce 11"></li>
                        <li class="carousel-slide"><img src="annonce12.jpeg" alt="Annonce 12"></li>
                        <li class="carousel-slide"><img src="annonce13.jpeg" alt="Annonce 13"></li>
                        <li class="carousel-slide"><img src="annonce14.jpeg" alt="Annonce 14"></li>
                        <li class="carousel-slide"><img src="annonce15.jpeg" alt="Annonce 15"></li>
                    </ul>
                </div>
                <button id="carousel-next" class="carousel-button">➡️</button>
            </div>
        </section>
<!-- **************************************************************************************-->
        <footer>
            <p>Contactez-nous:</p>
            <p>Email: contact@omnesimmobilier.com</p>
            <p>Téléphone: 06 98 26 84 48</p>
            <p>Adresse: 10 rue Sextius Michel, 75015 Paris</p>
            <div id="map"></div>
        </footer>
    </div>
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

<!-- **************************************************************************************-->

    <!-- Splash Screen JS -->
    <script>
        document.getElementById('close-splash').addEventListener('click', function() {
            document.getElementById('splash-screen').style.display = 'none';
        });

        // Optional: Auto-hide splash screen after 10 seconds
        setTimeout(function() {
            document.getElementById('splash-screen').style.display = 'none';
        }, 7000);
    </script>

    <!-- Include the external JavaScript file -->
    <script src="scripts.js"></script>
</body>
</html>
