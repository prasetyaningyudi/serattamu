
			  <div class="panel-body">
				<table id="my_table" class="table table-striped">
					<thead>
					<tr>
						<th class="text-center">No</th>
						<th>Company Name</th>
						<th>Company Type</th>
						<th>Status</th>
						<th class="text-center">Update Status</th>
						<th class="text-center">Update</th>
						<th class="text-center">Trash</th>
					</tr>
					</thead>
					<tbody>
					<?php $i=1; foreach ($record as $item):?>
					<tr>		
						<td class="text-center"><?php echo $i++; ?></td>
						<td><?php echo $item->COMPANY_NAME;?></td>
						<td><?php echo $item->REF_NAME;?></td>
						<td>
							<?php 
								if($item->COMPANY_STATUS == '1'){echo 'Active';}else{echo 'Inactive';}
							?>
						</td>
						<td class="text-center">
							<?php if($item->COMPANY_STATUS == '0'): ?>
								<a class="btn-sm btn-warning" role="button" title="update status" href="<?php echo base_url().'company/update_status/'.$item->ID;?>">
									enable
								</a>
							<?php else: ?>
								<a class="btn-sm btn-danger" role="button" title="update status" href="<?php echo base_url().'company/update_status/'.$item->ID;?>">
									disable
								</a>
							<?php endif; ?>
						</td>						
						<td class="text-center">
							<a class="btn-sm btn-primary" role="button" title="update" href="<?php echo base_url().'company/update/'.$item->ID;?>">
								update
							</a>
						</td>
						<td class="text-center">
							<a class="btn-sm btn-danger" role="button" title="update" href="<?php echo base_url().'company/delete/'.$item->ID;?>">
								trash
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