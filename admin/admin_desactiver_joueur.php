<?php
include '../connection.php';

$id_Joueur_des = isset($_POST['idJoueurDes']) ? htmlspecialchars($_POST['idJoueurDes']) : '';
$a_desactiver = isset($_POST['Adesactiver']) ? htmlspecialchars($_POST['Adesactiver']) : '';

$requete = "SET foreign_key_checks = 0";
$mysqlConn->query($requete);

if ($a_desactiver == 'Désactiver'){
	$requete = "update joueur set etat_joueur = '0' WHERE id_Joueur = '$id_Joueur_des'";
}else{
	$requete = "update joueur set etat_joueur = '1' WHERE id_Joueur = '$id_Joueur_des'";
}

if ($mysqlConn->query($requete) === TRUE) {
    echo "Déactivation réussie";
} else {
	echo "Echec de déactivation";
}
$requete = "SET foreign_key_checks = 1";
$mysqlConn->query($requete);
$mysqlConn->close();

?>