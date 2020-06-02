<?php
	$resetfielddata = array(
					'name'			=> 'reset',
					'value'			=> 'Cancel',
				);
	$submitfielddata = array(
			        'name'          => 'submit',
			        'value'			=> 'Update',
				);
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
	<?php echo link_tag('/Assest/Css/styleemployeedashboard.css');?>
	<?php
		include 'header.php';
	?>
	<div id="outerbox">
		<div id="inner1">
			<h2>Update Work</h2>
		</div>
		<div id="inner2">
			<?php echo form_open('admin/updatework');?>
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<label><b>Select Project ID</b></label><br>
								<select name="project_id">
									<?php
										foreach ($project_id_array as $row) 
										{
										?>
											<option><?php echo $row['project_id']; ?></option>
										<?php	
										}
									?>
								</select><br>
								<span id="error"><?php echo form_error('project_id'); ?></span>
							</td>
						</tr>
					</table>
				</div>
				<div id="descriptionsection">
					<table>
						<tr>
							<td>
								<label><b>Description</b></label>
								<textarea rows="4" cols="50" name="description" value="<?php echo set_value('description'); ?>"></textarea>
								<span id="error"><?php echo form_error('description'); ?></span>
							</td>
						</tr>
					</table>
					<div id="submitbutton">
						<?php echo form_reset($resetfielddata);?>
						<?php echo form_submit($submitfielddata);?>
					</div>
				</div>
			<?php echo form_close(); ?>
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
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($employee_project_array as $row)
					{
						$deadline_date=date('d-m-yy',strtotime($row['deadline']));
						$created_date=date('d-m-yy H:i:s',strtotime($row['created_time']));
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $created_date;?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $deadline_date;?></td>
							<td><?php echo $row['project_id'];?></td>
							<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
							<td><?php echo $row['contact_number'];?></td>
							<td><?php echo $row['contact_email'];?></td>
							<td>
								<a href="<?php echo base_url('admin/viewproject/'.$row["project_id"]);?>">
									<i class="fa fa-eye fa-1x" aria-hidden="true"></i>
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