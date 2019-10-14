<?php

class Member_model extends CI_Model
{

	/**
	 * Responsable for auto load the database
	 * @return void
	 */
	public function __construct()
	{
		$this->load->database(); //ete autoloadum graca linum database, sa karox enq commentel
	}

	/**
	 * Get product by his is
	 * @param int $product_id
	 * @return array
	 */
	public function get_products_count($user_id)
	{

		$this->db->select("COUNT('*') as myCount");
		$this->db->from('user_products');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		return $query->row();

	}
	public function get_user_info($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Update product
	 * @param array $data - associative array with data to store
	 * @return boolean
	 */
	function update_member($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if ($report !== 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Fetch products data from the database
	 * possibility to mix search, filter and order
	 * @param int $manufacuture_id
	 * @param string $search_string
	 * @param strong $order
	 * @param string $order_type
	 * @param int $limit_start
	 * @param int $limit_end
	 * @return array
	 */
	public function get_products()
	{

		$this->db->select('products.id');
		$this->db->select('products.description');
		$this->db->select('products.stock');
		$this->db->select('products.cost_price');
		$this->db->select('products.sell_price');
		$this->db->from('products');


		// $this->db->join('users', 'products.id = manufacturers.id', 'left');
		//$this->db->join('categories', 'products.category_id = categories.id', 'left');

//        $this->db->group_by('products.id');
//
//        if ($order) {
//            $this->db->order_by($order, $order_type);
//        } else {
//            $this->db->order_by('id', $order_type);
//        }
//
//
//        $this->db->limit($limit_start, $limit_end);
//        //$this->db->limit('4', '4');


		$query = $this->db->get();

		return $query->result_array();
	}

	public function bag($product_id,$user_id, $value) {

		$this->db->select();
		$this->db->from('user_products');
		$this->db->where('product_id',$product_id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		$result = $query->result_array();
		//  echo "<pre>";
		//  print_r($result);die;
		if(count($result)) {
			$this->db->where('product_id',$product_id);
			$this->db->where('user_id',$user_id);
			return $this->db->update('user_products',['count'=>$value+$result[0]['count']]);
		} else {
			return $this->db->insert('user_products', ['user_id' => $user_id, 'product_id' => $product_id, 'count' => $value]);
		}

	}

	/**
	 * Count the number of rows
	 * @param int $manufacture_id
	 * @param int $search_string
	 * @param int $order
	 * @return int
	 */
	function count_products($manufacture_id = null, $search_string = null, $order = null)
	{
		$this->db->select('*');
		$this->db->from('products');
		if ($manufacture_id != null && $manufacture_id != 0) {
			$this->db->where('manufacture_id', $manufacture_id);
		}
		if ($search_string) {
			$this->db->like('description', $search_string);
		}
		if ($order) {
			$this->db->order_by($order, 'Asc');
		} else {
			$this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();
	}

	/**
	 * Store the new item into the database
	 * @param array $data - associative array with data to store
	 * @return boolean
	 */
	function store_product($data)
	{
		$insert = $this->db->insert('products', $data);
		return $insert;
	}



	/**
	 * Delete product
	 * @param int $id - product id
	 * @return boolean
	 */
	function delete_product($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('products');
	}

	public function getMemberProducts($user_id){

		$this->db->select('UP.*, products.*');
		$this->db->from('user_products as UP');
		$this->db->join('products','products.id = UP.product_id','left');
		$this->db->where('UP.user_id',(int)$user_id);

		$query= $this->db->get();
		// print_r($this->db->last_query());die;
		// var_dump( $query, $user_id);die;
		$result = $query->result_array();
		return $result;

	}

}

