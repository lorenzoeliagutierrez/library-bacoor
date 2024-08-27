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
                 <h3 class="col-xs-6"><span class="fa fa-shopping-cart"></span> SPECIAL COLLECTION CHECK OUT</h3>
           <hr>
              <!-- /.card-header -->
              <!-- form start -->
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
                                            <th>Code No./Barcode</th>
                                            <th>Name of Student/s</th>
                                            <th>Course</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Category</th>
                                            <th>Date Borrowed</th>
                                            <th>Due Date</th>
                                            <th>Penalty</th>
                                            <th>Action</th>
                                    <?php 
                                        $borrow_query = mysqli_query($con,"SELECT * FROM borrow_collection
                                            LEFT JOIN special_collection ON borrow_collection.thesis_id = special_collection.thesis_id
                                            LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id
                                            WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY special_collection.thesis_id DESC") or die(mysqli_error($con));
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
                                        <td style="text-transform: capitalize"><?php echo $borrow_row['nameofstudent']; ?></td>
                                        <td><?php echo $borrow_row['course_name']; ?></td>
                                        <td style="text-transform: capitalize"><?php echo $borrow_row['title']; ?></td>
                                        <td style="text-transform: capitalize"><?php echo $borrow_row['deyt']; ?></td>
                                        <td style="text-transform: capitalize"><?php echo $borrow_row['categories']; ?></td>
                                        <td><?php echo date("m-d-y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
                                        <?php
                                            if ($borrow_row['category_id'] != 'Hardbound') {
                                                echo "<td>".date('m-d-y h:m:s a',strtotime($borrow_row['due_date']))."</td>";
                                            } else {
                                                echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                            }
                                        ?>
                                    <!---   <td><?php // echo date("m-d-y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>    -->
                                        <?php
                                            if ($borrow_row['category_id'] != 'Hardbound') {
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
                                        <input type="hidden" name="borrow_id" value="<?php echo $borrow_row['borrow_id']; ?>">
                                        <input type="hidden" name="thesis_id" value="<?php echo $borrow_row['thesis_id']; ?>">
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
                                            $borrow_id= $_POST['borrow_id'];
                                            $thesis_id= $_POST['thesis_id'];
                                            $date_borrowed= $_POST['date_borrowed'];
                                            $due_date= $_POST['due_date'];
                                            $date_returned = $_POST['date_returned'];

                                            $update_copies = mysqli_query ($con,"SELECT * from special_collection where thesis_id = '$thesis_id' ") or die (mysqli_error($con));
                                            $copies_row= mysqli_fetch_assoc($update_copies);
                                            
                                            $quantity = $copies_row['quantity'];
                                            $new_quantity = $quantity + 1;
                                            
                                            if ($new_quantity == '0') {
                                                $remark = 'Not Available';
                                            } else {
                                                $remark = 'Available';
                                            }
                                            
                                            mysqli_query($con,"UPDATE special_collection SET quantity = '$new_quantity' where thesis_id = '$thesis_id'") or die (mysqli_error($con));
                                            mysqli_query($con,"UPDATE special_collection SET remarks = '$remark' where thesis_id = '$thesis_id' ") or die (mysqli_error($con));
                                        
                                            $timezone = "Asia/Manila";
                                            if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                            $cur_date = date("Y-m-d H:i:s");
                                            $date_returned_now = date("Y-m-d H:i:s");
                                            //$due_date = strtotime($cur_date);
                                            //$due_date = strtotime("+3 day", $due_date);
                                            //$due_date = date('F j, Y g:i a', $due_date);
                                            ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));            
                                            
                                            $penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error($con));
                                            $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
                                            
                                            if ($date_returned > $due_date) {
                                                $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                            } elseif ($date_returned < $due_date) {
                                                $penalty = 'No Penalty';
                                            } else {
                                                $penalty = 'No Penalty';
                                            }
                                        
                                            mysqli_query ($con,"UPDATE borrow_collection SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_id= '$borrow_id' and user_id = '$user_id' and thesis_id = '$thesis_id' ") or die (mysqli_error($con));
                                            
                                            mysqli_query ($con,"INSERT INTO return_collection (user_id, thesis_id, date_borrowed, due_date, date_returned, book_penalty)
                                            values ('$user_id', '$thesis_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error($con));
                                            
                                    ?>
                                            <script>
                                                window.location="borrow_collect.php?student_number=<?php echo $student_number ?>";
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
                                            <th>Code No./Barcode</th>
                                            <th>Name of Student/s</th>
                                            <th>Course</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Category</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        <?php 
                                            if (isset($_POST['barcode'])){
                                                $barcode = $_POST['barcode'];
                                        // $category_id=$row['category_id'];
                                        
                                        // $cat_query = mysqli_query($con,"select * from category where category_id = '$category_id'")or die(mysqli_error());
                                        // $cat_row = mysqli_fetch_array($cat_query);
                                        
                                                $book_query = mysqli_query($con,"SELECT * FROM special_collection
                                                LEFT JOIN categories ON categories.category_id = special_collection.category_id
        LEFT JOIN courses ON courses.course_id = special_collection.course_id
                                                 WHERE accession_no = '$barcode'  ") or die (mysqli_error($con));
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
                                        <input type="hidden" name="thesis_id" value="<?php echo $book_row['thesis_id'] ?>">

                                        <!-- <td>
                                        <?php if($book_row['book_image'] != ""): ?>
                                        <img src="upload/<?php echo $book_row['book_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php else: ?>
                                        <img src="images/book_image.jpg" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                        <?php endif; ?>
                                        </td>  -->
                                        <td><?php echo $book_row['accession_no'] ?></td>
                                        <td style="text-transform: capitalize"><?php echo $book_row['nameofstudent'] ?></td>
                                        <td style="text-transform: capitalize"><?php echo $book_row['course_name'] ?></td>
                                        <td><?php echo $book_row['title'] ?></td>
                                        <td><?php echo $book_row['deyt'] ?></td>
                                        <td><?php echo $book_row['categories'] ?></td>
                                        <td><?php echo $book_row['remarks'] ?></td>
                                        <td><button name="borrow" class="btn btn-info"><i class="fa fa-check"></i> Borrow</button>
                                        <a href="borrow_collect.php?student_number=<?php echo $student_number ?>"><button name="cancel" class="btn btn-warning"><i class="fa fa-check"></i> Cancel</button></a></td>

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
                                        ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
                                        ?>
                                        <input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16" maxlength="10"  />
                                        <input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>" size="16" maxlength="10"  />
                                        
                                        <?php 
                                            if (isset($_POST['borrow'])){
                                                $user_id =$_POST['user_id'];
                                                $thesis_id =$_POST['thesis_id'];
                                                $date_borrowed =$_POST['date_borrowed'];
                                                $due_date =$_POST['due_date'];
                                                
                                                $trapBookCount= mysqli_query ($con,"SELECT count(*) as books_allowed from borrow_collection where user_id = '$user_id' and borrowed_status = 'borrowed'") or die (mysqli_error($con));
                                                
                                                $countBorrowed = mysqli_fetch_assoc($trapBookCount);
                                                
                                                $bookCountQuery= mysqli_query ($con,"SELECT count(*) as book_count from borrow_collection where user_id = '$user_id' and borrowed_status = 'borrowed' and thesis_id = $thesis_id") or die (mysqli_error($con));
                                                
                                                $bookCount = mysqli_fetch_assoc($bookCountQuery);
                                                
                                                $allowed_book_query= mysqli_query($con,"select * from allowed_book order by allowed_book_id DESC ") or die (mysqli_error($con));
                                                $allowed = mysqli_fetch_assoc($allowed_book_query);
                                                
                                                if ($countBorrowed['books_allowed'] == $allowed['qntty_books']){
                                                    echo "<script>alert(' ".$allowed['qntty_books']." ".'Books Allowed per User!'." '); window.location='borrow_collect.php?student_number=".$student_number."'</script>";
                                                }elseif ($bookCount['book_count'] == 1){
                                                    echo "<script>alert('Book Already Borrowed!'); window.location='borrow_collect.php?student_number=".$student_number."'</script>";
                                                }else{
                                                    
                                                $update_copies = mysqli_query ($con,"SELECT * from special_collection where thesis_id = '$thesis_id' ") or die (mysqli_error($con));
                                                $copies_row= mysqli_fetch_assoc($update_copies);
                                                
                                                $quantity = $copies_row['quantity'];
                                                $new_quantity = $quantity - 1;
                                                
                                                if ($new_quantity < 0){
                                                    echo "<script>alert('Book out of Copy!'); window.location='borrow_collect.php?student_number=".$student_number."'</script>";
                                                  }
                                                //   // elseif ($copies_row['status'] == 'Damaged'){
                                                // //   echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_collect.php?student_number=".$student_number."'</script>";
                                                // // }elseif ($copies_row['status'] == 'Lost'){
                                                // //   echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_collect.php?student_number=".$student_number."'</script>";
                                                //  }
                                                 else{
                                                    
                                                if ($new_quantity == '0') {
                                                    $remark = 'Not Available';
                                                } else {
                                                    $remark = 'Available';
                                                }
                                                
                                                mysqli_query($con,"UPDATE special_collection SET quantity = '$new_quantity' where thesis_id = '$thesis_id' ") or die (mysqli_error($con));
                                                mysqli_query($con,"UPDATE special_collection SET remarks = '$remark' where thesis_id = '$thesis_id' ") or die (mysqli_error($con));
                                                
                                                mysqli_query($con,"INSERT INTO borrow_collection(user_id,thesis_id,date_borrowed,due_date,borrowed_status)
                                                VALUES('$user_id','$thesis_id','$date_borrowed','$due_date','borrowed')") or die (mysqli_error($con));
                                                
                                                }
                                                }
                                        ?>
                                                <script>
                                                    window.location="borrow_collect.php?student_number=<?php echo $student_number ?>";
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
