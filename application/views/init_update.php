			  <div class="panel-body">
					<form action="" id="inputform" method="post" class="form-horizontal">
					  <fieldset>
					  <?php foreach ($record as $item):?>
						<div class="form-group">	
						<label for="app" class="col-sm-2">Application Name:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="app" type="text" name="app" value="<?php echo $item->APP_NAME;?>" placeholder="Application Name" required>
						</div>
						</div>					  
						<div class="form-group">	
						<label for="office" class="col-sm-2">Office Name:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="office" type="text" name="office" value="<?php echo $item->OFFICE_NAME;?>" placeholder="Office Name" required>
						</div>
						</div>						  
						<div class="form-group">	
						<label for="icon" class="col-sm-2">Icon:<br></label>	
						<div class="col-sm-10">
						<select class="form-control" id="icon" name="icon" form="inputform">
							<option value="book" <?php if($item->ICON == 'Book'){echo 'selected';} ?>>Book</option>	
							<option value="envelope" <?php if($item->ICON == 'envelope'){echo 'selected';} ?>>Envelope</option>	
							<option value="home" <?php if($item->ICON == 'home'){echo 'selected';} ?>>Home</option>	
							<option value="file" <?php if($item->ICON == 'file'){echo 'selected';} ?>>File</option>	
						</select>
						</div>					  
						</div>	
						<div class="form-group">	
						<label for="theme" class="col-sm-2">Theme:<br></label>	
						<div class="col-sm-10">
						<select class="form-control" id="theme" name="theme" form="inputform">
							<option value="dark" <?php if($item->THEME == 'dark'){echo 'selected';} ?>>Dark</option>	
							<option value="light" <?php if($item->THEME == 'light'){echo 'selected';} ?>>Light</option>	
							<option value="blue" <?php if($item->THEME == 'blue'){echo 'selected';} ?>>Blue</option>	
						</select>
						</div>					  
						</div>							
						<input type="hidden" name="id" value="<?php echo $this->session->userdata['ID']; ?>">
						<input type="hidden" name="user" value="<?php echo $this->session->userdata['ID']; ?>">
						<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
					  <?php endforeach;?>	
					  </fieldset>	
					</form>				
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		