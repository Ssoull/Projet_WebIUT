<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Liste des oeuvres</title>
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
                    <h3>Oeuvres contenus dans l'album, <br> <?php echo $_GET['Titre_Album']; ?></h3>
                </div>
                
                <div class="grid_12">
                
                <?php
                include 'DatabaseConnexion.php';

                $statement = "Select Distinct Titre, Composition_Disque.Code_Morceau From Musicien "
                        . "Join Composer On Musicien.Code_Musicien=Composer.Code_Musicien "
                        . "Join Oeuvre On Composer.Code_Oeuvre=Oeuvre.Code_Oeuvre "
                        . "Join Composition_Oeuvre On Oeuvre.Code_Oeuvre=Composition_Oeuvre.Code_Oeuvre "
                        . "Join Enregistrement On Composition_Oeuvre.Code_Composition=Enregistrement.Code_Composition "
                        . "Join Composition_Disque On Enregistrement.Code_Morceau=Composition_Disque.Code_Morceau "
                        . "Join Disque On Composition_Disque.Code_Disque=Disque.Code_Disque "
                        . "Join Album On Disque.Code_Album=Album.Code_Album "
                        . "Join Genre On Album.Code_Genre=Genre.Code_Genre "
                        . "Where Titre_Album Like :titre_album Order By Titre";

                $requete = $pdo->prepare($statement);

                $Titre_Album = $_GET['Titre_Album'];
                $Code_Album = $_GET['Code_Album'];

                $requete->bindValue('titre_album', $Titre_Album . '%', PDO::PARAM_STR);
                $requete->execute();
                
                $requete->bindColumn(1, $Titre_Enregistrement);
                $requete->bindColumn(2, $Code_Morceau);
                
                echo "\t\t\t\t<div class='block1'>\n";

echo "\t\t\t\t\t<img alt=\"Image de l'album, " . $Titre_Album . "\" src='DataBaseAlbumCoverAccess.php?Code=" . $Code_Album . "'/>\n";
                echo "\t\t\t\t</div>\n";
                
                while ($row = $requete->fetch(PDO::FETCH_BOUND)) {

                    echo "\t\t\t\t<p>\n\t\t\t\t\t<audio src='DataBaseAudioAccess.php?Code=" . $Code_Morceau ."' controls>L'extrait du morceau suivant est introuvable : </audio> <br> ";
                    
                    echo $Titre_Enregistrement . "\n\t\t\t\t</p>\n";
                }
                
                /**
                    <div class="block1">
                        <img src="images/page3_img5.jpg" alt="" class="img_inner fleft">
                        <div class="extra_wrapper">
                          <p class="p1"><strong><a href="#">Suspendisse sollicitudin velit sed leo</a></strong></p> Sed diam non umy nibheuismod incidunt ut lao reet dolore magna. aliquam erat volutpatFusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, 
                        </div>
                        <div class="clear"></div>
                    </div>
                      <div class="block1">
                        <img src="images/page3_img6.jpg" alt="" class="img_inner fleft">
                        <div class="extra_wrapper">
                          <p class="p1"><strong><a href="#">Donec in velit vel ipsum auctor pulvinar</a></strong></p>Sed diam non umy nibheuismod incidunt ut lao reet dolore magna. aliquam erat volutpatFusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. Mauris accumsan nulla vel diam. Sed in lacus ut enim adipiscing aliquet. Nulla venenatis. In pede mi, aliquet sit amet, euismod in, 
                        </div>
                        <div class="clear"></div>
                    </div>
                 */
                
                $pdo = null;
                ?>
                    
                </div>
            </div>
        </div>
        <!--==============================footer=================================-->
<?php include 'footer.php'; ?>

    </body>
</html>
