  <?php
  echo '
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </ul>

      <ul class="navbar-nav ml-auto">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">';
              include "../../includes/conn.php";
                                if($_SESSION['role'] == "Administrator"){
                                    $user = mysqli_query($con,"SELECT * from admin where admin_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['firstname'];
                                        echo $row['firstname'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Student"){
                                    $user = mysqli_query($con,"SELECT * from user where user_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['firstname'].' '.$row['lastname'];
                                        echo $row['firstname'].' '.$row['lastname'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Super Admin"){
                                    $user = mysqli_query($con,"SELECT * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['super_admin'];
                                        echo $row['super_admin'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Guest"){
                                    $user = mysqli_query($con,"SELECT * from guest where guest_id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['firstname'];
                                        echo $row['lastname'];
                                    }
                                }
                   echo '               
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  '.$_SESSION['user'].'
                </p>
              </li>
              <!-- Menu Footer-->
              <div class="user-footer">
              <li>
                <div class="pull-left">';
                if ($_SESSION['role'] == "Administrator") {
                  $result= mysqli_query($con,"select * from admin where admin_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['admin_id'];
              echo '
                  <a href="../admin/edit_admin.php?admin_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i>  Edit Profile</a>';}
                }
                elseif ($_SESSION['role'] == "Student") {
                  $result= mysqli_query($con,"select * from user where user_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['user_id'];
              echo '
                  <a href="../users/edit_user_prof.php?user_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i>  Edit Profile</a>';}
                }
                elseif ($_SESSION['role'] == "Super Admin") {
                  $result= mysqli_query($con,"select * from tbl_super_admins where sa_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['sa_id'];
              echo '
                  <a href="../admin/edit_user_super_admin.php?user_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i>  Edit Profile</a>';}
                }
                 elseif ($_SESSION['role'] == "Guest") {
                  $result= mysqli_query($con,"select * from guest where guest_id = '".$_SESSION['userid']."' ") or die (mysql_error());
              while ($row= mysqli_fetch_array ($result) ){
                $id=$row['guest_id'];
                
              echo '
                  <a href="edit_guest_user.php?guest_id='.$id.'" class="btn btn-default btn-flat"><i class="fa fa-edit" aria-hidden="true"></i>  Edit Profile</a>';}
                }
              echo '
                </div>
              <hr>
              </li>
              <li>
                <div class="pull-right">
                  <a href="../login/logout.php" class="btn btn-default btn-flat"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Sign Out</a>
                </div>
              </li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>'; ?>
