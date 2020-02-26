<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">



<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');
include('../conn.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{


	$allowedFileType = ['text/x-comma-separated-values', 
	'text/comma-separated-values', 
	'text/x-csv', 
	'text/csv', 
	'text/plain',
	'application/octet-stream', 
	'application/vnd.ms-excel', 
	'application/x-csv', 
	'application/csv', 
	'application/excel', 
	'application/vnd.msexcel', 
	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

	if(in_array($_FILES["file"]["type"],$allowedFileType)){

		$targetPath = 'uploads/'.$_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

		$Reader = new SpreadsheetReader($targetPath);

		$sheetCount = count($Reader->sheets());
		for($i=0;$i<$sheetCount;$i++)
		{

			$Reader->ChangeSheet($i);

			foreach ($Reader as $Row)
			{

				$Username = "";
				if(isset($Row[0])) {
					$Username = mysqli_real_escape_string($con,$Row[0]);
				}

				$Password = "";
				if(isset($Row[1])) {
					$Password = mysqli_real_escape_string($con,$Row[1]);
				}

				$Firstname = "";
				if(isset($Row[2])) {
					$Firstname = mysqli_real_escape_string($con,$Row[2]);
				}

				$Lastname = "";
				if(isset($Row[3])) {
					$Lastname = mysqli_real_escape_string($con,$Row[3]);
				}

				$email = "";
				if(isset($Row[4])) {
					$email = mysqli_real_escape_string($con,$Row[4]);
				}

				$phone = "";
				if(isset($Row[5])) {
					$phone = mysqli_real_escape_string($con,$Row[5]);
				}

				$group_id = "";
				if(isset($Row[6])) {
					$group_id = mysqli_real_escape_string($con,$Row[6]);
				}

				$Userlevel = "M";

				$user_date = "2022-02-26";

				$session_id = "addbyadmin";

				$Status = "Y";



				if (!empty($Username) || !empty($Password) || !empty($Firstname) || !empty($Lastname) || !empty($email) || !empty($phone) || !empty($Userlevel) || !empty($user_date) || !empty($session_id) || !empty($group_id)) {
					$query = "insert into user(Username,Password,Firstname,Lastname,email,phone,Userlevel,user_date,session_id,group_id,Status) 
					values('".$Username."','".$Password."','".$Firstname."','".$Lastname."','".$email."','".$phone."','".$Userlevel."','".$user_date."','".$session_id."','".$group_id."','".$Status."')";
					$result = mysqli_query($con, $query);

					if (! empty($result)) { ?>



						<script type="text/javascript">

							var $ws = 'index.php?su';

							setTimeout(function () { 
								swal({
									title: "Add User success",

									type: "success",

									confirmButtonText: "OK"
								},
								function(isConfirm){
									if (isConfirm) {
										window.location.href = $ws;
									}
								}); }, 50);
							</script>

						<?php }else{ ?>

							<script type="text/javascript">

								var $ws = 'index.php?su';

								setTimeout(function () { 
									swal({
										title: "Add User error!",

										type: "error",

										confirmButtonText: "Try again"
									},
									function(isConfirm){
										if (isConfirm) {
											window.location.href = $ws;
										}
									}); }, 50);
								</script>

								<?php
							}
						}

					}
				}
			}
		}

		?>