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

    


    $Kiralanan=$_SESSION['Oda_Adı'];
    $giris2="UPDATE user SET kullanıcı_yeni_oda='$Kiralanan' where id='$Kullanıcı_ID'";
    $sorgu2=$VeritabaniBaglantisi->query($giris2);
    
    echo 'Kullanıcı adı:'. $key['Kullanıcı_adı'].' için'."<br>";
    echo $Kiralanan."  oda başarı ile kiralanmıştır"."<br>";
    echo 'BİRAZ SONRA YÖNLENDİRİLECEKSİNİZ';
    Yonlendir("find.php",5);
    

    function Yonlendir($url,$zaman = 0){
        if($zaman != 0){
        header("Refresh: $zaman; url=$url");
        }
        else header("Location: $url");
        }

        
    /*
        Hocam burada otomatik mail fonksiyonunu kullandık.
        Fakat bazı kaynaklar bize bu fonksiyonun sadece mamp pro ile çalıştığını söyledi.
        Bundan dolayı yorum satırında yaptık
                */
        
        
/*
        $kadi=$key["Kullanıcı_adı"];
        $ksoyadi=$key['kullanıcı_soyadı'];
        $gelen_mail=$key['kullanıcı_mail'];
        $kiralanan_oda=$key['kullanıcı_yeni_oda'];
        
            if (isset($_POST["email"])){
        
                $kime = "$gelen_mail";
                $konu = $_POST["Kiralana Oda"];
        
                $mesaj = "<h1>".$_POST[$kiralanan_oda]."</h1>";
                $baslik = "From: ".$_POST[$kadi]."<".$_POST[$gelen_mail].">\r\n";
                $baslik .= "Content-type: text/html\r\n";
        
        
                if(mail($kime,$konu,$mesaj,$baslik))
                    echo "Malesef emailiniz gonderilemedi.";
                else
                    echo "Emailiniz basariyla gonderilmistir.";
            }
*/


?>















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style> 


h1{


text-align: center;


}

form{

border: 1px solid #777;
margin: 50px auto;
width: 400px;
padding:30px 50px;


}


input{

    width:100%
    padding-left:10px
    margin-top:10px;
    border-radius:5px;
    box-sizing:border-box;

}

textarea{

width:100%;
padding:10px;
margin-top:10px;
border-radius:5px;
border-color:#888;


}

button{


background-color:mediumseagreen;
color: #fff;
width:100%;
line-height:35px;
font-size:17px;


}








</style>




</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input name="email" type="text" placeholder="E-posta adresi"> <br>
    <button type="submit">Kirala</button>
</form>
    
</body>
</html>