<?php 
include "../../includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include "../../includes/header.php";
?>

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
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-body">
             
              <!-- /.card-header -->
              <!-- form start -->

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                <h3>
                    <i class= "fa fa-cog fa-spin"></i> Settings
                </h3><hr>

        <div class="clearfix"></div>
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                <?php include ('allowed_qntty.php'); ?>
                
                <?php include ('penalty.php'); ?>
                
                <?php include ('allowed_days.php'); ?>
                
                <div class="clearfix"></div>
                    
            </div>
        </section>
        <!-- /.Left col -->

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
