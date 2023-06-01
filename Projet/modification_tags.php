<?php include "class/init.php";
if(!isset($_SESSION["nick"])){
    header("Location: index.php");
    exit();
}
if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    header("Location: liste_tags.php");
    exit();
}
if(!Connexion::tagExiste($pdo,$_GET["id"])) {
    header("Location: liste_tags.php");
    exit();
}
if(isset($_POST['name']) && isset($_GET['id'])){
    Connexion::modifierTag($pdo, $id, $_POST['name']);

}
header("Location: liste_tags.php");
exit();
?>