<script type='text/javascript'>
$(document).ready(function() {
    $('#my_table').DataTable({
		"order": [],
	});
} );
</script>

			  <div class="panel-body">
				<table id="my_table" class="table table-striped">
					<thead>
					<tr>
						<th>Nomor</th>
						<th>Tgl</th>
						<th>Hal</th>
						<th>AGENDA</th>
						<th>Dari</th>
						<th>Status</th>
						<th class="text-center">edit</th>
						<th class="text-center">disposisikan</th>
						<th class="text-center">log</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($record as $item):?>
					<tr>		
						<td><?php echo $item->NOMOR_SURAT; ?></td>
						<td><?php echo $item->TGL_SURAT; ?></td>
						<td><?php echo $item->HAL_SURAT; ?></td>
						<td>
							<?php 
								if($item->NOMOR_AGENDA == null){
									echo 'Belum Ada';
								}else{
									echo $item->NOMOR_AGENDA; 	
								}
							?>
						</td>
						<td><?php echo $item->NAMA_INSTANSI; ?></td>											
						<td><?php echo $item->NAMA_STATUS; ?></td> 
						<td class="text-center">
							<?php if($item->STATUS_SURAT_ID == '1'): ?>						
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Surat_controller/ubah/'.$item->ID;?>">
								edit
							</a>
							<?php else: ?>
								
							<?php endif; ?>							
						</td>
						<td class="text-center">
							<?php if($item->STATUS_SURAT_ID == '1'): ?>
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Disposisi_controller/rekam/'.$item->ID;?>">
								disposisikan
							</a>
							<?php else: ?>
							
							<?php endif; ?>
						</td>						
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="edit" href="<?php echo base_url().'Surat_controller/log/'.$item->ID;?>">
								log
							</a>
						</td>
					</tr>
					<?php endforeach;?>	
					</tbody>
				</table>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		