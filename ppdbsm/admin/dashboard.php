<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}
    $db = koneksi();
    $sql = "SELECT * FROM datasiswa";
    $result = $db->prepare($sql);
    $result->execute();
    // $pecah = $result->fetch();
    // $pecah['jurusan'];
    $data = $result->rowCount();
    // 
    $sql1 = "SELECT * FROM dataguru";
    $result = $db->prepare($sql1);
    $result->execute();
    $data1 = $result->rowCount();
    // 
    $sql2 = "SELECT * FROM datajurusan";
    $result = $db->prepare($sql2);
    $result->execute();
    $data2 = $result->rowCount();
    //
    $sql3 = "SELECT * FROM datasiswa where jurusan='Otomatisasi Tata Kelola Perkantoran'";
    $result = $db->prepare($sql3);
    $result->execute();
    $data3 = $result->rowCount();
    $sql4 = "SELECT * FROM datasiswa where jurusan='Teknik Kendaraan Ringan Otomotif'";
    $result = $db->prepare($sql4);
    $result->execute();
    $data4 = $result->rowCount();
    $sql5 = "SELECT * FROM datasiswa where jurusan='Teknik Komputer Dan Jaringan'";
    $result = $db->prepare($sql5);
    $result->execute();
    $data5 = $result->rowCount();

?>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Data Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Data Guru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data1?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Jurusan
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $data2?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-xl-12 col-lg-5">
        <?php
            if(isset($_SESSION['updated']))
            {
                ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php 
                    echo $_SESSION['updated']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
                unset($_SESSION['updated']);
            }?>
            <h1 class="h3 mb-2 text-gray-800">Jumlah Data Siswa</h1>
        <p class="mb-4">Berikut adalah halaman jumlah data siswa SMK Mahakarya Cikupa.</p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <table class="table table-striped table-hover">
            <tr align="Center">
                <td>Total Siswa</td>
                <td>Siswa Jurusan OTKP</td>
                <td>Siswa Jurusan TKJ</td>
                <td>Siswa Jurusan TKR</td>
            </tr>
            <tr align="Center">
                <td><?= $data?></td>
                <td><?= $data3?></td>
                <td><?= $data4?></td>
                <td><?= $data5?></td>
            </tr>

        </table>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!-- Content Row -->
<?php
include('a_footer.php');
?>