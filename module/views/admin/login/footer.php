<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo js_tag('js/jquery.js');?>
<?php echo js_tag('js/bootstrap.min.js');?>
<?php
	if ( ! empty($js))
	{
		foreach($js as $javascript)
		{
			echo '<script type="text/javascript" src='.themes_url("js/".$javascript.".js").'></script>';
		}
	}
?>
