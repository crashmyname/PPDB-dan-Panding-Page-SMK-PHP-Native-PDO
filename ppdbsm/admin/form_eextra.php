<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tb_lekskul where idekskul='$id'";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $data = $data1->fetch();

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['update'])){
    if(editekskul($_POST)>0){
        
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
                    <h3 class="card-title">Update Extrakurikuler</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Gambar Extrakurikuler</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="<?= $data['idekskul']?>">
                                    <input type="file" name="gmbr_ex" class="form-control" placeholder="Gambar Jurusan" value="<?= $data['imgekskul']?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">Nama Extrakurikuler</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ekskul" class="form-control" id="nama" placeholder="Masukin Extrakurikuler" value="<?= $data['nama_ekskul']?>" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="m_extra.php" class="btn btn-warning">Kembali</a>
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