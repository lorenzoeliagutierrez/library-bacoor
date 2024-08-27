<?php 
include "../../../includes/conn.php";
ob_start();
session_start();

 $username = mysqli_real_escape_string($con, $_POST['username']);
          $password = mysqli_real_escape_string($con, $_POST['password']);

            $super_admin = mysqli_query($con, "SELECT * from tbl_super_admins where username = '$username' ");
            $numrow2 = mysqli_num_rows($super_admin);

            $admin = mysqli_query($con, "SELECT * from admin where username = '$username' ");
            $numrow = mysqli_num_rows($admin);

            $student = mysqli_query($con, "SELECT * from user where username = '$username' ");
            $numrow1 = mysqli_num_rows($student);

            // $guest = mysqli_query($con, "SELECT * from guest where username = '$username' ");
            // $numrow3 = mysqli_num_rows($guest);

 if($numrow > 0)
            {   
                while($row = mysqli_fetch_array($admin))
                {
                  $hashedPwdCheck = password_verify($password, $row['password']);
                  if ($hashedPwdCheck == false) 
                  {
                    echo "<script>alert('Username or Password do not match!'); window.location='../../login/login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck == true) 
                  {
                    $_SESSION['role'] = "Administrator";
                    $_SESSION['userid'] = $row['admin_id'];
                    $_SESSION['campus_id'] = $row['campus_id'];
                  }    
                  header("location:../../dashboard/admin_home.php");
                }
            }
            elseif($numrow1 > 0)
              {   
                while($row = mysqli_fetch_array($student))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Login Failed!'); window.location='../../login/login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Student";
                   $_SESSION['userid'] = $row['user_id'];
                  } 
                  header("location:../../dashboard/user_home.php");
                }
              }
            elseif($numrow2 > 0)
              {   
                while($row = mysqli_fetch_array($super_admin))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Login Failed!'); window.location='../../login/login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Super Admin";
                   $_SESSION['userid'] = $row['sa_id'];
                  } 
                  echo "<script>window.location='../../dashboard/super_admin_home.php'</script>";
                }
              }
               elseif($numrow3 > 0)
              {   
                while($row = mysqli_fetch_array($guest))
                {
                  $hashedPwdCheck1 = password_verify($password, $row['password']);
                  if ($hashedPwdCheck1 == false) 
                  {
                    echo "<script>alert('Login Failed!'); window.location='../../login/login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck1 == true) 
                  {
                   $_SESSION['role'] = "Guest";
                   $_SESSION['userid'] = $row['guest_id'];
                  } 
                  echo "<script>window.location='../../dashboard/guest_home.php'</script>";
                }
              }
             else
                {
                echo "<script>alert('Invalid Account!'); window.location='../../login/login.php'</script>";
                }

?>

