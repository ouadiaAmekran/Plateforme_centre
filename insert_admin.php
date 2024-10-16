<?php
require 'database.php'; // Inclusion du fichier de connexion à la base de données

// Détails de l'administrateur
$nomprenom = 'CHAYMAE'; // Remplacez par le nom de l'administrateur
$email = 'elfahssichaymae27@gmail.com'; // Remplacez par l'email de l'administrateur
$username = 'Admin'; // Remplacez par le nom d'utilisateur de l'administrateur
$hashedPassword = '$2y$10$uINtkWYcCVFHgobAJdhzsOoyynB4YlTwUejiADtIeRlwtmwJLGi1C'; // Remplacez par le mot de passe haché obtenu dans generate_hash.php

// Insérer l'administrateur dans la base de données
$stmt = $conn->prepare("INSERT INTO admins (nomprenom, email, username, password) VALUES (?, ?, ?, ?)");
$stmt->execute([$nomprenom, $email, $username, $hashedPassword]);

echo "Administrateur inséré avec succès.";
?>
