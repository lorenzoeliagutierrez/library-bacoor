<?php 
session_start();
include "../../includes/conn.php";
    $username = $_POST['username'];
    $email= $_POST['email'];
    $code=rand(100,999999);
    

    $admin = mysqli_query($con,"select * from admin where username='$username'");
    $row = mysqli_num_rows($admin);

    $user = mysqli_query($con,"select * from user where username='$username'");
    $row1 = mysqli_num_rows($user);  

if ($row == 1) {
        
        $query2 = mysqli_query($con,"update admin set activation_code='$code' where username='$username' ") or die(mysqli_error($con)); 
    }
elseif ($row1 == 1) {
        $query3 = mysqli_query($con,"update user set activation_code='$code' where username='$username' ") or die(mysqli_error($con));
    }
else{
    echo"<script>alert('Email does not exist in our database!'); window.location='../../../index.php'</script>";
    die();
}
   
require('../../phpmailer/PHPMailerAutoload.php');


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "gsbelibrary@gmail.com";                // SMTP username
    $mail->Password = 'fvvwbrskbulnuxmd';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('gsbelibrary@gmail.com', 'GSBE_Library DO-NOT-REPLY');
    $mail->addAddress($email);     // Add a recipient

    //Content
    $mail->AddEmbeddedImage('../../img/logo.png', 'logosfac');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = '<!DOCTYPE html>
<html>
<head>
    <title></title>
    
</head>
<body>
    <div style="background-color: red; background-image: linear-gradient(to bottom, #f31010, #fff);margin: auto;
    width: 90%;
    padding: 10px;">
        <img style="height: 80px;width: 80px; padding: 5px" src="cid:logosfac">
    </div>
    <div  style="background-color: #red;margin-top: 0px;margin: auto;
    width: 90%;
    padding: 10px;
    background-image:linear-gradient(to top, #f31010, #fff)">
        <h1 style="margin-top: 0px;margin-left: 30px;  padding-top: 30px;word-break: break-all">Hello, '.$email.'</h1>
        <br>
        <h2 style="margin-left: 30px;margin-right: 30px; text-align: justify;">You told us you forgot your password. If you really did, click here to choose a new one:</h2>
        <center><button style="background-color: #000;
    border: none;
    border-radius: 10px;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block; 
    font-size: 16px;"><a href="http://stfrancisbacoor.com/gsbe/template/pages/samples/reset_pass.php?username='.$username.'&activation_code='.$code.'" style="font-size: 25px; padding: 10px;text-decoration: none;color: white">Choose a new password</a></button></center>
        <br>
        <h3 style="margin-left: 30px;margin-right: 30px; text-align: justify;">If you are not trying to change your password, please ignore this email. It is possible that another user entered their login information incorrectly.</h3> <br>
        <h3 style="margin-left: 30px;margin-right: 30px; text-align: justify;"><b>Note</b>: This message was sent from an unmonitored address. Please do not respond to this message.</h3>
        <center><h3 style="font-family: impact;color:black;-webkit-text-stroke-width: .3px;
   -webkit-text-stroke-color: white;">Academics.<span style="font-family: impact;color:#f31010;font-style: italic;-webkit-text-stroke-width: .3px;
   color:white;">And beyond</span></h3></center>
    </div>

</body>
</html>';
   

    $mail->send();
    echo "<script>alert('Message has been sent!'); window.location='../login/login.php'</script>";
} 
    catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


?>