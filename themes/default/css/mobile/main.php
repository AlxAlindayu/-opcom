body{ background:url("<?php echo themes_url('images/background.png'); ?>"); background-attachment:fixed; }
.header{ background:url("<?php echo themes_url('images/bg.jpg'); ?>"); }
.footer{ background:url("<?php echo themes_url('images/bg.jpg'); ?>"); }
/*================================================================================
	OTHERS
================================================================================ */
.box{
	color:#ffffff;
	font-weight:bold;
	width:120px;
	border:1px solid black;
	padding:20px;
	background:#6960EC;
	float:left;
	margin-left:20px;
	margin-bottom:20px;
	text-align:center;
}
.box:hover{
	cursor:pointer;
	box-shadow: 2px 2px 5px #153E7E;
	text-decoration:none;
}
.blue_text{ color:blue; }
.parameters_box{ background:#e1e1e1; padding:10px; border:1px solid black; font-size:80%; margin:5px 0 0 10px; }
.parameters_highlight{ color:blue; }
.parameters_highlight2{ color:orange; }
.warning_box{ background:red; padding:10px; margin:5px 0 0 0; color:white; font-size:80%; }
.code_box{ background:#fefcf5; padding:10px; color:#002166; border:1px solid black; font-size:110%; font-family:Verdana, Verdana, Sans-serif; margin-top:5px }
/*================================================================================
CE ONLY - Enalds
================================================================================ */
.input_text{ font-family:"Tahoma",Verdana,Times New Roman,sans-serif; width:300px; padding:5px; border:1px solid black; }
.input_text:focus { outline:0; box-shadow: 0 0 10px #5CB3FF; -webkit-box-shadow: 0 0 10px #5CB3FF; -moz-box-shadow: 0 0 10px #5CB3FF; }
input[type=submit]{ padding:5px; }
/*================================================================================
CE MENU - Enalds
================================================================================ */
.menu_red{ float:left; padding:10px; background:red; margin-left:100px; color:white; }
.menu_red:hover{ cursor:pointer }
.menu_red_selected{ float:left; padding:10px; background:red; margin-left:100px; color:white; position:absolute; height:50px }
.menu_red_selected:hover{ cursor:pointer; margin-top:-10px }
.menu_blue{ float:left; padding:10px; background:blue; margin-left:180px; color:white; }
.menu_blue:hover{ cursor:pointer }
.menu_blue_selected{ float:left; padding:10px; background:blue; margin-left:180px; color:white; position:absolute; height:50px }
.menu_blue_selected:hover{ cursor:pointer; margin-top:-10px }