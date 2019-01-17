<?php
    session_start();
?>
<!DOCTYPE html>
<html lang ="fr">
  <head >
    <meta charset ="utf 8">
    <link rel="stylesheet" href="style-connexion.css" />
    <title > Le sport à tout moment </title>
  </head >

  <body>
  <?php include ("en-tete.php"); ?>

    <div id="contenu">
    	<div id="texte">
        <?php
          if(empty($_SESSION["connecter"]) OR $_SESSION["connecter"]=="non"){
        ?>
    		<p id="h1">Connexion</p>

        <?php
          if(!empty($_SESSION["mess_inscription"])){
              echo "<p id=\"mess_inscription\">".$_SESSION["mess_inscription"]."</p>";
              $_SESSION["mess_inscription"]="";
            }
        ?>
        
    		<form method="post" action="Connexion_POST.php" >
				  <span class="champ">
        		<input id="login" type="text" name="pseudo" value="" placeholder="Pseudonyme"/>
      		</span>

      		<span class="champ">
        		<input id="password" type="password" name="password" value="" placeholder="Mot de passe"/>
      		</span>

          <?php
            if(!empty($_SESSION["mess_erreur"])){
              echo "<p id=\"mess_erreur\">".$_SESSION["mess_erreur"]."</p>";
              $_SESSION["mess_erreur"]="";
            }
          ?>

			    <span class="actions">
			    	<input type="submit" value="Connexion"/>
    			</span>
   			</form>
        <div id="sinscrire">Pas encore de compte ? <a href="http://localhost/Projet/Formulaire-inscription.php">S'inscrire</a></div>
        <?php
          }else if ($_SESSION["connecter"]=="oui") {
              echo "Vous êtes déjà connecter à une session";
          }
        ?>
    	</div>
    </div>

 	<?php include ("pied-de-page.php"); ?>
  </body>
</html>