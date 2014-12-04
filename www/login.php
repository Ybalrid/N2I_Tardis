<?php require_once("header.php"); ?>
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
            <button type="submit" class="btn btn-default">Se connecter</button>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<?php require_once("theme/footer.php"); ?>