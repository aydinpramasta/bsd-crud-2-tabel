<?php

$host = "localhost";
$port = 3306;
$dbname = "crud_2_tabel";
$username = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
  die("Connection error: " . $exception->getMessage());
}
