<div id="content-input">	
<div class="panel panel-default">
  <div class="panel-body">
	<h3>Ubah Tamu</h3>
  </div>
  <div class="panel-footer">	
<form action="" id="tamuform" method="post" class="form-horizontal">
  <fieldset>
	<?php foreach ($record3 as $value):?>
	<div class="form-group">
	<label for="nama" class="col-sm-2">Nama:<br></label>
	<div class="col-sm-10">	
	<input class="form-control" id="nama" type="text" name="nama" value="<?php echo $value->NAMA_TAMU;?>" required>
	</div>
	</div>
	<div class="form-group">	
	<label for="ktp" class="col-sm-2">No ID:<br></label>
	<div class="col-sm-10">	
	<input class="form-control" id="ktp" type="number" name="ktp" value="<?php echo $value->KTP;?>" min="1" max="9999999999999999" required>
	</div>	
	</div>	
	<div class="form-group">	
	<label for="telp" class="col-sm-2">Telp:<br></label>
	<div class="col-sm-10">	
	<input class="form-control" id="telp" type="text" name="telp" value="<?php echo $value->TELP;?>" required>
	</div>
	</div>
	<div class="form-group">	
	<label for="keperluan" class="col-sm-2">Keperluan:<br></label>
	<div class="col-sm-10">	
	<textarea class="form-control" id="keperluan" name="keperluan" rows="2" required><?php echo $value->KEPERLUAN;?></textarea>
	</div>
	</div>
	<div class="form-group">	
	<label for="instansi" class="col-sm-2">Instansi:<br></label>
	<div class="col-sm-7">		
	<select class="form-control" id="instansi" name="instansi" form="tamuform">
	    <?php foreach ($record1 as $item):?>
			<?php 
				if($item->ID == $value->INSTANSI_ID){
					$selected = 'selected';
				}else{
					$selected = '';
				}
			?>
			<option value="<?php echo $item->ID;?>" <?php echo $selected; ?>><?php echo $item->NAMA_INSTANSI;?></option>	
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
			<?php 
				if($item->ID == $value->TUJUAN_ID){
					$selected1 = 'selected';
				}else{
					$selected1 = '';
				}
			?>		
		<option value="<?php echo $item->ID;?>" <?php echo $selected1; ?>><?php echo $item->NAMA_TUJUAN;?></option>	
		<?php endforeach;?>
	</select>
	</div>	
	<div class="col-sm-3 text-right">	
	<a class="btn btn-default" role="button" href="<?php echo base_url().'Tujuan_controller/rekam';?>">Rekam  Tujuan Baru</a>	
	</div>	
	</div>	
	<input type="hidden" name="id" value="<?php echo $value->ID; ?>">
	<input type="hidden" name="waktu" value="<?php echo $value->WAKTU; ?>">
	<input type="hidden" name="status" value="<?php echo $value->STATUS_TAMU; ?>">
	<input type="hidden" name="user" value="<?php echo $this->session->userdata['ID']; ?>">
	<input type="submit" name="submit" value="Ubah" class="btn btn-default btn-lg">
	<?php endforeach;?>
  </fieldset>	
</form>	
</div>
</div>
</div>