<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

include 'conf/koneksi.php';
if (empty($_GET['id']) or empty($_GET['type'])){
	header('location: index.php');
}else{
	?>
	<html>
	<head>
		<title>Input Departemen - SDM Perusahaan</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body><br/>
		<center>
			<h1>Data SDM Perusahaan</h1>
			<hr/>
			<br/>
			<a href="index.php"><button class="btn btn-menu">Beranda</button></a> <a href="input_departemen.php"><button class="btn btn-menu">Tambah Departemen</button></a> <a href="input_pegawai.php"><button class="btn btn-menu">Tambah Pegawai</button></a>
			<br/>
	<?php
	if($_GET['type'] == "dept"){
		if ($koneksi->query("SELECT * from departemen where code_departemen='".$_GET['id']."'")->num_rows == 0){
			header('location: index.php');
		}else{
			$getDeptData = $koneksi->query("SELECT * from departemen where code_departemen='".$_GET['id']."'")->fetch_assoc();

	?>
	<h2>Ubah Departemen</h2>
			<hr/><br/>
			<form action="" method="POST">
				<label for="namadept">Nama Departemen</label><br/>
				<input type="text" id="namadept" class="input-text" name="namadept" value="<?= $getDeptData['name_departemen']; ?>" placeholder="<?= $getDeptData['name_departemen']; ?>"/><br/><br/>
				<label for="manajer">Pilih Manajer</label><br/>
				<?php
					$q = $koneksi->query("SELECT id_pegawai, CONCAT(first_name, ' ', last_name) as nama from pegawai");
					echo "<select name=\"manajer\" class=\"input-text\">";
					
					echo "<option value=\"".$koneksi->query("SELECT id_pegawai FROM pegawai where id_pegawai='".$getDeptData['id_manager']."'")->fetch_assoc()['id_pegawai']."\">".$koneksi->query("SELECT CONCAT(first_name, ' ', last_name) as nama FROM pegawai where id_pegawai='".$getDeptData['id_manager']."'")->fetch_assoc()['nama']."</option>";
					while($rows = $q->fetch_assoc()){
						if ($koneksi->query("SELECT * from departemen where id_manager='".$rows['id_pegawai']."'")->num_rows == 0){
							echo "<option value=\"".$rows['id_pegawai']."\">".$rows['nama']."</option>";
						}
					}
					
					echo "</select>";
				?>
				<br/><br/>
				<input type="submit" name="submit-dept" value="Ubah Departemen" class="btn btn-masuk"/>
				
			</form>
			<br/>
			<?php
				if (isset($_POST['submit-dept'])){
					$add = $koneksi->query("UPDATE departemen SET name_departemen='".$_POST['namadept']."' WHERE code_departemen='".$_GET['id']."'");
					if($add){
						if ($getDeptData['id_manager'] != $_POST['manajer']){
							$koneksi->query("UPDATE departemen SET id_manager='".$_POST['manajer']."' WHERE code_departemen='".$_GET['id']."'");
							$koneksi->query("UPDATE pegawai SET code_departemen='".$_GET['id']."' WHERE id_pegawai='".$_POST['manajer']."'");
							header("Refresh:2");
							echo "<font color=\"green\">Sukses mengubah departemen</font>";
						}
					}else{
						echo "<font color=\"red\">Gagal mengubah departemen</font>";
					}
				}
		}
	}else if($_GET['type'] == "pegawai"){
		if ($koneksi->query("SELECT * from pegawai where id_pegawai='".$_GET['id']."'")->num_rows == 0){
			header('location: index.php');
		}else{
			$getPegawaiData = $koneksi->query("SELECT * from pegawai where id_pegawai='".$_GET['id']."'")->fetch_assoc();

			?>
			<h2>Ubah Pegawai</h2>
			<hr/><br/>
			<form action="" method="POST">
				<label for="firstname">First Name</label><br/>
				<input type="text" id="firstname" class="input-text" name="namadepan" value="<?= $getPegawaiData['first_name']; ?>"/><br/><br/>
				<label for="lastname">Last Name</label><br/>
				<input type="text" id="lastname" class="input-text" name="nama_belakang" value="<?= $getPegawaiData['last_name']; ?>"/><br/><br/>
				<label for="tgl">Tanggal Lahir</label><br/>
				<input type="date" id="tgl" class="input-text" value="<?= $getPegawaiData['birth_date']; ?>" name="tgl"/><br/><br/>
				<label for="gender">Jenis Kelamin</label><br/>
				<?php 
				if ($getPegawaiData['jenis_kelamin'] == 'p'){
					echo "<input type=\"radio\" id=\"gender\" value=\"p\" name=\"gender\" checked/> Male<br/>";
					echo "<input type=\"radio\" id=\"gender\" value=\"w\" name=\"gender\"/> Female<br/>";
				}else{
					echo "<input type=\"radio\" id=\"gender\" value=\"p\" name=\"gender\" /> Male<br/>";
					echo "<input type=\"radio\" id=\"gender\" value=\"w\" name=\"gender\" checked/> Female<br/>";
				}
				?>
				<br/>
				<label for="alamat">Alamat</label><br/>
				<textarea style="height:80px;" placeholder="Masukkan Alamat" class="input-text" name="alamat"><?= $getPegawaiData['alamat']; ?></textarea><br/><br/>
				<label for="gaji">Gaji</label><br/>
				<input type="number" id="gaji" class="input-text" name="gaji" value="<?= $getPegawaiData['salary']; ?>"/><br/><br/>
				<label for="dept">Departemen</label><br/>
				<?php
					$q = $koneksi->query("SELECT code_departemen, name_departemen from departemen where code_departemen != '".$getPegawaiData['code_departemen']."'");
					echo "<select name=\"dept\" class=\"input-text\">";
					
					echo "<option value=\"".$koneksi->query("SELECT code_departemen FROM departemen where code_departemen='".$getPegawaiData['kode_departemen']."'")->fetch_assoc()['kode_departemen']."\">".$koneksi->query("SELECT name_departemen FROM departemen where code_departemen='".$getPegawaiData['code_departemen']."'")->fetch_assoc()['name_departemen']."</option>";
					while($rows = $q->fetch_assoc()){
						echo "<option value=\"".$rows['code_departemen']."\">".$rows['name_departemen']."</option>";
					}
					
					echo "</select>";
				?>
				<br/><br/>
				<input type="submit" name="submit-pegawai" value="Ubah Pegawai" class="btn btn-masuk"/>
				
			</form>
			<br/>
			<?php
				if (isset($_POST['submit-pegawai'])){
					$add = $koneksi->query("UPDATE pegawai SET first_name='".$_POST['namadepan']."', last_name='".$_POST['last_name']."', birth_date='".$_POST['tgl']."', gender='".$_POST['gender']."', address='".$_POST['alamat']."', salary='".$_POST['gaji']."', code_departemen='".$_POST['dept']."' WHERE id_pegawai='".$_GET['id']."'");
					if($add){
						if ($getPegawaiData['code_departemen'] != $_POST['dept'] && $koneksi->query("SELECT * FROM departemen where id_manager='".$getPegawaiData['id_pegawai']."'")->num_rows != 0){
							echo "<font color=\"red\">Gagal merubah pegawai. Karena manajer departemen tidak dapat kosong.</font>";
							exit();
						}else{
							echo "<font color=\"green\">Berhasil merubah pegawai.</font>";
							header("Refresh:2");
						}
					}else{
						echo "<font color=\"red\">Gagal merubah pegawai</font>";
					}
				}
		}
	}else{
		header('location: index.php');
	}
}
?>
			
		</center>
	</body>
</html>