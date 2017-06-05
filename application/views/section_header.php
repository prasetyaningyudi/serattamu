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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>
		<?php 
			if(isset($subtitle)){
				echo strtoupper($subtitle.' ');
			}
			if(isset($title)){
				echo strtoupper($title);
			}
		?>	
	</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
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
	<script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>	
	<?php if(isset($data_table) and $data_table == 'yes'): ?>		
	<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables.min.js"></script>
	<?php endif; ?>		
</head>
<body>