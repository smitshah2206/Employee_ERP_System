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
	<?php echo link_tag('/Assest/Css/styledashboard.css');?>
	<?php
		include 'header.php';
	?>
		<div id="innercontainer">
			<select id="type">
				<option value="Employees">Employees</option>
				<option value="Projects">Projects</option>
			</select>
			<table id="employeetable">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Role</th>
						<th>Position</th>
						<th>Full Name</th>
						<th>Contact Number</th>
						<th>Contact Email</th>
						<th>Joining Date</th>
						<th>Last Project Id</th>
						<th>Last Project Name</th>
						<th>Last Work Time</th>
						<th>Action Perform</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$a=1;
						foreach ($employee_array as $row)
						{
							$created_date=date('d-m-yy',strtotime($row['date_of_joining']));
							if ($row['last_work_time']=='---') 
							{
								$last_work_time='---';
							}
							else
							{
								$last_work_time=date('d-m-yy H:i:s',strtotime($row['last_work_time']));
							}
						?>
							<tr>
								<td><?php echo $a++;?></td>
								<td><?php echo $row['role'];?></td>
								<td><?php echo $row['position'];?></td>
								<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
								<td><?php echo $row['contact_number'];?></td>
								<td><?php echo $row['contact_email'];?></td>
								<td><?php echo $created_date;?></td>
								<td><?php echo $row['last_project_id'];?></td>
								<td><?php echo $row['last_project_name'];?></td>
								<td><?php echo $last_work_time;?></td>
								<td>
									<a href="<?php echo base_url('admin/editemployee/'.$row["employee_id"]);?>">
										<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>
									</a>&nbsp;
									<a href="<?php echo base_url('admin/viewemployee/'.$row["employee_id"]);?>">
										<i class="fa fa-eye fa-1x" aria-hidden="true"></i>
									</a>&nbsp;
									<?php
										if($row['role'] != 'Admin')
										{
										?>
										<a href="<?php echo base_url('admin/deleteemployee/'.$row["employee_id"]);?>">
											<i class="fa fa-trash-o fa-1x" aria-hidden="true"></i>
										</a>
										<?php
										}
									?>
								</td>
							</tr>
						<?php
						}
					?>
				</tbody>
			</table>
			<table id="projecttable">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Deadline</th>
						<th>Full Name</th>
						<th>Customer Number</th>
						<th>Customer Email</th>
						<th>Last Employee Id</th>
						<th>Last Employee Name</th>
						<th>Last Employee Time</th>
						<th>Action Perform</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$a=1;
						foreach ($project_array as $row)
						{
							if ($row['last_work_time']=='---') 
							{
								$last_work_time='---';
							}
							else
							{
								$last_work_time=date('d-m-yy H:i:s',strtotime($row['last_work_time']));
							}
							$deadline_date=date('d-m-yy',strtotime($row['deadline']));
						?>
							<tr>
								<td><?php echo $a++;?></td>
								<td><?php echo $deadline_date;?></td>
								<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
								<td><?php echo $row['contact_number'];?></td>
								<td><?php echo $row['contact_email'];?></td>
								<td><?php echo $row['last_employee_id'];?></td>
								<td><?php echo $row['last_employee_name'];?></td>
								<td><?php echo $last_work_time;?></td>
								<td>
									<a href="<?php echo base_url('admin/editproject/'.$row["project_id"]);?>">
										<i class="fa fa-pencil fa-1x" aria-hidden="true"></i>
									</a>&nbsp;
									<a href="<?php echo base_url('admin/viewproject/'.$row["project_id"]);?>">
										<i class="fa fa-eye fa-1x" aria-hidden="true"></i>
									</a>&nbsp;
									<a href="<?php echo base_url('admin/deleteproject/'.$row["project_id"]);?>">
										<i class="fa fa-trash-o fa-1x" aria-hidden="true"></i>
									</a>
								</td>
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
<script type="text/javascript">
	var profile_name=document.getElementById('type');
	$("#type").on('change',check);
	function check()
	{
            var name=profile_name.value;
            if(name=='Employees')
            {
            	$("#employeetable").css('visibility','visible');
            	$("#projecttable").css('visibility','hidden');
            }
            else
            {
            	$("#employeetable").css('visibility','hidden');
            	$("#projecttable").css('visibility','visible');
            }
    }
</script>