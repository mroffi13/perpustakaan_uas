<?php
    include '../../db/config.php';
    $id = $_GET['id'];
    $query = "DELETE FROM buku WHERE id = $id";
    $sql = mysqli_query($conn, $query);
    if($sql){
        echo "
            <script>
                alert('Data berhasil dihapus!!');
                document.location.href = 'http://localhost/perpustakaan_uas/page/buku.php';
            </script>
        ";
    }


?>
