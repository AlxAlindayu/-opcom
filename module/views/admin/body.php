<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php get_header($folder."header"); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $this->load->view($folder.'/sidebar'); ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?php $this->load->view($folder.'/content_header'); ?>
			<!-- Main content -->
			<section class="content">
				<?php $this->load->view($folder.'/statistics'); ?>
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<section class="col-lg-6 connectedSortable">
						<!-- Chat box -->
						<div class="box box-danger">
							<div class="box-header">
								<i class="fa fa-bullhorn"></i>
								<h3 class="box-title">Announcement</h3>
							</div>
							<div class="box-body ">
								<div class="callout callout-danger">
					                <h4>I am a danger callout!</h4>

					                <p>
										There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul,
										like these sweet mornings of spring which I enjoy with my whole heart.
									</p>
								</div>
							</div>
						</div>

						<!-- /.box (chat box) -->
						<!-- quick email widget -->
					</section>
					<section class="col-lg-6 connectedSortable">
						<!-- Chat box -->
						<div class="box box-success">
							<div class="box-header">
								<i class="fa fa-comments-o"></i>
								<h3 class="box-title">Chat</h3>
								<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
									<div class="btn-group" data-toggle="btn-toggle">
										<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"><i class="fa fa-comments"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									</div>
								</div>
							</div>
							<div class="box-body chat" id="chat-box">
								<!-- chat item -->
								<div class="item">
									<img src="<?php echo themes_url('images/profile/rgview.jpg'); ?>" alt="user image" class="offline">

									<p class="message">
										<a href="javascript:void(0);" class="name">
											<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
											RG - Admin(3618)
										</a>
										Welcome to our Dashboard Ahoo !
									</p>
								</div>
								<div class="item">
									<img src="<?php echo themes_url('images/profile/rgview.jpg'); ?>" alt="user image" class="online">

									<p class="message">
										<a href="javascript:void(0);" class="name">
											<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
											RG - Admin(3618)
										</a>
										Welcome to our Dashboard Ahoo !
									</p>
								</div>
								<!-- /.item -->
							</div>
							<!-- /.chat -->
							<div class="box-footer">
								<div class="input-group">
									<input class="form-control" placeholder="Type message...">
									<div class="input-group-btn">
										<button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box (chat box) -->
						<!-- quick email widget -->
						<div class="box box-info">
							<div class="box-header">
								<i class="fa fa-envelope"></i>
								<h3 class="box-title">Quick Email</h3>
								<!-- tools box -->
								<div class="pull-right box-tools">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
									
								</div>
								<!-- /. tools -->
							</div>
							<div class="box-body">
								<form action="#" method="post">
									<div class="form-group">
										<input type="email" class="form-control" name="emailto" placeholder="Email to:">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="subject" placeholder="Subject">
									</div>
									<div>
										<textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									</div>
								</form>
							</div>
							<div class="box-footer clearfix">
								<button type="button" class="pull-right btn btn-default" id="sendEmail">Send
								<i class="fa fa-arrow-circle-right"></i></button>
							</div>
						</div>
					</section>
					<!-- Right Col -->
					
				</div>
			</section>
				<!-- /.content -->
		</div>
<?php get_footer($folder."footer"); ?>


  