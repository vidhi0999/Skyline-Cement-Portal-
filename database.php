<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "skyline_db";

$conn = new mysqli($servername, $user, $password, $dbname);
if (!$conn) {
    echo "Database connection error!";
}
?>