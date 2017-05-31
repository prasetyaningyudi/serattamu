<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table').DataTable({
		
	});
} );
</script>

<div id="content">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Daftar Pegawai</h3>
		</div>
	<div class="panel-footer">	  
	<table id="my_table" class="table table-striped">
		<thead>
		<tr>
			<th class="text-center">No.</th>
			<th>NIP</th>
			<th>Nama</th>
			<th>Jabatan</th>
			<th class="text-center">Status</th>
			<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
			<th class="text-center">Ubah Status Jadi</th>			
			<th class="text-center">Ubah Data</th>
			<?php endif; ?>
		</tr>
		</thead>
		<tbody>
		<?php $i=1; foreach ($record as $item):?>
		<tr>		
			<td class="text-center"><?php echo $i++; ?></td>
			<td><?php echo $item->NIP;?></td>
			<td><?php echo $item->NAMA_PEGAWAI;?></td>
			<td><?php echo $item->JABATAN;?></td>
			<td class="text-center">
				<?php 
					if($item->STATUS_PEGAWAI == '1'){
						echo 'Aktif';
					}else{
						echo 'In-Aktif';
					}
				?>
			</td>
			<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
			<td class="text-center">
				<a class="btn-sm btn-success" role="button" title="ubah status" href="<?php echo base_url().'Pegawai_controller/ubah_status/'.$item->ID;?>">
					<?php if($item->STATUS_PEGAWAI == '1'){
						echo 'In-Aktifkan';
					}else{
						echo 'Aktifkan';
					}; ?>
				</a>
			</td>			
			<td class="text-center">
				<a class="btn-sm btn-primary" role="button" title="ubah data" href="<?php echo base_url().'Pegawai_controller/ubah/'.$item->ID;?>">
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