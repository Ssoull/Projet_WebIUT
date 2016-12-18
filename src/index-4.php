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
                                    <a href="index-2.php">Services</a> 
                                </li>
                                <li>
                                    <a href="ComposerList.php">Liste des Compositeurs</a> 
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
                <div class="grid_5">
                    <div class="pad3">
                        <h3>Contact Info</h3>
                        <div class="map">
                            <figure class="">
                                <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                            </figure>
                            <div class="text1">The Company Name Inc. </div>
                            <address>
                                <dl>
                                    <dt>
                                        8901 Marmora Road,<br>
                                        Glasgow, D04 89GR.
                                    </dt>
                                    <dd><span>Freephone:</span>+1 800 559 6580</dd>
                                    <dd><span>Telephone:</span>+1 800 603 6035</dd>
                                    <dd><span>FAX:</span>+1 800 889 9898</dd>
                                    <dd>E-mail: <a href="#" class="link-1">mail@demolink.org</a></dd>
                                </dl>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="grid_7">
                    <h3>Get In Touch</h3>
                    <form id="form">
                        <div class="success_wrapper">
                            <div class="success">Contact form submitted!<br>
                                <strong>We will be in touch soon.</strong> 
                            </div>
                        </div>
                        <fieldset>
                            <label class="name">
                                <input type="text" value="Name:">
                                <br class="clear">
                                <span class="error error-empty">*This is not a valid name.
                                </span>
                                <span class="empty error-empty">*This field is required.
                                </span> 
                            </label>
                            <label class="email">
                                <input type="text" value="E-mail:">
                                <br class="clear">
                                <span class="error error-empty">*This is not a valid email address.
                                </span>
                                <span class="empty error-empty">*This field is required.
                                </span> 
                            </label>
                            <label class="phone">
                                <input type="tel" value="Phone:">
                                <br class="clear">
                                <span class="error error-empty">*This is not a valid phone number.</span>
                                <span class="empty error-empty">*This field is required.
                                </span> 
                            </label>
                            <label class="message">
                                <textarea>Message:</textarea>
                                <span class="error">*The message is too short.
                                </span> 
                                <span class="empty">*This field is required.</span> 
                            </label>
                            <div class="clear"></div>
                            <div class="btns">
                                <a data-type="reset" class="btn">clear</a>
                                <a data-type="submit" class="btn">submit</a>
                                <div class="clear"></div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php include 'footer.php'; ?>

    </body>
</html>