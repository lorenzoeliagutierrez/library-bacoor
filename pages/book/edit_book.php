<?php ob_start();
?>
<?php $ID=$_GET['book_id']; ?>

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
               <h3 class="col-xs-6"><span class="fa fa-edit"></span> EDIT BOOK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
     <!-- content starts here -->
<?php
  $query1=mysqli_query($con,"SELECT * FROM book 
    LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
    LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
    LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id
        LEFT JOIN campus ON book.moa_id = campus.campus_id
    where book_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_assoc($query1);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
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
                                                                    LEFT JOIN campus ON book.moa_id = campus.campus_id  
                                  where book_id='$ID'")or die(mysql_error());
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
                                                                    LEFT JOIN campus ON book.moa_id = campus.campus_id  
                                  where book_id='$ID'")or die(mysql_error());
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
                                                                    LEFT JOIN campus ON book.moa_id = campus.campus_id  
                                  where book_id='$ID'")or die(mysql_error());
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
                                            <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_placeofpublications ORDER BY placeofpublication") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['pop_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['pop_id']); ?>"><?php echo htmlspecialchars($row['placeofpublication']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id
                                                                    LEFT JOIN campus ON book.moa_id = campus.campus_id  
                                  where book_id='$ID'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="publisher_id">Publisher
                                    </label>
                                    <div class="col-md-8">
                                        <select name="publisher_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_publishers ORDER BY publisher") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                        $id=$row['publisher_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row['publisher_id']); ?>"><?php echo htmlspecialchars($row['publisher']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id
                                                                    LEFT JOIN campus ON book.campus_id = campus.campus_id  
                                  where book_id='$ID'")or die(mysql_error());
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
                                            <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                                        while ($row4= mysqli_fetch_array ($result) ){
                                        $id=$row4['moa_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row4['moa_id']); ?>"><?php echo htmlspecialchars($row4['moa']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="campus_id">Campus
                                    </label>
                                    <div class="col-md-8">
                                        <select name="campus" class="select2_single form-control" tabindex="-1" >
                                            <option selected disabled> Select Campus </option>
                                            <option selected value="<?php echo htmlspecialchars($row['campus_id']); ?>"><?php echo htmlspecialchars($row['campus']); ?></option>
                                        <?php
                                        if ($_SESSION['campus_id'] == 99) {
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id NOT IN ('$row[campus_id]')") or die (mysql_error());
                                        while ($row3= mysqli_fetch_array ($result) ){
                                        $id=$row3['campus_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row3['campus_id']); ?>"><?php echo htmlspecialchars($row3['campus']); ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id
                                                                    LEFT JOIN campus ON book.campus_id = campus.campus_id 
                                LEFT JOIN department ON book.department_id = department.department_id
                                  where book_id='$ID'")or die(mysql_error());
                                $row=mysqli_fetch_assoc($query1);
                                  ?>
                                <div class="form-group">
                                    <label class="control-label col-md-8" for="campus_id">Department
                                    </label>
                                    <div class="col-md-8">
                                        <select name="department" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo htmlspecialchars($row['department_id']); ?>"><?php echo htmlspecialchars($row['department']); ?></option>
                                        <?php
                                        $result= mysqli_query($con,"select * from department") or die (mysql_error());
                                        while ($row3= mysqli_fetch_array ($result) ){
                                        $id=$row3['department_id'];
                                        ?>
                                            <option value="<?php echo htmlspecialchars($row3['department_id']); ?>"><?php echo htmlspecialchars($row3['department']); ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                  <?php
                                  $query1=mysqli_query($con,"SELECT * FROM book
                                  LEFT JOIN tbl_placeofpublications ON book.pop_id = tbl_placeofpublications.pop_id
                                  LEFT JOIN tbl_publishers ON book.publisher_id = tbl_publishers.publisher_id
                                  LEFT JOIN tbl_moa ON book.moa_id = tbl_moa.moa_id
                                                                    LEFT JOIN campus ON book.moa_id = campus.campus_id  
                                  where book_id='$ID'")or die(mysql_error());
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
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="search_book.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            
<?php
$id =$_GET['book_id'];
if (isset($_POST['update11'])) {
                            // $image = $_FILES["image"] ["name"];
                            // $image_name= addslashes($_FILES['image']['name']);
                            // $size = $_FILES["image"] ["size"];
                            // $error = $_FILES["image"] ["error"];
                            


                            // if ($error > 0){
                                        
                    
                    $call_no=mysqli_real_escape_string($con,$_POST['call_no']);
                    $title=mysqli_real_escape_string($con,$_POST['title']);
                    $subject=mysqli_real_escape_string($con,$_POST['subject']);
                    $author=mysqli_real_escape_string($con,$_POST['author']);
                    $editor=mysqli_real_escape_string($con,$_POST['editor']);
                    $edition=mysqli_real_escape_string($con,$_POST['edition']);
                    $pop_id=mysqli_real_escape_string($con,$_POST['pop_id']);
                    $publisher_id=mysqli_real_escape_string($con,$_POST['publisher_id']);
                    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
                    $date_of_publ=mysqli_real_escape_string($con,$_POST['date_of_publ']);
                    $series=mysqli_real_escape_string($con,$_POST['series']);
                    $isbn_no=mysqli_real_escape_string($con,$_POST['isbn_no']);
                    $accession_no=mysqli_real_escape_string($con,$_POST['accession_no']);
                    $moa_id=mysqli_real_escape_string($con,$_POST['moa_id']);
                    $issn_no=mysqli_real_escape_string($con,$_POST['issn_no']);
                    $notation1=mysqli_real_escape_string($con,$_POST['notation1']);
                    $notation2=mysqli_real_escape_string($con,$_POST['notation2']);
                    $abstract=mysqli_real_escape_string($con,$_POST['abstract']);
                    $page_no=mysqli_real_escape_string($con,$_POST['page_no']);
                    $campus=mysqli_real_escape_string($con,$_POST['campus']);
                    $department=mysqli_real_escape_string($con,$_POST['department']);

// $still_profile1 = $row['book_image'];


                    if ($moa_id == 'Lost') {
                        $remark = 'Not Available';
                    } elseif ($moa_id == 'Damaged') {
                        $remark = 'Not Available';
                    } else {
                        $remark = 'Available';
                    }


mysqli_query($con," UPDATE book SET call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no', campus_id = '$campus', department_id = '$department' WHERE book_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Updated Book Info!'); history.go(-2);</script>";   

                           
 }
?>                       
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
