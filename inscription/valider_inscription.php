<?php
include '../connection.php';

if ($_REQUEST == null){
	header('Location:inscription.php');
}else{
	$nom = $_REQUEST['nom'];
	$prenom = $_REQUEST['prenom'];
	$nickname = $_REQUEST['nickname'];
	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];

	$requete = "insert into Joueur (`login_joueur`, `MDP_joueur`, `defi_joueur`, `nom_Joueur`, `prenom_Joueur`, `nickname`, `etat_joueur`) VALUES ('$login', '$password', '0', '$nom', '$prenom', '$nickname', '0');";

	$result = $mysqlConn->query($requete);
	$mysqlConn->close();
	
	if ($result){
		header('Location: ../login/login.php');
	}else{
		header('Location:inscription.php');
	}
}


?>
