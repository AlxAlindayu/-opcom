<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php get_header($folder."header"); ?>
<div class="container">
	<div class="col-md-12">
		<div class="col-md-offset-3">
			<div class="col-md-8">
				<div class="rg-login-box">
					<div class="panel-group">
						<div class="panel panel-primary rg-login-panel">
							<div class="panel-heading text-center">
								<span class="rg-login-title">Login - RG Community(Admin)</span>
							</div>
							<div class="panel-body rg-panel-body">
								<form method="POST">
									<div class="form-group <?php echo isset($username_response) ? 'has-error' : '' ; ?>">
										<input type="text" class="form-control" name="username" value="<?php echo isset($username) ? $username : '' ; ?>" placeholder="Username">
										<span><?php echo isset($username_response) ? $username_response : '' ; ?></span>
									</div>
									<div class="form-group <?php echo isset($password_response) ? 'has-error' : '' ; ?>">
										<input type="password"  class="form-control" name="password" value="<?php echo isset($password) ? $password : '' ; ?>" placeholder="Password">
										<span><?php echo isset($password_response) ? $password_response : '' ; ?></span>
										<span><?php echo isset($general_response) ? $general_response : '' ; ?></span>
									</div>
									<div class="col-md-12">
										<div class="row">
											<button class="btn btn-default hvr-fade rg-hvr rg-login-button" name="submit" >Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer($folder."footer"); ?>


  