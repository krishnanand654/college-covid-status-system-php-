<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "ALTER TABLE student AUTO_INCREMENT=1";
$conn->query($sql);
?>