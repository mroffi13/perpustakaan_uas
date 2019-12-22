<?php
require '../db/config.php';
require '../controller/usercontroller.php';
session_start();
if( !isset($_SESSION["login-adm"]) ){
    header("Location: login-admin.php");
}
$id = $_GET['id'];
$user = query("SELECT * FROM users WHERE id = $id")[0];
if( isset( $_POST["submit"] ) ){
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah!!');
                document.location.href = 'http://localhost/perpustakaan_uas/page/user.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ubah User</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body id="page-top">
<?php include 'templates/header.php'; ?>
<div class="container-fluid">

<div style="margin: 0 auto">
        <div class="card shadow mb-4" style="width:50%; margin:auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah User</h6>
            </div>
            <div class="container">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                <div class="form-group" style="margin-top:15px">
                    <label for="exampleFormControlInput1">Username</label>
                    <input type="text" required class="form-control" name="uname" id="exampleFormControlInput1" value="<?= $user["username"]; ?>">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" required class="form-control" name="nama_user" id="exampleFormControlInput1" value="<?= $user["nama_user"]; ?>">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" required class="form-control" name="password" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Confirm Password</label>
                        <input type="password" required class="form-control" name="password2" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Lahir</label>
                        <input type="date" required class="form-control" name="tgl_lahir" id="exampleFormControlInput1" value="<?= $user["tgl_lahir"]; ?>">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" required class="form-control" name="email" id="exampleFormControlInput1" value="<?= $user["email"]; ?>">
                </div>
                        <button type="submit" required class="btn btn-primary" name="submit" style="float:right; margin-bottom: 15px">Ubah</button>
            </form>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>
</body>

</html>