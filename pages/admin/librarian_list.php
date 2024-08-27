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
                <h3 class="col-xs-6"><span class="fa fa-users"></span> LIBRARIAN'S INFORMATION</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

               <div class="box">
                                <div class="box-body">
                        <div class="table-responsive">
                            
                                    <table id="example1" class="table table-bordered table-striped">
                            <thead style="background: #FFFF">
                                <tr>
                            <!---       <th>Image</th>  -->
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>e-Mail Address</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                          <?php
                            $result= mysqli_query($con,"select * from admin order by admin_id DESC") or die (mysql_error());
                            while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['admin_id'];
                            ?>
                            <tr>
                        <!---       <td>
                                <?php // if( $row['user_image'] != ""): ?>
                                <img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                <?php // else: ?>
                                <img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                <?php // endif; ?>
                                </td>  either this <td><a target="_blank" href="view_members_barcode.php?code=<?php // echo $row['school_number']; ?>"><?php // echo $row['school_number']; ?></a></td> -->
                                <td><?php echo $row['firstname']; ?></td> 
                                <td><?php echo $row['middlename']; ?></td> 
                                <td><?php echo $row['lastname']; ?></td> 
                                <td><?php echo $row['email']; ?></td> 
                                <td><?php echo $row['username']; ?></td>
                                <td>
                                    <a class="btn btn-info" for="ViewAdmin" href="edit_admin.php<?php echo '?admin_id='.$id; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i> Delete
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
                                                <a href="delete_admin.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td> 
                            </tr>
                            <?php } ?>
                            </tbody>
                            </table>
                                </div>
                            </div>
                            
                        </div>
                        
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
