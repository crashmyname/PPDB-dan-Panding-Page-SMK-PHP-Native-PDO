<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM datajurusan where idjurusan='$id'";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $data = $data1->fetch();

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['update'])){
    if(editjurusan($_POST)>0){
        
    }
}

?>
<br>
<div class="container-fluid">        
            <form action="" method="post" enctype="multipart/form-data">
            <!-- Horizontal Form -->
            <!-- DATA SISWA -->
            <div class="card card-info col-8">
                <div class="card-header">
                    <h3 class="card-title">Update Jurusan</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Gambar Jurusan</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="<?= $data['idjurusan']?>">
                                    <input type="file" name="gmbr_jrs" class="form-control" placeholder="Gambar Jurusan" value="<?= $data['imgjurusan']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">Jurusan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jurusan" class="form-control" id="nama" placeholder="Masukin Jurusan" value="<?= $data['nama_jurusan']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea name="description" id="" cols="50" required
                                    rows="10" value="<?= $data['description']?>"><?= $data['description']?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="m_jurusan.php" class="btn btn-warning">Kembali</a>
                                <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
</div>
<?php
include('a_footer.php');
?>