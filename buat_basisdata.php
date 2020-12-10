<?php

include './conf/koneksi.php';
$q = $koneksi->query("CREATE DATABASE plastmase");
if ($q){
	echo "Sukses";
} else{
	echo "Gagal";
}

$koneksi->close();

?>