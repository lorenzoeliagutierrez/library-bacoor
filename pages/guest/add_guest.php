
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
                 <h3 class="col-xs-6"><span class="fa fa-user-plus"></span> ADD GUEST</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
  <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">ID Number <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Input ID* no....." name="guest_number" id="first-name2" required="required" class="form-control col-md-12 col-md-12">
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
                                    <div class="col-md-3">
                                        <input type="hidden" name="activation_code" id="activation_code" class="form-control col-md-7 col-xs-12" value="">
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
                            
 
                                    $guest_number = mysqli_real_escape_string($con,$_POST['guest_number']);
                                    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
                                    $middlename = mysqli_real_escape_string($con,$_POST['middlename']);
                                    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
                                    $contact = mysqli_real_escape_string($con,$_POST['contact']);
                                    $email = mysqli_real_escape_string($con,$_POST['email']);
                                    $activation_code = mysqli_real_escape_string($con,$_POST['activation_code']);
                                    $username =mysqli_real_escape_string($con,$_POST['username']);
                                    $password = mysqli_real_escape_string($con,$_POST['password']);
                                    
                    
                    $result=mysqli_query($con,"SELECT * from guest WHERE guest_number='$guest_number' ") or die (mySQLi_error($con));
                    $row=mysqli_num_rows($result);
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    if ($row > 0)
                    {
                    echo "<script>alert('ID Number already active!'); window.location='guest.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($con,"INSERT into guest (guest_number,firstname, middlename, lastname, contact, email, guest_added, activation_code,  username, password)
                        values ('$guest_number','$firstname', '$middlename', '$lastname', '$contact','$email', NOW(), '$activation_code', '$username','$hashedPwd')")or die(mysqli_error($con));
                        echo "<script>alert('Guest successfully added!'); window.location='guest.php'</script>";
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
