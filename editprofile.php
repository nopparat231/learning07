<?php session_start();?>
<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>
<?php include 'conn.php';  ?>
<div class="container">
  <div class="row">
   <div class="col-md-12">
    <?php include 'carousel.php'; ?>
    <?php include 'navbar.php'; ?>
    <?php include 'model.php'; ?>


    <?php 
    include('conn.php'); 
    $user_id = $_GET['user_id'];
    $eu = isset($_REQUEST['eu']);
    if ($eu <> ''): ?>

      <?php include 'editprofile_show.php'; ?>
      <?php else: ?>
        <?php 


        $check = "SELECT * FROM user WHERE id = $user_id ";
        $result = mysqli_query($con,$check) or die(mysqli_error());
        $num = mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-1"></div>
        <div class="col-md-10">
         <div class="py-2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="text-center"><b>Edit Your Profile</b></h1>
                <hr>
              </div>
            </div>
          </div>
        </div>
        <div class="py-1">

          <div class="container text-center ">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <form class="form-inline" id="c_form-h" action="editprofile_db.php" method="post" >
                  <table border="0">
                   <tbody>
                    <tr>
                      <td>Name</td>
                      <td>
                        <input type="text" name="Firstname" readonly class="form-control" id="inlineFormInputGroup" required="กรุณากรอกชื่อ" placeholder="กรุณากรอกชื่อ"  value="<?php echo($num['Firstname'])?>" onkeyup="validate();" minlength="3" maxlength="25" title="ใส่ ก-ฮ หรือ a-z เท่านั้น">
                      </td>

                      <td></td>
                      <td>Last Name</td>
                      <td>
                        <input type="text" name="Lastname" readonly class="form-control" id="inlineFormInputGroup" required="กรุณากรอกนามสกุล" placeholder="กรุณากรอกนามสกุล" value="<?php echo($num['Lastname'])?>"  onkeyup="validate();" minlength="3" maxlength="25" title="ใส่ ก-ฮ หรือ a-z เท่านั้น">
                      </td>
                    </tr>
                    <tr>
                      <td>E-mail</td>
                      <td>
                       <input type="email" name="email" class="form-control" id="inputmailh" required="กรุณากรอกอีเมล์" placeholder="กรุณากรอกอีเมล์"  value="<?php echo($num['email'])?>">
                     </td>
                     <td></td>
                     <td>Phone</td>
                     <td>
                       <input name="phone" class="form-control" id="input-num" required="กรุณากรอกเบอร์โทร" placeholder="กรุณากรอกเบอร์โทร" value="<?php echo($num['phone'])?>" title="เบอร์โทร 0-9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       type="tel"
                       maxlength = "10" onkeyup="num();">
                     </td>
                   </tr>

                   <tr>
                     <td>Username</td>
                     <td>
                      <input type="text" class="form-control" readonly  value="<?php echo($num['Username'])?>">
                    </td>
                    <td></td>
                    <td>Password</td>
                    <td>
                      <input type="password" name="Password" onkeyup="checkPasswordMatch();" id="txtNewPassword" class="form-control" required  value="<?php echo($num['Password'])?>">
                    </td>
                  </tr>
                  <input type="hidden" name="id" value="<?php echo($num['ID'])?>">
                  <tr>

                    <td>Session</td>
                    <td>

                      <select class="custom-select" disabled name="session" style="width: 210px">

                        <?php 


                        $query_group1 = "SELECT * FROM user_group";
                        $group1 = mysqli_query($con,$query_group1) or die(mysqli_error());
                        $row_group1 = mysqli_fetch_assoc($group1);
                        $totalRows_group1 = mysqli_num_rows($group1);

                        do {


                          ?>

                          <option  value="<?php echo $row_group1['g_id']; ?>"><?php echo $row_group1['g_session']; ?></option>


                        <?php } while ($row_group1 = mysqli_fetch_assoc($group1)); ?>
                      </select>
                    </td>
                    <td></td>
                    <td>Confirm Password</td>
                    <td>
                      <input type="password" name="cPassword" id="txtConfirmPassword" class="form-control" required  value="<?php echo($num['Password'])?>">
                       <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                    </td>

                  </tr>


                </tbody>
                <tfoot>
                 <tr> 
                   <td></td>
                   <td></td>
                   <td> 
                     &nbsp; 
                   </td>
                   <td> 
                    &nbsp; 
                  </td>
                </tr>
                <tr> 
                 <td></td>
                 <td></td>
                 <td> 
                   <button name="btn" class="btn btn-outline-success" >Confirm</button>
                 </td>
                 <td> 
                  <a class="btn btn-outline-danger" href="index1.php">Cancel</a>
                </td>
              </tr>
            </tfoot>

          </table>

          <!-- DivTable.com -->
        </form>

      </div>



    </div>
  </div>
  <div class="col-md-1"></div>
</div>



</div>
<div class="col-md-1"></div>
</div>
<?php endif ?>
</div> 
</div>
<?php

if ($eu == ''): ?>

  <?php else: ?>
    <style>
      .footer {
       position: fixed;
       bottom: 0;
       width: 100%;
       color: white;
       text-align: center;
     }
   </style>
 <?php endif ?>
 <br><br><br><br><br><br>
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

  function numid() {
    var element = document.getElementById('input-num-id');
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
      $("#divCheckPasswordMatch").html("Password Not Match!");
    else
      $("#divCheckPasswordMatch").html("Password Match");
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