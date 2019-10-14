<?php
class Member extends CI_Controller {
	//public $products_count = 0;
	public $data = [];
	public function __construct() {
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('products_model');
		$this->data['products_count'] =$this->member_model-> get_products_count($this->session->userdata('user_info')->id);

	}

	public function profiles() {
		//  echo"dfsdfsdf";
		//$this->load->view('member/profiles');
		$config['per_page'] = 5;
		$config['base_url'] = base_url().'admin/products';
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';

		//limit end
		$page = $this->uri->segment(3);
		$limit_end = ($page * $config['per_page']) - $config['per_page'];
		if ($limit_end < 0){
			$limit_end = 0;
		}

		$this->data['all_products'] = $this->products_model->get_products(NULL, NULL, NULL, 'Asc', $config['per_page'],$limit_end);
		//echo "<pre>";
		//print_r($data['all_products']);

		$this->data['main_content'] = 'member/profiles/index';

		$this->data['user_info'] = $this->member_model->get_user_info($this->session->userdata('user_info')->id);
		$this->data['products']  = $this->products_model->get_product_by_id($this->session->userdata('user_info')->id);
		$this->data['myproduct'] = $this->member_model->getMemberProducts($this->session->userdata('user_info')->id);
		//  $this->data['products_count'] = $this->products_count;
		//echo "<pre>";
		//print_r( $asdasdas['user_info']); die;

		$this->data['main_content'] = 'member/profiles/index';
		$this->load->view('template', $this->data);


		// member folfer profile php mehy cuyc enq talis login exav uderi info
		//uder tabeli mej roll sarqecinq
		//useri registrationi mej select bocx kam admin kam user
		//bazayum registrationic heto pahum enq rolly kam admin kam user
		//user contriolleri mej avelacrecinq stugum yst rolli
		//users modeli mej popoxutyunner enq arel vor rolly inset ani
		//tan@  stugeluc heto


	}
	public function allproductview() {
		$this->data['main_content'] = 'product';
		$this->load->view('template', $this->data);
	}
	public function singleproduct() {
		$this->data['main_content'] = 'single';
		$this->load->view('template', $this->data);
	}


	public function allproducts()

	{
		$config['per_page'] = 5;
		$config['base_url'] = base_url().'admin/products';
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';

		//limit end
		$page = $this->uri->segment(3);

		//math to get the initial record to be select in the database
		$limit_end = ($page * $config['per_page']) - $config['per_page'];
		if ($limit_end < 0){
			$limit_end = 0;
		}

		$this->data['all_products'] = $this->products_model->get_products(NULL, NULL, NULL, 'Asc', $config['per_page'],$limit_end);
		//echo "<pre>";
		//print_r($data['all_products']);

		$this->data['main_content'] = 'member/profiles/index';
		$this->load->view('template', $this->data);


	}

	public function myproduct()

	{

		$this->data['myproduct'] = $this->member_model->getMemberProducts($this->session->userdata('user_info')->id);
		$this->data['main_content'] = 'member/profiles/index';
		$this->load->view('template', $this->data);
	}


	public function buy($product_id, $value) {

		$user_id = $this->session->userdata('user_info')->id;
		//$myproduct = $this->products_model->getMemberProducts($product_id);
		$this->member_model->bag($product_id,$user_id, $value);
		//echo "<pre>";
		// print_r($myproduct);die;
		//echo $user_id; die;
		// echo"<pre>";

		//  print_r($myproduct); die;

//        if ($value >1) {
//            foreach($value as $row) {
//                $this->member_model->bag($product_id,$user_id);
//            }
//        }  else {
//            $this->member_model->bag($product_id,$user_id);
		// }
		redirect('member/allproducts');
	}



	public function update()
	{

		//product id
		// $id = $this->uri->segment(4);

		$id = $this->session->userdata('user_info')->id;
		//if save button was clicked, get the data sent via post

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{

			//form validation
			$this->form_validation->set_rules('first_name', 'first_name', 'required');
			$this->form_validation->set_rules('last_name', 'last_name', 'required');
			$this->form_validation->set_rules('user_name', 'user_name', 'required');

			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			//if the form has passed through the validation
			if ($this->form_validation->run())
			{

				$data_to_store = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email_addres' => $this->input->post('email'),
					'user_name' => $this->input->post('user_name')
				);


				//if the insert has returned true then we show the flash message
				if($this->member_model->update_member($id, $data_to_store) == TRUE){
					//echo "sgdfgh,krughbsd,jgfs,jdgf";
					$this->session->set_flashdata('flash_message', 'updated');
				}else{
					$this->session->set_flashdata('flash_message', 'not_updated');
				}
				redirect('member/profiles');


			}//validation run


		}




	}//update



}
