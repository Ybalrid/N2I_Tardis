<?php require_once("theme/header.php"); ?>
<br/>
<div class="container" role="main">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form role="form" method="post" action="login.php">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="login" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <div class="form-group">
                <label for="mail">Mail</label>
                <input type="email" class="form-control" id="mail" placeholder="Mail">
            </div>
            <div class="form-group">
                <label for="sexe">Sexe</label>
                <input type="text" class="form-control" id="sexe" placeholder="Sexe">
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" placeholder="Ville">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" placeholder="Age">
            </div>
            <button type="submit" class="btn btn-default">S'enregistrer</button>
        </form>
    </div>
    <div class="col-md-4"></div> 
</div>
<?php require_once("theme/footer.php"); ?>