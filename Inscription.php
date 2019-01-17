<?php
    session_start();
?>
<!DOCTYPE html>
<html lang ="fr">
  <head >
    <meta charset ="utf 8">
    <link rel="stylesheet" href="style-inscription.css" />
    <title > Le sport à tout moment </title>
  </head >

  <body>
  <?php include ("en-tete.php"); ?>

    <div id="contenu">
    	<div id="texte">
        <?php
          if(!empty($_SESSION["connecter"])){
            if ($_SESSION["connecter"]=="oui") {
              echo "Vous êtes déjà connecter à une session";
            }
          }else if(empty($_SESSION["connecter"]) OR $_SESSION["connecter"]=="non"){
        ?>
    		<p id="h1">Inscription</p>
        <?php
            if(!empty($_SESSION["mess_erreur"])){
              echo "<p id=\"mess_erreur\">".$_SESSION["mess_erreur"]."</p>";
              $_SESSION["mess_erreur"]="";
            }
        ?>
    		<form method="post" action="http://localhost/Projet/Inscription_POST.php">
				    <span class="champ">
        			<input id="pseudo" type="text" name="pseudo" value="" placeholder="Pseudo"/>
      			</span>

      			<span class="champ">
        			<input id="password" type="password" name="password" value="" placeholder="Mot de passe"/>
      			</span>

      			<span class="champ">
        			<input id="confirmation" type="password" name="confirmation" value="" placeholder="Confirmation mot de passe"/>
      			</span>

            <span class="champ">
              <input id="email" type="text" name="email" value="" placeholder="E-mail"/>
            </span>

            <span class="actions">
              <input type="checkbox" name="newsletter" id="newsletter"/>
              <label for="case">Je souhaite recevoir les newsletters.</label>
			    	  <input type="submit" value="S'inscrire"/>
    			</span>
   			</form>
        <div id="se-connecter">Déjà inscrit ? <a href="http://localhost/Projet/Connexion.php">Se connecter</a></div>
        <?php
          }
        ?>
    	</div>
    </div>

 	<?php include ("pied-de-page.php"); ?>
  </body>
</html>