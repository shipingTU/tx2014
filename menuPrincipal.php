<?php
session_start();
if(!isset($_SESSION['joueur'])){
	header('location:login/login.php');
	die;
}
?>

<div id="help" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Helloworld !</p>
				<button id="fermer" type="button" class="btn-info" onclick="$('#help').modal('hide');">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Principal</title>
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootswatch.min.css">
		<link rel="stylesheet" href="css/myStyle.css">
		<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>	
    </head>
    <body>
        <h1 class="title1">Menu Principal</h1>
		<?php include 'login/deconnexion.php'; ?>
		<br>
		<br>
		<br>
		
		<image src="images/menu.jpg" class="col-lg-3 col-lg-offset-1" style="width:200px;height:150px"><br>
		
		<div class="btn-group-vertical col-lg-5 col-lg-offset-1">
			<dl class="dl-horizontal">
				<dt> <button id="boutonQue" type="button" style="width:160px" class="btn btn-lg btn-success" onclick="window.location.href='questionnaire.php'" value="Questionnaire">Questionnaire</button></dt>
				<dd> <h3 class="text-success pharag1">Répondre à un questionnaire.</h3></dd>
			</dl>
			<br>
			<dl class="dl-horizontal">
				<dt> <button id="boutonDef" type="button" style="width:160px" class="btn btn-lg btn-info" onclick="window.location.href='defiQuestionnaire/defi.php'" value="Défi">Défi</button></dt>
				<dd> <h3 class="text-info pharag1">Défier.</h3></dd>
			</dl>
		</div>	
    </body>
</html>
