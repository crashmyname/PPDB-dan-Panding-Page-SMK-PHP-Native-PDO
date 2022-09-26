<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tb_lfooter where idf='$id'";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $data = $data1->fetch();

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['update'])){
    if(editfooter($_POST)>0){
        
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
                    <h3 class="card-title">Update Footer</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                        <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">Alamat</label>
                                <input type="hidden" name="id" value="<?= $data['idf']?>">
                                <textarea name="alamat" id="" cols="50" required
                                    rows="10" value=""><?= $data['alamat'];?></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control" id="nama" placeholder="Masukin email sekolah" value="<?= $data['email'];?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">No HP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no" class="form-control" id="nama" placeholder="Masukin No HP Sekolah" value="<?= $data['no'];?>" >
                                </div>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="m_footer.php" class="btn btn-warning">Kembali</a>
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