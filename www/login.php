<?php

    $noUI = true;
    $loginError = flase;

    require_once("header.php");

    if(isset($_SESSION['_loginToken']) && $_SESSION['_loginToken'] != 0 && $_REQUEST['_loginToken'] === $_SESSION['_loginToken'])    //Login request
    {
        if(rand() % 2)
        {
            $_SESSION['_loginToken'] = 0;
            header('Location: /');
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
        <form role="form" method="post" action="login.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Se souvenir de moi
                </label>
            </div>
            <input type="hidden" id="_loginToken" value="<?php echo $_SESSION['_loginToken'];?>">
            <button type="submit" class="btn btn-default">Se connecter</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<?php require_once("theme/footer.php"); ?>