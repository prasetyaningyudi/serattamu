<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table').DataTable();
} );
</script>		
<div id="content">	 
<div class="panel panel-default">
  <div class="panel-body">
	<h4>Daftar User</h4>
  </div>
  <div class="panel-footer">	  
	<table id="my_table" class="table table-striped">
		<thead>
		<tr>
			<th class="text-center">No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama</th>
			<th>Role</th>
			<th>Foto Link</th>
			<th class="text-center">Status</th>
			<?php if($this->session->userdata['ROLE_ID'] !=  '3'): ?>
			<th>Detail</th>
			<?php endif; ?>
			<?php if($this->session->userdata['ROLE_ID'] ==  '1'): ?>
			<th class="text-center">Upload Foto</th>			
			<th class="text-center">Ubah Status</th>			
			<th class="text-center">Ubah Data</th>
			<?php endif; ?>
		</tr>
		</thead>
		<tbody>
		<?php $i=1; foreach ($record as $item):?>
		<tr>		
				<td class="text-center"><?php echo $i++;?></td>
				<td><?php echo $item->USERNAME;?></td>
				<td><?php echo $item->PASSWORD;?></td>
				<td><?php echo $item->NAMA_USER;?></td>
				<td><?php echo $item->NAMA_ROLE;?></td>
				<td><a title="Foto" target="blank" href="<?php echo $item->FOTO;?>"><?php echo $item->FOTO;?></a></td>
				<td class="text-center">
					<?php 
						if($item->STATUS_USER == '1'){
							echo 'Aktif';
						}else{
							echo 'In-Aktif';
						}
					?>
				</td>
				<?php if($this->session->userdata['ROLE_ID'] !=  '3'): ?>				
				<td>
					<a class="btn-sm btn-success" role="button" title="Detail" href="<?php echo base_url().'About_controller/user/'.$item->ID;?>">
						detail
					</a>
				</td>
				<?php endif; ?>	
				<?php if($this->session->userdata['ROLE_ID'] ==  '1'): ?>
				<td class="text-center">
					<a class="btn-sm btn-primary" role="button" title="Upload Foto" href="<?php echo base_url().'User_controller/upload_foto/'.$item->ID;?>">
						<?php if($item->FOTO == '' || $item->FOTO == null){
							echo 'Upload Foto';
						}else{
							echo 'Ubah Foto';
						}; ?>
					</a>
				</td>				
				<td class="text-center">
					<?php if($item->ROLE_ID != '1'): ?>
					<a class="btn-sm btn-success" role="button" title="ubah status" href="<?php echo base_url().'User_controller/ubah_status/'.$item->ID;?>">
						<?php if($item->STATUS_USER == '1'){
							echo 'In-Aktifkan';
						}else{
							echo 'Aktifkan';
						}; ?>
					</a>
					<?php endif; ?>
				</td>			
				<td class="text-center">
					<?php if($item->ROLE_ID != '1'): ?>
					<a class="btn-sm btn-primary" role="button" title="ubah data" href="<?php echo base_url().'User_controller/ubah/'.$item->ID;?>">
						ubah data
					</a>
					<?php endif; ?>
				</td>
				<?php endif; ?>				
		</tr>
		<?php endforeach;?>		
		</tbody>
	</table>
	</div>
 </div>
</div>