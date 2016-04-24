<?php
include '../connection.php';
$nivDif= $_POST['nivDif'];

//prendre un questionnaire aleatoirement
$requete = "SELECT id_Questionnaire FROM Questionnaire WHERE niv_dif_Questionnaire='$nivDif' AND etat_Questionnaire=1 ORDER BY RAND() limit 1";
$result = $mysqlConn->query($requete);
$row = $result->fetch_assoc();

$idQuest = $row["id_Questionnaire"];

$mysqlConn->close();
echo $idQuest;
?>