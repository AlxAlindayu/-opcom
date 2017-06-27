<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php get_header($folder."header",array('dataTables.bootstrap')); ?>
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
						<div class="box box-primary box-solid">
							<div class="box-header  with-border">
								<h3 class="box-title">RG List</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>	
							<div class="box-body">
								<table id="rgtable" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Vest #</th>
											<th>Name</th>
											<th>Batch</th>
											<?php #if($this->session->userdata('count') == 1): ?>
												<th></th>
											<?php #endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php 

											$query = QModel::sf("information");
											$cquery = QModel::c($query);

											if( ! $cquery):
										?>
										<tr>
											<td>No Records Found !</td>
										</tr>
									<?php else: ?>
										<?php
												foreach (QModel::g($query, TRUE) as $g):
													$vest_no = $g['vest_no'];
													$fullname = $g['lastname'].' , '.$g['firstname'].' '.$g['middlename'];
													$batch = 'Batch '.$g['batch'];
													$unique_id = $g['unique_id'];
										?>
										<tr>
											<td><?php echo $vest_no; ?></td>
											<td><?php echo $fullname; ?></td>
											<td><?php echo $batch; ?></td>
											<?php #if($this->session->userdata('count') == 1): ?>
												<td>
													<a href="<?php echo base_url('admin/registration?modify=yes&who='.$unique_id); ?>"><i class="fa fa-pencil-square fa-lg" aria-hidden="true" ></i> Edit</a>
													| 
													<a href="<?php echo base_url('admin/registration?modify=yes&who='.$unique_id); ?>"><i class="fa fa-ban fa-lg" aria-hidden="true" ></i> Delete</a>
												</td>

											<?php #endif; ?>
										</tr>
										<?php endforeach; endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
					<section class="col-lg-6 connectedSortable">
						
					</section>
				</div>
			</section>
				<!-- /.content -->
		</div>
<?php get_footer($folder."footer",array('jquery.dataTables.min','dataTables.bootstrap')); ?>
<script type="text/javascript">
	$('#rgtable').DataTable({
      "paging": true,
      /*"lengthChange": false,
      "searching": false,*/
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
</script>