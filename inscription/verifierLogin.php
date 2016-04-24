<?php
	include '../connection.php';
	
	$login = $_REQUEST['login'];
	$requete = "SELECT * FROM Joueur WHERE login_joueur='$login'";
	$result = $mysqlConn->query($requete);
	$row = $result->fetch_assoc();
	echo $row['login_joueur'] ;
?>
