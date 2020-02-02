
<?php 
date_default_timezone_set('Asia/Bangkok');

$query_user = "SELECT * FROM user ORDER BY ID desc";
$user = mysqli_query($con,$query_user) or die(mysqli_error());
$row_user = mysqli_fetch_assoc($user);
$totalRows_user = mysqli_num_rows($user);




?>
<?php include 'add_user.php';
 ?>
<div class="col-md-12">
	<div class="py-2">
		<div class="container">
			<div class="row" align="center">
				<div class="col-md-12">
					<a href="index.php" class="myButton" data-toggle='modal' data-target='#addMemModal'>+</a>
			<!-- 		  <a href="index.php" class="myButton" data-toggle='modal' data-target='#EditChoiceModal'>+</a> -->
				</div>
			</div>
		</div>
	</div>

	<div class="py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive text-center">
						<?php if ($totalRows_user > 0) {?>
							<table class="table table-hover" id="example" bgcolor="white">


								<thead class="thead-dark">
									<tr class="text-center">
										<th scope="col" width="5">No.</th>
										<th scope="col">Username</th>
										<th scope="col">Name</th>
										<th scope="col">Info.</th>
										<!-- <th scope="col">วันหมดอายุ</th> -->
										<th scope="col">Status</th>

										<th scope="col" width="5">Edit</th>
										<th scope="col" width="5">Cancel</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$i = 1 ;
									do { ?>


										<tr class="text-center">

											<td><?php echo $i ?></td>
											<td><?php echo $row_user['Username']; ?></td>
											<td><?php echo $row_user['Firstname'] . "  " . $row_user['Lastname']; ?></td>
											<td class="text-left"><?php echo " Number : " . $row_user['user_stid'] . " <br />  " . " Phone : " . $row_user['phone'] . " <br /> E-mail : " . $row_user['email']; ?></td>
									
											<td>
												<?php 

												if ($row_user['Userlevel'] == 'A' ){
													echo "Teacher";
												}elseif ($row_user['Userlevel'] == 'M') {
													echo "Student";
												}elseif ($row_user['Userlevel'] == 'E') {
													echo "<font color='red' >Delete</font>";
												}

												?>

											</td>


											<td>
												<a href="index.php?su&eus&user_id=<?php echo $row_user['ID'];?>" class="btn btn-outline-warning my-2 my-sm-0" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
											</td>

											<?php if ($row_user['Userlevel'] <> 'E' ): ?>
												<td>
													<a href="del_user.php?User_id=<?php echo $row_user['ID'];?>&Userlevel=E" class="btn btn-outline-danger my-2 my-sm-0" onClick="return confirm('ยืนยันการยกเลิกผู้ใช้');"><i class="fa fa-ban" aria-hidden="true"></i></a>
												</td>
												<?php else: ?>
													<td>
														<a href="del_user.php?User_id=<?php echo $row_user['ID'];?>&Userlevel=M" class="btn btn-outline-secondary my-2 my-sm-0" onClick="return confirm('ยืนยันการใช้งานผู้ใช้');"><i class="fa fa-repeat" aria-hidden="true"></i></a>
													</td>
												<?php endif ?>

											</tr>

											<?php 
											$i += 1;
										} while ($row_user = mysqli_fetch_assoc($user)); ?>

									</tbody>
								</table>
							<?php }else {
								echo "<h3> No Score </h3>";
							}

							mysqli_free_result($user);?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-md-12"></div>
				</div>
			</div>
		</div>
	</div>

	<br><br><br><br><br><br><br><br><br><br>