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

  <link href="css/print.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->

    <?php include 'php/reportprint.php';?>
      <!-- End of side navbar -->
  
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
     
<div class="no-print">
<form action="" method="get" >
    <table class="table table-bordered table-condensed">

    <tbody>
        <tr>
          <td>
           <label>Blood Records</label>
             <select name="type">
             <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="Reactive">Reactive</option>
             </select>
             <br>
             <button type='submit' name="report" id="report" class='btn btn-success btn-sm' >View Reports</button>
          </td>
        </tr>
    </tbody>
</table>
</form>
</div> 


<!-- Printable Area -->
<div class="hidden" id="printableArea">
<center>
  <img src="../assets/images/Philippine_Red_Cross_logo.jpg" alt="logo" style="width:70px; height:60px;">
  <h6 class="style">Republic of the Philippines</h6>
  <h6 class="style">Region X - Northern Mindanao</h6>
  <h6 class="style">Philippine National Red Cross <?php 
            if(isset($_SESSION['city'])){
              echo $_SESSION['city'];
            }
            else{ echo 'Session not set';
            }
          ?> Chapter</h6>
  <h6 class="style"><?php 
            if(isset($_SESSION['city'])){
              echo $_SESSION['city'];
            }
            else{ echo 'Session not set';
            }
          ?></h6>
  <br>
  <h2 class="style1"><?php 
//   $checkoutmonth = $_GET['month'];
//   $checkoutyear = $_GET['year'];
//   echo $checkoutmonth;
//   echo ' ';
//   echo $checkoutyear;
  ?>&nbspMonthly Report</h2>
  
</center>
<table class="table table-rounded custab">
  <thead>
  <tr>
      <th class="style">Serial Number</th>
      <th class="style">Donor</th>
      <th class="style">Blood Type</th>
      <th class="style">Component</th>
      <th class="style">Qty.</th>
      <th class="style">City.</th>
      <th class="style">Extraction Date</th>
      <th class="style">Expiration Date</th>
      <th class="style">Status</th>
  </tr>
  </thead>
  <tbody>
  <?php include 'php/connection.php';?>

  <?php 
 if(isset($_GET['report'])){

    $type = $_GET['type'];
    $city = $_SESSION['city'];
  

  $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND findings = '$type'; ");
  
 }
  ?>
      
  <?php while($row = mysqli_fetch_array($result))  
  { ?>

  <td class='serialnumber style1'><?php echo $row['serialnumber']; ?></td>
  <td class='donor style1'><?php echo $row['donor']; ?></td>
  <td class='bloodtype style1'><?php echo $row['bloodtype']; ?></td>
  <td class='component style1'><?php echo $row['component']; ?></td>
  <td class='quantity style1'><?php echo $row['unit'];?></td>
  <td class='city style1'><?php echo $row['city']; ?></td>
  <td class='extractiondate style1'><?php echo $row['extractiondate']; ?></td>
  <td class='expirationdate style1'><?php echo $row['expirationdate']; ?></td>
  <td class='remarks style1'><?php echo $row['findings']; ?></td>

  </tr>
  <?php }; ?>
  </tbody>
</table>
</div>
<!-- End of Printable Area -->

<div class="no-print">
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Blood Records </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Serial Number</th>
                  <th>Donor</th>
                  <th>Blood Type</th>
                  <th>Component</th>
                  <th>Quantity</th>
                  <th>City</th>
                  <th>Extraction Date</th>
                  <th>Expiration Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Serial Number</th>
                  <th>Donor</th>
                  <th>Blood Type</th>
                  <th>Component</th>
                  <th>Quantity</th>
                  <th>City</th>
                  <th>Extraction Date</th>
                  <th>Expiration Date</th>
                  <th>Status</th>
                </tr>
              </tfoot>
              
              <tbody>
                    <?php include 'php/connection.php';?>

                 <?php 
                 if(isset($_GET['report'])){

                  $type = $_GET['type'];
                  $city = $_SESSION['city'];

                  $result = mysqli_query($conn,"SELECT * FROM inventory WHERE city = '" . $_SESSION['city'] . "' AND findings = '$type'; ");
                                  
                while($row = mysqli_fetch_array($result))
                {
                echo "<tr>";  
                echo "<td class='text-center'>".$row['serialnumber']."</td>";
                echo "<td class='text-center'>".$row['donor']."</td>";
                echo "<td class='text-center'>".$row['bloodtype']."</td>";
                echo "<td class='text-center'>".$row['component']."</td>";
                echo "<td class='text-center'>".$row['unit']."</td>";
                echo "<td class='text-center'>".$row['city']."</td>";
                echo "<td class='text-center'>".$row['extractiondate']."</td>";
                echo "<td class='text-center'>".$row['expirationdate']."</td>";
                echo "<td class='text-center'>".$row['findings']."</td>";
                echo "</tr>";
                };
              } ?>
             
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
</div>


    <div class="no-print">
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Project Blood Seeker 2018</small>
        </div>
      </div>
    </footer>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are done</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>


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
    <!-- <script src="js/orientation.js"></script> -->

<script>
//(function($){

  //data-toggle='modal' data-target='#myModal'
  $('.row-data').click(function(){
    $('#myModal .serialnumber').text( $('.serialnumber', this).text() );
    $('#myModal .donor').text( $('.donor', this).text() );
    $('#myModal .bloodtype').text( $('.bloodtype', this).text() );
    $('#myModal .component').text( $('.component', this).text() );
    $('#myModal .quantity').text( $('.quantity', this).text() );
    $('#myModal .extractiondate').text( $('.extractiondate', this).text() );

    $('#myModal').modal();
  });

//})(jQuery);
</script>

<script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

    
  </div>
</body>

</html>