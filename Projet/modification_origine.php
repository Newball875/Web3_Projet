<?php include "class/init.php";
if(!isset($_SESSION["nick"])){
    header("Location: index.php");
    exit();
}
if(isset($_GET["id"]) || !(Connexion::origineExiste($pdo,$_GET["id"]))){
    $id = $_GET["id"];
}else{
    header("Location: liste_origine.php");
    exit();
}
$origine=Connexion::prendreInfosOrigine($pdo,$id);

if($_FILES["image"]["error"]==0){
	Connexion::modifierOrigine($pdo, $id, $_POST['name'],$_POST["description"],$_FILES['image']['name']);
    $nom_dos=getcwd().DIRECTORY_SEPARATOR."ressources".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."origine".DIRECTORY_SEPARATOR;
    $nom_fic=$_FILES["image"]['name'];
    $nom_final=$nom_dos.$_FILES["image"]['name'];
    move_uploaded_file($_FILES['image']["tmp_name"],$nom_final);
}
else{
	echo "ECHO ECHO";
    Connexion::modifierOrigine($pdo, $id, $_POST['name'],$_POST["description"],$origine->image);
}

header("Location: liste_origines.php");
exit();