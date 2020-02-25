
<?php 
date_default_timezone_set('Asia/Bangkok');

$query_user = "SELECT * FROM user ORDER BY ID desc";
$user = mysqli_query($con,$query_user) or die(mysqli_error());
$row_user = mysqli_fetch_assoc($user);
$totalRows_user = mysqli_num_rows($user);




?>
<?php include 'add_session.php';
?>
<div class="col-md-12">
	<div class="py-2">
		<div class="container">
			<div class="row" align="center">
				<div class="col-md-12">
					<a href="index.php" class="myButton" data-toggle='modal' data-target='#addsessionModal'>+</a>
					<!-- <a href="index.php" class="myButton" data-toggle='modal' data-target='#addMemModal'>+</a> -->
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
										<th scope="col">Section</th>
										<th scope="col">Status</th>
										
										<th scope="col" width="5">Edit</th>
										<th scope="col" width="5">Cancel</th>
									</tr>
								</thead>
								<tbody>
									


									<?php 


									$query_group1 = "SELECT * FROM user_group";
									$group1 = mysqli_query($con,$query_group1) or die(mysqli_error());
									$row_group1 = mysqli_fetch_assoc($group1);
									$totalRows_group1 = mysqli_num_rows($group1);
									$i = 1 ;
									do {


										?>


										<tr class="text-center">
											<td><?php echo $i ?></td>
											<td><?php echo $row_group1['g_session']; ?></td>


											<td>
												<?php 

												if ($row_group1['g_status'] == '0' ){
													echo "Normal";
												}elseif ($row_group1['g_status'] == '1') {
													echo "<font color='red' >Remove</font>";
												}

												?>

											</td>


											<td>
												<a href="index.php?sio&session_id=<?php echo $row_group1['g_id'];?>" class="btn btn-outline-warning my-2 my-sm-0" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
											</td>

											<?php if ($row_group1['g_status'] <> '1' ): ?>
												<td>
													<a href="del_session.php?session_idst=<?php echo $row_group1['g_id'];?>&session_status=1" class="btn btn-outline-danger my-2 my-sm-0" onClick="return confirm('ยืนยันการยก Session');"><i class="fa fa-ban" aria-hidden="true"></i></a>
												</td>
												<?php else: ?>
													<td>
														<a href="del_session.php?session_idst=<?php echo $row_group1['g_id'];?>&session_status=0" class="btn btn-outline-secondary my-2 my-sm-0" onClick="return confirm('ยืนยันการใช้งาน Session ');"><i class="fa fa-repeat" aria-hidden="true"></i></a>
													</td>
												<?php endif ?>



										</tr>

										<?php
										$i += 1;

									} while ($row_group1 = mysqli_fetch_assoc($group1)); ?>


								</tbody>
							</table>
						<?php }else {
							echo "<h3> No Score </h3>";
						}

						?>


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
