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
                 <h3 class="col-xs-6"><span class="fa fa-user-plus"></span> ADD SPECIAL COLLECTION</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Code # <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="code" placeholder="Input code number....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Name of Student/s</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" placeholder="Input name of Student/s....." id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Course
                                    </label>
                                    <div class="col-md-8">
                                        <select name="course" class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>> Select Course</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from courses") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['course_id'];
                                        ?>
                                            <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">No. of Copy
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input no. of copy....." required  autocomplete="off" name="quantity" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input title....."  autocomplete="off" name="title" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Category
                                    </label>
                                    <div class="col-md-8">
                                        <select name="category" class="select2_single form-control" tabindex="-1">
                                            <option selected disabled>> Select Category</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from categories") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['category_id'];
                                        ?>
                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['categories']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Campus</label>
                                  <div class="col-md-8">
                                    <select name="campus" class="form-control" tabindex="-1" required="required">
                                      <option selected disabled>-- Select Campus --
                                      </option>
                                        <?php
                                        if ($_SESSION['userid'] == 99) {
                                        ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['campus_id'];
                                        ?>
                                            <option value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id = '$_SESSION[campus_id]'") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['campus_id'];
                                        ?>
                                            <option selected value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Department</label>
                                  <div class="col-md-8">
                                    <select name="department" class="form-control" tabindex="-1" required="required">
                                      <option selected disabled>-- Select Department --
                                      </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from department") or die (mysqli_error($con));
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['department_id'];
                                        ?>
                                      <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department']; ?>
                                      </option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Date
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input Date....."  autocomplete="off" name="date" id="last-name2" class="form-control col-md-12 col-xs-12">
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
                                $code = mysqli_real_escape_string($con,$_POST['code']);
                                $name = mysqli_real_escape_string($con,$_POST['name']);
                                $course = mysqli_real_escape_string($con,$_POST['course']);
                                $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
                                $title = mysqli_real_escape_string($con,$_POST['title']);
                                $category = mysqli_real_escape_string($con,$_POST['category']);
                                $date = mysqli_real_escape_string($con,$_POST['date']);
                                $campus = mysqli_real_escape_string($con,$_POST['campus']);
                                $department = mysqli_real_escape_string($con,$_POST['department']);

                    if ($quantity == 0 ) {
                        $remarks = 'Not Available';
                    }else{
                        $remarks = 'Available';
                    }
  
                        mysqli_query($con,"INSERT into special_collection (department_id,campus_id ,accession_no, nameofstudent, course_id, quantity, title, deyt, category_id, remarks)
                        values ('$department','$campus','$code', '$name', '$course','$quantity', '$title', '$date','$category','$remarks')")or die(mysql_error());
                        echo "<script>alert('Special Collection successfully added!'); window.location='add_thesis.php'</script>";
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
