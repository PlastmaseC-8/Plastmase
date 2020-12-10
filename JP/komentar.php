<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Komentar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="simpan.php" method="POST">
		<div class="komentar">
			<div class="komen">
			<div class="isikomen">		
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nama" required=""></td>
			</tr>

			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="Email" name="email"></td>
			</tr>

			<tr>
							<td>Komentar</td>
							<td>:</td>
							<td><textarea name="komentar" required=""></textarea></td>
						</tr>

			</tr>
			<tr>
				
				<td>
					<button type="submit" name="kirim">Kirim</button>
					
				</td>
			</tr>
</div>
</div>
</div>
</div>	
	</form>
</fieldset>
</body>
</html>