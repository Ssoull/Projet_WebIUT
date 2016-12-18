<?php
    $pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");

    // Préparation de la requête "IMAGES"
    try {
        $imgreq = $pdo->prepare("SELECT Photo FROM Musicien WHERE Code_Musicien LIKE :id ");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }

    $imgreq->execute(array('id' => $_GET['Code']));
    $imgreq->bindColumn(1, $lob, PDO::PARAM_LOB);
    $imgreq->fetch(PDO::FETCH_ASSOC);
    $image = pack("H*", $lob);
    header("Content-type: image/jpeg");
    echo $image;
?>