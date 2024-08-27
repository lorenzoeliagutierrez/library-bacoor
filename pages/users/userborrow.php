<?php 
ob_start();
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
            <div class="card card-default">
              <div class="card-header">
                <h3 class="col-xs-6"><span class="fa fa-book"></span> BORROWED BOOKS</h3>
              <hr>
              <!-- /.card-header -->
              <!-- form start -->
          <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    <?php 
    $user_query = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id_session' ");
    $user_row = mysqli_fetch_array($user_query);
?>
                    <?php
                        $sql = mysqli_query($con,"SELECT * FROM user WHERE user_id = '$id_session' ");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h2>
                    Borrower Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span>
                    </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
                                
                            <thead style="background: #FFFF">
                                <tr>
                                    <th>Accession No./Barcode</th>
                                    <th>Call No.</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <!-- <th>ISBN</th> -->
                                    <th>Date Borrowed</th>
                                    <th>Due Date</th>
                                    <th>Penalty</th>
                                    <th>Status</th>
                            <?php 
                                $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                    LEFT JOIN book ON borrow_book.book_id = book.book_id
                                    WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysql_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                    $due_date= $borrow_row['due_date'];
                                
                                $timezone = "Asia/Manila";
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                $cur_date = date("Y-m-d H:i:s");
                                $date_returned = date("Y-m-d H:i:s");
                                //$due_date = strtotime($cur_date);
                                //$due_date = strtotime("+3 day", $due_date);
                                //$due_date = date('F j, Y g:i a', $due_date);
                                ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
                                
                                    $penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysql_error());
                                    $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
                                    
                                    if ($date_returned > $due_date) {
                                        $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                    } elseif ($date_returned < $due_date) {
                                        $penalty = 'No Penalty';
                                    } else {
                                        $penalty = 'No Penalty';
                                    }
                            ?>      
                                </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                
                                <td><?php echo $borrow_row['accession_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['call_no']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['title']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['author']; ?></td>
                                <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                <?php
                                    if ($borrow_row['moa_id'] != 'Hardbound') {
                                        echo "<td>".date('M d, Y h:m:s a',strtotime($borrow_row['due_date']))."</td>";
                                    } else {
                                        echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                    }
                                ?>
                            <!---   <td><?php // echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>    -->
                                <?php
                                    if ($borrow_row['moa_id'] != 'Hardbound') {
                                        echo "<td>".$penalty."</td>";
                                    } else {
                                        echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                    }
                                ?>
                            <!---   <td><?php // echo $penalty; ?></td> -->
                                <td style="background: #e35d6a; color: white;">
                                <form method="post" action="">
                                <input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
                                <input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
                                <input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
                                <input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
                                <input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
                                <input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
                                </form>
                                <strong>Not Returned</strong>
                                </td>
                                
                            </tr>
                            
                            <?php 
                            }
                            if ($borrow_count <= 0){
                                echo '
                                    <table style="float:right;">
                                        <tr>
                                            <td style="padding:10px;" class="alert alert-danger">No books borrowed</td>
                                        </tr>
                                    </table>
                                ';
                            }                           
                            ?>
                            <?php
                                if (isset($_POST['return_now'])) {
                                    $user_id= $_POST['user_id'];
                                    $borrow_book_id= $_POST['borrow_book_id'];
                                    $book_id= $_POST['book_id'];
                                    $date_borrowed= $_POST['date_borrowed'];
                                    $due_date= $_POST['due_date'];
                                    $date_returned = $_POST['date_returned'];

                                    $update_copies = mysqli_query ($con,"SELECT * from book where book_id = '$book_id' ") or die (mysql_error());
                                    $copies_row= mysqli_fetch_assoc($update_copies);
                                    
                                    $quantity = $copies_row['quantity'];
                                    $new_quantity = $quantity + 1;
                                    
                                    if ($new_quantity == '0') {
                                        $remark = 'Not Available';
                                    } else {
                                        $remark = 'Available';
                                    }
                                    
                                    mysqli_query($con,"UPDATE book SET quantity = '$new_quantity' where book_id = '$book_id'") or die (mysql_error());
                                    mysqli_query($con,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ") or die (mysql_error());
                                
                                    $timezone = "Asia/Manila";
                                    if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                    $cur_date = date("Y-m-d H:i:s");
                                    $date_returned_now = date("Y-m-d H:i:s");
                                    //$due_date = strtotime($cur_date);
                                    //$due_date = strtotime("+3 day", $due_date);
                                    //$due_date = date('F j, Y g:i a', $due_date);
                                    ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));            
                                    
                                    $penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysql_error());
                                    $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
                                    
                                    if ($date_returned > $due_date) {
                                        $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                    } elseif ($date_returned < $due_date) {
                                        $penalty = 'No Penalty';
                                    } else {
                                        $penalty = 'No Penalty';
                                    }
                                
                                    mysqli_query ($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysql_error());
                                    
                                    mysqli_query ($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
                                    values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysql_error());
                                    
                                    $report_history1=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysql_error());
                                    $report_history_row1=mysqli_fetch_array($report_history1);
                                    $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];  
                                    
                                    mysqli_query($con,"INSERT INTO report 
                                    (book_id, user_id, admin_name, detail_action, date_transaction)
                                    VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysql_error());
                                    
                            ?>
                                    <script>
                                        window.location="borrow_book.php?student_number=<?php echo $student_number ?>";
                                    </script>
                            <?php 
                                                                }
                            ?>
                            
                            </tbody>
                            </table>
                        </div>
                     </div>
                 </div>             
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
