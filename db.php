<?php
$host='localhost';
$user='root';
$pass='123456';
$db='mydb';
$connect = new mysqli($host, $user, $pass, $db);
if ($connect->connect_error) {
    die('Помилка : ('. $connect->connect_errno .') '. $connect->connect_error);
}
?>