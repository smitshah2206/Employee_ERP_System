<!DOCTYPE html>
<html>
<head>
	<?php echo link_tag('/Assest/Css/styleviewbalance.css');?>
	<?php
		include 'header.php';
	?>
	<div id="credittable">
		<h2>Credit Histroy For a Month</h2>
		<table>
			<thead>
				<tr>
					<th>Sr No.</th>
					<th>Customer Id</th>
					<th>Transaction Id</th>
					<th>Transaction Description</th>
					<th>Transaction Aamount</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($credit_array as $row)
					{
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $row['user_id'];?></td>
							<td><?php echo $row['transaction_id'];?></td>
							<td><?php echo $row['transaction_description'];?></td>
							<td style="color: green;"><b>+&nbsp;<?php echo $row['transaction_amount'];?> <i class="fa fa-rupee fa-1x" aria-hidden="true"></b></i></td>
						</tr>
					<?php
					}
				?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><b>Total</b></td>
					<td style="color: green;"><b>+&nbsp;<?php echo $credit_total[0]['transaction_amount']; ?> <i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="transactionbutton">
		<button><a href="<?php echo base_url('route/addtransaction/'); ?>">Add Transaction</a></button>
	</div>
	<div id="debittable">
		<h2>Debit Histroy For a Month</h2>
		<table>
			<thead>
				<tr>
					<th>Sr No.</th>
					<th>Employee Id</th>
					<th>Transaction Id</th>
					<th>Transaction Description</th>
					<th>Transaction Aamount</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$a=1;
					foreach ($debit_array as $row)
					{
					?>
						<tr>
							<td><?php echo $a++;?></td>
							<td><?php echo $row['user_id'];?></td>
							<td><?php echo $row['transaction_id'];?></td>
							<td><?php echo $row['transaction_description'];?></td>
							<td style="color: red;"><b>-&nbsp;<?php echo $row['transaction_amount'];?> <i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></td>
						</tr>
					<?php
					}
				?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><b>Total</b></td>
					<td style="color: red;"><b>-&nbsp;<?php echo $debit_total[0]['transaction_amount']; ?> <i class="fa fa-rupee fa-1x" aria-hidden="true"></i></b></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
		include 'footer.php';
	?>