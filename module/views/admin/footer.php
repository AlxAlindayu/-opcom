<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.1.0 - Developed By 3618
			</div>
				<strong>Copyright &copy; 2013-<?php echo date('Y'); ?> <a href="javascript:void(0);">RG Community</a>.</strong> All rights reserved.
		</footer>
	</div>
</body>
<?php echo js_tag('js/jquery.js');?>
<?php echo js_tag('js/bootstrap.min.js');?>
<?php echo js_tag('js/jquery-ui.min.js');?>
<?php echo js_tag('js/bootstrap3-wysihtml5.all.min.js');?>
<?php echo js_tag('js/jquery.slimscroll.min.js');?>
<?php echo js_tag('js/dashboard.js');?>
<?php echo js_tag('js/rg-admin.js');?>
<?php echo js_tag('js/deym.js');?>
<?php echo js_tag('js/select2.full.min.js');?>
<?php echo js_tag('js/fastclick.min.js');?>
<?php echo js_tag('js/moment.min.js');?>
<?php echo js_tag('js/daterangepicker.js');?>
<?php echo js_tag('js/jquery.knob.js');?>
<?php
	if ( ! empty($js))
	{
		foreach($js as $javascript)
		{
			echo '<script type="text/javascript" src='.themes_url("js/".$javascript.".js").'></script>';
		}
	}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip(); 
});
  $.widget.bridge('uibutton', $.ui.button);
</script>