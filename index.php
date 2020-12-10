<?php
include 'conf/koneksi.php';
?>
<html>
	<head>
		<title>SDM Donatur di Perusahaan Plastmase</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body><br/>
		<center>
			<h1>Hello! This is Data SDM as User in Plastmase</h1>
			<hr/>
			<br/>
			<a href="input_departemen.php"><button class="btn btn-menu">Add to donate plastmase</button></a> <a href="input_pegawai.php"><button class="btn btn-menu">Add User</button></a>
			<br/>
			<h2>DONATE</h2>
			<div style="width:80%">
			<table>
			  <tr>
				<th>#</th>
				<th>Name</th>
				<th>Thing to Donate</th>
				<th>Start Date</th>
				<th>Action</th>
			  </tr>
				<?php
					$q = $koneksi->query("SELECT * FROM departemen");
					while($row = $q -> fetch_assoc()){
						echo "<tr>";
						echo "<td>".$row['code_departemen']."</td>";
						echo "<td>".$row['name_departemen']."</td>";
						$q2 = $koneksi->query("SELECT CONCAT(fisrt_name, ' ', last_name) as nama FROM pegawai where id_pegawai='".$row['id_manager']."' ORDER BY id_pegawai DESC LIMIT 1")->fetch_assoc();
						echo "<td>".$q2['name']."</td>";
						echo "<td>".$row['start_date_manajer']."</td>";
						echo "<td><a href=\"ubah.php?id=".$row['kode_departemen']."&type=dept\"><button class=\"btn btn-ubah\">Ubah</button></a> | <button onclick=\"confirmDelete('d', ".$row['code_departemen'].")\" class=\"btn btn-warn\">Hapus</button</td>";
						echo "</tr>";
					}
				?>
			</table>
			</div>
			<h2>Pegawai</h2>
			<table>
			  <tr>
				<th>#</th>
				<th>Name Pegawai</th>
				<th>Birth Date</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Salary</th>
				<th>Departemen</th>
				<th>Aksi</th>
			  </tr>
				<?php
					$q = $koneksi->query("SELECT * FROM pegawai");
					while($row = $q->fetch_assoc()){
						echo "<tr>";
						echo "<td>".$row['id_pegawai']."</td>";
						echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
						echo "<td>".$row['birth_date']."</td>";
						if ($row['gender'] == 'p'){
							echo "<td>Male</td>";
						}else{
							echo "<td>Female</td>";
						}
						echo "<td>".$row['address']."</td>";
						echo "<td>".$row['salary']."</td>";
						$q2 = $koneksi->query("SELECT nama_departemen FROM departemen where code_departemen='".$row['code_departemen']."' ORDER BY code_departemen DESC LIMIT 1")->fetch_assoc();
						echo "<td>".$q2['nama_departemen']."</td>";
						echo "<td><a href=\"ubah.php?id=".$row['id_pegawai']."&type=pegawai\"><button class=\"btn btn-ubah\">Ubah</button></a> | <button onclick=\"confirmDelete('p', ".$row['id_pegawai'].")\" class=\"btn btn-warn\">Hapus</button</td>";
						echo "</tr>";
					}
				?>
			</table>
			<hr/>
		</center>
		<script type="text/javascript">
		function confirmDelete(p, id){
			if (p == 'p'){
				var c = confirm("Are you sure you want to delete employees?");
				if (c === true){
					var httpc = new XMLHttpRequest(); 
					httpc.responseType='json';
					var url = "delete.php?t=p&id="+id;
					httpc.open("GET", url, true); 

					httpc.onreadystatechange = function() {
						if(httpc.readyState == 4 && httpc.status == 200) { 
							if (httpc.response.status == "success"){
								alert("Deleted successfully!");
								location.reload();

							}else{
								alert("Failed to delete! Reason: "+httpc.response.response);
							}								
						}
					};
					httpc.send();
				}
			}else{
				var c = confirm("Are you sure you want to delete departemen?");
				if (c === true){
					var httpc = new XMLHttpRequest(); 
					httpc.responseType='json';
					var url = "delete.php?t=d&id="+id;
					httpc.open("GET", url, true); 

					httpc.onreadystatechange = function() {
						if(httpc.readyState == 4 && httpc.status == 200) { 
							if (httpc.response.status == "success"){
								alert("Deleted successfully!");
								location.reload();

							}else{
								alert("Failed to delete! Reason: "+httpc.response.response);
							}								
						}
					};
					httpc.send();
				}
			}
		}
		</script>
	</body>
</html>