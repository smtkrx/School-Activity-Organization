<?php


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




 $kullanıcı_adı       =$_REQUEST['name'];
 $kullanıcı_soyad     =$_REQUEST['surname'];
 $kullanıcı_email     =$_REQUEST['email'];
 $kullanıcı_phone     =$_REQUEST['phone'];
 $kullanıcı_number    =$_REQUEST['password'];
 $kullanıcı  =$_REQUEST['type'];



 $sorgu=$VeritabaniBaglantisi->prepare('INSERT INTO user SET
 Kullanıcı_adı=?,
 kullanıcı_soyadı=?,
 kullanıcı_mail=?,
 kullanıcı_telefon=?,
 kullancı_sifre=?,
 kullanıcı_eski_oda="",
 kullanıcı_yeni_oda="",
 Kullanıcı_type=?
 ');


$ekle=$sorgu->execute([$kullanıcı_adı,$kullanıcı_soyad,$kullanıcı_email,$kullanıcı_phone,$kullanıcı_number,$kullanıcı]);
if($ekle){
    echo 'MERHABA '."<b>".$kullanıcı_adı."</b>".'  ARAMIZA HOŞGELDİN !';
    echo "<br>";
    echo "<br>";
    echo 'KAYIT İŞLEMİ BAŞARILI BİRAZ SONRA YÖNLENDİRİLECEKSİNİZ.'."<br>";
    if($kullanıcı==0){
        Yonlendir("find.php",5);
    }
    else{
        Yonlendir("Admin\admin.php",5);
    }
}
else{
    echo 'Kayıt işlemi başarısız .';
}









function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }

    

?>