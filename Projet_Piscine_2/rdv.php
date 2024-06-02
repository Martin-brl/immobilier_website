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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-6dYyjHdjz1yKX3z+dP6KBe2slnEzzUzO31m9fnlB06Rj8VzvJ4K9Y8W5j6/qcAzFWMykMCZ8EaB5yZ4q2v5HBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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

    <section class="votre-compte-container">
            <h2>Connexion :</h2>
            <form class="votre-compte-form" method="GET" action="gestion_rdv.php">
                                                
                <label for="heure">Heure : </label>
                <input type="time" id="heure" name="heure" required>
                
                <label for="propriete">Adresse de la propriété</label>
                <input type="text" id="adresse" name="propriete_adresse" required>
                
                
                <button type="submit" class="votre-compte-button">Se connecter</button>
            </form>
        </section>
    </div>
    <main>
        <section class="rendez-vous-container">
            <h1>Vos Rendez-vous</h1>
            <div id='calendar'></div>
        </section>
    </main>
    <footer>
        <div class="wrapper">
            <p>Omnes Immobilier - Au service de vos besoins immobiliers</p>
            <p>Contactez-nous: contact@omnesimmobilier.fr | +33 01 23 45 67 89</p>
        </div>
    </footer>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src="script.js"></script>
</body>
</html>
