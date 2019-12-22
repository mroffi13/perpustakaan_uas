<?php
    include 'db/config.php';
    require 'controller/bukucontroller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/listbuku.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Daftar Buku</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">  
            <?php session_start();
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
                    <a class="nav-item nav-link nav-link2" href="keranjang.php">Keranjang</a>
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
    <!-- akhir navbar -->
    <?php
    if( isset($_GET["search"]) ){
        $keyword = $_GET["search"];
        $jumlahDataPerHalaman = 6;
        $jumlahData = count(query("SELECT * FROM buku WHERE 
                        kelas LIKE '%$keyword%' OR 
                        nama_buku LIKE '%$keyword%' OR 
                        penerbit LIKE '%$keyword%' OR 
                        pengarang LIKE '%$keyword%'"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
        $result = query("SELECT * FROM buku WHERE 
                    kelas LIKE '%$keyword%' OR 
                    nama_buku LIKE '%$keyword%' OR 
                    penerbit LIKE '%$keyword%' OR 
                    pengarang LIKE '%$keyword%'
                LIMIT $awalData, $jumlahDataPerHalaman");
    }else{
        $keyword = "Semua Buku";
        $jumlahDataPerHalaman = 6;
        $jumlahData = count(query("SELECT * FROM buku"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
        $result = query("SELECT * FROM buku LIMIT $awalData, $jumlahDataPerHalaman");
    }
    ?>
    <div class="container">
            <h3 style="margin-top:-70px">Daftar Buku</h3>
            <div style="font-size:30px;margin-bottom:20px"><?= $keyword; ?></div>
        <div class="row">
        <?php foreach( $result as $data ): ?>
            <div class="col-sm-5 offset-sm-1 listbuku">
                <img src="assets/img/buku/<?= $data["img"]; ?>" >
                <h2><?= $data["nama_buku"]; ?></h2>
                <table style="margin-bottom:25px;">
                    <tr>
                        <td class="awal">Penerbit</td>
                        <td></td>
                        <td>:</td>
                        <td> <?= $data["penerbit"]; ?></td>
                    </tr>
                    <tr>
                        <td class="awal">Pengarang</td>
                        <td></td>
                        <td>:</td>
                        <td> <?= $data["pengarang"]; ?></td>
                    </tr>
                    <tr>
                        <td class="awal">Tahun</td>
                        <td></td>
                        <td>:</td>
                        <td> <?= $data["tahun"]; ?></td>
                    </tr>
                    <tr>
                        <td class="awal">Kelas</td>
                        <td></td>
                        <td>:</td>
                        <td> <?= $data["kelas"]; ?></td>
                    </tr>
                    <small><tr>
                        <td class="awal">Stok Buku</td>
                        <td></td>
                        <td>:</td>
                        <td><?= $data["jumlah_buku"]; ?></td>
                    </tr></small>
                </table>
                <form action="peminjaman.php" method="get">
                    <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    <button class="btn btn-outline-dark" style="width:230px;" type="submit">Pinjam</button>
                </form>
            </div>
        <?php endforeach; ?>
        </div>
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php if( isset($_GET["search"]) ) : ?>
            <?php if( $halamanAktif > 1 ) : ?>
            <li class="page-item">
            <a class="page-link" href="?search=<?=$keyword?>&halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <?php else : ?>
                <li class="page-item disabled">
                <a class="page-link" href="?search=<?=$keyword?>&halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            <?php endif ; ?>

            <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                <?php if( $i == $halamanAktif ) : ?>
                    <li class="page-item active"><a class="page-link" href="?search=<?=$keyword?>&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?search=<?=$keyword?>&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                <li class="page-item">
                    <a class="page-link" href="?search=<?=$keyword?>&halaman=<?= $halamanAktif + 1; ?>">Next</a>
                </li>
            <?php else : ?>
                <li class="page-item disabled">
                    <a class="page-link" href="?search=<?=$keyword?>&halaman=<?= $halamanAktif + 1; ?>" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            <?php endif ; ?>
        <?php else : ?>
            <?php if( $halamanAktif > 1 ) : ?>
            <li class="page-item">
            <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <?php else : ?>
                <li class="page-item disabled">
                <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            <?php endif ; ?>

            <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                <?php if( $i == $halamanAktif ) : ?>
                    <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                </li>
            <?php else : ?>
                <li class="page-item disabled">
                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            <?php endif ; ?>
        
        <?php endif; ?>    
        </ul>
        </nav>
    </div>
<div class="footer"><div class="tulisan">Copyright &copy; 2019::libraryonline.com</div></div>
</body>
</html>