<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml" class="no-js">
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
    <?php echo meta('description', 'The TCU Files'); ?>
    <?php echo meta('keywords', 'The TCU Files'); ?>
    <?php echo meta('robots', 'noodp,noydir'); ?>
    <?php echo link_tag('themes/default/images/favicon.ico', 'shortcut icon', 'image/x-icon'); ?>
    <?php echo link_tag('themes/default/images/favicon.ico', 'icon', 'image/x-icon'); ?>
    <?php echo link_tag('themes/default/css/bootstrap.css'); ?>
    <?php echo link_tag('themes/default/css/hover.css'); ?>
    <?php echo link_tag('themes/default/css/font-awesome.min.css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo themes_url('css/layout.css'); ?>">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Questrial" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
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
    <style type="text/css">
    header { 
	background: url('<?php echo themes_url("images/1.png"); ?>') no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
</style>
</head>
<header>
  <div class="container-fluid">
    <div class="row">
       <nav class="navbar navbar-inverse"  id="headback">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand hvr-fade" href="javascript:void(0);">The TCU Files</a>
            </div>
            <div class="container">
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="hvr-fade"><a href="javascript:void(0);">Home</a></li>
                  <li class="hvr-fade"><a href="javascript:void(0);">Send Story</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="hvr-fade"><a href="javascript:void(0);"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
    </div>
    <div class="container">
      <div class="col-md-12">
          <div class="row" >
          		<img src="<?php #echo themes_url('images/1.png'); ?>" class="img-responsive center-block" style="position:absolute;z-index:-11">
	            <h2 class="head-h2" style="padding:10px">The TCU Files</h2>
	            <h4 class="head-h4" style="padding:10px">Share your stories now !</h4>
            	<div class="panel panel-default announcement">
            		<div class="panel-body"><b>This is NOT the official website of Taguig City University</b></div>
           		</div>
          </div>
      </div>
    <?php /*  <div class="col-md-12">
        <div class="row">
          <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">Accessories</li>
          </ul>
        </div>
      </div>*/ ?>
    </div>
  </div>
</header>