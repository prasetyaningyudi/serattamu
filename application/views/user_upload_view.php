<div id="content-input">	
<div class="panel panel-default">
  <div class="panel-body">
	<h4>Upload Foto</h4>
  </div>
  <div class="panel-footer">		
<form action="" id="userform" method="post" enctype="multipart/form-data">
  <fieldset>
  <?php foreach ($record3 as $value):?>  
	<div class="form-group">	
	<label for="foto">Upload Foto:<br></label>
	<input class="form-control input-lg" id="foto" type="file" name="foto">
	</div>	
	<input type="hidden" value="<?php echo $value->ID;?>" name="id" />
	<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
  <?php endforeach; ?>
  </fieldset>	
</form>	
</div>
</div>
</div>