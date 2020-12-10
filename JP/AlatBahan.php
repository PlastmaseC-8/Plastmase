
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
  <title>Pengolahan Plastik</title>
 
</head>
<body>
 <div class="SearchBar">            
                  <div class="Menu">
                        <ul>
                              <li><p>Plastmase</p></li>
                              <li><a href="BOARD">BOARD</a></li>              
                              <li><a href="PROFILE">PROFILE</a></li>
                               <input type="text" name="box" placeholder="Jenis Plastik">
                              <li><a href="LOGOUT">LOGOUT</a></li>
                        </ul>
                  </div>
 
  <div class="container">
   
           
      
<div class="Posting">
       <div class="Judul"><h1>Pemanfatan Botol Bekas Menjadi<br> Tempat Pensil Lucu</h1>
         <p> Di Posting Oleh <b>Dini Almira</b></p>
         <p>23 Maret 2021</p>
        </div>
         <div class="Gambar"><img src="TempatPensil.png"></div>
   
    <div class="JenisPlastik">
      </div>
    <fieldset>
      <legend><h1>Tempat Pensil Lucu</h1></legend>

    <div class="IsiPlastik">
     <h2>Alat dan Bahan :</h2>
<p>
  <ul> 
    <li>Botol shampo bekas</li>
    <li>Kertas atau stiker warna</li>
    <li>Gunting, cutter</li>
    <li>Double tip</li>
</ul></p>
   <br>
   <h2>Cara Membuat:</h2>
      <ol type="1">
        <li>Buat pola/bentuk pada botol shampo</li>
        <li>Potong sesuai pola menggunakan cutter/gunting</li>
        <li>Buat tangan pada bagian yang dipotong/tidak digunakan</li>
        <li>Bentuk wajah dan riasan, lalu rekatkan semua bagian dengan lem</li>
        <li>Rekatkan double tip pada bagian belakang tempat pensil</li>
        <li>Selesai</li>
      </ol>

</div>
</fieldset>


<!-- <div class="TampilanGambar">
      <div class="gambar">
        <div class="gambarku">
        Di Posting Oleh <b>Devi Rizki Dwi Ananda</b>
        </div>
          <img src="TempatPensil.png"
          <h1>Tempat Pensil Lucu </h1>
        <hr>
        <p>
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem 
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem 
          Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem Lorem lorem lorem
        </p>        
      <a href="#" class="Selanjutnya">Selengkapnya →</a>
 -->
<h2><strong>Komentar</strong></h2>

<?php 

include "Komentar.php";

?>

<div class="prev-komentar">
            <?php 
            
            $sql = "SELECT * FROM komentar";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($baris = mysqli_fetch_assoc($result)) {

            ?>
            <div class="prev-komentar2">
                <h4><?php echo $baris['nama']; ?></h4>
                <a href="mailto:<?php echo $baris['email']; ?>"><?php echo $baris['email']; ?></a>
                <p><?php echo $baris['komentar']; ?></p>
            </div>
            <?php

                }
            }
            
            ?>
          </div>


</div>
</body>
</html>
