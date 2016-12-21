<?php
    include 'DatabaseConnexion.php';

    // Préparation de la requête "IMAGES"
    try {
        $imgreq = $pdo->prepare("SELECT Pochette FROM Album WHERE Code_Album LIKE :id ");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
    
    
    $init = $_GET['Code'];
    $imgreq->bindValue('id', $init, PDO::PARAM_STR);
    
    $imgreq->execute();
    $imgreq->bindColumn(1, $lob, PDO::PARAM_LOB);
    $imgreq->fetch(PDO::FETCH_ASSOC);
    $image = pack("H*", $lob);
    header("Content-type: image/jpeg");
    echo $image;
?>
