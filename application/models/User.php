<?php 

	class User extends CI_Model {

		public function registerUser($en_pass) {

			$data = array(

				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $en_pass,

			);

			return $this->db->insert('users', $data);
		}

		public function check_username_exists($username) {

			$query = $this->db->get_where('users', array('username' => $username));
			if(empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}

		public function check_email_exists($email) {

			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}

		public function login($username, $pass) {

			$this->db->where('username', $username);
			$this->db->where('password', $pass);
			$result = $this->db->get('users');

			if($result->num_rows() == 1) {
				return $result->row(0)->id;
			} else {
				return false;
			}

		}

	}
