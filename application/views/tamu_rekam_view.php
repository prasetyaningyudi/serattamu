<div id="content-input">	
<div class="panel panel-default">
  <div class="panel-body">
	<h3>Rekam Tamu</h3>
  </div>
  <div class="panel-footer">		
<form action="" id="tamuform" method="post" class="form-horizontal">
  <fieldset>
	<div class="form-group">
	<label for="nama" class="col-sm-2">Nama:<br></label>
	<div class="col-sm-10">
	<input class="form-control" id="nama" type="text" name="nama" value="" placeholder="nama" required>
	</div>
	</div>
	<div class="form-group">	
	<label for="ktp" class="col-sm-2">No ID:<br></label>
	<div class="col-sm-10">	
	<input class="form-control" id="ktp" type="number" name="ktp" value="" placeholder="No ID" min="1" max="9999999999999999" required>
	</div>	
	</div>	
	<div class="form-group">	
	<label for="telp" class="col-sm-2">Telp:<br></label>
	<div class="col-sm-10">	
	<input class="form-control" id="telp" type="text" name="telp" value="" placeholder="telp" required>
	</div>
	</div>
	<div class="form-group">	
	<label for="keperluan" class="col-sm-2">Keperluan:<br></label>
	<div class="col-sm-10">		
	<textarea class="form-control" id="keperluan" name="keperluan" rows="2" placeholder="keperluan" required></textarea>
	</div>
	</div>
	<div class="form-group">	
	<label for="instansi" class="col-sm-2">Instansi:<br></label>
	<div class="col-sm-7">	
	<select class="form-control" id="instansi" name="instansi" form="tamuform">
	    <?php foreach ($record1 as $item):?>
		<option value="<?php echo $item->ID;?>"><?php echo $item->NAMA_INSTANSI;?></option>	
		<?php endforeach;?>
	</select>
	</div>
	<div class="col-sm-3 text-right">		
	<a class="btn btn-default" role="button" href="<?php echo base_url().'Instansi_controller/rekam';?>">Rekam Instansi Baru</a>
	</div>
	</div>
	<div class="form-group">	
	<label for="tujuan" class="col-sm-2">Tujuan:<br></label>
	<div class="col-sm-7">		
	<select class="form-control" id="tujuan" name="tujuan" form="tamuform">
	    <?php foreach ($record2 as $item):?>
		<option value="<?php echo $item->ID;?>"><?php echo $item->NAMA_TUJUAN;?></option>	
		<?php endforeach;?>
	</select>
	</div>
	<div class="col-sm-3 text-right">		
		<a class="btn btn-default" role="button" href="<?php echo base_url().'Tujuan_controller/rekam';?>">Rekam  Tujuan Baru</a>	
	</div>
	</div>
	<input type="hidden" name="user" value="<?php echo $this->session->userdata['ID']; ?>">
	<input type="hidden" name="status" value="0">
	<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
  </fieldset>	
</form>	
</div>
</div>
</div>