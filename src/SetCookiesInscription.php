<?php

setcookie("name", $_POST["name"]);
setcookie("login", $_POST["login"]);
setcookie("pwd", $_POST["password1"]);
setcookie("pwd2", $_POST["password2"]);

header('Location: CheckNewSubscribers.php');

?>