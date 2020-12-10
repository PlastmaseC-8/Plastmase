<?php

include 'conf/koneksi.php';

$register = $koneksi->query("CREATE TABLE register (
	fullname VARCHAR(8),
	email VARCHAR(8),
	password VARCHAR(8),
	confirmPassword VARCHAR(8),
	)");

if ($register){
	echo "successfully created register table";
} else{
	echo "failed created register table";
}

$koneksi->close();

?>