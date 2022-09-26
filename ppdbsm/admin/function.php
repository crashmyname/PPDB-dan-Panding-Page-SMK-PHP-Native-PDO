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

function tambahcover($data)
{
    $db = koneksi();
    $capt = $data['caption'];
    $desc = $data['description'];
    $namaFile = $_FILES['gmbr_cover']['name'];
    $namaSementara = $_FILES['gmbr_cover']['tmp_name'];
    $dirUpload = "imglandingpage/";

    $uploaded = move_uploaded_file($namaSementara,$dirUpload.$namaFile);
    if($uploaded){
        $sql = "INSERT into tb_lcover values ('','$namaFile','$capt','$desc')";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $_SESSION['status'] = 'Data Berhasil di tambah';
        // header('location:form_cover.php');
        echo "<script>document.location='m_cover.php';</script>";
        // echo "link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    }else{
        // echo "Gagal Upload";
        $_SESSION['error'] = 'Ada kesalahan dalam penginputan';
        header('location:form_cover.php');
    };
}

function deletecover($id)
{
    $db = koneksi();
    $sql = "DELETE FROM tb_lcover where idc='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    $_SESSION['delete'] = 'Data Berhasil di hapus';
    // return header('location:form_cover.php');
    echo "<script>document.location='../m_cover.php';</script>";
}

function editcover($data)
{
    $db = koneksi();
    $id = $data['id'];
    $capt = $data['caption'];
    $desc = $data['description'];
    $gmbr = $_FILES['gmbr_cover']['name'];
    // $namaFile = $_FILES['gmbr_cover']['name'];
    $namaSementara = $_FILES['gmbr_cover']['tmp_name'];
    $dirUpload = "imglandingpage/";

    $uploaded = move_uploaded_file($namaSementara,$dirUpload.$gmbr);
    if($uploaded){
    $sql = "UPDATE `tb_lcover` set `coverimg`='$gmbr',`caption`='$capt',`description`='$desc' where `idc`='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    $_SESSION['update'] = 'Data Berhasil diubah';
    echo "<script>document.location='m_cover.php';</script>";
    }else{
    $_SESSION['error'] = 'Data Gagal Disimpan';
    echo "<script>document.location='/m_cover.php';</script>";
    }
}

function editprofilsekolah($data)
{
    $db = koneksi();
    $id = $data['id'];
    $nama = $data['description'];
    $sql = "UPDATE `tb_lprofil` set `description`='$nama' where `idp`='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    if($result){
    $_SESSION['update'] = 'Data Berhasil diubah';
    echo "<script>document.location='m_profilsekolah.php';</script>";
    }else{
    $_SESSION['error'] = 'Data Gagal Disimpan';
    echo "<script>document.location='m_profilsekolah.php';</script>";
    }
}

function tambahjurusan($data)
{
    $db = koneksi();
    $gmbr = $_FILES['gmbr_jrs']['name'];
    $jurusan = $data['jurusan'];
    $desc = $data['description'];
    // $namaFile = $_FILES['gmbr_cover']['name'];
    $namaSementara = $_FILES['gmbr_jrs']['tmp_name'];
    $dirUpload = "imglandingpage/";

    $uploaded = move_uploaded_file($namaSementara,$dirUpload.$gmbr);
    if($uploaded){
        $sql = "INSERT into datajurusan values ('','$gmbr','$jurusan','$desc')";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $_SESSION['status'] = 'Data Berhasil di tambah';
        // header('location:form_cover.php');
        echo "<script>document.location='m_jurusan.php';</script>";
        // echo "link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    }else{
        // echo "Gagal Upload";
        $_SESSION['error'] = 'Ada kesalahan dalam penginputan';
        header('location:form_jurusan.php');
    };
}

