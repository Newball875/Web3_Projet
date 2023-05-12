<?php include "class/init.php";
if(isset($_POST["nick"]) and isset($_POST["password"])){
	if($_POST["nick"]=="recette" and $_POST["password"]=="1234"){
		$_SESSION["nick"]=$_POST["nick"];
		header("Location: login.php");
		exit;
	}elseif ($_POST["nick"]!="recette") {
		header("Location: login.php?nick=0");
		exit;
	}else if($_POST["nick"]!="1234"){
		header("Location: login.php?pwd=0");
		exit;
	}
}else{
	unset($_SESSION["nick"]);
	session_destroy();
	header("Location: login.php");
	exit;
}
?>