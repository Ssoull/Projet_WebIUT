<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Liste des oeuvres</title>
        <meta charset="utf-8">
        <meta name = "format-detection" content = "telephone=no" />
        <link rel="icon" href="../images/favicon.ico" >
        <link rel="shortcut icon" href="../images/favicon.ico"  />
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
<?php
                include 'DatabaseConnexion.php';

                $statement = "Select Distinct Titre, Composition_Disque.Code_Morceau, ASIN, Libellé_Abrégé, Nom_Editeur From Musicien "
                        . "Join Composer On Musicien.Code_Musicien=Composer.Code_Musicien "
                        . "Join Oeuvre On Composer.Code_Oeuvre=Oeuvre.Code_Oeuvre "
                        . "Join Composition_Oeuvre On Oeuvre.Code_Oeuvre=Composition_Oeuvre.Code_Oeuvre "
                        . "Join Enregistrement On Composition_Oeuvre.Code_Composition=Enregistrement.Code_Composition "
                        . "Join Composition_Disque On Enregistrement.Code_Morceau=Composition_Disque.Code_Morceau "
                        . "Join Disque On Composition_Disque.Code_Disque=Disque.Code_Disque "
                        . "Join Album On Disque.Code_Album=Album.Code_Album "
                        . "Join Genre On Album.Code_Genre=Genre.Code_Genre "
                        . "Join Editeur On Album.Code_Editeur=Editeur.Code_Editeur "
                        . "Where Titre_Album Like :titre_album Order By Titre";

                $requete = $pdo->prepare($statement);

                $Titre_Album = $_GET['Titre_Album'];
                $Code_Album = $_GET['Code_Album'];

                $requete->bindValue('titre_album', $Titre_Album . '%', PDO::PARAM_STR);
                $requete->execute();
                
                $requete->bindColumn(1, $Titre_Enregistrement);
                $requete->bindColumn(2, $Code_Morceau);
                $requete->bindColumn(3, $Code_ASIN);
                $requete->bindColumn(4, $Genre);
                $requete->bindColumn(5, $Editeur);

                
                while ($row = $requete->fetch(PDO::FETCH_BOUND)) {
                    $Reponse_req_Code_Morceau[] = $Code_Morceau;
                    $Reponse_req_Titre_Enregistrement[] = $Titre_Enregistrement;
                }
                
                include '../AmazonAPI/rootKey.php';
                $AmazonData = new SimpleXMLElement($xmlstr);

                require('AmazonECS.class.php'); //nom de la classe téléchargée

                $Aws_ID = $AmazonData->AWSAccessKeyID;
                $Aws_SECRET = $AmazonData->AWSSecretKey; //Secret
                $associateTag= $AmazonData->AssociateTag; // AssociateTag

                $Aws_ID = trim($Aws_ID);
                $Aws_SECRET = trim($Aws_SECRET);
                $associateTag = trim($associateTag);
                $client = new AmazonECS($Aws_ID, $Aws_SECRET, 'FR', $associateTag);
                
                $response = $client->responseGroup('Large')->lookup($Code_ASIN);

                echo "\t\t\t\t<div class='grid_12'>\n";
                echo "\t\t\t\t\t<div class='block1'>\n";
                
                if(isset($response->Items->Item->DetailPageURL))
                {
                    echo "\t\t\t\t\t\t<a href='". $response->Items->Item->DetailPageURL ."'><img width='30%' height='30%' class='img_inner fleft' alt=\"Image de l'album, " . $Titre_Album . "\" src='DataBaseAlbumCoverAccess.php?Code=" . $Code_Album . "'/></a>\n";
                }
                else
                {
                    echo "\t\t\t\t\t\t<img width='30%' height='30%' class='img_inner fleft' alt=\"Image de l'album, " . $Titre_Album . "\" src='DataBaseAlbumCoverAccess.php?Code=" . $Code_Album . "'/>\n";
                }
                    
                echo "\t\t\t\t\t\t<div class='extra_wrapper'>\n";
                
                echo "\t\t\t\t\t\t\t<p class='p1'>Genre: " . $Genre . "</p>\n";
                if(!isset($Code_ASIN)) 
                {
                    echo "\t\t\t\t\t\t\t<p class='p1'>&Eacute;diteur: " . $Editeur . "</p>\n";
                }
                
                if(isset($Code_ASIN)) 
                {
                    if(isset($response->Items->Item->ItemAttributes->Artist))
                    {
                        $cpt = 0;
                        echo "\t\t\t\t\t\t\t<p class='p1'>Artiste(s): ";
                        foreach((array)$response->Items->Item->ItemAttributes->Artist as $Artistes)
                        {
                            if($cpt != 0)
                            {
                                echo ', ';
                            }
                            echo $Artistes;
                            
                            $cpt++;
                        }
                        echo ".</p>\n";
                    }
                    
                    if(isset($response->Items->Item->ItemAttributes->Brand))
                    {
                        echo "\t\t\t\t\t\t\t<p class='p1'>Marque: " . $response->Items->Item->ItemAttributes->Brand . "</p>\n";
                    }
                    
                    if(isset($response->Items->Item->ItemAttributes->Studio))
                    {
                        echo "\t\t\t\t\t\t\t<p class='p1'>Studio: " . $response->Items->Item->ItemAttributes->Studio . "</p>\n";
                    }
                    
                    if(isset($response->Items->Item->ItemAttributes->ReleaseDate))
                    {   
                        echo "\t\t\t\t\t\t\t<p class='p1'>Date de sortie: " . $response->Items->Item->ItemAttributes->ReleaseDate . "</p>\n";
                    }
                    
                    if(isset($response->Items->Item->ItemAttributes->ListPrice->FormattedPrice))
                    {
                        echo "\t\t\t\t\t\t\t<p class='p1'>Prix: " . $response->Items->Item->ItemAttributes->ListPrice->FormattedPrice . "</p>\n";
                    }
                    
                    if(isset($response->Items->Item->BrowseNodes->BrowseNode->Name))
                    {
                        echo "\t\t\t\t\t\t\t<p class='p1'>Mot cl&eacute; de recherche: " . $response->Items->Item->BrowseNodes->BrowseNode->Name . ".</p>\n";
                    }
                    else
                    {
                        $cpt = 0;
                        echo "\t\t\t\t\t\t\t<p class='p1'>Mots cl&eacute;s de recherche: ";
                        foreach($response->Items->Item->BrowseNodes->BrowseNode as $Mot_Cles)
                        {
                            if($cpt != 0)
                            {
                                echo ', ';
                            }
                            echo $Mot_Cles->Name;
                            
                            $cpt++;
                        }
                        echo ".</p>\n";
                    }
                }
                else
                {
                    echo "\t\t\t\t\t\t<p class='p1'> AUCUNE DONN&Eacute;ES AMAZON </p>\n";
                }
                
                echo "\t\t\t\t\t\t</div>\n";   
                echo "\t\t\t\t\t</div>\n";
                echo "\t\t\t\t</div>\n";
                
                if(isset($Code_ASIN) && isset($response->Items->Item->SimilarProducts)) 
                {
                    echo "\t\t\t\t<div class='bg1'>\n";
                    echo "\t\t\t\t\t<div class='container_12 car'>\n";
                    echo "\t\t\t\t\t\t<div class='grid_12'>\n";
                    echo "\t\t\t\t\t\t\t<h3>\n\t\t\t\t\t\t\t\t<span>Album(s) similaire</span>\n\t\t\t\t\t\t\t</h3>\n";
                    echo "\t\t\t\t\t\t\t<div class='carousel_wrapper'>\n";
                    echo "\t\t\t\t\t\t\t\t<a href='#' class='prev1'></a>\n\t\t\t\t\t\t\t\t<a href='#' class='next1'></a>\n";
                    echo "\t\t\t\t\t\t\t\t<div>\n";
                    echo "\t\t\t\t\t\t\t\t\t<ul class='carousel1'>\n";
                    
                    if(isset($response->Items->Item->SimilarProducts->SimilarProduct->Title))
                    {
                        echo "\t\t\t\t\t\t\t\t\t\t<li>\n";
                        echo "\t\t\t\t\t\t\t\t\t\t\t<p><em>" . $response->Items->Item->SimilarProducts->SimilarProduct->Title . "</em></p><br>\n";
                        echo "\t\t\t\t\t\t\t\t\t\t</li>\n";
                    }
                    else {
                        foreach($response->Items->Item->SimilarProducts->SimilarProduct as $Album_Similaire)
                        {
                            echo "\t\t\t\t\t\t\t\t\t\t<li>\n";
                            echo "\t\t\t\t\t\t\t\t\t\t\t<p><em>" . $Album_Similaire->Title . "</em></p><br>\n";
                            echo "\t\t\t\t\t\t\t\t\t\t</li>\n";
                        }    
                    }
                    
                    echo "\t\t\t\t\t\t\t\t\t</ul>\n"; 
                    echo "\t\t\t\t\t\t\t\t</div>\n";
                    echo "\t\t\t\t\t\t\t</div>\n";
                    echo "\t\t\t\t\t\t</div>\n";
                    echo "\t\t\t\t\t</div>\n";
                    echo "\t\t\t\t</div>\n";
                }
                echo "\t\t\t\t<div class='clear cl2'></div>\n";
                echo "\t\t\t\t<div class='grid_12'>\n";
                
                $cpt = 0;
                
                foreach($Reponse_req_Code_Morceau as $Code_Morceau) {

                    echo "\t\t\t\t\t<p>\n\t\t\t\t\t\t<audio src='DataBaseAudioAccess.php?Code=" . $Code_Morceau ."' controls>L'extrait du morceau suivant est introuvable : </audio> <br> ";
                    
                    echo $Reponse_req_Titre_Enregistrement[$cpt] . "\n\t\t\t\t\t</p>\n";
                    
                    $cpt++;
                }
                
                echo "\t\t\t\t</div>";
                $pdo = null;
                ?>

            </div>
        </div>
        <!--==============================footer=================================-->
<?php include 'footer.php'; ?>

    </body>
</html>
