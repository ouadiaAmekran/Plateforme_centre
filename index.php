
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de mise en page</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Reset des marges et des rembourrages pour le corps et les éléments */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styles généraux */
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.5)), url('for.jpg');
    background-repeat: no-repeat; /* Empêche la répétition de l'image */
    background-size: cover; /* Couvre toute la surface sans répétition */
    background-attachment: fixed; /* Fixe l'image de fond pour qu'elle ne se déplace pas avec le défilement */
    color: #333;
}


        /* Header */
        header { background-color: rgba(40, 53, 147, 0.7);
            color: #fff; /* Couleur du texte */
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            height: 60px; /* Ajustez la hauteur selon vos besoins */
            vertical-align: middle; /* Pour centrer verticalement */
        }

        nav ul {
            list-style-type: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #3949ab; /* Couleur de fond au survol */
        }

        /* Main */
main {
    display: flex;
    justify-content: space-between; /* Pour aligner les sections à gauche et à droite */
    align-items: flex-start; /* Aligne les sections en haut pour éviter un grand espace vertical */
    padding: 40px 20px;
    background: rgba(0, 0, 0, 0.5);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin: 20px auto;
    max-width: 1200px; /* Largeur maximale */
    height: 600px; /* Hauteur ajustée pour agrandir la zone */
    border-radius: 8px;
}

/* Image Section */
.image-section {
    flex: 1; /* Pour occuper tout l'espace disponible */
    margin-right: 20px; /* Espacement entre les sections */
}

.image-section img {
    width: 100%; /* Pour que l'image occupe toute la largeur de son conteneur */
    height: auto; /* Ajuste la hauteur automatiquement */
    display: block; /* Pour éviter les espaces vides sous l'image */
    border-radius: 8px;
}

/* Content Section */
.content-section {
    flex: 1; /* Ajuste la largeur pour occuper tout l'espace disponible */
}

.content-section h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: white;
}

.content-section p {
    margin-bottom: 20px;
    color: white;
    font-size: 16px;
}

        .button {
            display: inline-block;
            margin-top: 10px; /* Espacement entre le texte et le bouton */
            padding: 10px 20px;
            background-color: #3949ab;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold;
        }

        .button:hover {
            background-color: #283593;
            transform: translateY(-2px);
        }

        /* Cards Section */
        .cards-section {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 40px auto;
            max-width: 1200px;
            gap: 20px;
        }

        .card {
            background: rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            flex: 1 1 300px;
            max-width: 300px;
            text-align: center;
        }

        .card img {
            width: 120%;
            height: auto;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            font-size: 22px;
            color: white;
            margin-bottom: 10px;
        }

        .card-content p {
            color: white;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .card-content a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3949ab;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold;
        }

        .card-content a:hover {
            background-color: #283593;
            transform: translateY(-2px);
        }
  .footer {
    background-color: #283593;
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
    position: relative;
    bottom: 0;
    left: 0;
    transition: bottom 0.3s ease; /* Ajout d'une transition pour une apparition douce */
}

.footer.hidden {
    bottom: -100px; /* Déplacer le footer hors de la vue */
}

.bottom-menus {
    display: flex;
    justify-content: space-between;
}

.menu-item {
    margin: 0 20px; /* Espacement horizontal entre les menus */
}

.menu-item h3, .menu-item p {
    margin-bottom: 10px; /* Espacement vertical entre les éléments */
}

.menu-item a {
    color: white; /* Couleur par défaut des liens */
    text-decoration: none;
    display: block;
}

.menu-item a:hover, .menu-item a:focus {
    color: white; /* Rester en blanc lors du survol ou du focus */
}

.menu-item a h3 {
    margin: 0;
}

.social-icons {
    display: flex;
    flex-direction: row; /* Aligner les icônes horizontalement */
    justify-content: center; /* Centrer les icônes */
    gap: 20px; /* Espacement entre les icônes */
}

.social-icons a {
    display: flex;
    align-items: center;
    color: white;
    text-decoration: none;
}

.social-icons a i {
    margin-right: 8px; /* Espacement entre l'icône et le texte */
}

