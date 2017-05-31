<!DOCTYPE html>
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
				header("location: " . base_url()."User_authentication/no_permission");
			}
		}else{
			header("location: " . base_url()."User_authentication");
		}	
	?>
<head>
	<meta http-equiv="refresh" content="30">
	<title>Resepsionis - Direktorat Sistem Informasi dan Teknologi Perbendaharan</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
	<?php if($data_table == 'yes'): ?>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/datatables.min.css">
	<?php endif; ?>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-3.1.0.min.js"></script>		
	<script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>	
	<?php if($data_table == 'yes'): ?>		
	<script type='text/javascript' src="<?php echo base_url(); ?>js/datatables.min.js"></script>
	<?php endif; ?>
<script type='text/javascript'>
$(document).ready(function() {
	$("#toggle").click( function(event){
		$( ".navbar" ).toggle(1000);
	});
} );
</script>	
</head>
<body>