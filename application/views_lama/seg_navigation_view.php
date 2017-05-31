<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="title"><a class="navbar-brand" href="<?php echo base_url(); ?>">Resepsionis Dit. SITP</a></div>
		</div><!--/.nav-header -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php if($this->session->userdata['ROLE_ID'] ==  '2'): ?>
				<li><a href="<?php echo base_url().'Tamu_controller/'; ?>">Lihat Tamu</a></li>
				<?php endif; ?>			
				<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
				<li><a href="<?php echo base_url().'Tamu_controller/rekam'; ?>">Rekam Tamu</a></li>
				<?php endif; ?>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Barang <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Barang_controller/'; ?>">Lihat Barang</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
						<li><a href="<?php echo base_url().'Barang_controller/rekam'; ?>">Rekam Barang</a></li>
						<?php endif; ?>
					</ul>			  
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rapat <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Rapat_controller/'; ?>">Lihat Rapat</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
						<li><a href="<?php echo base_url().'Rapat_controller/rekam'; ?>">Rekam Rapat</a></li>
						<?php endif; ?>
					</ul>			  
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ruang Rapat <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Ruang_controller/'; ?>">Lihat Ruang Rapat</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
						<li><a href="<?php echo base_url().'Ruang_controller/rekam'; ?>">Rekam Ruang Rapat</a></li>
						<?php endif; ?>
					</ul>			  
				</li>					
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Instansi <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Instansi_controller/'; ?>">Lihat Instansi</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
						<li><a href="<?php echo base_url().'Instansi_controller/rekam'; ?>">Rekam Instansi</a></li>
						<?php endif; ?>
					</ul>			  
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tujuan <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Tujuan_controller/'; ?>">Lihat Tujuan</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
						<li><a href="<?php echo base_url().'Tujuan_controller/rekam'; ?>">Rekam Tujuan</a></li>
						<?php endif; ?>					
					</ul>	
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pegawai <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Pegawai_controller/'; ?>">Lihat Pegawai</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>
						<li><a href="<?php echo base_url().'Pegawai_controller/rekam'; ?>">Rekam Pegawai</a></li>
						<?php endif; ?>
					</ul>			  
				</li>	
				
				<?php if($this->session->userdata['ROLE_ID'] !=  '3'): ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'User_controller/'; ?>">Lihat User</a></li>
						<?php if($this->session->userdata['ROLE_ID'] !=  '2'): ?>					
						<li><a href="<?php echo base_url().'User_controller/rekam'; ?>">Rekam User</a></li>
						<?php endif; ?>							
					</ul>	
				</li>
				<?php endif; ?>	

			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="<?php echo base_url().'About_controller/user';?>"><?php echo $this->session->userdata('USERNAME'); ?></a></li>
			  <li><a href="#"><?php echo $this->session->userdata('NAMA_ROLE'); ?></a></li>
			  <li><a href="<?php echo base_url().'User_authentication/logout';?>">Logout</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</nav>