<?php 
ob_start();
$ID=$_GET['user_id'];
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
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> EDIT USER</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
   <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from user
  LEFT JOIN campus USING (campus_id)
  where user_id='$ID'")or die(mysql_error());
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
                                        <input type="text" value="<?php echo $row['student_number']; ?>" name="student_number" id="first-name2" class="form-control col-md-12 col-xs-12">
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
                                    <label class="control-label col-md-4" for="last-name">Gender
                                    </label>
                                    <div class="col-md-8">
                                        <select name="gender" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>                              
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['address']; ?>" name="address" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Type
                                    </label>
                                    <div class="col-md-8">
                                        <select name="type" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Level
                                    </label>
                                    <div class="col-md-8">
                                        <select name="level" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['level']; ?>"><?php echo $row['level']; ?></option>
                                            <option value="Elementary">Elementary</option>
                                            <option value="Highschool">High School</option>
                                            <option value="Senior Highschool">Senior Highschool</option>
                                            <option value="College">College</option>
                                            <option value="Faculty">Faculty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Section
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="section" value="<?php echo $row['section']; ?>" placeholder="Section....." id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="hidden" name="activation_code" value="<?php echo $row['activation_code']; ?>"  id="activation_code" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-md-6">
                                    <label for="campus">Campus<span class="required" style="color:red;">*</span></label>
                                        <select name="campus" class="form-control" tabindex="-1" required="required">
                                        <option value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?>
                                        </option>
                                            <?php
                                            $result= mysqli_query($con,"select * from campus") or die (mysqli_error($con));
                                            while ($row4= mysqli_fetch_array ($result) ){
                                            $id=$row4['campus_id'];
                                            ?>
                                        <option value="<?php echo $row4['campus_id']; ?>"><?php echo $row4['campus']; ?>
                                        </option>
                                        <?php } ?>
                                        </select>
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
                                        <a href="user.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            
<?php
$id =$_GET['user_id'];
if (isset($_POST['update'])) {
                //          $image = $_FILES["image"] ["name"];
                //          $image_name= addslashes($_FILES['image']['name']);
                //          $size = $_FILES["image"] ["size"];
                //          $error = $_FILES["image"] ["error"];
                            


                //          if ($error > 0){
                                        
// $student_number = $_POST['student_number'];
// $firstname = $_POST['firstname'];
// $middlename = $_POST['middlename'];
// $lastname = $_POST['lastname'];
// $contact = $_POST['contact'];
// $gender = $_POST['gender'];
// $address = $_POST['address'];
// $type = $_POST['type'];
// $level = $_POST['level'];
// $still_profile = $row['user_image'];


// mysql_query(" UPDATE user SET student_number='$student_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', 
// gender='$gender', address='$address', type='$type', level='$level', user_image='$still_profile' WHERE user_id = '$id' ")or die(mysql_error());
// echo "<script>alert('Successfully Update User Info!'); window.location='user.php'</script>"; 
                            //      }else{
                            //          if($size > 10000000) //conditions for the file
                            //          {
                            //          die("Format is not allowed or file size is too big!");
                            //          }
                                        

// move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);           
// $profile=$_FILES["image"]["name"];

$student_number = mysqli_real_escape_string($con,$_POST['student_number']);
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);
$middlename = mysqli_real_escape_string($con,$_POST['middlename']);
$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
$contact = mysqli_real_escape_string($con,$_POST['contact']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$type = mysqli_real_escape_string($con,$_POST['type']);
$level = mysqli_real_escape_string($con,$_POST['level']);
$section = mysqli_real_escape_string($con,$_POST['section']);
$activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$campus = mysqli_real_escape_string($con,$_POST['campus']);


     
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);  
mysqli_query($con," UPDATE user SET campus_id='$campus',student_number='$student_number', firstname='$firstname', middlename='$middlename', lastname='$lastname', contact='$contact', email='$email', 
gender='$gender', address='$address', type='$type', level='$level', section='$section',activation_code='$activation_code', username='$username', password='$hashedPwd' WHERE user_id = '$id' ")or die(mysqli_error());


echo "<script>alert('Successfully Updated User Info!'); window.location='user.php'</script>";


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
