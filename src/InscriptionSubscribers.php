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
                                    </ul></li>
                                <li>
                                    <a href="index-1.php">About</a> 
                                </li>
                                <li>
                                    <a href="ComposerList.php">Liste des Compositeurs</a> 
                                </li>
                                <li>
                                    <a href="AlbumList.php">Liste des Albums</a>
                                </li>
                                
                                <li class="current">
                                    <a href="index-4.php">Contacts</a> 
                                </li>
                                <li>
                                    <form action="ComposerList.php" id="searchthis" method="post">
                                        <input id="search" name="searchBar" type="text" placeholder="Compositeurs"/>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--=======content================================-->
        
        <div class="content">
            <div class="container_12">
                <div class="grid_7">
                    <h3>Inscription</h3>
                    <form id="form" method="post" action="menu.php">
                        <div class="success_wrapper">
                            <div class="success">Inscription effectu&eacute;e.<br>
                                <strong>Bienvenue !</strong> 
                            </div>
                        </div>
                        <fieldset>
                            <label class="name">
                                <input class="data" type="text" value="Nom :">
                                <br class="clear">
                                <!--<span class="empty error-empty">*This field is required.
                                </span>-->
                            </label>
                            <label class="email">
                                <input class="data" type="text" value="E-mail :">
                                <br class="clear">
                                <!--<span class="error error-empty">*This is not a valid email address.
                                </span>
                                <span class="empty error-empty">*This field is required.
                                </span>-->
                            </label>
                            <label class="phone">
                                <input class="data" type="tel" value="T&eacute;l&eacute;phone :">
                                <br class="clear">
                                <!--<span class="error error-empty">*This is not a valid phone number.</span>
                                <span class="empty error-empty">*This field is required.
                                </span>-->
                            </label>
                            <div class="clear"></div>
                        </fieldset>
                        <div class="btns">
                            <a data-type="reset" class="btn">clear</a>
                            <a data-type='submit' href='MusicalWorkList.php' class="btn">submit</a>
                            <div class="clear"></div>
                        </div>
                        <input name="Connect" type="submit" value="Connecter" class="btn"/>
                    </form>
                </div>
            </div>
        </div>
        
        
        
        <!--==============================footer=================================-->
        <?php include 'footer.php'; ?>

    </body>
</html>