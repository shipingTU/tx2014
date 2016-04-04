<?php
include '../connection.php';
$defiJoueur = $_POST['defiJoueur'];

//prendre un questionnaire aleatoirement à defier
$requete = "SELECT JjQ_id_Questionnaire FROM joueur_joue_questionnaire jq 
			INNER JOIN questionnaire q ON jq.JjQ_id_Questionnaire=q.id_Questionnaire WHERE q.defi_Questionnaire=1 
			AND q.etat_Questionnaire=1 AND jq.JjQ_id_Joueur='$defiJoueur' ORDER BY RAND() limit 1";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();
$idQuest = $row["JjQ_id_Questionnaire"];

$mysqlConn->close();
echo $idQuest;
?>