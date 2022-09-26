<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tb_lprofil where idp='$id'";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $data = $data1->fetch();

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['update'])){
    if(editprofilsekolah($_POST)>0){
        
    }
}

?>
<br>
<div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Horizontal Form -->
        <!-- DATA SISWA -->
        <div class="card card-info col-12">
            <div class="card-header">
                <h3 class="card-title">Update Profil Sekolah</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <input type="hidden" name="id" value="<?= $data['idp']?>">
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-sm-4 col-form-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="" cols="100" required
                                    rows="20" value="<?= $data['description']?>"><?= $data['description']?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="m_profilsekolah.php" class="btn btn-warning">Kembali</a>
                            <button type="submit" name="update" class="btn btn-primary"
                                onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Update</button>
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