<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="nav-content">
            <div class="gauche" >
                <div style="width: 0.5em"></div>
                <div class="logo">
                    <a href="accueil.php"><img src="./ressources/img/logoweb3.png" alt="" height="100" class="d-inline-block align-top"></a>
                </div>
                <div class="recette">
                    <a class="navbar-brand" href="./recette.php">
                        Recette
                    </a>
                </div>
            </div>
            <div class="droite">
                <div class="recherche">
                    <a class="navbar-brand" href="./page_recherche.php">
                        Recherche
                    </a>
                </div>
                <div class="login">
                <?php $log="Login";
                if(isset($_SESSION["nick"])){
                    $log="Admin";
                }
                echo '<a class="navbar-brand" href="./login.php">'.$log.'</a>'; ?>
                </div>
                <div style="flex: 1"></div>
            </div>
        </div>
    </nav>
</header>