<h3><?= $title; ?></h3>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="category"> 
	</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
</form>
