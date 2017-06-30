<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?php echo themes_url('images/profile/rgview.jpg'); ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo isset($username) ? $username : 'RG - Admin(3618)'; ?></p>
					<a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
			<?php /*<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			<!-- /.search form -->*/ ?>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">NAVIGATION</li>
				<li class=" treeview <?php echo (isset($menu) ? $menu == 'dashboard' : '') ? 'active menu-open' : ''; ?>">
					<a href="<?php echo base_url('admin/dashboard'); ?>">
						<i class="fa fa-dashboard"></i><span>Dashboard</span>
						<?php /*<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>*/ ?>
					</a>
					<?php /*<ul class="treeview-menu">
						<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
						<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
					</ul>*/ ?>
				</li>
				<li class="treeview <?php echo (isset($menu) ? $menu == 'registration' : '') ? 'active' : ''; ?>">
					<a href="">
						<i class="fa fa-edit"></i><span>Registration</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						
						<li class="<?php echo (isset($page) ? $page == 'list' : '') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/registration'); ?>"><i class="fa fa-list" aria-hidden="true"></i> List</a></li>
						<li class="<?php echo (isset($page) ? $page == 'aspirant' : '') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/registration?add=aspirant'); ?>"><i class="fa fa-users" aria-hidden="true"></i> Aspirants</a></li>
						<li class="<?php echo (isset($page) ? $page == 'rg' : '') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/registration?add=rg'); ?>"><i class="fa fa-user" aria-hidden="true"></i> RG's</a></li>
						<li class="<?php echo (isset($page) ? $page == 'account' : '') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/registration?add=user'); ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> Account</a></li>
					</ul>
				</li>
				<li class="treeview <?php echo (isset($menu) ? $menu == 'events' : '') ? 'active menu-open' : ''; ?>">
					<a href="javascript:void(0);">
						<i class="fa fa-calendar"></i><span>Events</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> List of Events</a></li>
						
					</ul>
				</li>
				<li class="<?php echo (isset($menu) ? $menu == 'mailbox' : '') ? 'active' : ''; ?>">
					<a href="pages/mailbox/mailbox.html">
						<i class="fa fa-envelope"></i><span>Mailbox</span>
						<?php /*<span class="pull-right-container">
							<small class="label pull-right bg-yellow">12</small>
							<small class="label pull-right bg-green">16</small>
							<small class="label pull-right bg-red">5</small>
						</span>*/ ?>
					</a>
				</li>
				<li class="<?php echo (isset($menu) ? $menu == 'documentation' : '') ? 'active' : ''; ?>"><a href="documentation/index.html"><i class="fa fa-book"></i><span>Documentation</span></a></li>
				<li class="header">LABELS</li>
				<li><a href="javascript:void(0);"><i class="fa fa-circle-o text-red"></i><span>Important</span></a></li>
				<li><a href="javascript:void(0);"><i class="fa fa-circle-o text-yellow"></i><span>Warning</span></a></li>
				<li><a href="javascript:void(0);"><i class="fa fa-circle-o text-aqua"></i><span>Information</span></a></li>
			</ul>
	</section>
	<!-- /.sidebar -->
</aside>