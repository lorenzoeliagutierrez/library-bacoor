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
                 <h3 class="col-xs-6"><span class="fa fa-book"></span> ADD BOOK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 <div class="x_content">
            <div class="row">
                <div class="col-md-12 col-md-offset-5">
           
                        <div class="box"> 
                            <div class="card-body">
                                <form method="post" autocomplete="on" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            <input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Call No.<span class="required" style="color:red;">*</span>                           
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="call_no" id="call_no" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name2">Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" id="first-name2" required="required" class="form-control col-md-12 col-xs-12" autocomplete="on">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Author <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="author" id="author" required="required" class="form-control col-md-12 col-xs-12" autocomplete="on">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Editor
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="editor" id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Edition
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="edition" id="first-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Place Of Publ. 
                                    </label>
                                    <div class="col-md-8">
                                        <select name="place_of_publ"  class="select2_single form-control" tabindex="-1">
                                            <option selected disabled> Select Place Of Publication</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_placeofpublications ORDER BY placeofpublication") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['pop_id'];
                                        ?>
                                            <option value="<?php echo $row['pop_id']; ?>"><?php echo $row['placeofpublication']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Publisher
                                    </label>
                                    <div class="col-md-8">
                                        <select name="publisher" class="select2_single form-control" tabindex="-1">
                                            <option selected disabled> Select Publisher</option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_publishers ORDER BY publisher") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['publisher_id'];
                                        ?>
                                            <option value="<?php echo $row['publisher_id']; ?>"><?php echo $row['publisher']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    </label>
                                    <div class="col-md-4">
                                        <input type="hidden" name="quantity" step="1" min="0" max="1000" value="1"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Date Of Publ
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="date_of_publ" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Series
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="series" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="isbn_no" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Acc No. <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="accession_no" id="last-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISSN
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="issn_no" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Notation1
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="notation1" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Notation2
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="notation2" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Abstract
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="abstract" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">No. of Pages
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="page_no" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">MOA</label>
                                    <div class="col-md-8">
                                        <select name="moa" class="select2_single form-control" tabindex="-1" required="required"><option selected disabled> Select Mode of Acquisition </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['moa_id'];
                                        ?>
                                            <option value="<?php echo $row['moa_id']; ?>"><?php echo $row['moa']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Campus</label>
                                    <div class="col-md-8">
                                        <select name="campus" class="select2_single form-control" tabindex="-1" required="required"><option selected disabled> Select Campus </option>
                                        <?php
                                        if ($_SESSION['userid'] == 99) {
                                        ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['campus_id'];
                                        ?>
                                            <option value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id = '$_SESSION[campus_id]'") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['campus_id'];
                                        ?>
                                            <option selected value="<?php echo $row['campus_id']; ?>"><?php echo $row['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Department</label>
                                    <div class="col-md-8">
                                        <select name="department" class="select2_single form-control" tabindex="-1" required="required"><option selected disabled> Select Department </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from department") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['campus_id'];
                                        ?>
                                            <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Subject <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" id="subject" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Add Book</button>
                                    </div>
                                </div>
                            </form>
<?php

            include ('../../includes/conn.php');
            if (isset($_POST['submit'])) {
               
                    $call_no=mysqli_real_escape_string($con,$_POST['call_no']);
                    $title=mysqli_real_escape_string($con,$_POST['title']);
                    $subject=mysqli_real_escape_string($con,$_POST['subject']);
                    $author=mysqli_real_escape_string($con,$_POST['author']);
                    $editor=mysqli_real_escape_string($con,$_POST['editor']);
                    $edition=mysqli_real_escape_string($con,$_POST['edition']);
                    $place_of_publ=mysqli_real_escape_string($con,$_POST['place_of_publ']);
                    $publisher=mysqli_real_escape_string($con,$_POST['publisher']);
                    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                    $date_of_publ=mysqli_real_escape_string($con,$_POST['date_of_publ']);
                    $series=mysqli_real_escape_string($con,$_POST['series']);
                    $isbn_no=mysqli_real_escape_string($con,$_POST['isbn_no']);
                    $accession_no=mysqli_real_escape_string($con,$_POST['accession_no']);
                    $moa=mysqli_real_escape_string($con,$_POST['moa']);
                    $issn_no=mysqli_real_escape_string($con,$_POST['issn_no']);
                    $notation1=mysqli_real_escape_string($con,$_POST['notation1']);
                    $notation2=mysqli_real_escape_string($con,$_POST['notation2']);
                    $abstract=mysqli_real_escape_string($con,$_POST['abstract']);
                    $page_no=mysqli_real_escape_string($con,$_POST['page_no']);
                    $campus=mysqli_real_escape_string($con,$_POST['campus']);
                    $department=mysqli_real_escape_string($con,$_POST['department']);
                    
                    
                    $pre = "SFAC";
                    $mid = mysqli_real_escape_string($con,$_POST['new_barcode']);
                    $suf = "LMS";
                    $gen = $pre.$mid.$suf;
                    
                    if ($quantity == 0 ) {
                        $remark = 'Not Available';
                    }else{
                        $remark = 'Available';
                    }
                    $chk = mysqli_query($con,"SELECT * FROM book WHERE accession_no = '".$accession_no."' AND campus_id = '$campus' ");
                    $ct = mysqli_num_rows($chk);
 
                    if($ct == 0){
                    
                    mysqli_query($con,"INSERT INTO book (call_no,title,subject,author,editor,edition,pop_id,publisher_id,quantity,date_of_publ,series,isbn_no,accession_no,moa_id,issn_no,notation1,notation2,abstract,remarks,page_no, campus_id, department_id)
                    VALUES('$call_no','$title','$subject','$author','$editor','$edition','$place_of_publ','$publisher','$quantity','$date_of_publ','$series','$isbn_no','$accession_no','$moa','$issn_no','$notation1','$notation2','$abstract','$remark','$page_no', '$campus', '$department')")OR die(mysqli_error($con));
                    echo "<script>alert('Successfully Added!'); window.location='book.php'</script>";
                    
                    mysqli_query($con,"INSERT INTO barcode (pre_barcode,mid_barcode,suf_barcode) VALUES ('$pre', '$mid', '$suf') ") OR die (mysqli_errOR());
                    }
                    else{
                echo "<script>alert('Accession No. already exist!');</script>";
                    }
                }

                    
            ?>

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
