<?php

    class Comment extends CI_Model {

		public function __construct() {

			$this->load->database();
		}

		public function createComment($post_id) {

			$data = array(

				'post_id' => $post_id,
				'name' => $this->input->post('name'),
				'body' => $this->input->post('comment'), 
			);

			return $this->db->insert('comments', $data);
		}

		public function getComments($post_id) {

			$query = $this->db->get_where('comments', array('post_id' => $post_id));
			return $query->result_array();
		}

	}
