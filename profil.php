
<?php

include 'header.php';
include 'connect.php';


$login = $_SESSION['login']; 
$password = $_SESSION['password'];

if(!empty($_SESSION)) { 
    $bdd = "SELECT * FROM utilisateurs WHERE login='$login'";
    $query = $conn->query($bdd);
    $users= $query->fetch_assoc(); 

    if (isset($_POST['submit'])) { 
        

       
        if ($login != $_POST['login']) {
            $bdd1 = "UPDATE `utilisateurs` SET login='{$_POST['login']}' WHERE login='$login'";
            $users1 = $conn->query($bdd1);
            echo "Votre login a bien été changé par:" . $_POST['login'] . "<br>";
            header('location: deconnexion.php');
            
        }if ($password != $_POST['password']) {
            $new_password = ($_POST['password']);
            $bdd2 = "UPDATE `utilisateurs` SET password='$new_password' WHERE password='$password'";
            $users2 = $conn->query($bdd2);
            echo "Votre mot de passe a bien été changé par:" . $_POST['password'] . "<br>";
            header('location: deconnexion.php');
        }

    }

}
if (isset($_POST['delete'])) {
    $sql_delete = "DELETE FROM utilisateurs WHERE login='$login'";
    $result_delete = $bdd->query($sql_delete);
    echo "Vos données ont été supprimées";
    session_destroy();
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="profil.css">
    <title>Page de profil</title>
</head>
<body>
    <div class = "container">
        <div class="form1">
            <form  method = "post" action="profil.php">
            <p>Votre Profil</p>
                <input type="text" name="login" value="<?php echo $login ?>">
                <br><br>
                <input type="password" name="password" value="<?php echo $password ?>">
                <br><br>

                <br><br>
                <input type="submit" name="submit" value="Modifier">
            </form>
        </div> 
</div>
</body>
</html>