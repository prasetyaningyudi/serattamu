<?php
	if(isset($this->session->userdata['is_logged_in'])) {
		$have_role = false;
		foreach($role_access as $item){
			if($this->session->userdata['ROLE_ID'] == $item){
				$have_role = true;
			}
		} 
		if($have_role == true){
			//Go on. You have permission
		}else{
			header("location: " . base_url()."authentication/no_permission");
		}
	}else{
		$have_role = false;
		foreach($role_access as $item){
			if('4' == $item){
				$have_role = true;
			}
		}
		if($have_role == true){
			//Go on. You have permission
		}else{
			header("location: " . base_url()."authentication/no_permission");
		}		
	}	
?>
<?php		
	$this->load->helper('cookie');
	if(get_cookie("toogled") === null){
		//set cookies
		$cookie= array(
		  'name'   => 'toogled',
		  'value'  => 'no',
		   'expire' => '86500',
		);
		$this->input->set_cookie($cookie);				
	}
	
	if(get_cookie("app_name") !== null){
		$app_name = get_cookie("app_name");
	}else{
		$app_name = 'Guest Book';
	}
	if(get_cookie("office_name") != null){
		$office_name = get_cookie("office_name");
	}else{
		$office_name = 'Company Name';
	}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>
		<?php 
			if(isset($subtitle)){
				echo ucwords(strtolower($subtitle.' '));
			}
			if(isset($title)){
				echo ucwords(strtolower($title));
			}
			echo ' | '.ucwords(strtolower($app_name)).' '.ucwords(strtolower($office_name));
		?>	
	</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css">	
	<?php if(isset($data_table) and $data_table == 'yes'): ?>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/datatables.min.css">
	<?php endif; ?>		
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<?php if(get_cookie("theme") !== null): ?>
		<?php if(get_cookie("theme") == 'blue'): ?>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/theme_blue.css">
		<?php elseif(get_cookie("theme") == 'light'): ?>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/theme_light.css">
		<?php endif; ?> 
	<?php endif; ?> 
	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-3.1.0.min.js"></script>	
	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>	
	
	
	<script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>	
	<?php if(isset($data_table) and $data_table == 'yes'): ?>		
	<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables.min.js"></script>
	<?php endif; ?>		
</head>
<body>