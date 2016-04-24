<?php
include '../connection.php';

if ($_REQUEST == null){
	require_once('inscription.php');
}else{
	$nom = $_REQUEST['nom'];
	$prenom = $_REQUEST['prenom'];
	$nickname = $_REQUEST['nickname'];
	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];

	$requete = "insert into Joueur (`login_joueur`, `MDP_joueur`, `defi_joueur`, `nom_Joueur`, `prenom_Joueur`, `nickname`, `etat_joueur`) VALUES ('$login', '$password', '0', '$nom', '$prenom', '$nickname', '0');";

	$result = $mysqlConn->query($requete);

	if ($result){
		require_once('../login/login.php');
		echo'<script type="text/javascript">alert("Inscription OK");</script>';
		//header('Location: ../login/login.php');
	}else{
		require_once('inscription.php');
		echo'<script type="text/javascript">alert("Erreur d\'inscription");</script>';
	}
	$mysqlConn->close();
}


?>