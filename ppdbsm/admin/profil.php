<?php
// session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM admn_user where username='$id'";
        $data2 = $db->prepare($sql);
        $data2->execute();
        $data3 = $data2->fetch();


if(isset($_POST['update'])){
    if(updateprofil($_POST)>0){
        
    }
}

?>
<br>
<div class="container-fluid">
    <?php
            if(isset($_SESSION['update']))
            {
                ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php 
                    echo $_SESSION['update']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
                unset($_SESSION['update']);
            }?>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Horizontal Form -->
        <!-- DATA SISWA -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">DATA PROFIL</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Nisn" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="id" value="<?= $data['id']?>" id="">
                                <input type="text" name="username" class="form-control" id="Nisn" placeholder="Email"
                                    value="<?= $data['username']?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama Lengkap" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control" id="nama"
                                    placeholder="Masukan Pass baru anda" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="dashboard.php" class="btn btn-warning">Kembali Ke Dashboard</a>
                            <button type="submit" name="update" class="btn btn-info" onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Update Profil</button>
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