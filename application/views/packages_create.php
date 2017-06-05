<!-- content goes here -->
<div class="my-content">
	<div class="row">
		<div class="col-lg-12">			
			<div class="panel panel-brown">
			  <div class="panel-heading">
				<div class="panel-title"><?php echo $subtitle.' '.$title; ?></div>
			  </div>
			  <div class="panel-body">
				<form action="" id="suratform" method="post" class="form-horizontal">
				  <fieldset>
					<div class="form-group">	
					<label for="hal" class="col-sm-2">Hal:<br></label>
					<div class="col-sm-10">		
					<textarea class="form-control" id="hal" name="hal" rows="2" placeholder="hal" required></textarea>
					</div>
					</div>					  
				  
				  
				  
				  
				  
					<div class="form-group">
					<label for="nomor" class="col-sm-2">Nomor Surat:<br></label>
					<div class="col-sm-10">
					<input class="form-control" id="nomor" type="text" name="nomor" value="" placeholder="nomor" required>
					</div>
					</div>
					<div class="form-group">	
					<label for="tgl" class="col-sm-2">Tgl Surat:<br></label>
					<div class="col-sm-10">	
					<input class="form-control" id="tgl" type="date" name="tgl" value="" placeholder="YYYY/MM/DD" required>
					</div>	
					</div>	
					<div class="form-group">	
					<label for="hal" class="col-sm-2">Hal:<br></label>
					<div class="col-sm-10">		
					<textarea class="form-control" id="hal" name="hal" rows="2" placeholder="hal" required></textarea>
					</div>
					</div>				
					<div class="form-group">	
					<label for="instansi" class="col-sm-2">Dari:<br></label>
					<div class="col-sm-7">	
					<select class="form-control" id="instansi" name="instansi" form="suratform">
						<?php foreach ($record as $item):?>
						<option value="<?php echo $item->ID;?>"><?php echo $item->NAMA_INSTANSI;?></option>	
						<?php endforeach;?>
					</select>
					</div>
					<div class="col-sm-3 text-right">		
					<a class="btn btn-default" role="button" href="<?php echo base_url().'Instansi_controller/rekam';?>">Rekam Instansi Baru</a>
					</div>
					</div>
					
					<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
				  </fieldset>	
				</form>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		