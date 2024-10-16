<?php
session_start();

// Vérifiez si l'utilisateur est connecté et est un admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
}
?>
