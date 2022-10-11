<form action="" method="post">

    <label for="lastname">Nom</label>
    <input type="text" id="lastname" name="lastname">

    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname">

    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="username">

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password">

    <input type="submit" value="créer">

</form>

<?php

if(isset($params["error"]) && !empty($params)) {

    if (!$params["error"]) {

        echo $params["message"];

    }

    if ($params["error"]) {

        echo $params["message"];

    }

}

?>