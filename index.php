<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Plastmase</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<?php
  if(isset($_POST['register'])){
    $user = $_POST['fullname'].":".$_POST['email'].":".$_POST['password'].":".$_POST['passwordConfirm'];
    $openfile = fopen("user.txt","a+");
      fwrite($openfile,"\n".$user);
      fclose($openfile);
      echo "<font>Successfully save your data</font>";
  }
  ?>

<form action="Utama.html" class="register" method="POST" name="form" onsubmit="return validated()">
      <h1>Register</h1>
      <div class="field"><input type="text" placeholder="Fullname" id="fullname" name="fullname"></div>
      <div id="fullname_error">Please fill up your Fullname</div>
      <div class="field"><input autocomplete="on" type="text" placeholder="Email" name="email"></div>
      <div id="email_error">Please fill up your Email</div>
      <div class="field"><input type="password" placeholder="Password" id="password" name="password"></div>
      <div id="pass_error">Please fill up your Password</div>
      <div class="field"><input type="password" placeholder="Password Confirmation" id="passwordConfirm"></div>
      <div class="submit"><input type="submit" value="Register" id="register-form-submit"></div>
      <span class="old-member">Already a member?  <a href="login.html" class="masuk">Login</a></span>
      <div class="social-icons">
        <img src="google.jpg">
        <img src="facebook.png">
        <img src="apple.png">
      </div>
      <div class="footer"><span>Copyright © 2020 Plastmase All rights reserved.</span> <a href="terms.html" class="terms">Terms & Conditions</a></div>
    </form>
    <div class="submit">
    <a href="see_data.php"><button class="button">Check Other Data</button></a>
  </div>
</body>
<script type="text/javascript" src="register.js"></script>
</html>
