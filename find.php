<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="to-find.css">
	<script src="https://kit.fontawesome.com/3b17466171.js" crossorigin="anonymous"></script>
</head>
	
<body style="height:auto">
	

	<div id="nav">
		
		
			<ul>
				<li><a href="find.php"><i class="fas fa-home"
				></i></a></li>
				<li><a href="https://mebis.medipol.edu.tr/" >Mebis</a></li>
				<li><a href="Contact.html">Contact</a></li>
				<li> <a class="nav-link" style="color:#6747c7; id="active" href="index.html" >Çıkış Yap</a></li>
				
	
					
					
		</ul>
			 
		</div>
	
	<div class="container">
			
		<form action="" method="post">
		
		<div id="to-find-room">

				<div id="info-room">
					
						
				<div class="write">
						
						<p>
						Start Time
						</p>
						<p>
						Finish Time
						</p>
						<p>
						Number of Attendance
						</p>
						
					</div>
						
						<input  type="date"  name="Başlangıç" class="intas"></input> 
						<input  type="date" name="Bitiş" class="intas"></input>
						<input  type="number" name="atandance" class="intas"></input>
						<input type="time" class="" name="start_time"></input>
						<input type="time"  name="finish_start" style="margin-left: 30px;"></input>
							   
							   <div class="select">
						<input type="radio" value="Meeting" name="type">Meeting
				
					  	<input type="radio" value="Exam" name="type">Exam
				
					  	<input type="radio" value="Classroom" name="type">Classroom</div>
					  	
							<button type="submit" value="Find" class="Find">Find </button>
						
					
				
			
						</div>
		
		
		
			
			
			
					</div>
		
</form>
		
<?php
                $connection = mysqli_connect("localhost","root","root");
                $db = mysqli_select_db($connection, 'room');


				$start  			 =$_REQUEST['Başlangıç'];
				$stop   			 =$_REQUEST['Bitiş'];
				$time_start    	 	 =$_REQUEST['start_time'];
				$time_finish     	 =$_REQUEST['finish_start'];
				$kullanıcı_number    =$_REQUEST['atandance'];
				$kullanım_tipi  	 =$_REQUEST['type'];
				




				$query = "SELECT * FROM rooms where Use_Type='$kullanım_tipi' and Room_Cap>$kullanıcı_number AND Room_Durumu=1";
				$query_run = mysqli_query($connection, $query);
				



				
            ?>
	
	
	
</div>

	<div class="botom">
		<div class="card">
		<div  class="card-image">
			<div style="margin-bottom: 25px;" class="card-title">
			Select a Room
				<hr>
				
			</div>
			
			<div class="card-body">
			
				
			<table border="1">
		<thead>
						<tr>	
						<th>Room Name</th>  
						<th> Capacity</th>
						<th> Comments </th>
						<th>Projector</th>
						<th>Microphone</th>
						<th>Sound System</th>
						<th> select </th>
						</tr>
		</thead>
		<?php
                if($query_run)
                {
                    foreach($query_run as $satir)
                    {
						
            ?>
	
					<tbody>
                        <tr>                            
							<td> <?php echo $satir['Room_Name']; ?> </td>
							<td> <?php echo $satir['Room_Cap']; ?> </td>                                                      
							<td> <?php echo $satir['Room_Text']; ?> </td> 
							<td> <?php  if($satir['Room_Projector']==1){echo '✓';}else{echo 'X';}?> </td>                            
						    <td> <?php  if($satir['Room_Microphone']==1){echo '✓';}else{echo 'X';}?> </td>                       
							<td> <?php  if($satir['Room_Sound_System']==1){echo '✓';}else{echo 'X';}?> </td>
														
							
							
							<form action="rent.php"> <td> <button type='submit' class='alert-danger value='TIKLA'>Tıkla</button> </a></td>    
													
								<?php
										
										$_SESSION['Oda_Adı']=null;
										$_SESSION['Oda_Adı']=$satir['Room_Name'];						
																	
																	
																	?>


							</form>                            
                        
                            
                        </tr>
					</tbody>
                    <?php           
								}
							}
							else 
							{
								echo "Ther is no rooms.";
							}
            		?>    
	
	
	</table></div></div></div>
		
		
		

<?php
                $connection2 = mysqli_connect("localhost","root","root");
                $db = mysqli_select_db($connection2, 'test');
						$kullanıcın_id=$_SESSION['id'];
								
						$query2 = "SELECT * FROM user where id='$kullanıcın_id'";
						$query_run2 = mysqli_query($connection2, $query2);
			
            ?>






	<div class="botom">
		<div class="card">
		<div  class="card-image">
			<div style="margin-bottom: 25px;" class="card-title">
			Past Receptions
				<hr>
				
			</div>
			
			<div class="card-body">
			
				
			<table border="1">
		<thead>
						<tr>	
						<th>Room Name</th>  
						<th> Cancel it </th>
						<th>Last Room </th>
						<th> Add Comment</th>
						</tr>
		</thead>
		<?php
                if($query_run2)
                {
                    foreach($query_run2 as $satir2)
                    {
						
            ?>
	
					<tbody>
                        <tr>                            
							<td> <?php echo $satir2['kullanıcı_yeni_oda']; ?> </td>
							<form action="delete.php"> <td> <button type='submit' class='alert-danger value='TIKLA'>Cancel</button> </a></td>    
													
								<?php
										session_start();
										$_SESSION['silinecek_oda']=$satir2['kullanıcı_yeni_oda'];						
																	
																	
																	?>


							</form>   
							<td> <?php echo $satir2['kullanıcı_eski_oda']; ?> </td>                            
							<td> <a href="Yorumsayfasi.php">Add Comment</a></td> 
                            
                        </tr>
					</tbody>
					<?php           
								}
							}
							else 
							{
								echo "Ther is no rooms.";
							}
            		?>      
	
	
	</table></div></div>/<div>
		
		
	
</body>
	
</html>