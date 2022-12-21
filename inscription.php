<?php

include 'header.php';
include 'connect.php';

// récuperer les données de la bdd 
$sql = "SELECT * FROM `utilisateurs`";
$query = $conn -> query($sql);
$users = $query -> fetch_all();

if(isset($_POST["Envoyer"])){

    if(!empty($_POST["login"]) AND !empty($_POST["password"]) AND !empty($_POST["repeatpassword"])){

        $login = htmlspecialchars($_POST["login"]);
        $mdp = htmlspecialchars($_POST["password"]);
        $repeatpassword = htmlspecialchars($_POST["repeatpassword"]);
        $testlogin = true; // vérifier la disponibilité du login 
        
        for($i=0; isset($users[$i]); $i++){

            if($users[$i][1] === $login){
                $testlogin = false;
                echo "Cet identifiant n'est pas disponible";
                break;
            }
        }

        if($mdp === $repeatpassword){
            if($testlogin === true){
                $bdd = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$login','$mdp')";
                $query2 = $conn -> query($bdd);

                header('location: connexion.php');
            }
        }else{
            echo "Les mots de passe ne sont pas identiques!";
        }

    }else{
        echo "Veuillez compléter tous les champs";
    }

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="form1">
            <form  method = "post" action="inscription.php">
                <p>Bienvenue</p>
                <input type="text" name="login" placeholder="Login">
                <br><br>
               
                <input type="password" name="password" placeholder="Mot de passe">
                <br><br>
                <input type="password" name="repeatpassword" placeholder="Confimer le mot de passe">
                <br><br>
                <input type="submit" name="Envoyer" value="Envoyer">
            </form>
        </div> 
    </div>    
</body>
</html>