<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php get_header("header"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<div class="panel panel-default nobords">
					<div class="panel-heading"><h4>Latest Share</h4></div>
					<div class="panel-body"><a href="javascript:void(0);" data-toggle="tooltip" title="Hooray!" data-placement="bottom">Title</a></div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-primary">
				    	<div class="panel-heading"><b>Form</b></div>
				    	<div class="panel-body">
				    		<form class="form-horizontal" role="form" method="POST">
				    			<div class="col-md-12 text-center" style="margin-bottom:20px;">
				    				<span><?php echo $this->session->flashdata('success'); ?></span>
				    				<label class="radio-inline"><input type="radio" name="st_type" value="tcu"  onclick="hide_show(this.value)" <?php echo (isset($st_type) ? $st_type == "tcu" : '') ? 'checked' : ''; ?>>TCU Student</label>
									<label class="radio-inline"><input type="radio" name="st_type" value="others" onclick="hide_show(this.value)" <?php echo (isset($st_type) ? $st_type == "others" : '') ? 'checked' : ''; ?>>Others</label>
				    			</div>
								<div id="tcu">
									<div class="col-md-12 text-center" style="padding-bottom:20px;">
										<span class="notice"><i class="fa fa-exclamation-circle"></i>&nbsp; *Please enter a valid Student Number or else your Story will not be posted.</span>
									</div>
									<div class="form-group <?php echo isset($st_number_response) ? 'has-error' : ''; ?>">
										<label class="control-label col-sm-3" for="Student Number"><a href="javascript:void(0);" data-toggle="tooltip" title="For Security purpose!"><i class="fa fa-question-circle"></i></a> Student Number :</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="student_number" name="st_number" value="<?php echo isset($st_number) ? $st_number : ''; ?>" placeholder="Enter Student number">
								    		<span><?php echo isset($st_number_response) ? $st_number_response : ''; ?></span>
								    	</div>
								  	</div>
								  	<div class="form-group <?php echo isset($st_title_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Title :</label>
									    <div class="col-sm-8"> 
									    	<input type="text" class="form-control" id="title" name="st_title" value="<?php echo isset($st_title) ? $st_title : ''; ?>" placeholder="Enter title">
									    	<span><?php echo isset($st_title_response) ? $st_title_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($st_content_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Content :</label>
									    <div class="col-sm-8"> 
									    	<textarea class="form-control text-me" rows="5" id="comment" name="st_content" placeholder="Enter content"><?php echo isset($st_content) ? $st_content : ''; ?></textarea>
									    	<span><?php echo isset($st_content_response) ? $st_content_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($st_number_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Screen name :</label>
									    <div class="col-sm-8"> 
									    	<input type="text" class="form-control" id="title" name="st_screen" value="<?php echo isset($st_screen) ? $st_screen : ''; ?>" placeholder="Enter screen name">
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($st_batch_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Batch :</label>
									    <div class="col-sm-8"> 
									    	<select class="form-control" id="sel1" name="st_batch">
									    	
									    	<option value="">- Please Select Batch -</option>
												<?php 
													for ($i = date("Y"); $i >= 2006; $i--):
												?>
													<option <?php echo (isset($st_batch) ? $st_batch == $i : '') ? 'selected' : ''; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
											<span><?php echo isset($st_batch_response) ? $st_batch_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($st_college_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">College :</label>
									    <div class="col-sm-8"> 
									    	<select class="form-control" id="sel1" name="st_college">
									    	<option value="">- Please Select College -</option>
												<?php 
													$college = array('College of Criminology','College of Education','College of Hotel and Tourism Management','College of Engineering, Technology and Computer Science','College of Business Management','College of Arts and Sciences'); ?>
													<?php foreach($college as $st_col): ?>
														<option <?php echo (isset($st_college) ? $st_college == $st_col : '') ? 'selected' : $st_col; ?> value="<?php echo $st_col; ?>"><?php echo $st_col; ?></option>
													<?php endforeach; ?>
											</select>
											<span><?php echo isset($st_college_response) ? $st_college_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($st_number_response) ? 'has-error' : ''; ?>"> 
								    	<div class="col-sm-offset-5 col-sm-8">
								      		<button type="submit" name="submit" value="submit" class="btn btn-default hvr-fade">Submit</button>
								    	</div>
								  	</div>
								</div>
								<div id="others">
									<div class="form-group <?php echo isset($sto_email_response) ? 'has-error' : ''; ?>">
										<label class="control-label col-sm-3" for="Student Number"><a href="javascript:void(0);" data-toggle="tooltip" title="For Security purpose!"><i class="fa fa-question-circle"></i></a>Email Address:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="student_number" name="sto_email" value="<?php echo isset($sto_email) ? $sto_email : ''; ?>" placeholder="Enter Email Address">
								    		<span><?php echo isset($sto_email_response) ? $sto_email_response : ''; ?></span>
								    	</div>
								  	</div>
								  	<div class="form-group <?php echo isset($sto_title_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Title :</label>
									    <div class="col-sm-8"> 
									    	<input type="text" class="form-control" id="title" name="sto_title" value="<?php echo isset($sto_title) ? $sto_title : ''; ?>" placeholder="Enter title">
									    	<span><?php echo isset($sto_title_response) ? $sto_title_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($sto_content_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Content :</label>
									    <div class="col-sm-8"> 
									    	<textarea class="form-control text-me" rows="5" id="comment" name="sto_content" placeholder="Enter content"><?php echo isset($sto_content) ? $sto_content : ''; ?></textarea>
									    	<span><?php echo isset($sto_content_response) ? $sto_content_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($sto_screen_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Screen name :</label>
									    <div class="col-sm-8"> 
									    	<input type="text" class="form-control" id="title" name="sto_screen" value="<?php echo isset($sto_screen) ? $sto_screen : ''; ?>" placeholder="Enter screen name">
									    	<span><?php echo isset($sto_screen_response) ? $sto_screen_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($sto_batch_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">Batch :</label>
									    <div class="col-sm-8"> 
									    	<select class="form-control" id="sel1" name="sto_batch">
									    	<option value="">- Please Select Batch -</option>
												<?php 
													for ($i = date("Y"); $i >= 2006; $i--):
												?>
													<option <?php echo (isset($sto_batch) ? $sto_batch == $i : '') ? 'selected' : ''; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
													<option value="others">Others</option>
											</select>
									   		<span><?php echo isset($sto_batch_response) ? $sto_batch_response : ''; ?></span> 
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($sto_college_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">College :</label>
									    <div class="col-sm-8"> 
									    	<select class="form-control" id="sel1" name="sto_college">
									    	<option value="">- Please Select College -</option>
												<?php 
													$college = array('College of Criminology','College of Education','College of Hotel and Tourism Management','College of Engineering, Technology and Computer Science','College of Business Management','College of Arts and Sciences'); ?>
													<?php foreach ($college as $st_col): ?>
														<option <?php echo (isset($sto_college) ? $sto_college == $st_col : '') ? 'selected' : $st_col; ?> value="<?php echo $st_col; ?>"><?php echo $st_col; ?></option>
													<?php endforeach; ?>
														<option value="others">Others</option>
											</select>
											<span><?php echo isset($sto_college_response) ? $sto_college_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group <?php echo isset($sto_school_response) ? 'has-error' : ''; ?>">
								    	<label class="control-label col-sm-3" for="title">School/University :</label>
									    <div class="col-sm-8"> 
									    	<input type="text" class="form-control" id="title" name="sto_school" value="<?php echo isset($sto_school) ? $sto_school : ''; ?>" placeholder="Enter your school">
									    	<span><?php echo isset($sto_school_response) ? $sto_school_response : ''; ?></span>
									    </div>
								  	</div>
								  	<div class="form-group"> 
								    	<div class="col-sm-offset-5 col-sm-8">
								      		<button type="submit" name="submit" value="submit" class="btn btn-default hvr-fade">Submit</button>
								    	</div>
								  	</div>
								</div>  	
							</form>
				    	</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer("footer"); ?>
<script type="text/javascript">
hide_show('<?php echo isset($st_type) ? $st_type : ''; ?>');
	function hide_show(value)
	{
		var tcu = document.getElementById('tcu');
		var others = document.getElementById('others');
		if(value == 'tcu')
		{
			tcu.style.display = "block";
			others.style.display = "none";
		}
		else if(value == 'others')
		{
			tcu.style.display = "none";
			others.style.display = "block";
		}
		else
		{
			tcu.style.display = "none";
			others.style.display = "none";
		}
	}
</script>

  