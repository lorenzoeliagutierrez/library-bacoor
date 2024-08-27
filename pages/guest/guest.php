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
              <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-body">
              <div class="card-header">
            <h2 class="text-center display-4">Search Guest</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="GET" class="form-horizontal">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search for Name....." name="search">
                            <div class="input-group-append">
                                <button name="submit" class="btn btn-lg btn-info">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <hr>
            <div class="box">
                            <div class="table-responsive">
                                <table s id="example1" class="table table-bordered table-hover">
                                
                            <thead style="background: #FFFF">
                                <tr>
                            <!---       <th>Image</th>  -->
                                    <th>ID Number</th>
                                    <th>Fullname</th>
                                    <th>Contact</th>
                                    <th>Date Added</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        if (isset($_GET['submit'])) {

        $return_query= mysqli_query($con,
            "SELECT * from guest
            where firstname LIKE '%$_GET[search]%' 
            or middlename LIKE '%$_GET[search]%' 
            or lastname LIKE '%$_GET[search]%' ") 
            or die (mysqli_error($con));
            while ($row= mysqli_fetch_array ($return_query) ){
            $id=$row['guest_id'];
    ?>
                            <tr>
                                 <td><?php echo $row['guest_number']; ?></td> 
                                <td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['guest_added']; ?></td> 
                            <?php if($_SESSION['role'] == "Administrator"){ ?>   
                                <td>


                    <a class="btn btn-primary" for="ViewAdmin" href="edit_guest.php<?php echo '?guest_id='.$id; ?>">

                                    <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="fa fa-trash icon-white"></i> Delete
                                    </a>
            
                                    <!-- delete modal user -->
                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure you want to delete <?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?>?
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                <a href="delete_guest.php<?php echo '?guest_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td> 
                            <?php } ?>
                            </tr>
                            <?php } }?>
                            
                            </tbody>
                            </table>
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
