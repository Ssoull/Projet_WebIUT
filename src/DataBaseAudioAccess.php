<?php
    include 'DatabaseConnexion.php';

    // Préparation de la requête "IMAGES"
    try {
        $audioreq = $pdo->prepare("SELECT Extrait FROM Enregistrement WHERE Code_Morceau LIKE :id ");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
    
    
    $init = $_GET['Code'];
    $audioreq->bindValue('id', $init, PDO::PARAM_STR);
    
    $audioreq->execute();
    $audioreq->bindColumn(1, $lob, PDO::PARAM_LOB);
    $audioreq->fetch(PDO::FETCH_ASSOC);
    $audioreq = pack("H*", $lob);
    header("Content-type: audio/mpeg");
    echo $audioreq;
?>