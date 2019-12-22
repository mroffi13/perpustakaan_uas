<?php
require '../db/config.php';
session_start();
if( !isset($_SESSION["login-adm"]) ){
    header("Location: login-admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Tabel Buku</title>

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
    <?php
        $hal = $_GET['hal'];
        if($hal == "buku"){
            include 'tambah/tambahbuku.php';
        }
        else if($hal == "user"){
            include 'tambah/tambahuser.php';
        }
    ?>
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