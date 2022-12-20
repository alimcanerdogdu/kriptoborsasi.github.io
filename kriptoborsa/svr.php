
<?php

@$baglanti= new mysqli("localhost","root","","login");
   if($baglanti->connect_error)
   {
       
      echo $baglanti->connect_error." hatası oluştu";
      exit;
   }


$baglanti->set_charset("utf8");
?>

<?php
session_start(); 
include("inc/vt.php");


if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    header("location:index.php");
} 
else if (isset($_COOKIE["cerez"])) {
    
    $sorgu = $baglanti->query("select kadi from kullanicilar");

   
    while ($sonuc = $sorgu->fetch_assoc()) {
       
        if ($_COOKIE["cerez"] == md5("aa" . $sonuc['kadi'] . "bb")) {

           
            $_SESSION["Oturum"] = "6789";
            $_SESSION["kadi"] = $sonuc['kadi'];

           
            header("location:index.php");
        }
    }
}

if ($_POST) {
    $txtKadi = $_POST["txtKadi"];
    $txtParola = $_POST["txtParola"]; 
}
?>

