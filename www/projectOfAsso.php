<?php require_once("theme/header.php"); 
if(isset($_REQ['asso']) AND $_REQ['asso'] != NULL){
	$projectForAsso = getProjForAsso($_REQ['asso']);
}
$projectForAsso = array(1,2,3,4); //Tests du foreach
?>
<div class="container" role="main">
        <h1>Projets de <?php if(isset($_REQ['asso']) AND $_REQ['asso'] != NULL) echo $_REQ['asso']; else echo "NULL"; ?></h1>
        <p>Listes des projets actuellement proposée par cette association.</p>
        <hr>
</div>
<div class="container" role="main">
	<!--Vérif s'il existe bien un projet asso. Si oui, on affiche la liste de tout les projets-->
	<?php $cmpt = 1; if(isset($projectForAsso)) foreach($projectForAsso AS $value){ ?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Project #<?php echo $cmpt; $cmpt++; ?> </strong></h3> <!--compteur s'incrémentant en auto-->
				</div>
				<div class="panel-body">
					<p class="text-center">
						<img src="http://lorempicsum.com/futurama/300/180/1" alt="..." class="img-rounded">
					</p>
					<p class="text-center"><a class="btn btn-primary" href="project.php">En savoir plus</a></p>
				</div>
			</div>
		</div>
	<!--Si il n'existe aucun projet, on en informe l'utilisateur-->
	<?php } else {?>
		<div>
			</p>Il n'existe actuellement aucune entrée de projet pour cette association...</p>
		</div>
	<?php } ?>
</div>
<?php require_once("theme/footer.php"); ?>

