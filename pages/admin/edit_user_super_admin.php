<?php 
ob_start();
include ('../../includes/conn.php');
$ID=$_GET['user_id']; ?>

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
                <h3 class="card-title">EDIT PROFILE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                   <div class="x_content">
<?php
  $query=mysqli_query($con,"select * from tbl_super_admins where sa_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">E-Mail Address:
                                    </label>
                                    <div class="col-md-8">
                                        <input type="email" value="<?php echo $row['email']; ?>" name="email" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">User Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['username']; ?>" name="username" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Password
                                    </label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="user_home.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            

                            
                            
<?php
$id =$_GET['user_id'];
if (isset($_POST['update'])) {

$email = $_POST['email'];                              
$username = $_POST['username'];
$password = $_POST['password'];
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);


{
mysqli_query($con," UPDATE tbl_super_admins SET email='$email',username='$username', password='$hashedPwd' WHERE sa_id = '$id' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Update Info!'); window.location='super_admin_home.php'</script>";  
}
                                    
}
?>
                            </div>
                        </div>
                        <!-- content starts here -->

                        
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
