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
                 <h3 class="col-xs-6"><span class="fa fa-user-plus"></span> EDIT ARTICLE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <?php
                                
                                $select_article = mysqli_query($con, "SELECT * FROM tbl_articles WHERE article_id = '$_GET[article_id]'");
                                while ($row = mysqli_fetch_array($select_article)) {
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Call # <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="code" placeholder="Input code number....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12" value="<?php echo $row['call_no']?>">
                                    </div>
                                </div>
                              
                            
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">No. of Copy
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input no. of copy....." required value="<?php echo $row['quantity']?>"  autocomplete="off" name="quantity" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input title....."  autocomplete="off" value="<?php echo $row['title']?>" name="title" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Author
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input author....."  autocomplete="off" value="<?php echo $row['author']?>" name="author" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Subject</label>
                                  <div class="col-md-8">
                                        <input type="text" placeholder="Input author....."  autocomplete="off" value="<?php echo $row['subject']?>" name="subject" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Periodical Title</label>
                                  <div class="col-md-8">
                                    <select name="pt" class="form-control" tabindex="-1" required="required">
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_periodical_titles WHERE pt_id = '$row[pt_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                   
                                        ?>
                                            <option selected value="<?php echo $row1['pt_id']; ?>"><?php echo $row1['periodical_title']; ?></option>
                                        <?php } ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_periodical_titles WHERE NOT pt_id = '$row[pt_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                   
                                        ?>
                                            <option value="<?php echo $row1['pt_id']; ?>"><?php echo $row1['periodical_title']; ?></option>
                                        <?php } ?>
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Date of Issue</label>
                                  <div class="col-md-8">
                                        <input type="text" placeholder="Input author....."  autocomplete="off" value="<?php echo $row['date_issue']?>" name="date" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Volume/ Issue No./Page No.</label>
                                  <div class="col-md-8">
                                        <input type="text" placeholder="Input author....."  autocomplete="off" value="<?php echo $row['vip']?>" name="vip" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Mode of Acquisition</label>
                                  <div class="col-md-8">
                                    <select name="moa" class="form-control" tabindex="-1" required="required">
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa WHERE moa_id = '$row[moa_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                   
                                        ?>
                                            <option selected value="<?php echo $row1['moa_id']; ?>"><?php echo $row1['moa']; ?></option>
                                        <?php } ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa WHERE NOT moa_id = '$row[moa_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                   
                                        ?>
                                            <option value="<?php echo $row1['moa_id']; ?>"><?php echo $row1['moa']; ?></option>
                                        <?php } ?>
                                       </select>
                                    </div>
                                </div>
                           
                                <div class="form-group">
                                  <label for="campus">Campus</label>
                                  <div class="col-md-8">
                                    <select name="campus" class="form-control" tabindex="-1" required="required">
                         
                                        <?php
                                        if ($_SESSION['userid'] == 99) {
                                        ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id = '$row[campus_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                        $id=$row1['campus_id'];
                                        ?>
                                            <option selected value="<?php echo $row1['campus_id']; ?>"><?php echo $row1['campus']; ?></option>
                                        <?php } ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE NOT campus_id = '$row[campus_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                        $id=$row1['campus_id'];
                                        ?>
                                            <option value="<?php echo $row1['campus_id']; ?>"><?php echo $row1['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php } else { ?>
                                        <?php
                                        $result= mysqli_query($con,"select * from campus WHERE campus_id = '$_SESSION[campus_id]'") or die (mysql_error());
                                        while ($row1= mysqli_fetch_array ($result) ){
                                        $id=$row1['campus_id'];
                                        ?>
                                            <option selected value="<?php echo $row1['campus_id']; ?>"><?php echo $row1['campus']; ?></option>
                                        <?php } ?>
                                        </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Edit</button>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </form>
                            
                            <?php   
                            include ('../../includes/conn.php');
                if (isset($_POST['submit'])){
                                $code = mysqli_real_escape_string($con,$_POST['code']);
                                $author = mysqli_real_escape_string($con,$_POST['author']);
                                $subject = mysqli_real_escape_string($con,$_POST['subject']);
                                $source = mysqli_real_escape_string($con,$_POST['pt']);
                                $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
                                $title = mysqli_real_escape_string($con,$_POST['title']);
                                $moa = mysqli_real_escape_string($con,$_POST['moa']);
                                $campus = mysqli_real_escape_string($con,$_POST['campus']);
                                $date = mysqli_real_escape_string($con,$_POST['date']);
                                $vip = mysqli_real_escape_string($con,$_POST['vip']);
                    if ($quantity == 0 ) {
                        $remarks = 'Not Available';
                    }else{
                        $remarks = 'Available';
                    }
  
                        mysqli_query($con,"UPDATE tbl_articles SET vip = '$vip', date_issue = '$date', moa_id = '$moa', campus_id = '$campus', call_no = '$code', author = '$author', subject = '$subject', pt_id = '$source', quantity = '$quantity', title = '$title', remark = '$remarks' WHERE article_id = '$_GET[article_id]'")or die(mysqli_error($con));
                        echo "<script>alert('Article successfully updated!'); window.location='edit_article.php?article_id=".$_GET['article_id']."'</script>";
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
