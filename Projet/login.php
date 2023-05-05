<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inferface Login</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/stylelogin.css">
    <script src="javascript/login.js"></script>

</head>
<body>

<?php include "class/header.html" ?>

<form id="login-form"
      action="http://www.web.gregory-bourguin.fr/teaching/php/requests/ajax/00_test_REQ.php"
      target="_blank"
      method="post"
>

    <h1 style="text-align: center">Menu Login</h1>

    <div id="content">

        <div id="inputs">

            <div class="form-group">
                <label for="nick">Nickname</label>
                <input type="text" class="form-control" name="nick" id="nick" value="didier">
            </div>

            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="text" class="form-control" name="password" id="password" value="1234">
            </div>

        </div>

        <div id="preview">
            <div id="preview-header">
                <div id="preview-nick"></div>
            </div>

            <div id="preview-password">
                <div id="preview-MDP"></div> &nbsp;
            </div>
        </div>

    </div>

    <div id="buttons">
        <button type="submit" class="envoyer">Envoyer</button>
        <div style="width: 1em"></div>
    </div>

</form>

<div id="message" class="hidden error"></div>

<div id="server-msg" style="margin-top: 20px"></div>

<script src="javascript/login.js"></script>

<?php include "class/footer.php" ?>

</body>
</html>
