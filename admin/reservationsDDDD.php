<!doctype html>
<html lang="tr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="robots" content="all, index, follow" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <title>Admin Page</title>

  </head>
  <body style="background-color: #f1f1f1;">



  <?php

$VeritabaniHostAdresi		=	"localhost";
$VeritabaniKullaniciAdi		=	"root";
$VeritabaniSifresi			=	"";
$VeritabaniAdi				=	"rooms";

try{
$VeritabaniBaglantisi		=	new PDO("mysql:host=$VeritabaniHostAdresi;dbname=$VeritabaniAdi;charset=UTF8", $VeritabaniKullaniciAdi, $VeritabaniSifresi);
}
catch(PDOException $e){
    echo $e->getMessage();
}

$Sorgu		=	$VeritabaniBaglantisi->query("SELECT * FROM rooms");
		if($Sorgu){
      foreach($Sorgu as $satır){

        echo "<table border='1' width='200px' height='50px' padding='5px' >";
        echo "<tr>";
        echo "<th>Room_Name</th>";
        echo "<th>Room_Cap</th>";
        echo "<th>Room_Text</th>";
        echo "<th>Room_Projector</th>";
        echo "<th>Room_Microphone</th>";
        echo "<th>Room_Sound_System</th>";
        echo "<th>Use_Type</th>";
        echo "<th>Room_Durumu</th>";
        echo "<th>Start_Time</th>";
        echo "<th>Finis_Time</th>";
        echo "<th>Düzenle</th>";
        echo "</tr>";
        $Room_Name=$satır['Room_Name'];
        $Room_Cap=$satır['Room_Cap'];
        $Room_Text=$satır['Room_Text'];
        $Room_Projector=$satır['Room_Projector'];
        $Room_Microphone=$satır['Room_Microphone'];
        $Room_Sound_System=$satır['Room_Sound_System'];
        $Use_Type=$satır['Use_Type'];
        $Room_Durumu=$satır['Room_Durumu'];
        $Start_Time=$satır['Start_Time'];
        $Finis_Time=$satır['Finis_Time'];

          
        
           echo "<tr>";
           echo "<td>$Room_Name</td>";
           echo "<td>$Room_Cap</td>";
           echo "<td>$Room_Text</td>";
           echo "<td>$Room_Projector</td>";
           echo "<td>$Room_Microphone</td>";
           echo "<td>$Room_Sound_System</td>";
           echo "<td>$Use_Type</td>";
           echo "<td>$Room_Durumu</td>";
           echo "<td>$Start_Time</td>";
           echo "<td>$Finis_Time</td>";
           echo "<td>$Details</td>";
           
           echo "</tr>";
        
        echo "</table>";




      }
			
		}else{
			echo "Sorgu Hatası";
		}



?>






 
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>