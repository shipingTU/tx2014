<?php
include '../connection.php';
require '../login/verif_connexion.php';
$date = new DateTime('now');
$date->setTimezone(new DateTimeZone('Europe/Paris'));
$formatted_date = date_format($date, 'Y-m-d H:i:s');
$player = $_SESSION['joueur']['id_Joueur'];
$idQuest = $_POST['idQuesionnaire'];

//enregistrer le jeu dans la BBD
$requete1 = "INSERT INTO Joueur_joue_Questionnaire( JjQ_id_Joueur, JjQ_id_Questionnaire, JjQ_date) 
			VALUES ('$player', '$idQuest', '$formatted_date');";
$mysqlConn->query($requete1);

//recuperer le id de ce jeu
$requete2 = "SELECT id_JjQ FROM Joueur_joue_Questionnaire WHERE JjQ_date = '$formatted_date';";
$result = $mysqlConn->query($requete2);
$row = $result->fetch_assoc();
$idResultat = $row['id_JjQ'];

$mysqlConn->close();
echo $idResultat;
?>