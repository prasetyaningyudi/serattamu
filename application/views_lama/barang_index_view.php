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
			<h3>Daftar Barang</h3>
		</div>
	<div class="panel-footer">	  
	<table id="my_table" class="table table-striped">
		<thead>
		<tr>
			<th>Waktu</th>
			<th>Nama Barang</th>
			<th>Dari</th>
			<th>Penerima</th>
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
			<td><?php echo $item->WAKTU_TERIMA; ?></td>
			<td><?php echo $item->NAMA_BARANG;?></td>
			<td><?php echo $item->NAMA_INSTANSI;?></td>
			<td><?php echo $item->NAMA_PEGAWAI;?></td>
			<td class="text-center">
				<?php 
					if($item->STATUS_BARANG == '0'){
						echo 'Blm Terambil';
					}else{
						echo 'Sdh Terambil';
					}
				?>
			</td>
			<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
			<td class="text-center">
				<a class="btn-sm btn-success" role="button" title="ubah status" href="<?php echo base_url().'Barang_controller/ubah_status/'.$item->ID;?>">
					<?php if($item->STATUS_BARANG == '1'){
						echo 'blm Terambil';
					}else{
						echo 'Terambil';
					}; ?>
				</a>
			</td>			
			<td class="text-center">
				<a class="btn-sm btn-primary" role="button" title="ubah data" href="<?php echo base_url().'Barang_controller/ubah/'.$item->ID;?>">
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