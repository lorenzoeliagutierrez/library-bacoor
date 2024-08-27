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
         <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-body">
            <div class="box-header with-border">
                <div class="col-md-6 col-md-offset-3">
                                <form method="POST" class="form-horizontal">
                                <h3><i class="fa fa-briefcase"></i><strong> Book Inventory</strong></h3>

                                  <div class="control-group col-md-6"> 
                                    <hr>
                                 <p><strong>Date from:</strong></p>
                                <select name="datefrom" style="color:gray;" class="form-control has-feedback-left" placeholder="Date From" >
                                    <?php for ($i = 2023; $i >= 1960; $i--) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                        </div>

                        <div class="control-group col-md-6">
                                 <p><strong>Date to:</strong></p>
                                <select name="dateto" style="color:gray;" class="form-control has-feedback-left" placeholder="Date To" >
                                    <?php for ($i = 2023; $i >= 1960; $i--) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                        </div>
                        <hr>
                    <div class="form-group col-md-15">
                             <input placeholder="Search subject..." type="text" name="search" class="form-control">
                        </div>
                            <center><button name="submit" class="btn btn-lg btn-info">Search</button></center>
                    </form>
                </div>
                <hr>
                             <ul class="nav navbar-right panel_toolbox">
                             <li class="col-xs-2">
                            <a href="inventory_print.php" target="_blank" style="background:none;">
                            <button name="print" type="submit" class="btn btn-lg btn-danger"><i class="fa fa-print"></i><strong> Print</strong></button>
                            </a>
                        </li>
                    </ul>
              </div>
            <hr>
            <div class="box">
                            <div class="table-responsive">
                                <table s id="example1" class="table table-bordered" >
                                
                             <thead style="background: #FFFF">
                                <tr>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Edition</th>
                                    <th>Publication Date</th>
                                    <th>Quantity</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
<?php
             if (isset($_POST['submit'])) {
                                    $_SESSION['datefrom'] = $_POST['datefrom'];
                                    $_SESSION['dateto'] = $_POST['dateto'];
                                    $_SESSION['subject'] = $_POST['search'];
                                    $datefrom = $_POST['datefrom'];
                                    $dateto = $_POST['dateto'];


                                    $return_query= mysqli_query($con,
                                    "SELECT *,
                                    COUNT(call_no) AS total_quantity
                                    FROM book
                                    WHERE date_of_publ BETWEEN '$datefrom' AND '$dateto' 
                                    and subject LIKE '%$_POST[search]%' 
                                    GROUP BY call_no
                                    ORDER BY date_of_publ asc ") 
                                    or die (mysqli_error($con));
                                    while ($row= mysqli_fetch_array ($return_query) ){
                                    $id=$row['book_id'];
                            ?>  
                            <tr>
                                <td><?php echo $row['author']; ?></td> 
                                <td><?php echo $row['title']; ?></td> 
                                <td><?php echo $row['edition']; ?></td> 
                                <td><?php echo $row['date_of_publ']; ?></td> 
                                <td><?php echo $row['total_quantity']; ?></td> 
                            <?php if($_SESSION['role'] == "Administrator"){ ?>   
                                <td>
                    <a class="btn btn-default" for="ViewAdmin" href="view_book.php<?php echo '?book_id='.$id; ?>">
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <a class="btn btn-primary" for="ViewAdmin" href="edit_book.php<?php echo '?book_id='.$id; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-success" for="ViewAdmin" href="archive_book.php<?php echo '?book_id='.$id; ?>">
                                    <i class="fa fa-send"></i> Put to...
                                    </a>
                                   <a class="btn btn-danger" for="DeleteBook" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i> Delete
                                    </a>
                               
            
                                    <!-- delete modal book -->
                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete Book</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure you want to delete <?php echo $row['title']; ?>?
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                <a href="delete_book.php<?php echo '?book_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
