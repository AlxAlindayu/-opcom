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
	<?php echo link_tag('themes/default/css/layout.css'); ?>
	<?php echo link_tag('themes/default/css/bootstrap.css'); ?>
	
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
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<nav class="navbar navbar-inverse rg-navbar">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mybar">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<?php /*<a href="javascript:void(0);" class="navbar-brand hvr-fade">RG Com</a>*/ ?>
							</div>
							<div class="collapse navbar-collapse" id="mybar">
								<ul class="nav navbar-nav">
									<li class="hvr-fade rg-hvr"><a href="javascript:void(0);">Home</a></li>
									<li class="hvr-fade rg-hvr"><a href="javascript:void(0);">FAQs</a></li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid rg-banner" >
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<img src="<?php echo themes_url('images/rgcom.png'); ?>" class="img-responsive center-block">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-offset-3">
				<div class="col-md-8">
					<form class="rg-form" role="search">
						<div class="input-group add-on">
							<input type="text" name="search" placeholder="Vest #" class="form-control rg-search-bar">
							<div class="input-group-btn">
								<button class="btn btn-default hvr-fade rg-hvr" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

