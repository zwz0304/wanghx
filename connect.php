<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// connect.php —— 与 MySQL 建立连接
$servername = "localhost";
$username   = "root";
$password   = "zzzz";
$dbname     = "bit102_project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败：" . $conn->connect_error);
}
?>
