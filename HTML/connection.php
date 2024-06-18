<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "SITA";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>