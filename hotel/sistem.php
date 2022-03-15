<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "otel";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
ob_end_flush();
?>
