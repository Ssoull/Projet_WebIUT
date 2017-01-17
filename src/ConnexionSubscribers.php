<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contacts</title>
        <meta charset="utf-8">
        <meta name = "format-detection" content = "telephone=no" />
        <link rel="icon" href="../images/favicon.ico" >
        <link rel="shortcut icon" href="../images/favicon.ico"  />
        <link  rel="stylesheet" media="screen" href="../css/style.css">
        <link  rel="stylesheet" href="../css/font-awesome.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/form.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-migrate-1.1.1.js"></script>
        <script src="../js/script.js"></script> 
        <script src="../js/jquery.equalheights.js"></script>
        <script src="../js/superfish.js"></script>
        <script type="text/javascript" src="../js/forms.js"></script>
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
                                        . "\t\t\t\t\t\t\t\t\t<a href='DeconnexionSubscribers.php'>D&eacute;connexion</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n";
                                }
                                else
                                {
                                    echo "\t\t\t\t\t\t\t\t<li class='current'>\n"
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
                    </div>
                </div>
            </div>
        </header>
        <!--=======content================================-->
<?php
        
        $login = '';
        $result = 10;

        if(isset($_COOKIE["login"]))
        {
            $login = $_COOKIE["login"];
        }

        if (isset($_GET['result'])) {
            $result = $_GET['result'];
        }
        ?>
        <div class="content">
            <div class="container_12">
                <div class="grid_7">
                    <h3>Inscription</h3>
                    <form method="post" action="SetCookiesConnection.php">
                        <label>
<?php
                            if ($result == 2) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tIdentifiant et/ou mot de passe incorrect.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            }
                            else if ($result == 0)
                            {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tVeulliez mettre votre identifiant.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            }
                            ?>
                            <p>
                                Identifiant : <input class="data" name='login' type="text" value="<?php echo $login; ?>">
                            </p>
                            <br class="clear">
                        </label>
                        <label>
<?php
                            if ($result == 1)
                            {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tVeulliez mettre votre mot de passe.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            }
                            ?>
                            <p>
                                Mot de passe : <input class="data" name="password" type="password">
                            </p>
                            <br class="clear">
                        </label>
                        <div class="clear"></div>

                        <input name="Connect" type="submit" value="Se connecter" class="btn"/>
                    </form>
                </div>
            </div>
        </div>
        <!--==============================footer=================================-->
<?php include 'footer.php'; ?>

    </body>
</html>