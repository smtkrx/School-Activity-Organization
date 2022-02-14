
<!doctype html>
<html lang="tr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="robots" content="all, index, follow" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <title>#EvdeKal | ÖDEV Anasayfa</title>
    <style type="text/css">
      #FontHeader { font-family: "Brush Script MT", cursive;font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; }
      #FontUL {
        font-family: "Zapf-Chancery", cursive;font-style: normal; font-variant: normal;;
      }
      #active {
        color: #fff;
        border-bottom:solid 3px  #fff;
      }
      #in-active {
        color: #f1f1f1;
      }
    </style>
  </head>
  <body style="background-color: #f1f1f1;">

  <?php
                $connection = mysqli_connect("localhost","root","root");
                $db = mysqli_select_db($connection, 'test');

                $query = "SELECT * FROM user";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col"> Kullanıcı_adı</th>
                            <th scope="col"> Kullanıcı_soyadı </th>
                            <th scope="col"> Kullanıcı_mail </th>
                            <th scope="col"> Kullanıcı_telefon </th>
                            <th scope="col"> Kullancı_sifre </th>
                            <th scope="col"> Kullanıcı_eski_oda </th>
                            <th scope="col"> Kullanıcı_yeni_oda </th>
                            <th scope="col"> Kullanıcı_type </th>
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id']; ?> </td>                            
                            <td> <?php echo $row['Kullanıcı_adı']; ?> </td>                            
                            <td> <?php echo $row['kullanıcı_soyadı']; ?> </td>                            
                            <td> <?php echo $row['kullanıcı_mail']; ?> </td>                            
                            <td> <?php echo $row['kullanıcı_telefon']; ?> </td>                            
                            <td> <?php echo $row['kullancı_sifre']; ?> </td>                            
                            <td> <?php echo $row['kullanıcı_eski_oda']; ?> </td>                            
                            <td> <?php echo $row['kullanıcı_yeni_oda']; ?> </td>                          
                            <td> <?php  if($row['Kullanıcı_type']==1){echo '✓Admin';}else{echo 'X User';}?> </td>                          
                            <td> 
                                	   <button type="button" class="btn btn-success editbtn">  <a href="userDetails.php" target="userDetails.php">EDIT</a> </button> </td> 
                            </td> 
                            
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
                </table>
      

    <!--  -->


    <!--  -->

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        Details in here
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