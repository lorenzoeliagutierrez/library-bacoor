<?php ob_start();
?>
<?php $ID=$_GET['ebook_id']; ?>

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
                <h3 class="col-xs-6"><span class="fa fa-edit"></span> EDIT E-BOOK</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <!-- content starts here -->
                    <?php
                      $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        LEFT JOIN campus USING(campus_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>

                  <form method="post" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="call_no">Call Number</label>
                      <input type="text" name="call_no" value="<?php echo htmlspecialchars($row['call_no']); ?>" id="call_no" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" id="title" required="required"  class="form-control">
                    </div>
                    <?php
                      $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="subject_id">Subjects</label>
                      <input type="text" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>" id="subject" required="required" class="form-control">
                    </div>
                    <?php
                      $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="author_id">Author</label>
                      <input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" id="author" required="required" class="form-control">
                    </div>
                    <?php
                      $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="editor">Editor</label>
                      <input type="text" name="editor" id="editor" value="<?php echo htmlspecialchars($row['editor']); ?>"  class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="edition">Edition</label>
                      <input type="text" name="edition" id="edition" value="<?php echo htmlspecialchars($row['edition']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="pop_id">PlaceOfPublication</label>
                        <select name="pop_id" tabindex="-1" class="form-control">
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
                        $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="publisher_id">Publisher</label>
                        <select name="publisher_id" tabindex="-1" class="form-control">
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
                        $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        LEFT JOIN campus USING(campus_id)
                        LEFT JOIN department USING(department_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="date_of_publ">Date of Publication</label>
                      <input type="text" name="date_of_publ" id="date_of_publ" value="<?php echo htmlspecialchars($row['date_of_publ']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="quantity" step="1" min="0" max="1000" value="<?php echo htmlspecialchars($row['quantity']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="series">Series</label>
                      <input type="text" name="series" id="series" value="<?php echo htmlspecialchars($row['series']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="isbn_no">ISBN Number</label>
                      <input type="text" name="isbn_no" id="isbn_no" value="<?php echo htmlspecialchars($row['isbn_no']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="accession_no">Accession</label>
                      <input type="text" name="accession_no" id="accession_no" value="<?php echo htmlspecialchars($row['accession_no']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="moa_id">Moa</label>
                        <select name="moa_id" class="form-control" tabindex="-1">
                          <option value="<?php echo htmlspecialchars($row['moa_id']); ?>"><?php echo htmlspecialchars($row['moa']); ?>
                          </option>
                            <?php
                            $result= mysqli_query($con,"select * from tbl_moa") or die (mysqli_error($con));
                            while ($row4= mysqli_fetch_array ($result) ){
                            $id=$row4['moa_id'];
                            ?>
                          <option value="<?php echo htmlspecialchars($row4['moa_id']); ?>"><?php echo htmlspecialchars($row4['moa']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="campus">Campus</label>
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
                    <div class="form-group">
                      <label for="campus">Department</label>
                        <select name="department" class="form-control" tabindex="-1">
                          <option value="<?php echo htmlspecialchars($row['department_id']); ?>"><?php echo htmlspecialchars($row['department']); ?>
                          </option>
                            <?php
                            $result= mysqli_query($con,"select * from department") or die (mysqli_error($con));
                            while ($row4= mysqli_fetch_array ($result) ){
                            $id=$row4['department_id'];
                            ?>
                          <option value="<?php echo htmlspecialchars($row4['department_id']); ?>"><?php echo htmlspecialchars($row4['department']); ?>
                          </option>
                          <?php } ?>
                        </select>
                    </div>
                      <?php
                        $query1=mysqli_query($con,"SELECT * FROM ebooks
                        LEFT JOIN tbl_placeofpublications USING(pop_id)
                        LEFT JOIN tbl_publishers USING(publisher_id)
                        LEFT JOIN tbl_moa USING(moa_id)
                        where ebook_id='$ID'") or die(mysqli_error($con));
                        $row=mysqli_fetch_assoc($query1);
                      ?>
                    <div class="form-group">
                      <label for="issn_no">ISSN Number</label>
                      <input type="text" name="issn_no" id="issn_no" value="<?php echo htmlspecialchars($row['issn_no']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="notation1">Notation1</label>
                      <input type="text" name="notation1" id="notation1" value="<?php echo htmlspecialchars($row['notation1']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="notation2">Notation2</label>
                      <input type="text" name="notation2" id="notation2" value="<?php echo htmlspecialchars($row['notation2']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="abstract">Abstract</label>
                      <input type="text" name="abstract" id="abstract" value="<?php echo htmlspecialchars($row['abstract']); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="page_no">Page Number/s</label>
                      <input type="text" name="page_no" value="<?php echo htmlspecialchars($row['page_no']); ?>" id="pages" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="file"> Upload File 
                      </label>
                      <input type="file" name="fileUpload" id="file" class="form-control" <?php echo (isset($_SESSION['error_message_file_ext'])) ? 'style="border-color:indianred"' : ""; ?>>
                      <?php echo (isset($_SESSION['error_message_file_ext'])) ? '<div class="text-sm text-danger">' . $_SESSION['error_message_file_ext'] . '</div>' : "";
                        unset($_SESSION['error_message_file_ext']); 
                      ?> <br>
                      
                      <label><b>
                      <?php 
                        $fileName = isset($row['fileName']) ? $row['fileName'] : '';
                        if ($fileName != '') {
                          echo "Current File Uploaded: <span style='color: red;'>$fileName</span>";
                        } ?>
                      </label></b>
                    </div>
                    <div class="form-group">
                      <label for="image"> E-Book Image
                      </label>
                      <input type="file" name="image" id="image" class="form-control" <?php echo (isset($_SESSION['error_message_image_ext'])) ? 'style="border-color:indianred"' : ""; ?>>
                        <?php echo (isset($_SESSION['error_message_image_ext'])) ? '<div class="text-sm text-danger">' . $_SESSION['error_message_image_ext'] . '</div>' : "";
                        unset($_SESSION['error_message_image_ext']); ?> <br>
                      <label>
                      <?php
                          $image_data = $row['ebook_img'];
                          echo '<b>Current Image Uploaded:  </b>';
                          echo '<img src="data:image/png;base64,' . base64_encode($image_data) . '" style="max-width: 80px; max-height: 80px;">';
                      ?>
                      </label>
                    </div>

                           <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="search_ebook.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                            
<?php
$id =$_GET['ebook_id'];
if (isset($_POST['update11'])) {
                    
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


                    if ($moa_id == 'Lost') {
                        $remark = 'Not Available';
                    } elseif ($moa_id == 'Damaged') {
                        $remark = 'Not Available';
                    } else {
                        $remark = 'Available';
                    }


                      $error = 0;
                      if (!empty($_FILES['image']['tmp_name'])) {
                          // image validation
                          $image = $_FILES['image']['name'];
                          $tmp_image = $_FILES['image']['tmp_name'];
                          $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                          $ext_img = ['jpeg', 'jpg', 'svg', 'png', 'JPEG', 'JPG', 'SVG', 'PNG'];
                          $img = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                  
                          if (!in_array($image_ext, $ext_img)) {
                              $error++;
                              $_SESSION['error_message_image_ext'] = "The E-Book Image must be an image";
                          }
                      }

                       if (!empty($_FILES['fileUpload']['tmp_name'])) {
                        // file validation
                        $file = $_FILES['fileUpload']['name'];
                        $tmp_file = $_FILES['fileUpload']['tmp_name'];
                        $file_ext = pathinfo($file, PATHINFO_EXTENSION);
                        $target_dir = "../../../ebooks/";
                        $ext = ['pdf'];
                
                        if (!in_array($file_ext, $ext)) {
                            $error++;
                            $_SESSION['error_message_file_ext'] = "The Upload File must be a file of type: pdf.";
                          }
                      }

                   
                      if ($error > 0) {
                        echo "<script>window.location='edit_ebook.php?ebook_id=" . $id . "'</script>";
                      } else {
                        $gen_file = rand(1000, 99999) . "_" . $_FILES['fileUpload']['name'];
                        move_uploaded_file($tmp_file, $target_dir . $gen_file);
          
                      if (!empty($_FILES['fileUpload']['tmp_name']) && empty($_FILES['image']['tmp_name'])) {
                          $delete_file = "../../../ebooks/" . $row['fileName'];
                          if (!unlink($delete_file)) {
                              echo ("$delete_file cannot be deleted due to an error");
                          } else {
                              mysqli_query($con, " UPDATE ebooks SET department_id = '$department',campus_id = '$campus',call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
                              date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no', fileName = '$gen_file' WHERE ebook_id = '$id' ") or die(mysqli_error($con));
                            echo "<script>alert('Successfully Updated ebooks Info!'); history.go(-2);</script>";  
                          }
                      } elseif (!empty($_FILES['fileUpload']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
                          $delete_file = "../../../ebooks/" . $row['fileName'];
                          if (!unlink($delete_file)) {
                              echo ("$delete_file cannot be deleted due to an error");
                          } else {
                          mysqli_query($con, " UPDATE ebooks SET department_id = '$department',campus_id = '$campus',call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
                              date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no', fileName = '$gen_file', ebook_img='$img' WHERE ebook_id = '$id' ") or die(mysqli_error($con));
                         echo "<script>alert('Successfully Updated ebooks Info!'); history.go(-2);</script>";  
                          }
                      } elseif (empty($_FILES['fileUpload']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
                          mysqli_query($con, " UPDATE ebooks SET department_id = '$department',campus_id = '$campus',call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
                          date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no', ebook_img='$img' WHERE ebook_id = '$id' ") or die(mysqli_error($con));
                          echo "<script>alert('Successfully Updated ebooks Info!'); history.go(-2);</script>";  
                      } else {
                          mysqli_query($con, " UPDATE ebooks SET department_id = '$department',campus_id = '$campus',call_no='$call_no',title='$title', subject='$subject', author='$author', editor='$editor', edition='$edition', pop_id='$pop_id', publisher_id='$publisher_id', quantity='$quantity', 
                          date_of_publ='$date_of_publ', series='$series', isbn_no='$isbn_no', accession_no='$accession_no', moa_id='$moa_id', issn_no='$issn_no', notation1='$notation1', notation2='$notation2', abstract='$abstract', remarks='$remark',page_no='$page_no' WHERE ebook_id = '$id' ") or die(mysqli_error($con));
                          echo "<script>alert('Successfully Updated ebooks Info!'); history.go(-2);</script>";  
                      }
                  }   
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
