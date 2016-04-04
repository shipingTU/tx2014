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
<?php
    include '../connection.php';
	$requete = "SELECT count(id_Joueur) AS nbJoueurs FROM joueur";
	$result = $mysqlConn->query($requete);
	$row = $result->fetch_assoc();
	$nbJoueurs = $row["nbJoueurs"];
	$mysqlConn->close();
	//
	$mysqlConn = new mysqli($servername, $username, $password, $dbname);

	if ($mysqlConn->connect_error) {
		die("Connection failed: " . $mysqlConn->connect_error);
	}

	$requete = "SELECT count(id_Question) AS nbQuestions FROM question";
	$result = $mysqlConn->query($requete);
	$row = $result->fetch_assoc();
	$nbQuestions = $row["nbQuestions"];
	$mysqlConn->close();
	//
	$mysqlConn = new mysqli($servername, $username, $password, $dbname);

	if ($mysqlConn->connect_error) {
		die("Connection failed: " . $mysqlConn->connect_error);
	}

	$requete = "SELECT count(id_Questionnaire) AS nbQuestionniares FROM questionnaire";
	$result = $mysqlConn->query($requete);
	$row = $result->fetch_assoc();
	$nbQuestionniares = $row["nbQuestionniares"];
	$mysqlConn->close();
	?>
	
<html lang="fr">
<head>
    <meta charset="utf-8">
	<title>Menu Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/bootswatch.min.css">
	<link rel="stylesheet" href="../css/myStyle.css">
	<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>


	<style>
		.center
		{
			position:relative;
			top:100px;
			margin:auto;
			width:100%;

		}
		.error {color: #FF0000;}
		.reussie {color: red; 
				  font-style:italic;
				  font-weight: bold;
				 }
	</style>
</head>

<body>  
<div class="container">
<div class="jumbotron">
<div class="row">
			<span style = "float:right" class="text-danger pharag2">
				Bonjour Administrateur
				| <button id="aide" type="button" class="btn-warning" onclick="$('#help').modal('show');">Aide</button>		
				| <a href = "deconnexion_admin.php">déconnexion</a> 	
			</span>
          <div class="col-lg-12">
            <h1 style="color:FireBrick;text-align:center; position: relative; top:80px;">Menu Admin</h1>
		  </div>
			
          <div class="col-lg-4">
			  <div class="center" style="text-align:center;">
              <div class="alert alert-dismissable alert-danger">
                <strong style="color:text-align:center;">Nombre de joueurs:<br><?php echo $nbJoueurs; ?></strong>
              </div>
			  <a href="administration_joueur.php" class="btn btn-primary btn-lg" style="color:seashell;">Détails de joueurs</a>
			  </div>
          </div>
          <div class="col-lg-4">
              <div class="center" style="text-align:center;">
              <div class="alert alert-dismissable alert-success">
                <strong style="color:text-align:center;">Nombre de questions:<br><?php echo $nbQuestions; ?></strong>
              </div>
			  <a href="administration_questions.php" class="btn btn-primary btn-lg" style="color:seashell;">Détails de questions</a>
			  </div>
          </div>
		  <div class="col-lg-4">
              <div class="center" style="text-align:center;">
              <div class="alert alert-dismissable alert-info">
                <strong style="color:text-align:center;">Nombre de questionnaires:<br><?php echo $nbQuestionniares; ?></strong>
              </div>
			  <a href="statistiques.php" class="btn btn-primary btn-lg" style="color:seashell;">Statistiques</a>
			  </div>
          </div>
</div>		  
</div>
</div>	  
</body>
</html>