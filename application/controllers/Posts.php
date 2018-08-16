<?php 

class Posts extends CI_Controller {

	public function index() {
		
		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->Post->getPosts();

		$this->load->view('templates/header');
		$this->load->helper('url');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = null) {
		
		$data['post'] = $this->Post->getPosts($slug);
		$post_id = $data['post']['id'];
		$data['comments'] = $this->Comment->getComments($post_id);
	
		if(empty($data['post'])) {

			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function create() {

		if(!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['title'] = 'Create Post';

		$data['categories'] = $this->Post->getCategories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if($this->form_validation->run() === false) {

			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		} else {

			$this->Post->createPost();
			redirect('posts');
		}		
	}

	public function delete($id) {

		if(!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$this->Post->deletePost($id);
		redirect('posts');
	}

	public function edit($slug) {

		if(!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		if($this->session->userdata('user_id') != $this->Post->getPosts($slug)['user_id']) {
			redirect('posts');
		}

		$data['post'] = $this->Post->getPosts($slug);

		if(empty($data['post'])) {

			show_404();
		}

		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');

	}

	public function update() {

		if(!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$this->Post->updatePost();
		redirect('posts');
	}
}
