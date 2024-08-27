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
            <h2 class="text-center display-4">Search Inactive Books</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="GET" class="form-horizontal">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search for Title, Author, Call Number..." name="search">
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
                                    <th>Acc No./Bcode</th>
                                    <th>Call Number</th>
                                    <th>Author/s</th>
                                    <th>Title</th>
                                    <th>Editor</th>
                                    <th>Edition</th>
                                    <th>Place of Publ.</th>
                                    <th>Publisher</th>
                                    <th>Date of Publ.</th>
                                    <th>No. of Pages</th>
                                    <th>Series</th>
                                    <th>Notation 1</th>
                                    <th>Notation 2</th>
                                    <th>ISBN No.</th>
                                    <th>ISSN No.</th>
                                    <th>Subject</th>
                                    <th>Abstract</th>
                                    <th>Moa</th>
                                    <th>Remarks</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' <th>Action</th>';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        if (isset($_GET['submit'])) {


        $return_query= mysqli_query($con,"SELECT * from archive 
        LEFT JOIN tbl_moa ON tbl_moa.moa_id = archive.moa_id
        LEFT JOIN tbl_publishers ON tbl_publishers.publisher_id = archive.publisher_id
        LEFT JOIN tbl_placeofpublications ON tbl_placeofpublications.pop_id = archive.pop_id
        where call_no LIKE '%$_GET[search]%' or title LIKE '%$_GET[search]%' or subject LIKE '%$_GET[search]%' or author LIKE '%$_GET[search]%' or accession_no LIKE '%$_GET[search]%' or remarks LIKE '%$_GET[search]%' ") or die (mysqli_error($con));
        while ($row= mysqli_fetch_array ($return_query) ){
        $id=$row['archive_id'];
    ?>
                            <tr>
                                  <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->
                                <td><?php echo $row['accession_no'];?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['call_no']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']; ?></td>
                                <td style="word-wrap: break-word; width: 10em;"><?php echo $row['title']; ?></td>
                                <td><?php echo $row['editor']; ?></td>   
                                <td><?php echo $row['edition']; ?></td>
                                <td><?php echo $row['placeofpublication']; ?></td> 
                                <td><?php echo $row['publisher']; ?></td> 
                                <td><?php echo $row['date_of_publ']; ?></td> 
                                <td><?php echo $row['page_no']; ?></td> 
                                <td><?php echo $row['series']; ?></td> 
                                <td><?php echo $row['notation1']; ?></td> 
                                <td><?php echo $row['notation2']; ?></td> 
                                <td><?php echo $row['isbn_no']; ?></td> 
                                <td><?php echo $row['issn_no']; ?></td> 
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['abstract']; ?></td> 
                                <td><?php echo $row['moa']; ?></td>
                                <td><?php echo $row['remarks']; ?></td>
                            <?php if($_SESSION['role'] == "Administrator"){ ?>   
                                <td>
                    <a class="btn btn-info" for="ViewAdmin" href="view_archive.php<?php echo '?archive_id='.$id; ?>">
                                        <i class="fa fa-eye"></i> View
                                    </a><br>
                                    <a class="btn btn-success" for="ViewAdmin" href="restore_book.php<?php echo '?archive_id='.$id; ?>">
                                    <i class="fa fa-edit"></i> Restore
                                    </a><br>
                                   <a class="btn btn-danger" for="DeleteBook" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="fa fa-trash icon-white"></i> Delete
                                    </a><br>
                               
            
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
                                                <a href="del_archive.php<?php echo '?archive_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
                </div>
            </div>.
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
