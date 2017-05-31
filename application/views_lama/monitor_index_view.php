<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table').DataTable({
		"order": [],
		"lengthMenu": [[5], [5]]
	});
} );
</script>
<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table1').DataTable({
		"order": [],
		"lengthMenu": [[5], [5]]		
	});
} );
</script>
<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table2').DataTable({
		"order": [],		
		"lengthMenu": [[5], [5]]		
	});
} );
</script>	  
<div id="content-monitor">
  <div class="row">
	<div class="panel panel-default col-sm-12">
		<a class="button-modal btn-sm btn-default" role="button" id="toggle" href="<?php echo base_url().'/Tamu_controller/';?>">HOME</a>
		<div class="panel-body text-center">
			<b>DAFTAR TAMU</b>
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
			</tr>
			<?php endforeach;?>	
			</tbody>
		</table>
		</div>
	</div>
  </div>
	
  <div class="row">	
	<div class="panel panel-default col-sm-6">
		<div class="panel-body text-center">
			<b>DAFTAR BARANG</b>
		</div>
		<div class="panel-footer">	  
			<table id="my_table1" class="table table-striped">
				<thead>
				<tr>
					<th>Waktu</th>
					<th>Nama Barang</th>
					<th>Dari</th>
					<th>Penerima</th>
					<th class="text-center">Terambil</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($record1 as $item):?>
				<tr>		
					<td><?php echo $item->WAKTU_TERIMA; ?></td>
					<td><?php echo $item->NAMA_BARANG;?></td>
					<td><?php echo $item->NAMA_INSTANSI;?></td>
					<td><?php echo $item->NAMA_PEGAWAI;?></td>
					<td class="text-center">
						<?php 
							if($item->STATUS_BARANG == '0'){
								echo 'Belum';
							}else{
								echo 'Sudah';
							}
						?>
					</td>
				</tr>
				<?php endforeach;?>	
				</tbody>
			</table>		
		</div>
	</div>

	<div class="panel panel-default col-sm-6">
		<div class="panel-body text-center">
			<b>DAFTAR RAPAT</b>
		</div>
		<div class="panel-footer">	  
			<table id="my_table2" class="table table-striped">
			<thead>
			<tr>
				<th>Waktu Rapat</th>
				<th>Durasi (+-)</th>
				<th>Agenda</th>
				<th>Ruang Rapat</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($record2 as $item):?>
			<tr>		
				<td><?php echo date("d F Y, H:i", strtotime($item->WAKTU_RAPAT)); ?></td>
				<td><?php echo $item->DURASI;?> Jam</td>
				<td><?php echo $item->AGENDA;?></td>
				<td><?php echo $item->NAMA_RUANG;?></td>
			</tr>
			<?php endforeach;?>	
			</tbody>
			</table>
		</div>
	</div>	
  </div>	
</div>