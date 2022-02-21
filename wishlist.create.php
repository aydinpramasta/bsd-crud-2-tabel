<?php
require_once __DIR__ . "/database.php";

if (isset($_GET['id'])) {
  $id = htmlentities($_GET['id']);

  $query = $db->prepare("INSERT INTO wishlists (product_id) VALUES (:id);");
  $query->bindParam(":id", $id);
  $query->execute();

  header("Location: index.php");
} else {
  echo "Wishlist already created." . PHP_EOL;
}
