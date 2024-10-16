<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un Certificat</title>
    <style>
       body {
      padding: 0;
      margin: 0;
      color: white;
      font-family: sans-serif;
    
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            color:black;
        }
         /* Style pour l'image */
    .content-image {
      max-width: 100%;
      height: auto;
      position: relative;
    }

    .content-image img {
      width: 100%;
      height: auto;
      border-radius: 5px;
    }
    .separator {
      border: none;
      border-top: 5px solid #ADD8E6; /* تغيير سمك الخط وتحديد اللون (أزرق فاتح) */
      margin: 20px 0; /* تعيين الهامش للخط */
    }
     .container {
                width: 100%;
                margin: auto;
                overflow: hidden;
                color:black;
            }

        .nav {
    display: flex;
    justify-content: flex-end; /* Aligne les éléments sur le côté droit */
    background-color: rgba(40, 53, 147, 0.7); /* Couleur de fond avec transparence */
    color: white;
    padding: 10px 20px; /* Ajuste le padding vertical et horizontal */
} 

.nav img {
    height: 50px; /* Réduit la hauteur du logo */
    margin-right: 850px; /* Réduit l'espacement entre le logo et les éléments de navigation */
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

        .search-form {
            margin: 20px 0;
        }

        .search-form label,
        .search-form input {
            display: block;
            margin: 10px 0;
        }

        .search-form input[type="text"] {
            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-form button {
            padding: 10px 20px;
            background-color:#283593;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #555;
        }

        .result {
    margin-top: 20px;
}

.result table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.result th,
.result td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.result th {
    background-color: #283593;
    color: white;
}

.result td {
    background-color: black; /* Ajouté pour que les cellules soient en blanc */
    color: white;
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
    <div class="nav">
    <img src="logo-formation.png" alt="Logo">
        <a href="dashboard.php">Tableau de Bord</a>
       
        <a href="certificats.php">Certificats</a>
        <a href="rechercher.php">Rechercher</a>
        <a href="logout.php">Déconnexion</a> 
    </div>
      <!-- Image Section -->
  <div class="content-image">
    <img src="for.jpg" alt="Your Image">

    <div class="container">
        <div class="search-form">
            <h2>Rechercher un Certificat par Numero d'etudiant </h2>
            <form action="" method="POST">
                <label for="nom_certificat">Numero d'etudiant :</label>
                <input type="text" id="nom_certificat" name="nom_certificat" placeholder="Entrez le numero d'etudiant.." required>
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <div class="result">
            <?php
            // Vérification si le formulaire a été soumis

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
$username = "handbyje_formation";
$password = "stageinisation123";
$dbname = "handbyje_centre";


                // Création de la connexion
                $conn = new mysqli($servername, $username, $password, $dbname, $port);

                // Vérification de la connexion
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Récupération du nom du certificat depuis le formulaire
                $nom_certificat = $conn->real_escape_string($_POST['nom_certificat']);

                // Préparation de la requête SQL pour rechercher le certificat par nom
                $sql = "SELECT * FROM student WHERE numero_etud LIKE '%$nom_certificat%'";

                // Exécution de la requête
                $result = $conn->query($sql);

                // Affichage des résultats s'il y en a
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Nom et Prénom</th><th>Numéro d'Étudiant</th><th>Date de Naissance</th><th>Formation</th><th>Date d'Obtention</th><th>Actions</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["nomprenom"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["numero_etud"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["date_naissance"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["formation"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["date_obtention"]) . "</td>";
                        echo "<td><a href='resultats.php?id=" . $row["nemuro_certificate"] . "'>Voir le Certificat</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Aucun certificat trouvé avec ce numero.";
                }

                // Fermeture de la connexion à la base de données
                $conn->close();
            }
            ?>
        </div>
    </div>
    
    <!-- Add a horizontal line -->
    <hr class="separator">
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

</body>

</html>
