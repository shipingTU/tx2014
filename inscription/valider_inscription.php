<?php
include '../connection.php';

$q=$_POST["q"];
$infos=array();
$infos=explode(",",$q);
$nom_inscrit = $infos[0];
$prenom_inscrit = $infos[1];
$nickname_inscrit = $infos[2];
$login_inscrit = $infos[3];
$password_inscrit = $infos[4];

$exist_nick = false;
$exist_login = false;
//tester d'abord nickname pour voir s'il existait ou pas

$requete = "select nickname from joueur where nickname = '$nickname_inscrit'";

$result = $mysqlConn->query($requete);
if ($result->num_rows > 0) {

	   echo "Echec: Le nickname a déjà été utilisé";
	   $exist_nick=true;

} else {
}

if($exist_nick == false){

$requete = "select login_joueur from joueur where login_joueur = '$login_inscrit'";

$result = $mysqlConn->query($requete);
if ($result->num_rows > 0) {

	   echo "Echec: Le login a déjà été enregistré";
	   $exist_login=true;

} else {
}

if(($exist_nick==false)&&($exist_login==false)){
$requete = "insert into joueur(login_joueur, MDP_joueur, nom_Joueur, prenom_Joueur, nickname,etat_joueur) values('$login_inscrit','$password_inscrit','$nom_inscrit','$prenom_inscrit','$nickname_inscrit','1')";

if ($mysqlConn->query($requete) === TRUE) {
    echo "L'inscription réussie...back to the page log-in in";
} else {
	echo "Echec de l'inscription";
}

$mysqlConn->close();
}
}
?>