<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="google-signin-client_id" content="787952971609-as4nmqjonpbivvnl49ouf980sog497fi.apps.googleusercontent.com">
    <title>Login Pegawai</title>
    <link rel="icon" href="file/logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/login.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
</head>
<body>
  <br/>
  <br/>
  <table class="container">
  <form action="" method="post">
        <tr>
           <td class="textcolor">
                <img class="center" src="file/logo.png" alt="Logo AMGM">
                Username<br>
                <input id="username" type="text" name="user" required/>
                Password<br>
                <input id="password" type="password" name="pass" required/><br>
            </td>
        </tr>
        <tr align="center">
            <td class="btn">
                <input class="text" align="center" type="submit" name="login" value="MASUK">
            </td>
        </tr>
      </form>
        <?php
          if (isset($_POST['login']))
          {
            $ambil = $koneksi->query("SELECT * FROM pegawai WHERE username='$_POST[user]' AND password ='$_POST[pass]'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok==1) {
              $_SESSION['pegawai']=$ambil-> fetch_assoc();
              echo "<script>alert('anda sukses login');</script>";
               echo "<meta http-equiv='refresh' content='1;url=cek_sample.php'>";
            } else {
              echo "<div class='alert alert-danger'>Login gagal</div>";
               echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
          }
        ?>  
  </table>
</body>
</html>    