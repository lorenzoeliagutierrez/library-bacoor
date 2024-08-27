

<?php 
include "../../includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include "../../includes/header.php";
?>
<?php
if ($_SESSION['userid'] == 99) {
  if (isset($_GET['campus'])) {
      $_SESSION['campus'] = $_GET['campus'];
      
  } else {
      if (isset($_SESSION['campus']) && $_SESSION['campus'] != "All") {
          $_SESSION['campus'] = $_SESSION['campus'];
          
      } else {
          $_SESSION['campus'] = "All";
          
      }
  }

  if (isset($_GET['department'])) {
    $_SESSION['department'] = $_GET['department'];

  } else {

      if (isset($_SESSION['department']) && $_SESSION['department'] != "All") {
          $_SESSION['department'] = $_SESSION['department'];
          
      } else {
          $_SESSION['department'] = "All";
          
      }
      
  }
} else {
  $campus = mysqli_query($con, "SELECT * FROM campus WHERE campus_id = '$_SESSION[campus_id]'");
  $row1 = mysqli_fetch_array($campus);
  $_SESSION['campus'] = $row1['campus'];
} 
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
                <div class="row">
                    <div class="col-md-6">
                        <h3><span class="fa fa-book"></span> BORROWED BOOKS FOR <b><?php echo strtoupper($_SESSION['campus'])?> CAMPUS</b></h3>
                    </div>
                
                <div class="col-md-6 ">
                  <?php
                  if ($_SESSION['userid'] == 99) {
                  ?>
                <button type="button" class="btn btn-md btn-info mx-1 float-right" data-toggle="modal"
                          data-target="#filter">
                          <i class="fas fa-sliders-h"></i> Filter
                </button>
                <?php } ?>
                <!-- delete modal book -->
                <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i
                                class="glyphicon glyphicon-user"></i> Filter Campus</h4>
                          </div>
                          <div class="modal-body">
                            <form method="GET">
                              <div class="form-group">
                                <div class="col-md">
                                  <label for="campus">Campus</label>
                                  <select name="campus" class="form-control" tabindex="-1" required="required">
                                    <?php
                                    if ($_SESSION['campus'] == "All") {
                                      ?>
                                      <option value="All">All (Current Selected)
                                      </option>
                                      </option>
                                      <?php
                                      $result = mysqli_query($con, "select * from campus") or die(mysqli_error($con));
                                      while ($row4 = mysqli_fetch_array($result)) {
                                        $id = $row4['campus_id'];
                                        ?>
                                        <option value="<?php echo $row4['campus']; ?>">
                                          <?php echo $row4['campus']; ?>
                                        </option>
                                      <?php } ?>
                                      <?php
                                    } else {
                                      ?>
                                      </option>
                                      <?php
                                      $result = mysqli_query($con, "SELECT * FROM campus WHERE campus = '$_SESSION[campus]'") or die(mysqli_error($con));
                                      while ($row4 = mysqli_fetch_array($result)) {
                                        $id = $row4['campus_id'];
                                        ?>
                                        <option value="<?php echo $row4['campus']; ?>">
                                          <?php echo $row4['campus']; ?> (Current Selected)
                                        </option>
                                      <?php } ?>
                                      </option>
                                      <?php
                                      $result = mysqli_query($con, "SELECT * FROM campus WHERE campus NOT IN ('$_SESSION[campus]')") or die(mysqli_error($con));
                                      while ($row4 = mysqli_fetch_array($result)) {
                                        $id = $row4['campus_id'];
                                        ?>
                                        <option value="<?php echo $row4['campus']; ?>">
                                          <?php echo $row4['campus']; ?>
                                        </option>
                                      <?php } ?>
                                      <option value="All">All
                                      </option>
                                      <?php
                                    }
                                    ?>



                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i
                                    class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                <button type="submit" class="btn btn-primary"><i
                                    class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                
              </div>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->

      <!-- Main row -->
      
        <!-<div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
        <!-- <div class="col-xs-3">
            <form method="POST" action="sort_borrowed_book.php">
            <input type="date" class="form-control" name="sort" value="<?php echo date('Y-m-d'); ?>">
            <button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Borrowed</button>
            </form>
        </div> -->  
                   
                    
                    <?php 
                    $count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book`")) or die(mysql_error());
                    if ($_SESSION['campus'] == "All") {
                      $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed'")) or die(mysql_error());
                      $count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'returned'")) or die(mysql_error());

                    } else {
                      $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book`
                      LEFT JOIN book ON book.book_id = borrow_book.book_id
                      LEFT JOIN campus ON campus.campus_id = book.campus_id
                      LEFT JOIN department ON department.department_id = book.department_id
                      WHERE campus = '$_SESSION[campus]' AND `borrowed_status` = 'borrowed'")) or die(mysql_error());

                      $count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book`
                      LEFT JOIN book ON book.book_id = borrow_book.book_id
                      LEFT JOIN campus ON campus.campus_id = book.campus_id
                      LEFT JOIN department ON department.department_id = book.department_id
                      WHERE campus = '$_SESSION[campus]' AND `borrowed_status` = 'returned'")) or die(mysql_error());

                    } 
                    
                    ?>
                    <hr>
                    <div class="col-xs-6">
                        <span style="float:right; ">
                        <!---   <a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
                            <a href="borrowed_book.php?campus=<?php echo $_SESSION['campus']?>"><button class="btn btn-success"><i class="fa fa-info"></i> Borrowed Books for <?php echo $_SESSION['campus']; ?> Campus (<?php echo $count1['total']; ?>)</button></a>
                            <a href="returned_book.php?campus=<?php echo $_SESSION['campus']?>"><button class="btn btn-danger"><i class="fa fa-info"></i> Returned Books for <?php echo $_SESSION['campus']; ?> Campus (<?php echo $count2['total']; ?>)</button></a>
                        </span>
                    </div>
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
                                <hr>
                            <thead style="background: #FFFF">
                                <tr>
                                    <th>Accession No./Barcode</th>
                                    <th>Borrower Name</th>
                                    <th>Title</th>
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Date Returned</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                            if ($_SESSION['campus'] == "All") {
                                    $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                    LEFT JOIN book ON borrow_book.book_id = book.book_id 
                                    LEFT JOIN user ON borrow_book.user_id = user.user_id
                                    LEFT JOIN campus ON campus.campus_id = book.campus_id
                                    LEFT JOIN department ON department.department_id = book.department_id
                                    WHERE borrowed_status = 'borrowed'
                                    ORDER BY borrow_book.borrow_book_id DESC") or die(mysql_error());
                            } else {
                                    $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                    LEFT JOIN book ON borrow_book.book_id = book.book_id 
                                    LEFT JOIN user ON borrow_book.user_id = user.user_id
                                    LEFT JOIN campus ON campus.campus_id = book.campus_id
                                    LEFT JOIN department ON department.department_id = book.department_id
                                    WHERE borrowed_status = 'borrowed' AND campus = '$_SESSION[campus]'
                                    ORDER BY borrow_book.borrow_book_id DESC") or die(mysql_error());
                            }
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                    $id = $borrow_row ['borrow_book_id'];
                                    $book_id = $borrow_row ['book_id'];
                                    $user_id = $borrow_row ['user_id'];
                            ?>
                            <tr>
                                <td><?php echo $borrow_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['title']; ?></td>
                                <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>
                                <td><?php  if($borrow_row['date_returned'] == "0000-00-00 00:00:00"){
                                    echo "Pending";} else{ echo date("M d, Y h:m:s a",strtotime($borrow_row['date_returned']));} ?></td>
                                <?php
                                    if ($borrow_row['borrowed_status'] != 'returned') {
                                        echo "<td class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
                                    } else {
                                        echo "<td  class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
                                    }
                                ?>
                            </tr>
                            <?php } 
                            if ($borrow_count <= 0){
                                echo '
                                    <table style="float:right;">
                                        <tr>
                                            <td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
                                        </tr>
                                    </table>
                                ';
                            }                           
                            ?>
                            </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                        <!-- content starts here -->

                        
                        
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
