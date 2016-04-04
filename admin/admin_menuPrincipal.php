<?php
// require 'login/verif_connexion.php';
include '../connection.php';

//recuperer nb de joueurs en total
$requete = "SELECT count(id_Joueur) AS nbJoueurs FROM joueur";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();
$nbJoueurs = $row["nbJoueurs"];

//recuperer nb de questions en total
$requete = "SELECT count(id_Question) AS nbQuestions FROM question";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();
$nbQuestions = $row["nbQuestions"];

//recuperer nb de questionniares en total
$requete = "SELECT count(id_Questionnaire) AS nbQuestionniares FROM questionnaire";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();
$nbQuestionniares = $row["nbQuestionniares"];

$mysqlConn->close();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administration</title>
        <link rel="stylesheet" href="/css/bootstrap.css">
		<link rel="stylesheet" href="/css/bootswatch.min.css">
		<link rel="stylesheet" href="/css/myStyle.css">
    </head>
    <body>
        <h1 class="title1">Administration</h1>
		<?php //include 'login/deconnexion.php'; ?>
		
		<image src="/images/admin.png" class="col-lg-3 col-lg-offset-1" style="width:200px;height:150px"><br>
		<br><br>
		
		<ul class="nav nav-pills">
		  <li class="active col-lg-2 col-lg-offset-1"><a href="">Joueurs en total: <span class="badge"><?php echo $nbJoueurs;?></span></a></li>
		  <li class="active col-lg-2"><a href="">Questions en total : <span class="badge"><?php echo $nbQuestions;?></span></a></li>
		  <li class="active col-lg-3"><a href="">Questionniares en total : <span class="badge"><?php echo $nbQuestionniares;?></span></a></li>
		</ul>	
    </body>
</html>
