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
          <i class="fa fa-table" ></i> List Of Donors 
          <button class="btn btn-success" name="update" data-toggle="modal" data-target="#addDonor" style=" margin-left: 10px;">Add Donor</button>
          </div>
        <div class="card-body" >
          <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Birthday</th>
                  <th>Contact Number</th>
                  <th>Home Address</th>
                  <th>Email</th>   
                  <th>Details</th>  
    
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Full Name</th>
                  <th>Date Of Birth</th>
                  <th>Contact Number</th>
                  <th>Home Address</th>
                  <th>Email</th>
                  <th>Details</th>
        
                </tr>
              </tfoot>

              <?php include 'php/connection.php';?>

              <?php 
                $result = mysqli_query($conn,"SELECT * FROM donors WHERE bloodbank = '" . $_SESSION['city'] . "'");                             
                    
                  while($row = mysqli_fetch_array($result)) 
                 {
              ?>
            
              <tbody>
                <tr>
                <td class='name'> <?php echo $row['name']; ?> </td>
                <td class='dateofbirth'> <?php echo $row['dateofbirth']; ?> </td>
                <td class='contactnum'> <?php echo $row['contactnum'];?> </td>
                <td class='homeaddress'> <?php echo $row['homeaddress']; ?> </td>
                <td class='email'> <?php echo $row['email']; ?> </td>
                <td><a href="donorinfo.php?donorid=<?php echo $row['donorid']?>" class='btn btn-success btn-sm'>View</a></td>
              </tr>
                <?php }; ?>   

                                
                <?php mysqli_close($conn); ?>        

              </tbody>
              
            </table>

          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

<?php
include 'php/connection.php';


if(!empty($_POST)){
            $sql = "INSERT INTO donors (name, dateofbirth, contactnum, homeaddress, email, lastdonation, bloodtype )
            VALUES ('".$_POST["name"]."','".$_POST["dateofbirth"]."','".$_POST["contactnum"]."','".$_POST["homeaddress"]."','".$_POST["email"]."','".$_POST["lastdonation"]."','".$_POST["bloodtype"]."' )";

            if ($conn->query($sql) == TRUE) {
              echo "<script type='text/javascript'>alert('New record created successfully');</script>";
              } else {
              echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
              }
              
              $conn->close();
           
            }

?>


    <!-- Modal -->
<div id="addDonor" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Donor</h4>
      </div>
      <div class="modal-body">
       <form action="" method="post">
       <div class="form-group">
            <b>Full Name</b>
            <input type="text" class="form-control" name="name" placeholder="Donor Name" required>           
       </div>
       <div class="form-group">
            <b>Date of Birth</b>
            <input type="date" class="form-control" name="dateofbirth" placeholder="Date of Birth" required>
       </div>
       <div class="form-group">
            <b>Contact Number</b>
            <input type="text" class="form-control" name="contactnum" placeholder="Contact Number" required>        
       </div>
       <div class="form-group">
            <b>Address</b>
            <input type="text" class="form-control" name="homeaddress" placeholder="Address" required>      
       </div>
       <div class="form-group">
            <b>Email</b>
            <input type="email" class="form-control" name="email" placeholder="Email" required>  
       </div>
       <div class="form-group">
            <b>Donation Date</b>
            <input type="date" class="form-control" name="lastdonation" placeholder="Status">   
       </div>
       <div class="form-group">
            <b>Blood Type</b>
            <select class="form-control" id="select" name="bloodtype">
            <option value="" selected="selected" disabled="disabled">-- select one --</option>
              <option value="O-">O-</option>
              <option value="O+">O+</option>
              <option value="A-">A-</option>
              <option value="A+">A+</option>
              <option value="B-">B-</option>
              <option value="B+">B+</option>
              <option value="AB-">AB-</option>
              <option value="AB+">AB+</option>
            </select>
       </div>


      

      </div>
      <div class="modal-footer">
        <button type="submit" name="add" id="id" class="btn btn-success" >Add Donor</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
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
    <script>
        function startTime() {
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          document.getElementById('txt').innerHTML =
          h + ":" + m + ":" + s;
          var t = setTimeout(startTime, 500);
      }
      function checkTime(i) {
          if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
          return i;
      }

     
    </script>

  </div>
</body>

</html>
