<?php

$name = $_COOKIE["name"];
$login = $_COOKIE["login"];
$pwd1 = $_COOKIE["pwd"];
$pwd2 = $_COOKIE["pwd2"];
$count = 0;

echo 'coucou';

include('DatabaseConnexion.php');

$statement = "SELECT count(*) FROM Abonné WHERE Login=:login";
    
$requete = $pdo->prepare($statement);

$requete->bindValue('login', $login, PDO::PARAM_STR);
$requete->execute();
$requete->bindColumn(1, $count);
$requete->fetch(PDO::FETCH_BOUND);
echo $count;

if (strlen($name) == 0) {
    header('Location: InscriptionSubscribers.php?erreur=0');
} else if (strlen($name) > 100) {
    header('Location: InscriptionSubscribers.php?erreur=1');
} else if ($count >= 1) {
    header('Location: InscriptionSubscribers.php?erreur=2');
} else if (strlen($login) == 0) {
    header('Location: InscriptionSubscribers.php?erreur=3');
} else if (strlen($pwd1) == 0) {
    header('Location: InscriptionSubscribers.php?erreur=4');
} else if (strlen($login) > 20) {
    header('Location: InscriptionSubscribers.php?erreur=5');
} else if (strlen($pwd1) > 160) {
    header('Location: InscriptionSubscribers.php?erreur=6');
} else if ($pwd1 != $pwd2) {
    header('Location: InscriptionSubscribers.php?erreur=7');
} else {
    include('DatabaseConnexion.php');

    $statement = "INSERT INTO Abonné (Nom_Abonné, Login, Password) VALUES (:name, :login, :password)";
    
    $requete = $pdo->prepare($statement);
    
    $requete->bindValue('name', $name, PDO::PARAM_STR);
    $requete->bindValue('login', $login, PDO::PARAM_STR);
    $requete->bindValue('password', $pwd1, PDO::PARAM_STR);
    
    $requete->execute();
    $requete->fetch();

    header('Location: SessionStart.php');
}

?>