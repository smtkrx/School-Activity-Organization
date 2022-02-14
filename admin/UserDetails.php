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
} ?>

<form method="post">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <center>

  <div class="form-group col-md-4">
      <label for="inputUserName">Enter ID information of the room whose information will be changed</label>
      <input type="text" class="form-control" id="inputUserName" placeholder="User İd" name='id'>
    </div>


    <div class="form-group col-md-4">
      <label for="inputUserName">User Name</label>
      <input type="text" class="form-control" id="inputUserName" placeholder="User Name" name='New_Name'>
    </div>
    <div class="form-group col-md-4">
      <label for="inputUserSecondName">User  Surname</label>
      <input type="text" class="form-control" id="inputUserSecondName" placeholder="User Surname" name='New_Surname'>
    </div>
  <div class="form-group col-md-4">
    <label for="inputRoomText">User Mail</label>
    <input type="mail" class="form-control" id="inputUserMail" placeholder="Mail" name='New_Mail'>
  </div>
  <div class="form-group col-md-4">
    <label for="RoomUserPhone">User Mobile Phone</label>
    <input type="text" class="form-control" id="inputUserPhone" placeholder="Phone" name='New_Phone'>
  </div>
  
    <div class="form-group col-md-4">
      <label for="UserPassword">Password</label>
      <input type="password" class="form-control" id="inputPassword"name='New_Password'>
   </div>
	
    
     <div class="form-group col-md-4">
      <label for="userType">User Type</label>
      <select id="inputType" class="form-control" name='type'>
        <option selected value='0'>User</option>
		<option value='1'>Admin</option>
      </select>
    </div>
  <div class="form-group">
    
  </div>

  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#Modal">Save changes</button>
</form>




<?php


$giris="select * from user  where kullanıcı_mail='$gelenMail' and  kullancı_sifre='$gelenSifre'";
$sorgu=$VeritabaniBaglantisi->query($giris);



if($sorgu){
    foreach($sorgu as $satır){
          echo "<pre>";
          print_r($satır);
          echo "<\pre>";
        }
      }
else{
  echo 'gsdgsdgs';
}



    

     $gelen_id              =$_REQUEST['id'];  
     $New_User_Name         =$_REQUEST['New_Name'];
     $New_User_Surname      =$_REQUEST['New_Surname'];
     $New_User_Mail         =$_REQUEST['New_Mail'];
     $New_User_Phone        =$_REQUEST['New_Phone'];
     $New_User_Pass         =$_REQUEST['New_Password'];
     $New_User_Type         =$_REQUEST['type'];

     
    $giris="UPDATE user SET Kullanıcı_adı='$New_User_Name' where id='$gelen_id'";
    $sorgu=$VeritabaniBaglantisi->query($giris);
   
    $giris="UPDATE user SET kullanıcı_soyadı='$New_User_Surname' where id='$gelen_id'";
    $sorgu=$VeritabaniBaglantisi->query($giris);

    $giris="UPDATE user SET kullanıcı_mail='$New_User_Mail' where id='$gelen_id'";
    $sorgu=$VeritabaniBaglantisi->query($giris);

    $giris="UPDATE user SET kullanıcı_telefon='$New_User_Phone' where id='$gelen_id'";
    $sorgu=$VeritabaniBaglantisi->query($giris);

    $giris="UPDATE user SET kullancı_sifre='$New_User_Pass' where id='$gelen_id'";
    $sorgu=$VeritabaniBaglantisi->query($giris);

    $giris="UPDATE user SET Kullanıcı_type='$New_User_Type' where id='$gelen_id'";
    $sorgu=$VeritabaniBaglantisi->query($giris);

    ?>











<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="button" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="button">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Succesfully Changed
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
</center>  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
