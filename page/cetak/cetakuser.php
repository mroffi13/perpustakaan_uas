<?php
require '../../db/config.php';
require '../../controller/usercontroller.php';

$filename = "user_excel-(" . date('d-m-Y'). ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vdn.ms-exel");

?>
<h2>Data User</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
    </tr>
    <?php
        $buku = query("SELECT * FROM users");
        $i = 1;
        foreach( $buku as $data ) :
    ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $data["username"]; ?></td>
        <td><?= $data["nama_user"]; ?></td>
        <td><?= $data["tgl_lahir"]; ?></td>
        <td><?= $data["email"]; ?></td>
    </tr>
        <?php endforeach;?>
</table>