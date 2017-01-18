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
                                    <a href="menu.php">Home</a>                              
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
                <div class="grid_4">
                    <div class="grid_8 emp_box">
                    <h3>About Us</h3>
                    <img src="../images/page2_img1.jpg" alt="" class="img_inner">
                    Dans le cadre de la programmation WEB du 3ème semestre de DUT informatique de BordeauxNous avons réalisé un site de e-commerce. Relié à la base de données Musique_web. Le site nous permet d'obtenir la liste des compositeurs présents dans la base de données, de leurs albums et également de leurs oeuvres. Suite à cela, il est possible, grâce à une API Amazon, de réaliser les achats des différents albums via un Panier(et ce uniquement aaprès connexion).
                </div>
                
                    <h3>Notre équipe</h3>

                    <div class="grid_4 alpha ">
                        <div class="box"><div class="maxheight1">
                                <img src="../images/page2_img2.jpg" alt="">
                                <div class="extra_wrapper">
                                    <p><strong>Anthony Nguyen</strong> </p>
                                    <a href="#">Anthony Nguyen est l'un des deux développeur de l'équipe, il à été subvervisé par son coéquipier.</a>
                                </div></div>
                        </div>
                    </div>
                    <div class="grid_4 omega">
                        <div class="box">
                            <div class="maxheight1">
                                <img src="../images/page2_img3.jpg" alt="">
                                <div class="extra_wrapper">
                                    <p><strong>Pablo Gutierrez</strong></p>
                                    <a href="#">Pablo Gutierrez a rempli le rôle de chef de projet et également de développeur. Il a dirigé le projet et à partagé le travail entre lui-même et son coéquipier.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="grid_12">
                    <div class="hor_separator hor2"></div>
                    <h3 class="head1">Dernières Nouvelles</h3>
                </div>
                <div class="grid_4">
                    <img src="../images/page2_img6.jpg" alt="" class="img_inner fleft">
                    <div class="extra_wrapper pad2">
                        <time datetime="2013-01-01">10/11/2016</time><br>
                        <strong><a href="#">Début du projet</a></strong>
                    </div>
                </div>
                <div class="grid_4">
                    <img src="../images/page2_img7.png" alt="" class="img_inner fleft">
                    <div class="extra_wrapper pad2">
                        <time datetime="2013-01-01">16/01/2017</time><br>
                        <strong><a href="#">Finition de la fonctionnalité "Panier"</a></strong>
                    </div>
                </div>
                <div class="grid_4">
                    <img src="../images/page2_img8.png" alt="" class="img_inner fleft">
                    <div class="extra_wrapper pad2">
                        <time datetime="2013-01-01">21/07/2017</time><br>
                        <strong><a href="#">Projet finalisé</a></strong>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="grid_12">
                    <div class="hor_separator mb0 "></div>
                </div>
                <div class="clear"></div>
                <div class="grid_12">
                    <h3>Clients</h3>
                    <ul class="logos">
                        <li><a href="#"><img src="../images/log1.png" alt=""></a></li>
                        <li><a href="#"><img src="../images/log2.png" alt=""></a></li>
                        <li><a href="#"><img src="../images/log3.png" alt=""></a></li>
                        <li><a href="#"><img src="../images/log4.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php include 'footer.php'; ?>

    </body>
</html>