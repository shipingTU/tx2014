<?php
$servername = "localhost";
$username = "tx2014";
$password = "tx2014";
$dbname = "jeu_on_purpose";
$mysqlConn = new mysqli($servername, $username, $password, $dbname);

if ($mysqlConn->connect_error) {
    die("Connection failed: " . $mysqlConn->connect_error);
}
?>