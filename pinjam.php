<?php
include 'db/config.php';
require 'controller/bukucontroller.php';
    session_start();
    if( !isset($_SESSION["login"]) ){
        header("Location: login.php");
    }
    $username1 = $_SESSION["login"]["nama_user"];

if( isset($_POST["pinjam"]) ){
    $username = $_POST["username"];
    $nama = $_POST["nama_user"];
    $nama_buku = $_POST["nama_buku"];
    $pengarang = $_POST["pengarang"];
    $tahun = $_POST["tahun"];
    $kelas = $_POST["kelas"];
    $jml_pinjam = $_POST["jml_pinjam"];
    $tglP = $_POST["tglP"];
    $tglK = $_POST["tglK"];
    $status = $_POST["status"];
    $id = $_POST["id"];

    $tglP_baru = date_create($tglP);
    $tglK_baru = date_create($tglK);    
    $diff = date_diff($tglP_baru, $tglK_baru);
    $diff = $diff->format("%R%a");
    if($diff < 0){
        echo "<script>
            alert('Cek tanggal kembali');
            location.href='peminjaman.php?id=$id';
        </script>";
        return false;
    }
    $query = mysqli_query($conn, "INSERT INTO transaksi VALUES('','$username','$nama','$id','$nama_buku'
            ,'$pengarang','$tahun','$kelas','$jml_pinjam','$tglP','$tglK','$status'
    )");
    
    if($query){
        echo "<script>
            alert('Buku berhasil dipinjam');
        </script>";
    }
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
    <div class="container-fluid" style="min-height:443px;margin-top:-100px;overflow:auto">
    <h1 style="text-align:center">Daftar Peminjaman</h1>
    <table class="table table-striped table-bordered" style="margin-top:20px">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Kelas</th>
            <th style="width:20px" scope="col">Jumlah Pinjam</th>
            <th style="width:20px" scope="col">Tanggal Pinjam</th>
            <th style="width:20px" scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
            <th scope="col">Denda</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $jumlahDataPerHalaman = 5;
        $jumlahData = count(query("SELECT * FROM transaksi WHERE username = '$username1'"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
        $i = 1;
        $result = query("SELECT * FROM transaksi WHERE username = '$username1' LIMIT $awalData, $jumlahDataPerHalaman");
        foreach( $result as $data ) : ?>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $data["nama_buku"]; ?></td>
            <td><?= $data["pengarang_buku"]; ?></td>
            <td><?= $data["kelas_buku"]; ?></td>
            <td><?= $data["jml_pinjam"]; ?></td>
            <td><?= $data["tgl_pinjam"]; ?></td>
            <td><?= $data["tgl_kembali"]; ?></td>
            <td><?= $data["status"]; ?></td>
<?php
$tglKembali = date_create($data["tgl_kembali"]);
$tglSekarang = date_create(date('Y-m-d'));
$diff = date_diff($tglKembali, $tglSekarang);
$diff = $diff->format("%R%a");
if( $data["status"] == "Pinjam" ){
?>
            <td><?php  
                if( $diff > 0 ):?>
                <?php $diff = trim($diff, "+"); $hasil = $diff*1000; echo $diff . " Hari (Rp. " .$hasil. ")"; ?>
                <?php endif;?>
            </td>
<?php }else if( $data["status"] == "Kembali" ){ ?>
            <td>Buku Telah Dikembalikan</td>
<?php }else{ ?>
            <td></td>
<?php } ?>
            
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>    
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
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
        </ul>
    </nav>
    
<div class="footer"style="margin-top:88px"><div class="tulisan">Copyright &copy; 2019::libraryonline.com</div></div>
</body>
</html>