send_email.php: <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);
    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'elfahssichaymae27@gmail.com'; // Remplacez par votre adresse email Gmail
        $mail->Password = 'VEJGJLELMEMEFFFX'; // Remplacez par votre mot de passe Gmail ou un mot de passe d'application
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Port SMTP

        // Expéditeur et destinataire
        $mail->setFrom($email, $nom);
        $mail->addAddress('elfahssichaymae27@gmail.com');

        // Contenu
        $mail->isHTML(false);
        $mail->Subject = 'Nouveau message de contact : ' . $sujet;
        $mail->Body = "Nom : $nom\nEmail : $email\nSujet : $sujet\nMessage :\n$message";

        $mail->send();
        echo 'Message envoyé avec succès !';
    } catch (Exception $e) {
        echo "Une erreur est survenue. Veuillez réessayer. Erreur : {$mail->ErrorInfo}";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>