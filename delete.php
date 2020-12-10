<?php
include 'conf/koneksi.php';
if ($_GET['t'] == 'p'){
	if ($koneksi->query("SELECT * FROM register where email='".$_GET['email']."'")->num_rows == 0){
		$q = $koneksi->query("DELETE FROM register where email='".$_GET['email']."'");
		if ($q){
			print_r(json_encode(array("status" => "success", "response" => "none")));
		} else{
			print_r(json_encode(array("status" => "failed", "response" => "none")));
		}
	} else{
		print_r(json_encode(array("status" => "failed", "response" => "the user can't be removed")));
	}
} else{
	$q = $koneksi->query("DELETE FROM register where fullname='".$_GET['fullname']."'");
	if ($q){
		$koneksi->query("UPDATE register SET fullname='' where fullname='".$_GET['fullname']."' ");
		print_r(json_encode(array("status" => "success", "response" => "none")));
	} else{
		print_r(json_encode(array("status" => "failed", "response" => "none")));
	}
}
?>