<?php
include('a_navbar.php');
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Siswa</h1>
<p class="mb-4">Berikut adalah halaman Detail Siswa SMK Mahakarya Cikupa.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- @if(session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('sukses')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('sukses')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Table Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="">
            <table class="table table-bordered" id="table-datatables" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nisn</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Nama Ayah</th>
                        <th>Pekerjaan Ayah</th>
                        <th>Penghasilan Ayah</th>
                        <th>Nama Ibu</th>
                        <th>Pekerjaan Ibu</th>
                        <th>Penghasilan Ibu</th>
                        <th>Jenis Pendaftaran</th>
                        <th>Asal Sekolah</th>
                        <th>Jurusan</th>
                        <th>Total Biaya</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                    <?php
                    $sql = "select * from datasiswa";
                    $data = $db->prepare($sql);
                    $data->execute();
                    $no=1;
                    while($baris = $data->fetch()){
                    ?>
                    <tr align="center">
                        <th><?= $no++?></th>
                        <th><?=$baris['nisn']?></th>
                        <th><?=$baris['nama_lengkap']?></th>
                        <th><?=$baris['jk']?></th>
                        <th><?=$baris['tempat_lahir']?></th>
                        <th><?=$baris['tgl_lahir']?></th>
                        <th><?=$baris['agama']?></th>
                        <th><?=$baris['alamat']?></th>
                        <th><?=$baris['rt']?></th>
                        <th><?=$baris['rw']?></th>
                        <th><?=$baris['kelurahan']?></th>
                        <th><?=$baris['kecamatan']?></th>
                        <th><?=$baris['kabupaten']?></th>
                        <th><?=$baris['provinsi']?></th>
                        <th><?=$baris['no_telp']?></th>
                        <th><?=$baris['email']?></th>
                        <th><?=$baris['nama_ayah']?></th>
                        <th><?=$baris['rw']?></th>
                        <th>{{$item->penghasilan_ayah}}</th>
                        <th>{{$item->nama_ibu}}</th>
                        <th>{{$item->pekerjaan_ibu}}</th>
                        <th>{{$item->penghasilan_ibu}}</th>
                        <th><?=$baris['jns_pendaftaran']?></th>
                        <th>{{$item->nama_sekolah}}</th>
                        <th>{{$item->jurusan}}</th>
                        <th><?=$baris['totalbiaya']?></th>
                        <th><?="<img src='../asset/bukti/$baris[bukti]' width='70' height='90' />"?></th>
                    </tr>
                    <?php ;} ?>
            </table>
        </div>
    </div>
</div>
</div>
<?php
include('a_footer.php');
?>