<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php get_header($folder."header",array('blue','dataTables.bootstrap')); ?>
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
								<?php /*<div class="box-tools pull-right">
									<div class="has-feedback">
										<input type="text" class="form-control input-sm" placeholder="Search Message">
										<span class="glyphicon glyphicon-search form-control-feedback"></span>
								 	</div>
								</div>
								*/ ?>
							</div>
							<div class="box-body ">
								<div class="mailbox-controls no-padding">
									<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
								</div>
								<div class=" mailbox-messages">
									<table id="mail-box" class="table table-hover table-striped">
										<thead>
											<th></th>
											<th><?php echo isset($sent) ? 'To' : 'From'; ?></th>
											<th>Message</th>
											<th>Date Sent</th>
										</thead>
										<tbody>
											<?php 

												if(isset($sent)) {
													$query = $sent;
												} elseif(isset($unread)) {
													$query = $unread;
												} else {
													$query = QModel::sfwa("message",array('rgto','is_delete'),array($this->session->userdata("hashcrash"),'0'));
												}
												
												$cquery = QModel::c($query);

												if( ! $cquery):
											?>
											<tr>
												<td>No records found</td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										<?php else: ?>
											<?php
													foreach (QModel::g($query, TRUE) as $g):
														$rgfrom = $g['rgfrom'];
														$rgto = $g['rgto'];
														$message = $g['message'];
														$date_sent = $g['date_sent'];
														$is_read = $g['is_read'];
														$is_delete = $g['is_delete'];
														$message_id = $g['message_id'];

														if(isset($sent)) {
															$res = $this->wmodel->getInformation($rgto);
														} else {
															$res = $this->wmodel->getInformation($rgfrom);
														}
														$frmname = $res->firstname.' '.$res->lastname;

														if (strlen($message) > 40) 
														{
															// truncate string
															
															// make sure it ends in a word so assassinate doesn't become ass...
															$message_post = substr($website, 0, 40).'...'; 
														}
														else
														{
															$message_post = $message;
														}
														
											?>
											<tr>
												<td><input type="checkbox" name="messageid[]" value="<?php echo $message_id; ?>"></td>
												<?php /*<td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>*/ ?>
												<td class="mailbox-name"><a href="javascript:void(0);"><?php echo $frmname; ?></a></td>
												<td class="mailbox-subject"><?php echo $message_post; ?></td>
												<?php /*<td class="mailbox-attachment"></td>*/ ?>
												<td class="mailbox-date"><?php echo date('M/d/Y',strtotime($date_sent)); ?></td>
											</tr>
											<?php endforeach; endif; ?>
											
											
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
<?php get_footer($folder."footer",array('jquery.dataTables.min','dataTables.bootstrap','icheck')); ?>
<script type="text/javascript">
$('.mailbox-messages input[type="checkbox"]').iCheck({
	checkboxClass: 'icheckbox_flat-blue',
	radioClass: 'iradio_flat-blue'
});

//Enable check and uncheck all functionality
$(".checkbox-toggle").click(function () {
	var clicks = $(this).data('clicks');
	if (clicks) {
		//Uncheck all checkboxes
		$(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
		$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
	} else {
		//Check all checkboxes
		$(".mailbox-messages input[type='checkbox']").iCheck("check");
		$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
	}
	$(this).data("clicks", !clicks);
});

//Handle starring for glyphicon and font awesome
$(".mailbox-star").click(function (e) {
	e.preventDefault();
	//detect type
	var $this = $(this).find("a > i");
	var glyph = $this.hasClass("glyphicon");
	var fa = $this.hasClass("fa");

//Switch states
	if (glyph) {
		$this.toggleClass("glyphicon-star");
		$this.toggleClass("glyphicon-star-empty");
	}

	if (fa) {
		$this.toggleClass("fa-star");
		$this.toggleClass("fa-star-o");
	}
});
$('#mail-box').DataTable({
	"paging": true,
	/*"lengthChange": false,
	"searching": false,*/
	"ordering": true,
	"info": true,
	"autoWidth": false
});

</script>
  