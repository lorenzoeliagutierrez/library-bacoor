<?php 
include "../../includes/session.php";

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
             <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-body">
              <div class="card-header">
              <h1 class="text-center"><b>Search eBook</b></h1>
            <h5 class="text-center mb-3">
            <b>Department:</b> <?php echo $_SESSION['department']?> <b>Campus:</b> <?php echo $_SESSION['campus']?><br>
                      <b>Number of Books</b><br>
                        <?php
                            $department = mysqli_query($con, "SELECT * FROM department ORDER BY department ASC");
                            while ($row = mysqli_fetch_array($department)) {
                                if ($_SESSION['campus'] == "All") {
                                    $result = mysqli_query($con,"SELECT * FROM ebooks
                                    LEFT JOIN department ON department.department_id = ebooks.department_id
                                    WHERE department = '$row[department]'");
                                $num_rows = mysqli_num_rows($result);
                                } else {
                                $result = mysqli_query($con,"SELECT * FROM ebooks
                                LEFT JOIN campus ON campus.campus_id = ebooks.campus_id
                                LEFT JOIN department ON department.department_id = ebooks.department_id
                                WHERE campus = '$_SESSION[campus]' AND department = '$row[department]'");
                                $num_rows = mysqli_num_rows($result);
                                }
                                ?>
                                    <b><?php echo $row['department']?></b>: <?php echo number_format($num_rows)?> 
                                <?php
                            }
                        ?>
            </h5>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                      <form method="GET" class="form-horizontal">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search for Title, Author, Call Number..." name="search">
                            <div class="input-group-append">
                                <button name="submit" type="submit" class="btn btn-lg btn-info">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            <button type="button" class="btn btn-lg btn-info mx-1"  data-toggle="modal" data-target="#filter">
                                <i class="fas fa-sliders-h"></i> Filter
                            </button>
                            </form>

                            <!-- delete modal book -->
                            <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Filter Campus</h4>
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
                                                      $result= mysqli_query($con,"select * from campus") or die (mysqli_error($con));
                                                      while ($row4= mysqli_fetch_array ($result) ){
                                                      $id=$row4['campus_id'];
                                                      ?>
                                                  <option value="<?php echo $row4['campus']; ?>"><?php echo $row4['campus']; ?>
                                                  </option>
                                                  <?php } ?>
                                                  <?php
                                                   } else {
                                                    ?>
                                                    </option>
                                                      <?php
                                                      $result= mysqli_query($con, "SELECT * FROM campus WHERE campus = '$_SESSION[campus]'") or die (mysqli_error($con));
                                                      while ($row4= mysqli_fetch_array ($result) ){
                                                      $id=$row4['campus_id'];
                                                      ?>
                                                  <option value="<?php echo $row4['campus']; ?>"><?php echo $row4['campus']; ?> (Current Selected)
                                                  </option>
                                                  <?php } ?>
                                                  </option>
                                                      <?php
                                                      $result= mysqli_query($con, "SELECT * FROM campus WHERE campus NOT IN ('$_SESSION[campus]')") or die (mysqli_error($con));
                                                      while ($row4= mysqli_fetch_array ($result) ){
                                                      $id=$row4['campus_id'];
                                                      ?>
                                                  <option value="<?php echo $row4['campus']; ?>"><?php echo $row4['campus']; ?>
                                                  </option>
                                                  <?php } ?>
                                                  <option value="All">All
                                                  </option>
                                                    <?php
                                                   }
                                                  ?>
                                                  
                                                  
                                                  
                                                  </select>
                                            </div>
                                            
                                            <div class="col-md">
                                              <label for="department">Department</label>
                                                <select name="department" class="form-control" tabindex="-1" required="required">
                                                  <?php
                                                   if ($_SESSION['department'] == "All") {
                                                    ?>
                                                    <option value="All">All (Current Selected)
                                                  </option>
                                                  </option>
                                                      <?php
                                                      $result= mysqli_query($con,"select * from department") or die (mysqli_error($con));
                                                      while ($row4= mysqli_fetch_array ($result) ){
                                                      $id=$row4['department_id'];
                                                      ?>
                                                  <option value="<?php echo $row4['department']; ?>"><?php echo $row4['department']; ?>
                                                  </option>
                                                  <?php } ?>
                                                  <?php
                                                   } else {
                                                    ?>
                                                    </option>
                                                      <?php
                                                      $result= mysqli_query($con, "SELECT * FROM department WHERE department = '$_SESSION[department]'") or die (mysqli_error($con));
                                                      while ($row4= mysqli_fetch_array ($result) ){
                                                      $id=$row4['department_id'];
                                                      ?>
                                                  <option value="<?php echo $row4['department']; ?>"><?php echo $row4['department']; ?> (Current Selected)
                                                  </option>
                                                  <?php } ?>
                                                  </option>
                                                      <?php
                                                      $result= mysqli_query($con, "SELECT * FROM department WHERE department NOT IN ('$_SESSION[department]')") or die (mysqli_error($con));
                                                      while ($row4= mysqli_fetch_array ($result) ){
                                                      $id=$row4['department_id'];
                                                      ?>
                                                  <option value="<?php echo $row4['department']; ?>"><?php echo $row4['department']; ?>
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
                                              <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                              <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
                                            </div>
                                          </form>
                                        </div>
                                        </div>
                              </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
        <hr>
           <div class="box">
                <div class="table-responsive">
                    <table s id="example2" class="table table-bordered table-hover">
                        <thead style="background: #FFFF">
                    <tr>
                        <th>Book Image</th>
                          <th>Acc No./Bcode</th>
                          <th>Call Number</th>
                          <th>Author/s</th>
                          <th>Title</th>
                          <th>Editor</th>
                          <th>Edition</th>
                          <th>Place of Publ.</th>
                          <th>Publisher</th>
                          <th>Date of Publ.</th>
                          <th>No. of Pages</th>
                          <th>Series</th>
                          <th>Notation 1</th>
                          <th>Notation 2</th>
                          <th>ISBN No.</th>
                          <th>ISSN No.</th>
                          <th>Subject</th>
                          <th>Abstract</th>
                          <th>Moa</th>
                          <th>Remarks</th>
                          <th>Department</th>
                          <th>Campus</th>
                          <th>Action</th>
                                    <?php if($_SESSION['role'] == "Administrator"){ 
                                       echo ' ';
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>
        <?php
                            if (isset($_GET['submit'])) {

                              if ($_SESSION['campus'] == "All" && $_SESSION['department'] == "All") {

                              $return_query = mysqli_query($con, "SELECT * from ebooks
                              LEFT JOIN tbl_moa USING(moa_id)
                              LEFT JOIN campus USING(campus_id)
                              LEFT JOIN department USING(department_id)
                              LEFT JOIN tbl_publishers USING(publisher_id)
                              LEFT JOIN tbl_placeofpublications USING(pop_id)
                              WHERE call_no LIKE '%$_GET[search]%' OR title LIKE '%$_GET[search]%' OR subject LIKE '%$_GET[search]%' OR author LIKE '%$_GET[search]%' OR accession_no LIKE '%$_GET[search]%' OR remarks LIKE '%$_GET[search]%'  OR campus LIKE '%$_GET[search]%'") or die(mysqli_error($con));
                              
                            } else {
                                
                                if ($_SESSION['campus'] != "All" && $_SESSION['department'] == "All") {
                                    $return_query = mysqli_query($con, "SELECT * from ebooks
                              LEFT JOIN tbl_moa USING(moa_id)
                              LEFT JOIN campus USING(campus_id)
                              LEFT JOIN department USING(department_id)
                              LEFT JOIN tbl_publishers USING(publisher_id)
                              LEFT JOIN tbl_placeofpublications USING(pop_id)
                              WHERE  campus = '$_SESSION[campus]' AND ( call_no LIKE '%$_GET[search]%' OR title LIKE '%$_GET[search]%' OR subject LIKE '%$_GET[search]%' OR author LIKE '%$_GET[search]%' OR accession_no LIKE '%$_GET[search]%' OR remarks LIKE '%$_GET[search]%'  OR campus LIKE '%$_GET[search]%')") or die(mysqli_error($con));
                              
                                    
                                } elseif ($_SESSION['campus'] == "All" && $_SESSION['department'] != "All") {
                                    $return_query = mysqli_query($con, "SELECT * from ebooks
                              LEFT JOIN tbl_moa USING(moa_id)
                              LEFT JOIN campus USING(campus_id)
                              LEFT JOIN department USING(department_id)
                              LEFT JOIN tbl_publishers USING(publisher_id)
                              LEFT JOIN tbl_placeofpublications USING(pop_id)
                              WHERE  department = '$_SESSION[department]' AND ( call_no LIKE '%$_GET[search]%' OR title LIKE '%$_GET[search]%' OR subject LIKE '%$_GET[search]%' OR author LIKE '%$_GET[search]%' OR accession_no LIKE '%$_GET[search]%' OR remarks LIKE '%$_GET[search]%'  OR campus LIKE '%$_GET[search]%')") or die(mysqli_error($con));
                              
                                    
                                } else if ($_SESSION['campus'] != "All" && $_SESSION['department'] != "All") {
                                   $return_query = mysqli_query($con, "SELECT * from ebooks
                              LEFT JOIN tbl_moa USING(moa_id)
                              LEFT JOIN campus USING(campus_id)
                              LEFT JOIN department USING(department_id)
                              LEFT JOIN tbl_publishers USING(publisher_id)
                              LEFT JOIN tbl_placeofpublications USING(pop_id)
                              WHERE campus = '$_SESSION[campus]' AND department = '$_SESSION[department]' AND ( call_no LIKE '%$_GET[search]%' OR title LIKE '%$_GET[search]%' OR subject LIKE '%$_GET[search]%' OR author LIKE '%$_GET[search]%' OR accession_no LIKE '%$_GET[search]%' OR remarks LIKE '%$_GET[search]%'  OR campus LIKE '%$_GET[search]%')") or die(mysqli_error($con));
                              
                                }

                              
                              
                              }
                              
                              
                              while ($row = mysqli_fetch_array($return_query)) {
                                  $id = $row['ebook_id'];
                        ?>

                            <tr>
 <td><?php echo (empty($row['ebook_img'])) ? '<img src="../../images/default_book.jpg" class="zoom" alt="ebook">' : '<img src="data:image/jpeg;base64,' . base64_encode($row['ebook_img']) . '"
                          class="zoom" style="height:80px; width="80px"; object-fit:cover;" alt="ebook">' ?></td></div>


                        <td><?php echo $row['accession_no'];?></td>
                        <td style="word-wrap: break-word; width: 10em;"><?php echo $row['call_no']; ?></td>
                        <td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']; ?></td>
                        <td style="word-wrap: break-word; width: 10em;"><?php echo $row['title']; ?></td>
                        <td><?php echo $row['editor']; ?></td>   
                        <td><?php echo $row['edition']; ?></td>
                        <td><?php echo $row['placeofpublication']; ?></td> 
                        <td><?php echo $row['publisher']; ?></td> 
                        <td><?php echo $row['date_of_publ']; ?></td> 
                        <td><?php echo $row['page_no']; ?></td> 
                        <td><?php echo $row['series']; ?></td> 
                        <td><?php echo $row['notation1']; ?></td> 
                        <td><?php echo $row['notation2']; ?></td> 
                        <td><?php echo $row['isbn_no']; ?></td> 
                        <td><?php echo $row['issn_no']; ?></td> 
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['abstract']; ?></td> 
                        <td><?php echo $row['moa']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['campus']; ?></td>
                        <td>                
                                    <a class="btn btn-info" for="ViewAdmin" href="view_ebook.php<?php echo '?ebook_id='.$id; ?>">
                                        <i class="fa fa-eye"></i> View
                                    </a><br>
                                    <?php
                                    if ($_SESSION['role'] != "Student") {
                                      if ($_SESSION['campus_id'] == $row['campus_id'] || $_SESSION['userid'] == 99) {
                                    ?>
                                    <a class="btn btn-primary" for="ViewAdmin" href="edit_ebook.php<?php echo '?ebook_id='.$id; ?>">
                                    <i class="fa fa-edit"> </i>  Edit
                                    </a><br>
                                    <a class="btn btn-success" for="ViewAdmin" href="archive_ebook.php<?php echo '?ebook_id='.$id; ?>">
                                    <i class="fa fa-edit"></i>  Put to
                                    </a><br>
                                   <a class="btn btn-danger" for="DeleteBook" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                        <i class="fa fa-trash"> </i> Delete
                                    </a><br>

                               
            
                                   
                                    <?php
                                      } }
                                    ?>
                                </td> 
                                 <!-- delete modal ebooks -->
                                    <div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Delete ebooks</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    Are you sure you want to delete <?php echo $row['title']; ?>?
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                                <a href="delete_ebook.php<?php echo '?ebook_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-danger"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            <?php } ?>
                            </tr>
                            <?php } ?>
                            
                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>.
        </div>
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
