<br>
<?php echo form_open('users/login'); ?>
<div class="d-flex justify-content-center">
	<div class="col-md-4 col-md-offset-4">
		<h3 class="text-center"><?php echo $title; ?></h3><br>
		<div class="form-group">
			<input class="form-control" type="text" name="username" placeholder="Enter Username" required autofocus>
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="password" placeholder="Enter Password" required autofocus>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Sign In</button>
	</div>
</div>
	
<?php echo form_close(); ?>
