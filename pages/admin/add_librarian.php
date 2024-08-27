<?php 
include "../../includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include "../../includes/header.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
<?php 
include "../../includes/navbar.php";
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

<?php 
include "../../includes/sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- jquery validation -->
            <div class="card card-body">
              <div class="card-header">
                <h3 class="col-xs-6"><span class="fa fa-plus"></span> ADD LIBRARIAN</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              
     <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="firstname" placeholder="Input first name....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="middlename" placeholder="Input middle name....." id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="lastname" placeholder="Input last name....." id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-12 col-xs-12" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">E-Mail Address:
                                    </label>
                                    <div class="col-md-8">
                                        <input type="email" placeholder="Input email or gmail - sample@email.com...."  autocomplete="off" name="email" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Campus</label>
                                    <div class="col-md-8">
                                        <select name="campus" class="select2_single form-control" tabindex="-1" required="required"><option selected disabled> Select Campus </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['campus_id'];
                                        ?>
                                            <option value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Username <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="username" placeholder="Input username....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Password <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" placeholder="Input password....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Confirm Password <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="password" name="confirm_password" placeholder="Confirm password....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="user.php"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                
                   <?php   
                            include ('../../includes/conn.php');
                if (isset($_POST['submit'])){
                            
                                  
                                if($check !== false){
                           
                                    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                                    $middlename = mysqli_real_escape_string($con,$_POST['middlename']);
                                    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                                    $activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
                                    $email = mysqli_real_escape_string($con,$_POST['email']);
                                    $username =mysqli_real_escape_string($con,$_POST['username']);
                                    $password = mysqli_real_escape_string($con,$_POST['password']);
                                    $campus = mysqli_real_escape_string($con,$_POST['campus']);
                                    $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
                                    
                    
                    
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                        if($password != $confirm_password)
{
echo "<script>alert('Password do not match!'); window.location='super_admin_home.php'</script>";
}else
{
                        mysqli_query($con,"INSERT into admin (firstname, middlename, lastname, activation_code, email, username, password, confirm_password, admin_image, admin_added, campus_id)
                        values ('$firstname', '$middlename', '$lastname', '$activation_code', '$email','$username','$hashedPwd', '$confirm_hashedPwd','$image', NOW(), '$campus' )")or die(mysql_error());
                        echo "<script>alert('User successfully added!'); window.location='librarian_list.php'</script>";
                  }
                                                            }
                                                        }
                                ?>
                        
                        <!-- content ends here -->

    <!-- Main content -->
    <section class="content">


                
          
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php 
include "../../includes/footer.php";
 ?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<?php
include "../../includes/script.php";
?>


</body>
</html>
