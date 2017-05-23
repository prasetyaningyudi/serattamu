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
			<h3>Daftar Rapat</h3>
		</div>
	<div class="panel-footer">	  
	<table id="my_table" class="table table-striped">
		<thead>
		<tr>
			<th>Waktu Rapat</th>
			<th>Durasi (+-)</th>
			<th>Agenda</th>
			<th>Ruang Rapat</th>
			<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>		
			<th class="text-center">Ubah Data</th>
			<?php endif; ?>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($record as $item):?>
		<tr>		
			<td><?php echo date("d F Y, H:i", strtotime($item->WAKTU_RAPAT)); ?></td>
			<td><?php echo $item->DURASI;?> Jam</td>
			<td><?php echo $item->AGENDA;?></td>
			<td><?php echo $item->NAMA_RUANG;?></td>
			<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>			
			<td class="text-center">
				<a class="btn-sm btn-primary" role="button" title="ubah data" href="<?php echo base_url().'Rapat_controller/ubah/'.$item->ID;?>">
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