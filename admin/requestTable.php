<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Project Blood Seeker - Administrator</title>
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon.png">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->

      <?php include 'php/sidenav.php';?>

  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Blood Records</li>
      </ol>-->

      <!-- Example DataTables Card-->

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Request Records </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  <th>Bloodtype</th>
                  <th>Components</th>
                  <th>Units</th>
                  <th>City</th>
                  <th>Full Name</th>
                  <th>Age</th>
                  <th>Birthdate</th>
                  <th>Sex</th>
                  <th>Hospital</th>
                  <th>Room Number</th>
                  <th>Physician</th>
                  <th>Cellphone Number</th>
                  <th>Diagnosis</th>
                  <th>Action</th>
                  <th>Examine</th>


                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Serial Number</th>
                  <th>Bloodtype</th>
                  <th>Components</th>
                  <th>Units</th>
                  <th>City</th>
                  <th>Full Name</th>
                  <th>Age</th>
                  <th>Birthdate</th>
                  <th>Sex</th>
                  <th>Hospital</th>
                  <th>Room Number</th>
                  <th>Physician</th>
                  <th>Cellphone Number</th>
                  <th>Diagnosis</th>
                  <th>Action</th>
                  <th>Examine</th>


                </tr>
              </tfoot>
              
              <center>
              <tbody>
              <?php include 'php/connection.php';?>
              <?php
              // $date = new DateTime();
              // echo $date->format('Y-m-d H:i:s') . "\n";
              ?>
                <?php 

                $result = mysqli_query($conn,"SELECT * FROM request_blood WHERE city = '" . $_SESSION['city'] . "' AND timerequested>=DATE_SUB(NOW(), INTERVAL 1 DAY)");
                //$result = mysqli_query($conn,"SELECT * FROM request_blo od");
                ?>

                <?php 
                while($row = mysqli_fetch_array($result))  
                { ?>
                <tr class='row-data' data-href='url://'>
                <td class='serialnumber'><?php echo $row['serialnumber']; ?></td>
                <td class='bloodtype'><?php echo $row['bloodtype']; ?></td>
                <td class='component'><?php echo $row['component']; ?></td>
                <td class='units'><?php echo $row['units']; ?></td>
                <td class='city'><?php echo $row['city']; ?></td>
                <td class='fullname'><?php echo $row['fullname']; ?></td>
                <td class='age'><?php echo $row['age']; ?></td>
                <td class='birthdate'><?php echo $row['birthdate']; ?></td>
                <td class='sex'><?php echo $row['sex']; ?></td>               
                <td class='hospital'><?php echo $row['hospital']; ?></td>
                <td class='roomnum'><?php echo $row['roomnum']; ?></td>
                <td class='physician'><?php echo $row['physician']; ?></td>
                <td class='cellphonenum'><?php echo $row['cellphonenum']; ?></td>
                <td class='diagnosis'><?php echo $row['diagnosis']; ?></td>
                <form method='get' action=''>
                  <td> <a onclick="return confirm ('Are You Sure?')" href="?id=<?php echo $row['idrequestBlood']?>" class="btn btn-danger btn-sm">Delete</a></td>
                  <td> <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModal" >Copy Serial</a></td>
                  
                </tr>
                 
              </form>  
              <?php };?>
              <?php
                mysqli_close($conn); 
               ?>

              <?php include 'php/connection.php';?>
              <?php
                if(isset($_GET['id'])){ 
                  $id = $_GET['id'];
                    

                  $sql = "DELETE FROM request_blood WHERE idrequestBlood = '$id' ";
                  
                  if ($conn->query($sql) === TRUE) {
                   echo "<script type= 'text/javascript'>alert('Deleted successfully');</script>";    
                 
                     
                  } else {
                      echo "Error deleting record: " . $conn->error;
                  }
                } 
                ?>


                </tr>
            
              
              </tbody>
              </center>
              
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
    <?php include 'php/logoutfooter.php';?>

<!-- Modal for editing and deleting data-->
<!-- <div id="myModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" >
      <div class="bloodData" >
      <b>Serial Number:</b> <span class="serialnumber"></span><br>
      <b>Donor:</b> <span class="donor"></span><br> 
      <b>Blood Type: </b> <span class="bloodtype"></span><br>
      <b>Component:</b> <span class="component"></span><br>
      <b>Quantity: </b> <span class="quantity"></span><br>
      <b>Extraction Date:</b> <span class="extractiondate"></span><br>
      <b>Expiration Date:</b> <span class="expirationdate"></span>
      </div>
      <p id="bloodpic"><img class="bloodimg" src="../admin/img/img.jpg" alt="Blood" height="218px" width="207px" ></p>
      </div>

   
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle='modal' data-target="#deleteModal" >Delete</button> 
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>  
     </div>
      </div>
    </div>
  </div> -->
<!-- end of modal -->
    

<!-- Modal for updating record -->
<<div id="updateModal" class="modal fade " role="dialog" >
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>

      
    <div class="modal-bodyUpdate" style="
    height: 210px;
">
    <form method='post' action=''>
      <table class="table table-bordered table-condensed">
      <tbody>
        <tr>
          <td>
          <b>Serial Number</b>
          <input type="text" class="form-control serialnumber" id="serialnumber" name="serialnumber">
          </td>
        </tr>

      </tbody>
           
      </table>
      <div class="modal-footer" method="get">
       <button onclick="myFunction()" class="btn btn-success">Copy Serial</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

      </div>
      </form>
      </div>    
      
    </div>
  </div>
</div>

<script>
function myFunction() {
  var copyText = document.getElementById("serialnumber");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>

<script>
//(function($){

  //data-toggle='modal' data-target='#myModal'
  $('.row-data').click(function(){
    $('#updateModal .serialnumber').text( $('.serialnumber', this).text() );

    document.getElementById("serialnumber").value = $('.serialnumber', this).text();

    $('#updateModal').modal();
  });

//})(jQuery);
</script>


    
  </div>
</body>

</html>