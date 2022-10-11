<form action="" method="post">

    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="connexion">

</form>


<?php if (isset($params["error"]) && !empty($params)) {

    if (!$params["error"]) {
        echo "Erreur: l'utilisateur ou le mot de passe ne sont pas valide.";
    }

    if ($params["error"]) {
        echo "Vous êtes connecté.";
    }

}