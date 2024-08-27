<?php 
ob_start();
$ID=$_GET['ebook_id'];
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-body">
              <div class="card-header">
                <h3 class="col-xs-6"><span class="fa fa-info"></span> E-BOOK INFORMATION</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 
                  <div class="col-md-10 grid-margin stretch-card">
                          <?php
                            $sql="SELECT fileName FROM ebooks WHERE ebook_id = " . $_GET['ebook_id'];
                            $query=mysqli_query($con,$sql);
                            while ($info=mysqli_fetch_array($query)) {

                                // This line is the PATH for checking and viewing PDF Files.
                              if (file_exists("../../ebooks/" . $info['fileName'])){ ?> 
                                <embed type="application/pdf" src="../../../ebooks/<?php echo $info['fileName'] ; ?>" width="1100" height="950"> 

                                <?php
                          }
                                else {
                                  echo 'File not found.'; 
                                }
                                ?>                          
                          <?php
                            }
                          ?>
                  </div>      

                          <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a href="javascript:history.back()" style="background:none;">
                            <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                            </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>         
              </div>
            </div>

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
