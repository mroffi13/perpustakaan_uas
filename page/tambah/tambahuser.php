<?php
require '../controller/usercontroller.php';
if( isset( $_POST["submit"] ) ){
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan!!');
                document.location.href = 'http://localhost/perpustakaan_uas/page/user.php';
            </script>
        ";
    }
}
?>
<div style="margin: 0 auto">
        <div class="card shadow mb-4" style="width:50%; margin:auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
            </div>
            <div class="container">
            <form action="" method="post">
                <div class="form-group" style="margin-top:15px">
                    <label for="exampleFormControlInput1">Username</label>
                    <input type="text" required class="form-control" name="uname" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                        <input type="password" required class="form-control" name="password" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Nama User</label>
                        <input type="text" required class="form-control" name="nama_user" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Lahir</label>
                        <input type="date" required class="form-control" name="tgl_lahir" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" required class="form-control" name="email" id="exampleFormControlInput1">
                </div>
                    <button type="submit" required class="btn btn-primary" name="submit" style="float:right; margin-bottom: 15px">Tambah</button>
            </form>
        </div>
    </div>