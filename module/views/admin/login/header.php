<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<?php $last_update = time() - 60; ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php echo meta('viewport', 'width=device-width, initial-scale=1'); ?>
	<?php $this->output->set_header("HTTP/1.0 200 OK"); ?>
	<?php $this->output->set_header("HTTP/1.1 200 OK"); ?>
	<?php $this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT'); ?>
	<?php $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate"); ?>
	<?php $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false); ?>
	<?php $this->output->set_header("Pragma: no-cache"); ?>
	<?php echo header('Content-Type: text/html; charset=UTF-8'); ?>
	<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
	<?php echo meta('description', $description); ?>
	<?php echo meta('keywords', $description); ?>
	<?php echo meta('author', $author); ?>
	<?php echo meta('robots', 'noodp,noydir'); ?>
	<?php echo link_tag('themes/default/images/favicon.ico', 'shortcut icon', 'image/x-icon'); ?>
	<?php echo link_tag('themes/default/images/favicon.ico', 'icon', 'image/x-icon'); ?>
	<?php echo link_tag('themes/default/css/admin.css'); ?>
	<?php echo link_tag('themes/default/css/bootstrap.min.css'); ?>
	<?php echo link_tag('themes/default/css/hover.css'); ?>
	
	
	<?php echo link_tag('themes/default/css/font-awesome.min.css'); ?>
	<?php
		if ( ! empty($css))
		{
			foreach($css as $stylesheet)
			{
				echo link_tag(themes_url('css/'.$stylesheet.".css"));
			}
		}
	?>
	<title><?php echo $title; ?></title>
	<script type="text/javascript">
		document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, '');
	</script>
</head>
<body style="background: #cecece;">
