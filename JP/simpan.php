<?php 

include "koneksi.php";

if(isset($_POST['kirim'])){
	$nama   = $_POST['nama'];
	$email  = $_POST['email'];
	$komentar  = $_POST['komentar'];
	
;
	$simpan = "INSERT INTO komentar(
	nama, email, komentar) 
	VALUES ('$nama','$email', '$komentar')";

	$disimpan = mysqli_query($conn,$simpan);
 
 	if($disimpan){
 		echo "<script>alert('Data Telah Berhasil Di Simpan');
 		window.location='komentar.php'</script>";
 	}
 	else{
 		echo "Maaf, Data Tidak Tersimpan";
 	}
}

 ?>