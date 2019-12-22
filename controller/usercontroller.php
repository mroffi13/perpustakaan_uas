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

    $username = htmlspecialchars($data["uname"]);
    $password = md5(htmlspecialchars($data["password"]));
    $nama_user = htmlspecialchars($data["nama_user"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $email = htmlspecialchars($data["email"]);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if( mysqli_fetch_assoc( $result ) ){
        echo "
            <script>
                alert('Username Telah Digunakan');
            </script>
        ";
        return false;
    }

    $query = "INSERT INTO users 
                VALUES
                ('', '$username', '$password', '$nama_user', '$tgl_lahir', '$email')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $pass1 = $data["password"];
    $pass2 = $data["password2"];

    $id = $data["id"];
    $username = htmlspecialchars($data["uname"]);
    $password = md5(htmlspecialchars($data["password"]));
    $nama_user = htmlspecialchars($data["nama_user"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $email = htmlspecialchars($data["email"]);

    if( $pass1 !== $pass2 ){
        echo "
            <script>
                alert('Password tidak sama');
            </script>
        ";
        return false;
    }

    $query = "UPDATE users 
                SET
                id = $id, username = '$username', pswd = '$password', nama_user = '$nama_user', tgl_lahir = '$tgl_lahir', email = '$email' WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>