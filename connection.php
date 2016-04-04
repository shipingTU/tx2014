<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeu_on_purpose";
$mysqlConn = new mysqli($servername, $username, $password, $dbname);

if ($mysqlConn->connect_error) {
    die("Connection failed: " . $mysqlConn->connect_error);
}
?>