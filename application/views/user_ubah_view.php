<div id="content-input">	
<div class="panel panel-default">
  <div class="panel-body">
	<h4>Ubah User</h4>
  </div>
  <div class="panel-footer">		
<form action="" id="userform" method="post" enctype="multipart/form-data">
  <fieldset>
	<?php foreach ($record3 as $value):?>  
	<div class="form-group">	
	<label for="username">Username:<br></label>
	<input class="form-control" id="username" type="text" name="username" value="<?php echo $value->USERNAME;?>" required readonly>
	</div>
	<div class="form-group">
	<label for="password-lama">Password lama:<br></label>
	<input class="form-control" id="password-lama" type="text" name="password-lama" value="<?php echo $value->PASSWORD;?>" required readonly>
	</div>	
	<div class="form-group">
	<label for="password">Password Baru:<br></label>
	<input class="form-control" id="password" type="password" name="password" value="" placeholder="Password Baru">
	</div>
	<div class="form-group">
	<label for="password-lg">Password Baru Lagi:<br></label>
	<input class="form-control" id="password-lg" type="password" name="password-lg" value="" placeholder="Password Baru Lagi">
	</div>	
	<div class="form-group">
	<label for="nama">Nama:<br></label>
	<input class="form-control" id="nama" type="text" name="nama" value="<?php echo $value->NAMA_USER;?>" placeholder="nama" required>
	</div>
	<input type="hidden" value="<?php echo $value->ROLE_ID;?>" name="role" />
	<input type="hidden" value="<?php echo $value->STATUS_USER;?>" name="status" />
	<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
	<?php endforeach;?>	
  </fieldset>	
</form>	
</div>
</div>
<?php 
	if(isset($warning)){
		echo '<div class="alert alert-warning" role="alert">Warning: ' . $warning['PASSWORD_SALAH'] . '</div>';
	}
?>	
</div>		