<?php

if(isset($_POST['recover']))
{
  require_once 'PHPMailerAutoload.php';
  require_once 'class.phpmailer.php';
  require_once 'class.smtp.php';
  include 'confige.php';
  $name="";
  $email="";
  $message='';
  $username=$_POST['username'];
  $mail = new PHPMailer(true);

  $sql = "SELECT Emp_Email,Emp_Name FROM employee WHERE User_Name='$username'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    $email= $row["Emp_Email"];
    $name = $row["Emp_Name"];

    //Send mail using gmail

    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = ""; // GMAIL username
    $mail->Password = ""; // GMAIL password

    $mail->FromName = "Admin";


    //Typical mail data
    $mail->AddAddress($email, $name);
    //$mail->SetFrom($email_from, $name_from);
    $mail->Subject = "Password Change Request";
    $pass="pass" . (mt_rand(0,10000)); // Appending a randomly generated number in pass
    $mail->Body = "This mail is sent to you on your request for password recovery.<br>Your password is as follows: ".$pass;

    try
    {
        $mail->Send();
        $sql = "UPDATE employee SET Password = '".md5($pass)."' WHERE User_Name= '$name'";
        $result = mysqli_query($conn, $sql);
        if($result)
        { $message="Your password has been sent to your registered Email"; }
        else
        {
          $message = "Could Not send Your Password";
        }

    }
    catch(Exception $e)
    {
      //echo "Fail - " . $mail->ErrorInfo;
      $message="Could Not send the Email";
    }
  }
  else
  {
    $message = "User Doesn't Exists";
  }
echo $message;
}
?>
