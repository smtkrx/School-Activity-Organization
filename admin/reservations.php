
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
                $connection = mysqli_connect("localhost","root","root");
                $db = mysqli_select_db($connection, 'room');

                $query = "SELECT * FROM rooms";
                $query_run = mysqli_query($connection, $query);

                session_start();
            ?>



                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> İD</th>
                            <th scope="col">Room_Name</th>
                            <th scope="col">Room_Cap </th>
                            <th scope="col"> Room_Text </th>
                            <th scope="col"> Room_Projector </th>
                            <th scope="col"> Room_Microphone </th>
                            <th scope="col"> Room_Sound_System </th>
                            <th scope="col"> Use_Type </th>
                            <th scope="col"> Room_Durumu </th>
                            <th scope="col"> Start_Time </th>
                            <th scope="col"> Finis_Time </th>
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
                            <td> <?php echo $satir['id']; ?> </td>                            
                            <td> <?php echo $satir['Room_Name']; ?> </td>                            
                            <td> <?php echo $satir['Room_Cap']; ?> </td>                            
                            <td> <?php echo $satir['Room_Text']; ?> </td>
                            <td> <?php  if($satir['Room_Projector']==1){echo '✓';}else{echo 'X';}?> </td>                            
                            <td> <?php  if($satir['Room_Microphone']==1){echo '✓';}else{echo 'X';}?> </td>                       
                            <td> <?php  if($satir['Room_Sound_System']==1){echo '✓';}else{echo 'X';}?> </td>                            
                            <td> <?php echo $satir['Use_Type']; ?> </td>                            
                            <td> <?php  if($satir['Room_Durumu']==1){echo '✓';}else{echo 'X';}?> </td>  
                            <td> <?php echo $satir['Start_Time']; ?> </td>                            
                            <td> <?php echo $satir['Finis_Time']; ?> </td>                        
                            <td> 
                                    <form action="roomDetails.php" method="post">
                                    
                                     <button type="button" class="btn btn-success editbtn" value="<?php $satır['id']?>"> <?php $_SESSION['id']= $satir['id']; ?>  <a href="roomDetails.php" target="roomDetails.php">EDIT</a> </button> </td> 
                                    </form>
                            
                        </tr>
                    </tbody>
                    <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>    
                      
      

    <!--  -->


    <!--  -->

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Details will be here
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!--  -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>