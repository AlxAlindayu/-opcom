<?php 

	$rgq = QModel::sfwa('information','usertype','rg');
	$rgc = QModel::c($rgq);

	$agq = QModel::sfwa('information','usertype','aspirant');
	$agc = QModel::c($agq);

	$bgq = QModel::sfwa('information','usertype','ban');
	$bgc = QModel::c($bgq);

?>

<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo $rgc; ?></h3>
				<p>RG's</p>
			</div>
			<div class="icon">
				<i class="fa fa-users" aria-hidden="true"></i>
			</div>
			<a href="javascript:void(0);" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?php echo $agc; ?></h3>
				<p>Aspirants</p>
			</div>
			<div class="icon">
				<i class="fa fa-user" aria-hidden="true"></i>
			</div>
			<a href="javascript:void(0);" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
		<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?php echo $bgc; ?></h3>
				<p>Ban</p>
			</div>
			<div class="icon">
				<i class="fa fa-ban" aria-hidden="true"></i>
			</div>
			<a href="javascript:void(0);" class="small-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
<!-- ./col -->
</div>
<!-- /.row -->