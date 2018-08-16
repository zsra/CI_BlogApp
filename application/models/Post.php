<?php 

class Post extends CI_Model {

	public function __construct() {
		
		$this->load->database();
	}

	public function getPosts($slug = false) {

		if($slug === false) {

			$this->db->order_by('posts.created_at', 'DESC');
			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		$query = $this->db->get_where('posts', array('slug' => $slug));
		return $query->row_array();
	}

	public function createPost() {

		$slug = url_title($this->input->post('title'));

		$data = array(

			'title' => 	$this->input->post('title'),
			'body' =>  $this->input->post('text'),
			'slug' => $slug,
			'category_id' => $this->input->post('category_id'),
			'user_id' => $this->session->userdata('user_id')

		);

		return $this->db->insert('posts', $data);
	}

	public function deletePost($id) {

		$this->db->where('id', $id);
		$this->db->delete('posts');

		return true;
	}

	public function updatePost() {

		$slug = url_title($this->input->post('title'));

		$data = array(

			'title' => 	$this->input->post('title'),
			'body' =>  $this->input->post('text'),
			'slug' => $slug,
			'category_id' => $this->input->post('category_id')

		);

		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('posts', $data);
	}

	public function getCategories() {

		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	public function getPostByCategory($cat_id) {

		$this->db->order_by('posts.created_at', 'DESC');
		$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get_where('posts', array('category_id'=> $cat_id));
			return $query->result_array();
	}

}
