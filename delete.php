<?php
require_once __DIR__ . "/database.php";

if (isset($_GET['id'])) {
  $query = $db->prepare("DELETE FROM products WHERE id = :id");
  $query->bindParam(":id", $_GET['id']);
  $query->execute();

  header("Location: index.php");
}
