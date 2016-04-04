<?php
require '../login/verif_connexion.php';
include '../connection.php';
$player = $_SESSION['joueur']['id_Joueur'];;
$i = 0;

//recuperer les joueurs qui peuvent etre defiés, de plus, il ont répondu des questionnaires
$requete = "SELECT id_Joueur,nickname FROM joueur WHERE defi_joueur=1 AND id_Joueur != '$player' 
			AND id_Joueur IN (SELECT DISTINCT JjQ_id_Joueur FROM joueur_joue_questionnaire jjQ INNER JOIN questionnaire q 
			ON jjQ.JjQ_id_Questionnaire = q.id_Questionnaire WHERE q.defi_Questionnaire=1 AND q.etat_Questionnaire=1)";
$result = $mysqlConn->query($requete);
while($row = $result->fetch_assoc()) {
	$id_joueur[$i] = $row['id_Joueur'];
	$joueurs[$i] = $row['nickname'];
	$i++;
}

$mysqlConn->close();
?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Defi</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/bootswatch.min.css">
		<link rel="stylesheet" href="../css/myStyle.css">
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

		<script>
		$(document).ready(function(){

			$("#b2").click(function() {	
				var defiRadio = $('input[name=user]');
				var idUser = defiRadio.filter(':checked').val();

				if ( jQuery.type(idUser) === "string") {
					$("#formUser").submit();
				} else {
					alert("You don't choose the player to challenge !");
				}
			});
		
		});
		</script>
    </head>

	<body>
        <h1 class="title2">Défi</h1>
		<br><br>
		
		<div class="container">
			<form id="formUser" action="defiQuestionnaire.php" method="GET">
				<table class="table table-bordered">
				  <caption class="pharag3">Liste de joeurs défiables</caption>
				  <thead>
					<tr>
					  <th style="text-align:center" width=100>Joueurs défiables</th>
					  <th style="text-align:center" width=100>Défier</th>
					</tr>
				  </thead>
<?php
	if ( isset($id_joueur) ){
		for($i = 0; $i < sizeof($id_joueur);$i++)
		{
			echo "<tbody>" ;
			echo "<tr class='danger'>" ;
			echo "<td align='center'>".$joueurs[$i]."</td>";
			echo "<td align='center'><input type='radio' name='user' value='".$id_joueur[$i]."'>";
			echo "</tr>";
			echo "</tbody>";
		}
	}
?>
				</table>
			</form>
		</div>
		<br><br><br> 
		
		<button id="b1" type="button" style="width:140px" onclick="window.location.href='../menuPrincipal.php'" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-3" >Back</button>
		<button id="b2" type="button" style="width:140px" class="btn btn-lg btn-primary col-lg-2 col-lg-offset-3">Next</button>
	</body>
</html>