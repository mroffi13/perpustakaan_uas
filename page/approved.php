<?php
include '../db/config.php';
session_start();
if( !isset($_SESSION["login-adm"]) ){
    header("Location: login-admin.php");
}
    $id = $_GET["id"];
    $id_buku = $_GET["id_buku"];
    $jml_pinjam = $_GET["jml_pinjam"];

    $sql =  mysqli_query($conn, "UPDATE transaksi SET status='Pinjam' WHERE id=$id");
    $sql = mysqli_query($conn, "UPDATE buku SET jumlah_buku=(jumlah_buku-$jml_pinjam)");
    
    echo "
    <script>
        alert('Buku Berhasil Dipinjam');
        window.location.href = 'http://localhost/perpustakaan_uas/page/transaksi.php';
    </script>
        ";
?>