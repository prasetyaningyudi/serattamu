<div id="content-input">	
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Rekam Barang</h3>
		</div>
		<div class="panel-footer">		
			<form action="" id="barangform" method="post">
			<fieldset>
				<div class="form-group">
					<label for="nama">Nama:<br></label>
					<input class="form-control" id="nama" type="text" name="nama" value="" placeholder="nama" required>
				</div>
				<div class="form-group">	
				<label for="instansi">Dari:<br></label>	
				<select class="form-control" id="instansi" name="instansi" form="barangform">
					<?php foreach ($record1 as $item):?>
					<option value="<?php echo $item->ID;?>"><?php echo $item->NAMA_INSTANSI;?></option>	
					<?php endforeach;?>
				</select>
				</div>
				<div class="form-group">	
				<label for="pegawai">Penerima:<br></label>	
				<select class="form-control" id="pegawai" name="pegawai" form="barangform">
					<?php foreach ($record2 as $item):?>
					<option value="<?php echo $item->ID;?>"><?php echo $item->NAMA_PEGAWAI;?></option>	
					<?php endforeach;?>
				</select>
				</div>				
				<input type="hidden" name="status" value="0">
				<input type="hidden" name="user" value="<?php echo $this->session->userdata['ID']; ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
			</fieldset>	
			</form>	
		</div>
	</div>
</div>