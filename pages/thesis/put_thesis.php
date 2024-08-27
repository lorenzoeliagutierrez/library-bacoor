<?php 
ob_start();
include('../../includes/conn.php');
$get_id=$_GET['thesis_id'];?>

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
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> ARCHIVE BOOK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

          <div class="x_content">
<?php
  $query=mysqli_query($con,"select * from special_collection where thesis_id='$get_id'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>    

                <div class="box">
                    <div class="box-body">
                        <center><h3><strong>You are about to send this lists into "INACTIVE STATUS" </h3></center><br>

                        
                               <form method="post" class="forms-sample">
                    <div class="form-group">
                         <label class="control-label col-md-8" for="call_no">Code Number
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="accession_no" value="<?php echo htmlspecialchars($row['accession_no']); ?>" id="call_no" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="title">Name of Student/s
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="nameofstudent" value="<?php echo htmlspecialchars($row['nameofstudent']); ?>" id="title" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                 <?php
                                  $query1=mysqli_query($con,"SELECT * from special_collection 
        LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id 
                                  where thesis_id='$get_id'")or die(mysqli_error($con));
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="pop_id">Course
                                    </label>
                                    <div class="col-md-8">
                                        <select name="course" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['course_id']); ?>"><?php echo htmlspecialchars($row['course_name']); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="subject_id">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" id="title" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="pop_id">Category
                                    </label>
                                    <div class="col-md-8">
                                        <select name="category" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['category_id']); ?>"><?php echo htmlspecialchars($row['categories']); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" step="1" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="date_of_publ">Date
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="deyt" id="deyt" value="<?php echo htmlspecialchars($row['deyt']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Reason:</label>
                                    <div class="col-md-8">
                                        <select name="remarks" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Transferred">Transferred</option>
                                            <option value="Donated">Donated</option>
                                            <option value="Weeded">Weeded</option>
                                            <option value="Archived">Archived</option>
                                        </select>
                                    </div>
                                </div>
                               
                               <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript: history.go(-1)"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Archive</button>
                                    </div>
                                </div>
                            </form>
<?php

if (isset($_POST['update'])) {
                               
$accession_no = $_POST['accession_no'];
$nameofstudent=$_POST['nameofstudent'];
$course=$_POST['course'];
$title=$_POST['title'];
$category=$_POST['category'];
$deyt=$_POST['deyt'];
$quantity=$_POST['quantity'];
$remarks=$_POST['remarks'];
$oras = date('Y-m-d');



{

mysqli_query($con,"delete from special_collection where thesis_id = '$get_id' ")or die(mysql_error());
mysqli_query($con," INSERT INTO arc_special_collection (accession_no,nameofstudent,course_id,title,quantity,deyt,category_id,remarks,oras) VALUES ('$accession_no','$nameofstudent','$course','$title','$quantity','$deyt','$category','$remarks','$oras') ") or die(mysqli_error($con));
echo "<script>alert('Archiving Successful!');history.go(-2);</script>";  
}
                                    
}
?>
                </div>
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
