<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="startTime()">
<!-- Navigation-->
  <?php include 'php/sidenav.php';?>
    
  <div class="content-wrapper">
 
    <div class="container-fluid">
      <!-- Breadcrumbs
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Blood Records</li>
      </ol>-->
       
      <!-- Example DataTables Card-->

      <div class="card mb-3">
        <div class="card-header" >
          <div style="float:right;" id="txt"></div>
          <i class="fa fa-table" ></i> Blood Records 
          <form action="" method="post">
          <select name="type">
          <option value="allblood">All Records</option>
          <option value="successfull">Successfull</option>
          <option value="unsuccessfull">Unsuccessfull</option>

          <input type="submit" name="submit" value="Submit" class='btn btn-success btn-sm' style=" margin-left: 10px; margin-bottom: 2px;">
          </select>
          </form>
          
          </div>


        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  <th>Donor</th>
                  <th>Blood Type</th>
                  <th>Component</th>
                  <th>Unit</th>
                  <th>City</th>
                  <th>Extraction Date</th>
                  <th>Expiration Date</th>
                  <th>Remarks</th>
                  <th>Delete</th>
                  <th>Examine</th>
         
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Serial Number</th>
                  <th>Donor</th>
                  <th>Blood Type</th>
                  <th>Component</th>
                  <th>Unit</th>
                  <th>City</th>
                  <th>Extraction Date</th>
                  <th>Expiration Date</th>
                  <th>Remarks</th>
                  <th>Delete</th>
                  <th>Examine</th>
                             
       
                </tr>
              </tfoot>
              
              <tbody>
                <?php include 'php/connection.php';?>
                <?php
                 $result = mysqli_query($conn,"SELECT * FROM blood WHERE city = '" . $_SESSION['city'] . "' ");
                ?>
                 <!-- filtering results whether successfull or not (BUG FOUND HERE NEED TO FIX!!!!!!!!!!!) -->
                <?php
                   if(isset($_POST['submit'])){
                    if($_POST['type'] == 'allblood' ){
                      $result = mysqli_query($conn,"SELECT * FROM blood WHERE city = '" . $_SESSION['city'] . "' ");
                    }
                    elseif($_POST['type'] == 'successfull' ){
                      $result = mysqli_query($conn,"SELECT * FROM blood WHERE city = '" . $_SESSION['city'] . "' AND remarks = 'Successfull' ");
                    }
                    elseif($_POST['type'] == 'unsuccessfull' ){
                      $result = mysqli_query($conn,"SELECT * FROM blood WHERE city = '" . $_SESSION['city'] . "' AND remarks = 'Unsuccessfull' ");
                    }
                    else{
                     
                      }
                    } 
                    while($row = mysqli_fetch_array($result))  
                    {                                               
                
                ?>
                <!-- Until here!!!!!!!!!!!!! -->
                <?php 
                
                ?>
          
                <tr class='row-data' data-href='url://'>
                <td class='serialnumber'><?php echo $row['serialnumber']; ?></td>
                <td class='donor'><?php echo $row['donor']; ?></td>
                <td class='bloodtype'><?php echo $row['bloodtype']; ?></td>
                <td class='component'><?php echo $row['component']; ?></td>
                <td class='quantity'><?php echo $row['quantity']; ?></td>
                <td class='city'><?php echo $row['city']; ?></td>
                <td class='extractiondate'><?php echo $row['extractiondate']; ?></td>
                <td class='expirationdate'><?php echo $row['expirationdate']; ?></td>
                <td class='remarks'><?php echo $row['remarks']; ?></td>
                <form method='get' action=''>
                <td> <a href="?serial=<?php echo $row['serialnumber']?>" onclick="return confirm ('Are You Sure?');" class="btn btn-danger btn-sm">Delete</a></td>
                <td><button type='button' onclick="updateBtn()"class='btn btn-success btn-sm' data-toggle="modal" data-target="#updateModal" >Examine</button> </td>
              </form>       
              </tr>
                <?php }; ?>                    

                <?php mysqli_close($conn); ?>  



              <?php
                  include 'php/connection.php';

                if(isset($_GET['serial'])){ 
                  $serial = $_GET['serial'];
                    

                  $sql = "DELETE FROM blood WHERE serialnumber = '$serial' ";
                  
                  if ($conn->query($sql) === TRUE) {
                   echo "<script type= 'text/javascript'>alert('Deleted successfully'); </script>";                              
                  } else {
                      echo "Error deleting record: " . $conn->error;
                  }
                } 
                ?>
                <?php mysqli_close($conn); ?>  

                <?php
                   include 'php/connection.php';

                  if(isset($_POST['update'])){
                    $serialnumber = $_POST['serialnumber'];
                    $donor = $_POST['donor'];
                    $bloodtype = $_POST['bloodtype'];
                    $component = $_POST['component'];
                    $quantity = $_POST['quantity'];
                    $city = $_POST['city'];
                    $extractiondate = $_POST['extractiondate'];
                    $expirationdate = $_POST['expirationdate'];
                    $remarks = $_POST['remarks'];
    
                    
                    $sql_insert = "INSERT INTO inventory (serialnumber, donor, bloodtype, component, unit, city, extractiondate, expirationdate, remarks, findings )
                            VALUES ('".$_POST["serialnumber"]."', '".$_POST["donor"]."','".$_POST["bloodtype"]."', '".$_POST["component"]."', '".$_POST["quantity"]."', '".$_POST["city"]."', '".$_POST["extractiondate"]."', '".$_POST["expirationdate"]."', '".$_POST["remarks"]."', '".$_POST["status"]."' )";
                    $sql_delete = "DELETE FROM blood WHERE serialnumber = '$serialnumber' ";

                     $sql =$sql_insert.";".$sql_delete;                           
                    if($conn->multi_query($sql) == TRUE){
                ?>
                    <script type= 'text/javascript'>alert('Examine Successfull');</script>
                    

                    <?php 
                    }else{
                      ?>
                      <script type= 'text/javascript'>alert('Examine Failed');</script>
 
                  <?php
                    }
                  }
                
                    ?>
        

                <?php mysqli_close($conn); ?>

              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->


