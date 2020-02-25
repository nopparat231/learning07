<meta charset="UTF-8" />

<?php include '../conn.php'; ?>
<?php

error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$session_name = $_POST['session_name'];

$sql ="INSERT INTO user_group (g_session , g_status) VALUES ('$session_name' , 0)";
$result = mysqli_query($con,$sql) or die("Error in query : $sql" .mysqli_error());

mysqli_close($con);

if($result){
	echo "<script>";
	//echo "alert('Add Session Seccess');";
	echo "window.location ='index.php?sio'; ";
	echo "</script>";
} else {
	echo "<script>";
	echo "alert('ERROR!');";
	echo "window.location ='index.php?sio'; ";
	echo "</script>";
}
?>