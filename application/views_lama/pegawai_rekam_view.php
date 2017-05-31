<div id="content-input">	
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Rekam Pegawai</h3>
		</div>
		<div class="panel-footer">		
			<form action="" id="pegawaiform" method="post">
			<fieldset>
				<div class="form-group">
					<label for="nip">NIP:<br></label>
					<input class="form-control" id="nip" type="number" name="nip" min="100000000000000000" max="999999999999999999" value="" placeholder="nip" required>
				</div>
				<div class="form-group">
					<label for="nama">Nama:<br></label>
					<input class="form-control" id="nama" type="text" name="nama" value="" placeholder="nama" required>
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan:<br></label>
					<input class="form-control" id="jabatan" type="text" name="jabatan" value="" placeholder="jabatan" required>
				</div>	
				<input type="hidden" name="status" value="1">
				<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
			</fieldset>	
			</form>	
		</div>
	</div>
</div>