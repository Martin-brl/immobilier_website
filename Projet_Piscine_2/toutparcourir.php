<?php
session_start();
if(!@$_SESSION['user_id']) die("not logged");   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnes Immobilier - Rendez-vous</title>
    <link rel="stylesheet" href="styles.css">
     <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
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
<!-- ************************************************************************************************************************-->

<!-- Contenu spécifique à la page "Tout Parcourir" -->
    <div class="wrapper" id="capture-content">
        <div class="categories">
            <h2>Tout Parcourir</h2>
            <ul>
                <li><a href="#residentiel">Immobilier Résidentiel</a></li>
                <li><a href="#commercial">Immobilier Commercial</a></li>
                <li><a href="#terrain">Terrain</a></li>
                <li><a href="#appartement">Appartement à Louer</a></li>
            </ul>
        </div>

        <div id="residentiel" class="category">
            <h3>Immobilier Résidentiel</h3>
            <button class="agents-button" onclick="window.location.href='agents_residentiel.html'">Nos agents immobiliers</button>
            <div class="carousel">
                <div><a href="propriete1.html"><img src="annonce1.jpg" alt="Annonce 1"></a></div>
                <div><a href="propriete2.html"><img src="annonce2.jpg" alt="Annonce 2"></a></div>
                <div><a href="propriete3.html"><img src="annonce3.jpg" alt="Annonce 3"></a></div>
                <div><a href="propriete4.html"><img src="annonce4.jpg" alt="Annonce 4"></a></div>
                <div><a href="propriete5.html"><img src="annonce5.jpg" alt="Annonce 5"></a></div>
                <div><a href="propriete6.html"><img src="annonce6.jpg" alt="Annonce 6"></a></div>
            </div>
        </div>

        <div id="commercial" class="category">
            <h3>Immobilier Commercial</h3>
            <button class="agents-button" onclick="window.location.href='agents_commercial.html'">Nos agents immobiliers</button>
            <div class="carousel">
                <div><a href="propriete7.html"><img src="annonce1.jpg" alt="Annonce 1"></a></div>
                <div><a href="propriete8.html"><img src="annonce2.jpg" alt="Annonce 2"></a></div>
                <div><a href="propriete9.html"><img src="annonce3.jpg" alt="Annonce 3"></a></div>
                <div><a href="propriete10.html"><img src="annonce4.jpg" alt="Annonce 4"></a></div>
                <div><a href="propriete11.html"><img src="annonce5.jpg" alt="Annonce 5"></a></div>
                <div><a href="propriete12.html"><img src="annonce6.jpg" alt="Annonce 6"></a></div>
            </div>
        </div>

        <div id="terrain" class="category">
            <h3>Terrain</h3>
            <button class="agents-button" onclick="window.location.href='agents_terrain.html'">Nos agents immobiliers</button>
            <div class="carousel">
                <div><a href="propriete13.html"><img src="terrain1.jpg" alt="Annonce 1"></a></div>
                <div><a href="propriete14.html"><img src="terrain2.jpg" alt="Annonce 2"></a></div>
                <div><a href="propriete15.html"><img src="terrain3.jpg" alt="Annonce 3"></a></div>
                <div><a href="propriete16.html"><img src="terrain4.jpg" alt="Annonce 4"></a></div>
                <div><a href="propriete17.html"><img src="terrain5.jpg" alt="Annonce 5"></a></div>
                <div><a href="propriete18.html"><img src="terrain6.jpg" alt="Annonce 6"></a></div>
            </div>
        </div>

        <div id="appartement" class="category">
            <h3>Appartement à Louer</h3>
            <button class="agents-button" onclick="window.location.href='agents_appartement.html'">Nos agents immobiliers</button>
            <div class="carousel">
                <div><a href="propriete19.html"><img src="appartement1.jpg" alt="Annonce 1"></a></div>
                <div><a href="propriete20.html"><img src="appartement2.jpg" alt="Annonce 2"></a></div>
                <div><a href="propriete21.html"><img src="appartement3.jpg" alt="Annonce 3"></a></div>
                <div><a href="propriete22.html"><img src="appartement4.jpg" alt="Annonce 4"></a></div>
                <div><a href="propriete23.html"><img src="appartement5.jpg" alt="Annonce 5"></a></div>
                <div><a href="propriete24.html"><img src="appartement6.jpg" alt="Annonce 6"></a></div>
            </div>
        </div>
    </div>