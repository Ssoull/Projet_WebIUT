<?php 

    session_start(); 
    
    setcookie("LastURL", "AboutProject.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About</title>
        <meta charset="utf-8">
        <meta name = "format-detection" content = "telephone=no" />
        <link rel="icon" href="../images/php.ico" >
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
                                <li class="current">
                                    <a href="AboutProject.php">&Agrave; propos</a> 
                                </li>
<?php
                                if(isset($_SESSION['login']))
                                {
                                    echo "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='SubscribersShopping.php'>Panier</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n"
                                        . "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='DeconnexionSubscribers.php'>D&eacute;connexion</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n";
                                }
                                else
                                {
                                    echo "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='ConnexionSubscribers.php'>Connexion</a>\n "
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
                        <div class="clear">
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!--=======content================================-->
        <div class="content">
            <div class="container_12 ">
                
                    <h3>About Us</h3>
                    <div class="grid_4 alpha ">
                        <div class="box"><div class="maxheight1">
                                <img src="../images/page2_img1.jpg" alt="" class="img_inner">
                                <div class="extra_wrapper">                                    
                                    <p class="mashallah"> Dans le cadre de la programmation WEB du 3ème semestre de DUT informatique de Bordeaux, nous avons réalisé un site de e-commerce. 
                                        Relié à la base de données Classique_web. <br>
                                        <strong> Liste des fonctionnalités </strong <br> 
                                        - Connexion / Suivi de session <br>
                                        - API Amazon <br>
                                        - Panier <br>
                                        - Recherche albums<br>
                                        - Recherche compositeurs<br>
                                   
                                        <strong> Problèmes rencontrés </strong><br>
                                        - Chargement de page lent à cause d'un fichier JS <br>
                                        - Gestion du tableau pour l'API Amazon <br>
                                        - Limite des albums similaires à 3 pour optimiser le chargement lent
                                        
                                        
                                        </p>
                                </div></div>
                        </div>
                    </div>                 
                               
                    
                    <div class="grid_4 alpha ">
                        <div class="box"><div class="maxheight1">
                                <img src="../images/page2_img2.jpg" alt="">
                                <div class="extra_wrapper">
                                    <p><strong>Anthony Nguyen</strong> </p>
                                    <p class="mashallah">Anthony Nguyen est l'un des deux développeur de l'équipe, il à été subvervisé par son coéquipier.</p>
                                </div></div>
                        </div>
                    </div>
                    <div class="grid_4 omega">
                        <div class="box">
                            <div class="maxheight1">
                                <img src="../images/page2_img3.jpg" alt="">
                                <div class="extra_wrapper">
                                    <p><strong>Pablo Gutierrez</strong></p>
                                    <p class="mashallah">Pablo Gutierrez a rempli le rôle de chef de projet et également de développeur. Il a dirigé le projet et à partagé le travail entre lui-même et son coéquipier.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="clear"></div>
                <div class="grid_12">
                    <div class="hor_separator mb0 "></div>
                </div>
                <div class="clear"></div>
               
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php include 'footer.php'; ?>

    </body>
</html>