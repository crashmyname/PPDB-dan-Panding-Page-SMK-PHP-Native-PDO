<?php

//Memulai Koneksi
function koneksi()
{
    $db = new PDO('mysql:host=localhost;dbname=ppdb','root','');
    return $db;
}

function query($query)
{
    $db = koneksi();
    $result = $db->prepare($query);
}

function tambahsiswa($data)
{
    $db = koneksi();
    $nisn = $data['nisn'];
    $nama = $data['nama_lengkap'];
    $jk = $data['jk'];
    $tmpt_lhr = $data['tempat_lahir'];
    $tgl_lhr = $data['tanggal_lahir'];
    $agama = $data['agama'];
    $alamat = $data['alamat'];
    $rt = $data['rt'];
    $rw = $data['rw'];
    $kelurahan = $data['kelurahan'];
    $kecamatan = $data['kecamatan'];
    $kabupaten = $data['kabupaten'];
    $provinsi = $data['provinsi'];
    $no = $data['no_telp'];
    $email = $data['email'];
    $nm_ayah = $data['nama_ayah'];
    $pkj_ayah = $data['pekerjaan_ayah'];
    $phs_ayah = $data['penghasilan_ayah'];
    $nm_ibu = $data['nama_ibu'];
    $pkj_ibu = $data['pekerjaan_ibu'];
    $phs_ibu = $data['penghasilan_ibu'];
    $jns = $data['jns_pendaftaran'];
    $sekolah = $data['nama_sekolah'];
    $jurusan = $data['jurusan'];

    $sql1 = "SELECT * FROM datasiswa where nisn='$nisn' AND email='$email'";
        $data1 = $db->prepare($sql1);
        $data1->execute();
        $cek = $data1->rowCount();
        if($cek > 0){
            $_SESSION['errors'] = 'Data yang anda masukan sudah terdaftar';
            header('location:formpendaftaran.php');
        }else{    
    $query = "INSERT into datasiswa values ('','$nisn','$nama','$jk','$tmpt_lhr','$tgl_lhr','$agama','$alamat','$rt','$rw','$kelurahan','$kecamatan','$kabupaten','$provinsi','$email','$no','$nm_ayah','$pkj_ayah','$phs_ayah','$nm_ibu','$pkj_ibu','$phs_ibu','$jns','$sekolah','$jurusan','$totbiaya','$bukti')";

    $result = $db->prepare($query);
    $result->execute();
    if($result){
        $_SESSION['status'] = 'Data Berhasil di registrasi';
        header('location:formpendaftaran.php');
        
    }else{
        $_SESSION['error'] = 'Ada kesalahan dalam penginputan';
        header('location:formpendaftaran.php');
    }
    };

    return('formpendaftaran.php');
}

?>