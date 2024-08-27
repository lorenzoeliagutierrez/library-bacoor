
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
                <h3 class="col-xs-6"><span class="fa fa-subject"></span> SUBJECTS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<hr>
 <ul class="nav navbar-right panel_toolbox">
                            <li class="col-xs-2">
                            <a href="add_subject.php" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Subject</button>
                            </a>
                            </li>
                        </ul>

              <hr>
   <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                        <!-- content starts here -->
                                <div class="table-responsive">
                            <table s id="example1" class="table table-striped table-bordered" >
                            <thead style="background: #ccc">
                                <tr>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php include '../../includes/conn.php';
                                $query = mysqli_query($con, "SELECT * FROM tbl_subjects");
                                while ($row= mysqli_fetch_array ($query)){
                                    ?><tr>
                                    <td><?php echo $row['subject_name']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                                
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
