<!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>À propos de nous - Centre de Formation Innovatech</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style>


            body {
                background-image: url('for.jpg'); /* Chemin vers votre image de fond */
                background-size: cover; /* Ajuste l'image pour couvrir tout le fond */
                background-repeat: no-repeat; /* Empêche la répétition de l'image */
                background-position: center; /* Centre l'image */
                background-attachment: fixed; /* L'image reste fixe lors du défilement */
                color: #333; /* Couleur du texte */
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

           .nav {
    display: flex;
    align-items: center; /* Centre verticalement les éléments */
    justify-content: space-between; /* Place le logo à gauche et les liens de navigation à droite */
    background-color: rgba(40, 53, 147, 0.7); /* Couleur de fond avec transparence */
    color: white;
    padding: 10px 20px; /* Ajuste le padding vertical et horizontal */
}

.nav .logo-link {
    display: inline-block;
    cursor: pointer; /* Change le curseur pour indiquer que c'est cliquable */
    margin-right: auto; /* Pousse les éléments de navigation à droite */
}

.nav img {
    height: 50px; /* Réduit la hauteur du logo */
}

.nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px; /* Ajuste le padding autour du texte */
    background-color: rgba(0, 0, 0, 0.6); /* Couleur de fond avec transparence */
    border-radius: 5px;
    text-align: center;
    margin: 0 5px; /* Espacement horizontal entre les éléments */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transitions pour les effets de survol */
}

