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
                <h1 class="text-center"><b>Search User</b></h1>
                <h5 class="text-center mb-3">
                  <b>Campus:</b>
                  <?php echo $_SESSION['campus'] ?><br>
                  <?php
                    if ($_SESSION['campus'] == "All") {
                      $result = mysqli_query($con, "SELECT * FROM user");
                      $num_rows = mysqli_num_rows($result);
                    } else {
                      $result = mysqli_query($con, "SELECT * FROM user
                                LEFT JOIN campus ON campus.campus_id = user.campus_id
                                WHERE campus = '$_SESSION[campus]'");
                      $num_rows = mysqli_num_rows($result);
                    }
                    ?>
                    <b>Users
                    </b>:
                    <?php echo number_format($num_rows) ?>
                    <?php
                  
                  ?>
                </h5>
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <form method="GET" class="form-horizontal">
                      <div class="input-group">
                        <input type="search" class="form-control form-control-lg"
                          placeholder="Search for Title, Author, Call Number..." name="search">
                        <div class="input-group-append">
                          <button name="submit" type="submit" class="btn btn-lg btn-info">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                        <button type="button" class="btn btn-lg btn-info mx-1" data-toggle="modal"
                          data-target="#filter">
                          <i class="fas fa-sliders-h"></i> Filter
                        </button>
                    </form>

                    <!-- delete modal book -->
                    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i
                                class="glyphicon glyphicon-user"></i> Filter Campus</h4>
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
                                      $result = mysqli_query($con, "select * from campus") or die(mysqli_error($con));
                                      while ($row4 = mysqli_fetch_array($result)) {
                                        $id = $row4['campus_id'];
                                        ?>
                                        <option value="<?php echo $row4['campus']; ?>">
                                          <?php echo $row4['campus']; ?>
                                        </option>
                                      <?php } ?>
                                      <?php
                                    } else {
                                      ?>
                                      </option>
                                      <?php
                                      $result = mysqli_query($con, "SELECT * FROM campus WHERE campus = '$_SESSION[campus]'") or die(mysqli_error($con));
                                      while ($row4 = mysqli_fetch_array($result)) {
                                        $id = $row4['campus_id'];
                                        ?>
                                        <option value="<?php echo $row4['campus']; ?>">
                                          <?php echo $row4['campus']; ?> (Current Selected)
                                        </option>
                                      <?php } ?>
                                      </option>
                                      <?php
                                      $result = mysqli_query($con, "SELECT * FROM campus WHERE campus NOT IN ('$_SESSION[campus]')") or die(mysqli_error($con));
                                      while ($row4 = mysqli_fetch_array($result)) {
                                        $id = $row4['campus_id'];
                                        ?>
                                        <option value="<?php echo $row4['campus']; ?>">
                                          <?php echo $row4['campus']; ?>
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
                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i
                                    class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                <button type="submit" class="btn btn-primary"><i
                                    class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
                              </div>
                            </form>
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
                  <table s id="example1" class="table table-bordered table-hover">

                    <thead style="background: #FFFF">
                      <tr>
                        <!---       <th>Image</th>  -->
                        <th>Lib ID / Account No.</th>
                        <th>Borrowers Name</th>
                        <th>Type</th>
                        <th>Level</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Section/Course</th>
                        <th>Campus</th>
                        <th>Date Added</th>
                        <?php if ($_SESSION['role'] == "Administrator") {
                          echo ' <th>Action</th>';
                        } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['submit'])) {
                        if ($_SESSION['campus'] == "All") {
                          $return_query = mysqli_query(
                            $con,
                            "SELECT * from user 
              LEFT JOIN campus USING (campus_id)
              where firstname LIKE '%$_GET[search]%' 
              or middlename LIKE '%$_GET[search]%' 
              or lastname LIKE '%$_GET[search]%'
              or type LIKE '%$_GET[search]%'
              or level LIKE '%$_GET[search]%'
              or campus LIKE '%$_GET[search]%'
              or section LIKE '%$_GET[search]%' "
                          )
                            or die(mysqli_error($con));
                        } else {
                          $return_query = mysqli_query(
                            $con,
                            "SELECT * from user 
              LEFT JOIN campus USING (campus_id)
              where campus = '$_SESSION[campus]' AND (firstname LIKE '%$_GET[search]%' 
              or middlename LIKE '%$_GET[search]%' 
              or lastname LIKE '%$_GET[search]%'
              or type LIKE '%$_GET[search]%'
              or level LIKE '%$_GET[search]%'
              or campus LIKE '%$_GET[search]%'
              or section LIKE '%$_GET[search]%')"
                          )
                            or die(mysqli_error($con));
                        }
                        
                        while ($row = mysqli_fetch_array($return_query)) {
                          $id = $row['user_id'];
                          ?>
                          <tr>
                            <td>
                              <?php echo $row['student_number']; ?>
                            </td>
                            <td>
                              <?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
                            </td>
                            <td>
                              <?php echo $row['type']; ?>
                            </td>
                            <td>
                              <?php echo $row['level']; ?>
                            </td>
                            <td>
                              <?php echo $row['contact']; ?>
                            </td>
                            <td>
                              <?php echo $row['address']; ?>
                            </td>
                            <td>
                              <?php echo $row['section']; ?>
                            </td>
                            <td>
                              <?php echo $row['campus']; ?>
                            </td>
                            <td>
                              <?php echo $row['user_added']; ?>
                            </td>
                            <?php if ($_SESSION['role'] == "Administrator") { ?>
                              <td>


                                <a class="btn btn-primary" for="ViewAdmin" href="edit_user.php<?php echo '?user_id=' . $id; ?>">

                                  <i class="fa fa-edit"></i> Edit
                                </a>
                                <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id; ?>"
                                  data-toggle="modal" data-target="#delete<?php echo $id; ?>">
                                  <i class="fa fa-trash icon-white"></i> Delete
                                </a>

                                <!-- delete modal user -->
                                <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog"
                                  aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i
                                            class="glyphicon glyphicon-user"></i> Delete User</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="alert alert-danger">
                                          Are you sure you want to delete
                                          <?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>?
                                        </div>
                                        <div class="modal-footer">
                                          <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i
                                              class="glyphicon glyphicon-remove icon-white"></i> No</button>
                                          <a href="delete_user.php<?php echo '?user_id=' . $id; ?>" style="margin-bottom:5px;"
                                            class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            <?php } ?>
                          </tr>
                        <?php }
                      } ?>

                    </tbody>
                  </table>
                </div>
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