<footer>

    <div class="contain-footer">

        <div class="links-footer">
            <h4>Plan du site</h4>
            <ul>
                <li>
                    <a href="/?page=home">Home</a>
                </li>
                <li>
                    <a href="/?page=contact">Contact</a>
                </li>
                <li>
                    <a href="/?page=article">Destinations</a>
                </li>
                <li>
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
        </div>
    
        <div class="contact-footer">
            <h4>Contact</h4>
            <p>
                8 chemin de la sablas
                <br>
                33170 Prignac et Marcamps
            </p>
            <p>handouceur.vacances@gmail.com</p>
            <p>06 26 52 98 21</p>
            <p>Lundi au Vendredi de 9h00 à 16h30</p>
        </div>

        <div class="picto-footer">
            <h4>Suivez nous</h4>
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="img/home/facebook-logo-svgrepo-com.svg" alt="facebook logo" class="picto-hero-section">
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <img src="img/home/instagram-logo-svgrepo-com.svg" alt="instagram logo" class="picto-hero-section">
            </a>
            <a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer">
                <img src="img/home/twitter-logo-shape-svgrepo-com.svg" alt="twitter logo" class="picto-hero-section">
            </a>
        </div>
    
        <!-- <p>&copy;Dumoumou</p> -->

    </div>

</footer>