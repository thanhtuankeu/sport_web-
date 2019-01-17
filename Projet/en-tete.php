<link rel="stylesheet" href="style-tete.css" />
<header>
  </div>
  <div id="titre">
    <h1 id="sport">Sport <strong id="direct">Direct</strong></h1>
  </div>
  <div id="banniere_logo">
    <div id="site-navigation">
      <ul id="bouton-navigation">
        <li><a href="http://localhost/Projet/Accueil.php" id="bouton-home"><img src="image/homes.jpeg" alt="Home" height="27" width="30"></a></li>
        <li><a href="http://localhost/Projet/Football.php" id="bouton">Football</a></li>
        <li><a href="http://localhost/Projet/Tennis.php" id="bouton">Tennis</a></li>
        <li><a href="http://localhost/Projet/Rugby.php" id="bouton">Rugby</a></li>
        <li><a href="http://localhost/Projet/Basket.php" id="bouton">Basket</a></li>
        <li><a href="http://localhost/Projet/Hand.php" id="bouton">Hand</a></li>
        <li><a href="http://localhost/Projet/Cyclisme.php" id="bouton">Cyclisme</a></li>
        <li><a href="http://localhost/Projet/Boxe.php" id="bouton">Boxe</a></li>
        <?php
          if(empty($_SESSION["connecter"]) OR $_SESSION["connecter"]=="non"){
            echo "<li><a href=\"http://localhost/Projet/Inscription.php\" id=\"inscrire\">S'inscrire</a></li>
            <li><a href=\"http://localhost/Projet/Connexion.php\" id=\"connecte\">Connexion</a></li>";
          }else if($_SESSION["connecter"]=="oui"){
              echo "<li><a href=\"http://localhost/Projet/Deconnexion.php\"  id=\"deconnecte\">Déconnexion</a></li><li id=\"pseudo\"><strong>".$_SESSION["pseudo"]."</strong></li>";
          }
        ?>
      </ul>
    </div>
  </div>
</header>