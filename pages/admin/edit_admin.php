<?php 
ob_start();
include ('../../includes/conn.php');
$ID=$_GET['admin_id'];
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
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> EDIT ADMIN</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    <div class="x_content">
<?php
  $query=mysqli_query($con,"select * from admin where admin_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    
                                    <div class="col-md-8">
                                        
                                        <input type="hidden" style="height:8px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="first-name">First Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="MI / Middle Name....." id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div><span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-12 col-xs-12" value="<?php echo $row['activation_code']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">E-Mail Address:
                                    </label>
                                    <div class="col-md-8">
                                        <input type="email" value="<?php echo $row['email']; ?>" name="email" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Campus</label>
                                    <div class="col-md-8">
                                        <select name="campus" class="select2_single form-control" tabindex="-1" required="required"><option selected disabled> Select Campus </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id = '$row[campus_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                        $id=$row1['campus_id'];
                                        ?>
                                            <option selected value="<?php echo $row1['campus_id']; ?>"><?php echo $row1['campus']; ?></option>
                                        <?php } ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id NOT IN ('$row[campus_id]')") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                        $id=$row1['campus_id'];
                                        ?>
                                            <option value="<?php echo $row1['campus_id']; ?>"><?php echo $row1['campus']; ?></option>
                                        <?php } ?>
                                        </select>
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
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Confirm Password
                                    </label>
                                    <div class="col-md-8">
                                        <input type="password" name="confirm_password" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Admin Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="<?php // echo $row['admin_type']; ?>"><?php // echo $row['admin_type']; ?></option>
                                            <option>Admin</option>
                                            <option>Encoder</option>
                                        </select>
                                    </div>
                                </div>  -->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            

                            
                            
<?php
$id =$_GET['admin_id'];
if (isset($_POST['update'])) {
                            //     $image = $_FILES["image"] ["name"];
                            // $image_name= addslashes($_FILES['image']['name']);
                            // $size = $_FILES["image"] ["size"];
                            // $error = $_FILES["image"] ["error"];
                            


                            // if ($error > 0){
                                        
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$activation_code = $_POST['activation_code'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$campus = $_POST['campus'];
$confirm_password = $_POST['confirm_password'];
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
$confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
// $admin_type = $_POST['admin_type'];
$still_profile = $row['admin_image'];

$result=mysqli_query($con,"select * from admin") or die (mySQL_error());
$row=mysqli_num_rows($result);

if($password != $confirm_password)
{
    if($_SESSION['role']=='Super Admin'){
            echo "<script>alert('Password do not match!'); window.location='super_admin_home.php'</script>";
    }else{
        echo "<script>alert('Password do not match!'); window.location='home.php'</script>";
    }
}else
{
mysqli_query($con," UPDATE admin SET firstname='$firstname', middlename='$middlename', lastname='$lastname',activation_code='$activation_code', email='$email', username='$username', password='$hashedPwd', 
confirm_password='$confirm_hashedPwd', admin_image='$still_profile', campus_id= '$campus' WHERE admin_id = '$id' ")or die(mysql_error());

    if($_SESSION['role']=='Super Admin'){
            echo "<script>alert('Successfully Update Admin Info!'); window.location='super_admin_home.php'</script>";
    }else{
        echo "<script>alert('Successfully Update Admin Info!'); window.location='admin_home.php'</script>";
    }
  
}

}
?>
                            </div>
                        </div>
                        <!-- content starts here -->

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
