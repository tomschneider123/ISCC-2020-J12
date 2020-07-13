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

$query = $pdo -> query("SELECT * FROM utilisateurs WHERE login = '" . $_POST['login_user'] . "'");
$user = $query -> fetch();

if($user)
{
  $_SESSION = $user['login'];
$_COOKIES = $user['img-path'];
echo "<br>Le login : ".$_SESSION. " existe déjà.";
$sql = "UPDATE `utilisateurs` SET password = '".$_POST['password_user']."' WHERE login = '".$_POST['login_user']."'";

$stmt= $pdo->prepare($sql);
$stmt->execute();
echo "<br>Le mot de passe de ".$_POST['login_user']." a été modifié.";
}

else
{
 echo "Cet utilisateur n'existe pas il faut le créer".$_POST['login_user'];

//$sql = "INSERT INTO utilisateurs(id,login,password,img-path) VALUES (1,'a','b','c') ";
$sql = "INSERT INTO `utilisateurs`(`id`, `login`, `password`, `img-path`) VALUES (1,'".$_POST['login_user']."','".$_POST['password_user']."','c:')";
$stmt= $pdo->prepare($sql);
$stmt->execute();
//$stmt->execute([$_POST['login_user'], $_POST['password_user'], 'c:/images/moi.jpg']);
echo "<br>Le login ".$_POST['login_user']." a été créé.";
}




?>

</html>