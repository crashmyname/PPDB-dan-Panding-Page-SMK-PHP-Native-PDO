<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM dataguru where id_guru='$id'";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $data = $data1->fetch();

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

if(isset($_POST['update'])){
    if(editguru($_POST)>0){
        
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
                <h3 class="card-title">Update Guru</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Caption" class="col-sm-4 col-form-label">NIP</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="id" id="" value="<?= $data['id_guru']?>">
                                <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukin NIP"
                                    value="<?= $data['nip']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Caption" class="col-sm-4 col-form-label">Nama Guru</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Masukin Nama Guru" value="<?= $data['nama_guru']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Caption" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <select type="text" name="jk" id="Jenis Kelamin" class="form-control" required>
                                    <option value="<?= $data['jk']?>"><?= $data['jk']?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Caption" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea name="alamat" id="" cols="50" required rows="5" value=""><?= $data['alamat']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Caption" class="col-sm-4 col-form-label">Gelar/Pendidikan</label>
                            <div class="col-sm-8">
                                <select type="text" name="gelar" id="Jenis Kelamin" class="form-control" required>
                                    <option value="<?= $data['gelar']?>"><?= $data['gelar']?></option>
                                    <?php
                                        $sql = "SELECT * from gelar";
                                        $data1 = $db->prepare($sql);
                                        $data1->execute();
                                        while($hasil = $data1->fetch()){
                                        ?>
                                    <option value="<?= $hasil['nama_gelar']?>"><?= $hasil['nama_gelar']?></option>
                                    <?php ;} ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="dataguru.php" class="btn btn-warning">Kembali</a>
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