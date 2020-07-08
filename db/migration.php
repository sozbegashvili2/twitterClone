<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$servername",$username,$password);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS twitterClone";
    $conn->exec($sql);
    $conn->query("USE twitterClone");
    $sql = "
    CREATE TABLE IF NOT EXISTS users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullName NVARCHAR(50) NOT NULL,
    userName VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(200) NOT NULL,
    country VARCHAR(30) not null,
    gender varchar(10) not null,
    bday date NOT NULL,
    user_image VARCHAR(2048) NOT NULL,
    user_cover VARCHAR(2048) NOT NULL,
    hash VARCHAR (200) NOT NULL,
    verified int not null,
    token VARCHAR (300) NOT NULL,
    user_reg  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
    ";
    $conn->exec($sql);
} catch (PDOException $e) {
    echo $e->getMessage().'<br>';
}
