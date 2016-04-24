<?php
include '../connection.php';
$idQuest = $_POST['idQuestionnaire'];	
//recuperer des id des questions dans ce questionnaire
$requete = "SELECT QRhQ_id_Question FROM Questionnaire_has_Question WHERE QRhQ_id_Questionnaire='$idQuest'";
$result = $mysqlConn->query($requete);
$i = 0;
while($row = $result->fetch_assoc()) {
	$idQ[$i] = $row['QRhQ_id_Question'];
	$i++;
}
$mysqlConn->close();
echo json_encode($idQ);
?>