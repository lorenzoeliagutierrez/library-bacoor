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
                 <h3 class="col-xs-6"><span class="fa fa-user-plus"></span> ADD ARTICLE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
 <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Call # <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="code" placeholder="Input code number....." id="first-name2" required="required" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                              
                            
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">No. of Copy
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input no. of copy....." required  autocomplete="off" name="quantity" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input title....."  autocomplete="off" name="title" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Author
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="Input author....."  autocomplete="off" name="author" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Subject</label>
                                  <div class="col-md-8">
                                        <input type="text" placeholder="Input subject....."  autocomplete="off" name="subject" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="campus">Periodical Title</label>
                                  <div class="col-md-8">
                                    <select name="pt" class="form-control" tabindex="-1" required="required">
                                      <option selected disabled>-- Select Periodical Title --
                                      </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_periodical_titles") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                   
                                        ?>
                                            <option value="<?php echo $row['pt_id']; ?>"><?php echo $row['periodical_title']; ?></option>
                                        <?php } ?>
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Date of Issue</label>
                                  <div class="col-md-8">
                                        <input type="text" placeholder="Input subject....."  autocomplete="off" name="date" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Volume/ Issue No./ Page No.</label>
                                  <div class="col-md-8">
                                        <input type="text" placeholder="Input subject....."  autocomplete="off" name="vip" id="last-name2" class="form-control col-md-12 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="campus">Mode of Acquisition</label>
                                  <div class="col-md-8">
                                    <select name="moa" class="form-control" tabindex="-1" required="required">
                                      <option selected disabled>-- Select MOA --
                                      </option>
                                        <?php
                                        $result= mysqli_query($con,"select * from tbl_moa") or die (mysql_error());
                                        while ($row= mysqli_fetch_array ($result) ){
                                   
                                        ?>
                                            <option value="<?php echo $row['moa_id']; ?>"><?php echo $row['moa']; ?></option>
                                        <?php } ?>
                                       </select>
                                    </div>
                                </div>
                           
                                <div class="form-group">
                                  <label for="campus">Campus</label>
                                  <div class="col-md-8">
                                    <select name="campus" class="form-control" tabindex="-1" required="required">
                                      <option selected disabled>-- Select Campus --
                                      </option>
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
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            <?php   
                            include ('../../includes/conn.php');
                if (isset($_POST['submit'])){
                                $code = mysqli_real_escape_string($con,$_POST['code']);
                                $author = mysqli_real_escape_string($con,$_POST['author']);
                                $subject = mysqli_real_escape_string($con,$_POST['subject']);
                                $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
                                $title = mysqli_real_escape_string($con,$_POST['title']);
                                $pt = mysqli_real_escape_string($con,$_POST['pt']);
                                $moa = mysqli_real_escape_string($con,$_POST['moa']);
                                $campus = mysqli_real_escape_string($con,$_POST['campus']);
                                $date = mysqli_real_escape_string($con,$_POST['date']);
                                $vip = mysqli_real_escape_string($con,$_POST['vip']);
                    if ($quantity == 0 ) {
                        $remarks = 'Not Available';
                    }else{
                        $remarks = 'Available';
                    }
  
                        mysqli_query($con,"INSERT into tbl_articles (vip, date_issue, pt_id, moa_id,campus_id ,call_no, author, subject, quantity, title, remark)
                        values ('$vip', '$date', '$pt', '$moa','$campus','$code', '$author', '$subject' ,'$quantity', '$title', '$remarks')")or die(mysqli_error($con));
                        echo "<script>alert('Article successfully added!'); window.location='add_article.php'</script>";
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
