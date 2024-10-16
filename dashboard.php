

<?php
// Connexion à la base de données
include_once 'database.php'; // Assurez-vous d'inclure votre fichier de configuration de connexion

// Récupérer le nombre de formations
try {
    $stmt = $conn->query("SELECT COUNT(*) as count FROM student");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombreCertificats = $result['count'];
} catch(PDOException $e) {
    echo "Erreur lors de la récupération du nombre de certificats : " . $e->getMessage();
}

// Récupérer le nombre de certificats
try {
    $stmt = $conn->query("SELECT COUNT(DISTINCT formation) as count FROM student");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombreFormations = $result['count'];
} catch(PDOException $e) {
    echo "Erreur lors de la récupération du nombre de formations : " . $e->getMessage();
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css">
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('for.jpg');
    background-repeat: no-repeat; /* Empêche la répétition de l'image */
    background-size: cover; /* Couvre toute la surface sans répétition */
    background-attachment: fixed; /* Fixe l'image de fond pour qu'elle ne se déplace pas avec le défilement */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Pour s'assurer que le footer reste en bas */
        }
       .navbar {
    display: flex;
    align-items: center; /* Centre verticalement les éléments */
    justify-content: space-between; /* Place le logo à gauche et les liens de navigation à droite */
    background-color: rgba(40, 53, 147, 0.7); /* Couleur de fond avec transparence */
    color: white;
    padding: 10px 20px; /* Ajuste le padding vertical et horizontal */
}

.navbar .logo-link {
    display: inline-block;
    cursor: pointer; /* Change le curseur pour indiquer que c'est cliquable */
    margin-right: auto; /* Pousse les éléments de navigation à droite */
}

.navbar img {
    height: 50px; /* Réduit la hauteur du logo */
}

.navbar a {
    color: white;
    text-decoration: none;
    padding: 10px 20px; /* Ajuste le padding autour du texte */
    background-color: rgba(0, 0, 0, 0.6); /* Couleur de fond avec transparence */
    border-radius: 5px;
    text-align: center;
    margin: 0 5px; /* Espacement horizontal entre les éléments */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transitions pour les effets de survol */
}

.navbar a:hover {
    background-color: #283593; /* Change la couleur de fond au survol */
    transform: scale(1.05); /* Agrandit légèrement l'élément au survol */
}

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            flex: 1; /* Pour occuper l'espace restant */
            display: flex;
            justify-content: space-between; /* Pour aligner les éléments sur les côtés */
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            width: 48%; /* Ajustement pour l'espacement */
        }
        .card {
    color: white; /* Définit la couleur du texte à l'intérieur des éléments .card en blanc */
}

.card {
    background: rgba(40, 53, 147, 0.5);
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: center;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
    color: white; /* Définit la couleur du texte à l'intérieur des éléments .card en blanc */
}

.card:hover {
    background-color: #f0f0f0;
    color: #0056b3; /* Change la couleur du texte au survol */
    border: 1px solid #0056b3; /* Change la couleur de la bordure au survol */
}

        .card h3 {
            margin: 0;
            font-size: 2em;
        }

        #color-calendar {
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            align-self: flex-start; /* Pour placer le calendrier sur le côté droit */
            margin-top: 77px; /* Espace entre le calendrier et les cartes */
        }

        .footer {
            background-color: #283593;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }
    </style>
</head>

<body> 
    
    <div class="navbar">
     <div class="logo-link" onclick="window.location.href='index.php'">
            <img src="logo-formation.png" alt="Logo">
        </div>
        <a href="dashboard.php" class="active">Tableau de Bord</a>
        <a href="certificats.php">Certificats</a>
        <a href="rechercher.php">Rechercher</a> 
        <a href="logout.php">Déconnexion</a>  
    </div>

    <div class="container"> 
       
        <div class="dashboard"> 
        <p><P><p>
            <div class="card">
                <h3><?php echo $nombreFormations; ?></h3>
                <p>Nombre de Matières</p>
            </div> </p></p></p>
            <div class="card">
                <h3><?php echo $nombreCertificats; ?></h3>
                <p>Nombre des certificats</p>
            </div>
        </div>

        <div id="color-calendar"></div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Tableau de Bord. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.min.js"></script>
    <script>
        const myEvents = [{
            start: '2022-01-01',
            end: '2022-01-01',
            name: 'fichier de consomation',
            desc: 'Ajouter le fichier de consomation annuelle pour fixer les erreurs au niveau des données',
        }];

        new Calendar({
            id: '#color-calendar',
            eventsData: myEvents,
            calendarSize: 'medium', // Taille du calendrier
            theme: 'glass', // Thème de style verre
            primaryColor: 'rgba(40, 53, 147, 0.7)',
            headerColor: 'white',
            headerBackgroundColor: '#283593',
            borderRadius: '2.50rem',
        });
    </script>
</body>

</html>
