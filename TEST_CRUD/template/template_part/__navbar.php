<header class="header">

    <div class="header-container">

        <div class="logo">
            <a href="/?page=home">
                <img src="img/home/logo-voyage.png" alt="logo">
            </a>
        </div>
    
        <nav class="navbar" role="navigation">
            <ul class="navbar-links">

                <li class="first">
                    <a href="/?page=home">Home</a>
                </li>
    
                <li class="second">
                    <a href="/?page=contact">Contact</a>
                </li>
    
                <li class="third">
                    <a href="/?page=article">Destinations</a>
                </li>
    
                <li class="four">
                    <?php if (
                        isset($_SESSION["user_is_connected"])
                        && $_SESSION["user_is_connected"]
                    ) { ?>
                        <a href="/?page=user_disconnect">Déconnexion</a>
                    <?php }else { ?>
                        <a href="/?page=user_connexion">Connexion</a>
                    <?php } ?>
                </li>

            </ul>

            <button class="burger">
                <span class="bar"></span>
            </button>

        </nav>

    </div>


</header>