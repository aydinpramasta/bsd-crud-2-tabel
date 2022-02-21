<?php
require_once __DIR__ . "/database.php";

$query = $db->prepare("SELECT wishlists.id, products.name, products.price, products.quantity FROM wishlists LEFT JOIN products ON (products.id = wishlists.product_id);");
$query->execute();
$wishlists = $query->fetchAll();
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

  <title>Daftar Wishlist</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h1 class="mt-5">Daftar Wishlist</h1>
        <div class="text-start d-flex my-4 justify-content-between">
          <a href="index.php" class="btn btn-warning"><i class="bi bi-arrow-left-circle me-1"></i> Kembali</a>
        </div>
        <table class="table table-light table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($wishlists as $wishlist) { ?>
              <tr>
                <th scope="row">
                  <?= $no ?>
                </th>
                <td>
                  <?= $wishlist['name'] ?>
                </td>
                <td>
                  <?= number_format($wishlist['price'], 0, ",", ".") ?>
                </td>
                <td>
                  <?= $wishlist['quantity'] ?>
                </td>
                <td>
                  <a href="wishlist.delete.php?id=<?= $wishlist['id'] ?>" class="btn btn-danger px-2 py-1" onclick="return confirm('Yakin ingin menghapus data?');"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <?php $no++ ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>