<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Récupération de mot de passe Admin</title>
  <style>
   body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('for.jpg');
    background-repeat: no-repeat; /* Empêche la répétition de l'image */
    background-size: cover; /* Couvre toute la surface sans répétition */
    background-attachment: fixed; /* Fixe l'image de fond pour qu'elle ne se déplace pas avec le défilement */
    color: #333;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Occupe toute la hauteur de la fenêtre */
}

.reset-container {
    background-color: rgba(0, 0, 0, 0.6); /* Couleur de fond noire transparente */
    padding: 40px; /* Augmente le padding pour une plus grande hauteur visuelle */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    width: 250px; /* Réduit la largeur de la boîte */
    min-height: 400px; /* Augmente la hauteur minimale de la boîte */
    text-align: center;
}

.reset-container h2 {
    margin-bottom: 20px;
    color: #fff; /* Couleur du texte en blanc pour contraste */
}

.reset-container input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.reset-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007BFF; /* Couleur de fond du bouton de soumission */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.reset-container input[type="submit"]:hover {
    background-color: #0056b3; /* Couleur de fond du bouton au survol */
}

  </style>
</head>
<body>
  <div class="reset-container">
    <h2>Récupération de mot de passe Admin</h2>
    <form method="POST" action="send_admin_reset_link.php">
      <input type="email" name="email" placeholder="Adresse e-mail" required>
      <input type="submit" value="Envoyer le lien de réinitialisation">
    </form>
  </div>
</body>
</html>
