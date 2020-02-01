
<h4 class="text-center"><b>Register</b></h4>

<form class="" id="c_form-h" action="register_db.php" method="post" >
  <div class="form-group row"><label class="col-2 col-form-label">Username<br></label>
    <div class="col-9">
      <div class="input-group">
        <input type="text" name="Username" class="form-control" id="input-user" required placeholder="Username" pattern="^[a-zA-Z0-9]+$" autocomplete="off" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="3" maxlength="25" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="user();" >
      </div>
    </div><font color="red" size="5">*</font>
  </div>
  <div class="form-group row"> 
    <label for="inputpasswordh" class="col-2 col-form-label">Password<br></label>
    <div class="col-9">
      <input type="password" name="Password" id="txtNewPassword" class="form-control" required placeholder="รหัสผ่านต้องมี ตัวใหญ่ ตัวเล็ก ตัวเลข อย่างน้อย 8 ตัวขึ้นไป" autocomplete="off" title="รหัสผ่านต้องมี ภาษาอังกฤษตัวใหญ่ ตัวเล็ก ตัวเลข 8 ตัวขึ้นไป"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="25" >
      <span id="result"></span>

    </div><font color="red" size="5">*</font>
  </div>
  <div class="form-group row">
   <label for="inputpasswordh" class="col-2 col-form-label text-nowrap">Password<br></label>
   <div class="col-9">
    <input type="password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();" class="form-control" id="inputpasswordh" autocomplete="off" title="รหัสผ่านต้องมี ภาษาอังกฤษตัวใหญ่ ตัวเล็ก ตัวเลข 8 ตัวขึ้นไป"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="กรุณากรอกยืนยันรหัสผ่าน" minlength="6" maxlength="25"  >
    <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
  </div><font color="red" size="5">*</font>
</div>
<div class="form-group row"><label class="col-2">Name</label>
  <div class="col-9">
    <div class="input-group">
      <input type="text" name="Firstname" class="form-control" id="inlineFormInputGroup" required="กรุณากรอกชื่อ" placeholder="กรุณากรอกชื่อ" onkeyup="validate();" minlength="3" maxlength="25"  autocomplete="off" title="ใส่ ก-ฮ หรือ a-z อย่างน้อย 3 ตัว">
    </div>
  </div><font color="red" size="5">*</font>
</div>
<div class="form-group row"><label class="col-2">Last Name</label>
  <div class="col-9">
    <div class="input-group">
      <input type="text" name="Lastname" class="form-control" id="inlineFormInputGroup" required="กรุณากรอกนามสกุล อย่างน้อย 3 ตัว" placeholder="กรุณากรอกนามสกุล" onkeyup="validate();" minlength="3" maxlength="25"  autocomplete="off" title="ใส่ ก-ฮ หรือ a-z อย่างน้อย 3 ตัว">
    </div>
  </div><font color="red" size="5">*</font>
</div>
<div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">E-mail</label>
  <div class="col-9">
    <input type="email" name="email" class="form-control" id="inputmailh" required="กรุณากรอกอีเมล์" placeholder="กรุณากรอกอีเมล์" autocomplete="off" title="กรุณาใช้ อีเมล์ ที่ใช้งานได้จริง" />
  </div><font color="red" size="5">*</font>
</div>
<div class="form-group row">
  <label class="col-2">Phone<br></label>
  <div class="col-9">
    <div class="input-group">
      <input name="phone" class="form-control" id="input-num" required="กรุณากรอกเบอร์โทร" placeholder="กรุณากรอกเบอร์โทร" value="" size="10" autocomplete="off" title="เบอร์โทร 0-9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
      type="tel"
      maxlength = "10" onkeyup="num();">
    </div>
  </div><font color="red" size="5">*</font>
</div>

<div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">Namber</label>
  <div class="col-9">
    <input type="number" name="user_stid" class="form-control" id="user_stid" required="กรุณากรอกรหัสให้ครบ" placeholder="กรุณากรอกรหัสประจำตัว" autocomplete="off" title="กรุณากรอกรหัสให้ครบ" />
  </div><font color="red" size="5">*</font>
</div>

<div class="form-group row">
 <label class="col-2">Group</label>
 <div class="col-9">
  <div class="input-group">
    <select name="Userlevel" class="custom-select mb-2" required>
      <option selected>Select Group</option>
      <option value="A">Teacher
</option>
      <option value="M">Student</option>
    </select>
  </div>
</div><font color="red" size="5">*</font>
</div>

<label></label>
<label class="pull-left"><font color="red">*</font>Please fill out all information.</label>
<div class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <button name="btn" class="btn text-light mx-1" style="background-color: #581845">Confirm registration
</button>
        <!-- <a class="btn btn-danger text-light mx-1" href="index.php">ยกเลิก</a> -->
      </div>
    </div>
  </div>
</div>
</form>



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


</script>
