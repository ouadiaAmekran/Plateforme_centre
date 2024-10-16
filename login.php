<?php
session_start();
include('database.php'); // Assurez-vous que 'database.php' définit correctement la connexion $conn

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer la requête SQL pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);

    // Vérifier si un utilisateur avec ce nom d'utilisateur existe
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $row['user_id'];
        $hashed_password = $row['password'];

        // Vérifier le mot de passe
        if (password_verify($password, $hashed_password)) {
            // Mot de passe correct, démarrer une session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: recherche_user.php"); // Rediriger vers le tableau de bord
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f0f0f0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
    }
    .login-container {
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      width: 300px;
      text-align: center;
    }
    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
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
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .login-container input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .login-container .register-link,
    .login-container .forgot-link {
      margin-top: 20px;
      display: block;
      color: #007BFF;
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
    <h2>Connexion</h2>
    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="Nom d'utilisateur" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <input type="submit" value="Se connecter">
    </form>
    <a href="register.php" class="register-link">Pas de compte ? Inscrivez-vous</a>
    <a href="forget.php" class="forgot-link">Mot de passe oublié ?</a>
    <?php if (!empty($error)) { echo '<p class="error">' . $error . '</p>'; } ?>
  </div>
</body>
</html>