<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "handbyje_formation";
$password = "stageinisation123";
$dbname = "handbyje_centre";


try {
    // Création d'une nouvelle connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
    // Configuration du mode d'affichage des erreurs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Affichage d'un message d'erreur en cas d'échec de la connexion
    echo "Connection failed: " . $e->getMessage();
    // Arrêt de l'exécution du script
    exit();
}
?>
