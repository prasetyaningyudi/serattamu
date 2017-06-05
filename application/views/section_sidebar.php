<div id="container" class="no-margin">
	<div id="sidebar">
	<div id="sidebar-up">
		<div class="my-profile">
			<img src="<?php echo base_url(); ?>images/guest.png" width="25px" alt="Photo" class="img-circle"/> 
			<?php  
				if(isset($this->session->userdata['is_logged_in'])){
					echo $this->session->userdata('USER_ALIAS');
				}else{
					echo 'Guest';
				}
			?>
		</div>
		<div class="my-menu">
            <ul class="sidebar-nav" id="menu" style="list-style-type:none;">
				<?php foreach ($menu as $item):?>
                <li>
                    <a href="<?php echo $item->PERMALINK; ?>"><span class="glyphicon glyphicon-<?php echo $item->MENU_ICON; ?>"></span> <?php echo $item->MENU_NAME; ?></a>
                    <ul class="" style="list-style-type:none;">
						<?php foreach ($sub_menu as $sub_item):?>
							<?php if($item->ID ==  $sub_item->MENU_ID): ?>
							<?php //if(strpos($mystring, $this->session->userdata['ROLE_ID']) !== false): ?>
							<li><a href="<?php echo $sub_item->PERMALINK; ?>">- &nbsp;&nbsp;<span class="glyphicon glyphicon-<?php echo $sub_item->MENU_ICON; ?>"></span> <?php echo $sub_item->MENU_NAME; ?></a></li>
							<?php endif; ?>
						<?php endforeach;?>
                    </ul>					
                </li>
				<?php endforeach;?>	
            </ul>		
		</div>
	</div>
	</div>