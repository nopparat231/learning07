<meta charset="UTF-8" />
<?php include '../conn.php'; ?>

<?php

$session_id = $_POST['session_id'];
$session_name = $_POST['session_name'];


$sql ="UPDATE user_group SET g_session = '$session_name'WHERE g_id = '$session_id'";


$result = mysqli_query( $con,$sql) or die("Error in query : $sql" .mysqli_error());


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
