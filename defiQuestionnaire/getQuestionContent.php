<?php
header('Content-type: text/html; charset=iso-8859-1');
include '../connection.php';
$idQ = $_POST['idQ'];
$requete = "SELECT mode_Question,borne_inf_Question,borne_max_Question,descrip_Question,val_exact_Question,Contenu,mode_Chargement FROM Question WHERE id_Question='$idQ'";
$result = $mysqlConn->query($requete);
while($row = $result->fetch_assoc()) {
		$result_row=array_map("utf8_encode", $row);
      }
echo json_encode($result_row);
?>