<?php
session_start();
include('../inc/koneksi.php');

$sql = "DELETE FROM datasiswa where id='$_GET[id]'";
$data = $db->prepare($sql);
$data->execute();
if($data){
$_SESSION['status'] = 'Data Berhasil dihapus';
header('location:../admin/datasiswa.php');
}else{
$_SESSION['error'] = 'Data gagal dihapus';
header('location:datasiswa.php');
};
?>
