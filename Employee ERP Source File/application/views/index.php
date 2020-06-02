<?php

	$emailfielddata = array(
			        'type'			=> 'email',
			        'name'          => 'contact_email',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('contact_email'),
				);
	$passwordfielddata = array(
			        'type'			=> 'password',
			        'id'			=> 'pwd',
			        'name'          => 'password',
			        'autocomplete'	=> 'off',
			        'value'			=> set_value('password'),
				);
	$resetfielddata = array(
					'name'			=> 'reset',
					'value'			=> 'Cancel',
				);
	$submitfielddata = array(
			        'name'          => 'submit',
			        'value'			=> 'Log In',
				);
	$options = array(
				        'Admin'     => 'Admin',
				        'Employee'  => 'Employee',
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
	<?php echo link_tag('/Assest/Css/styleindex.css');?>
	<?php
		include 'header.php';
	?>
	<div id="outerbox">
		<div id="inner1">
			<h2>Sign In</h2>
		</div>
		<div id="inner2">
			<?php echo form_open('admin/index');?>
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<?php echo form_dropdown('select', $options,set_value('select')); ?>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Email Id</b></label><br>
								<?php echo form_input($emailfielddata);?><br>
								<span id="error"><?php echo form_error('contact_email'); ?></span><br>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Password</b></label><br>
								<?php echo form_input($passwordfielddata);?><i class="fa fa-eye fa-1x" aria-hidden="true" style="font-size: 18px" id="eye"></i><br>
								<span id="error"><?php echo form_error('password'); ?></span>
							</td>
						</tr>
					</table>
					<div id="submitbutton">
						<?php echo form_reset($resetfielddata);?>
						<?php echo form_submit($submitfielddata);?>
					</div>
					<div id="importantnote">
						<label><span>Note :</span> &nbsp;Password is your Contact Number</label>
					</div>
				</div>
			<?php echo form_close();?>
		</div>
	</div>
	<?php
		include 'footer.php';
	?>
	<script type="text/javascript">
		var pwd=document.getElementById('pwd');
		var eye=document.getElementById('eye');
		eye.addEventListener('click',open);
		function open()
		{
			if(pwd.type== 'password')
			{
				pwd.type = 'text';
				eye.style.color='#0097e6';
			}
			else
			{
				pwd.type = 'password';
				eye.style.color='unset';
			}
		}
	</script>