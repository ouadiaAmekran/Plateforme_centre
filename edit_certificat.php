<?php
session_start();
include('database.php'); // Assurez-vous que 'database.php' définit correctement la connexion $conn

$error = '';

try {
    // Création d'une nouvelle connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
    // Configuration du mode d'affichage des erreurs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Affichage d'un message d'erreur en cas d'échec de la connexion
    echo "Connexion échouée : " . $e->getMessage();
    // Arrêt de l'exécution du script
    exit();
}

// Vérification de la soumission du formulaire d'édition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];

    // Récupération des données du certificat à éditer depuis la base de données
    try {
        $stmt = $conn->prepare("SELECT * FROM student WHERE nemuro_certificate = :id");
        $stmt->bindParam(':id', $edit_id);
        $stmt->execute();
        $certificat = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération du certificat : " . $e->getMessage();
    }
}

// Traitement de la soumission du formulaire d'édition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_certificat'])) {
    $edit_id = $_POST['edit_id'];
    $nom = $_POST['nom'];
    $numero = $_POST['numero'];
    $date_naissance = $_POST['date_naissance'];
    $formation = $_POST['formation'];
    $date_obtention = $_POST['date_obtention'];

    // Mise à jour des données du certificat dans la base de données
    try {
        $stmt = $conn->prepare("UPDATE student SET nomprenom = :nom, numero_etud = :numero, date_naissance = :date_naissance, formation = :formation, date_obtention = :date_obtention WHERE nemuro_certificate = :id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':formation', $formation);
        $stmt->bindParam(':date_obtention', $date_obtention);
        $stmt->bindParam(':id', $edit_id);
        $stmt->execute();

        // Redirection vers la page des certificats après l'édition
        header("Location: certificats.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de la mise à jour du certificat : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Certificat</title>
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

        .content {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px 0;
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
            background-color:#283593;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #555;
        }
    </style>
</head>

<body> <p>
    <div class="container">
        <div class="content">
            <h2>Éditer un Certificat</h2>
            <form action="edit_certificat.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $certificat['nemuro_certificate']; ?>">
                <div class="form-group">
                    <label for="nom">Nom et Prénom</label>
                    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($certificat['nomprenom']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="numero">Numéro d'Étudiant</label>
                    <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($certificat['numero_etud']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($certificat['date_naissance']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="formation">Formation</label>
                    <input type="text" id="formation" name="formation" value="<?php echo htmlspecialchars($certificat['formation']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="date_obtention">Date d'Obtention</label>
                    <input type="date" id="date_obtention" name="date_obtention" value="<?php echo htmlspecialchars($certificat['date_obtention']); ?>" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="update_certificat">Mettre à Jour</button>
                </div>
            </form>
        </div>
    </div>
    </p>
</body>

</html>
