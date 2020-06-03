<?php 
	if (isset($message)) 
	{
	?>
		<script type="text/javascript">
			alert('<?php echo $message; ?>');
		</script>
	<?php
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo link_tag('/Assest/Css/styleviewemployeehistroy.css');?>
	<?php
		include 'header.php';
	?>
	<div id="outerbox">
		<div id="inner1">
			<h2>Project Histroy</h2>
		</div>
		<div id="inner2">
			<?php echo form_open('admin/addemployee');?>
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<label><b>Project Id</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['project_id'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Full Name</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['first_name'].' '.$project_details[0]['last_name'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Project Name</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['project_name'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Project Amount</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['project_amount'];?> <i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Project Description</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['description'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Created Date</b></label>
							</td>
							<td>
								<label>
									<b>
										<?php echo date('d-m-yy H:i:s',strtotime($project_details[0]['date_of_created']));?>	
									</b>
								</label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Deadline</b></label>
							</td>
							<td>
								<label>
									<b>
										<?php echo date('d-m-yy',strtotime($project_details[0]['deadline']));?>
									</b>
								</label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Contact Number</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['contact_number'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Contact Email</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['contact_email'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Last Employee Id</b></label>
							</td>
							<td>
								<label><b><?php echo $project_details[0]['last_employee_id'];?></b></label>
							</td>
						</tr>
					</table>
				</div>
		</div>
	</div>
	<div id="outertable">
		<table>
			<thead>
				<tr>
					<th>Sr No.</th>
					<th>Work Update Date</th>
					<th>Description</th>
					<th>Position</th>
					<th>Employee Id</th>
					<th>Employee Name</th>
					<th>Employee Number</th>
					<th>Employee Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($employee_details as $row)
					{
						$work_update_date=date('d-m-yy H:i:s',strtotime($row['created_time']));
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $work_update_date;?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['position'];?></td>
							<td><?php echo $row['employee_id'];?></td>
							<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
							<td><?php echo $row['contact_number'];?></td>
							<td><?php echo $row['contact_email'];?></td>
						</tr>
					<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<?php
		include 'footer.php';
	?>