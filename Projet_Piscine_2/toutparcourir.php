<?php
session_start();
if(!@$_SESSION['user_id']) die("not logged");   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnes Immobilier - Tout Parcourir</title>
    <link rel="stylesheet" href="ToutParcourir.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>
<body>

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

    <footer>
        <p>Contactez-nous:</p>
        <p>Email: contact@omnesimmobilier.com</p>
        <p>Téléphone: 06 98 26 84 48</p>
        <p>Adresse: 10 rue Sextius Michel, 75015 Paris</p>
        <div id="map"></div>
    </footer>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([48.8512225, 2.2886441], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([48.8512225, 2.2886441]).addTo(map)
            .bindPopup('<h3>10 rue Sextius Michel, 75015 Paris</h3>')
            .openPopup();

        $(document).ready(function(){
            $('.carousel').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                nextArrow: '<button type="button" class="slick-next">Next</button>'
            });

            $("#capture-btn").click(function() {
                html2canvas($("#capture-content")[0]).then(canvas => {
                    let link = document.createElement('a');
                    link.href = canvas.toDataURL('image/jpeg');
                    link.download = 'capture.jpg';
                    link.click();
                });
            });
        });
    </script>
</body>
</html>
