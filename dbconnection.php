<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "ALTER TABLE student AUTO_INCREMENT=1";
    $conn->query($sql);
?>