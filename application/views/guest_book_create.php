<script>
$( function() {
	var availableTags = [
		<?php foreach ($record as $item):?>
		{
			value: <?php echo '"'.$item->GUEST_NAME.'",'; ?>
			label: <?php echo '"'.$item->GUEST_NAME.'",'; ?>
			phone: <?php echo '"'.$item->GUEST_PHONE.'",'; ?>
			email: <?php echo '"'.$item->GUEST_EMAIL.'",'; ?>
			cname: <?php echo '"'.$item->COMPANY_NAME.'",'; ?>
			id: <?php echo '"'.$item->ID.'",'; ?>
			cid: <?php echo '"'.$item->COMPANY_ID.'",'; ?>
		},
		<?php endforeach;?>
	];	
	$( "#name" ).autocomplete({
		source: availableTags,
		minLength: 1,
		select: function( event , ui){
			if(ui.item.id != ''){
				$("#id").val(ui.item.id);		
			}else{
				$("#id").val('');				
			}
			if(ui.item.cid != ''){
				$("#cid").val(ui.item.cid);		
			}else{
				$("#cid").val('');				
			}			
			if(ui.item.email != ''){
				$("#email").val(ui.item.email);
				$('#email').prop("readonly", true);			
			}else{
				$("#email").val('');
				$('#email').prop("readonly", false);					
			}
			if(ui.item.phone != ''){
				$("#phone").val(ui.item.phone);	
				$('#phone').prop('readonly', true);			
			}else{
				$("#phone").val('');	
				$('#phone').prop('readonly', false);						
			}
			if(ui.item.cname != ''){
				$("#company").val(ui.item.cname);	
				$('#company').prop('readonly', true);			
			}else{
				$("#company").val('');	
				$('#company').prop('readonly', false);				
			}		
		}		
	});
	
    $("#name").keypress(function(){		
		$("#id").val('');
		$("#cid").val('');
        $('#email').prop("readonly", false);		
		$('#phone').prop('readonly', false);	
		$('#company').prop('readonly', false);
    });
	
} );
</script>

<script>
$( function() {
	var company= [

		<?php foreach ($record2 as $item):?>
		{
			value: <?php echo '"'.$item->COMPANY_NAME.'",'; ?>
			label: <?php echo '"'.$item->COMPANY_NAME.'",'; ?>
			id: <?php echo '"'.$item->ID.'",'; ?>
		},
		<?php endforeach;?>
	];	
	$( "#company" ).autocomplete({
		source: company,
		minLength: 1,
		select: function( event , ui){
			if(ui.item.id != ''){
				$("#cid").val(ui.item.id);		
			}else{
				$("#cid").val('');				
			}	
		}		
	});
    $("#company").keypress(function(){		
		$("#cid").val('');
    });	
} );	
</script>

<script>
$( function() {
	$('#need').change(function() {
		if ($(this).val() === 'Meet Someone') {
			$(".choose-1").show();
			$(".choose-2").hide();
		}else if ($(this).val() === 'Meeting') {
			$(".choose-1").hide();
			$(".choose-2").show();
		}else{
			$(".choose-1").hide();
			$(".choose-2").hide();			
		}
	});
});
</script>
			  <div class="panel-body">
					<form action="" id="inputform" method="post" class="form-horizontal">
					  <fieldset>
						<div class="form-group">	
						<label for="name" class="col-sm-2">Guest Name:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="name" type="text" name="name" value="" placeholder="Guest Name" required>
						</div>
						</div>	
						<div class="form-group">	
						<label for="email" class="col-sm-2">Guest Email:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="email" type="text" name="email" value="" placeholder="Guest Email">
						</div>
						</div>	
						<div class="form-group">	
						<label for="phone" class="col-sm-2">Guest Phone:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="phone" type="text" name="phone" value="" placeholder="Guest Phone">
						</div>
						</div>
						<div class="form-group">	
						<label for="company" class="col-sm-2">Company Name:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="company" type="text" name="company" value="" placeholder="Company Name" required>
						</div>
						</div>	
						<div class="form-group">	
						<label for="need" class="col-sm-2">Necessity:<br></label>
						<div class="col-sm-10">	
						<select class="form-control" id="need" name="need" form="inputform">
							<?php foreach ($record1 as $item):?>
							<option value="<?php echo $item->REF_NAME;?>"><?php echo $item->REF_NAME;?></option>	
							<?php endforeach;?>
						</select>  
						</div>
						</div>	
						<div class="form-group choose-1">	
						<label for="who" class="col-sm-2">Meet Who:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="who" type="text" name="who" value="" placeholder="Meet Who" required>
						</div>
						</div>							
						<?php
							if(isset($this->session->userdata['is_logged_in'])) {
								$user_id = $this->session->userdata['ID'];
							}else{
								$user_id = 0;
							}
						?>					
						<input type="hidden" name="user" value="<?php echo $user_id; ?>">	
						<input type="hidden" name="id" value="">							
						<input type="hidden" name="cid" value="">							
						<div class="form-group">
						<div class="col-sm-2">
						<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
						</div>					
						<div class="col-sm-8">
							<?php
								if(isset($warning) and $warning !== null){
									echo '<div class="alert alert-warning" role="alert">';
									echo $warning['text'];
									echo '</div>';
								}
							?>
						</div>	
						<div class="col-sm-2 text-right">
						<input type="reset" name="reset" value="Reset" class="btn btn-default btn-lg">
						</div>							
					</fieldset>	
					</form>				
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		