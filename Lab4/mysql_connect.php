<?php
    $servername = "localhost:3306";
    $username = "imnotroot";
    $password = "123Secured!@#";
    $dbname = "pmvcwgnz_lab4";

    $conn = new mysqli($servername, $username, $password);
    $sql_createdb = "CREATE DATABASE IF NOT EXISTS $dbname";
    $sql_createtb = "CREATE TABLE IF NOT EXISTS notes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100),
        content VARCHAR(200),
        priority VARCHAR(15)
        )";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $conn->query($sql_createdb);
    $conn->select_db($dbname);
    $conn->query($sql_createtb);

    return $conn;
?>
