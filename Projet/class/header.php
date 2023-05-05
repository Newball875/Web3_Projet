<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="nav-content">
            <a class="navbar-brand" >
                <div style="width: 0.5em"></div>
                <a href="accueil.php"><img src="./ressources/img/logoweb3.png" alt="" height="100" class="d-inline-block align-top"></a>
                <a class="navbar-brand" href="./recette.php">
                    Recette
                </a>
            </a>
            <div class="headerdroite2">
                <a class="navbar-brand">
                    <div id="barre-recherche">
                    <form id="recherche" method="POST" enctype="multipart/form-data" action="./page_recherche.php">
                        <input type="text" class="form-control" id="name-recherche" name="recherche" placeholder="Nom de la recette">
                        <div id="bouton-recherche">
                            <button type="submit" name="ok" class="envoyer">A</button>
                        </div>
                    </form>
                    </div>
                <a class="navbar-brand" href="./login.php">
                   Login
                </a>
                </a>
                <div style="flex: 1"></div>
            </div>
        </div>
    </nav>
</header>