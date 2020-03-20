<meta charset="UTF-8" />

<?php

if (isset($_POST['m']) <> '') { 

  $massage = $_POST['massage'];
  include('../conn.php');
  $checkemail = "SELECT Userlevel,email FROM user WHERE Userlevel = 'M'";
  $resultemail = mysqli_query($con,$checkemail);

  while ($row = mysqli_fetch_array($resultemail)) 
  {

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "CC@learningroom.net";
    $to = $row['email'];
    
    $subject = "learningroom.net";
    $message = $massage;
    $headers = "From:" . $from . "\r\n";
    // $headers .= "Bcc:" . $bcc . "\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $mailsend = mail($to,$subject,$message, $headers);
  }
  if ($mailsend) {
    echo "<script>";
    echo "alert(\"  Send Mail To User Success \");"; 
    echo "window.location ='index.php';";
    echo "</script>";
  }else{
    echo "<script>";
    echo "alert(\" Error \");"; 
    echo "window.location ='index.php';";
    echo "</script>";
  }



}elseif (isset($_POST['a']) <> '') {

 $massage = $_POST['massage'];
 include('../conn.php');
 $checkemail = "SELECT Userlevel,email FROM user WHERE Userlevel = 'A'";
 $resultemail = mysqli_query($con,$checkemail);

 while ($row = mysqli_fetch_array($resultemail)) 
 {

  ini_set( 'display_errors', 1 );
  error_reporting( E_ALL );
  $from = "CC@learningroom.net";
  $to = $row['email'];

  $subject = "learningroom.net";
  $message = $massage;
  $headers = "From:" . $from . "\r\n";
    // $headers .= "Bcc:" . $bcc . "\r\n";
  $headers .= "Content-Type: text/html; charset=utf-8\r\n";
  $mailsend = mail($to,$subject,$message, $headers);
}
  if ($mailsend) {
    echo "<script>";
    echo "alert(\"  Send Mail To Admin Success \");"; 
    echo "window.location ='index.php';";
    echo "</script>";
  }else{
    echo "<script>";
    echo "alert(\" Error \");"; 
    echo "window.location ='index.php';";
    echo "</script>";
  }



}elseif (isset($_POST['am']) <> '') {

  $massage = $_POST['massage'];
  include('../conn.php');
  $checkemail = "SELECT Userlevel,email FROM user WHERE Userlevel = 'M' and Userlevel = 'A'";
  $resultemail = mysqli_query($con,$checkemail);

  while ($row = mysqli_fetch_array($resultemail)) 
  {

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "CC@learningroom.net";
    $to = $row['email'];
    
    $subject = "learningroom.net";
    $message = $massage;
    $headers = "From:" . $from . "\r\n";
    // $headers .= "Bcc:" . $bcc . "\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $mailsend = mail($to,$subject,$message, $headers);
  }
    if ($mailsend) {
    echo "<script>";
    echo "alert(\"  Send Mail To All User Success \");"; 
    echo "window.location ='index.php';";
    echo "</script>";
  }else{
    echo "<script>";
    echo "alert(\" Error \");"; 
    echo "window.location ='index.php';";
    echo "</script>";
  }



}
?>
