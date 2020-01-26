<?php 

ini_set('error_reporting', 0);
ini_set('display_errors', 0);

if(session_status() == PHP_SESSION_NONE){
    //session has not started
  session_start();
}

if (isset($_SESSION["UserID"])) {
  header('Location: index1.php');
  exit;
}

?>

<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<div class="py-2">
  <div class="container">
   <div class="row">
    <div class="col-md-12">

     <?php include 'carousel.php'; ?>
     <?php include 'navbar.php'; ?>
     
     <?php
     $regis = isset($_GET['register']);
     $learning = isset($_GET['learning']);

     if ($regis <> ''): ?>
       <div class="row">

         <div class="col-md-2"></div>
         <div class="col-md-8 text-center ">
          <?php include 'register.php'; ?>
        </div>
        <div class="col-md-2"></div>
      </div>
      <?php elseif ($learning <> ''): ?>
        <div class="col-md-12">
          <?php include 'index1.php'; ?>
        </div>
        <?php else: ?>
          <br>
          <div class="col-md-12" style="text-align: center;"> <!-- ใส่วิดีโอตัวอย่าง -->
            <!-- <div class="embed-responsive embed-responsive-16by9">
             <center>
              <iframe width="560" height="315" src="https://www.youtube.com/embed/IiTjI_Bleu4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center> 
          </div> -->
          <font color="red">
            <h2 class=""><b>Instructions:</b></h2>
            <h4>
              
                
                <h3><b>In order to protect your personal information, please study & follow these step</b></h3>
                <br>
                <li>You must login with a login name & enter a password</li>
                <li>You must provide true information about yourself</li>
                <li>You must keep your password confidential to prevent misuse or impersonation</li>
                <li>To complete login for e-learning, please use Google chrome  Log in </li>
                <br>
                <b>* Those who do not subscribe to the press "Register" For those who already subscribe to the press "Log in" to Login</b>

               
              
            </h4>
          </font>


        </div>


      <?php endif ?>

    </div>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>


</html>


<script type="text/javascript">

  function validate() {
    var element = document.getElementById('input-field');
    element.value = element.value.replace(/[^a-zA-Zก-๙ @]+/, '');
  };

  function num() {
    var element = document.getElementById('input-num');
    element.value = element.value.replace(/[^0-9]+/, '');
  };

  function user() {
    var element = document.getElementById('input-user');
    element.value = element.value.replace(/[^a-zA-Z0-9]+/, '');
  };
</script>

<script type="text/javascript">
  function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();
    if (password != confirmPassword)
      $("#divCheckPasswordMatch").html("รหัสผ่านไม่ตรงกัน!");
    else
      $("#divCheckPasswordMatch").html("รหัสผ่านตรงกัน");
  }

          /*
  jQuery document ready.
  */
  $(document).ready(function()
  {
  /*
    assigning keyup event to password field
    so everytime user type code will execute
    */

    $('#txtNewPassword').keyup(function()
    {
      $('#result').html(checkStrength($('#txtNewPassword').val()))
    })  

  /*
    checkStrength is function which will do the 
    main password strength checking for us
    */

    function checkStrength(password)
    {
    //initial strength
    var strength = 0
    
    //if the password length is less than 6, return message.
    if (password.length < 6) { 
      $('#result').removeClass()
      $('#result').addClass('short')
      return 'รหัสสั้นเกินไป' 
    }
    
    //length is ok, lets continue.
    
    //if length is 8 characters or more, increase strength value
    if (password.length > 7) strength += 1

    //if password contains both lower and uppercase characters, increase strength value
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1

    //if it has numbers and characters, increase strength value
  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 

    //if it has one special character, increase strength value
  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1

    //if it has two special characters, increase strength value
  if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1

    //now we have calculated strength value, we can return messages

    //if value is less than 2
    if (strength < 2 )
    {
      $('#result').removeClass()
      $('#result').addClass('weak')
      return 'รหัสง่ายเกินไป'     
    }
    else if (strength == 2 )
    {
      $('#result').removeClass()
      $('#result').addClass('good')
      return 'รหัสปลอดภัย'   
    }
    else
    {
      $('#result').removeClass()
      $('#result').addClass('strong')
      return 'รหัสปลอดภัยมาก'
    }
  }
});

</script>