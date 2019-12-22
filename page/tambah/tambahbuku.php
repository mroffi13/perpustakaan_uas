<?php
require '../controller/bukucontroller.php';
if( isset( $_POST["submit"] ) ){

    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan!!');
                document.location.href = 'http://localhost/perpustakaan_uas/page/buku.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal ditambahkan!!');
                document.location.href = 'http://localhost/perpustakaan_uas/page/buku.php';
            </script>
        ";
    }
}
?>
<div style="margin: 0 auto">
        <div class="card shadow mb-4" style="width:50%; margin:auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Buku</h6>
            </div>
            <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group" style="margin-top:15px">
                    <label for="exampleFormControlInput1">Nama Buku</label>
                    <input type="text" required class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Contoh: Fisika">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Kelas</label>
                    <select class="form-control" name="kelas" id="exampleFormControlSelect1">
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM kelas");
                            while($data = mysqli_fetch_assoc($sql)){ 
                        ?>
                        <option value="<?= $data['kelas']; ?>"><?= $data['kelas']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Penerbit</label>
                        <input type="text" required class="form-control" name="penerbit" id="exampleFormControlInput1" placeholder="Penerbit">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Pengarang</label>
                        <input type="text" required class="form-control" name="pengarang" id="exampleFormControlInput1" placeholder="Pengarang">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Tahun</label>
                        <input type="text" required class="form-control" name="tahun" id="exampleFormControlInput1" placeholder="Tahun">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Jumlah Buku</label>
                        <input type="number" required class="form-control" name="jml_buku" id="exampleFormControlInput1" placeholder="20">
                </div>
                <div class="form-group">
                        <label for="exampleFormControlInput1">Upload Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                </div>
                
                    <button type="submit" class="btn btn-primary" name="submit" style="float:right; margin-bottom: 15px">Tambah</button>
            </form>
        </div>
    </div>