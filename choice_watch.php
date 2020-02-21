  
  <link rel="stylesheet" href="redio.css">
 <form name="form1" method="post" action="">
<?php


$choice_id = $_REQUEST['choice_id'];
$user_id = $_REQUEST['user_id'];

$sql="SELECT * From testing WHERE choice_id = '$choice_id' and status <> 1 order by rand() limit 10";
$db_query=mysqli_query($con,$sql) or die(mysqli_error());
//$result=mysqli_fetch_array($db_query);

$sqln="SELECT * From choice WHERE choice_id = $choice_id and choice_status <> 1 ";
$db_queryN=mysqli_query($con,$sqln) or die(mysqli_error());
$resultN=mysqli_fetch_array($db_queryN);


$i=0;
while($result=mysqli_fetch_array($db_query))
{
  $i++;


  $re = $result['answer'];
  $arran = "answer[$re]";

  ?>

  <input name="id" type="hidden" value="<?php echo $result['id']; ?>">
  <input name="id<?php echo $i;?>" type="hidden" value="<?php echo $result['id']; ?>">
  <h3><?php echo $i." ).   ".$result["question"];?></h3>
  <input type="hidden" name="line" value="<?=$i;?>">

  <ol>

    <label class="containerr"><h5><?php echo $result["c1"];?>
    <input type="radio" name="c<?php echo $i;?>" value="1" required>
    <span class="checkmark"></span></h5>
  </label>

  <label class="containerr"><h5><?php echo $result["c2"];?>
  <input type="radio" name="c<?php echo $i;?>" value="2">
  <span class="checkmark"></span></h5>
</label>

<label class="containerr"><h5><?php echo $result["c3"];?>
<input type="radio" name="c<?php echo $i;?>" value="3">
<span class="checkmark"></span></h5>

</label>
<label class="containerr"><h5><?php echo $result["c4"];?>
<input type="radio" name="c<?php echo $i;?>" value="4">
<span class="checkmark"></span></h5>
</label>

<input name="answer<?php echo $i;?>" type="hidden" value="<?php echo $result['answer'];?>">
</ol>


<hr>



<?php } ?>
<input type="hidden" name="bf" value="bf" />

  <button class="btn btn-xs btn-danger buttonn" id="btn1" >Sent</button>

</form>


<?php if (isset($_REQUEST['bf'])) {
  bf();
}

?>
<!-- คำนวนคะแนนก่อนเรียน -->
<?php

function bf(){
  include 'conn.php';

  $choice_id = $_REQUEST['choice_id'];
  $user_id = $_REQUEST['user_id'];

  $score =0;


  $line = $_REQUEST['line']+1;
  for ($i=1; $i < $line; $i++) { 

   if($_REQUEST["c$i"] == $_REQUEST["answer$i"])
   {
    $score=$score+1;
  }
}

$user_learning_af = 'ยังไม่ทำ';

 $sql1 = "UPDATE user_learning SET user_learning_wa = $score WHERE user_id = $user_id AND choice_id = $choice_id ";

$result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());


//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม  
?>
<input type="hidden" name="score" id="sc" value="<?php echo $score; ?>">

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<script type="text/javascript">

  var $ws = 'choice.php?choice_id=<?php echo $choice_id ?>&user_id=<?php echo $user_id ?>&aff=aff';

  setTimeout(function () { 
    swal({
      title: "Your Score <?php echo $score ?> ",

      type: "success",

      confirmButtonText: "Whatching lession"
    },
    function(isConfirm){
      if (isConfirm) {
        window.location.href = $ws;
      }
    }); }, 50);

  </script>
<?php } ?>
