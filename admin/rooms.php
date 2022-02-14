<?php
$VeritabaniHostAdresi		=	"localhost";
$VeritabaniKullaniciAdi		=	"root";
$VeritabaniSifresi			=	"root";
$VeritabaniAdi				=	"room";

try{
$VeritabaniBaglantisi		=	new PDO("mysql:host=$VeritabaniHostAdresi;dbname=$VeritabaniAdi;charset=UTF8", $VeritabaniKullaniciAdi, $VeritabaniSifresi);
}
catch(PDOException $e){
    echo $e->getMessage();
}






    $gelen_Name   = $_REQUEST['Room_Name'];
    $gelen_capacity=$_REQUEST['Room_Capacity'];
    $gelen_text=$_REQUEST['Room_textarea'];
    $gelen_Projector=$_REQUEST['Room_Elements1'];
    $gelen_Microphone=$_REQUEST['Room_Elements2'];
    $gelen_Sound_System=$_REQUEST['Room_Elements3'];
    $gelen_Type=$_REQUEST['Type'];


   
    
    if(isset($gelen_Projector)){
        $gelen_Projector=1;
    }
    else{
        $gelen_Projector=0;
    }
    
    if(isset($gelen_Microphone)){
        $gelen_Microphone=1;
    }
    else{
        $gelen_Microphone=0;
    }

    if(isset($gelen_Sound_System)){
        $gelen_Sound_System=1;
    }
    else{
        $gelen_Sound_System=0;
    }






    
    
    echo $gelen_Name."<br>";
    echo $gelen_capacity."<br>";
    echo $gelen_text."<br>";
    echo $gelen_Projector."<br>";
    echo $gelen_Microphone."<br>";
    echo $gelen_Sound_System."<br>";
     
  

   
 $sorgu=$VeritabaniBaglantisi->prepare('INSERT INTO rooms SET
 Room_Name=?,
 Room_Cap=?,
 Room_Text=?,
 Room_Projector=?,
 Room_Microphone=?,
 Room_Sound_System=?,
 Use_Type=?,
 Room_Durumu="1",
 Start_Time="",
 Finis_Time=""');

$ekle=$sorgu->execute([$gelen_Name,$gelen_capacity,$gelen_text,$gelen_Projector,$gelen_Microphone,$gelen_Sound_System,$gelen_Type]);

if($ekle){
    echo 'eklendi';

    echo "<br>";
    echo 'İŞLEM BAŞARILI BİRAZ SONRA YÖNLENDİRİLECEKSİNİZ.'."<br>";

    function Yonlendir($url,$zaman = 0){
        if($zaman != 0){
        header("Refresh: $zaman; url=$url");
        }
        else header("Location: $url");
        }

        Yonlendir("admin.php",5);

}
else{
    echo "<br>";
    echo 'eklenmedi';
    
}



?>
