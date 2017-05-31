<div id="content-input">	
<div class="panel panel-default">
  <div class="panel-body">
	<h4>Rekam User</h4>
  </div>
  <div class="panel-footer">		
<form action="" id="userform" method="post" enctype="multipart/form-data">
  <fieldset>
	<div class="form-group">	
	<label for="username">Username:<br></label>
	<input class="form-control" id="username" type="text" name="username" value="" placeholder="username" required>
	</div>
	<div class="form-group">
	<label for="password">Password:<br></label>
	<input class="form-control" id="password" type="text" name="password" value="" placeholder="password" required>
	</div>
	<div class="form-group">
	<label for="nama">Nama:<br></label>
	<input class="form-control" id="nama" type="text" name="nama" value="" placeholder="nama" required>
	</div>
	<div class="form-group">	
	<label for="role">Role:<br></label>
	<select class="form-control" id="role" name="role" form="userform">
	    <?php foreach ($record as $item):?>
		<option value="<?php echo $item->ID;?>"><?php echo $item->NAMA_ROLE;?></option>	
		<?php endforeach;?>
	</select>  
	</div>
	<input type="hidden" value="1" name="status" />
	<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
  </fieldset>	
</form>	
</div>
</div>
</div>