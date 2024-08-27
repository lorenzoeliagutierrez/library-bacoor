<?php session_start();
include "../../includes/conn.php"; 
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Reset Password</title>
      <link rel="stylesheet" href="../login/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
          <a href="https://stfrancisbacoor.com"><img class="user" src="../../img/logo.png"></a>
            <header>Reset Password</header>


            <form method="POST" action="reset">
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="password" class="form-control form-control-lg" id="resetpass" placeholder="Enter New Password" required>
               </div>
               <div class="pass">
                  <a href="forgot_pass.php"></a>
               </div>
               <div class="field">
                  <input type="submit" name="submit" value="Submit">
               </div>
            </form>  
         </div>
      </div>
 <?php
        if(isset($_POST['submit'])){
            $code = $_POST['code'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            

                if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                } 
                $admin = mysqli_query($con,"select * from admin where activation_code='".$code."'")or die(mysqli_error($con)); 
                $row = mysqli_num_rows ($admin);

                $user = mysqli_query($con,"select * from user where activation_code='".$code."'")or die(mysqli_error($con)); 
                $row1 = mysqli_num_rows ($user);

                if ($row == 1) {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $query3 = mysqli_query($con,"update admin set password='".$hashedPwd."' where activation_code='".$code."'")or die(mysqli_error($con)); 
                echo "<script>alert('Password successfully changed!'); window.location='login.php'</script>";
                }  
                elseif ($row1 == 1) {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $query3 = mysqli_query($con,"update user set password='".$hashedPwd."' where activation_code='".$code."'")or die(mysqli_error($con)); 
                echo "<script>alert('Password successfully changed!'); window.location='login.php'</script>";
                }   
                else{
                echo "<script>alert('Failed to Reset Password'); window.location='login.php'</script>";
                }
            }
            ?>



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