.nav a:hover {
    background-color: #283593; /* Change la couleur de fond au survol */
    transform: scale(1.05); /* Agrandit légèrement l'élément au survol */
}


          .col-12.col-lg-6.col-xl-7 h2,
  .col-12.col-lg-6.col-xl-7 p {
      color: white;
  }
  .text-secondary {
      color: white !important;
  }
          h1, h2 {
              color: white;
              margin: 40px 0 20px 0;
              font-weight: 300;
          }
          .team-section h1 {
              color: blue; /* Changer la couleur à ce que vous souhaitez */
          }

          .our-team-main {
              width: 80%;
              height: auto;
              border-bottom: 5px black solid;
              background: #fff;
              text-align: center;
              border-radius: 10px;
              overflow: hidden;
              position: relative;
              transition: 0.5s;
              margin-bottom: 28px;
          }
          .our-team-main img {
              border-radius: 50%;
              margin-bottom: 20px;
              width: 90px;
          }
          .our-team-main h3 {
              font-size: 20px;
              font-weight: 700;
          }
          .our-team-main p {
              margin-bottom: 0;
          }
          .team-back {
              width: 100%;
              height: auto;
              position: absolute;
              top: 0;
              left: 0;
              padding: 5px 10px 0 10px;
              text-align: left;
              background: #fff;
          }
          .team-front {
              width: 100%;
              height: auto;
              position: relative;
              z-index: 10;
              background: #f8f9fa;
              padding: 15px;
              bottom: 0px;
              transition: all 0.5s ease;
          }
          .our-team-main:hover .team-front {
              bottom: -200px;
              transition: all 0.5s ease;
          }
          .our-team-main:hover {
              border-color: #777;
              transition: 0.5s;
          }

          .about-section {
              background:  rgba(0, 0, 0, 0.6);
              padding: 60px 0;
          }



          .program-card {
              text-align: center;
              padding: 20px;
              border-radius: 5px;
              background-color: rgba(0, 0, 0, 0.6);
              margin-bottom: 20px;
              display: flex;
              flex-direction: column;
              justify-content: space-between;
              height: 100%;
              width: 100%;
              max-width: 400px; /* Ajuste la largeur maximale des cartes */
              margin: 0 auto; /* Centre les cartes */
              color: white; /* Texte en blanc */
          }

          .program-icon {
              font-size: 50px;
              color: #6c757d;
              margin-bottom: 20px;
          }

          .program-title {
              font-size: 24px;
              font-weight: bold;
              margin-bottom: 15px;
              color: white; /* Titre en blanc */
          }

          .program-description {
              font-size: 16px;
              margin-bottom: 20px;
              color: white; /* Description en blanc */
          }

          .learn-more {
              font-size: 16px;
              color: #007bff;
          }

          .card-wrapper {
              display: flex;
              flex-wrap: wrap;
              justify-content: center; /* Centre les cartes horizontalement */
              gap: 20px;
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
              margin: 0 7px;
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
              flex-direction: column;
              align-items: flex-start; /* Alignement à gauche pour les icônes et les textes */
          }

          .social-icons a {
              display: flex;
              align-items: center;
              margin-bottom: 10px;
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
      <!-- Header Section -->
      <div class="nav">
        <div class="logo-link" onclick="window.location.href='index.php'">
            <img src="logo-formation.png" alt="Logo">
        </div>
        <a href="index.php">Accueil</a>
        <a href="recherche_user.php">Rechercher un Certificat</a>
        <a href="À propos.php">À propos</a> 
        <a href="admin_login.php">Connexion</a>
        <a href="contact.php">Contact</a>  
    </div>

   


      <!-- Introduction du Centre de Formation Innovatech -->
      <section class="about-section py-3 py-md-5">
        <div class="container">
          <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <!-- Image Column (Replaced with Carousel) -->
            <div class="col-12 col-lg-6 col-xl-5">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="eeeeeeeeeeeeeeeeee.jpeg" class="d-block w-100" alt="Image 1">
                    <div class="carousel-caption d-none d-md-block">
                     
                      <p>Description de l'image .</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="for.jpg" class="d-block w-100" alt="Image 2">
                    <div class="carousel-caption d-none d-md-block">
                     
                    
                      <p>Description de l'image .</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <!-- Text Content Column -->
            <div class="col-12 col-lg-6 col-xl-7">
              <div class="row justify-content-xl-center">
                <div class="col-12 col-xl-11">
                  <h2 class="mb-3">Qui Sommes-Nous ?</h2>
                  <p class="lead fs-4 text-secondary mb-3">
                    Bienvenue au Centre de Formation Innovatech. Fondé en [année], notre centre s'engage à offrir des formations de qualité pour aider les individus à développer leurs compétences professionnelles et à réussir dans un monde en constante évolution.
                  </p>
                  <p class="mb-5">
                    Depuis sa création, le Centre de Formation Innovatech a évolué pour devenir un leader dans le domaine de l'éducation continue et de l'innovation technologique. Notre mission est de fournir des programmes de formation innovants et pertinents qui répondent aux besoins du marché du travail actuel.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section des Programmes -->
      <section class="py-3 py-md-5">
          <div class="container">
              <div class="card-wrapper">
                  <!-- Programme 1 -->
                  <div class="col-lg-3 col-md-6 d-flex">
                      <div class="program-card">
                          <div class="program-icon">
                              📊
                          </div>
                          <div class="program-title">Recherche de Marché</div>
                          <div class="program-description">
                              Nous vous aidons à comprendre votre marché cible et à élaborer des stratégies efficaces pour atteindre vos objectifs commerciaux. Apprenez à collecter et à analyser des données pour prendre des décisions éclairées.
                          </div>
                          <div class="learn-more">En savoir plus →</div>
                      </div>
                  </div>
                  <!-- Programme 2 -->
                  <div class="col-lg-3 col-md-6 d-flex">
                      <div class="program-card">
                          <div class="program-icon">
                              💻
                          </div>
                          <div class="program-title">Conception Web</div>
                          <div class="program-description">
                              Nos experts en conception web créent des sites attrayants, fonctionnels et optimisés pour les moteurs de recherche. Du design à la mise en œuvre, nous vous accompagnons tout au long du processus.
                          </div>
                          <div class="learn-more">En savoir plus →</div>
                      </div>
                  </div>
                  <!-- Programme 3 -->
                  <div class="col-lg-3 col-md-6 d-flex">
                      <div class="program-card">
                          <div class="program-icon">
                              📈
                          </div>
                          <div class="program-title">Formation en Analytique</div>
                          <div class="program-description">
                              Apprenez à exploiter la puissance des données pour prendre des décisions éclairées. Nos programmes couvrent les bases de l'analyse de données, les outils avancés et les techniques de visualisation.
                          </div>
                          <div class="learn-more">En savoir plus →</div>
                      </div>
                  </div>
                  <!-- Programme 4 -->
                  <div class="col-lg-3 col-md-6 d-flex">
                      <div class="program-card">
                          <div class="program-icon">
                              🎨
                          </div>
                          <div class="program-title">Création de Contenu</div>
                          <div class="program-description">
                              Nous vous aidons à créer du contenu attrayant qui engage votre public et renforce votre présence en ligne. Cela inclut des blogs, des vidéos, des infographies, etc.
                          </div>
                          <div class="learn-more">En savoir plus →</div>
                      </div>
                  </div>
                  <!-- Programme 5 -->
                  <div class="col-lg-3 col-md-6 d-flex">
                      <div class="program-card">
                          <div class="program-icon">
                              🌐
                          </div>
                          <div class="program-title">Gestion de Projet</div>
                          <div class="program-description">
                              Apprenez à planifier, exécuter et gérer des projets avec succès. Nos cours couvrent les méthodologies de gestion de projet, les outils de planification, et les techniques de suivi.
                          </div>
                          <div class="learn-more">En savoir plus →</div>
                      </div>
                  </div>
                  <!-- Programme 6 -->
                  <div class="col-lg-3 col-md-6 d-flex">
                      <div class="program-card">
                          <div class="program-icon">
                              🛠️
                          </div>
                          <div class="program-title">Développement d'Applications</div>
                          <div class="program-description">
                              Découvrez le développement d'applications mobiles et web, de la conception à la mise en production. Nos formations incluent des langages de programmation modernes et les meilleures pratiques de développement.
                          </div>
                          <div class="learn-more">En savoir plus →</div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Équipe et Expertise -->
      <section class="team-section py-3 py-md-5">
          <div class="container">
              <h1 class="text-center text-white">Notre Équipe</h1>
              <div class="row">
                  <!-- Membre de l'équipe 1 -->
                  <div class="col-lg-4">
                      <div class="our-team-main">
                          <div class="team-front">
                              <img src="http://placehold.it/110x110/9c27b0/fff?text=Marie" class="img-fluid" alt="Marie Dupont">
                              <h3>Marie Dupont</h3>
                              <p>Experte en Développement Web</p>
                          </div>
                          <div class="team-back">
                              <span>
                                  Marie Dupont possède plus de 10 ans d'expérience en développement web. Elle est spécialisée dans la création de sites web interactifs et dynamiques utilisant les dernières technologies du secteur.
                              </span>
                          </div>
                      </div>
                  </div>
                  <!-- Membre de l'équipe 2 -->
                  <div class="col-lg-4">
                      <div class="our-team-main">
                          <div class="team-front">
                              <img src="http://placehold.it/110x110/336699/fff?text=Paul" class="img-fluid" alt="Paul Martin">
                              <h3>Paul Martin</h3>
                              <p>Spécialiste en Data Science</p>
                          </div>
                          <div class="team-back">
                              <span>
                                  Paul Martin est un expert en data science avec une expérience approfondie dans l'analyse de données et le machine learning. Il a travaillé sur divers projets pour des entreprises de premier plan.
                              </span>
                          </div>
                      </div>
                  </div>
                  <!-- Membre de l'équipe 3 -->
                  <div class="col-lg-4">
                      <div class="our-team-main">
                          <div class="team-front">
                              <img src="http://placehold.it/110x110/607d8b/fff?text=Alice" class="img-fluid" alt="Alice Bernard">
                              <h3>Alice Bernard</h3>
                              <p>Consultante en Cybersécurité</p>
                          </div>
                          <div class="team-back">
                              <span>
                                  Alice Bernard est consultante en cybersécurité et apporte son expertise dans la sécurisation des systèmes d'information. Elle aide nos étudiants à comprendre les meilleures pratiques en matière de sécurité.
                              </span>
                          </div>
                      </div>
                  </div>
                  <!-- Membre de l'équipe 4 -->
                  <div class="col-lg-4">
                      <div class="our-team-main">
                          <div class="team-front">
                              <img src="http://placehold.it/110x110/ff5722/fff?text=Jean" class="img-fluid" alt="Jean Rousseau">
                              <h3>Jean Rousseau</h3>
                              <p>Expert en Intelligence Artificielle</p>
                          </div>
                          <div class="team-back">
                              <span>
                                  Jean Rousseau est spécialiste en intelligence artificielle avec une vaste expérience dans le développement d'algorithmes intelligents. Il travaille sur des projets innovants pour améliorer l'apprentissage automatique.
                              </span>
                          </div>
                      </div>
                  </div>
                  <!-- Membre de l'équipe 5 -->
                  <div class="col-lg-4">
                      <div class="our-team-main">
                          <div class="team-front">
                              <img src="http://placehold.it/110x110/4caf50/fff?text=Lucie" class="img-fluid" alt="Lucie Petit">
                              <h3>Lucie Petit</h3>
                              <p>Chef de Projet Digital</p>
                          </div>
                          <div class="team-back">
                              <span>
                                  Lucie Petit est chef de projet digital et gère les initiatives de transformation numérique. Elle est experte dans la coordination de projets complexes et le management d'équipes multidisciplinaires.
                              </span>
                          </div>
                      </div>
                  </div>
                  <!-- Membre de l'équipe 6 -->
                  <div class="col-lg-4">
                      <div class="our-team-main">
                          <div class="team-front">
                              <img src="http://placehold.it/110x110/ff9800/fff?text=Thomas" class="img-fluid" alt="Thomas Legrand">
                              <h3>Thomas Legrand</h3>
                              <p>Formateur en Marketing Digital</p>
                          </div>
                          <div class="team-back">
                              <span>
                                  Thomas Legrand est formateur en marketing digital avec une expertise en stratégie numérique et en publicité en ligne. Il aide nos étudiants à maîtriser les outils de marketing digital pour booster leur carrière.
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


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
                    <a href="https://www.facebook.com/mediquzz" target="_blank"><i class="fab fa-facebook fa-2x"></i> Facebook</a>
                    <a href="https://twitter.com/mediquzz" target="_blank"><i class="fab fa-twitter fa-2x"></i> Twitter</a>
                    <a href="https://www.instagram.com/mediquzz" target="_blank"><i class="fab fa-instagram fa-2x"></i> Instagram</a>
                    <a href="https://www.linkedin.com/company/mediquzz" target="_blank"><i class="fab fa-linkedin fa-2x"></i> LinkedIn</a>
                  </div>
                </div>
              </div>


      <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
          window.addEventListener('scroll', function() {
            var footer = document.querySelector('.footer');
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
              footer.classList.remove('hidden');
            } else {
              footer.classList.add('hidden');
            }
          });
      </script>
                
  </body>
  </html>