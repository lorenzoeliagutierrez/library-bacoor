<?php session_start();
include "../../includes/conn.php"; ?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Forgot Password</title>
      <link rel="stylesheet" href="../login/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
          <a href="https://stfrancisbacoor.com"><img class="user" src="../../img/logo.png"></a>
            <header>Forgot Password?
               <h6>Enter your email address and we'll send you instructions on how to reset your password.</h6>
            </header>

            <form method="POST" action="forgot_exe.php">
               <div class="field">
                  <span class="fa fa-user"></span>
                   <input type="username" name="username" class="form-control form-control-lg" id="exampleInputUsername" placeholder="Enter Username" required="required">
               </div>
               <div class="field space">
                  <span class="fa fa-envelope"></span>
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Email Address" required="required">
               </div>
               <div class="pass">
               <div class="field">
                  <input type="submit" name="btn_login" value="Submit">
               </div>
            <div class="pass">
                  <a href="../login/login.php">Back...</a>
               </div>
            </form>  
         </div>
      </div>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
