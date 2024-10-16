<?php
// Fonction pour générer le hachage d'un mot de passe
function generatePasswordHash($password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashedPassword;
}

// Exemple d'utilisation
$password = '123'; // Remplacez '123' par le mot de passe souhaité pour l'administrateur
$hashedPassword = generatePasswordHash($password);

echo "Mot de passe en clair : $password<br>";
echo "Mot de passe haché : $hashedPassword";
?>
