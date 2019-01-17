<?php
	define("pagencours", $_SERVER["PHP_SELF"], true);
	$_SESSION["pagencours"]=pagencours;
?>
<div id="commentaire">
	<p><strong>RÉAGISSEZ À CET ARTICLE</strong></p>
	<?php
		if (empty($_SESSION["connecter"]) OR $_SESSION["connecter"]=="non") {		
			echo "<p><a href=\"http://localhost/Projet/Formulaire-inscription.php\" id=\"lien-com\"><strong>Inscrivez-vous</strong></a> ou <a href=\"http://localhost/Projet/Connexion.php\" id=\"lien-com\"><strong>identifiez-vous</strong></a> pour réagir à cet article</p>";
		}else if ($_SESSION["connecter"]=="oui") {
			echo "<p id=\"pseudo-com\">".$_SESSION["pseudo"]."</p>";
		}if (!empty($_SESSION["com_erreur"])) {
			echo "<p id=\"com_erreur\">".$_SESSION["com_erreur"]."</p>";
			$_SESSION["com_erreur"]="";
		}
	?>
	<form method="post" action="Commentaire_POST.php">
	<textarea name="message" rows="7" cols="60" placeholder="Laisser un commentaire..."></textarea>
	<input type="submit" value="Valider"></input>
	</form>
	<div>
	  <?php
		try{
    	  $bdd = new PDO("mysql:host=localhost;dbname=sport_direct;charset=utf8", "root", "");
    	}
    	catch(Exception $e){
    	  die("Erreur : ".$e->getMessage());
    	}
		$reponse=$bdd->query("SELECT * FROM commentaire");
		while ($donnees = $reponse->fetch()) {
			echo "<div id=\"com\"><div id=\"com_top\"><div id=\"nom\">".$donnees["nom"]."</div><div id=\"date\">".$donnees["heure"]."    ".$donnees["jour"]."</div></div><div id=\"comm\">".$donnees["contenu"]."</div></div>";
	    }
		$reponse->closeCursor();
	  ?>
	</div>
</div>