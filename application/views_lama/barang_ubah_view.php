<div id="content-input">	
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Ubah Barang</h3>
		</div>
		<div class="panel-footer">		
			<form action="" id="barangform" method="post">
			<fieldset>
				<?php foreach ($record3 as $value):?>
				<div class="form-group">
					<label for="nama">Nama:<br></label>
					<input class="form-control" id="nama" type="text" name="nama" value="<?php echo $value->NAMA_BARANG;?>" placeholder="nama" required>
				</div>
				<div class="form-group">	
				<label for="instansi">Dari:<br></label>	
				<select class="form-control" id="instansi" name="instansi" form="barangform">
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
				<div class="form-group">	
				<label for="pegawai">Penerima:<br></label>	
				<select class="form-control" id="pegawai" name="pegawai" form="barangform">
					<?php foreach ($record2 as $item):?>
						<?php 
							if($item->ID == $value->PEGAWAI_ID){
								$selected1 = 'selected';
							}else{
								$selected1 = '';
							}
						?>					
					<option value="<?php echo $item->ID;?>" <?php echo $selected1; ?>><?php echo $item->NAMA_PEGAWAI;?></option>	
					<?php endforeach;?>
				</select>
				</div>				
				<input type="hidden" name="status" value="<?php echo $value->STATUS_BARANG;?>">
				<input type="hidden" name="id" value="<?php echo $value->ID;?>">
				<input type="hidden" name="waktu" value="<?php echo $value->WAKTU_TERIMA;?>">
				<input type="hidden" name="user" value="<?php echo $this->session->userdata['ID']; ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
				<?php endforeach;?>
			</fieldset>	
			</form>	
		</div>
	</div>
</div>