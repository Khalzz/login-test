<?php
    // here i will set the configuration of teh database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'php-login';
    $conn = mysqli_connect($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>