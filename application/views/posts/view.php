<h3><?php echo $post['title'] ?></h3>

<div class="container">
	<?php echo $post['body']; ?><hr>
	<small>Posted on: <?php echo $post['created_at']; ?></small>

	<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
		<?php echo form_open('posts/delete/'. $post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-warning">
		<a class="btn btn-primary" href="edit/<?php echo $post['slug']; ?>">Edit</a>
		</form>
	<?php endif; ?>
	
		<br>
		<h4>Comments</h4>
		<hr>
		<?php if($comments) : ?>
			<?php foreach($comments as $comment) : ?>
					<h7><strong><?php echo $comment['name'] ?></strong> - <small> commented on 
					<?php echo $comment['created_at'] ?></small></h7>
					<div class="container">
						<?php echo $comment['body'] ?>
					</div> 
					<hr>
			<?php endforeach; ?>
		<?php else : ?>
			<p>No Comments to display<p>
			<hr>
		<?php endif; ?>

		<h4>Add Comment</h4>
		<div class="container">
			<?php echo validation_errors(); ?>
				<?php echo form_open('comments/create/'. $post['id']); ?>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Comment</label>
						<textarea class="form-control" name="comment" placeholder="Text" id="editor"></textarea>
						<script>
							ClassicEditor
							.create( document.querySelector( '#editor' ) )
							.then( editor => {
								console.log( editor );
							} )
								.catch( error => {
								console.error( error );
							} );
		</script>
						<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
						<br>
						<button class="btn btn-secondary" type="submit" value="submit">Submit</button>
					</div> 
				</form>
			</div>
		</div>
</div>
	

