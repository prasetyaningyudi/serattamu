<div id="content">	 
<div class="panel panel-default">
  <div class="panel-body">
	<h4>Informasi User</h4>
  </div>
  <div class="panel-footer">
	<?php foreach ($record as $value):?>  
	<div class="row">
	<div class="col-sm-5">
		<img src="<?php echo $value->FOTO;?>" class="img-thumbnail" alt="<?php echo $value->NAMA_USER;?>"/>
	</div>
	<div class="col-sm-7">
	
		<div class="row">
			<div class="col-sm-3">
				<h4>Nama</h4>
			</div>
			<div class="col-sm-9">
				<h4><?php echo $value->NAMA_USER;?></h4>		
			</div>			
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3">
				<h4>Username</h4>
			</div>
			<div class="col-sm-9">
				<h4><?php echo $value->USERNAME;?></h4>		
			</div>			
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3">
				<h4>Password</h4>
			</div>
			<div class="col-sm-9">
				<h4><?php echo $value->PASSWORD;?></h4>		
			</div>			
		</div>	
		<br>		
		<div class="row">
			<div class="col-sm-3">
				<h4>Role</h4>
			</div>
			<div class="col-sm-9">
				<h4><?php echo $value->NAMA_ROLE;?></h4>	
			</div>			
		</div>		
		<br>
		<br>
		<br>
		<?php if($value->ID == $this->session->userdata['ID']): ?>
		<div class="row">
			<div class="col-sm-3">
				<a class="btn-lg btn-primary" role="button" title="ubah data" href="<?php echo base_url().'User_controller/ubah/'.$value->ID;?>">
					UBAH DATA
				</a>
			</div>
			<div class="col-sm-9">
				<a class="btn-lg btn-primary" role="button" title="Upload Foto" href="<?php echo base_url().'User_controller/upload_foto/'.$value->ID;?>">
					<?php if($value->FOTO == '' || $value->FOTO == null){
						echo 'UPLOAD FOTO';
					}else{
						echo 'UBAH FOTO';
					}; ?>
				</a>	
			</div>			
		</div>	
		<?php endif; ?>
	<?php endforeach;?>		
	</div>	
	</div>	
  </div>
 </div>
</div>