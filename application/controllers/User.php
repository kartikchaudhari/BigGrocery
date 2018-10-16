<?php
class User extends My_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(['UsersModel','ProductsModel','OrderModel']);
	}

	public function index(){
		if ($this->session->userdata('bg_sys_ss_user_id')) {
			return redirect('user/dashboard');	
		}
		else{
			$this->session->set_flashdata('bg_sys_msg','<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
			return redirect('user/login');
		}
	}

	public function dashboard(){
		if ($this->session->userdata('bg_sys_ss_user_id')) {
			$this->load->view('customer/dashboard');	
		}
		else{
			$this->session->set_flashdata('bg_sys_msg','<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
			return redirect('user/login');
		}
	}


	/*
		View Loading methods
	 */
	public function register(){
	    $this->load->view('customer/register');
	}

	public function login(){
	    $this->load->view('customer/login');
	}

	public function order_history(){
		if ($this->session->userdata('bg_sys_ss_user_id')) {
			$this->load->view('order/list',['order_history_data'=>$this->getUserOrderList($this->session->userdata('bg_sys_ss_user_id'))]);	
		}
		else{
			return redirect('user/login');
		}
		
	}

	public function shipping(){
		$this->load->view('customer/shipping');
	}





	/*
		Data getter methods
		used to pass the fetched data from db to view
	 */
	public function wishlist($UserId=null){
		if ($this->session->userdata('bg_sys_ss_user_id')) {
			$UserId=$this->session->userdata('bg_sys_ss_user_id');
			$data=$this->ProductsModel->returnWishListProducts($UserId);
			$this->load->view('customer/wishlist',['wishlist_products'=>$data]);
		}
		else{
			return redirect('user/login');
		}

	}

	public function getUserOrderList($UserId){
		$this->load->model('OrderModel');
		return $this->OrderModel->getOrderListByUserId($UserId);
	}


	/*
	*	user registration action
	 */
	public function register_user(){
		if ($this->input->post()) {
			if($this->UsersModel->InsertUserData($this->input->post())){
				$this->session->set_flashdata('bg_sys_msg', '<button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>Congatulations! You are successfully registerd. click <a href="login">here</a> to login.');
					return redirect('user/register');

			}
		}
		else{
			show_404("");
		}
	}

	/*
	* user login action
	 */
	
	public function login_user(){
		$info=array(
					'uname'=>$this->input->post('uname'),
					'pass'=>md5($this->input->post('password'))
				);
		//get user id
		$user_id=$this->UsersModel->FetchLoginInfo($info);

		if ($user_id) {
			$this->session->set_userdata('bg_sys_ss_user_id',$user_id);
			return redirect('user');
		}
		else{
			$this->session->set_flashdata('bg_sys_msg','<div class="alert alert-danger" role="alert">
					<strong>Invalid username or password, please retry below.</strong> 
				</div>');
			return redirect('user/login');
		}


	}

	/*
		User logout
	 */
	public function logout(){
		$this->session->sess_destroy();
		return redirect('home');
	}

}
?>