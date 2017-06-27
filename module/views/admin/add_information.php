<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php get_header($folder."header",array('datepicker3')); ?>
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
					<section class="col-lg-6 connectedSortable">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Information</h3>
								<?php echo $this->session->flashdata('success'); ?>
								<span><?php echo isset($hit_response) ? $hit_response : ''; ?></span>
							</div>
							<form  method="POST">
								<div class="box-body">
									<div class="form-group <?php echo isset($vest_no_response) ? 'has-error' : ''; ?>">
										<label for="vest_no">Vest #</label>
										<input type="text" class="form-control" id="vest_no" placeholder="" name="vest_no" value="<?php echo isset($vest_no) ? $vest_no : ''; ?>">
										<span><?php echo isset($vest_no_response) ? $vest_no_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($aspirant_response) ? 'has-error' : ''; ?>">
										<label for="aspirant">Aspirant #</label>
										<input type="text" class="form-control" id="aspirant" placeholder="" name="aspirant" value="<?php echo isset($aspirant) ? $aspirant : ''; ?>">
										<span><?php echo isset($aspirant_response) ? $aspirant_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($batch_response) ? 'has-error' : ''; ?>">
										<label for="batch">Select Batch #</label>
										<select class="form-control" name="batch">
											<?php for ($i=1; $i <=27 ; $i++): ?>
												<option <?php echo (isset($batch) ? $batch == $i : '') ? 'selected' : ''; ?> value="<?php echo $i; ?>"><?php echo 'Batch '.$i; ?></option>
											<?php endfor; ?>
										</select>
										<span><?php echo isset($batch_response) ? $batch_response : ''; ?></span>
									</div>
									<?php if($this->input->get('modify')): ?>
										<div class="form-group <?php echo isset($usertype_response) ? 'has-error' : ''; ?>">
											<label for="batch">Member Type</label>
											<select class="form-control" name="usertype">
												<option <?php echo (isset($usertype) ? $usertype == 'rg' : '') ? 'selected' : ''; ?> value="rg">RG</option>
												<option <?php echo (isset($usertype) ? $usertype == 'aspirant' : '') ? 'selected' : ''; ?> value="aspirant">Aspirant</option>
												<option <?php echo (isset($usertype) ? $usertype == 'ban' : '') ? 'selected' : ''; ?> value="ban">Ban</option>
											</select>
											<span><?php echo isset($usertype_response) ? $usertype_response : ''; ?></span>
										</div>
									<?php endif; ?>
									<div class="form-group <?php echo isset($firstname_response) ? 'has-error' : ''; ?>">
										<label for="firstname">Firstname</label>
										<input type="text" class="form-control" id="firstname" placeholder="" name="firstname" value="<?php echo isset($firstname) ? $firstname : ''; ?>">
										<span><?php echo isset($firstname_response) ? $firstname_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($lastname_response) ? 'has-error' : ''; ?>">
										<label for="lastname">Lastname</label>
										<input type="text" class="form-control" id="lastname" placeholder="" name="lastname" value="<?php echo isset($lastname) ? $lastname : ''; ?>">
										<span><?php echo isset($lastname_response) ? $lastname_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($middlename_response) ? 'has-error' : ''; ?>">
										<label for="middlename">Middlename</label>
										<input type="text" class="form-control" id="middlename" placeholder="" name="middlename" value="<?php echo isset($middlename) ? $middlename : ''; ?>">
										<span><?php echo isset($middlename_response) ? $middlename_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($birthday_response) ? 'has-error' : ''; ?>">
										<label for="birthday">Birthday</label>
										<input type="text" class="form-control" id="birthday" placeholder="" readonly name="birthday" value="<?php echo isset($birthday) ? $birthday : ''; ?>">										<span><?php echo isset($birthday_response) ? $birthday_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($st_address_response) ? 'has-error' : ''; ?>">
										<label for="st_address">Street address</label>
										<input type="text" class="form-control" id="st_address" placeholder="" name="st_address" value="<?php echo isset($st_address) ? $st_address : ''; ?>">
										<span><?php echo isset($st_address_response) ? $st_address_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($city_response) ? 'has-error' : ''; ?>">
										<label for="city">City</label>
										<input type="text" class="form-control" id="city" placeholder="" name="city" value="<?php echo isset($city) ? $city : ''; ?>">
										<span><?php echo isset($city_response) ? $city_response : ''; ?></span>
									</div>
									<div class="form-group <?php echo isset($contact_numberinf_response) ? 'has-error' : ''; ?>">
										<label for="contact_numberinf">Contact Number</label>
										<input type="text" class="form-control" id="contact_numberinf" placeholder="" name="contact_numberinf" value="<?php echo isset($contact_numberinf) ? $contact_numberinf : ''; ?>">
										<span><?php echo isset($contact_numberinf_response) ? $contact_numberinf_response : ''; ?></span>
									</div>
									<div class="box box-danger">
										<div class="box-header with-border">
											<h3 class="box-title">Incase of Emergency Contact</h3>
										</div>
										<div class="box-body">
											<div class="form-group <?php echo isset($contact_name_response) ? 'has-error' : ''; ?>">
												<label for="contact_name">Name</label>
												<input type="text" class="form-control" id="contact_name" placeholder="" name="contact_name" value="<?php echo isset($contact_name) ? $contact_name : ''; ?>">
												<span><?php echo isset($contact_name_response) ? $contact_name_response : ''; ?></span>
											</div>
											<div class="form-group <?php echo isset($contact_number_response) ? 'has-error' : ''; ?>">
												<label for="contact_number">Number</label>
												<input type="text" class="form-control" id="contact_number" placeholder="" name="contact_number" value="<?php echo isset($contact_number) ? $contact_number : ''; ?>">
												<span><?php echo isset($contact_number_response) ? $contact_number_response : ''; ?></span>
											</div>
											<div class="form-group <?php echo isset($contact_address_response) ? 'has-error' : ''; ?>">
												<label for="contact_address">Address</label>
												<input type="text" class="form-control" id="contact_address" placeholder="" name="contact_address" value="<?php echo isset($contact_address) ? $contact_address : ''; ?>">
												<span><?php echo isset($contact_address_response) ? $contact_address_response : ''; ?></span>
											</div>
											<div class="form-group <?php echo isset($relation_response) ? 'has-error' : ''; ?>">
												<label for="relation">Relation</label>
												<input type="text" class="form-control" id="relation" placeholder="" name="relation" value="<?php echo isset($relation) ? $relation : ''; ?>">
												<span><?php echo isset($relation_response) ? $relation_response : ''; ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer">
									 <input type="submit" class="btn btn-primary" name="submit" value="Submit">
								</div>
							</form>
						</div>
					</section>
					<section class="col-lg-6 connectedSortable">
						
					</section>
				</div>
			</section>
				<!-- /.content -->
		</div>
<?php get_footer($folder."footer",array('bootstrap-datepicker')); ?>
<script type="text/javascript">
$('#birthday').datepicker({
	format:'M dd, yyyy'
	});</script>

  