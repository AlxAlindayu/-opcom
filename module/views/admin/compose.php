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
						<form method="POST">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">New Message</h3>
								</div>
								<div class="box-body">
									<div class="form-group <?php echo isset($user_response) ? 'has-error' : ''; ?>">
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
										<textarea class="form-control" style="height: 300px;" name="message"><?php echo isset($message) ? $message : ''; ?></textarea>
									</div>
								</div>
								<div class="box-footer">
									<div class="pull-right">
										<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
									</div>
								</div>
							</div>
						</form>
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

</script>
  