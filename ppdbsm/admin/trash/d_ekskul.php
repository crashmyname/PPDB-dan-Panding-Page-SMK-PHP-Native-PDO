<?php
session_start();
include('../../inc/koneksi.php');
require '../function.php';

$id = $_GET['id'];

    if(deleteekskul($id)>0){
        
    }
    ?>