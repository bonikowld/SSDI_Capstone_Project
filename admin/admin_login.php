<title>Admin - Project Blood Seeker</title>
<?php
        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blood_bank";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(isset($_POST['signin_btn'])){

          $username = $_POST['username'];
          $password = $_POST['password'];

          $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result)){
              while($row = mysqli_fetch_assoc($result))
              echo "Log in Successfull";

              header("location: ../admin/index.php");
          }
          else{
                $prompt = "Log in Failed Invalid Username or Password";
                echo "<script type='text/javascript'>alert('$prompt');</script>";
            }

          mysqli_close($conn);

        }

?>

<!DOCTYPE html> 
<head>
    <link rel="stylesheet" href="../assets/css/admin_login.css" type='text/css'>
</head>
<body>

        <div class="login-page">
                <div class="form">
                    <h1>Welcome</h1>
                  <!-- <form class="register-form">
                    <input type="text" placeholder="name"/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                  </form> -->
                  <form class="login-form" method="post">
                    <input type="text" name="username" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <button name="signin_btn">login</button>
                  </form>
                </div>
              </div>
            



</body>
</html>






