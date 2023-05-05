<?php
session_start();

if(isset($_GET['nick'])){
    $nick = $_GET['nick'];
    $_SESSION['nick'] = $nick;
}
if(isset($_GET['password'])){
    $password = $_GET['password'];
    $_SESSION['password'] = $password;
}
?>