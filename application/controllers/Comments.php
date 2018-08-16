<?php

	class Comments extends CI_Controller {

		public function create($post_id) {

			$slug = $this->input->post('slug');
			$data['post'] = $this->Post->getPosts($slug);

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('comment', 'Comment', 'required');

			if($this->form_validation->run() === false) {

				$this->load->view('templates/header');
				$this->load->view('posts/view', $data);
				$this->load->view('templates/footer');
			} else {

				$this->Comment->createComment($post_id);
				redirect('posts/' . $slug);
				
			}
			
		}
	}
