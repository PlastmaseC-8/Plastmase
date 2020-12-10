<?php

include './conf/koneksi.php';
$q = $koneksi->query("ALTER TABLE departemen
ADD CONSTRAINT departemen_pegawai_id_manajer FOREIGN KEY (id_manager) REFERENCES pegawai (id_pegawai)");

if ($q){
	echo "bisa";
}else{
	echo "gagal";
}

$q2 = $koneksi->query("ALTER TABLE pegawai
ADD code_departemen INT(11) UNSIGNED DEFAULT NULL");

if ($q2){
	echo "bisa";
}else{
	echo "gagal";
}

$koneksi->close();
?>