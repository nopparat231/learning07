
<?php 

$user_id = isset($_GET['user_id']);

$check = "SELECT * FROM user";
$result = mysqli_query($con,$check) or die(mysqli_error());
$num = mysqli_fetch_assoc($result);

?>
<div class="col-md-9">
 <div class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center"><b>Notify</b></h1>
        <hr>
      </div>
    </div>
  </div>
</div>
<div class="py-1">
  <div class="container ">
    <div class="row">

      <form class="" id="c_form-h" action="send_mail_db.php" method="post" >
        <div class="form-group row">
          <div class="col-md-12">

              <textarea rows="8" cols="80" required placeholder="Text Here" name="massage"></textarea>

           
            <label class="col-3">To.</label>
            <div class="col-9">

              <div class="container">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button name="m" type="sub" class="btn btn-primary text-light mx-1" >All User</button>
                    <button name="a" type="btn" class="btn btn-primary text-light mx-1" >Admin</button>
                    <button name="am" type="btn" class="btn btn-primary text-light mx-1" >User & admin</button>


                  </div>
                </div>
              </div>

            </div>
            
            <label class="col-3"></label>

          </div>
        </div>
      </form>

    </div>
  </div>
</div>

</div>

<style>
  .footer {
   position: fixed;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
 }
</style>

</body>

</html>
