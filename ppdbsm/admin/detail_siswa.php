<?php
session_start();
include('../inc/koneksi.php');
include('a_navbar.php');
require 'function.php';

$id = $_GET['id'];

$sql = "SELECT * FROM datasiswa where id='$id'";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $data = $data1->fetch();

if (empty($_SESSION['user'])) {
    die ("<script>alert('Anda Belum Login')</script><script>document.location='index.php';</script>");

};

?>
<br>
<div class="container-fluid">
    <?php
            if(isset($_SESSION['status']))
            {
                ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php 
                    echo $_SESSION['status']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
                unset($_SESSION['status']);
            }?>
    <?php
            if(isset($_SESSION['errors']))
            {
                ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php 
                    echo $_SESSION['errors']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
                unset($_SESSION['errors']);
            }
            ?>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- DATA SISWA -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">DATA SISWA</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Nisn" class="col-sm-4 col-form-label">NISN (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="nisn" class="form-control" id="Nisn"
                                    placeholder="nisn.data.kemdikbud.go.id" value="<?= $data['nisn']?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required maxlength="13">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama Lengkap" class="col-sm-4 col-form-label">NAMA LENGKAP (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_lengkap" class="form-control" id="nama"
                                    placeholder="Sesuai Ijazah" value="<?= $data['nama_lengkap']?>" required>
                            </div>
                        </div>
                        <!-- OPTION -->
                        <div class="form-group row">
                            <label for="Jenis Kelamin" class="col-sm-4 col-form-label">JENIS KELAMIN (*)</label>
                            <div class="col-sm-8">
                                <select type="text" name="jk" id="Jenis Kelamin" class="form-control" required>
                                    <option value="<?= $data['nisn']?>"><?= $data['jk']?></option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tmp_lahir" class="col-sm-4 col-form-label">TEMPAT LAHIR (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                    placeholder="Sesuai Ijazah" value="<?= $data['tempat_lahir']?>" required>
                            </div>
                        </div>
                        <!-- TANGGAL -->
                        <div class="form-group row">
                            <label for="Tanggal Lahir" class="col-sm-4 col-form-label">TANGGAL LAHIR (*)</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask value="<?= $data['tgl_Lahir']?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-sm-4 col-form-label">AGAMA (*)</label>
                            <div class="col-sm-8">
                                <select type="text" name="agama" id="agama" class="form-control">
                                    <option value="<?= $data['agama']?>"><?= $data['agama']?></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                    <option value="Kepercayaan Baru">Kepercayaan Baru</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">ALAMAT (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    placeholder="Sesuai KK" value="<?= $data['alamat']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Rt" class="col-sm-4 col-form-label">RT / RW (*)</label>
                            <div class="col-sm-4">
                                <input type="text" name="rt" class="form-control" id="Rt" placeholder="000"
                                    value="<?= $data['rt']?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required maxlength="4">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="rw" class="form-control" id="Rw" placeholder="000"
                                    value="<?= $data['rw']?>"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required maxlength="4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kelurahan" class="col-sm-4 col-form-label">KELURAHAN (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="kelurahan" value="<?= $data['kelurahan']?>"
                                    class="form-control" id="Kelurahan" placeholder="Kelurahan" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Kecamatan" class="col-sm-4 col-form-label">KECAMATAN (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="kecamatan" class="form-control"
                                    value="<?= $data['kecamatan']?>" id="Kecamatan" placeholder="Kecamatan" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kabupaten" class="col-sm-4 col-form-label">KABUPATEN (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="kabupaten" class="form-control" id="Kabupaten"
                                    value="<?= $data['kabupaten']?>" placeholder="Kabupaten" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Propinsi" class="col-sm-4 col-form-label">PROVINSI (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="provinsi" class="form-control" id="Propinsi"
                                    value="<?= $data['provinsi']?>" placeholder="Propinsi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Rt" class="col-sm-4 col-form-label">NO TELP/HP (*)</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="no_telp"
                                        data-inputmask="'mask': ['999-999-999-999', '+0999 999 999 999']" data-mask
                                        value="<?= $data['no_hp']?>"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        required maxlength="13">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-4 col-form-label">E-MAIL (*)</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="Email" placeholder="Email"
                                    value="<?= $data['email']?>" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <!-- DATA AYAH -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">DATA AYAH</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="nm_ayh" class="col-sm-4 col-form-label">NAMA AYAH (*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_ayah" class="form-control" id="nm_ayh"
                                    placeholder="Nama Ayah" required value="<?= $data['nama_ayah']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kerja_ayh" class="col-sm-4 col-form-label">PEKERJAAN AYAH(*)</label>
                            <div class="col-sm-8">
                                <select type="text" name="pekerjaan_ayah" id="kerja_ayh" class="form-control">
                                    <option value="<?= $data['pekerjaan_ayah']?>"><?= $data['pekerjaan_ayah']?></option>
                                    <option value="Tidak bekerja">Tidak bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hasil_ayh" class="col-sm-4 col-form-label">PENGHASILAN AYAH(*)</label>
                            <div class="col-sm-8">
                                <select type="text" name="penghasilan_ayah" id="hasil_ayh" class="form-control">
                                    <option value="<?= $data['penghasilan_ayah']?>"><?= $data['penghasilan_ayah']?>
                                    </option>
                                    <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000
                                    </option>
                                    <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- DATA IBU -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">DATA IBU</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nm_ibu" class="col-sm-4 col-form-label">NAMA IBU(*)</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_ibu" class="form-control" id="nm_ibu"
                                    placeholder="Nama Ibu" value="<?= $data['nama_ibu']?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kerja_ibu" class="col-sm-4 col-form-label">PEKERJAAN IBU (*)</label>
                            <div class="col-sm-8">
                                <select type="text" name="pekerjaan_ibu" id="kerja_ibu" class="form-control">
                                    <option value="<?= $data['pekerjaan_ibu']?>"><?= $data['pekerjaan_ibu']?></option>
                                    <option value="Tidak bekerja">Tidak bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Peternak">Peternak</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang Besar">Pedagang Besar</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hasil_ibu" class="col-sm-4 col-form-label">PENGHASILAN IBU (*)</label>
                            <div class="col-sm-8">
                                <select type="text" name="penghasilan_ibu" id="hasil_ibu" class="form-control">
                                    <option value="<?= $data['penghasilan_ibu']?>"><?= $data['penghasilan_ibu']?>
                                    </option>
                                    <option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
                                    <option value="Rp. 500,000 - Rp. 999,999">Rp. 500,000 - Rp. 999,999</option>
                                    <option value="Rp. 1,000,000 - Rp. 1,999,999">Rp. 1,000,000 - Rp. 1,999,999</option>
                                    <option value="Rp. 2,000,000 - Rp. 4,999,999">Rp. 2,000,000 - Rp. 4,999,999</option>
                                    <option value="Rp. 5,000,000 - Rp. 20,000,000">Rp. 5,000,000 - Rp. 20,000,000
                                    </option>
                                    <option value="Lebih dari Rp. 20,000,000">Lebih dari Rp. 20,000,000</option>
                                    <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <!-- REGISTRASI PESERTA DIDIK -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">REGISTRASI PESERTA DIDIK</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="jenis_pendaftaran" class="col-sm-4 col-form-label">JENIS PENDAFTARAN (*)</label>
                            <select type="text" name="jns_pendaftaran" id="jns-pendftr" class="form-control">
                                <option value="<?= $data['jns_pendaftaran']?>"><?= $data['jns_pendaftaran']?></option>
                                <option value="BARU">Baru</option>
                                <option value="PINDAHAN">Pindahan</option>
                            </select>
                        </div>
                        <!-- <div class="form-group row">
                                <label for="no_skhun" class="col-sm-4 col-form-label">JALUR PENDAFTARAN (*)</label>
                                <select type="text" name="jalur_pendaftaran" id="jlr_pendftrn" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option value="Beasiswa">Beasiswa</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Prestasi">Prestasi</option>
                                    </select>
                            </div><br> -->
                        <div class="form-group row">
                            <label for="skl_asal" class="col-sm-4 col-form-label">SEKOLAH ASAL (*)</label>
                            <div class="col-sm-8">
                                <!-- {{-- <input type="text" name="nama_sekolah" class="form-control" id="sekolah_asal" placeholder="Asal Sekolah" value="{{old('nama_sekolah')}}"> --}} -->
                                <select type="text" name="nama_sekolah" id="nama_sekolah" class="form-control">
                                    <option value="<?= $data['asal_sekolah']?>"><?= $data['asal_sekolah']?></option>
                                    <?php
                                        $sql = "SELECT * from datasekolah";
                                        $data1 = $db->prepare($sql);
                                        $data1->execute();
                                        while($hasil = $data1->fetch()){
                                        ?>
                                    <option value="<?=$hasil['nama_sekolah']?>"><?=$hasil['nama_sekolah']?></option>
                                    <?php ;}?>
                                </select>
                                <script>
                                    $("#nama_sekolah").select2();
                                </script>
                            </div>
                        </div>
                        <!-- {{-- <div class="form-group row">
                                <label for="jurusan" class="col-sm-4 col-form-label">STATUS SEKOLAH (*)</label>
                                <select type="text" name="stts_sekolah" id="stts_sekolah" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Negeri">Negeri</option>
                                    </select>
                            </div> --}} -->
                        <br>
                        <!-- <div class="form-group row">
                                <label for="skl_asal" class="col-sm-4 col-form-label">ALAMAT SEKOLAH (*)</label>
                                <div class="col-sm-8">
                                    <input type="text" name="alamat_sekolah" class="form-control" id="alamat_sekolah" placeholder="Alamat Sekolah" value="">
                                </div>
                            </div> -->
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-4 col-form-label">PILIH JURUSAN (*)</label>
                            <select type="text" name="jurusan" id="jurusan" class="form-control" value="">
                                <option value="<?= $data['jurusan']?>"><?= $data['jurusan']?></option>
                                <?php
                                    $sql2 = "SELECT * from datajurusan";
                                    $data2 = $db->prepare($sql2);
                                    $data2->execute();
                                    while($hasil2 = $data2->fetch()){
                                    ?>
                                <option value="<?= $hasil2['nama_jurusan']?>"><?= $hasil2['nama_jurusan']?></option>
                                <?php ;} ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="col-md-6">
                <!-- PROSES -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">PROSES</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label" for="exampleCheck2">
                                Saya telah entry data sesuai dengan ketentuan berkas yang berlaku, telah kami validasi
                                kebenaran dan saya bertanggung jawab atas kebenaran data tersebut
                                <br>
                                <b>Data setelah dikirim tidak dapat di edit kembali tanpa seijin admin.
                            </label>
                        </div>
                        <br>
                        <div class="form-group row">
                            <p>Keterangan : Tanda '*' Wajib di isi</p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="datasiswa.php" class="btn btn-info">Kembali</a>
                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
        <br>
</div>
</form>
</div><!-- /.container-fluid -->
</section>
</div>

<?php
include('a_footer.php');
?>