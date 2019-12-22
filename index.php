<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <title>E-Library</title>
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <?php
    session_start();
    if( isset($_SESSION["login"]) ) :
    ?>
    <p class="navbar-brand"><?= $_SESSION["login"]["nama_user"]; ?></p>
    <?php else: ?>
    <a class="navbar-brand" href="index.php">E-Library</a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="listbuku.php">Buku</a>
        <a class="nav-item nav-link" href="pinjam.php">Peminjaman</a>
        <a class="nav-item nav-link" href="keranjang.php">Keranjang</a>
        <?php
          if( isset($_SESSION["login"]) ) :
        ?>
            <a class="nav-item btn btn-dark tombol" href="logout.php">logout</a>
        <?php else: ?>
            <a class="nav-item btn btn-dark tombol" href="login.php">login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
<!-- akhir navbar -->
  <div class="container-fluid">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10" style="margin-top:100px">
      <h4 class="text-center" style="margin-bottom:100px">Buku adalah jembatan ilmu - <span>Anonymous</span></h4>
    
      <form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="listbuku.php">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
          </div>
  </div>
  </div>
<div class="background"></div>
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
