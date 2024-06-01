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
        <div class="wrapper">
            <img src="logo.png" alt="Omnes Immobilier" class="logo">
            <div class="titre-text">
                <h1>Omnes Immobilier</h1>
                <h2>Au service de vos besoins immobiliers</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="parcourir.html">Tout Parcourir</a></li>
                    <li><a href="recherche.html">Recherche</a></li>
                    <li><a href="rendezvous.html">Rendez-vous</a></li>
                    <li><a href="votrecompte.html">Votre Compte</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="votre-compte-container">
            <h2>Connexion :</h2>
            <form class="votre-compte-form" method="GET" action="gestion_rdv.php">
                                                
                <label for="heure">Heure : </label>
                <input type="time" id="heure" name="heure" required>
                
                <label for="propriete">Nom de La propriété</label>
                <input type="text" id="mdp" name="mdp" required>
                
                
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