function editjurusan($data)
{
    $db = koneksi();
    $id = $data['id'];
    $gmbr = $_FILES['gmbr_jrs']['name'];
    $jurusan = $data['jurusan'];
    $desc = $data['description'];
    // $namaFile = $_FILES['gmbr_cover']['name'];
    $namaSementara = $_FILES['gmbr_jrs']['tmp_name'];
    $dirUpload = "imglandingpage/";

    $uploaded = move_uploaded_file($namaSementara,$dirUpload.$gmbr);
    if($uploaded){
    $sql = "UPDATE `datajurusan` set `imgjurusan`='$gmbr',`nama_jurusan`='$jurusan',`description`='$desc' where `idjurusan`='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    // var_dump($result);
    $_SESSION['update'] = 'Data Berhasil diubah';
    echo "<script>document.location='m_jurusan.php';</script>";
    }else{
    $_SESSION['error'] = 'Data Gagal Disimpan';
    echo "<script>document.location='m_jurusan.php';</script>";
    }
}

function deletejurusan($id)
{
    $db = koneksi();
    $sql = "DELETE FROM datajurusan where idjurusan='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    $_SESSION['delete'] = 'Data Berhasil di hapus';
    // return header('location:form_cover.php');
    echo "<script>document.location='../m_jurusan.php';</script>";
}

function tambahekskul($data)
{
    $db = koneksi();
    $gmbr = $_FILES['gmbr_ex']['name'];
    $nama = $data['nama_ex'];
    // $namaFile = $_FILES['gmbr_cover']['name'];
    $namaSementara = $_FILES['gmbr_ex']['tmp_name'];
    $dirUpload = "imglandingpage/";

    $uploaded = move_uploaded_file($namaSementara,$dirUpload.$gmbr);
    if($uploaded){
        $sql = "INSERT into tb_lekskul values ('','$gmbr','$nama')";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $_SESSION['sukses'] = 'Data Berhasil di tambah';
        echo "<script>document.location='m_extra.php';</script>";
        // header('location:form_cover.php');
        // echo "link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    }else{
        // echo "Gagal Upload";
        $_SESSION['error'] = 'Ada kesalahan dalam penginputan';
        header('location:form_extra.php');
    };
}

function editekskul($data)
{
    $db = koneksi();
    $id = $data['id'];
    $gmbr = $_FILES['gmbr_ex']['name'];
    $ekskul = $data['ekskul'];
    // $namaFile = $_FILES['gmbr_cover']['name'];
    $namaSementara = $_FILES['gmbr_ex']['tmp_name'];
    $dirUpload = "imglandingpage/";

    $uploaded = move_uploaded_file($namaSementara,$dirUpload.$gmbr);
    if($uploaded){
    $sql = "UPDATE `tb_lekskul` set `imgekskul`='$gmbr',`nama_ekskul`='$ekskul' where `idekskul`='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    // var_dump($result);
    $_SESSION['update'] = 'Data Berhasil diubah';
    echo "<script>document.location='m_extra.php';</script>";
    }else{
    $_SESSION['error'] = 'Data Gagal Disimpan';
    echo "<script>document.location='m_extra.php';</script>";
    }
}

function deleteekskul($id)
{
    $db = koneksi();
    $sql = "DELETE FROM tb_lekskul where idekskul='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    $_SESSION['delete'] = 'Data Berhasil di hapus';
    // return header('location:form_cover.php');
    echo "<script>document.location='../m_extra.php';</script>";
}

function tambahfooter($data)
{
    $db = koneksi();
    $alamat = $data['alamat'];
    $email = $data['email'];
    $no = $data['no'];
        $sql = "INSERT into tb_lfooter values ('','$alamat','$email','$no')";
        $data1 = $db->prepare($sql);
        $data1->execute();
        $_SESSION['sukses'] = 'Data Berhasil di tambah';
        echo "<script>document.location='m_footer.php';</script>";
}

function editfooter($data)
{
    $db = koneksi();
    $id = $data['id'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $no = $data['no'];
    $sql = "UPDATE `tb_lfooter` set `alamat`='$alamat',`email`='$email', `no`='$no' where `idf`='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    if($result){
    $_SESSION['update'] = 'Data Berhasil diubah';
    echo "<script>document.location='m_footer.php';</script>";
    }else{
    $_SESSION['error'] = 'Data Gagal Disimpan';
    echo "<script>document.location='m_footer.php';</script>";
    }
}

function deletefooter($id)
{
    $db = koneksi();
    $sql = "DELETE FROM tb_lfooter where idf='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    $_SESSION['delete'] = 'Data Berhasil di hapus';
    // return header('location:form_cover.php');
    echo "<script>document.location='../m_footer.php';</script>";
}
?>