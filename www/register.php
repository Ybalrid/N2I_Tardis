<?php require_once("theme/header.php"); ?>
<br/>
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
            <div class="form-group">
                <label for="exampleInputPassword1">Mail</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mail">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Sexe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Sexe">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ville</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ville">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Age</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Age">
            </div>
            <button type="submit" class="btn btn-default">S'enregistrer</button>
        </form>
    </div>
    <div class="col-md-4"></div> 
</div>
<?php require_once("theme/footer.php"); ?>