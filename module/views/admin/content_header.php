<section class="content-header">
	<h1>
		<?php echo ucwords($menu); ?>
		<small><?php echo isset($submenu) ? ucwords($submenu) : ''; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="<?php echo isset($submenu) ? '' : 'active'; ?>"><?php echo ucwords($menu); ?></li>
		<?php if(isset($submenu)): ?>
			<li class="active"><?php echo ucwords($submenu); ?></li>
		<?php endif; ?>
	</ol>
</section>