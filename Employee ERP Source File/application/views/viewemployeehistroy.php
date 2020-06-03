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
			<h2>Employee Histroy</h2>
		</div>
		<div id="inner2">
			<?php echo form_open('admin/addemployee');?>
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<label><b>Role</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['role'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Employee Id</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['employee_id'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Full Name</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['first_name'].' '.$employee_details[0]['last_name'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Position</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['position'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Income</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['income'];?> <i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Date Of Joining</b></label>
							</td>
							<td>
								<label>
									<b>
										<?php echo date('d-m-yy',strtotime($employee_details[0]['date_of_joining']));?>
									</b>
								</label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Contact Number</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['contact_number'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Contact Email</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['contact_email'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Total Project</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['role'];?></b></label>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Description</b></label>
							</td>
							<td>
								<label><b><?php echo $employee_details[0]['description'];?></b></label>
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
					<th>Last Work Date</th>
					<th>Description</th>
					<th>Deadine Date</th>
					<th>Project Id</th>
					<th>Customer Name</th>
					<th>Customer Number</th>
					<th>Customer Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($project_details as $row)
					{
						$deadline_date=date('d-m-yy',strtotime($row['deadline']));
						$last_work_time=date('d-m-yy H:i:s',strtotime($row['created_time']));
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $last_work_time;?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $deadline_date;?></td>
							<td><?php echo $row['project_id'];?></td>
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