<?php
session_start();
session_unset();
session_destroy();

unset($_COOKIE["login"]);
unset($_COOKIE["password"]);
unset($_COOKIE["name"]);
unset($_COOKIE["password1"]);
unset($_COOKIE["password2"]);

header('Location: ' . $_COOKIE["LastURL"]);
?>