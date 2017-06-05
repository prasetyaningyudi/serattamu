			  <div class="panel-body">
				  <?php if(isset($this->session->userdata['is_logged_in'])): ?>
					<h2>Hello, <?php echo $this->session->userdata['USER_ALIAS']; ?></h2>
						<?php if($valid === TRUE): ?>
							<h4>How are you today? Feels good right.<br>Lets start your work with access menus on the left sidebar. </h4>
						<?php else: ?>
							<?php if($this->session->userdata['ROLE_ID'] == '1'): ?>	
								<h4>Ops, It looks like it's first time you login, Please input some initial data first.</h4>
								<p><a class="btn btn-primary btn-lg" href="<?php echo base_url()."home/init_data"; ?>" role="button">Initial Data</a></p>
							<?php else: ?>
								<h4>How are you today? Feels good right.<br>Lets start your work with access menus on the left sidebar. </h4>
							<?php endif; ?>										
						<?php endif; ?>										
				  <?php else: ?>
					<h2>Hello, Guest</h2>
					<h4>How are you today? Feels good right.<br>If you want to meet someone, Just click the Sign In button to start.</h4>
					<p><a class="btn btn-primary btn-lg" href="" role="button">Sign In</a></p>					
				  <?php endif; ?>
			  </div>			  
			</div> 
		</div> 
	</div>				
</div>		