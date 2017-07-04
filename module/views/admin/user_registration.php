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
					<!-- Left col -->
					<form  method="POST">
						<section class="col-lg-12">
							<?php echo $this->session->flashdata('success'); ?>
							
						</section>
						<section class="col-lg-6 ">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Information</h3>
									<span><?php echo isset($hit_response) ? $hit_response : ''; ?></span>
								</div>
								
									<div class="box-body">
										<div class="form-group <?php echo isset($user_response) ? 'has-error' : ''; ?>">
											<label for="batch">User Information</label>
											<?php 
													
												if($cquery):

											?>
												<select class="form-control rg-info" name="user" <?php if($cquery){ echo 'multiple="multiple"';} ?> <?php echo isset($moded) ? 'disabled' : ''; ?>>
													
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
										<div class="form-group <?php echo isset($password_response) ? 'has-error' : ''; ?>">
											<label for="st_address">Password</label>
											<input type="password" class="form-control" id="st_address" placeholder="" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
											<span><?php echo isset($password_response) ? $password_response : ''; ?></span>
										</div>
										<div class="form-group <?php echo isset($vpassword_response) ? 'has-error' : ''; ?>">
											<label for="st_address">Verify Password</label>
											<input type="password" class="form-control" id="st_address" placeholder="" name="vpassword" value="<?php echo isset($vpassword) ? $vpassword : ''; ?>">
											<span><?php echo isset($vpassword_response) ? $vpassword_response : ''; ?></span>
										</div>
										<div class="form-group <?php echo isset($usertype_response) ? 'has-error' : ''; ?>">
											<label for="batch">User Role</label>
											<select class="form-control" name="usertype">
												<?php if ($this->session->userdata('count') <= 0): ?>
													<?php if($this->session->userdata('count') == 0): ?>
														<option <?php echo (isset($usertype) ? $usertype == '0' : '') ? 'selected' : ''; ?> value="0">Super Admin</option>
														<option <?php echo (isset($usertype) ? $usertype == '1' : '') ? 'selected' : ''; ?> value="1">Admin</option>
														<option <?php echo (isset($usertype) ? $usertype == '2' : '') ? 'selected' : ''; ?> value="2">Moderator</option>
													<?php endif; ?>
												<?php endif ?>
												<option <?php echo (isset($usertype) ? $usertype == '3' : '') ? 'selected' : ''; ?> value="3">Rg's</option>
											</select>
											<span><?php echo isset($usertype_response) ? $usertype_response : ''; ?></span>
										</div>
										<div class="form-group <?php echo isset($userstatus_response) ? 'has-error' : ''; ?>">
											<label for="batch">User Status</label>
											<select class="form-control" name="userstatus">
												<option <?php echo (isset($userstatus) ? $userstatus == 'Active' : '') ? 'selected' : ''; ?> value="Active">Active</option>
												<option <?php echo (isset($userstatus) ? $userstatus == 'Pending' : '') ? 'selected' : ''; ?> value="Pending">Pending</option>
												<option <?php echo (isset($userstatus) ? $userstatus == 'Ban' : '') ? 'selected' : ''; ?> value="Ban">Ban</option>
											</select>
											<span><?php echo isset($userstatus_response) ? $userstatus_response : ''; ?></span>
										</div>
									</div>
									<div class="box-footer">
										 <input type="submit" class="btn btn-primary" name="submit" value="Submit">
									</div>
								
							</div>
						</section>
						<section class="col-lg-6 connectedSortable">
						<div class="box box-primary box-solid">
							<div class="box-header  with-border">
								<h3 class="box-title">User List</h3>
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
											<th>User Type / Status</th>
											<?php #if($this->session->userdata('count') == 1): ?>
												<th width="30%"></th>
											<?php #endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php 

											$uq = QModel::query("SELECT * FROM user WHERE usertype <= '3'");
											$cq = QModel::c($uq);

											if( ! $cq):
										?>
										<tr>
											<td></td>
											<td>No Records Found !</td>
											<td></td>
											<td></td>
										</tr>
									<?php else: ?>
										<?php
												foreach (QModel::g($uq, TRUE) as $ug):
													$usertype = '';
													switch ($ug['usertype']) {
														case 0:
															$usertype = 'Super Admin';
															break;
														case 1:
															$usertype = 'Admin';
															break;
														case 2:
															$usertype = 'Moderator';
															break;
														default:
															$usertype = "RG";
															break;
													}

													$iq = QModel::sfwa('information','unique_id',$ug['unique_id']);
													$ic = QModel::c($iq);
													if($ic) {
														$ig = QModel::g($iq);
														$vest_no = $ig['vest_no'];
														$fullname = $ig['lastname'].' , '.$ig['firstname'].' '.$ig['middlename'];
														$batch = 'Batch '.$ig['batch'];
														$unique_id = $ig['unique_id'];
													}
													else{
														$vest_no = '0000';
														$fullname = 'User not found';
														$batch = '??';
													}
													
										?>
										<tr>
											<td><?php echo $vest_no; ?></td>
											<td><?php echo $fullname; ?></td>
											<td><?php echo $usertype.' / '.$ug['status']; ?></td>
											<?php if($this->session->userdata('count') <= 1): ?>
												<td>
													<a href="<?php echo base_url('admin/registration?controller=user&f=modify&who='.$unique_id); ?>"><i class="fa fa-pencil-square fa-lg" aria-hidden="true" ></i> Edit</a>
													| 
													<a href="<?php echo base_url('admin/registration?modify=yes&who='.$unique_id); ?>"><i class="fa fa-ban fa-lg" aria-hidden="true" ></i> Delete</a>
												</td>
											<?php else: ?>
												<td></td>
											<?php endif; ?>
										</tr>
										<?php endforeach; endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</section>
					</form>
				</div>
			</section>
				<!-- /.content -->
		</div>
<?php get_footer($folder."footer",array('jquery.dataTables.min','dataTables.bootstrap')); ?>
<script type="text/javascript">
<?php if($cquery): ?>
	$(".rg-info").select2({
		theme: "classic",
		maximumSelectionLength: 1
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
  