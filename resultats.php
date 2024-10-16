<?php
// Vérification si l'ID du certificat est passé en paramètre
if (isset($_GET['id'])) {
    $certificat_id = $_GET['id'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "handbyje_formation";
    $password = "stageinisation123";
    $dbname = "handbyje_centre";

    try {
        // Création d'une nouvelle connexion PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration du mode d'affichage des erreurs PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        // Affichage d'un message d'erreur en cas d'échec de la connexion
        echo "Connection failed: " . $e->getMessage();
        // Arrêt de l'exécution du script
        exit();
    }

    // Préparation de la requête SQL pour récupérer les détails du certificat
    $sql = $conn->prepare("SELECT * FROM student WHERE nemuro_certificate = :certificat_id");
    $sql->execute(['certificat_id' => $certificat_id]);

    // Vérification si le certificat a été trouvé
    if ($sql->rowCount() > 0) {
        $certificat = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Certificat non trouvé.";
        exit;
    }

    // Fermeture de la connexion à la base de données
    $conn = null;

    // Génération du QR code
    include('phpqrcode-master/phpqrcode-master/phpqrcode.php');

    // Obtenir l'URL de base dynamiquement
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
    $qrText = $protocol . $domainName . 'resultats.php?id=' . $certificat_id; // URL dynamique

    $qrDir = 'qrcodes/';
    $qrFile = $qrDir . $certificat_id . '.png';

    // Vérifier si le répertoire existe, sinon le crée
    if (!is_dir($qrDir)) {
        mkdir($qrDir, 0777, true);
    }

    QRcode::png($qrText, $qrFile, QR_ECLEVEL_L, 10); // Générer le QR code
} else {
    echo "ID du certificat non spécifié.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Certificat</title>
    <!-- Inclure html2pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif; /* Assurez-vous que la police est cohérente */
        }
        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            padding: 10px;
            border: 1px solid #000;
            background-color: white;
        }
        .certificat-details {
            border: 15px solid #283593; /* Couleur de la bordure bleue */
            padding: 10px;
            margin: 10px 0;
            position: relative;
            display: inline-block;
            text-align: left;
            background: linear-gradient(to right, white, white); /* Dégradé de bleu à rouge */
            border-radius: 10px; /* Coins arrondis pour un effet visuel agréable */
            width: 100%; /* Assurez-vous que la largeur est correcte */
            box-sizing: border-box; /* Inclure les bordures et le padding dans la largeur totale */
        }
        .certificat-details .title {
            text-align: center;
            margin-bottom: 20px;
        }
        .certificat-details .title h2 {
            margin: 0;
            font-size: 36px; /* Augmentez la taille de la police si nécessaire */
            font-weight: bold;
            color: #333;
            font-family: 'Lora', serif; /* Utilisation de la nouvelle police */
        }
        .certificat-details span {
            color: red; /* Couleur pour les valeurs importantes */
            font-weight: bold;
        }
        .actions {
            margin-top: 20px;
            text-align: center;
        }
        .actions button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .actions button:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
        .logo img {
            width: 150px;
            display: block;
            margin: 0 auto;
        }
        .signature img {
            width: 100px;
            display: block;
            margin: 20px auto 0;
            float: left;
        }
        .qr-code img {
            position: right;
            bottom: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
        }
        .signature-and-qr {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="certificat-details" id="certificat">
            <div class="logo">
                <img src="logo-formation.png" alt="Logo">
            </div>
            <div class="title">
                <h2>Certificat d'Appréciation</h2>
            </div>
            <p><strong>Numéro du Certificat:</strong> <span><?php echo htmlspecialchars($certificat["nemuro_certificate"]); ?></span></p>
            <p>Nous certifions que ce certificat a été attribué à M./Mme <span><?php echo htmlspecialchars($certificat["nomprenom"]); ?></span>, portant le numéro d'étudiant <span><?php echo htmlspecialchars($certificat["numero_etud"]); ?></span>. Né(e) le <span><?php echo htmlspecialchars($certificat["date_naissance"]); ?></span>, M./Mme <span><?php echo htmlspecialchars($certificat["nomprenom"]); ?></span> a suivi avec succès la formation en <span><?php echo htmlspecialchars($certificat["formation"]); ?></span> et a obtenu ce certificat le <span><?php echo htmlspecialchars($certificat["date_obtention"]); ?></span>.</p>
            <div class="signature-and-qr">
                <div class="qr-code">
                   <img class="qr-code" src="<?php echo $qrFile; ?>" alt="QR Code">
                </div>
                <div class="signature">
                    <img src="signateure.jpg" alt="Signature">
                </div>
                
            </div>
        </div>
    </div>
    <div class="actions">
        <button class="print" onclick="window.print()">Imprimer</button>
        <button class="download" onclick="downloadPDF()">Télécharger</button>
        <button class="share" onclick="shareCertificat()">Partager</button>
    </div>
    <div class="footer">
        <p>&copy; 2024 Tableau de Bord. Tous droits réservés.</p>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('certificat');
            const options = {
                margin: [10, 10, 10, 10],
                filename: 'certificat.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, useCORS: true }, // Assurez-vous que les images sont correctement chargées
                jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().from(element).set(options).save();
        }

        function shareCertificat() {
            if (navigator.share) {
                navigator.share({
                    title: 'Certificat',
                    text: 'Consultez ce certificat.',
                    url: window.location.href
                }).then(() => {
                    console.log('Partage réussi');
                }).catch((error) => {
                    console.error('Erreur de partage', error);
                });
            } else {
                alert('Le partage n\'est pas supporté par votre navigateur.');
            }
        }
    </script>
</body>
</html>

