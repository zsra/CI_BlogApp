<?php

class Categories extends CI_Controller {

	public function index() {

		$data['title'] = 'Categories';

		$data['categories'] = $this->Category->getCategories();

		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');
	}

	public function create() {

		if(!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		if($this->session->userdata('user_id') != $this->Post->getPosts($slug)['user_id']) {
			redirect('posts');
		}

		$data['title'] = 'Create category';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if($this->form_validation->run() === false) {

			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Category->createCategory();
			redirect('categories');
		}
	}

	public function posts($id) {
		
		$data['title'] = $this->Category->getCategory($id)->name;	

		$data['posts'] = $this->Post->getPostByCategory($id);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');

	}
}
