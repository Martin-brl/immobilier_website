<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("not logged");
}
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biens_immobiliers";
$port = "3306";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    alert("erreur de connexion à la bas de donnée");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $client_id = $_SESSION['user_id'];
        $agent_id = $_POST['agent_id'];
        $propriete_id = $_POST['propriete_id'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $status = 0; // 0 = non confirmé, 1 = confirmé

        $stmt = $conn->prepare('INSERT INTO rendezvous (client_id, agent_id, propriete_id, date, heure, status) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$client_id, $agent_id, $propriete_id, $date, $heure, $status]);
        echo json_encode(['status' => 'success']);
        exit;
    } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];

        $stmt = $conn->prepare('DELETE FROM rendezvous WHERE id = ?');
        $stmt->execute([$id]);
        echo json_encode(['status' => 'success']);
        exit;
    }
}

$rendezvous = [];
$stmt = $conn->query('SELECT r.id, r.client_id, p.adresse, r.date, r.heure, r.status 
                     FROM rendezvous r
                     JOIN proprietes p ON r.propriete_id = p.id');
while ($row = $stmt->fetch_assoc()) {
    $rendezvous[] = [
        'id' => $row['id'],
        'title' => "Rendez-vous avec l'agent " . $row['client_id'],
        'start' => $row['date'] . 'T' . $row['heure'],
        'adresse' => $row['adresse'],
        'status' => $row['status']
    ];
}
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
            <div><?php echo $_SESSION['user_prenom'] . ' ' . $_SESSION['user_nom']; ?></div>
        </div>
        <nav class="header-right">
            <ul>
                <li><a href="index.php"><img src="accueil.jpeg" alt="Accueil"></a></li>
                <li><a href="toutparcourir.php"><img src="Tout_parcourir.png" alt="Tout parcourir"></a></li>
                <li><a href="recherche.php"><img src="rechercher.jpeg" alt="Rechercher"></a></li>
                <li><a href="rdv/rdv.php"><img src="Rendez_vous.png" alt="Rendez-vous"></a></li>
                <li><a href="connexion.php"><img src="Votre_compte.png" alt="Votre Compte"></a></li>
            </ul>
        </nav>
    </header>

    <section class="votre-compte-container">
        <h2>Connexion :</h2>
        <form class="votre-compte-form" method="POST" action="gestion_rdv.php">
            <input type="hidden" name="action" value="add">
            <label for="agent_id">Agent ID :</label>
            <input type="text" id="agent_id" name="agent_id" required>
            
            <label for="propriete_id">Propriété ID :</label>
            <input type="text" id="propriete_id" name="propriete_id" required>
            
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
            
            <label for="heure">Heure :</label>
            <input type="heure" id="heure" name="heure" required>
            
            <button type="submit" class="votre-compte-button">Ajouter rendez-vous</button>
        </form>
    </section>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var rendezvous = <?php echo json_encode($rendezvous); ?>;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                events: rendezvous,
                dateClick: function(info) {
                    var dateStr = info.dateStr;
                    var title = prompt('Entrez le titre du rendez-vous:');
                    var adresse = prompt('Entrez l\'adresse de la propriété:');
                    var heure = prompt('Entrez l\'heure du rendez-vous (HH:MM):');
                    if (title && adresse && heure) {
                        fetch('rdv.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams({
                                action: 'add',
                                agent_id: '', // Notez que l'agent_id n'est pas inclus ici, assurez-vous d'ajuster cette partie selon vos besoins
                                propriete_id: '', // Notez que le propriete_id n'est pas inclus ici, assurez-vous d'ajuster cette partie selon vos besoins
                                adresse: adresse,
                                date: dateStr,
                                heure: heure
                            })
                        }).then(response => response.json())
                          .then(data => {
                            if (data.status === 'success') {
                                calendar.refetchEvents();
                                alert('Rendez-vous créé avec succès.');
                            }
                          });
                    }
                },
                eventClick: function(info) {
                    if (confirm('Voulez-vous annuler ce rendez-vous: ' + info.event.title + '?')) {
                        fetch('rdv.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams({
                                action: 'delete',
                                id: info.event.id
                            })
                        }).then(response => response.json())
                          .then(data => {
                            if (data.status === 'success') {
                                calendar.refetchEvents();
                                alert('Rendez-vous annulé avec succès.');
                            }
                          });
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>

