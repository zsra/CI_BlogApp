<h3><?= $title; ?></h3>

<div class="container">

	<?php foreach($posts as $post) : ?>

		<h5><?php echo $post['title']; ?></h5>
		<small>Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small>
		<p><?php echo $post['body']; ?><p>
		<p><a href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read more</a></p>

	<?php endforeach; ?>

</div>


