<?php
include '../connection.php';
$q=$_POST["q"];
$infos=array();
$infos=explode(",",$q);
$niv_dif = $infos[0];
$type = $infos[1];
$borne_inf = $infos[2];
$borne_sup  = $infos[3];
$text = utf8_decode($infos[4]);
$valexacte = $infos[5];
$contenu = $infos[6];
$mod_charge = $infos[7];


$requete = "insert into question(niv_dif_Question, mode_Question, borne_inf_Question, borne_max_Question, descrip_Question, val_exact_Question, Contenu, mode_Chargement) values('$niv_dif','$type','$borne_inf','$borne_sup','$text','$valexacte','$contenu','$mod_charge')";

if ($mysqlConn->query($requete) === TRUE) {
    echo "L'ajout réussi";
} else {
	echo "Echec de l'ajout d'une question";
}

$mysqlConn->close();


?>