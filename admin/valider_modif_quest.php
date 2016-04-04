<?php
//header('Content-type: text/html; charset=utf-8');
include '../connection.php';

$q=$_POST["q"];
$infos=array();
$infos=explode(",",$q);
$id_question = $infos[0];
$niv_dif = $infos[1];
$type = $infos[2];
$borne_inf = $infos[3];
$borne_sup = $infos[4];
$text = utf8_decode($infos[5]);
$valexacte = $infos[6];
$contenu = $infos[7];
$mod_charge = $infos[8];


$requete = "update question set niv_dif_Question = '$niv_dif', mode_Question = '$type', borne_inf_Question = '$borne_inf',
			borne_max_Question = '$borne_sup', descrip_Question = '$text', val_exact_Question = '$valexacte',
			Contenu = '$contenu', mode_Chargement = '$mod_charge' WHERE id_Question = '$id_question'";


if ($mysqlConn->query($requete) === TRUE) {
    echo "La modification réussie";
} else {
	echo "Echec de la modification";
}

$mysqlConn->close();


?>