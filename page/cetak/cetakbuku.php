<?php
require '../../db/config.php';
require '../../controller/bukucontroller.php';

$filename = "buku_exel-(" . date('d-m-Y'). ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vdn.ms-exel");

?>
<h2>Data User</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Buku</th>
        <th>Penerbit</th>
        <th>Pengarang</th>
        <th>Tahun</th>
        <th>Jumlah Buku</th>
        <th>Kelas</th>
    </tr>
    <?php
        $buku = query("SELECT * FROM buku");
        $i = 1;
        foreach( $buku as $data ) :
    ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $data["nama_buku"]; ?></td>
        <td><?= $data["penerbit"]; ?></td>
        <td><?= $data["pengarang"]; ?></td>
        <td><?= $data["tahun"]; ?></td>
        <td><?= $data["jumlah_buku"]; ?></td>
        <td><?= $data["kelas"]; ?></td>
    </tr>
        <?php endforeach;?>
</table>