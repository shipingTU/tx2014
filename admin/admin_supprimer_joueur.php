<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeu_on_purpose";

$id_Joueur_sup = isset($_POST['idJoueurSup']) ? htmlspecialchars($_POST['idJoueurSup']) : '';

$mysqlConn = new mysqli($servername, $username, $password, $dbname);

if ($mysqlConn->connect_error) {
    die("Connection failed: " . $mysqlConn1->connect_error);
} 

$requete = "SET foreign_key_checks = 0";
$mysqlConn->query($requete);

$requete = "DELETE FROM joueur WHERE id_Joueur='$id_Joueur_sup'";
if ($mysqlConn->query($requete) === TRUE) {
    echo "Suppression réussi";
} else {
    //echo "Error: " . $requete . "<br>" . $mysqlConn->error;
	echo "Echec de suppression";
}
$requete = "SET foreign_key_checks = 1";
$mysqlConn->query($requete);
$mysqlConn->close();

?>