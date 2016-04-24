<?php
include '../connection.php';
$i = 0;
$nivDif = $_POST['nivDif'];	
$requete = "SELECT id_Question FROM Question WHERE niv_dif_Question='$nivDif' ORDER BY RAND() limit 5";
$result = $mysqlConn->query($requete);
while($row = $result->fetch_assoc()) {
	$idQ[$i] = $row['id_Question'];
	$i++;
}
$mysqlConn->query($requete);
$mysqlConn->close();
echo json_encode($idQ);
?>