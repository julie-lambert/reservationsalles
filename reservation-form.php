<?php 

include 'header.php';
include 'connect.php';

$sql = "SELECT * FROM `reservations`";
$query = $conn -> query($sql);
$resa = $query -> fetch_all();

$request = $conn -> query("SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur ");

if(isset($_POST["reserver"])){
  if(!empty($_POST["titre"]) AND !empty($_POST["debut"]) AND !empty($_POST["fin"]) AND !empty($_POST["description"])){

    $titre = htmlspecialchars($_POST["titre"]);
    $debut = htmlspecialchars($_POST["debut"]);
    $fin = htmlspecialchars($_POST["fin"]);
    $description = htmlspecialchars($_POST["description"]);

    $bdd = "INSERT INTO `reservations`(`titre`, `description`, `debut`, `fin`) VALUES ('$titre','$description','$fin','$debut')";
    $query2 = $conn -> query($bdd);
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  method = "post" action="reservation-form.php">
                <h1>Formulaire de réservation</h1>
                <?='<h2>Utilisateur: ' . $_SESSION['login'] . '</h2>'?>
                <input type="text" name="titre" placeholder="Titre de l'evenement">
                <br><br>
                <input type="text" name="description" placeholder="Description de l'évenement ">
                <br><br>
                <input type="time" name="debut" 
                 min="09:00" max="19:00" step="3600"required>
                 <br><br>
                <input type="time" name="fin" 
                min="09:00" max="19:00" step="3600" reqiered>
                <br><br>
                <input type="submit" name="reserver" value="Résever">
            </form>
</body>
</html>