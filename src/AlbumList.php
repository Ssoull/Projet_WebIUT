<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Liste des Albums</title>
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
                                <li>
                                    <a href="index-1.php">About</a> 
                                </li>
                                <li>
                                    <a href="ComposerList.php">Liste des Compositeurs</a> 
                                </li>
                                <li class="current">
                                    <a href="AlbumList.php">Liste des Albums</a>
                                </li>
                                
                                <li>
                                    <a href="index-4.php">Contacts</a> 
                                </li>
                                <li>
                                    <form action="ComposerList.php" id="searchthis" method="post">
                                        <input id="search" name="searchBar" type="text" placeholder="Compositeurs"/>
                                    </form>
                                </li>
                                <li>
                                    <a href="ComposerList.php">Connexion</a> 
                                </li>
                                <li>
                                    <a href="InscriptionSubscribers.php">S'inscrire</a> 
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
                    <?php 
                    if(isset($_GET["Nom_Musicien"]))
                    {
                        echo '<h3>Albums de ' . $_GET['Prenom_Musicien'] . ' ' . $_GET['Nom_Musicien'] . " :</h3>\n"; 
                    }
                    else 
                    {
                        echo "<h3>Liste des albums :</h3>\n";
                    }
                    ?>
                </div>
<?php
                include 'DatabaseConnexion.php';
                
                $statement = "Select Distinct Titre_Album, Album.Code_Album, Libellé_Abrégé From Musicien "
                        . "Join Composer On Musicien.Code_Musicien=Composer.Code_Musicien "
                        . "Join Oeuvre On Composer.Code_Oeuvre=Oeuvre.Code_Oeuvre "
                        . "Join Composition_Oeuvre On Oeuvre.Code_Oeuvre=Composition_Oeuvre.Code_Oeuvre "
                        . "Join Enregistrement On Composition_Oeuvre.Code_Composition=Enregistrement.Code_Composition "
                        . "Join Composition_Disque On Enregistrement.Code_Morceau=Composition_Disque.Code_Morceau "
                        . "Join Disque On Composition_Disque.Code_Disque=Disque.Code_Disque "
                        . "Join Album On Disque.Code_Album=Album.Code_Album "
                        . "Join Genre On Album.Code_Genre=Genre.Code_Genre "
                        . "Where Nom_Musicien Like :nom Order By Titre_Album";
                
                $requete = $pdo->prepare($statement);
            
                if(isset($_GET['Nom_Musicien']))
                {
                    $init = $_GET['Nom_Musicien'];
                }
                else
                {
                    $init='';
                }
                $requete->bindValue('nom', $init . '%', PDO::PARAM_STR);
                $requete->execute();
                
                $requete->bindColumn(1, $Titre_Album);
                $requete->bindColumn(2, $Code_Album);
                $requete->bindColumn(3, $Libelle_Abrege);
                
                $cpt = 0;
                
                while ($row = $requete->fetch(PDO::FETCH_BOUND))
                {
                    echo "\t\t\t\t<div class='grid_3'>\n"
                        . "\t\t\t\t\t<div class='box'>\n"
                        . "\t\t\t\t\t\t<div class='maxheight'>\n"
                        . "\t\t\t\t\t\t\t<h3>" . $Titre_Album . "</h3>\n"
                        . "\t\t\t\t\t\t\t<p>\n"
                        . "\t\t\t\t\t\t\t\t<img width='100%' height='100%' alt='Image de la pochette : " . $Titre_Album . "' src='DataBaseAlbumCoverAccess.php?Code=" . $Code_Album . "'/>\n"
                        . "\t\t\t\t\t\t\t</p>\n"
                        . "\t\t\t\t\t\t\t<p>\n"
                        . "\t\t\t\t\t\t\t\tGenre : " . $Libelle_Abrege . "\n"
                        . "\t\t\t\t\t\t\t</p>\n"
                        . "\t\t\t\t\t\t</div>\n"
                        . "\t\t\t\t\t\t<div class='box2\'>\n"
                        . "\t\t\t\t\t\t\t<a href='MusicalWorkList.php?Titre_Album=" . $Titre_Album . "&amp;Code_Album=" . $Code_Album . "' class='btn'>Oeuvres</a>\n"
                        . "\t\t\t\t\t\t</div>\n"
                        . "\t\t\t\t\t</div>\n"
                        . "\t\t\t\t</div>\n";
                    
                    $cpt++;
                    
                    if ($cpt == 4) {
                        echo "\t\t\t\t<div class='clear cl2'></div>\n";
                        $cpt = 0;
                    }
                }
                $pdo = null;
                ?>
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php include 'footer.php'; ?>

    </body>
</html>