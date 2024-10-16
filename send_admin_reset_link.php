<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que le chemin est correct
require 'database.php'; // Inclusion du fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Vérifier si l'email appartient à un admin
    $stmt_admins = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt_admins->execute([$email]);

    if ($stmt_admins->rowCount() > 0) {
        $admin = $stmt_admins->fetch(PDO::FETCH_ASSOC);

        // Créer un jeton de réinitialisation unique
        $token = bin2hex(random_bytes(50));

        // Enregistrer le jeton dans la base de données avec l'email et une date d'expiration
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expires_at]);

        // Envoyer l'email avec le lien de réinitialisation
        $resetLink = "http://localhost:3000/reset_admin_password.php?token=" . $token;
        $subject = "Réinitialisation de votre mot de passe administrateur";
        $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : " . $resetLink;

        $mail = new PHPMailer(true);

        try {
            // Configurations SMTP pour Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'elfahssichaymae27@gmail.com'; // Remplacez par votre email Gmail
            $mail->Password = 'VEJGJLELMEMEFFFX'; // Remplacez par votre mot de passe d'application
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataire et contenu de l'email
            $mail->setFrom('noreply@votre-site.com', 'Votre Site');
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo "Un email de réinitialisation a été envoyé à votre adresse email.";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
        }
    } else {
        echo "Aucun administrateur trouvé avec cet email.";
    }
} else {
    header("Location: forget_admin.php");
    exit();
}
?>
