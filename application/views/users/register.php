

<?php echo validation_errors() ?>

<?php echo form_open('users/register') ?>
<div class="d-flex justify-content-center">
	<div class="col-md-4 col-md-offset-4">
		<h3 class="text-center"><?= $title ?></h3>
		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-control" placeholder="E-mail">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="password2" class="form-control" placeholder="Confirm Password">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>	
<?php echo form_close(); ?>
