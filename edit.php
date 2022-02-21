<?php
require_once __DIR__ . "/database.php";

if (!isset($_GET['id'])) {
  die("Error: Data tidak dimasukkan!");
}

$query = $db->prepare("SELECT * FROM products WHERE id = :id");
$query->bindParam(":id", $_GET['id']);
$query->execute();

if ($query->rowCount() == 0) {
  die("Error: Data tidak ditemukan!");
} else {
  $produk = $query->fetch();
}

if (isset($_POST['submit'])) {
  $name = htmlentities($_POST['name']);
  $price = htmlentities($_POST['price']);
  $quantity = htmlentities($_POST['quantity']);

  $query = $db->prepare("UPDATE products SET name = :name, price = :price, quantity = :quantity WHERE id = :id");
  $query->bindParam(":name", $name);
  $query->bindParam(":price", $price);
  $query->bindParam(":quantity", $quantity);
  $query->bindParam(":id", $_GET['id']);
  $query->execute();

  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <title>Edit Produk</title>
</head>

<body>
  <div class="container">
    <div style="height: 90vh;" class="row d-flex flex-direction-column align-items-center justify-content-center">
      <div class="col-md-4">
        <h3 class="text-center my-3">Edit Produk</h3>
        <form action="edit.php?id=<?= $_GET['id'] ?>" method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?= $produk['name'] ?>" />
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required value="<?= $produk['price'] ?>" />
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Stok</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $produk['quantity'] ?>" />
          </div>
          <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary my-3 mx-3 ps-2"><i class="bi bi-bookmark-plus"></i> Submit</button>
            <a href="index.php" class="btn btn-danger my-3 mx-3"><i class="bi bi-backspace-reverse"></i> Batal</a>
          </div>
        </form>
        <div class="text-center">
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>