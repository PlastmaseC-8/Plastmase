<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>List Data User Plastmase</title>
	<link href="register.css" rel="stylesheet"/>
</head>
<body>
		<div class="tb">
			<table width="500">
				<tr>
        			<td>Fullname</td>
					<td>Email</td>
					<td>Password</td>
					<td>Confirm Password</td>
    			</tr>

	<?php
	$file_handle = fopen("user.txt", "r+");

	while (!feof($file_handle) ) {
    	$line_of_text = fgets($file_handle);
    	$parts = explode(':', $line_of_text); echo "<tr>";
		
		foreach($parts as $p){
			echo "<td>".$p."</td>";
		} echo "</tr>";
	}
	
	fclose($file_handle);
	?>

		</div>
</body>