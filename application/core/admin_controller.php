<?php
class admin_controller extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		if(!$this->session->userdata('is_logged_in') || $this->session->userdata('roll') !='admin'){
			echo"aaaaa";
			// redirect('admin/login');
		}
	}

}
