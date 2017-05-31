<div id="content-input">	
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Ubah Rapat</h3>
		</div>
		<div class="panel-footer">		
			<form action="" id="barangform" method="post">
			<fieldset>
				<?php foreach ($record as $value):?>
				<div class="row">
				<div class="form-group col-sm-6">
					<label for="tanggal">Tanggal:<br></label>
					<input class="form-control" id="tanggal" type="date" name="tanggal" value="<?php echo substr($value->WAKTU_RAPAT, 0, 10);?>" placeholder="tanggal" required>
				</div>	
				<div class="form-group col-sm-6">
					<label for="jam">Jam:<br></label>
					<select class="form-control" id="jam" name="jam" form="barangform">
						<?php for($i=0; $i<24;$i++):?>
						<?php 
							if($i < 10){
								$k = '0'.$i;
							}else{
								$k = $i;
							}
							if($k == substr($value->WAKTU_RAPAT, -8, 2)){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						?>						
						<option value="<?php if($i < 10){echo '0'.$i;}else{echo $i;}?>" <?php echo $selected; ?>><?php if($i < 10){echo '0'.$i;}else{echo $i;}?></option>	
						<?php endfor;?>
					</select>
				</div>					
				</div>					
				<div class="form-group">
					<label for="durasi">Durasi (dalam jam):<br></label>
					<input class="form-control" id="durasi" type="number" name="durasi" min="1" max="10" value="<?php echo $value->DURASI;?>" placeholder="durasi dalam jam" required>
				</div>			
				<div class="form-group">
					<label for="agenda">Agenda:<br></label>
					<textarea class="form-control" id="agenda" name="agenda" rows="2" placeholder="agenda" required><?php echo $value->AGENDA;?></textarea>
				</div>
				<div class="form-group">	
				<label for="ruang">Ruangan:<br></label>	
				<select class="form-control" id="ruang" name="ruang" form="barangform">
					<?php foreach ($record2 as $item):?>
						<?php 
							if($item->ID == $value->RUANG_RAPAT_ID){
								$selected = 'selected';
							}else{
								$selected = '';
							}
						?>
					<option value="<?php echo $item->ID;?>" <?php echo $selected; ?>><?php echo $item->NAMA_RUANG;?></option>	
					<?php endforeach;?>
				</select>
				</div>
				<input type="hidden" name="id" value="<?php echo $value->ID;?>">				
				<input type="hidden" name="user" value="<?php echo $this->session->userdata['ID']; ?>">
				<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
				<?php endforeach; ?>
			</fieldset>	
			</form>	
		</div>
	</div>
<?php 
	if(isset($warning)){
		echo '<div class="alert alert-warning" role="alert">Warning: ' . $warning['text'] . '</div>';
	}
?>	
</div>