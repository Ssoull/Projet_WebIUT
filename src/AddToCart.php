<?php
session_start();
$Code_Album = $_GET['CodeAlbum'];
$Code_Morceau = $_GET['CodeMorceau'];

$cart = $_SESSION["cart"];

$found = false;

echo 'coucou';

if($cart[0][0] != "")
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
        $cart[count($cart)][0] = $Code_Album;
        $cart[count($cart)][1] = $Code_Morceau;
    }
}
else
{
    $cart[0][0] = $Code_Album;
    $cart[0][1] = $Code_Morceau;
}
header('Location: ' . $_COOKIE["LastURL"]);
?>