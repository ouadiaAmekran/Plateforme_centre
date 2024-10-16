<?php
require 'database.php'; // Inclusion du fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Vérifiez si le jeton est valide
    $stmt = $conn->prepare("SELECT * FROM password_resets WHERE email = ? AND token = ? AND expires_at > NOW()");
    $stmt->execute([$email, $token]);

    if ($stmt->rowCount() > 0) {
        // Le jeton est valide, mettez à jour le mot de passe de l'utilisateur
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE email = ?");
        $stmt->execute([$hashed_password, $email]);

        // Supprimez le jeton de réinitialisation
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->execute([$email]);

        echo "Votre mot de passe a été mis à jour avec succès.";
    } else {
        echo "Le lien de réinitialisation est invalide ou a expiré.";
    }
} else {
    // Affichez le formulaire de réinitialisation du mot de passe
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        echo '
        <form method="POST" action="reset_admin_password.php">
            <input type="hidden" name="token" value="'.$token.'">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required>
            <button type="submit">Reset Password</button>
        </form>';
    } else {
        echo "Le lien de réinitialisation est invalide.";
    }
}
?>
