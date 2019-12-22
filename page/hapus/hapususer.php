<?php
    include '../../db/config.php';
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    $sql = mysqli_query($conn, $query);
    if($sql){
        echo "
            <script>
                alert('Data berhasil dihapus!!');
                document.location.href = 'http://localhost/perpustakaan_uas/page/user.php';
            </script>
        ";
    }


?>
