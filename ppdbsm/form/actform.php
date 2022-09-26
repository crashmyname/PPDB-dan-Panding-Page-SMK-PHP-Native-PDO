<?php
session_start();
include('../inc/koneksi.php');
    if(isset($_POST['submit'])){
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama_lengkap'];
        $jk = $_POST['jk'];
        $tmpt_lhr = $_POST['tempat_lahir'];
        $tgl_lhr = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $rt = $_POST['rt'];
        $rw = $_POST['rw'];
        $kelurahan = $_POST['kelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $kabupaten = $_POST['kabupaten'];
        $provinsi = $_POST['provinsi'];
        $no = $_POST['no_telp'];
        $email = $_POST['email'];
        $nm_ayah = $_POST['nama_ayah'];
        $pkj_ayah = $_POST['pekerjaan_ayah'];
        $phs_ayah = $_POST['penghasilan_ayah'];
        $nm_ibu = $_POST['nama_ibu'];
        $pkj_ibu = $_POST['pekerjaan_ibu'];
        $phs_ibu = $_POST['penghasilan_ibu'];
        $jns = $_POST['jns_pendaftaran'];
        $sekolah = $_POST['nama_sekolah'];
        $jurusan = $_POST['jurusan'];

        $sql1 = "SELECT * FROM datasiswa where nisn='$nisn' AND email='$email'";
        $data1 = $db->prepare($sql1);
        $data1->execute();
        $cek = $data1->rowCount();
        if($cek > 0){
            $_SESSION['errors'] = 'Data yang anda masukan sudah terdaftar';
            header('location:formpendaftaran.php');
        }else{    
            $sql = "INSERT into datasiswa values ('','$nisn','$nama','$jk','$tmpt_lhr','$tgl_lhr','$agama','$alamat','$rt','$rw','$kelurahan','$kecamatan','$kabupaten','$provinsi','$email','$no','$nm_ayah','$pkj_ayah','$phs_ayah','$nm_ibu','$pkj_ibu','$phs_ibu','$jns','$sekolah','$jurusan','$totbiaya','$bukti')";
            $data = $db->prepare($sql);
            $data->execute();
            
            if($data){
                $_SESSION['status'] = 'Data Berhasil di registrasi';
                header('location:formpendaftaran.php');
                
            }else{
                $_SESSION['error'] = 'Ada kesalahan dalam penginputan';
                header('location:formpendaftaran.php');
            }
        };
};
?>