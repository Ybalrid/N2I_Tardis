<?php
    $noUI = true;
    $loginError = false;

    require_once("header.php");

    if(isset($_SESSION['_registerToken']) && $_SESSION['_registerToken'] != 0 && $_REQUEST['_registerToken'] === $_SESSION['_registerToken'])    //Login request
    {
        require_once('backend/DBInterface.php');

        $bdd = new DBInterface();

        if(empty($_REQUEST['login']) || empty($_REQUEST['password']) || empty($_REQUEST['email']) || empty($_REQUEST['genre']) || empty($_REQUEST['ville']) || empty($_REQUEST['age']))
        {
            echo "ISSUE 1";
            $loginError = true;
        }
        else if($bdd->isUserExist($_REQUEST['login']) || $bdd->isMailAlreadyTaken($_REQUEST['email']))
        {
            echo "ISSUE 2";
            $loginError = true;
        }
        else
        {
            $bdd->addUser($_REQUEST['login'], $_REQUEST['password'], $_REQUEST['email'], $_REQUEST['age'], $_REQUEST['genre'], $_REQUEST['ville']);

            $_SESSION['_registerToken'] = 0;
            $_SESSION['login'] = htmlentities($_REQUEST['login'], ENT_HTML5);
            $_SESSION['loginRAW'] = $_REQUEST['email'];

            header('Location: /');
            die('YOU KILLED ME BY REFUSING THIS HEADER!');
        }
    }
    else
    {
        echo "GOT AWAY LOL" . (isset($_SESSION['_registerToken']) ? "1" : "0")  . " - " . ($_SESSION['_registerToken'] !== 0 ? "1" : "0") . " - " . ($_REQUEST['_registerToken'] === $_SESSION['_registerToken'] ? "1" : "0")  . " - " . $_REQUEST['_registerToken']  . " - " . $_SESSION['_registerToken'];
    }
    require_once("theme/header.php");
    $_SESSION['_registerToken'] = rand(1, 0xffffffff);
?>
<br/>
<div class="container" role="main">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form role="form" method="post" action="register.php">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="email">Mail</label>
                <input type="email" class="form-control" id="email" placeholder="Mail">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" placeholder="genre">
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" placeholder="Ville">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" placeholder="Age">
            </div>
            <input type="hidden" id="_registerToken" value="<?php echo $_SESSION['_registerToken'];?>">
            <button type="submit" class="btn btn-default">S'enregistrer</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<?php require_once("theme/footer.php"); ?>