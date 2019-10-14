<?php

class User extends CI_Controller
{

	const USER_ROLL = 'user';
	const ADMIN_ROLL = 'admin';

	/**
	 * Check if the user is logged in, if he's not,
	 * send him to the login page
	 * @return void
	 */
	public function index()

	{
		//echo "<pre>";
		//  print_r($this->input->post());
		//echo"<pre>";
		//d print_r($this->session->userdata('is_logged_in'));
		//if($this->session->userdata('is_logged_in')){
		//echo"<pre>";
		// print_r($this->session->userdata);
		// echo"asaszdfgfsdfsd";die;
		//redirect('admin/products');
		//}else{
		$data['main_content'] = 'main_cont';
		$this->load->view('template', $data);
		//}
	}

	function about()
	{
		$data['main_content'] = 'about';
		$this->load->view('template', $data);
	}

	/**
	 * encript the password
	 * @return mixed
	 */
	function __encrip_password($password)
	{
		return md5($password);
	}

	/**
	 * check the username and the password with the database
	 * @return void
	 */
	function validate_credentials()
	{

		//echo "sdsdfsdg";die;

		$this->load->model('Users_model');

		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));

		$user = $this->Users_model->validate($user_name, $password);
//echo "<pre>";
		//print_r($user);
		//echo empty($user);die;

		if (!empty($user)) {
			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true,
				'roll' => $user->roll,
				'user_info' => $user
			);
			$this->session->set_userdata($data);
			//echo"";
			// print_r($this->session->userdata);die;

			if ($user->roll == self::ADMIN_ROLL) {
				redirect('admin/products');

			} else {
				//echo "<pre>";
				//// print_r($data);die;
				redirect('member/profiles');
			}
		} else // incorrect username or password
		{
			//echo "faild";
			$data['message_error'] = TRUE;
			echo "faikld";
			//$this->load->view('about', $data);
		}
	}

	/**
	 * The method just loads the signup view
	 * @return void
	 */
	function signup()
	{
		$this->load->view('admin/signup_form');
	}


	/**
	 * Create new user and store it in the database
	 * @return void
	 */
	function create_member()
	{


		//echo "<pre>";
		//print_r($_POST);
		//{
		$this->load->library('form_validation');
		$this->load->helpers('my_helper');

		//field name, error message, validation rules
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');

			$this->form_validation->set_rules('roll', 'Roll', 'trim|required|valid_roll');

			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

			if ($this->form_validation->run() !== FALSE) {
				$this->load->model('Users_model');
				$this->Users_model->create_user();
				$data['a'] = false;
			} else {
				$data['a'] = true;
			}
		}

		$data['main_content'] = 'main_cont';
		$this->load->view('template', $data);
	}

		//}

		/**
		 * Destroy the session, and logout the user.
		 * @return void
		 */
		function logout()
		{
			$this->session->sess_destroy();
			redirect("user/index");
		}

}
