<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
}
require_once __DIR__ . '/vendor/autoload.php';

include 'db/config.php';
require 'controller/transaksicontroller.php';
$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
        .md{
            height:300px;
            width:300px;
            margin-left:-40px;
            margin-top:-50px;
        }
        .kop-des{
          margin-left:270px;
          margin-top:-220px;
          margin-bottom:40px;  
        }
        .box{
            background-color:grey;
            color:white;
            text-align:center;
        }
        .sm{
            width:30%;
            margin-top:15px;
            margin-left:30px;
        }
        .ttd{
            margin-right:50px;
            margin-top:40px;
            text-align:right;
        }
    </style>
</head>
<body>
<div class="kop">
<img class="md" src="assets/img/logo library.png">
    <div class="kop-des">
        <h1>Peminjam Buku E-Library</h1>
        <p>Jl. Merdeka Barang No. 37, Kel. Apel, Kec. Cimanggis<br>
        No. Telp: 021 - 234662626, Email: elibrary@library.com</p>
    </div>
        <hr>
</div>
<div class="body">
    <h1 style="text-align:center">Detail Peminjaman</h1>
    <table>
    <tr>
        <td>Nama Peminjam</td>
        <td>:</td>
        <td>'. $_SESSION["login"]["nama_user"] .'</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>'. $_SESSION["login"]["email"] .'</td>
    </tr>
    <tr>
        <td>Tanggal Pinjam</td>
        <td>:</td>
        <td>';
        $tglpinjam = date('Y-m-d');
    $html .='' .$tglpinjam .' </td>
    </tr>
    <tr>
        <td>Tanggal Pinjam</td>
        <td>:</td>
        <td>';
        $tglkembali = date('Y-m-d', strtotime('+7 days', strtotime($tglpinjam)));
    $html .='' .$tglkembali .' </td>
    </tr>
    </table>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Kelas</th>
            <th>Jumlah Pinjam</th>
            </tr>
        </thead>
        <tbody>';
            $i = 1; foreach ( $_SESSION["keranjang"] as $id => $jumlah ) { 
            $result = mysqli_query($conn, "SELECT * FROM buku where id=$id");
            $row = mysqli_fetch_assoc($result);
        $html.='<tr>
                <td>'. $i++ .'</td>
                <td>'. $row["nama_buku"] .'</td>
                <td>'. $row["pengarang"] .'</td>
                <td>'. $row["tahun"] .'</td>
                <td>'. $row["kelas"].'</td>
                <td>'. $jumlah .'</td>
            </tr>';
            }     
            date_default_timezone_set('Asia/Jakarta');
            $jam = date('H:i:s');
    $html .='</tbody>
    </table><br>
    <small>*) Segera melakukan pengambilan buku</small><br>
    <small>Bukti Peminjaman ini dicetak pada: <b>'.$tglpinjam.'</b> Pukul <b>'. $jam .'</b></small>
</div>
</body>
</html>'; 
$mpdf->WriteHTML($html);
$mpdf->Output();
?>

