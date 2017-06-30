<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
</body>
<?php echo js_tag('js/jquery.js');?>
<?php echo js_tag('js/icheck.js');?>
<?php echo js_tag('js/pace.min.js');?>
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
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip(); 
	$('input').iCheck({
		radioClass: 'iradio_polaris'
	});
});

</script>