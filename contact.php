<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layout avec menu coulissant</title>
  <style>
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600);

    html {
      width: 100%;
      height: 100%;
    }

    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Open Sans', sans-serif;
      font-weight: 300;
      background: #FDFDFD;
    }

    .container {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      transition: all 0.3s ease;
    }

    body.menu-active .container {
      transform: scale(0.9);
    }

    .container .inner {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      overflow: hidden;
    }

    .nav {
      position: fixed;
      display: block;
      top: 0;
      left: 0;
      width: 100%;
      height: 75px;
      margin: 0;
      padding: 0 25px;
      box-sizing: border-box;
      z-index: 99;
    }

    .nav a {
      display: inline-block;
      height: 75px;
      line-height: 75px;
      font-size: 30px;
      padding: 0 25px;
      color: #283593;
      text-decoration: none;
      cursor: pointer;
      text-align: center;

      transition: all 0.32s ease;
    }

    body:not(.menu-active) .nav a.menu-activator:hover {
      transform: rotate(90deg);
    }

    body.menu-active .nav a.menu-activator {
      transform: rotate(90deg);
    }

    .nav a.white {
      color: #FAFAFA;
    }

    body.menu-active .nav a.white {
      color: #212121;
      transition: all 0.15s ease;
    }

    .nav a.link {
      float: right;
      position: relative;
      text-align: center;
    }

    .nav a.link i {
      position: absolute;
      display: block;
      transform: translateX(-50%);

      transition: all 0.32s ease;
    }

    .nav a.link i.hidden {
      opacity: 0;
      pointer-events: none;
    }

    .nav a.link:hover i {
      opacity: 0;
      pointer-events: none;
    }

    .nav a.link:hover i.hidden {
      opacity: 1;
      pointer-events: auto;
    }

    .nav i.ion-cube {
      display: inline-block;
      position: absolute;
      height: 75px;
      line-height: 75px;
      font-size: 35px;
      left: 50%;
      transform: translateX(-50%);
      color: #283593;
    }

    .container .inner .panel {
      position: relative;
      box-sizing: border-box;
      height: 100%;
      width: 50%;
      float: left;
      transform: skew(-20deg);
    }

    .container .inner .panel.panel-left {
      margin-left: -10%;
      background: #f5f5f5;
    }

    .container .inner .panel.panel-right {
      margin-right: -10%;
      background: #283593;
      color: #FAFAFA;
    }

    .container .inner .panel .panel-content {
      position: absolute;
      width: 100%;
      height: 100%;
      left: 50%;
      top: 50%;
      transform: translateX(-50%) translateY(-50%) skew(20deg);
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .container .inner .panel.panel-left .panel-content,
    .container .inner .panel.panel-right .panel-content {
      flex-direction: column;
    }

    .container .inner .panel.panel-left .panel-content .contact-info {
      color: #283593; /* Modifier la couleur du texte pour correspondre à celle des icônes */
      font-size: 14px;
    }

    .container .inner .panel.panel-left .panel-content .contact-info h1 {
      margin: 0 0 25px 0;
      color: #283593;
      font-weight: 300;
      font-size: 24px; /* Augmenter la taille du titre */
    }

    .container .inner .panel.panel-left .panel-content .contact-info p {
      margin: 10px 0;
      display: flex;
      align-items: center;
      font-size: 18px; /* Augmenter la taille de la police */
      color: #283593; /* Modifier la couleur du texte pour correspondre à celle des icônes */
    }

    .container .inner .panel.panel-left .panel-content .contact-info i {
      margin-right: 15px; /* Augmenter l'espace entre l'icône et le texte */
      font-size: 28px; /* Augmenter la taille des icônes */
      color: #283593; /* Changer la couleur des icônes */
    }

    .container .inner .panel.panel-left .panel-content .social-links {
      margin-top: 20px;
    }

    .container .inner .panel.panel-left .panel-content .social-links a {
      display: inline-block;
      margin: 0 10px;
      color: #283593;
      font-size: 24px;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .container .inner .panel.panel-left .panel-content .social-links a:hover {
      color: #1e88e5; /* Couleur de survol pour les liens sociaux */
    }

    .container .inner .panel.panel-left .panel-content .logo {
      max-width: 100%; /* Ajuste la largeur du logo pour ne pas dépasser le conteneur */
      height: auto; /* Conserve les proportions du logo */
      margin-bottom: 20px; /* Espace sous le logo */
    }

    .container .inner .panel.panel-right .panel-content .form {
      width: 300px;
      min-height: 400px;
    }

    .container .inner .panel.panel-right .panel-content .form h1 {
      margin: 0 0 45px 0;
      color: #FAFAFA; /* Changer la couleur du titre du formulaire */
      font-weight: 200;
      font-size: 18px;
    }

    .container .inner .panel.panel-right .panel-content .form .group { 
      position: relative; 
      margin-bottom: 25px; 
    }

    .container .inner .panel.panel-right .panel-content .form input,
    .container .inner .panel.panel-right .panel-content .form textarea {
      font-size: 13px;
      height: 25px;
      padding: 10px 10px 10px 5px;
      display: block;
      width: 300px;
      border: none;
      outline: none;
      border-bottom: 1px solid #FAFAFA;
      color: #FAFAFA;
      background: rgba(0,0,0,0);
      opacity: 0.8;
      transition: 0.2s ease;
    }

    .container .inner .panel.panel-right .panel-content .form label {
      color: #FAFAFA; 
      font-size: 13px;
      font-weight: normal;
      position: absolute;
      pointer-events: none;
      left: 5px;
      top: 15px;
      opacity: 0.8;
      transition: 0.2s ease all; 
      -moz-transition: 0.2s ease all; 
      -webkit-transition: 0.2s ease all;
    }

    .container .inner .panel.panel-right .panel-content .form input:focus ~ label, 
    .container .inner .panel.panel-right .panel-content .form input:valid ~ label,
    .container .inner .panel.panel-right .panel-content .form textarea:focus ~ label, 
    .container .inner .panel.panel-right .panel-content .form textarea:valid ~ label {
      top: -10px;
      font-size: 12px;
      color: #FAFAFA;
      opacity: 1;
    }

    .container .inner .panel.panel-right .panel-content .form .highlight {
      position: absolute;
      height: 60%; 
      width: 100px; 
      top: 25%; 
      left: 0;
      pointer-events: none;
      opacity: 0.5;
    }

    .container .inner .panel.panel-right .panel-content .form input:focus ~ .highlight,
    .container .inner .panel.panel-right .panel-content .form textarea:focus ~ .highlight {
      -webkit-animation:inputHighlighter 0.3s ease;
      -moz-animation:inputHighlighter 0.3s ease;
      animation:inputHighlighter 0.3s ease;
    }

    @-webkit-keyframes inputHighlighter {
      from { background:#FAFAFA; }
      to  { width:0; background:transparent; }
    }
    @-moz-keyframes inputHighlighter {
      from { background:#FAFAFA; }
      to  { width:0; background:transparent; }
    }
    @keyframes inputHighlighter {
      from { background:#FAFAFA; }
      to  { width:0; background:transparent; }
    }

    .container .inner .panel.panel-right .panel-content .form button {
      border: none;
      outline: none;
      background: white; /* Couleur de fond du bouton */
      color:  #283593; /* Couleur du texte du bouton */
      display: inline-block;
      font-size: 14px; /* Augmenter la taille de la police */
      margin: 20px 0 0 0; /* Ajouter de la marge en haut du bouton */
      padding: 10px 20px; /* Ajouter du padding pour agrandir le bouton */
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .container .inner .panel.panel-right .panel-content .form button:hover {
      background: #1565c0; /* Changer la couleur de fond du bouton au survol */
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="inner">
      <div class="panel panel-left">
        <div class="panel-content">
          <div class="contact-info">
            <img src="logo-formation.png" alt="Logo" class="logo">
            <h1>Contactez-Nous</h1>
            <p><i class="ion-ios-telephone"></i> +212 6 1234 5678</p>
            <p><i class="ion-ios-email"></i> contact@example.com</p>
            <p><i class="ion-ios-location"></i> 123 Rue Exemple, Ville, Pays</p>
            <div class="social-links">
              <a href="#"><i class="ion-social-facebook"></i></a>
              <a href="#"><i class="ion-social-twitter"></i></a>
              <a href="#"><i class="ion-social-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-right">
        <div class="panel-content">
          <div class="form">
            <h1>Envoyer message</h1>
            <form action="send_email.php" method="post">
              <div class="group">
                <input type="text" name="nom" required>
                <span class="highlight"></span>
                <label>Nom</label>
              </div>
              <div class="group">
                <input type="email" name="email" required>
                <span class="highlight"></span>
                <label>Email</label>
              </div>
              <div class="group">
                <input type="text" name="sujet" required>
                <span class="highlight"></span>
                <label>Sujet</label>
              </div>
              <div class="group">
                <textarea name="message" required></textarea>
                <span class="highlight"></span>
                <label>Message</label>
              </div>
              <button type="submit">Envoyer</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>