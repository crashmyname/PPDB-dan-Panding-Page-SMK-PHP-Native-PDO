<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';
 
if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['tambah'])){
    if(tambahcover($_POST)>0){
        
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
                    <h3 class="card-title">Tambah Gambar Cover</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Gambar Cover</label>
                                <div class="col-sm-8">
                                    <input type="file" name="gmbr_cover" class="form-control" placeholder="Gambar Cover" required>
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