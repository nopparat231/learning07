<meta charset="UTF-8" />
<?php include '../conn.php'; ?>

<?php


$session_idst = $_GET['session_idst'];
$session_status = $_GET['session_status'];



$sql ="UPDATE user_group SET g_status = '$session_status' WHERE g_id = '$session_idst'";


$result = mysqli_query($con,$sql) or die("Error in query : $sql" .mysqli_error());


mysqli_close($con);


if($result){
	echo "<script>";
	echo "window.location ='index.php?sio'; ";
	echo "</script>";
} else {

	echo "<script>";
	echo "alert('ERROR!');";
	echo "window.location ='index.php?sio'; ";
	echo "</script>";
}
?>
