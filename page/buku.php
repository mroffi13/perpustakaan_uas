<?php
session_start();
if( !isset($_SESSION["login-adm"]) ){
    header("Location: login-admin.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
              <!-- DataTales Example -->
              <a href="tambah.php?hal=buku" class="btn btn-primary" style="margin-bottom: 7px">Tambah Buku</a>
              <a href="cetak/cetakbuku.php" class="btn btn-primary" style="margin-bottom: 7px"><i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i>Cetak Buku</a>
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Buku</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th></th>
                        <th></th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Jumlah Buku</th>
                        <th>Kelas</th>
                      </tr>
                  </thead >
                  <tfoot>
                      <tr>
                        <th>No</th>
                        <th></th>
                        <th></th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Jumlah Buku</th>
                        <th>Kelas</th>
                      </tr>
                  </tfoot>
                  <tbody>
                        <?php
                        require '../db/config.php';
                        require '../controller/bukucontroller.php';
                        $buku = query("SELECT * FROM buku");
                          $i = 1;
                          foreach( $buku as $data ) :
                        ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td><a href="editbuku.php?id=<?= $data['id'] ?>" class="btn"><img style="width:20px; height:20px" src="../assets/img/edit.png" alt="edit"></a></td>
                          <td><a href="hapus/hapusbuku.php?id=<?= $data['id'] ?>" onclick="return confirm('Ingin dihapus??')" class="btn"><img style="width:20px; height:20px" src="../assets/img/delete.png" alt="edit"></a></td>
                          <td><?= $data['nama_buku']; ?></td>
                          <td><?= $data['penerbit']; ?></td>
                          <td><?= $data['pengarang']; ?></td>
                          <td><?= $data['tahun']; ?></td>
                          <td><?= $data['jumlah_buku']; ?></td>
                          <td><?= $data['kelas']; ?></td>
                      </tr>
                          <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
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