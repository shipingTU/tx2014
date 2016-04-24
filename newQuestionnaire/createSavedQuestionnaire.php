<?php
require '../login/verif_connexion.php';
include '../connection.php';
$nivDif = $_POST['nivDif'];	
$defiable = $_POST['defiable'];
$idQ = $_POST['idQ'];

//creation d'un questionnaire
$requete = "INSERT INTO Questionnaire(niv_dif_Questionnaire,defi_Questionnaire,etat_Questionnaire) VALUES ('$nivDif','$defiable',1)";
$mysqlConn->query($requete);

//recuperer le id du questionnaire
$requete = "SELECT id_Questionnaire FROM Questionnaire WHERE id_Questionnaire=(SELECT MAX(id_Questionnaire) FROM Questionnaire)";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();
$idQuest = $row["id_Questionnaire"];

//mettre des questions dans le questionnaire
$requete1 = "INSERT INTO Questionnaire_has_Question(QRhQ_id_Questionnaire, QRhQ_id_Question) VALUES ('$idQuest','$idQ[0]')";
$mysqlConn->query($requete1);
$requete2 = "INSERT INTO Questionnaire_has_Question(QRhQ_id_Questionnaire, QRhQ_id_Question) VALUES ('$idQuest','$idQ[1]')";
$mysqlConn->query($requete2);
$requete3 = "INSERT INTO Questionnaire_has_Question(QRhQ_id_Questionnaire, QRhQ_id_Question) VALUES ('$idQuest','$idQ[2]')";
$mysqlConn->query($requete3);
$requete4 = "INSERT INTO Questionnaire_has_Question(QRhQ_id_Questionnaire, QRhQ_id_Question) VALUES ('$idQuest','$idQ[3]')";
$mysqlConn->query($requete4);
$requete5 = "INSERT INTO Questionnaire_has_Question(QRhQ_id_Questionnaire, QRhQ_id_Question) VALUES ('$idQuest','$idQ[4]')";
$mysqlConn->query($requete5);

$date = new DateTime('now');
$date->setTimezone(new DateTimeZone('Europe/Paris'));
$formatted_date = date_format($date, 'Y-m-d H:i:s');
$player = $_SESSION['joueur']['id_Joueur'];
//remplir le tableau joueur_joue_questionnaire
$requete1 = "INSERT INTO Joueur_joue_Questionnaire( JjQ_id_Joueur, JjQ_id_Questionnaire, JjQ_date) 
			VALUES ('$player', '$idQuest', '$formatted_date')";
$mysqlConn->query($requete1);

//recuperer id du tableau joueur_joue_questionnaire
$requete2 = "SELECT id_JjQ FROM Joueur_joue_Questionnaire WHERE JjQ_date = '$formatted_date'";
$result = $mysqlConn->query($requete2);
$row = $result->fetch_assoc();
$idResultat = $row['id_JjQ'];

echo $idResultat;
?>