<!-- Modal for updating record -->

<div id="updateModal" class="modal fade " role="dialog" >
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>

      
    <div class="modal-bodyUpdate">
    <form method='post' action=''>
      <table class="table table-bordered table-condensed">
      <tbody>
        <tr>
          <td>
          <b>Serial Number</b>
          <input type="text" class="form-control serialnumber" id="serialnumber" name="serialnumber">
          </td>
        </tr>

        <tr>
          <td>
          <b>Donor</b>
          <input type="text" id="donor" name="donor" class="form-control donor" value="" readonly>
          </td>
        </tr>
     
        <tr>
          <td>
          <b>Blood Type</b>
          <input type="text" id="bloodtype" name="bloodtype" class="form-control bloodtype" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>Component</b>
          <input type="text" id="component" name="component" class="form-control component" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>Quantity</b>
          <input type="text" id="quantity" name="quantity" class="form-control quantity" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>City</b>
          <input type="text" id="city" name="city" class="form-control" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>Extraction Date</b>
          <input type="text" id="extractiondate"  name="extractiondate" class="form-control extractiondate" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>Expiration Date</b>
          <input type="text"  id="expirationdate"  name="expirationdate" class="form-control expirationdate" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>Remarks</b>
          <input type="text"  id="remarks"  name="remarks" class="form-control remarks" readonly>
          </td>
        </tr>
        <tr>

          <td>
          <b>Status</b>
          <select class="form-control" id="status" name="status">
            <option value="" selected="selected" disabled="disabled">-- select one --</option>
              <option value="Active">Active</option>
              <option value="Reactive">Reactive</option>
            </select>
          </td>
        </tr>


      </tbody>
           
      </table>
      <div class="modal-footer" method="get">
        <button type="submit" class="btn btn-success" name="update">Done</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>    
      
    </div>
  </div>
</div>

<?php include 'php/logoutfooter.php';?>

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
    <script type="text/javascript" src="../admin/js/update.js"></script>
    <script>
      document.body.style.zoom="75%";
    </script>
    
  </div>
</body>

</html>
