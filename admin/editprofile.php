
<?php 

$user_id = $_GET['user_id'];
$eu = isset($_REQUEST['eu']);


$check = "SELECT * FROM user WHERE id = $user_id ";
$result = mysqli_query($con,$check) or die(mysqli_error());
$num = mysqli_fetch_assoc($result);

?>

<form class="form-inline" id="c_form-h" action="editprofile_db.php" method="post" >
  <div class="modal fade bd-example-modal-lg" id="EditUseModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">


          <div class="container text-center ">
            <div class="row">

              <table border="0">
               <tbody>
                <tr>
                  <td>Name</td>
                  <td style="width: 300px">
                    <input type="text" name="Firstname" class="form-control" id="inlineFormInputGroup" required="กรุณากรอกชื่อ" placeholder="กรุณากรอกชื่อ"  value="<?php echo($num['Firstname'])?>" onkeyup="validate();" minlength="3" maxlength="25" title="ใส่ ก-ฮ หรือ a-z เท่านั้น">
                  </td>

                  <td></td>
                  <td>Last Name</td>
                  <td>
                    <input type="text" name="Lastname" class="form-control" id="inlineFormInputGroup" required="กรุณากรอกนามสกุล" placeholder="กรุณากรอกนามสกุล" value="<?php echo($num['Lastname'])?>"  onkeyup="validate();" minlength="3" maxlength="25" title="ใส่ ก-ฮ หรือ a-z เท่านั้น">
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
                 <td>User Name</td>
                 <td>
                  <input type="text" class="form-control" readonly  value="<?php echo($num['Username'])?>">
                </td>
                <td></td>
                <td>Password</td>
                <td>
                  <input type="text" name="Password" class="form-control" required  value="<?php echo($num['Password'])?>">
                </td>
              </tr>
              <input type="hidden" name="id" value="<?php echo($num['ID'])?>">
              <tr>


                <td>Edit Status Section</td>
                <td>

                  <select class="custom-select" name="session" style="width: 210px">

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

                <td>Group</td>
                <td>
                  <?php 
                  $m = '';
                  $a = '';
                  $e = '';
                  if ($num['Userlevel'] == 'A' ){
                    $a = 'selected';
                  }elseif ($num['Userlevel'] == 'M') {
                    $m = 'selected';
                  }elseif ($num['Userlevel'] == 'E') {
                    $e = 'selected';
                  }
                  ?>
                  <select class="custom-select" name="Userlevel" style="width: 210px">
                   <option <?php echo $a; ?> value="A">Teacher</option>
                   <option <?php echo $m; ?> value="M">Student</option>
                   <option <?php echo $e; ?> value="M">Remove</option>

                 </select>
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

          </tfoot>

        </table>



      </div>
    </div>
  </div>


  <div class="modal-footer"> 
    <button type="submit" class="btn btn-primary">Confirm</button> 
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
  </div>
</div>
</div>
</div>
</form>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



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