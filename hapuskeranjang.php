<?php
session_start();
$id = $_GET["id"];
unset($_SESSION['keranjang'][$id]);
echo "
    <script>
        alert('buku berhasil dihapus dari keranjang');
        location='keranjang.php';
    </script>
";