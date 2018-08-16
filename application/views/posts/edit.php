<h3><?= $title; ?></h3>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">	
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Text</label>
    <textarea class="form-control" name="text" id="editor"><?php echo $post['body']; ?></textarea>
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
  </div>
  <button type="submit" class="btn btn-default">Submit</button>	
</form>
