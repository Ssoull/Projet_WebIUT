<?php
session_start();
include("DataBaseConnexion.php");

$cart = $_SESSION["cart"];
$login = $_SESSION["login"]; 
$pwd = $_SESSION["pwd"];

$statement = "SELECT DISTINCT Code_Abonné FROM Abonné WHERE Login=:login AND Password=:password";

$requete = $pdo->prepare($statement);
$requete->bindValue('login', $login, PDO::PARAM_STR);
$requete->bindValue('password', $pwd, PDO::PARAM_STR);
$requete->execute();
$requete->bindColumn(1, $id);
$requete->fetch(PDO::FETCH_BOUND);



$statement = "INSERT INTO Achat(Code_Enregistrement, Code_Abonné) VALUES (:codeEnregistrement, :codeAbonne)";

for($i = 0; $i < count($cart); $i++)
{
    for($j = 1; $j < count($cart[$i]); $j++)
    {
        $requete = $pdo->prepare($statement);
        $requete->bindValue('codeEnregistrement', $cart[$i][$j], PDO::PARAM_STR);
        $requete->bindValue('codeAbonne', $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->fetch();
    }
}

$emptyCart[0][0] = 'empty';
$emptyQuantityMusicalWork[0][0] = 'empty';

$_SESSION["cart"] = $emptyCart;
$_SESSION["quantityMusicalWork"] = $emptyQuantityMusicalWork;

header('Location: HistoryBuy.php');
?>
