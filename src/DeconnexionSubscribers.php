<?php
session_start();
session_unset();
session_destroy();

setcookie("login", "", time()-1);
setcookie("password", "", time()-1);
setcookie("name", "", time()-1);
setcookie("password1", "", time()-1);
setcookie("password2", "", time()-1);

header('Location: ' . $_COOKIE["LastURL"]);
?>