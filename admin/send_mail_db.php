<meta charset="UTF-8" />

<?php
  include('../conn.php');
  include '../PHPMailer/sent.php';


if (isset($_POST['m']) <> '') { 

  $massage = $_POST['massage'];

  $checkemail = "SELECT Userlevel,email FROM user WHERE email <> '' AND Userlevel = 'M'";
  $resultemail = mysqli_query($con,$checkemail);
  $numrow = mysqli_num_rows($resultemail);

  do ($row = mysqli_fetch_array($resultemail)) 
  {

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "CC@learningroom.net";
    $to = $row['email'];
    
    $subject = "learningroom.net";
    $message = $massage;
    $headers = "From:" . $from . "\r\n";
    // $headers .= "Bcc:" . $bcc . "\r\n";
    // $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    // $mailsend = mail($to,$subject,$message, $headers);



    $mail->IsHTML(true);
    $mail->CharSet = "text/html; charset=UTF-8;";
    $mail->setFrom($from);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();


  }
//break;
    echo "<script>";
    echo "alert(\"  Send Mail To User Success \");"; 
    echo "window.location ='index.php';";
    echo "</script>";



}elseif (isset($_POST['a']) <> '') {

 $massage = $_POST['massage'];

 $checkemail = "SELECT Userlevel,email FROM user WHERE Userlevel = 'A' AND email <> ''";
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
    // $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    // $mailsend = mail($to,$subject,$message, $headers);



  $mail->IsHTML(true);
  $mail->CharSet = "text/html; charset=UTF-8;";
  $mail->setFrom($from);
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $message;

  $mail->send();

}
if ($mail) {
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

  $checkemail = "SELECT Userlevel,email FROM user WHERE Userlevel = 'M' and Userlevel = 'A' AND email <> '' ";
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
        // $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    // $mailsend = mail($to,$subject,$message, $headers);



    $mail->IsHTML(true);
    $mail->CharSet = "text/html; charset=UTF-8;";
    $mail->setFrom($from);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

  }
  if ($mail) {
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
