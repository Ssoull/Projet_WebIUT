<?php

setcookie("login", $_POST["login"]);
setcookie("pwd", $_POST["password"]);

header('Location: SessionStart.php');

?>