<!DOCTYPE html>

<html>
<head>
<meta charset="utf8" />
<title>Mini Site Routing</title>
<body>
<?php
if (isset($_GET["page"]))
{
if ($_GET['page'] == "1")
{
    echo "<h1> Accueil </h1>";
}
elseif ($_GET['page'] == "2")
{
    echo "<h1> Page 2 </h1>";
}
elseif ($_GET['page'] == "3")
{
    echo "<h1> Page 3 </h1>";
}
elseif ($_GET['page'] == "connexion")
{
    include ('connexion.php');
    echo "<h1> Connexion </h1>";
}
}



if (isset($_COOKIE['id']))
{
    echo "Login :" . $_SESSION['id'];
}
else
{
    if(isset($_COOKIE['id']))
    {
        $_SESSION['id'] = $_COOKIE['id'];
    }
    else 
    {
        echo "Connexion";
    }
}

?>
</body>
</head>
</html>