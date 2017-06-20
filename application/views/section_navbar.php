<?php		
	$this->load->helper('cookie');
	$app_name;
	$office_name;
	$icon;
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
	if(get_cookie("icon") !== null){
		$icon = get_cookie("icon");
	}else{
		$icon = 'book';
	}	
?>
<div id="header" class="no-margin">
	<nav class="navbar navbar-default my-navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<!--
				<button type="button" class="navbar-toggle collapsed menu-toggle" data-toggle="collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				 </button>	
				-->
				<a class="navbar-brand my-title" href="<?php echo base_url(); ?>">
					<span class="glyphicon glyphicon-<?php echo $icon; ?>"></span> 
					<b>
						<?php
							echo $app_name.' '.$office_name;
						?>
					</b>
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<button class="navbar-toggle collapse in menu-toggle" data-toggle="collapse"> 
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>	
</div>