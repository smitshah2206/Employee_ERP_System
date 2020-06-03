<?php
	$firstnamefielddata = array(
			        'type'			=> 'text',
			        'name'          => 'first_name',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('first_name',$project_details[0]['first_name']),
				);
	$lastnamefielddata = array(
			        'type'			=> 'text',
			        'name'          => 'last_name',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('last_name',$project_details[0]['last_name']),
				);
	$projectamountfielddata = array(
			        'type'			=> 'number',
			        'name'          => 'project_amount',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('project_amount',$project_details[0]['project_amount']),
				);
	$deadlinefielddata = array(
			        'type'			=> 'date',
			        'name'          => 'deadline',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('deadline',$project_details[0]['deadline']),
				);
	$projectnamefielddata = array(
			        'type'			=> 'text',
			        'name'          => 'project_name',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('project_name',$project_details[0]['project_name']),
				);
	$contactnumberfielddata = array(
			        'type'			=> 'number',
			        'name'          => 'contact_number',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('contact_number',$project_details[0]['contact_number']),
				);
	$contactemailfielddata = array(
			        'type'			=> 'email',
			        'name'          => 'contact_email',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('contact_email',$project_details[0]['contact_email']),
				);
	$descriptionfielddata = array(
			        'type'			=> 'text',
			        'name'          => 'description',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('description',$project_details[0]['description']),
				);
	$resetfielddata = array(
					'name'			=> 'reset',
					'value'			=> 'Cancel',
				);
	$submitfielddata = array(
			        'name'          => 'submit',
			        'value'			=> 'Save',
				);
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo link_tag('/Assest/Css/styleproject.css');?>
	<?php
		include 'header.php';
	?>
	<div id="outerbox">
		<div id="inner1">
			<h2>Edit Project</h2>
		</div>
		<div id="inner2">
			<?php echo form_open('admin/updateproject/'.$project_id);?>
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<label><b>First Name</b></label>
								<?php echo form_input($firstnamefielddata);?><br>
								<span id="error"><?php echo form_error('first_name'); ?></span>
							</td>
							<td>
								<label><b>Last Name</b></label>
								<?php echo form_input($lastnamefielddata);?><br>
								<span id="error"><?php echo form_error('last_name'); ?></span>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Project Cost</b></label><br>
								<i class="fa fa-rupee fa-1x" aria-hidden="true"></i><?php echo form_input($projectamountfielddata);?><br>
								<span id="error"><?php echo form_error('project_amount'); ?></span>
							</td>
							<td>
								<label><b>Deadline</b></label>
								<?php echo form_input($deadlinefielddata);?><br>
								<span id="error"><?php echo form_error('deadline'); ?></span>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label><b>Project Name</b></label>
								<?php echo form_input($projectnamefielddata);?><br>
								<span id="error"><?php echo form_error('project_name'); ?></span>
							</td>
						</tr>
					</table>
				</div>
				<div id="contactsection">
					<table>
						<tr>
							<td>
								<label><b>Contact Number</b></label>
								<?php echo form_input($contactnumberfielddata);?><br>
								<span id="error"><?php echo form_error('contact_number'); ?></span>
							</td>
							<td>
								<label><b>Contact Email</b></label>
								<?php echo form_input($contactemailfielddata);?><br>
								<span id="error"><?php echo form_error('contact_email'); ?></span>
							</td>
						</tr>
					</table>
				</div>
				<div id="descriptionsection">
					<table>
						<tr>
							<td>
								<label><b>Description</b></label>
								<?php echo form_input($descriptionfielddata);?><br>
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
					<th>Deadine</th>
					<th>Project Id</th>
					<th>Customer Name</th>
					<th>Customer Number</th>
					<th>Customer Email</th>
					<th>Action Perform</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($project_array as $row)
					{
						$deadline=$row['deadline'];
						$deadline_date=date('d',strtotime($deadline)).'-'.date('m',strtotime($deadline)).'-'.date('Y',strtotime($deadline));
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $deadline_date;?></td>
							<td><?php echo $row['project_id'];?></td>
							<td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
							<td><?php echo $row['contact_number'];?></td>
							<td><?php echo $row['contact_email'];?></td>
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