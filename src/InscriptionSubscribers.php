<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>S'inscrire</title>
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
                                    echo "\t\t\t\t\t\t\t\t<li>\n"
                                        . "\t\t\t\t\t\t\t\t\t<a href='ConnexionSubscribers.php'>Connexion</a>\n "
                                        . "\t\t\t\t\t\t\t\t</li>\n"
                                        . "\t\t\t\t\t\t\t\t<li class='current'>\n"
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
        
        $name = '';
        $login = '';
        
        if(isset($_COOKIE["name"]))
        {
            $name = $_COOKIE["name"];
        }
        
        if(isset($_COOKIE["login"]))
        {
            $login = $_COOKIE["login"];
        }
        
        $erreur = 10;

        if (isset($_GET['erreur'])) {
            $erreur = $_GET['erreur'];
        }
        ?>
        <div class="content">
            <div class="container_12">
                <div class="grid_7">
                    <h3>Inscription</h3>
                    <form method="post" action="SetCookiesInscription.php">
                        <label>
<?php
                            if ($erreur == 0) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tNom obligatoire.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            } else if ($erreur == 1) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tLe nom est trop long.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            }
                            ?>
                            <p>
                                Nom : <input class="data" name='name' type="text" value="<?php echo $name; ?>">
                            </p>
                        </label>
                        <label>
<?php
                            if ($erreur == 2) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tCet identifiant est déjà pris.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            } else if ($erreur == 3) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tIdentifiant obligatoire.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            } else if ($erreur == 5) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tL'identifiant choisi est trop long.\n"
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
                            if ($erreur == 4) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tRentrer un mot de passe.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            } else if ($erreur == 6) {
                                echo "\t\t\t\t\t\t<p style='color:red'> "
                                . "\t\t\t\t\t\t\t\tLe choisi mot de passe est trop long.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            } else if ($erreur == 7) {
                                echo "\t\t\t\t\t\t\t<p style='color:red'>\n"
                                . "\t\t\t\t\t\t\t\tLes deux mots de passe ne sont pas identiques.\n"
                                . "\t\t\t\t\t\t\t</p>\n";
                            }
                            ?>
                            <p>
                                Mot de passe : <input class="data" name="password1" type="password">
                            </p>
                            <br class="clear">
                        </label>
                        <label>
                            <p>
                                Confirmer le mot de passe : <input class="data" name="password2" type="password">
                            </p>
                            <br class="clear">
                        </label>
                        <div class="clear"></div>

                        <input name="Inscription" type="submit" value="S'inscrire" class="btn"/>
                    </form>
                </div>
            </div>
        </div>
        <!--==============================footer=================================-->
<?php include 'footer.php'; ?>

    </body>
</html>