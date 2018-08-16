<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"  href="https://bootswatch.com/4/sandstone/bootstrap.css">
	<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">CiBlog</a>

  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>categories">Category</a>
      </li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<?php if($this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</span></a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</span></a>
      </li>
			<li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Sign Out</span></a>
      </li>
			<?php endif; ?>
			<?php if(!$this->session->userdata('logged_in')) : ?>
			<li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Sign Up</span></a>
      </li>
			<li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Sign In</span></a>
      </li>
			<?php endif; ?>
	</ul>
  </div>
</nav>
<br>
<div class="container">

<?php if($this->session->flashdata('user_registered')) : ?>
	<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')) : ?>
	<?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('user_registered')) : ?>
	<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('user_loggedout')) : ?>
	<?php echo '<p class="alert alert-warning">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
<?php endif; ?>
