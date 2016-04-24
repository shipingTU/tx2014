<?php
	include '../connection.php';
	
	$nickname = $_REQUEST['nickname'];
	$requete = "SELECT * FROM Joueur WHERE nickname='$nickname'";
	$result = $mysqlConn->query($requete);
	$row = $result->fetch_assoc();
	echo $row['nickname'] ;
?>
