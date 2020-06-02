	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo link_tag('/Assest/Css/styleheader.css');?>
	<?php echo link_tag('/Assest/Css/stylefooter.css');?>
	<?php echo link_tag('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');?>
	<?php echo link_tag('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div id="outer">
		<div id="header">
			<div id="headerfirst">
				<div id="logo">
					<h2>Company Name</h2>					
				</div>
				<?php
					$session_array=$this->session->userdata();
					if(isset($session_array['id']))
					{
					?>
						<div id="barbutton">
							<h3 id="clickbarbutton"><?php echo $session_array['first_name'].' '.$session_array['last_name']; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-down fa-1x" aria-hidden="true"></i></h3>
						</div>
						<div id="sidenav">
							<table>
								<tr>
									<td>Employee Id</td>
									<td><?php echo $session_array['employee_id'];?></td>
								</tr>
								<tr>
									<td>Role</td>
									<td><?php echo $session_array['role'];?></td>
								</tr>
								<tr>
									<td>Contact Number</td>
									<td><?php echo $session_array['contact_number'];?></td>
								</tr>
								<tr>
									<td>Contact Email</td>
									<td><?php echo $session_array['contact_email'];?></td>
								</tr>
								<tr>
									<td colspan="2"><button><a href="<?php echo base_url('route/logout/'); ?>">Sign Out</a></button></td>
								</tr>
							</table>
						</div>
					<?php
					}
				?>
			</div>
			<?php
				if(isset($session_array['id']))
				{
				?>
					<div id="headersecound">
						<div id="label">
							<label><a href="<?php echo base_url('route/dashboard/'); ?>">Back to Home</a></label>
						</div>
						<div id="addbutton">
						<?php 
							if($session_array['role']=='Admin')
							{
							?>
								<button><a href="<?php echo base_url('route/addemployee/'); ?>">Add Employee</a></button>
								<button><a href="<?php echo base_url('route/addproject/'); ?>">Add Project</a></button>
							<?php
							}
							else
							{
								if (isset($header_value)) 
								{
								?>
									<h2><?php echo $header_value;?></h2>
								<?php
								}
								else
								{
								?>
									<h2></h2>
								<?php
								}
							}
						?>
						</div>
					</div>
					<script type="text/javascript">
						var barbutton=document.getElementById('clickbarbutton');
						var sidenav=document.getElementById('sidenav');
						barbutton.addEventListener('click',open);
						function open()
						{
							sidenav.style.transition='5s';
							(sidenav.style.display== 'block') ? sidenav.style.display = 'none' : sidenav.style.display = 'block';
						}
					</script>
				<?php
				}
			?>
		</div>