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
            <header>Forgot Password?</header>
             <form class="pt-3" method="POST" action="forgot_exe.php">
                        <div class="form-group">
                            <input type="username" name="username" class="form-control form-control-lg" id="exampleInputUsername" placeholder="Enter Username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Email Address" required="required">
                        </div>
                        <div class="mt-3"><center>
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn_login">Submit</button>
                            <a href="javascript:history.back()"><button type="button" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn" name="back">Back</button></a>
                        </div></center>
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
