<?php

$api = 'https://api-sekolah-indonesia.herokuapp.com/sekolah?page=1&perPage=5';

// curl_setopt($curl_handle, CURLOPT_URL,'http://###.##.##.##/mp/get?mpsrc=http://mybucket.s3.amazonaws.com/11111.mpg&mpaction=convert format=flv');
$data = json_decode($api, true);

$data1 = file_get_contents($data);
var_dump($data1);

?>