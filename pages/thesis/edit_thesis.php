<?php 
ob_start();
include ('../../includes/conn.php');
$ID=$_GET['thesis_id']; ?>

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
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> EDIT SPECIAL COLLECTION</h3><hr>
              <!-- /.card-header -->
              <!-- form start -->
                
                 <div class="x_content">
<?php
  $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Code #
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['accession_no']; ?>" name="code" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Student's Name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="<?php echo $row['nameofstudent']; ?>" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="pop_id">Course
                                    </label>
                                    <div class="col-md-8">
                                        <select name="course" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from courses where course_id not in ('".$row['course_id']."')") or die (mysqli_error($con));
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['course_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
<?php
  $query=mysqli_query($con,"SELECT * from special_collection
  LEFT JOIN categories ON categories.category_id = special_collection.category_id
  LEFT JOIN campus ON campus.campus_id = special_collection.campus_id
  LEFT JOIN department ON department.department_id = special_collection.department_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" value="<?php echo $row['title']; ?>" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="pop_id">Category
                                    </label>
                                    <div class="col-md-8">
                                        <select name="category" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from categories where category_id not in ('".$row['category_id']."')") or die (mysqli_error($con));
                                        while ($row2= mysqli_fetch_array ($result) ){
                                        $id=$row2['category_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row2['category_id']); ?>"><?php echo htmlspecialchars($row2['categories']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Campus</label>
                                  <div class="col-md-8">
                                    <select name="campus" class="select2_single form-control" tabindex="-1" >
                                            <option selected disabled> Select Campus </option>
                                            <option selected value="<?php echo htmlspecialchars($row['campus_id']); ?>"><?php echo htmlspecialchars($row['campus']); ?></option>
                                        <?php
                                        if ($_SESSION['campus_id'] == 99) {
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id NOT IN ('$row[campus_id]')") or die (mysql_error());
                                        while ($row3= mysqli_fetch_array ($result) ){
                                        $id=$row3['campus_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row3['campus_id']); ?>"><?php echo htmlspecialchars($row3['campus']); ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Department</label>
                                  <div class="col-md-8">
                                    <select name="department" class="form-control" tabindex="-1" required="required">
                                    <option value="<?php echo htmlspecialchars($row['department_id']); ?>"><?php echo htmlspecialchars($row['department']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from department") or die (mysqli_error($con));
                                        while ($row2= mysqli_fetch_array ($result) ){
                                        $id=$row2['department_id'];
                                        ?>
                                      <option value="<?php echo $row2['department_id']; ?>"><?php echo $row2['department']; ?>
                                      </option>
                                      <?php } ?>
                                    </select>
                                    </div>
                                </div>
<?php
  $query=mysqli_query($con,"SELECT * from special_collection LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id where thesis_id='$ID'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Date
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="date" value="<?php echo $row['deyt']; ?>" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            

                            
                            
<?php
$id =$_GET['thesis_id'];
if (isset($_POST['update'])) {
                               
$code = mysqli_real_escape_string($con,$_POST['code']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$course = mysqli_real_escape_string($con,$_POST['course']);
$title = mysqli_real_escape_string($con,$_POST['title']);
$category = mysqli_real_escape_string($con,$_POST['category']);
$date = mysqli_real_escape_string($con,$_POST['date']);
$campus = mysqli_real_escape_string($con,$_POST['campus']);
$department = mysqli_real_escape_string($con,$_POST['department']);



{
mysqli_query($con," UPDATE special_collection SET department_id = '$department', campus_id = '$campus',accession_no='$code', nameofstudent='$name', course_id='$course', title='$title', category_id='$category', deyt='$date' WHERE thesis_id = '$id' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Update Info!'); history.go(-2);</script>";  
}
                                    
}
?>
                            </div>
                        </div>
                        <!-- content starts here -->

                        
                        <!-- content ends here -->
          
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
