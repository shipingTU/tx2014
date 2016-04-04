<?php
session_start();
if(!isset($_SESSION['joueur'])){
	header('../login/login.php');
	die;
}
?>