<?php
include 'conf/koneksi.php';
?>
<html>
	<head>
		<title>Input Pegawai - SDM Perusahaan</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body><br/>
		<center>
			<h1>Data SDM Perusahaan</h1>
			<hr/>
			<br/>
			<a href="index.php"><button class="btn btn-menu">Home</button></a> | <a href="input_departemen.php"><button class="btn btn-menu">Add Donate</button></a>
			<br/>
			<h2>Add User</h2>
			<hr/><br/>
			<form action="" method="POST">
				<label for="firstname">First Name</label><br/>
				<input type="text" id="firstname" class="input-text" name="namadepan" placeholder="Masukkan Depan"/><br/><br/>
				<label for="lastname">Last Name</label><br/>
				<input type="text" id="lastname" class="input-text" name="nama_belakang" placeholder="Masukkan Belakang"/><br/><br/>
				<label for="tgl">Birth Date</label><br/>
				<input type="date" id="tgl" class="input-text" name="tgl"/><br/><br/>
				<label for="gender">Gender</label><br/>
				<input type="radio" id="gender" value="p" name="gender" checked="checked"/> Male<br/>
				<input type="radio" id="gender" value="w" name="gender"/> Female<br/><br/>
				<label for="alamat">Address</label><br/>
				<textarea style="height:80px;" placeholder="Masukkan Alamat" class="input-text" name="alamat"></textarea><br/><br/>
				<label for="gaji">Salary</label><br/>
				<input type="number" id="gaji" class="input-text" name="gaji" placeholder="Masukkan Gaji"/><br/><br/>
				<label for="dept">Departemen</label><br/>
				<?php
					$q = $koneksi->query("SELECT code_departemen, name_departemen from departemen");
					echo "<select name=\"dept\" class=\"input-text\">";
					echo "<option value=\"0\">-- Tanpa Departemen --</option>";
					while($rows = $q->fetch_assoc()){
						echo "<option value=\"".$rows['code_departemen']."\">".$rows['name_departemen']."</option>";
					}
					
					echo "</select>";
				?>
				<br/><br/>
				<input type="submit" name="submit" value="Add Pegawai" class="btn btn-masuk"/>
			</form>
			<br/>
			<?php
				if (isset($_POST['submit'])){
					if ($_POST['dept'] == 0){
						$add = $koneksi->query("INSERT INTO pegawai (first_name, last_name, birth_date, gender, address, salary) values ('".$_POST['namadepan']."', '".$_POST['nama_belakang']."', '".$_POST['tgl']."', '".$_POST['gender']."', '".$_POST['alamat']."', '".$_POST['gaji']."')");
					}else{
						$add = $koneksi->query("INSERT INTO pegawai (nama_depan, nama_belakang, tanggal_lahir, jenis_kelamin, alamat, gaji, kode_departemen) values ('".$_POST['namadepan']."', '".$_POST['nama_belakang']."', '".$_POST['tgl']."', '".$_POST['gender']."', '".$_POST['alamat']."', '".$_POST['gaji']."', '".$_POST['dept']."')");
					}
					if($add){
						echo "<font color=\"green\">Success added employee</font";
					}else{
						echo "<font color=\"red\">Failed added employee</font";
					}
				}
			?>
		</center>
	</body>
</html>