<?php
session_start();
$Code_Album = $_GET['CodeAlbum'];
$Code_Morceau = $_GET['CodeMorceau'];

$cart = $_SESSION["cart"];

$found = false;



if(strcmp($cart[0][0], "empty") != 0)
{
    for($i = 0; $i < count($cart); $i++)
    {
        if($cart[$i][0] == $Code_Album)
        {
            $cart[$i][count($cart[$i])] = $Code_Morceau;
            $found = true;
        }
    }

    if(!$found)
    {
        $indice = count($cart);
        $cart[$indice][0] = $Code_Album;
        $cart[$indice][1] = $Code_Morceau;
    }
}
else
{
    $cart[0][0] = $Code_Album;
    $cart[0][1] = $Code_Morceau;
}

$_SESSION["cart"] = $cart;

header('Location: ' . $_COOKIE["LastURL"]);
?>