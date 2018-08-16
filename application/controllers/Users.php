<?php 

	class Users extends CI_Controller {		

		public function register() {

			$data['title'] = "Sign up";

			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Password2', 'matches[password]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				
				$en_pass = md5($this->input->post('password'));
				$this->User->registerUser($en_pass);

				$this->session->set_flashdata('user_registered', 'You are now registered');

				redirect('posts');
			}
			
		}

		public function check_username_exists($username) {

			$this->form_validation->
				set_message('check_username_exists',
				 'That username is taken. Please choose a different one');

			if($this->User->check_username_exists($username)) {
				return true;
			} else {
				return false;
			}
			
		}

		public function check_email_exists($email) {

			$this->form_validation->
				set_message('check_email_exists',
				 'That email is taken. Please choose a different one');

			$this->session->set_flashdata('login_failed', 'Login invalid!');
			
		}

		public function login() {

			$data['title'] = "Sign In";

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				$username = $this->input->post('username');
				$pass = md5($this->input->post('password'));
				$user_id = $this->User->login($username, $pass);
				
				if($user_id) {

					$user_data = array(

						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_loggedin', 'You are now logged in!');
					redirect('posts');

				} else {

					$this->session->set_flashdata('login_failed', 'Login invalid!');
					redirect('users/login');
				}
				
			}
			
		}

		public function logout() {

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			
			$this->session->set_flashdata('user_loggedout', 'Your are now logged out');
			redirect('users/login');
		}
	}
