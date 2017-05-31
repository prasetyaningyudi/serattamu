<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table').DataTable({
		"order": [],
	});
} );
</script>
<div id="content">
<div class="panel panel-default">
  <div class="panel-body">
	<h4>Daftar Buku Tamu</h4>
  </div>
  <div class="panel-footer">	  
	<table id="my_table" class="table table-striped">
		<thead>
		<tr>
			<th>Waktu</th>
			<th>Nama</th>
			<th>No ID</th>
			<th>Telp</th>
			<th>Instansi</th>
			<th>Tujuan</th>
			<th>Keperluan</th>
			<th class="text-center">Status</th>
			<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>			
			<th class="text-center">Ubah Status Jadi</th>
			<th class="text-center">Ubah Data</th>
			<?php endif; ?>					
		</tr>
		</thead>
		<tbody>
		<?php foreach ($record as $item):?>
		<tr>		
				<td><?php echo $item->WAKTU;?></td>
				<td><?php echo $item->NAMA_TAMU;?></td>
				<td><?php echo $item->KTP;?></td>
				<td><?php echo $item->TELP;?></td>
				<td><?php echo $item->NAMA_INSTANSI;?></td>
				<td><?php echo $item->NAMA_TUJUAN;?></td>
				<td><?php echo $item->KEPERLUAN;?></td>
				<td class="text-center">
					<?php 
						if($item->STATUS_TAMU == '0'){
							echo 'Masih Bertamu';
						}else{
							echo 'Sudah Pulang';
						}
					?>
				</td>
				<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
				<td class="text-center">
					<a class="btn-sm btn-success" role="button" title="ubah status" href="<?php echo base_url().'Tamu_controller/ubah_status/'.$item->ID;?>">
						<?php if($item->STATUS_TAMU == '1'){
							echo 'Bertamukan';
						}else{
							echo 'Pulangkan';
						}; ?>
					</a>
				</td>			
				<td class="text-center">
					<a class="btn-sm btn-primary" role="button" title="ubah data" href="<?php echo base_url().'Tamu_controller/ubah/'.$item->ID;?>">
						ubah data
					</a>
				</td>
				<?php endif; ?>				
		</tr>
		<?php endforeach;?>	
		</tbody>
	</table>
	</div>
  </div>
</div>