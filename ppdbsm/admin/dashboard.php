<?php
session_start();
include('a_navbar.php');
include('../inc/koneksi.php');
require 'function.php';

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

}
    $db = koneksi();
    $sql = "SELECT * FROM datasiswa";
    $result = $db->prepare($sql);
    $result->execute();
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
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
    <div class="col-xl-8 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Chart Siswa</h6>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                        <div id="chartData"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Chart Siswa</h6>
            </div>
            
            <!-- Card Body -->
            <div class="card-body">
                    <div id="pieData"></div>
            </div>
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