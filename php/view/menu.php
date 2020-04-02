
<header class="main-header">
    <!-- Logo -->
    <a href="panel.php" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>P</b>P</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>peak</b>plate</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    
		<?php
		if (isset($_SESSION['autentificado']) == "VERDADERO") 
		{
		?>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="../../img/jpg/sinimagen.jpg" class="user-image" alt="User Image">
							<span class="hidden-xs" id='user_ba'> 
								<?php	
									echo $_SESSION['INGRESO']['Name'];
								?>
							</span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<p>
								<?php	
									echo $_SESSION['INGRESO']['Name'];
								?>
								<small></small>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="logout.php"  data-toggle="tooltip"  data-placement="bottom" title="Cerrar sesión" style=' float: right'>
										<img src="../../img/png/salirs.png"  width='70%' height='50%'>
									</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
	  <?php
		}
	  ?>
    </nav>
</header>


