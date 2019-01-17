<?php
    session_start();
    if (empty($_POST['pseudo']) OR empty($_POST['password']) OR empty($_POST['confirmation']) OR empty($_POST['email']) ){
    	$_SESSION["mess_erreur"]="Certains champs n'ont pas été rempli.";
        header("location: Inscription.php");
        exit();
    }else{
    	$pseudo=htmlspecialchars($_POST["pseudo"]);
    	$password=htmlspecialchars($_POST["password"]);
    	$confirmation=htmlspecialchars($_POST["confirmation"]);
    	$email=htmlspecialchars($_POST["email"]);
        if(empty($_POST["newsletter"])){
            $newsletter=false;
        }else{
            $newsletter=true;
        }
        if($password==$confirmation){
            try{
    	   	   $bdd = new PDO("mysql:host=localhost;dbname=sport_direct;charset=utf8", "root", "");
        	}
        	catch(Exception $e){
        		die('Erreur : '.$e->getMessage());
        	}
        	$req=$bdd->prepare("INSERT INTO membre(pseudo, mot_de_passe, email, newsletter) VALUES(:pseudo, :mot_de_passe, :email, :newsletter)");
        	$req->execute(array(
    	    "pseudo" => $pseudo,
    	    "mot_de_passe" => $password,
    	    "email" => $email,
            "newsletter" => $newsletter
    	   ));
           $req->closeCursor();
    	   $_SESSION["mess_inscription"]="Compte crée avec succès. Connectez vous.";
           header("location: Connexion.php");
           exit();
        }else{
    	   $_SESSION["mess_erreur"]="La confirmation de mot de passe est incorrect.";
            header("location: Inscription.php");
            exit();
        }
    }
?>