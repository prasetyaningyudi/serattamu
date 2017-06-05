<!-- content goes here -->
<div class="my-content">
	<div class="row">
		<div class="col-lg-12">			
			<div class="panel panel-brown">
			  <div class="panel-heading">
				<div class="panel-title">
				<?php 
					if(isset($subtitle)){
						echo $subtitle.' ';
					}
					if(isset($title)){
						echo $title.' ';
					}					
				?>				
				</div>
			  </div>