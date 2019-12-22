<?php
    include 'db/config.php';
    require 'controller/bukucontroller.php';
    session_start();
    $id = $_GET["id"];
    
    //jika sudah ada buku itu dikerangjang maka di +1
    if(isset($_SESSION['keranjang'][$id])){
        $_SESSION['keranjang'][$id] += 1;
    }else{ //selain itu maka buku itu dianggap dipinjam 1
        $_SESSION['keranjang'][$id] = 1;
    }
    echo "
        <script>alert('Buku telah di masukkan ke keranjang!');
            location='keranjang.php';
        </script>
    "
?>
