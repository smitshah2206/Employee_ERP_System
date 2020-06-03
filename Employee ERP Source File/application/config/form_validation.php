<?php
	
	$config=[

			'login' => [
							[
								'field'	=>	'contact_email',
								'label'	=>	'Email Id',
								'rules'	=>	'required|valid_email'
							],
							[
								'field'	=>	'password',
								'label'	=>	'Password',
								'rules'	=>	'required|exact_length[10]'
							],
						],
			'addemployee' => [
								[
									'field'	=>	'first_name',
									'label'	=>	'First Name',
									'rules'	=>	'required|alpha'
								],
								[
									'field'	=>	'last_name',
									'label'	=>	'Last Name',
									'rules'	=>	'required|alpha'
								],
								[
									'field'	=>	'position',
									'label'	=>	'Position',
									'rules'	=>	'required|alpha'
								],
								[
									'field'	=>	'income',
									'label'	=>	'Income',
									'rules'	=>	'required|numeric'
								],
								[
									'field'	=>	'contact_number',
									'label'	=>	'Contact Number',
									'rules'	=>	'required|numeric|exact_length[10]'
								],
								[
									'field'	=>	'contact_email',
									'label'	=>	'Contact Email Id',
									'rules'	=>	'required|valid_email'
								],
								[
									'field'	=>	'description',
									'label'	=>	'Description',
									'rules'	=>	'required|max_length[250]'
								],
							],
			'addproject' => [
								[
									'field'	=>	'first_name',
									'label'	=>	'First Name',
									'rules'	=>	'required|alpha'
								],
								[
									'field'	=>	'last_name',
									'label'	=>	'Last Name',
									'rules'	=>	'required|alpha'
								],
								[
									'field'	=>	'project_amount',
									'label'	=>	'Project Amount',
									'rules'	=>	'required|numeric'
								],
								[
									'field'	=>	'deadline',
									'label'	=>	'Deadline',
									'rules'	=>	'required'
								],
								[
									'field'	=>	'project_name',
									'label'	=>	'Project Name',
									'rules'	=>	'required'
								],
								[
									'field'	=>	'contact_number',
									'label'	=>	'Contact Number',
									'rules'	=>	'required|numeric|exact_length[10]'
								],
								[
									'field'	=>	'contact_email',
									'label'	=>	'Contact Email Id',
									'rules'	=>	'required|valid_email'
								],
								[
									'field'	=>	'description',
									'label'	=>	'Description',
									'rules'	=>	'required|max_length[250]'
								],
							],
			'updatework' => [
								[
									'field'	=>	'project_id',
									'label'	=>	'Project Id',
									'rules'	=>	'required'
								],
								[
									'field'	=>	'description',
									'label'	=>	'Description',
									'rules'	=>	'required|max_length[200]'
								],
							],
			'addtransaction' => [
								[
									'field'	=>	'transaction_amount',
									'label'	=>	'Transaction Amount',
									'rules'	=>	'required|numeric'
								],
								[
									'field'	=>	'transaction_description',
									'label'	=>	'Transaction Description',
									'rules'	=>	'required|max_length[200]'
								],
							],					
			];
?>
