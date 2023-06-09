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
    <a class="navbar-brand" href="index.php">SSDI</a>
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
              <a href="reactiveactive.php">Reactive/Active Bloods</a>
            </li>
             <li>
              <a href="bloodrecordremarks.php">Successfull/Unsuccessfull</a>

            </li>
            <li>
              <a href="requestedbloodreport.php">Requested Bloods</a>

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
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <!-- <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a> -->
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
  
        <a class="navbar-brand" href="#">Admin
        <?php 
            if(isset($_SESSION['username'])){
              echo $_SESSION['username'];
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

<div class="jumbotron">
      <div class="table-responsive-lg">
        <h1>You are Loged-In As: </h1>
        <table class="table" style="width:600px;">
          
              <tbody>
                  <?php include 'php/connection.php';?>
                  <?php 
                  $sql = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "' ";
                
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      // echo "<tr>";
                      // echo "<td><h5>PRC Branch Name</h5></td>";
                      // echo "<td style='font-size:20px; font-family: Comic Sans MS;'>".$row['branchname']."</td>";
                      // echo "</tr>";
                      // echo "<tr>";
                      // echo "<td><h5>Name</h5></td>";
                      // echo "<td style='font-size:20px; font-family: Comic Sans MS;'>".$row['adminname']."</td>";
                      // echo "</tr>";
                      // echo "<tr>";
                      // echo "<td><h5>Contact Number</h5></td>";
                      // echo "<td style='font-size:20px; font-family: Comic Sans MS;'>".$row['contactnumber']."</td>";
                      // echo "</tr>";
                      // echo "<tr>";
                      echo "<td><h5>Email Address</h5></td>";
                      echo "<td style='font-size:20px; font-family: Comic Sans MS;'>".$row['email']."</td>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<td><h5>Username</h5></td>";
                      echo "<td style='font-size:20px; font-family: Comic Sans MS;'>".$row['username']."</td>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<td></td>";
                      // echo "<td>
                      //           <button type='button' onclick='updateBtn()' class='btn btn-success btn-sm' data-toggle='modal' data-target='#updateModal'>Change Information</button>                              
                      //       </td>";
                      // echo "</tr>";
                      // <button type='button' onclick='updateBtn()' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#updatePassword'>Change Password</button>
                      //echo "<td>".$row['branchname']."</td>";
                      //echo "<b style='margin-left: 1.5%;' >PRC Branch:</b> ". $row["branchname"]. "<br>";
                      //echo "<b style='margin-left: 1.5%;' >Name:</b> ". $row["adminname"]. "<br>"; 
                      //echo "<b style='margin-left: 1.5%;' >Contact Number:</b> ". $row["contactnumber"]. "<br>";
                      //echo "<b style='margin-left: 1.5%;' >Email Address:</b> ". $row["email"]. "<br>"; 
                    }   
                  }
                  else {
                  
                  }
                  $conn->close();
                  ?>

                  <!-- update for Information-->
                  <?php
                   include 'php/connection.php';
                   

                  if(isset($_POST['updateInformation'])){

                    $adminname = $_POST['adminname'];
                    $contactnumber = $_POST['contactnumber'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    

                    $sql = "UPDATE branch
                            SET adminname='$adminname', contactnumber='$contactnumber' , email='$email', username='$username', password='$password'  
                            WHERE branchaddress = '" . $_SESSION['city'] . "'";
                                               
                    if($conn->query($sql) == TRUE){
                ?>
                    <script type= 'text/javascript'>
                    
                    // window.location.reload(true);
                    window.onload = function() {
                    if(!window.location.hash) {
                        window.location = window.location + '#loaded';
                        window.location.reload();
                    }
                }
                                             
                    alert('Successfully Change');</script>
                    

                    <?php 
                    }else{
                      ?>
                      <script type= 'text/javascript'>alert('Change Failed');</script>
 
                  <?php
                    }
                  }
                
                    ?>
        

                <?php mysqli_close($conn); ?>

                <!-- update for password-->
                <?php
                  //  include 'php/connection.php';
                   

                  // if(isset($_POST['updatePassword'])){

                  //   $password = $_POST['password'];

                  //   $sql = "UPDATE branch
                  //           SET password='$password' 
                  //           WHERE branchaddress = '" . $_SESSION['city'] . "'";
                                               
                  //   if($conn->query($sql) == TRUE){
                ?>
                    <!-- <script type= 'text/javascript'>alert('Successfully Change');</script> -->
                    

                    <?php 
                    // }else{
                      ?>
                      <!-- <script type= 'text/javascript'>alert('Change Failed');</script> -->
 
                  <?php
                  //   }
                  // }
                
                    ?>
        

                <?php //mysqli_close($conn); ?>
              </tbody>

        </table>
      </div>
      
</div>

<!-- Modal for password-->
<!-- <div id="updatePassword" class="modal fade " role="dialog" >
  <div class="modal-dialog modal-md"> -->

    <!-- Modal content-->
    <!-- <div class="modal-content ">
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
            <b>Password</b>
            <input type="password" id="password1" name="password1" class="form-control password" value=""><?php //include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                                //if ($result->num_rows > 0) {
                                                                                                // output data of each row
                                                                                                //while($row = $result->fetch_assoc()) {
                                                                                                  //echo $row["password"];          
                                                                                                  //}    
                                                                                                //}
                                                                                                //else {       
                                                                                                //} 
                                                                                                ?>
            </td>
          </tr>

          <tr>
            <td>
            <b>Confirm Password</b>
            <input type="password" id="password" name="password" class="form-control password" value="">
            </td>
          </tr>

        </tbody>
            
        </table>
        <div class="modal-footer" method="post">
          <button type="submit" class="btn btn-success" name="updatePassword">Done</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>    
      
    </div>
  </div>
</div> -->

<!-- Modal for password end here-->

<!-- Modal for Information-->

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
          <b>Branch Address</b>
          <p><input type="text" class="form-control adminname" id="adminname" name="adminname" value="<?php include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                              if ($result->num_rows > 0) {
                                                                                              // output data of each row
                                                                                              while($row = $result->fetch_assoc()) {
                                                                                                echo $row["branchaddress"];          
                                                                                                }    
                                                                                              }
                                                                                              else {       
                                                                                              } 
                                                                                              ?>" readonly></p>
          </td>
        </tr>
        <tr>
          <td>
          <b>Name</b>
          <p><input type="text" class="form-control adminname" id="adminname" name="adminname" value="<?php include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                              if ($result->num_rows > 0) {
                                                                                              // output data of each row
                                                                                              while($row = $result->fetch_assoc()) {
                                                                                                echo $row["adminname"];          
                                                                                                }    
                                                                                              }
                                                                                              else {       
                                                                                              } 
                                                                                              ?>"></p>
          </td>
        </tr>

        <tr>
          <td>
          <b>Contact Number</b>
          <input type="text" id="contactnumber" name="contactnumber" class="form-control contactnumber" value="<?php include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                              if ($result->num_rows > 0) {
                                                                                              // output data of each row
                                                                                              while($row = $result->fetch_assoc()) {
                                                                                                echo $row["contactnumber"];          
                                                                                                }    
                                                                                              }
                                                                                              else {       
                                                                                              } 
                                                                                              ?>">
          </td>
        </tr>
     
        <tr>
          <td>
          <b>Email Address</b>
          <input type="text" id="email" name="email" class="form-control email" value="<?php include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                              if ($result->num_rows > 0) {
                                                                                              // output data of each row
                                                                                              while($row = $result->fetch_assoc()) {
                                                                                                echo $row["email"];          
                                                                                                }    
                                                                                              }
                                                                                              else {       
                                                                                              } 
                                                                                              ?>">
          </td>
        </tr>
        <tr>
          <td>
          <b>Username</b>
          <input type="text" id="username" name="username" class="form-control username" value="<?php include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                              if ($result->num_rows > 0) {
                                                                                              // output data of each row
                                                                                              while($row = $result->fetch_assoc()) {
                                                                                                echo $row["username"];          
                                                                                                }    
                                                                                              }
                                                                                              else {       
                                                                                              } 
                                                                                              ?>">
          </td>
        </tr>

        <tr>
          <td>
          <b>Password</b>
          <input type="password" id="password" name="password" class="form-control username" value="<?php include 'php/connection.php'; $sql = "SELECT * FROM branch WHERE branchaddress = '" . $_SESSION['city'] . "' "; $result = $conn->query($sql);
                                                                                              if ($result->num_rows > 0) {
                                                                                              // output data of each row
                                                                                              while($row = $result->fetch_assoc()) {
                                                                                                echo $row["password"];          
                                                                                                }    
                                                                                              }
                                                                                              else {       
                                                                                              } 
                                                                                              ?>">
          </td>
        </tr>

      </tbody>
           
      </table>
      <div class="modal-footer" method="post">
        <button type="submit" class="btn btn-success" name="updateInformation">Done</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>    
      
    </div>
  </div>
</div>

<!-- Modal for Information end here-->

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
