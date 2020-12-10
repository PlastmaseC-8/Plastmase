<html>
    <head>
        <link rel="stylesheet" type="text/css" href="tampilan.css">
    </head>
    <body>
        <center>
            <h3>Data Perubahan Profile</h3>
            <a href="halamaneditprofile.php"><button class="btn btn-menu">Tambah Data</button></a> <a href="#"><button class="btn btn-menu">Lihat Data</button></a>
        
        <table style="width: 100%">
            <tr>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Bio</th>
                <th>Personal Website</th> 
		  </tr>
		  <?php
                $getData = file_get_contents("data perubahan profile.txt");
                $a = explode("\n", $getData);
                foreach ($a as $b){
                    $c = explode("|", $b);
                    error_reporting(E_ALL & ~E_NOTICE);
                    echo "<tr><td>".$c[0]."</td><td>".$c[1]."</td><td>".$c[2]."</td><td>".$c[3]."</td></tr>";
                }
            ?>
		</table> 
		</center>
    </body>
</html>