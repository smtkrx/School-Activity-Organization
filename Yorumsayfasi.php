<?php

session_start();

$gelen_yorum=$_REQUEST['yorum'];
$yorumlayacak_kullanıcı_adı=$_SESSION['id'];

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



$giris="select * from user  where id='$yorumlayacak_kullanıcı_adı'";
$sorgu=$VeritabaniBaglantisi->query($giris);
if($sorgu){
    foreach($sorgu as $satır){
		
	}
}


$son_oda=$satır['kullanıcı_eski_oda'];


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

$giris2="select * from rooms  where Room_Name='$son_oda'";
$sorgu2=$VeritabaniBaglantisi->query($giris2);

if($sorgu2){
    foreach($sorgu2 as $satır2){
		
	}
}

$giris3="UPDATE rooms SET 	Room_Text='$gelen_yorum' where Room_Name='$son_oda'";
$sorgu3=$VeritabaniBaglantisi->query($giris3);

?>











<!doctype html>
<html>
<head>
	<style type="text/css">			 
		#sent { 
			height: 29px;
			width: 250px;
			background: gold;
			font-size: 15px;
			text-align: center;
			margin-top: 15px;
			margin-left: 3px;
			border: 3px solid black;
			
			
			
		}
		
		#sent:hover{
			height: 35px;
			width: 300px;
			border: 3px solid white;
		}
		
		#yazi {font-size:18px;
				color:gold;}
		 p {font-weight:bold;
			font-style:italic;
			font-size:30px;
			 color:gold;}
		
		.bodypage{
			 background-image:linear-gradient(to left bottom,black,rgba(55,55,55,0.7)),url("img/1_pTY3hMUGYUNa8lHadBybpg.jpg");
			height: 100vh;  /* Çerçeve Görülebilen alanın %95 lik kısmını 
				(tarayıcı için geçerli) Arkaplan için ayarladık.*/
			background-size: cover;
			background-position: top;
			 }

	</style>
	
		<link rel="stylesheet" href="Sign_in.css">
	
<meta charset="utf-8">
	
	
<title>Yorumsayfasi</title>
<script src="https://kit.fontawesome.com/3b17466171.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body class="bodypage">
	
	
	<header class="header">
	<div id="nav">
			<ul id="ust_serit">
				<li><a href="index.html"><i class="fas fa-home"
				></i></a></li>
				<li><a href="https://mebis.medipol.edu.tr/" >Mebis</a></li>
				<li><a href="Contact.html">Contact</a></li>

			</ul> 
		</div>
<center><p>How can we serve you better?</p><br>
	<br>
<form method='post'>

	
		<br/>
		<textarea name="yorum" cols="75" rows="20"/><?php echo $satır['Kullanıcı_adı'];?> :Your comments are important !
		
		</textarea><br/>
	
			 <button type='submit' class="btn" style="border-radius:25px">Yolla</button>
</form>
</center>
</body>	
</html>





