<?php

$login = $_COOKIE['login'];
$pwd = $_COOKIE['pwd'];

include('DataBaseConnexion.php');

$statement = "SELECT DISTINCT count(*) FROM Abonné WHERE Login=:login AND Password=:password";

$requete = $pdo->prepare($statement);
$requete->bindValue('login', $login, PDO::PARAM_STR);
$requete->bindValue('password', $pwd, PDO::PARAM_STR);
$requete->execute();
$requete->bindColumn(1, $count);
$requete->fetch(PDO::FETCH_BOUND);

if (strlen($login) == 0)
{
    header('Location: ConnexionSubscribers.php?result=0');
}
else if (strlen($pwd) == 0)
{
    header('Location: ConnexionSubscribers.php?result=1');
}
else if ($count >= 1)
{
    session_start();
    
    $_SESSION['login'] = $login;
    $_SESSION['pwd'] = $pwd;
    
    $quantityMusicalWork[0][0] = "empty";
    $cart[0][0] = "empty";
    
    $_SESSION["cart"] = $cart;
    $_SESSION["quantityMusicalWork"] = $quantityMusicalWork;
    
    header('Location: ' . $_COOKIE["LastURL"]);
}
 else 
{
    header('Location: ConnexionSubscribers.php?result=2');
}

?>