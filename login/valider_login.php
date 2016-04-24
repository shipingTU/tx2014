<?php
include '../connection.php';

$q=$_POST["q"];
$infos=array();
$infos=explode(",",$q);
$login_inscrit = $infos[0];
$password_inscrit = $infos[1];
$defi_inscrit = $infos[2];


$exist = false;
$message = "";

$requete = "select * from Joueur where login_joueur = '$login_inscrit' and MDP_joueur = '$password_inscrit'";

$result = $mysqlConn->query($requete);
if ($result->num_rows > 0) {
	   session_start();
	   while($row = $result->fetch_assoc()) {
			$_SESSION['joueur']=array('id_Joueur'=>$row["id_Joueur"], 
									'defi_joueur'=>$row["defi_joueur"],
									'nickname'=>$row["nickname"]
									);
       }	
	   
	   $message = "Accès avec succès";
	   $exist=true;

} else {
	session_start();
	session_destroy();
    $message = "Echec: Login ou Password n'existe pas";
}

if($exist === true){

	$requete = "update Joueur set defi_joueur = '$defi_inscrit' WHERE login_joueur = '$login_inscrit'";

	if ($mysqlConn->query($requete) === TRUE) {
		$_SESSION['defi']=$defi_inscrit;
	}
	$mysqlConn->close();
}
echo $message;
?>