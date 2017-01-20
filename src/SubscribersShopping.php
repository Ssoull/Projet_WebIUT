<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Panier</title>
        <meta charset="utf-8">
        <meta name = "format-detection" content = "telephone=no" />
        <link rel="icon" href="../images/favicon.ico" >
        <link rel="shortcut icon" href="../images/favicon.ico"  />
        <link  rel="stylesheet" media="screen" href="../css/style.css">
        <link  rel="stylesheet" href="../css/font-awesome.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-migrate-1.1.1.js"></script>
        <script src="../js/script.js"></script> 
        <script src="../js/jquery.equalheights.js"></script>
        <script src="../js/superfish.js"></script>
        <script  src="../js/jquery.responsivemenu.js"></script>
        <script  src="../js/jquery.mobilemenu.js"></script>
        <script  src="../js/jquery.easing.1.3.js"></script>
        
        <script src="../js/camera.js"></script>
        <!--[if (gt IE 9)|!(IE)]><!-->
        <script  src="../js/jquery.mobile.customized.min.js"></script>
        <!--<![endif]-->
        <script src="../js/jquery.carouFredSel-6.1.0-packed.js"></script>
        <script  src="../js/jquery.touchSwipe.min.js"></script>
    </head>

    <body>
        <!--==============================header=================================-->
        <header>
            <div class="container_12">
                <div class="grid_12">
                    <h1><a href="menu.php"><img src="../images/logo.png" alt="Prospect best opportunity to succeed"></a> </h1>
                    <div class="menu_block">
                        <nav>
                            <ul class="sf-menu">
                                <li>
                                    <a href="menu.php">Menu</a>  
                                </li>
                                <li>
                                    <a href="ComposerList.php">Liste des Compositeurs</a> 
                                </li>
                                <li>
                                    <a href="AlbumList.php">Liste des Albums</a>
                                </li>
                                <li>
                                    <a href="AboutProject.php">&Agrave; propos</a> 
                                </li>
                                <li class="current">
                                    <a href='SubscribersShopping.php'>Panier</a>
                                </li>
                                <li>
                                    <a href='DeconnexionSubscribers.php'>D&eacute;connexion</a>
                                 </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--=======content================================-->
        <div class="content projects">
            <div class="container_12">
                <div class="grid_12">
                    <h3>Votre Panier : <a class='litteFont' href="HistoryBuy.php">(Voir son historique d'achat)</a></h3>
                </div>
                
<?php
                include 'DatabaseConnexion.php';
                
                $statement = "SELECT DISTINCT Titre_Album, Titre FROM Album "
                        . "JOIN Disque ON Album.Code_Album=Disque.Code_Album "
                        . "JOIN Composition_Disque ON Disque.Code_Disque=Composition_Disque.Code_Disque "
                        . "JOIN Enregistrement On Composition_Disque.Code_Morceau=Enregistrement.Code_Morceau "
                        . "WHERE Album.Code_Album LIKE :code_album AND Enregistrement.Code_Morceau LIKE :code_morceau";

                
                $cart = $_SESSION["cart"];
                $quantityMusicalWork = $_SESSION["quantityMusicalWork"];
                
                var_dump($cart);
                
                if(strcmp($cart[0][0], "empty") != 0)
                {
                    for($i = 0; $i < count($cart); $i++)
                    {
                        $Code_Album = $cart[$i][0];

                        echo "\t\t\t\t<div class='clear cl2'></div>\n"
                                . "\t\t\t\t<img width='30%' height='30%' class='cart' alt=\"Pochette d'un album\" src='DataBaseAlbumCoverAccess.php?Code=" . $Code_Album . "'/>\n";        
                        
                        for($j = 1; $j < count($cart[$i]); $j++)
                        {
                            $requete = $pdo->prepare($statement);

                            $Code_Morceau = $cart[$i][$j];

                            $requete->bindValue('code_album', $Code_Album, PDO::PARAM_STR);
                            $requete->bindValue('code_morceau', $Code_Morceau, PDO::PARAM_STR);

                            $requete->execute();

                            $requete->bindColumn(1, $Titre_Album);
                            $requete->bindColumn(2, $Titre_Enregistrement);
                            
                            $u = 0;
                            $found = false;
                            $quantity = 0;
                            while($u < count($quantityMusicalWork) && !$found)
                            {
                                if($quantityMusicalWork[$u][0] == $Code_Morceau)
                                {
                                    $quantity = $quantityMusicalWork[$u][1];
                                    $found = true;
                                }
                                
                                $u = $u + 1;
                            }
                            
                            $u = $u - 1;
                            
                            $requete->fetch(PDO::FETCH_BOUND);

                            echo "\t\t\t\t<p class='cart'>\n"
                                . "\t\t\t\t\tMorceau : " . $Titre_Enregistrement . " <br>\n"
                                . "\t\t\t\t\tQuantité : " . $quantity
                                . "\t\t\t\t</p>\n";
                            
                            if ($quantity > 0) 
                            {
                                echo "\t\t\t\t<a href='SuppOneElementIntoCart.php?IndexQuantity=" . $u . "&amp;IndexCartI=" . $i . "&amp;IndexCartJ=" . $j . "'> Supprimer d'une quantit&eaute; </a>";
                            }
                        }
                    }
                }
                else
                {
                    echo "\t\t\t\t<p class='cart'>\n"
                        . "\t\t\t\t\tVous n'avez encore rien mis dans votre panier !\n"
                        . "\t\t\t\t</p>\n";
                }
                
                $pdo = null;
                ?>
                
                <a class="btn" href="buyContentCart.php">Acheter le contenu du panier</a>
            </div>
        </div>
        <!--==============================footer=================================-->
<?php include 'footer.php'; ?>

    </body>
</html>