.social-icons a:hover {
    color: #007bff;
}

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo-formation.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="recherche_user.php">Rechercher un Certificat</a></li>
                <li><a href="À propos.php">À propos</a></li>
                 <li><a href="contact.php">Contact</a></li>
                 <li><a href="admin_login.php">Connexion</a></li>
              
            </ul>
        </nav>
    </header>
    <main>
        <section class="content-section">
            <h2>Centre de Formation Innovatech</h2>
            <p>Bienvenue au Centre de Formation Innovatech, où l'innovation et l'excellence académique se rencontrent. Nous proposons une variété de programmes de formation adaptés à vos aspirations professionnelles. Nos cours sont conçus pour vous offrir des compétences pratiques et des connaissances approfondies afin de vous aider à réussir dans votre carrière.</p>
            <p>Que vous cherchiez des certifications techniques, du développement personnel ou des compétences en gestion, notre centre de formation est l'endroit parfait pour débuter votre parcours éducatif. Nos formateurs expérimentés et nos installations modernes garantissent une expérience d'apprentissage enrichissante et efficace.</p>
            <a href="admin_login.php" class="button">Connexion Admin</a>
        </section>
        <section class="image-section">
            <img src="Web-Designer.jpg" alt="Image">
        </section>
    </main>

    <!-- Cards Section -->
    <section class="cards-section">
    <div class="card">
    <img src="webee.avif" alt="Formation en Développement Web">
    <div class="card-content">
        <h3>Formation en Développement Web</h3>
        <p>Apprenez les bases du développement web avec HTML, CSS et JavaScript. Ce cours vous guidera à travers la création de sites web modernes et interactifs.</p>
      
    </div>
</div>
<div class="card">
    <img src="marketing.jpg" alt="Formation en Marketing Digital">
    <div class="card-content">
        <h3>Formation en Marketing Digital</h3>
        <p>Découvrez les stratégies et outils du marketing digital. Apprenez à utiliser les réseaux sociaux, le SEO, et le marketing par courriel pour atteindre vos objectifs commerciaux.</p>
      
    </div>
</div>

<div class="card">
    <img src="formations-cybersecurite.jpg" alt="Formation en Cybersécurité">
    <div class="card-content">
        <h3>Formation en Cybersécurité</h3>
        <p>Découvrez les meilleures pratiques pour protéger les systèmes informatiques contre les menaces de cybersécurité. Apprenez à détecter, prévenir et répondre aux cyberattaques.</p>
       
    </div>
</div>

</div>

        </div>
    </section>

   <!-- Footer -->
            <div class="footer">
              <div class="bottom-menus">
                <!-- Troisième Menu: Notre Service, About, Contact -->
                <div class="menu-item">
                  <a href="#"><h3>Notre Service</h3></a>
                  <a href="À propos.php"><h3>About</h3></a>
                  <a href="/contact"><h3>Contact</h3></a>
                </div>

                <!-- Premier Menu: Contactez-Nous -->
                <div class="menu-item">
                  <h3>Contactez-Nous :</h3>
                  <p><i class="fas fa-phone"></i> +212 6 1234 5678</p>
                  <p><i class="fas fa-envelope"></i> contact@example.com</p>
                  <p><i class="fas fa-map-marker-alt"></i> 123 Rue Exemple, Ville, Pays</p>
                </div>

                <!-- Deuxième Menu: Suivez-nous sur les réseaux sociaux -->
                <div class="menu-item">
                  <h3>Suivez-nous :</h3>
                  <div class="social-icons">
                    <a href="https://www.facebook.com/mediquzz" target="_blank"><i class="fab fa-facebook fa-2x"></i> </a>
                    <a href="https://twitter.com/mediquzz" target="_blank"><i class="fab fa-twitter fa-2x"></i> </a>
                    <a href="https://www.instagram.com/mediquzz" target="_blank"><i class="fab fa-instagram fa-2x"></i> </a>
                    <a href="https://www.linkedin.com/company/mediquzz" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
                  </div>
                </div>
              </div>

</body>
</html>
