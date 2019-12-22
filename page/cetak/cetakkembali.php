<?php
require '../../db/config.php';
require '../../controller/transaksicontroller.php';

$filename = "daftar_pinjam_excel-(" . date('d-m-Y'). ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vdn.ms-exel");

?>
<h2>Data Kembali</h2>
<h3>Data dicetak pada <?= date('d F Y'); ?></h3>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Nama Buku</th>
        <th>Kelas</th>
        <th>Tahun</th>
        <th>Jumlah Pinjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Denda</th>
    </tr>
    <?php
        $transaksi = query("SELECT * FROM transaksi WHERE status='Kembali' ORDER BY tgl_pinjam DESC");
        $i = 1;
        foreach( $transaksi as $data ) :
    ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $data["nama_peminjam"]; ?></td>
        <td><?= $data["nama_buku"]; ?></td>
        <td><?= $data["kelas_buku"]; ?></td>
        <td><?= $data["tahun_buku"]; ?></td>
        <td><?= $data["jml_pinjam"]; ?></td>
        <td><?= $data["tgl_pinjam"]; ?></td>
        <td><?= $data["tgl_kembali"]; ?></td>
        <td><?= $data["status"]; ?></td>
    </tr>
        <?php endforeach;?>
</table>