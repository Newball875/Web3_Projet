<?php include "class/init.php";?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Culture</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/stylelogin.css">
    <script src="javascript/login.js"></script>

</head>
<body>

<?php include "class/header.php";
$login=0;
$message="";
if(isset($_SESSION["nick"]) and $_SESSION["nick"]=="recette"){
    $login=2;
}else{
    if(isset($_POST["nick"])){
        if($_POST["nick"]=="recette"){
            if(isset($_POST["password"])){
                if($_POST["password"]=="1234"){
                    $login=1;
                }else{
                    $message="Mot de passe incorrect !";
                }
            }
        }else{
            $message="Pseudo incorrect !";
        }
    }
}
if($login==0){?>
<form id="login-form" action="login.php" method="post">
    <h1 style="text-align: center">Login</h1>
    <div id="content">
        <div id="inputs">
            <div class="form-group">
                <label for="nick">Pseudo</label>
                <input type="text" class="form-control" name="nick" id="nick" value="recette">
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" class="form-control" name="password" id="password" value="1234">
            </div>
        </div>
        <p id="message-erreur"><?=$message?></p>
    </div>
    <div id="buttons">
        <button type="submit" class="envoyer">Envoyer</button>
        <div style="width: 1em"></div>
    </div>
</form>
<?php
}else{
    echo "HELLO";
    if($login==1){
        $_SESSION["nick"]=$_POST["nick"];
    }?>
    <button id="logout" onclick="window.location.href= 'unlog.php'">LOG OUT</button>
    <?php
}
?>



<?php include "class/footer.php" ?>

</body>
</html>
