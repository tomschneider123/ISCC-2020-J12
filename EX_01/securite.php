<html>
<?php

session_start();

function connect_to_database()
{
$servername = "localhost";
$username = "tom";
$password = "2020";
$databasename = "base-site-rooting";



try
{
    $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    $pdo->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "connected successfully";

    return $pdo;
}
catch (PDOException $e)
{
  echo "Connexion failed : ".$e->getMessage();
}
}
$pdo = connect_to_database();

$query = $pdo -> query("SELECT * FROM utilisateurs WHERE login = '" . $_POST['login'] . "' AND password = '" . $_POST['password']."'");
$user = $query -> fetch();

if($user)
{
  $_SESSION = $user['login'];
$_COOKIES = $user['img-path'];
echo "<br>login  = ".$_SESSION;
echo "<br>img-path = ".$_COOKIES;
echo "<br><a href='ajout_utilisateur.php'>Gérer les utilisateurs</a>";
}

else
{
 echo "Mauvais couple identifiant/mot de passe";
}




?>

</html>