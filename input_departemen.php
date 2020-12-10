<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

include 'conf/koneksi.php';
$getDept = $koneksi->query("SELECT code_departemen FROM departemen ORDER BY code_departemen DESC LIMIT 1")->fetch_assoc();
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
			<a href="index.php"><button class="btn btn-menu">Beranda</button></a> | <a href="input_pegawai.php"><button class="btn btn-menu">Tambah Pegawai</button></a>
			<br/>
			<h2>Add Donate</h2>
			<hr/><br/>
			<form action="" method="POST">
				<label for="namadept">Departemen Name</label><br/>
				<input type="text" id="namadept" class="input-text" name="namadept" placeholder="Masukkan nama departemen"/><br/><br/>
				<label for="manajer">Pilih Manager</label><br/>
				<?php
					$q = $koneksi->query("SELECT id_pegawai, CONCAT(first_name, ' ', last_name) as nama from pegawai");
					echo "<select name=\"manajer\" class=\"input-text\">";
					
					while($rows = $q->fetch_assoc()){
						if ($koneksi->query("SELECT * from departemen where id_manager='".$rows['id_pegawai']."'")->num_rows == 0){
							echo "<option value=\"".$rows['id_pegawai']."\">".$rows['nama']."</option>";
						}
					}
					
					echo "</select>";
				?>
				<br/><br/>
				<input type="submit" name="submit" value="Add Departemen" class="btn btn-masuk"/>
				
			</form>
			<br/>
			<?php
				if (isset($_POST['submit'])){
					$add = $koneksi->query("INSERT INTO departemen (code_departemen, name_departemen, id_manager,start_date_manager) values ('".($getDept['code_departemen']+10)."', '".$_POST['namadept']."', '".$_POST['manajer']."', '".date("yy-m-d")."')");
					if($add){
						$koneksi->query("UPDATE pegawai SET code_departemen='".($getDept['code_departemen']+10)."' WHERE id_pegawai='".$_POST['manajer']."'");
						echo "<font color=\"green\">Success added department</font";
					}else{
						echo "<font color=\"red\">Failed added department</font";
					}
				}
			?>
		</center>
	</body>
</html>