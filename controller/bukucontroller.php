<?php
// include '../db/config.php';


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $jml_buku = htmlspecialchars($data["jml_buku"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    }
    
    $query = "INSERT INTO buku 
                VALUES
                ('', '$nama', '$penerbit', '$pengarang', '$tahun', '$jml_buku', '$kelas','$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah ada gambar yang diupload atau tidak
    if( $error === 4 ){
        echo "
            <script>
                alert('Masukan gambar!!');
            </script>
        ";
        return false;
    }
    //cek format gambar atau tidak
    $ekstensiGambarBoleh = ['jpg', 'jpeg', 'png'];
    $ekstensiGambarTerpilih = explode('.', $namaFile);
    $ekstensiGambarTerpilih = strtolower(end($ekstensiGambarTerpilih));

    if( !in_array($ekstensiGambarTerpilih, $ekstensiGambarBoleh) ){
        echo "
            <script>
                alert('Format harus jpg, jpeg, png!!');
            </script>
        ";
        return false;
    }

    //cek jika file terlalu besar
    if( $ukuranFile > 3000000 ){
        echo "
            <script>
                alert('Ukuran file terlalu besar!!');
            </script>
        ";
        return false;
    }

    //jika lolos seleksi, gambar diupload
    //generate namafile;
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambarTerpilih;
    move_uploaded_file($tmpName, '../assets/img/buku/' . $namaFileBaru);

    return $namaFileBaru;
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $jml_buku = htmlspecialchars($data["jml_buku"]);
    $gambarLama = $data["gambarLama"];

    //cek apakah memilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE buku 
                SET
                id = $id, nama_buku = '$nama', penerbit = '$penerbit', pengarang = '$pengarang', tahun = '$tahun', jumlah_buku = '$jml_buku', kelas = '$kelas', img = '$gambar' WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>