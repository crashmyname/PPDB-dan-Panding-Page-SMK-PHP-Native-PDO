<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';
 
if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}

?>

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        <p class="mb-4">Berikut adalah halaman data siswa SMK Mahakarya Cikupa.</p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <?php
            if(isset($_SESSION['status']))
            {
                ?> 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php 
                    echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                unset($_SESSION['status']);
            }?>

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="">
                    <table class="table table-bordered" id="table-datatables" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <?php 
                        $sql = "SELECT * FROM datasiswa";
                        $data = $db->prepare($sql);
                        $data->execute();
                        $no = 1;
                        while ($baris = $data->fetch()){
                        ?>
                            <tr align="center">
                                <th><?= $no;?></th>
                                <th><?= $baris['nisn']?></th>
                                <th><?= $baris['nama_lengkap']?></th>
                                <th><?= $baris['jk']?></th>
                                <th><?= $baris['jurusan']?></th>
                                <th><?= $baris['email']?></th>
                                <th><a href="detail_siswa.php?id=<?= $baris['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg></a>|
                                  <a href="deletesiswa.php?id=<?= $baris['id']?>" onclick="return confirm('Apakah yakin mau menghapus data?')">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></a>
                                  </th>
                            </tr>
                            <?php $no++;} ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('a_footer.php');
?>