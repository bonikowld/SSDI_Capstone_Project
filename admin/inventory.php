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

<body class="fixed-nav sticky-footer bg-dark" id="page-top" >
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
        <!-- <div class="card-header" >
          <div style="float:right;" id="txt"></div>
          <i class="fa fa-table" ></i> Blood Records
          <form action="" method="post">
          <select name="type">
          <option value="allblood">All Records</option>
          <option value="O-">O-</option>
              <option value="O+">O+</option>
              <option value="A-">A-</option>
              <option value="A+">A+</option>
              <option value="B-">B-</option>
              <option value="B+">B+</option>
              <option value="AB-">AB-</option>
          <option value="AB+">AB+</option>
          <input type="submit" name="submit" value="Submit" class='btn btn-success btn-sm' style=" margin-left: 10px; margin-bottom: 2px;">
          </select>
          </form>
            
          </div> -->


        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Course and Year</th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>License Number</th>                                                
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Course and Year</th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>License Number</th>  
        
                </tr>
              </tfoot>
              
              <tbody>
                <?php include 'php/connection.php';?>
                <?php
                 $result = mysqli_query($conn,"SELECT * FROM students");
                 $row_cnt = $result->num_rows;
                 echo "<h5>Total Number of Bloods : $row_cnt</h5>";
                 echo "<br>";
                
                ?>
              
              <!-- filtering results of bloodtype-->
           
              <?php

                   if(isset($_POST['submit'])){
                    if($_POST['type'] == 'allblood' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND flag='0' ");
                      
                    }
                    elseif($_POST['type'] == 'O-' ){
                      
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'O-' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype O- : $row_cnt</h5>";
                      
                    }
                    elseif($_POST['type'] == 'O+' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'O+' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype O+ : $row_cnt</h5>";
                    }
                    elseif($_POST['type'] == 'A-' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'A-' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype A- : $row_cnt</h5>";
                    }
                    elseif($_POST['type'] == 'A+' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'A+' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype A+ : $row_cnt</h5>";
                    }
                    elseif($_POST['type'] == 'B-' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'B-' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype B- : $row_cnt</h5>";
                      
                    }
                    elseif($_POST['type'] == 'B+'){
                      $result = mysqli_query($conn, "SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'B+' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype B+ : $row_cnt</h5>";
                    }
                    elseif($_POST['type'] == 'AB-' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'AB-' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype AB- : $row_cnt</h5>";
                    }
                    elseif($_POST['type'] == 'AB+' ){
                      $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND bloodtype = 'AB+' AND flag='0' ");
                      $row_cnt = $result->num_rows;
                      echo "<h5>Total Number of Bloodtype AB+ : $row_cnt</h5>";
                    }
                    else{
                     
                      }
                    } 
                    while($row = mysqli_fetch_array($result))  
                    {                                               
                
                ?>
                <!-- Until here!!!!!!!!!!!!! -->
                 
                <tr class='row-data'>
                <td class='serialnumber'><?php echo $row['serialnumber']; ?></td>
                <td class='donor'><?php echo $row['donor']; ?></td>
                <td class='bloodtype'><?php echo $row['bloodtype']; ?></td>
                <td class='component'><?php echo $row['component']; ?></td>
                <td class='quantity'><?php echo $row['unit']; ?></td>
                <td class='extractiondate'><?php echo $row['extractiondate']; ?></td>
                <td class='expirationdate'><?php echo $row['expirationdate']; ?></td>
                <td class='remarks'><?php echo $row['remarks']; ?></td>
                <td class='findings'><?php echo $row['findings']; ?></td>
                <td class='city'><?php echo $row['city']; ?></td>
                <form method='get' action=''>
                <td><button type='button' onclick="updateBtn()"class='btn btn-success btn-sm' data-toggle="modal" data-target="#updateModal" >Checkout</button> </td>
              </form>       
              </tr>  

                <?php
                };
              mysqli_close($conn); 
              
              ?>  



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
                    $extractiondate = $_POST['extractiondate'];
                    $expirationdate = $_POST['expirationdate'];
                    $bloodbank = $_POST['city'];
                    $remarks = $_POST['remarks'];
                    $findings = $_POST['findings'];
                    $reciever = $_POST['reciever'];
                    $recieveraddress = $_POST['recieveraddress'];
                    $contactnumber = $_POST['contactnumber'];
                    $ornumber = $_POST['ornumber'];

                    $sql_insert = "INSERT INTO report (serialnumber, donor, bloodtype, component,quantity, extractiondate, expirationdate, remarks, findings, bloodbank, reciever, recieveraddress, contactnumber, ornumber, checkoutmonth, checkoutyear)
                            VALUES ('".$_POST["serialnumber"]."', '".$_POST["donor"]."','".$_POST["bloodtype"]."', '".$_POST["component"]."','".$_POST["quantity"]."', '".$_POST["extractiondate"]."', '".$_POST["expirationdate"]."', '".$_POST["remarks"]."', '".$_POST["findings"]."', '".$_POST["city"]."', '".$_POST["reciever"]."', '".$_POST["recieveraddress"]."', '".$_POST["contactnumber"]."', '".$_POST["ornumber"]."', '".$_POST["checkoutmonth"]."', '".$_POST["checkoutyear"]."')";
                    $sql_update="UPDATE inventory SET flag='1' WHERE serialnumber='$serialnumber'"; 
                    
                    $sql =$sql_insert.";".$sql_update;
                                             
                    if($conn->multi_query($sql) == TRUE){
                ?>
                    <script type= 'text/javascript'>alert('Checkout Successfull');</script>
                    

                    <?php 
                    }else{
                      ?>
                      <script type= 'text/javascript'>alert('Checkout Failed');</script>
 
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
          <p><input type="text" class="form-control serialnumber" id="serialnumber" name="serialnumber" readonly></p>
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
          <b>Unit</b>
          <input type="text" id="quantity" name="quantity" class="form-control quantity" readonly>
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
          <input type="text" id="remarks" name="remarks" class="form-control remarks" readonly>
          </td>
        </tr>
        <tr>
          <td>
          <b>Status</b>
          <input type="text" id="findings" name="findings" class="form-control status" readonly>
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
          <b>Borrowed By</b>
          <input type="text" name="reciever" class="form-control" required>
          </td>
        </tr>

         <tr>
          <td>
          <b>Borrowers Address</b>
          <input type="text" name="recieveraddress" class="form-control" required>
          </td>
        </tr>

           <tr>
          <td>
          <b>Contact Number</b>
          <input type="text" name="contactnumber" class="form-control" required>
          </td>
        </tr>

           <tr>
          <td>
          <b>OR Number</b>
          <input type="text" name="ornumber" class="form-control" required>

          <input type="hidden" name="checkoutmonth" id="checkoutmonth" value="<?php echo date("F")?>" class="form-control" required>
          <input type="hidden" name="checkoutyear" id="checkoutyear" value="<?php echo date("Y")?>" class="form-control" required>
         
          </td>
        </tr>

      </tbody>
           
      </table>
      <div class="modal-footer" method="post">
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
    <script type="text/javascript" src="../admin/js/checkout.js"></script>
    
  </div>
</body>

</html>
