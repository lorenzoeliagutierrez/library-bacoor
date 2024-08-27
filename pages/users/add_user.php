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
                 <h3 class="col-xs-6"><span class="fa fa-user-plus"></span> ADD USER</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
  <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">ID Number <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Input ID* no....." name="student_number" id="first-name2" required="required" class="form-control col-md-12 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="firstname" placeholder="Input first Name....." id="first-name2" required="required" class="form-control col-md-7 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="middlename" placeholder="Input middle name....." id="first-name2" class="form-control col-md-7 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="lastname" placeholder="Input last name....." id="last-name2" required="required" class="form-control col-md-7 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Contact No.
                                    </label>
                                    <div class="col-md-6">
                                        <input type="tel" placeholder="Input contact no....." pattern="[0-9]{11,11}" autocomplete="off"  maxlength="11" name="contact" id="last-name2" class="form-control col-md-7 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">E-Mail Address:
                                    </label>
                                    <div class="col-md-6">
                                        <input type="email" placeholder="Input email - sample@email.com...."  autocomplete="off" name="email" id="last-name2" class="form-control col-md-7 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>                              
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Input address....." name="address" id="last-name2" class="form-control col-md-7 col-md-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Type <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Student">Student</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Teacher">Faculty</option>
                                            

                                        </select>
                                    </div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Level <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <select name="level" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Elementary">Elementary</option>
                                            <option value="Highschool">High School</option>
                                            <option value="Senior Highschool">Senior Highschool</option>
                                            <option value="Basic Department">Basic Department</option>
                                            <option value="College">College</option>
                                            <option value="Faculty">Faculty</option>
                                        </select>
                                </div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Section or Course <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" name="section" placeholder="Input section or course....." id="first-name2" class="form-control col-md-7 col-md-12">
                                    </div><span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-7 col-xs-12" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-md-6">
                                    <label for="campus">Campus<span class="required" style="color:red;">*</span></label>
                                        <select name="campus" class="form-control" tabindex="-1" required="required">
                                        <option selected disabled>-- Select Campus --
                                        </option>
                                            <?php
                                            $result= mysqli_query($con,"select * from campus") or die (mysqli_error($con));
                                            while ($row= mysqli_fetch_array ($result) ){
                                            $id=$row['campus_id'];
                                            ?>
                                        <option value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?>
                                        </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Username <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="username" placeholder="Input username....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Password <span  style="color:red;"></span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="password" name="password" placeholder="Input password....." id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                      
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            <?php   
                            include ('../../includes/conn.php');
                if (isset($_POST['submit'])){
                            
 
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
                                    $username =mysqli_real_escape_string($con,$_POST['username']);
                                    $password = mysqli_real_escape_string($con,$_POST['password']);

                                    $campus = mysqli_real_escape_string($con,$_POST['campus']);
                                    
                    
                    $result=mysqli_query($con,"SELECT * from user WHERE student_number='$student_number' ") or die (mySQLi_error());
                    $row=mysqli_num_rows($result);
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    if ($row > 0)
                    {
                    echo "<script>alert('ID Number already active!'); window.location='user.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"INSERT into user (campus_id ,student_number,firstname, middlename, lastname, contact, email, gender, address, type, level, section, status, user_added, activation_code,  username, password)
                        values ('$campus', '$student_number','$firstname', '$middlename', '$lastname', '$contact', '$email', '$gender', '$address', '$type', '$level', '$section', 'Active', NOW(), '$activation_code', '$username','$hashedPwd')")or die(mysql_error());
                        echo "<script>alert('User successfully added!'); window.location='user.php'</script>";
                    }
            //                      }
            //                      }
                            }
                                ?>
                        
                        <!-- content ends here -->

   
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
