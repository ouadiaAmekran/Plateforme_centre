<?php

session_start();
include('database.php'); // Assurez-vous que 'database.php' définit correctement la connexion $conn

$error = '';


// Traitement de la suppression d'un certificat
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM student WHERE nemuro_certificate = :id");
        $stmt->bindParam(':id', $delete_id);
        $stmt->execute();

        // Redirection vers la même page pour actualiser les données
        header("Location: certificats.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
}

// Traitement de l'ajout d'un certificat
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom']) && isset($_POST['numero']) && isset($_POST['date_naissance']) && isset($_POST['formation']) && isset($_POST['date_obtention'])) {
    $nom = $_POST['nom'];
    $numero = $_POST['numero'];
    $date_naissance = $_POST['date_naissance'];
    $formation = $_POST['formation'];
    $date_obtention = $_POST['date_obtention'];
    
    // Insérer les données dans la base de données
    try {
        $stmt = $conn->prepare("INSERT INTO student ( nomprenom, numero_etud, formation, date_naissance, date_obtention) 
                                VALUES ( :nom, :numero, :formation, :date_naissance, :date_obtention)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':formation', $formation);
        $stmt->bindParam(':date_obtention', $date_obtention);
        $stmt->execute();

        // Redirection vers la même page pour actualiser les données
        header("Location: certificats.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
    }
}

// Récupérer tous les certificats depuis la base de données
try {
    $stmt = $conn->query("SELECT * FROM student");
    $certificats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Erreur lors de la récupération des certificats : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificats</title>
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
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
           
           color:white;
        }

   .nav {
    display: flex;
    align-items: center; /* Centre verticalement les éléments */
    justify-content: space-between; /* Place le logo à gauche et les liens de navigation à droite */
    background-color: rgba(40, 53, 147, 0.7); /* Couleur de fond avec transparence */
    color: white;
    padding: 10px 20px; /* Ajuste le padding vertical et horizontal */
}

.nav .logo-link {
    display: inline-block;
    cursor: pointer; /* Change le curseur pour indiquer que c'est cliquable */
    margin-right: auto; /* Pousse les éléments de navigation à droite */
}

.nav img {
    height: 50px; /* Réduit la hauteur du logo */
}

.nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px; /* Ajuste le padding autour du texte */
    background-color: rgba(0, 0, 0, 0.6); /* Couleur de fond avec transparence */
    border-radius: 5px;
    text-align: center;
    margin: 0 5px; /* Espacement horizontal entre les éléments */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transitions pour les effets de survol */
}

.nav a:hover {
    background-color: #283593; /* Change la couleur de fond au survol */
    transform: scale(1.05); /* Agrandit légèrement l'élément au survol */
}


        .content {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px 0;
        }

        .content h2 {
            margin-top: 0;
        }
/* Style pour les boutons */
button {
    background-color: #283593; /* Couleur de fond */
    color: white; /* Couleur du texte */
    border: none; /* Pas de bordure */
    border-radius: 5px; /* Coins arrondis */
    padding: 10px 15px; /* Padding interne */
    cursor: pointer; /* Curseur de la main au survol */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transition pour les effets de survol */
    margin-right: 10px; /* Espacement à droite entre les boutons */
}

/* Effet de survol pour les boutons */
button:hover {
    background-color: #0056b3; /* Couleur de fond au survol */
    transform: scale(1.05); /* Agrandissement au survol */
}

/* Style pour le lien */
a {
    display: inline-block; /* Pour permettre le padding et les marges */
    background-color: #283593; /* Couleur de fond */
    color: white; /* Couleur du texte */
    text-decoration: none; /* Pas de soulignement */
    padding: 10px 15px; /* Padding interne */
    border-radius: 5px; /* Coins arrondis */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transition pour les effets de survol */
}

/* Effet de survol pour le lien */
a:hover {
    background-color: #0056b3; /* Couleur de fond au survol */
    transform: scale(1.05); /* Agrandissement au survol */
}

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #283593;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #555;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .certificat-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .certificat-table th,
        .certificat-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .certificat-table th {
            background-color: #283593;
        }

        .certificat-table td.actions {
            white-space: nowrap;
        }

        .certificat-table .actions button {
            margin-right: 5px;
        } 
        .certificat-table td {
    background-color: black; /* Ajouté pour que les cellules soient en blanc */
}
    </style>
</head>

<body>
    <div class="nav">
    <div class="logo-link" onclick="window.location.href='index.php'">
            <img src="logo-formation.png" alt="Logo">
        </div>
        <a href="dashboard.php">Tableau de Bord</a>
        <a href="certificats.php">Certificats</a>
        <a href="rechercher.php">Rechercher</a> 
        <a href="logout.php">Déconnexion</a> 
    </div>

    <div class="container">
        <div class="content">
            <h2>Ajouter un Certificat</h2>
            <form action="certificats.php" method="post">
                <div class="form-group">
                    <label for="nom">Nom et Prénom</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="numero">Numéro d'Étudiant</label>
                    <input type="text" id="numero" name="numero" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" required>
                </div>
                <div class="form-group">
                    <label for="formation">Formation</label>
                    <input type="text" id="formation" name="formation" required>
                </div>
                <div class="form-group">
                    <label for="date_obtention">Date d'Obtention</label>
                    <input type="date" id="date_obtention" name="date_obtention" required>
                </div>
                <div class="form-group">
                    <button type="submit">Soumettre</button>
                </div>
            </form>

            <h2>Liste des Certificats</h2>
            <table class="certificat-table">
                <thead>
                    <tr>
                        <th>Nom et Prénom</th>
                        <th>Numéro d'Étudiant</th>
                        <th>Date de Naissance</th>
                        <th>Formation</th>
                        <th>Date d'Obtention</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($certificats as $certificat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($certificat['nomprenom']); ?></td>
                            <td><?php echo htmlspecialchars($certificat['numero_etud']); ?></td>
                            <td><?php echo htmlspecialchars($certificat['date_naissance']); ?></td>
                            <td><?php echo htmlspecialchars($certificat['formation']); ?></td>
                            <td><?php echo htmlspecialchars($certificat['date_obtention']); ?></td>
                            <td class="actions" style="display: flex; align-items: center;">
    <form method="post" action="edit_certificat.php" style="margin-right: 10px;">
        <input type="hidden" name="edit_id" value="<?php echo $certificat['nemuro_certificate']; ?>">
        <button type="submit">Edit</button>
    </form>
    <form method="post" action="certificats.php" style="margin-right: 10px;">
        <input type="hidden" name="delete_id" value="<?php echo $certificat['nemuro_certificate']; ?>">
        <button type="submit">Supprimer</button>
    </form>
    <a href="resultats.php?id=<?php echo $certificat['nemuro_certificate']; ?>" target="_blank">Voir</a>
</td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> 
    
</body>

</html>
