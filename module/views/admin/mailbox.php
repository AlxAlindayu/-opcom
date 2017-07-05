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
				<!-- Main row -->
				<section class="col-lg-12">
					<?php echo $this->session->flashdata('success'); ?>
				</section>
				<div class="row">
					<section class="col-lg-3">
						<?php $this->load->view($folder.'sidem'); ?>
					</section>
					<section class="col-lg-9">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Inbox</h3>
								<div class="box-tools pull-right">
									<div class="has-feedback">
										<input type="text" class="form-control input-sm" placeholder="Search Mail">
										<span class="glyphicon glyphicon-search form-control-feedback"></span>
								 	</div>
								</div>
							</div>
							<div class="box-body no-padding">
								<div class="mailbox-controls">
									<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
										<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
									</div>
									<!-- /.btn-group -->
									<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
									<div class="pull-right">
										1-50/200
										<div class="btn-group">
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
											<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
										</div>
										<!-- /.btn-group -->
									</div>
								</div>
								<div class="table-responsive mailbox-messages">
									<table class="table table-hover table-striped">
										<tbody>
											<tr>
												<td><input type="checkbox"></td>
												<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
												<td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
												<td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
												<td class="mailbox-attachment"></td>
												<td class="mailbox-date">5 mins ago</td>
											</tr>
											<tr>
												<td><input type="checkbox"></td>
												<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
												<td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
												<td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
												<td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
												<td class="mailbox-date">28 mins ago</td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</section>
				</div>
			</section>
				<!-- /.content -->
		</div>
<?php get_footer($folder."footer",array('jquery.dataTables.min','dataTables.bootstrap')); ?>
<script type="text/javascript">


</script>
  