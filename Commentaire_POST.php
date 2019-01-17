<?php
  session_start();
  if (empty($_SESSION["connecter"]) OR $_SESSION["connecter"]=="non") {
  	$_SESSION["com_erreur"]="Vous devez étre inscrit pour pouvoir commenter l'article.";
  	header("location: ".$_SESSION["pagencours"]);
	exit();
  }else if (empty($_POST["message"])) {
  	$_SESSION["com_erreur"]="Vous ne pouvez pas poster un message vide.";
	header("location: ".$_SESSION["pagencours"]);
	exit();
  }else{
  	try{
      $bdd = new PDO("mysql:host=localhost;dbname=sport_direct;charset=utf8", "root", "");
    }
    catch(Exception $e){
      die("Erreur : ".$e->getMessage());
    }
    $nom=$_SESSION["pseudo"];
    $jour=date("Y-m-d");
    $heure=date("H:i");
    $contenu=htmlspecialchars($_POST["message"]);
    $req=$bdd->prepare("INSERT INTO commentaire (nom, jour, heure, contenu) VALUES (:nom, :jour, :heure, :contenu)");
    $req->execute(array(
    	"nom"=>$nom,
    	"jour"=>$jour,
    	"heure"=>$heure,
    	"contenu"=>$contenu
    ));
    $req->closeCursor();
    header("location: ".$_SESSION["pagencours"]);
	exit();
  }
?>