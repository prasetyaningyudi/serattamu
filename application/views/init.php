			  <div class="panel-body">
				<?php if($valid === TRUE): ?>
					
					
					
					
					
				<?php else: ?>
					<form action="" id="initform" method="post" class="form-horizontal">
					  <fieldset>
						<div class="form-group">	
						<label for="app" class="col-sm-2">Application Name:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="app" type="text" name="app" value="" placeholder="Application Name" required>
						</div>
						</div>					  
						<div class="form-group">	
						<label for="office" class="col-sm-2">Office Name:<br></label>
						<div class="col-sm-10">		
						<input class="form-control" id="office" type="text" name="office" value="" placeholder="Office Name" required>
						</div>
						</div>						  
						<div class="form-group">	
						<label for="icon" class="col-sm-2">Icon:<br></label>	
						<div class="col-sm-10">
						<select class="form-control" id="icon" name="icon" form="initform">
							<option value="book">Book</option>	
							<option value="envelope">Envelope</option>	
							<option value="home">Home</option>	
							<option value="file">File</option>	
						</select>
						</div>					  
						</div>	
						<div class="form-group">	
						<label for="theme" class="col-sm-2">Theme:<br></label>	
						<div class="col-sm-10">
						<select class="form-control" id="theme" name="theme" form="initform">
							<option value="book">Dark</option>	
							<option value="envelope">Light</option>	
							<option value="home">Blue</option>	
						</select>
						</div>					  
						</div>							
						<input type="submit" name="submit" value="Submit" class="btn btn-default btn-lg">
					  </fieldset>	
					</form>				
				<?php endif; ?>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		