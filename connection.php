<?php 
    try {
        $con = new PDO('mysql:host=localhost;dbname=todoapp','root' ,'');
        // echo "Connexion reuissit!";
    } catch (Exception $th) {
        $th.getMessage();
    }
?>