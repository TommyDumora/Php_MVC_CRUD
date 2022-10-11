<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>HanDouceur - <?php echo $_GET["page"] ?> </title>
</head>

<body>

    <?php include_once dirname(__DIR__) . "/template/template_part/__navbar.php"; ?>

    <main>
        
        <section class="hero-section">
            
            <img src="img/home/img-hero-section.jpg" alt="Photo de montagne et d'un lac" class="background-hero-section">

            <div class="container-hero-section">
                <h1>HanDouceur</h1>
                <p>
                    Le monde est un livre, et ceux qui ne voyagent pas ne lisent qu'une seule page.
                    <br>
                    Venez voyager en douceur !
                </p>
                <div class="contain-picto-hero-section">
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
            </div>

        </section>

        <div class="container">
            <?php getRouteFromUrl() ?>
        </div>

    </main>

    <?php include_once dirname(__DIR__) . "/template/template_part/__footer.php"; ?>

    <script src="js/app.js"></script>
    
</body>

</html>