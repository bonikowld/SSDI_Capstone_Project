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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Project Blood Seeker</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="inventory.php">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">Inventory</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Records</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
             <li>
              <a href="tables.php">Blood Records</a>
            </li>
            <li>
              <a href="donations.php">Blood Donation</a>
            </li>
             <li>
              <a href="addrecord.php">Add Records</a>

            </li>
            <li>
              <a href="requestTable.php">Requested Bloods</a>

            </li>
            
            <li>
              <a href="donors.php">Donors</a>
            </li>
            
          </ul>
        </li>

        
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="reports.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Reports</span>
          </a>
       
        </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#reports" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="reports">
             <li>
              <a href="reports.php">Checkout Bloods</a>
            </li>
            <li>
              <a href="#">Reactive/Active Bloods</a>
            </li>
             <li>
              <a href="#">Successfull/Unsuccessfull</a>

            </li>
            <li>
              <a href="#">Requested Bloods</a>

            </li>
            
          </ul>
        </li>

        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="addbranch.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Add Branch</span>
          </a>
        </li>
        

      </ul>

      <ul class="navbar-nav ml-auto">
  
        <a class="navbar-brand" href="#">Admin
        <?php 
            if(isset($_SESSION['city'])){
              echo $_SESSION['city'];
            }
            else{ echo 'Session not set';
            }
          ?>
   
        </a>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Branch</a>
        </li>
        <li class="breadcrumb-item active">Add Branch</li>
      </ol>
<?php 
 include 'php/connection.php';
?>
<?php 
if(!empty($_POST)){
      $sql = "INSERT INTO branch (branchname, branchaddress, adminname, adminaddress, contactnumber, email, username, password)
      VALUES ('".$_POST["branchname"]."', '".$_POST["branchaddress"]."', '".$_POST["adminname"]."', '".$_POST["adminaddress"]."', '".$_POST["contactnumber"]."', '".$_POST["email"]."', '".$_POST["username"]."', '".$_POST["password"]."')";

      if ($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'>alert('Branch Created successfully');</script>";
        } else {
        echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
        }
        
        $conn->close();
}
?>
<form action="" method="POST">
 <div class="jumbotron">
  <div class="col-half">
 <label>Blood Bank Branch</label>
 <input class="form-control" type="text" name="branchname" placeholder="Branch" required>
</div>
 <div class="col-half">
 <label>Blood Bank Address</label>
 <input class="form-control" type="text" name="branchaddress" placeholder="Blood Bank Address" required>
</div>
  <div class="col-half">
 <label>Admin Name</label>
 <input class="form-control" type="text" name="adminname" placeholder="Admin Name" required>
</div>
  <div class="col-half">
 <label>Admin Address</label>
 <input class="form-control" type="text" name="adminaddress" placeholder="Admin Address" required>
</div>
  <div class="col-half">
 <label>Contact Number</label>
 <input class="form-control" type="text" name="contactnumber" placeholder="Contact Number" required>
</div>
  <div class="col-half">
 <label>Email</label>
 <input class="form-control" type="text" name="email" placeholder="Email" required>
 </div>
 <div class="col-half">
 <label>Username</label>
 <input class="form-control" type="text" name="username" placeholder="Username" required>
 </div>
 <div class="col-half">
 <label>Password</label>
 <input class="form-control" type="password" name="password" placeholder="Password" required>
 </div>
  <br>         
 <button class="btn btn-success" type="submit" style="margin-top: 3%;" >Add Branch</button>
 <a href="index.php" class="btn btn-danger" type="button" style="margin-top: 3%;" >Cancel</a>
</form>

 <!--    sticky footer start here -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Project Blood Seeker 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../admin/logout.php">Logout</a>
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
   <!--  <script src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
