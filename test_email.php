<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
    $mail->addAddress('adresse_destinataire@example.com'); // Remplacez par l'adresse de destinataire
    $mail->Subject = 'Test Email';
    $mail->Body = 'Ceci est un email de test envoyé via PHPMailer.';

    $mail->send();
    echo "L'email a été envoyé avec succès.";
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
}
?>
