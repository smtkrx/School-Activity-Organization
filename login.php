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


$gelenMail=$_REQUEST['Kul_email'];
$gelenSifre=$_REQUEST['Kul_sifre'];

$giris="select * from user  where kullanıcı_mail='$gelenMail' and  kullancı_sifre='$gelenSifre'";
$sorgu=$VeritabaniBaglantisi->query($giris);



if($sorgu){
    foreach($sorgu as $satır){
        if($satır['Kullanıcı_type']==0){
            $_SESSION["id"]= $satır['id'];
        echo 'Hoşgeldiniz..';
        echo"<br>";
        echo "<b>".$satır['Kullanıcı_adı']."</b>"."<br>";
        echo "Başarılı bir şekilde giriş yapıldı."."<br>";
        echo "Biraz sonra yönlendirileceksiniz"."<br>";
        Yonlendir("find.php",5); 
        }
        else{
            echo "Hoşgeldin ADMİN !";
            echo "Biraz sonra yönlendirileceksiniz"."<br>";
            Yonlendir("Admin\admin.php",5);
        }
        
    }
}
else{
    echo "Girilen bilgiler hatalı tekrar deneyin";
}



function Yonlendir($url,$zaman = 0){
    if($zaman != 0){
    header("Refresh: $zaman; url=$url");
    }
    else header("Location: $url");
    }

    
    
    
    
    







?>