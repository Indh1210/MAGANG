<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>  
<head>
<meta name="google-signin-client_id" content="787952971609-as4nmqjonpbivvnl49ouf980sog497fi.apps.googleusercontent.com">
    <title>Laboratorium AMGM</title>
    <link rel="icon" href="file/logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/splash.css"> 
</head>
<body>
  <br/>
  <br/>
  <table class="container">
        <tr>
           <td class="textcolor">
                <img class="center" src="file/logo.png" alt="Logo AMGM">
                <h2>SELAMAT DATANG</h2><br>
                <?php
                header('refresh:5;url=login.php');
                ?>
            </td>
        </tr>
  </table>
</body>
</html>    