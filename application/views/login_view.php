<html>
<?php
	if (isset($this->session->userdata['is_logged_in'])) {
		header("location: " . base_url()."User_authentication/no_permission");
	}
?>
<head>
        <title>Resepsionis - Direktorat Sistem Informasi dan Teknologi Perbendaharan</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
		<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-3.1.0.min.js"></script>		
		<script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>			
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="title"><a class="navbar-brand" href="<?php echo base_url(); ?>">Resepsionis Dit. SITP</a></div>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url().'User_authentication/';?>">Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav> 
<div id="content-login">
<div class="panel panel-default">
  <div class="panel-body">
	<h3>Login User</h3>
  </div>
  <div class="panel-footer">
		<form action="<?php echo base_url().'User_authentication/login_validation'; ?>" id="userform" method="post">
		  <fieldset>
			<div class="form-group">
			<label for="username">Username:<br></label>
			<input class="form-control input-lg" id="username" type="text" name="username" value="" placeholder="username" required>
			</div>
			<div class="form-group">	
			<label for="password">Password:<br></label>
			<input class="form-control input-lg" id="password" type="password" name="password" value="" placeholder="password" required>
			</div>	
			<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
		  </fieldset>	
		</form>  
  </div>
</div>
<?php
	if($notif != null){
		echo '<div class="alert alert-warning" role="alert">Warning: ' . $notif['text'] .'</div><br>';
	}
?>
</div>
</body>
</html>