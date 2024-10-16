<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Vérifiez le token et récupérez l'email correspondant
    // (Remplacez par votre propre vérification de base de données)
    // Par exemple : $email = getEmailByToken($token);

    if ($email) {
        // Mettez à jour le mot de passe dans la base de données
        // (Remplacez par votre propre mise à jour de base de données)
        // Par exemple : updatePassword($email, password_hash($new_password, PASSWORD_DEFAULT));

        // Supprimez le token de la base de données après utilisation
        // (Remplacez par votre propre suppression de token)
        // Par exemple : deleteToken($token);

        echo "Votre mot de passe a été réinitialisé avec succès.";
    } else {
        echo "Lien de réinitialisation invalide ou expiré.";
    }
} else {
    header("Location: forgot_password.html");
    exit();
}
?>