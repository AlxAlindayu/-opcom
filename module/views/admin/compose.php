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
				<div class="row">
					<section class="col-lg-3">
						<a href="javascript:void(0);" class="btn btn-primary btn-block " style="margin-bottom:20px;">Back to Inbox</a>

						<div class="box box-solid">
							<div class="box-header with-border">
								<h3 class="box-title">Folders</h3>
								<div class="box-tools">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body no-padding">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox<span class="label label-primary pull-right">12</span></a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i> Unread <span class="label label-danger pull-right">12</span></a></a></li>
								</ul>
							</div>
						</div>
					</section>
					<section class="col-lg-9">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">New Message</h3>
							</div>
							<div class="box-body">
								<div class="form-group <?php echo isset($user_response) ? 'has-error' : ''; ?>">
									<label for="batch">User Information</label>
									<?php 
											
										if($cquery):
									?>
											<select class="form-control select2" name="user"  style="width:100%;" data-placeholder="To:">												
											<option value="">To:</option>
											<?php 
												foreach (QModel::g($query, TRUE) as $get):
													$lastname = $get['lastname'];
													$firstname = $get['firstname'];
													$unique_id = $get['unique_id'];
													$vest_no = $get['vest_no'];
													$batch = $get['batch'];
													$aspirant = $get['aspirant'];
											?>
													<option <?php echo (isset($user) ? $user == $unique_id : '') ? 'selected' : ''; ?> value="<?php echo $unique_id; ?>"><?php echo $lastname.', '.$firstname.' - '.$vest_no.' - '.$aspirant.' - '.$batch;?></option>
												<?php endforeach; ?>
											</select>
										<?php else: ?>
											<div class="callout callout-danger">
                								<h4><i class="icon fa fa-ban"></i> Oppss !</h4>
                								<p>No rg in our record</p>
              								</div>
										<?php endif; ?>
										<span><?php echo isset($user_response) ? $user_response : ''; ?></span>
									</div>
								<div class="form-group">
									<textarea class="form-control" style="height: 300px;"></textarea>
								</div>
							</div>
							<div class="box-footer">
								<div class="pull-right">
									<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
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
<?php if($cquery): ?>
	$(".select2").select2({
		
	});
	
<?php endif; ?>
$('#rgtable').DataTable({
	"paging": true,
	/*"lengthChange": false,*/
	"searching": true,
	"ordering": true,
	"info": true,
	"autoWidth": false
});
</script>
  