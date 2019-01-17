<?php
  session_start();
  if (!empty($_POST["pseudo"]) AND !empty($_POST["password"])) {
    try{
      $bdd = new PDO("mysql:host=localhost;dbname=sport_direct;charset=utf8", "root", "");
    }
    catch(Exception $e){
      die("Erreur : ".$e->getMessage());
    }
    $req = $bdd->prepare("SELECT pseudo, mot_de_passe FROM membre WHERE pseudo= :pseudo AND mot_de_passe= :password");
    $req->execute(array(
      "pseudo"=>htmlspecialchars($_POST["pseudo"]),
      "password"=>htmlspecialchars($_POST["password"])
    ));
    $donnees = $req->fetch();
    if($donnees["pseudo"]==$_POST["pseudo"] AND $donnees["mot_de_passe"]==$_POST["password"]){
      $_SESSION["connecter"]="oui";
      $_SESSION["pseudo"]=$_POST["pseudo"];
      $req->closeCursor();
      header("location: Accueil.php");
      exit();
    }else{
      $_SESSION["mess_erreur"]="Le pseudo et/ou le mot de passe ne correspondent pas.";
      $req->closeCursor();
      header("location: Connexion.php");
      exit();
    }
  }else{
      $_SESSION["mess_erreur"]="Certains champs n'ont pas été remplis.";
      header("location: Connexion.php");
      exit();
  }
?>