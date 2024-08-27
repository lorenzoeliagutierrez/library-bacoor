<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="../login/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
          <a href="https://stfrancisbacoor.com"><img class="user" src="../../img/logo.png"></a>
            <header>Log In</header>
            <form method="POST" action="userData/ctrl.login.php">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name="username" placeholder="Enter Username...">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="password" placeholder="Enter Password...">
               </div>
               <div class="pass">
                  <a href="forgot_pass.php">Forgot Password?</a>
               </div>
               <div class="field">
                  <input type="submit" name="btn_login" value="LOGIN">
               </div>
               <div class="pass">
                  <a href="../login/login.php"></a>
               </div>
               <div class="pass">
                  <a href="../../index/basco-html/index.html">Back...</a>
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
