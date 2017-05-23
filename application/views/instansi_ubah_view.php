<div id="content-input">	
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Ubah Instansi</h3>
		</div>
		<div class="panel-footer">		
			<form action="" id="ruanganform" method="post">
			<fieldset>
				<?php foreach ($record as $item):?>
				<div class="form-group">
					<label for="nama">Nama Instansi:<br></label>
					<input class="form-control" id="nama" type="text" name="nama" value="<?php echo $item->NAMA_INSTANSI;?>" placeholder="nama" required>
				</div>
				<input type="hidden" name="id" value="<?php echo $item->ID;?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
				<?php endforeach;?>	
			</fieldset>	
			</form>	
		</div>
	</div>
</div>