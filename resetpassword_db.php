<meta charset="UTF-8" />
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php date_default_timezone_set('Asia/Bangkok'); ?>
<?php  if (isset($_POST['email'])) { 


  $email = $_POST['email'];
  include 'PHPMailer/sent.php';
  include('conn.php');
  $checkemail = "SELECT * FROM user WHERE email = '$email'";
  $resultemail = mysqli_query($con,$checkemail);
  $objResult = mysqli_fetch_array($resultemail);
  $numemail = mysqli_num_rows($resultemail);
  $massage = "<h2>Hello : <b>".$objResult['Firstname']."</b></h2><br><h1> Your Password : ".$objResult['Password']."</h1>";
  if ($numemail > 0 ){


   ini_set( 'display_errors', 1 );
   error_reporting( E_ALL );
   $from = "service@education.com";
   $to = $email;
   $subject = "Resetpassword learningroom.net";
   $message = $massage;
   $headers = "From:" . $from . "\r\n";
   $headers .= "Content-Type: text/html; charset=utf-8\r\n";
   

   
   $mail->IsHTML(true);
   $mail->CharSet = "text/html; charset=UTF-8;";
   $mail->setFrom($from);
   $mail->addAddress($to);
   $mail->Subject = $subject;
   $mail->Body = $message;
   

   if($mail->send()){
     ?>

     <script type="text/javascript">
      var $ws = 'index.php';

      setTimeout(function () { 
        swal({
          title: "กรุณาตรวจสอบ รหัสผ่านที่ E-mail",

          type: "success",

          confirmButtonText: "ตกลง"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = $ws;
          }
        }); }, 50);

      </script>

    <?php }else{ ?>

      <script type="text/javascript">
        var $ws = 'index.php';

        setTimeout(function () { 
          swal({
            title: " Server มีปัญหา กรุณารอสักครู่แล้วลองใหม่",

            type: "error",

            confirmButtonText: "ตกลง"
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = $ws;
            }
          }); }, 50);


        </script>

      <?php   }

    }else{ ?>

     <script type="text/javascript">
      var $ws = 'index.php';

      setTimeout(function () { 
        swal({
          title: "ไม่พบที่อยู่ E-Mail กรุณาตรวจสอบ E-mail ที่ท่านใช้สมัคร",

          type: "error",

          confirmButtonText: "ลองใหม่อีกครั้ง"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = $ws;
          }
        }); }, 50);


      </script>

    <?php  }
  }

  ?>
