<?php 
    session_start(); 
    
    setcookie("LastURL", "ComposerList.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Liste des Compositeurs</title>
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
                                    <a href="menu.php">Home</a> 
                                    <ul>
                                        <li>
                                            <a href="#">Lorem ipsum</a>
                                        </li>

                                        <li>
                                            <a href="#">Corporis  </a>
                                            <ul>
                                                <li>
                                                    <a href="#">Ratione dicta</a>
                                                </li>
                                                <li>
                                                    <a href="#">Quaerat maiores</a>
                                                </li>
                                                <li>
                                                    <a href="#">Exercitationem</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Maiores ipsum</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="current">
                                    <a href="ComposerList.php">Liste des Compositeurs</a> 
                                </li>
                                <li>
                                    <a href="AlbumList.php">Liste des Albums</a>
                                </li>
                                <li>
                                    <a href="AboutProject.php">&Agrave; propos</a> 
                                </li>
                                <li>
                                    <form action="ComposerList.php" id="searchthis" method="post">
                                        <input id="search" name="searchBar" type="text" placeholder="Compositeurs"/>
                                    </form>
                                </li>
<?php
                                if(isset($_SESSION['login']))
                                {
                                    echo "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='SubscribersShopping.php'>Panier</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n"
                                        . "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='DeconnexionSubscribers.php'>D&eacute;connection</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n";
                                }
                                else
                                {
                                    echo "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='ConnexionSubscribers.php'>Connection</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n"
                                        . "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='InscriptionSubscribers.php'>S'inscrire</a>\n"
                                        . "\t\t\t\t\t\t\t\t</li>\n";
                                    
                                    session_unset();

                                    session_destroy();
                                }
                                ?>
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
                    <?php 
                    if(isset($_POST['searchBar']))
                    {
                        echo '<h3>Compositeur(s) commen&ccedil;ant par ' . $_POST['searchBar'] . " :</h3>\n"; 
                    }
                    else 
                    {
                        echo "<h3>Liste des compositeurs :</h3>\n";
                    }
                    ?>
                </div>
<?php
                include 'DatabaseConnexion.php';
                
                $statement = "Select Distinct Musicien.Code_Musicien, Prénom_Musicien, Nom_Musicien From Musicien "
                        . "Join Composer On Musicien.Code_Musicien=Composer.Code_Musicien Where Nom_Musicien Like :nom Order By Nom_Musicien";
                
                $requete = $pdo->prepare($statement);
            
                if(isset($_POST['searchBar']))
                {
                    $init = $_POST['searchBar'];
                }
                else
                {
                    $init='';
                }
                $requete->bindValue('nom', $init . '%', PDO::PARAM_STR);
                $requete->execute();
                
                $requete->bindColumn(1, $Code_Musicien);
                $requete->bindColumn(2, $Prenom_Musicien);
                $requete->bindColumn(3, $Nom_Musicien);
                
                $cpt = 0;
                

                while ($row = $requete->fetch(PDO::FETCH_BOUND))
                {
                    echo "\t\t\t\t<div class='grid_3'>\n"
                        . "\t\t\t\t\t<div class='box'>\n"
                        . "\t\t\t\t\t\t<div class='maxheight'>\n";

                    if($Prenom_Musicien == NULL)
                    {
                    echo "\t\t\t\t\t\t\t<h3>" . $Nom_Musicien . "</h3>\n";
                    }
                    else
                    {
                    echo "\t\t\t\t\t\t\t<h3>" . $Prenom_Musicien . "<br>" . $Nom_Musicien . "</h3>\n";
                    }

                    echo "\t\t\t\t\t\t\t<p>\n"
                        . "\t\t\t\t\t\t\t\t<img width='100%' height='100%' alt='Image du Compositeur : " . $Nom_Musicien . "' src='DataBaseMusicienImageAccess.php?Code=" . $Code_Musicien . "'/>\n"
                        . "\t\t\t\t\t\t\t</p>\n"
                        . "\t\t\t\t\t\t</div>\n"
                        . "\t\t\t\t\t\t<div class='box2'>\n"
                        . "\t\t\t\t\t\t\t<a href='AlbumList.php?Nom_Musicien=" . $Nom_Musicien . "&amp;Prenom_Musicien=" . $Prenom_Musicien . "' class='btn'>Album</a>\n"
                        . "\t\t\t\t\t\t</div>\n"
                        . "\t\t\t\t\t</div>\n"
                        . "\t\t\t\t</div>\n";
                    
                    $cpt++;
                    
                    if ($cpt == 4) {
                        echo "\t\t\t\t<div class='clear cl2'></div>\n";
                        $cpt = 0;
                    }
                     $pdo = null;
                }
                ?>
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php include 'footer.php'; ?>

    </body>
</html>