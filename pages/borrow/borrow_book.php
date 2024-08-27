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
            <div class="card card-body">
              <div class="card-header">
                 <h3 class="col-xs-6"><span class="fa fa-shopping-cart"></span> READER'S CHECK OUT</h3>
          <hr>
              <!-- /.card-header -->
              <!-- form start -->

             <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">

                        <?php 
    $student_number = $_GET['student_number'];
    
    $user_query = mysqli_query($con,"SELECT * FROM user WHERE student_number = '$student_number' ");
    $user_row = mysqli_fetch_array($user_query);
?>
                    
                    <?php
                        $sql = mysqli_query($con,"SELECT * FROM user WHERE student_number = '$student_number' ");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    
                    <h3>
                    Borrower Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span>
                    </h3>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="box">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        
                                    <thead>
                                        <tr>
                                            <th>Accession No./Barcode</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Date Borrowed</th>
                                            <th>Due Date</th>
                                            <th>Penalty</th>
                                            <th>Action</th>
                                    <?php 
                                        $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
                                            LEFT JOIN book ON borrow_book.book_id = book.book_id
                                            WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error($con));
                                        $borrow_count = mysqli_num_rows($borrow_query);
                                        while($borrow_row = mysqli_fetch_array($borrow_query)){
                                            $due_date= $borrow_row['due_date'];
                                        
                                        $timezone = "Asia/Manila";
                                        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                        $cur_date = date("Y-m-d H:i:s");
                                        $date_returned = date("Y-m-d H:i:s");
                                
                                        
                                            $penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error($con));
                                            $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
                                            
                                            if($user_row['type'] == "Teacher"){
                                                $penalty = 'No Penalty';
                                            }else{
                                                if ($date_returned > $due_date) {
                                                $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                                } elseif ($date_returned < $due_date) {
                                                    $penalty = 'No Penalty';
                                                } else {
                                                    $penalty = 'No Penalty';
                                                }
                                            }
                                            
                                    ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr>
                                        
                                        <td><?php echo $borrow_row['accession_no']; ?></td>
                                        <td style="text-transform: capitalize"><?php echo $borrow_row['title']; ?></td>
                                        <td style="text-transform: capitalize"><?php echo $borrow_row['author']; ?></td>
                                        <td><?php echo $borrow_row['isbn_no']; ?></td>
                                        <td><?php echo date("m-d-y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                        <?php
                                            if ($borrow_row['moa_id'] != 'Hardbound') {
                                                echo "<td>".date('m-d-y h:m:s a',strtotime($borrow_row['due_date']))."</td>";
                                            } else {
                                                echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                            }
                                        ?>
                                    <!---   <td><?php // echo date("m-d-y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>    -->
                                        <?php
                                            if ($borrow_row['moa_id'] != 'Hardbound') {
                                                echo "<td>".$penalty."</td>";
                                            } else {
                                                echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                            }
                                        ?>
                                    <!---   <td><?php // echo $penalty; ?></td> -->
                                        <td>
                                        <form method="post" action="">
                                        <input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
                                        <input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
                                        <input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
                                        <input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
                                        <input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
                                        <input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
                                        <button name="return_now" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Return</button>
                                        </form>
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

                                            $update_copies = mysqli_query ($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error($con));
                                            $copies_row= mysqli_fetch_assoc($update_copies);
                                            
                                            $quantity = $copies_row['quantity'];
                                            $new_quantity = $quantity + 1;
                                            
                                            if ($new_quantity == '0') {
                                                $remark = 'Not Available';
                                            } else {
                                                $remark = 'Available';
                                            }
                                            
                                            mysqli_query($con,"UPDATE book SET quantity = '$new_quantity' where book_id = '$book_id'") or die (mysqli_error($con));
                                            mysqli_query($con,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ") or die (mysqli_error($con));
                                        
                                            $timezone = "Asia/Manila";
                                            if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                            $cur_date = date("Y-m-d H:i:s");
                                            $date_returned_now = date("Y-m-d H:i:s");
                                                      
                                            
                                            $penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error($con));
                                            $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
                                            
                                            if ($date_returned > $due_date) {
                                                $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                            } elseif ($date_returned < $due_date) {
                                                $penalty = 'No Penalty';
                                            } else {
                                                $penalty = 'No Penalty';
                                            }
                                        
                                            mysqli_query ($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error($con));
                                            
                                            mysqli_query ($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
                                            values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error($con));
                                            
                                            $report_history1=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error($con));
                                            $report_history_row1=mysqli_fetch_array($report_history1);
                                            $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];  
                                            
                                            mysqli_query($con,"INSERT INTO report 
                                            (book_id, user_id, admin_name, detail_action, date_transaction)
                                            VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error($con));
                                            
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
                        <div class="box">
                            <div class="box-body">
                                <div class="row" style="margin-top:30px;">
                                    <form method="post">
                                        <div class="col-xs-4">
                                            <input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="barcode" placeholder="Enter barcode here....." autofocus required />
                                        </div>
                                    </form>
                                    <table class="table table-bordered">
                                        <form method="post" action="">
                                        <!-- <th style="width:100px;">Book Image</th> -->
                                        <th>Accession No./Barcode</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>ISBN</th>
                                        <th>Campus</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <?php 
                                            if (isset($_POST['barcode'])){
                                                $barcode = $_POST['barcode'];
                                       
                                                $book_query = mysqli_query($con,"SELECT *, tbl_moa.moa FROM book
                                                LEFT JOIN tbl_moa ON tbl_moa.moa_id = book.moa_id
                                                LEFT JOIN campus ON book.campus_id = campus.campus_id 
                                                 WHERE accession_no = '$barcode' AND book.campus_id = '$row[campus_id]'  ") or die (mysqli_error($con));
                                                $book_count = mysqli_num_rows($book_query);
                                                $book_row = mysqli_fetch_array($book_query);
                                                
                                                if ($book_row['accession_no'] != $barcode){
                                                    echo '
                                                        <table>
                                                            <tr>
                                                                <td class="alert alert-info">No match for the barcode entered!</td>
                                                            </tr>
                                                        </table>
                                                    ';
                                                } elseif ($barcode == '') {
                                                    echo '
                                                        <table>
                                                            <tr>
                                                                <td class="alert alert-info">Enter the correct details!</td>
                                                            </tr>
                                                        </table>
                                                    ';
                                                }else{
                                        ?>
                                        <tr>
                                        <input type="hidden" name="user_id" value="<?php echo $user_row['user_id'] ?>">
                                        <input type="hidden" name="book_id" value="<?php echo $book_row['book_id'] ?>">

                                        <!-- <td>
                                        <?php if($book_row['book_image'] != ""): ?>
                                        <img src="upload/<?php echo $book_row['book_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php else: ?>
                                        <img src="images/book_image.jpg" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php endif; ?>
                                        </td>  -->
                                        <td><?php echo $book_row['accession_no'] ?></td>
                                        <td style="text-transform: capitalize"><?php echo $book_row['title'] ?></td>
                                        <td style="text-transform: capitalize"><?php echo $book_row['author'] ?></td>
                                        
                                        <td><?php echo $book_row['isbn_no'] ?></td>
                                        <td><?php echo $book_row['campus'] ?></td>
                                        <td><?php echo $book_row['remarks'] ?></td>
                                        <td>
                                        <?php
                                        if ($row['campus_id'] == $book_row['campus_id']) {
                                        ?>
                                        <button name="borrow" class="btn btn-info"><i class="fa fa-check"></i> Borrow</button>
                                        <?php } else {?>
                                        <button disabled name="borrow" class="btn btn-danger mb2"><i class="fa fa-times"></i> Not Available in your campus</button>
                                        <?php } ?>
                                        <a href="borrow_book.php?student_number=<?php echo $student_number ?>"><button name="cancel" class="btn btn-warning"><i class="fa fa-check"></i> Cancel</button></a></td>

                                        </tr>
                                        <?php } }?>

                                        <?php
                                        
                                        $allowable_days_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error($con));
                                        $allowable_days_row = mysqli_fetch_assoc($allowable_days_query);
                                        
                                        $timezone = "Asia/Manila";
                                        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                        $cur_date = date("Y-m-d H:i:s");
                                        $date_borrowed = date("Y-m-d H:i:s");
                                        $due_date = strtotime($cur_date);
                                        $due_date = strtotime("+".$allowable_days_row['no_of_days']." day", $due_date);
                                        $due_date = date('Y-m-d H:i:s', $due_date);
                            
                                        ?>
                                        <input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16" maxlength="10"  />
                                        <input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>" size="16" maxlength="10"  />
                                        
                                        <?php 
                                            if (isset($_POST['borrow'])){
                                                $user_id =$_POST['user_id'];
                                                $book_id =$_POST['book_id'];
                                                $date_borrowed =$_POST['date_borrowed'];
                                                $due_date =$_POST['due_date'];
                                                
                                                $trapBookCount= mysqli_query ($con,"SELECT count(*) as books_allowed from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed'") or die (mysqli_error($con));
                                                
                                                $countBorrowed = mysqli_fetch_assoc($trapBookCount);
                                                
                                                $bookCountQuery= mysqli_query ($con,"SELECT count(*) as book_count from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed' and book_id = $book_id") or die (mysqli_error($con));
                                                
                                                $bookCount = mysqli_fetch_assoc($bookCountQuery);
                                                
                                                $allowed_book_query= mysqli_query($con,"select * from allowed_book order by allowed_book_id DESC ") or die (mysqli_error($con));
                                                $allowed = mysqli_fetch_assoc($allowed_book_query);
                                                
                                                if ($countBorrowed['books_allowed'] == $allowed['qntty_books']){
                                                    echo "<script>alert(' ".$allowed['qntty_books']." ".'Books Allowed per User!'." '); window.location='borrow_book.php?student_number=".$student_number."'</script>";
                                                }elseif ($bookCount['book_count'] == 1){
                                                    echo "<script>alert('Book Already Borrowed!'); window.location='borrow_book.php?student_number=".$student_number."'</script>";
                                                }else{
                                                    
                                                $update_copies = mysqli_query ($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error($con));
                                                $copies_row= mysqli_fetch_assoc($update_copies);
                                                
                                                $quantity = $copies_row['quantity'];
                                                $new_quantity = $quantity - 1;
                                                
                                                if ($new_quantity < 0){
                                                    echo "<script>alert('Book out of Copy!'); window.location='borrow_book.php?student_number=".$student_number."'</script>";
                                                  }
                                               
                                                 else{
                                                    
                                                if ($new_quantity == '0') {
                                                    $remark = 'Not Available';
                                                } else {
                                                    $remark = 'Available';
                                                }
                                                
                                                mysqli_query($con,"UPDATE book SET quantity = '$new_quantity' where book_id = '$book_id' ") or die (mysqli_error($con));
                                                mysqli_query($con,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ") or die (mysqli_error($con));
                                                
                                                mysqli_query($con,"INSERT INTO borrow_book(user_id,book_id,date_borrowed,due_date,date_returned,borrowed_status)
                                                VALUES('$user_id','$book_id','$date_borrowed','$due_date','0000-00-00 00:00:00','borrowed')") or die (mysqli_error($con));
                                                
                                                $report_history=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error($con));
                                                $report_history_row=mysqli_fetch_array($report_history);
                                                $admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];  
                                                
                                                mysqli_query($con,"INSERT INTO report 
                                                (book_id, user_id, admin_name, detail_action, date_transaction)
                                                VALUES ('$book_id','$user_id','$admin_row','Borrowed Book',NOW())") or die(mysqli_error($con));
                                                
                                                }
                                                }
                                        ?>
                                                <script>
                                                    window.location="borrow_book.php?student_number=<?php echo $student_number ?>";
                                                </script>
                                        <?php   
                                            }
                                        ?>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- content starts here -->
                        
                        
                        
                    
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
