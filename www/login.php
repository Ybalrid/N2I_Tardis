<?php

    $noUI = true;
    $loginError = false;

    require_once("header.php");

    if(isset($_SESSION['_loginToken']) && $_SESSION['_loginToken'] != 0 && $_REQUEST['_loginToken'] === $_SESSION['_loginToken'])    //Login request
    {
        require_once("../backend/DBInterface.php");

        $bdd = new DBInterface();
        if(!empty($_REQUEST['email']) && !empty($_REQUEST['pass']) && $bdd->isUserExist($_REQUEST['email']) && $bdd->isUserValid($_REQUEST['email'], $_REQUEST['pass']))
        {
            $_SESSION['_loginToken'] = 0;

            $_SESSION['login'] = htmlentities($_REQUEST['email'], ENT_HTML5);
            $_SESSION['loginRAW'] = $_REQUEST['email'];

            header('Location: /');
            die('YOU KILLED ME BY REFUSING THIS HEADER!');
        }
        else
            $loginError = true;
    }
    else
    {
        require_once("theme/header.php");
        $_SESSION['_loginToken'] = rand(1, 0xffffffff);
    }

?>
<div class="container" role="main">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php
            if($loginError)
                echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>Erreur !</strong> Mauvais login ou mauvais mot de passe !</div>";
        ?>
        <form role="form" method="post" action="login.php">
            <div class="form-group">
                <label for="email">Login</label>
                <input type="email" class="form-control" id="email" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" placeholder="Mot de passe">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Se souvenir de moi
                </label>
            </div>
            <input type="hidden" id="_loginToken" value="<?php echo $_SESSION['_loginToken'];?>">
            <button type="submit" class="btn btn-default">Se connecter</button>
        </form>
        <hr>
        <p class="lead">Pas de compte ? <a href="register.php">Enregistrez-vous</a></p>
    </div>
    <div class="col-md-4"></div>
</div>
<
<?php require_once("theme/footer.php"); ?>