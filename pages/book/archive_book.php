<?php 
ob_start();
include('../../includes/conn.php');
$get_id=$_GET['book_id'];?>

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
          <div class="col-md-10">
            <!-- jquery validation -->
            <div class="card card-body">
              <div class="card-header">
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> ARCHIVE BOOK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                     
<?php
  $query=mysqli_query($con,"select * from book where book_id='$get_id'")or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
  ?>                       
                        <div class="box">
                            <div class="box-body">
                        <center><h3><strong>You are about to send this lists into "INACTIVE STATUS" </h3></center><br>
                        
                                <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to mark this as INACTIVE?');" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <input type="hidden" name="book_id" id="last-name2" value="<?php echo $row['book_id']; ?>" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-8" for="call_no">Call Number
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="call_no" value="<?php echo htmlspecialchars($row['call_no']); ?>" id="call_no" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="title">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" id="title" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                 <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                                  where book_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="subject_id">Subjects
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>" id="subject" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                   <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                                  where book_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="author_id">Author
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" id="author" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                                  where book_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="editor">Editor
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="editor" id="editor" value="<?php echo htmlspecialchars($row['editor']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="edition">Edition
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="edition" id="edition" value="<?php echo htmlspecialchars($row['edition']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="control-label col-md-8" for="pop_id">PlaceOfPublication
                                    </label>
                                    <div class="col-md-8">
                                        <select name="pop_id" class="select2_single form-control" tabindex="-1" >
                                             <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?>
                          </option>
                            <?php $result= mysqli_query($con,"select * from tbl_placeofpublications ORDER BY placeofpublication") or die (mysqli_error($con));
                                            while ($row= mysqli_fetch_array ($result) ){
                                            $id=$row['pop_id'];
                            ?>
                          <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                                  where book_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="publisher_id">Publisher
                                    </label>
                                    <div class="col-md-8">
                                        <select name="publisher_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?>
                          </option>
                              <?php
                              $result= mysqli_query($con,"select * from tbl_publishers ORDER BY publisher") or die (mysqli_error($con));
                              while ($row= mysqli_fetch_array ($result) ){
                              $id=$row['publisher_id'];
                              ?>
                          <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?>
                          </option>
                        <?php } ?>
                        </select>
                    </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                                  where book_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    
                                    <div class="col-md-8">
                                        <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" step="1" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="date_of_publ">Date 0f publ
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="date_of_publ" id="date_of_publ" value="<?php echo htmlspecialchars($row['date_of_publ']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="series">Series
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="series" id="series" value="<?php echo htmlspecialchars($row['series']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="isbn_no">ISBN NO
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="isbn_no" id="isbn_no" value="<?php echo htmlspecialchars($row['isbn_no']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="accession_no">Accession
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="accession_no" id="accession_no" value="<?php echo htmlspecialchars($row['accession_no']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="moa_id">Moa
                                    </label>
                                    <div class="col-md-8">
                                        <select name="moa_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?>
                          </option>
                            <?php
                            $result= mysqli_query($con,"select * from tbl_moa") or die (mysqli_error($con));
                            while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['moa_id'];
                            ?>
                          <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id 
                                  where book_id='$get_id'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="issn_no">ISSN NO
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="issn_no" id="issn_no" value="<?php echo htmlspecialchars($row['issn_no']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="notation1">Notation1
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="notation1" id="notation1" value="<?php echo htmlspecialchars($row['notation1']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="notation2">Notation2
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="notation2" id="notation2" value="<?php echo htmlspecialchars($row['notation2']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="abstract">Abstract
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="abstract" id="abstract" value="<?php echo htmlspecialchars($row['abstract']); ?>"  class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="page_no">Page No.
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="page_no" value="<?php echo htmlspecialchars($row['page_no']); ?>" id="title" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-8" for="last-name">Reason:</label>
                                    <div class="col-md-8">
                                        <select name="remarks" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Transferred">Transferred</option>
                                            <option value="Donated">Donated</option>
                                            <option value="Weeded">Weeded</option>
                                            <option value="Archived">Archived</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript: history.go(-1)"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Archive</button>
                                    </div>
                                </div>
                            </form>
                            

                                      
                            
<?php

if (isset($_POST['update'])) {
                               
$book_id = $_POST['book_id'];
$call_no=$_POST['call_no'];
$title=$_POST['title'];
$subject=$_POST['subject'];
$author=$_POST['author'];
$editor=$_POST['editor'];
$edition=$_POST['edition'];
$place_of_publ=$_POST['pop_id'];
$publisher=$_POST['publisher_id'];
$quantity=$_POST['quantity'];
$date_of_publ=$_POST['date_of_publ'];
$series=$_POST['series'];
$isbn_no=$_POST['isbn_no'];
$accession_no=$_POST['accession_no'];
$moa=$_POST['moa_id'];
$issn_no=$_POST['issn_no'];
$notation1=$_POST['notation1'];
$notation2=$_POST['notation2'];
$abstract=$_POST['abstract'];
$remark=$_POST['remarks'];
$page_no=$_POST['page_no'];
$date = date('Y-m-d');



{

mysqli_query($con,"delete from book where book_id = '$get_id' ")or die(mysql_error());
mysqli_query($con," INSERT INTO archive (book_id,call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks,page_no,deyt) VALUES ('$book_id','$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark','$page_no','$date') ") or die(mysqli_error($con));
echo "<script>alert('Archiving Successful!');history.go(-2);</script>";  
}
                                    
}
?>
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
