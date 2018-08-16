<h3><?= $title; ?></h3>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label>Category</label>
    	<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>	
				<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></options>
			<?php endforeach; ?>
		</select>
  	</div>
  <div class="form-group">
    <label>Text</label>
    <textarea class="form-control" name="text" placeholder="Text" id="editor"></textarea>
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
