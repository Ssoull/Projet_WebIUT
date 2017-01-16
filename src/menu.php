<?php 
    session_start(); 
    
    setcookie("LastURL", "menu.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name = "format-detection" content = "telephone=no" />
        <link rel="icon" href="../images/favicon.ico" >
        <link rel="shortcut icon" href="../images/php.ico"  />
        <link  rel="stylesheet" media="screen" href="../css/style.css">
        <link  rel="stylesheet" href="../css/camera.css">
        <link  rel="stylesheet" href="../css/carousel.css">
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
        <script>
            $(document).ready(function () {
                jQuery('#camera_wrap').camera({
                    loader: false,
                    pagination: false,
                    thumbnails: false,
                    height: '45%',
                    caption: false,
                    navigation: true,
                    fx: 'simpleFade'
                });
            });

            $(window).load(
                    function () {
                        $('.carousel1').carouFredSel({auto: false, prev: '.prev1', next: '.next1', width: 940, items: {
                                visible: {min: 1,
                                    max: 1
                                },
                                height: 'auto',
                                width: 940,
                            }, responsive: true,
                            scroll: 1,
                            mousewheel: false,
                            swipe: {onMouse: true, onTouch: true}});

                    });


        </script>

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
                                    <a class="current" href="menu.php">Home</a>  
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
                                        <input id="search" name="searchBar" type="search" placeholder="Compositeurs"/>
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
                        <div class="clear">
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!--==============================content=================================-->
        <div class="clear"></div>
        <div class="bg1">
            <div class="container_12">
                <div class="grid_12">
                    <div class="slider_wrapper">
                        <div>
                            <div id="camera_wrap" class="">
                                <div data-src="../images/slide.jpg">
                                    <div class="caption fadeIn">
                                        <h2>Un superbe projet Web ! </h2>
                                    </div>
                                </div>
                                <div data-src="../images/slide1.jpg">
                                    <div class="caption fadeIn">
                                        <h2>En PHP</h2>
                                    </div>
                                </div>
                                <div data-src="../images/slide2.jpg">
                                    <div class="caption fadeIn">
                                        <h2>Sujet</h2> Réaliser un site web de type e-commerce

                                    </div>
                                </div>
                            </div>
                        </div></div>
                </div>
            </div>

   
            <div class="container_12 car">
                <div class="grid_12">
                    <h3><span>Citations</span></h3>
                    <div class="carousel_wrapper">
                        <a href="#" class="prev1"></a><a href="#" class="next1"></a>
                        <div>
                            <ul class="carousel1">
                                <li>
                                    <p><em>"La musique savante manque à notre désir" Arthur Rimbaud</em></p>
                                  
                                </li>
                                <li>
                                    <p><em>"Le seul véritable commentaire d'un morceau de musique est un autre morceau de musique." Igor Stravinsky</em></p>
                                  
                                </li>
                                <li>
                                    <p><em>"La musique est une révélation plus haute que toute sagesse et toute philosophie." Ludwig Van Beethoven</em></p>
                           
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=======content================================-->
        <div class="content page1">
            <div class="container_12">
                <div class="grid_4">
                    <div class="pad1">
                        <h3>Raccourcis</h3>
                        <ul class="list">
                            <li><a href="http://info-timide.iut.u-bordeaux.fr/perso/2017/anctrang/projet/Projet_WebIUT/src/ComposerList.php">Liste des compositeurs</a></li>
                            <li><a href="http://info-timide.iut.u-bordeaux.fr/perso/2017/anctrang/projet/Projet_WebIUT/src/AlbumList.php">Liste des albums</a></li>
                            <li><a href="http://info-timide.iut.u-bordeaux.fr/perso/2017/anctrang/projet/Projet_WebIUT/src/index-1.php">A propos de nous</a></li>
                            <li><a href="http://info-timide.iut.u-bordeaux.fr/perso/2017/anctrang/projet/Projet_WebIUT/src/index-4.php">Contacts</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="grid_8 emp_box">
                    <h3>Notre projet</h3>
                    <div class="grid_4 alpha ">
                        <div class="box"><div class="maxheight1">
                                <img width="50%" src="../images/page1_img1.png" alt="">
                                <div class="extra_wrapper"><p><strong>Un projet PHP</strong> </p>
                                    <a href="#">Ce projet à été réalisé en PHP</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid_4 omega">
                        <div class="box"><div class="maxheight1">
                                <img width="50%" src="../images/page1_img2.jpg" alt="">
                                <div class="extra_wrapper"><p><strong>Binôme</strong></p>
                                    <a href="#">Ce projet à été réalisé par Anthony Nguyen Cong Trang et Pablo Gutierrez</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear cl1"></div>
                    
                    <div class="grid_4 omega">
                        <div class="box"><div class="maxheight1">
                                <img width="50%" src="../images/page1_img4.jpg" alt="">
                                <div class="extra_wrapper"><p><strong>Principe</strong></p> 
                                    <a href="#">Il s'agit de construire un site web de type e-commerce s'appuyant sur la base de données de musique Classique_Web disponible sur le serveur info-simplet.  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php include 'footer.php' ?>

    </body>
</html>