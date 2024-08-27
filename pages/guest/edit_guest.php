<?php 
ob_start();
$ID=$_GET['guest_id'];
?>

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
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> EDIT GUEST</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
   <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from guest where guest_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>

     <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <a href=""><?php // if($row['user_image'] != ""): ?>
                                        <img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php // else: ?>
                                        <img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php // endif; ?>
                                        </a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>  -->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">ID Number
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['guest_number']; ?>" name="guest_number" id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Contact #
                                    </label>
                                    <div class="col-md-8">
                                        <input type='tel' value="<?php echo $row['contact']; ?>" autocomplete="off"  maxlength="11" name="contact" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">e-Mail Address:
                                    </label>
                                    <div class="col-md-8">
                                        <input type='email' value="<?php echo $row['email']; ?>" autocomplete="off" name="email" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>              
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="hidden" name="activation_code" value="<?php echo $row['activation_code']; ?>"  id="activation_code" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Username
                                    </label>
                                    <div class="col-md-8">
                                        <input type="pass" name="username" value="<?php echo $row['username']; ?>" placeholder="Section....." id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Password
                                    </label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" required id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="guest.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            
<?php
$id =$_GET['guest_id'];
if (isset($_POST['update'])) {

$guest_number = mysqli_real_escape_string($con,$_POST['guest_number']);
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);
$middlename = mysqli_real_escape_string($con,$_POST['middlename']);
$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
$contact = mysqli_real_escape_string($con,$_POST['contact']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);


     
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);  
mysqli_query($con," UPDATE guest SET guest_number='$guest_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', email='$email', activation_code='$activation_code', username='$username', password='$hashedPwd' WHERE guest_id = '$id' ")or die(mysqli_error());


echo "<script>alert('Successfully Updated User Info!'); window.location='guest.php'</script>";


// }
// }
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
