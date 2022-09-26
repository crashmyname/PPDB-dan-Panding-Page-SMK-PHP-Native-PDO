<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';
 
if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['tambah'])){
    if(tambahfooter($_POST)>0){
        
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
                    <h3 class="card-title">Tambah Footer </h3>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">Alamat</label>
                                <textarea name="alamat" id="" cols="50" required
                                    rows="10" value=""></textarea>
                            </div>
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control" id="nama" placeholder="Masukin email sekolah" value="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Caption" class="col-sm-4 col-form-label">No HP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no" class="form-control" id="nama" placeholder="Masukin No HP Sekolah" value="" >
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
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