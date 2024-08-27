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
<?php
    include ('../../includes/conn.php');

    if (isset($_POST['student_number'])) {

    $student_number = $_POST['student_number'];

    $sql = mysqli_query($con,"SELECT * FROM user WHERE student_number = '$student_number' ");
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);

        if($count <= 0){
            echo "<div class='alert alert-success'>".'No match found for the School ID Number'."</div>";
        }else{
            $student_number = $_POST['student_number'];
            header('location:borrow_book.php?student_number='.$student_number);
           
        }
    }
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-body">
              <div class="card-header">
                <h3 class="col-xs-6"><span class="fa fa-circle"></span> SELECT STUDENT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="row">
                    <div class="col-md-4"></div>
                        <form method="post">
                                        <div class="col-xs-4">Scan ID Barcode
                                            <input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="student_number" placeholder="Enter barcode here....." autofocus required />
                                        </div>
                                    </form>             

    <div class="col-md-4"></div>
</div>
</div>          
                        <!-- content ends here -->
                            </div>
                        </div>


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
