<?php include "class/init.php";
unset($_SESSION["nick"]);
session_destroy();
var_dump($_SESSION);
header("Location: login.php");
exit;
?>