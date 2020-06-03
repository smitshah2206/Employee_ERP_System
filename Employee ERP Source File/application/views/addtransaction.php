<?php
	$transactionamountfielddata = array(
								'type'			=> 'number',
						        'name'          => 'transaction_amount',
						        'autocomplete'	=> 'off',
						        'value'			=> set_value('transaction_amount'),
							);
	$resetfielddata = array(
					'name'			=> 'reset',
					'value'			=> 'Cancel',
				);
	$submitfielddata = array(
			        'name'          => 'submit',
			        'value'			=> 'Save',
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
	<?php echo link_tag('/Assest/Css/styleaddtransaction.css');?>
	<?php
		include 'header.php';
	?>
	<div id="outerbox">
		<div id="inner1">
			<h2>Add Transaction</h2>
		</div>
		<div id="inner2">
			<?php echo form_open('admin/addtransaction');?>
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<label><b>Transaction Type</b></label><br>
								<select name="transaction_type">
									<option value="1">Credit Transaction</option>
									<option value="2">Debit Transaction</option>
								</select><br>
								<span id="error"><?php echo form_error('transaction_type'); ?></span>
							</td>
						</tr>
					</table>
				</div>
				<div id="contactsection">
					<table>
						<tr>
							<td>
								<label><b>Transaction Amount</b></label><br>
								<i class="fa fa-rupee fa-1x" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo form_input($transactionamountfielddata);?><br>
								<span id="error"><?php echo form_error('transaction_amount'); ?></span>
							</td>
						</tr>
					</table>
				</div>
				<div id="descriptionsection">
					<table>
						<tr>
							<td>
								<label><b>Transaction Description</b></label>
								<textarea rows="4" cols="50" name="transaction_description" value="<?php echo set_value('transaction_description'); ?>"></textarea>
								<span id="error"><?php echo form_error('transaction_description'); ?></span>
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
		<h2>Balance Sheet For a Month</h2>
		<table>
			<thead>
				<tr>
					<th>Sr No.</th>
					<th>Customer Id</th>
					<th>Transaction Id</th>
					<th>Transaction Description</th>
					<th>Transaction Aamount</th>
					<th>Credit / Debit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($transaction_result as $row)
					{
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $row['user_id'];?></td>
							<td><?php echo $row['transaction_id'];?></td>
							<td><?php echo $row['transaction_description'];?></td>
							<?php
								if($row['credit_debit_status']==2)
								{
								?>
									<td style="color: red;"><b>-&nbsp;<?php echo $row['transaction_amount'];?>&nbsp;&nbsp;<i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></td>
									<td style="color: red;"><b>Debit</b></td>
								<?php
								}
								else
								{
								?>
									<td style="color: green;"><b>+&nbsp;<?php echo $row['transaction_amount'];?>&nbsp;&nbsp;<i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></td>
									<td style="color: green;"><b>Credit</b></td>
								<?php
								}
							?>
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