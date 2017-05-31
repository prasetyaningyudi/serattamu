<div id="container" class="no-margin">
	<div id="sidebar">
	<div id="sidebar-up">
		<div class="my-profile">
			<img src="<?php echo base_url(); ?>images/foto.jpg" width="25px" alt="Photo" class="img-circle"/> Yudi Prasetyo
		</div>
		<div class="my-menu">
            <ul class="sidebar-nav" id="menu" style="list-style-type:none;">
				<?php foreach ($menu as $item):?>
                <li>
                    <a href="<?php echo $item->PERMALINK; ?>"><span class="glyphicon <?php echo $item->ICON; ?>"></span> <?php echo $item->NAMA_MENU; ?></a>
                    <ul class="" style="list-style-type:none;">
						<?php foreach ($sub_menu as $sub_item):?>
							<?php if($item->ID ==  $sub_item->MENU_ID): ?>
							<?php //if(strpos($mystring, $this->session->userdata['ROLE_ID']) !== false): ?>
							<li><a href="<?php echo $sub_item->PERMALINK; ?>">- &nbsp;&nbsp;<span class="glyphicon <?php echo $sub_item->ICON; ?>"></span> <?php echo $sub_item->NAMA_MENU; ?></a></li>
							<?php endif; ?>
						<?php endforeach;?>
                    </ul>					
                </li>
				<?php endforeach;?>	
            </ul>		
		</div>
	</div>
	</div>