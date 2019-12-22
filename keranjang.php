<?php
include 'db/config.php';
session_start();
if( empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']) ){
    echo "
        <script>
            alert('Silahkan Pilih Buku Terlebih Dahulu');
            location='listbuku.php';
        </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/listbuku.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Daftar Pinjam Buku</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">  
            <?php
                if( isset($_SESSION["login"]) ):
            ?>
                <span class="navbar-brand" style="font-size:30px" ><?= $_SESSION["login"]["nama_user"]; ?></span>
            <?php else: ?>
            <a class="navbar-brand" style="font-size:30px" href="index.php">E-Library</a>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link2 nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link2 nav-link" href="listbuku.php">Buku</a>
                    <a class="nav-item nav-link2 nav-link" href="pinjam.php">Peminjaman</a>
                    <a class="nav-item nav-link nav-link2" href="keranjang.php">keranjang</a>
                    <?php
                        if( isset($_SESSION["login"]) ):
                    ?>   
                        <a class="nav-item btn btn-dark tombol" style="border-radius:40px" href="logout.php">logout</a>
                    <?php else: ?>
                        <a class="nav-item btn btn-dark tombol" style="border-radius:40px" href="login.php">login</a>
                        <?php endif; ?>            
                </div>
            </div>
        </div>
    </nav>
    <div class="bg"></div>
    <div class="overlay"></div>
    <section>
    <div class="container" style="min-height:443px;margin-top:-100px;overflow:auto">
    <h1 style="text-align:center">Daftar Peminjaman</h1>
    <table class="table table-striped table-bordered" style="margin-top:20px">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Tahun</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jumlah Pinjam</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ( $_SESSION["keranjang"] as $id => $jumlah ) : 
            $result = mysqli_query($conn, "SELECT * FROM buku where id=$id");
            $row = mysqli_fetch_assoc($result);
            
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row["nama_buku"]; ?></td>
                <td><?= $row["pengarang"]; ?></td>
                <td><?= $row["tahun"]; ?></td>
                <td><?= $row["kelas"]; ?></td>
                <td><?= $jumlah ?></td>
                <td><a class="btn btn-danger btn-sm" href="hapuskeranjang.php?id=<?= $id ?>">Batal</a></td>
            </tr>
                        <?php
                     endforeach; ?>
        </tbody>
    </table>
            <a href="listbuku.php" class="btn btn-outline-dark">Lanjutkan Peminjaman</a>
            <a href="checkout.php" class="btn btn-dark">Check Out</a>
    </div>
    
    </section>
<div class="footer"style="margin-top:125px"><div class="tulisan">Copyright &copy; 2019::libraryonline.com</div></div>
</body>
</html>