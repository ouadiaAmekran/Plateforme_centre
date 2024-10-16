<?php
session_start();
include('database.php'); // Assurez-vous que 'database.php' définit correctement la connexion $conn

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer la requête SQL pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT admin_id, password FROM admins WHERE username = ?");
    $stmt->execute([$username]);

    // Vérifier si un administrateur avec ce nom d'utilisateur existe
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $admin_id = $row['admin_id'];
        $hashed_password = $row['password'];

        // Vérifier le mot de passe
        if (password_verify($password, $hashed_password)) {
            // Mot de passe correct, démarrer une session admin
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_username'] = $username;
            header("Location: dashboard.php"); // Rediriger vers le tableau de bord admin
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect pour l'administration.";
        }
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect pour l'administration.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Admin</title>
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

.login-container {
    background: rgba(0, 0, 0, 0.6); /* Noir avec 70% d'opacité */
    padding: 40px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 12px rgba(0, 0, 0, 0.1); /* Ombre portée plus prononcée pour un effet de brillance */
    border-radius: 8px;
    width: 250px; /* Réduit la largeur de la boîte */
    min-height: 450px; /* Augmente la hauteur minimale de la boîte */
    text-align: center;
}

.login-container h2 {
    margin-bottom: 20px;
    color: #ffffff; /* Couleur du texte du titre pour contraster avec le fond noir */
}

.login-container input[type="text"],
.login-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.login-container input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007BFF; /* Couleur de fond du bouton de connexion pour contraster avec le fond noir */
    color: black;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.login-container input[type="submit"]:hover {
    background-color:#0056b3; /* Couleur de fond du bouton au survol pour contraster avec le fond noir */
}

.login-container .register-link,
.login-container .forgot-link {
    margin-top: 20px;
    display: block;
    color: #ffffff; /* Couleur des liens pour contraster avec le fond noir */
    text-decoration: none;
}

.login-container .register-link:hover,
.login-container .forgot-link:hover {
    text-decoration: underline;
}

.error {
    color: red;
    margin-top: 20px;
}

  </style>
</head>
<body>
  <div class="login-container">
    <h2>Connexion Admin</h2>
    <form action="admin_login.php" method="post">
      <input type="text" name="username" placeholder="Nom d'utilisateur" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <input type="submit" value="Se connecter">
    </form>
    
    <a href="forget_admin.php" class="forgot-link">Mot de passe admin oublié ?</a>
    <?php if (!empty($error)) { echo '<p class="error">' . $error . '</p>'; } ?>
  </div>
</body>
</html>
