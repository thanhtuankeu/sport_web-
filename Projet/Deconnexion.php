<?php
    session_start();
    $_SESSION["connecter"]="non";
    session_destroy();
    header("location: Accueil.php")
?>
