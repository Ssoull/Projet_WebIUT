<?php
session_start();
$Code_Album = $_GET['CodeAlbum'];
$Code_Morceau = $_GET['CodeMorceau'];

$cart = $_SESSION["cart"];
$quantityMusicalWork = $_SESSION["quantityMusicalWork"];

$found = false;



if(strcmp($cart[0][0], "empty") != 0)
{
    $i = 0;
    while($i < count($cart) && !$found)
    {
        if($cart[$i][0] == $Code_Album)
        {
            $found = true;
            
            $found2 = false;
            $j = 0;
            while($j < count($cart[$i]) && !$found2)
            {
                if($cart[$i][$j] == $Code_Morceau)
                {
                    $found2 = true;
                }
                
                $j = $j + 1;
            }
            
            if(!$found2)
            {
                $cart[$i][count($cart[$i])] = $Code_Morceau;
            }
        }
        $i = $i + 1;
    }
    
    if(!$found)
    {
        $indice = count($cart);
        $cart[$indice][0] = $Code_Album;
        $cart[$indice][1] = $Code_Morceau;
    }
    
    $found = false;
    $i = 0;
    while($i < count($quantityMusicalWork) && !$found)
    {
        if($quantityMusicalWork[$i][0] == $Code_Morceau)
        {
            $quantityMusicalWork[$i][1] = $quantityMusicalWork[$i][1] + 1;
            $found = true;
        }
            
        $i = $i + 1;
    }
    
    if(!$found)
    {
        $indice = count($quantityMusicalWork);
        $quantityMusicalWork[$indice][0] = $Code_Morceau;
        $quantityMusicalWork[$indice][1] = 1;
    }
}
else
{
    $cart[0][0] = $Code_Album;
    $cart[0][1] = $Code_Morceau;
    
    $quantityMusicalWork[0][0] = $Code_Morceau;
    $quantityMusicalWork[0][1] = 1;
}

$_SESSION["cart"] = $cart;
$_SESSION["quantityMusicalWork"] = $quantityMusicalWork;

header('Location: ' . $_COOKIE["LastURL"]);
?>