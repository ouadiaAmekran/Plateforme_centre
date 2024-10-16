<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mot de passe oublié</title>
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
    .forgot-container {
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      width: 300px;
      text-align: center;
    }
    .forgot-container h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .forgot-container input[type="email"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .forgot-container input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .forgot-container input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="forgot-container">
    <h2>Mot de passe oublié</h2>
    <form action="send_reset_link.php" method="post">
      <input type="email" name="email" placeholder="Votre email" required>
      <input type="submit" value="Envoyer le lien de réinitialisation">
    </form>
  </div>
</body>
</html>