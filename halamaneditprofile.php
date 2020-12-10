<!DOCTYPE html>
<html>
<head>
    <title>Plastmase</title>
    <link rel="stylesheet" type="text/css" href="editprofile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="profile.js"></script>
</head>
<body>
    <div class= "profile">
        <div class="header">
            <h1><font face = "Appocalypse">Plastmase</font></h1>
            <div class="menu-atas">
                <ul id="inline">
                    <li><a href="#papan">Board</a></li>
                    <li><a href="halamanprofile.html">Profile</a></li>
                    <li><input type="search" placeholder="Jenis Plastik"></li>
                    <li class="right"><a href="#keluar">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="badan">
            <div class="sidebar">
                <ul>
                    <li><a class= "active" href="#">Edit Profile</a></li>
                    <li><a href="#">Account Setting</a></li>
                    <li><a href="#">Email Notification</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="banner">
                    <img src="Gambar/Lockscreen2.jpg" alt="Header Love Yourself">
                </div>
                <h2>Kim Jisoo / Edit Profile</h2>
                <h3>Yogyakarta</h3>

                <?php
                    if(isset($_POST['simpan'])){
                    $data = $_POST['name']."|".$_POST['loc']."|".$_POST['bio']."|".$_POST['web'];
                    $openfile = fopen("data perubahan profile.txt","a+");
                    fwrite($openfile,"\n".$data);
                    fclose($openfile);
                    echo "<font color=\"white\">Data berhasil disimpan!</font><br/><br/>";
                    }
                ?>        
                <form action="" method="POST">
                    <div class="grid-container">
                        <div class="grid-item1">
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" placeholder="Kim Jisoo"><br>
                        </div>
                        <div class="grid-item2">
                            <img src="Gambar/mba jisoo.png">
                        </div>
                        <div class="grid-item3">
                            <button>Upload New Picture</button><br>
                            <br>
                            <button>Delete</button>
                        </div>
                        <div class="grid-item4">
                            <label for="loc">Location:</label><br>
                            <input type="text" id="loc" name="loc" placeholder="Yogyakarta"><br>
                        </div>
                        <div class="grid-item5">
                            <label for="bio">Bio:</label><br>
                            <input type="text" id="bio" name="bio"><br>
                        </div>
                        <div class="grid-item6">
                            <label for="web">Personal Website:</label><br>
                            <input type="text" id="web" name="web"><br>
                        </div>
                    </div>
                    <div class="simpan">
                        <button>Save</button>
                    </div>
                </form>
                <a href="tabeldatabase.php"><button class="btn btn-menu">Lihat Data</button></a>
            </div>
        </div>
    </div>
    
</body>