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
        <div class="card-header">
          <i class="fa fa-table"></i> Donations </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Age</th>
                  <th>Birthdate</th>
                  <th>Sex</th>
                  <th>Nationality</th>
                  <th>Civil Status</th>          
                  <th>Education</th>
                  <th>Occupation</th>
                  <th>Cellphone Number</th>
                  <th>Email Address</th>
                  <th>Identification No.</th>
                  <th>Blood Bank</th>
                  <th>Donor Address</th>
                  <th>Delete</th>
                  <th>Add Donor</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>FullName</th>
                  <th>Age</th>
                  <th>Birthdate</th>
                  <th>Sex</th>
                  <th>Nationality</th>
                  <th>Civil Status</th>          
                  <th>Education</th>
                  <th>Occupation</th>
                  <th>Cellphone Number</th>
                  <th>Email Address</th>
                  <th>Identification No.</th>
                  <th>Blood Bank</th>
                  <th>Donor Address</th>
                  <th>Delete</th>
                  <th>Add Donor</th>
                </tr>
              </tfoot>
              
              <tbody>
              <?php include 'php/connection.php';?>
              
              <?php         

                $result = mysqli_query($conn,"SELECT * FROM donate_blood WHERE bloodbank = '" . $_SESSION['city'] . "' ");
                ?>

                <?php     
                while($row = mysqli_fetch_array($result))  
                {?>
                <tr class='row-data' data-href='url://'>
                <td class='fullname'><?php echo $row['fullname']; ?></td>
                <td class='age'><?php echo $row['age'] ?></td>
                <td class='birthdate'><?php echo $row['birthdate']; ?></td>
                <td class='sex'><?php echo $row['sex']; ?></td>
                <td class='nationality'><?php echo $row['nationality']; ?></td>
                <td class='civilstatus'><?php echo $row['civilstatus']; ?></td>
                <td class='education'><?php echo $row['education']; ?></td>
                <td class='occupation'><?php echo $row['occupation']; ?></td>
                <td class='cellphonenum'><?php echo $row['cellphonenum']; ?></td>
                <td class='email'><?php echo $row['email']; ?></td>
                <td class='identificationno'><?php echo $row['identificationno']; ?></td> 
                <td class='bloodbank'><?php echo $row['bloodbank']; ?></td> 
                <td class='homeaddress'><?php echo $row['homeaddress']; ?></td>
                <form method='get' action=''>
                <td> <a href="?iddonate=<?php echo $row['iddonate_blood']?>" onclick="return confirm ('Are You Sure?');" class="btn btn-danger btn-sm">Delete</a></td>     
                </form>  
                <td> <button data-toggle="modal" data-target="#addDonor" class="btn btn-success btn-sm">Add Donor</button></td>
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
    <?php include 'php/logoutfooter.php';?>

<form action="" method="get">
<!-- modal for deleting -->
<div id="deleteModal" class="modal fade " role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div> -->
  
      <div class='modal-body' >
      <h6>Are you Sure?</h6>
      <button type='button' class='btn btn-success' name="delete_btn">Confirm</button>
      <button type='button' class='btn btn-warning' data-dismiss='modal'>Cancel</button> 
      </div>
   
      <!-- <div class="modal-footer">
     </div> -->
      </div>
    </div>
  </div>
<!-- end of modal -->
</form>


    <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "blood_bank";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection 
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                if(isset($_GET['iddonate'])){
                  $iddonate = $_GET['iddonate'];

                  $sql = "DELETE FROM donate_blood WHERE iddonate_blood = '".$iddonate."' ";
                  
                  if ($conn->query($sql) === TRUE) {
                  } else {
                      echo "Error deleting record: " . $conn->error;
                  }
                }


                if(isset($_POST['add'])){

                  $sql = "INSERT INTO donors (name, dateofbirth, contactnum, homeaddress, email, lastdonation, bloodtype, bloodbank )
                  VALUES ('".$_POST["fullname"]."','".$_POST["birthdate"]."','".$_POST["cellphonenum"]."','".$_POST["homeaddress"]."','".$_POST["email"]."','".$_POST["lastdonation"]."','".$_POST["bloodtype"]."','".$_POST["bloodbank"]."' )";

                    if ($conn->query($sql) == TRUE) {
                      echo "<script type='text/javascript'>alert('New record created successfully');</script>";
                      } else {
                      echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
                      }
              
              }


                mysqli_close($conn); 
    ?>

  

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
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Donor Name" readonly>           
       </div>
       <div class="form-group">
            <b>Date of Birth</b>
            <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="Date of Birth" readonly>
       </div>
       <div class="form-group">
            <b>Contact Number</b>
            <input type="text" class="form-control" name="cellphonenum" id="cellphonenum" placeholder="Contact Number" readonly>        
       </div>
       <div class="form-group">
            <b>Address</b>
            <input type="text" class="form-control" name="homeaddress" id="homeaddress" placeholder="Address" readonly>      
       </div>
       <div class="form-group">
            <b>Email</b>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" readonly>  
       </div>
       <div class="form-group">
            <b>Bloodbank</b>
            <input type="text" class="form-control" name="bloodbank" id="bloodbank"  readonly>  
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
    $('#addDonor .fullname').text( $('.fullname', this).text() );
    $('#addDonor .birthdate').text( $('.birthdate', this).text() );
    $('#addDonor .cellphonenum').text( $('.cellphonenum', this).text() );
    $('#addDonor .homeaddress').text( $('.homeaddress', this).text() );
    $('#addDonor .email').text( $('.email', this).text() );
    $('#addDonor .bloodbank').text( $('.bloodbank', this).text() );
    // $('#addDonor .fullname').text( $('.fullname', this).text() );
    // $('#addDonor .fullname').text( $('.fullname', this).text() );
    // $('#addDonor .fullname').text( $('.fullname', this).text() );
    // $('#addDonor .fullname').text( $('.fullname', this).text() );

     document.getElementById("fullname").value = $('.fullname', this).text();
     document.getElementById("birthdate").value = $('.birthdate', this).text();
     document.getElementById("cellphonenum").value = $('.cellphonenum', this).text();
     document.getElementById("homeaddress").value = $('.homeaddress', this).text();
     document.getElementById("email").value = $('.email', this).text();
     document.getElementById("bloodbank").value = $('.bloodbank', this).text();
    //  document.getElementById("fullname").value = $('.fullname', this).text();
    //  document.getElementById("fullname").value = $('.fullname', this).text();
    //  document.getElementById("fullname").value = $('.fullname', this).text();


    $('#addDonor').modal();
  });

//})(jQuery);
</script>


    
  </div>
</body>

</html>