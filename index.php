<?php
include('ppdbsm/inc/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMK Mahakarya Cikupa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="carousel.css">
  <link href="node_modules/@fortawesome/fontawesome-free/css/fontawesome.css" rel="stylesheet">
  <link href="node_modules/@fortawesome/fontawesome-free/css/brands.css" rel="stylesheet">
  <link href="node_modules/@fortawesome/fontawesome-free/css/solid.css" rel="stylesheet">
  <link rel="shortcut icon" href="img/logok.png" type="image">
  <!-- <link rel="shortcut icon" href="asset/img/logok.png"> -->
  <!-- all.js loads all styles and icons -->
  <script defer src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>

  <!-- support v4 icon references/syntax -->
  <script defer src="node_modules/@fortawesome/fontawesome-free/js/v4-shims.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logok.png" width="50px" class="img-fluid" alt="" srcset="">
        &nbsp <b>SMK MAHAKARYA </b>&nbspCIKUPA
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#profil">PROFIL SEKOLAH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#jurusan">JURUSAN</a>
          </li>
          <!-- <li class="nav-item">
          <a class="nav-link" href="#galeri">Galeri</a>
        </li> -->
          <li class="nav-item">
            <a class="nav-link" href="#ekskul">EKSTRAKURIKULER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ppdbsm/index.php">PPDB</a>
          </li>
          <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Gambar Bergerak -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php 
    $sql = "SELECT * FROM tb_lcover where caption='visi'";
    $result = $db->prepare($sql);
    $result->execute();
    $log = $result->fetch();
    ?>
      <div class="carousel-item active">
        <?php echo"<img src='ppdbsm/admin/imglandingpage/$log[coverimg]' class='d-block w-100 opacity-50' style='width: 300px; height: 500px; object-fit: cover;'>";?>
        <div class="carousel-caption d-none d-md-block text-black">
          <h5><?= $log['caption']?></h5>
          <p><?= $log['description']?></p>
        </div>
      </div>
      <?php 
    $sql = "SELECT * FROM tb_lcover where caption='misi'";
    $result = $db->prepare($sql);
    $result->execute();
    $log = $result->fetch();
    ?>
      <div class="carousel-item">
        <?php echo"<img src='ppdbsm/admin/imglandingpage/$log[coverimg]' class='d-block w-100 opacity-50' style='width: 300px; height: 500px; object-fit: cover;'>";?>
        <div class="carousel-caption d-none d-md-block text-black">
          <h5><?= $log['caption']?></h5>
          <p><?= $log['description']?></p>
        </div>
      </div>
      <?php 
    $sql = "SELECT * FROM tb_lcover where caption='moto'";
    $result = $db->prepare($sql);
    $result->execute();
    $log = $result->fetch();
    ?>
      <div class="carousel-item">
        <?php echo"<img src='ppdbsm/admin/imglandingpage/$log[coverimg]' class='d-block w-100 opacity-50' style='width: 300px; height: 500px; object-fit: cover;'>";?>
        <div class="carousel-caption d-none d-md-block text-black">
          <h5><?= $log['caption']?></h5>
          <p><?= $log['description']?></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- <br> -->

  <!-- Profil -->

  <section id="profil">
    <div class="container">
      <div class="row mt-5">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Profil Sekolah</h2>
          </div>
        </div>
        <div class="card">
          <div class="card-body" align="justify">
            <?php
            $sql = "SELECT * FROM tb_lprofil";
            $result = $db->prepare($sql);
            $result->execute();
            $tampil = $result->fetch();
            echo $tampil['description'];
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Jurusan -->
  <section id="jurusan">
    <div class="container">
      <div class="row mt-5">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Jurusan</h2>
          </div>
        </div>
        <?php
        $sql = "SELECT * FROM datajurusan";
        $result = $db->prepare($sql);
        $result->execute();
        while($tampil = $result->fetch()){
        ?>
        <div class="preview-card">
          <div class="preview-card__wrp">
            <div class="preview-card__item">
              <div class="preview-card__img">
                <?= "<img src='ppdbsm/admin/imglandingpage/$tampil[imgjurusan]'>" ?>
              </div>
              <div class="preview-card__content">
                <div class="preview-card__title"><?= $tampil['nama_jurusan']?></div>
                <div class="preview-card__text"> <?= $tampil['description']?></div>
                <span class="preview-card__code"></span>
                <!-- <a href="#" class="preview-card__button">READ MORE</a> -->
              </div>
            </div>
          </div>
        </div>
        <?php ;} ?>
      </div>
    </div>
  </section>
  <!-- Jasa Kami -->
  <section id="ekskul">
    <div class="container">
      <div class="row mt-5">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>EKSTRAKURIKULER</h2>
          </div>
        </div>
        <div class="row">
          <?php
        $sql = "SELECT * FROM tb_lekskul";
        $result = $db->prepare($sql);
        $result->execute();
        while($tampil = $result->fetch()){
        ?>
          <div class="col-md-4 mb-3">
            <div class="card">
              <?="<img src='ppdbsm/admin/imglandingpage/$tampil[imgekskul]' class='card-img-top'>"?>
              <div class="card-body">
                <p class="card-text">
                  <h4 align="center"><?= $tampil['nama_ekskul']?></h4>
                </p>
              </div>
            </div>
          </div>
          <?php ;} ?>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="white" fill-opacity="1"
        d="M0,128L40,154.7C80,181,160,235,240,245.3C320,256,400,224,480,213.3C560,203,640,213,720,218.7C800,224,880,224,960,186.7C1040,149,1120,75,1200,85.3C1280,96,1360,192,1400,240L1440,288L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
      </path>
    </svg>
  </section>
  <!-- Akhir Project -->

  <!-- Footer -->
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="footer">

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
        <!-- Left -->
        <div class="me-5">
          <span>Get connected with us on social networks:</span>
        </div>
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold">SMK Mahakarya Cikupa</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                Yayasan Muhajirin
              </p>
            </div>

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Social Media</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                <a href="#!" class="text-white">Facebook</a>
              </p>
              <p>
                <a href="#!" class="text-white">Instagram</a>
              </p>
              <p>
                <a href="#!" class="text-white">Twitter</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Contact</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px" />
                <?php 
                $sql = "SELECT * FROM tb_lfooter";
                $result1 = $db->prepare($sql);
                $result1->execute();
                $data = $result1->fetch();
                ?>
              <p><i class="fas fa-home mr-3"></i> <?= $data['alamat']?></p>
              <p><i class="fas fa-envelope mr-3"></i> <?= $data['email']?></p>
              <p><i class="fas fa-phone mr-3"></i> <?= $data['no']?></p>
              <!-- <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2022 Copyright:
        <a class="text-white" href="https://fadliap.nasihosting.com/">Fervian</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  </div>
  <!-- End of .container -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>