<?php
session_start();



$VeritabaniHostAdresi		=	"localhost";
$VeritabaniKullaniciAdi		=	"root";
$VeritabaniSifresi			=	"root";
$VeritabaniAdi				=	"test";

try{
$VeritabaniBaglantisi		=	new PDO("mysql:host=$VeritabaniHostAdresi;dbname=$VeritabaniAdi;charset=UTF8", $VeritabaniKullaniciAdi, $VeritabaniSifresi);
}
catch(PDOException $e){
    echo $e->getMessage();
}

$Kullanıcı_ID=$_SESSION['id'];

$giris="select * from user  where id='$Kullanıcı_ID'";
$sorgu=$VeritabaniBaglantisi->query($giris);

if($sorgu){
    foreach ($sorgu as $key) {
   
}
}
$eski_oda=$key['kullanıcı_yeni_oda'];
$delete=null;

$giris="UPDATE user SET kullanıcı_eski_oda='$eski_oda' where id='$Kullanıcı_ID'";
$sorgu=$VeritabaniBaglantisi->query($giris);

$giris2="UPDATE user SET kullanıcı_yeni_oda='$delete' where id='$Kullanıcı_ID'";
$sorgu2=$VeritabaniBaglantisi->query($giris2);

if($sorgu2){
    echo 'Kullanıcı adı: '. $key['Kullanıcı_adı'].'   için'."<br>";
    echo $Kiralanan."  oda başarı ile iptal edilmiştir"."<br>";
    echo 'BİRAZ SONRA YÖNLENDİRİLECEKSİNİZ';
    Yonlendir("find.php",5);
}
else{
    echo 'bir sorun oldu ';
}



function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }

?>