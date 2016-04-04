<?php
include '../connection.php';

$idResultat = $_POST['idr'];
$score = $_POST['scr'];
$scoreM = $_POST['scrm'];
$r1 = $_POST['r1'];
$r2 = $_POST['r2'];
$r3 = $_POST['r3'];
$r4 = $_POST['r4'];
$r5 = $_POST['r5'];

$rMin1 = $_POST['rmin1'];
$rMin2 = $_POST['rmin2'];
$rMin3 = $_POST['rmin3'];
$rMin4 = $_POST['rmin4'];
$rMin5 = $_POST['rmin5'];

$rMax1 = $_POST['rmax1'];
$rMax2 = $_POST['rmax2'];
$rMax3 = $_POST['rmax3'];
$rMax4 = $_POST['rmax4'];
$rMax5 = $_POST['rmax5'];

//convertir des valeurs au type integer
$idResultat = intval($idResultat);
$scoreM = intval($scoreM);
array_map(intval,$score);
array_map(intval,$r1);
array_map(intval,$r2);
array_map(intval,$r3);
array_map(intval,$r4);
array_map(intval,$r5);
array_map(intval,$rMin1);
array_map(intval,$rMin2);
array_map(intval,$rMin3);
array_map(intval,$rMin4);
array_map(intval,$rMin5);
array_map(intval,$rMax1);
array_map(intval,$rMax2);
array_map(intval,$rMax3);
array_map(intval,$rMax4);
array_map(intval,$rMax5);

//inserer des relultats
$requete = "UPDATE joueur_joue_questionnaire SET score1 = '$score[0]', score2 = '$score[1]', score3 = '$score[2]', score4 = '$score[3]', score5 = '$score[4]', score_moy = '$scoreM' WHERE id_JjQ='$idResultat'";
$mysqlConn->query($requete);

//inserer la premiere reponse
$requete1 = "INSERT INTO reponse(lambda2,lambda3,borne_inf_I1,borne_max_I1,borne_inf_I2,borne_max_I2,
borne_inf_I3,borne_max_I3) VALUES ('$r1[1]','$r1[2]','$rMin1[0]','$rMax1[0]','$rMin1[1]','$rMax1[1]','$rMin1[2]','$rMax1[2]')";
$mysqlConn->query($requete1);

//recuperer le premier id de la reponse1
$requete = "SELECT id_Reponse FROM reponse WHERE id_Reponse = (SELECT MAX(id_Reponse) FROM reponse)";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();
$debut = $row["id_Reponse"];

//inserer des autres reponses
$requete2 = "INSERT INTO reponse(lambda2,lambda3,borne_inf_I1,borne_max_I1,borne_inf_I2,borne_max_I2,
borne_inf_I3,borne_max_I3) VALUES ('$r2[1]','$r2[2]','$rMin2[0]','$rMax2[0]','$rMin2[1]','$rMax2[1]','$rMin2[2]','$rMax2[2]')";
$mysqlConn->query($requete2);
$requete3 = "INSERT INTO reponse(lambda2,lambda3,borne_inf_I1,borne_max_I1,borne_inf_I2,borne_max_I2,
borne_inf_I3,borne_max_I3) VALUES ('$r3[1]','$r3[2]','$rMin3[0]','$rMax3[0]','$rMin3[1]','$rMax3[1]','$rMin3[2]','$rMax3[2]')";
$mysqlConn->query($requete3);
$requete4 = "INSERT INTO reponse(lambda2,lambda3,borne_inf_I1,borne_max_I1,borne_inf_I2,borne_max_I2,
borne_inf_I3,borne_max_I3) VALUES ('$r4[1]','$r4[2]','$rMin4[0]','$rMax4[0]','$rMin4[1]','$rMax4[1]','$rMin4[2]','$rMax4[2]')";
$mysqlConn->query($requete4);
$requete5 = "INSERT INTO reponse(lambda2,lambda3,borne_inf_I1,borne_max_I1,borne_inf_I2,borne_max_I2,
borne_inf_I3,borne_max_I3) VALUES ('$r5[1]','$r5[2]','$rMin5[0]','$rMax5[0]','$rMin5[1]','$rMax5[1]','$rMin5[2]','$rMax5[2]')";
$mysqlConn->query($requete5);

//lier reponse id avec le questionnaire
$requete1 = "INSERT INTO jjq_has_reponse(JjQ_has_reponse_id_JjQ,JjQ_has_reponse_id_Reponse) VALUES ('$idResultat','$debut')";
$mysqlConn->query($requete1);
$debut = $debut +1;
$requete2 = "INSERT INTO jjq_has_reponse(JjQ_has_reponse_id_JjQ,JjQ_has_reponse_id_Reponse) VALUES ('$idResultat','$debut')";
$mysqlConn->query($requete2);
$debut = $debut +1;
$requete3 = "INSERT INTO jjq_has_reponse(JjQ_has_reponse_id_JjQ,JjQ_has_reponse_id_Reponse) VALUES ('$idResultat','$debut')";
$mysqlConn->query($requete3);
$debut = $debut +1;
$requete4 = "INSERT INTO jjq_has_reponse(JjQ_has_reponse_id_JjQ,JjQ_has_reponse_id_Reponse) VALUES ('$idResultat','$debut')";
$mysqlConn->query($requete4);
$debut = $debut +1;
$requete5 = "INSERT INTO jjq_has_reponse(JjQ_has_reponse_id_JjQ,JjQ_has_reponse_id_Reponse) VALUES ('$idResultat','$debut')";
$mysqlConn->query($requete5);

$mysqlConn->close();
?>