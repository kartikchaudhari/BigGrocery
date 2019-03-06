<?php
class User extends My_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model(['UsersModel','ProductsModel','OrderModel']);
		 $this->load->library("pagination");
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

			$userId=$this->session->userdata('bg_sys_ss_user_id');
			$data=array('usr_wish_list_count'=>$this->getWishListCount($userId),
					//'usr_payment_count'=>,
					'usr_order_history_count'=>$this->countUserOrderList($userId),
					'hasNullAddress'=>$this->isAddressProvided($userId)
	                );
			$this->load->view('customer/dashboard',['data'=>$data]);	
		}
		else{
			$this->session->set_flashdata('bg_sys_msg','<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
			return redirect('user/login');
		}
	}

	public function profile(){
		if ($this->session->userdata('bg_sys_ss_user_id')) {
			$UserId=$this->session->userdata('bg_sys_ss_user_id');
			$data=$this->UsersModel->FethcUserInfo($UserId);
			$this->load->view('customer/profile',['data'=>$data]);
		}
		else{
			$this->session->set_flashdata('bg_sys_msg','<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
			return redirect('user/login');	
		}
	}

	public function updateProfile(){
		$data=$this->input->post();
		$UserId=$this->session->userdata('bg_sys_ss_user_id');
		if($this->UsersModel->updateProfileInfo($data,$UserId)){
			echo "Profile Updated Successfully.";
		}else{
			echo "An Error occured while updating your Profile.";
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

			$userId=$this->session->userdata('bg_sys_ss_user_id');

			$config = array();
	        $config["base_url"] = base_url()."user/order_history";
	        $config["total_rows"] = $this->OrderModel->getCountOrderListByUserId($userId);
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;

	        $choice = $config["total_rows"] / $config["per_page"];
    		$config["num_links"] = round($choice);

    		$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] =$this->OrderModel->getOrderListByUserId($userId,$page,$config["per_page"]); 
			$this->load->view('order/list',['order_history_data'=>$data["results"]]);	
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

	public function getWishListCount($UserId){
		return $this->UsersModel->WishListCount($UserId);
	}

	public function getUserOrderList($UserId,$limit,$offset){
		$this->load->model('OrderModel');
		return $this->OrderModel->getOrderListByUserId($UserId,$limit,$offset);
	}

	// public function getUserOrderList($UserId){
	// 	$this->load->model('OrderModel');
	// 	return $this->OrderModel->getOrderListByUserId($UserId);
	// }

	public function countUserOrderList($UserId){
		return $this->OrderModel->getCountOrderListByUserId($UserId);
	}


	/*
	*	user registration action
	 */
	public function register_user(){
		if ($this->input->post()) {
			if($this->UsersModel->InsertUserData($this->input->post())){
				$this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>Congatulations! You are successfully registerd. click <a href="login">here</a> to login.</div>');
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

	/*
		check wheather user has provided address or not
	 */
	public function isAddressProvided($UserId){
		if ($this->UsersModel->checkAddressStatus($UserId)) {
			return 1;
		}
		else{
			return 0;
		}
	}


	//create pagination 
	// public function doCreatePagination($UserId){
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url('user/order_history'),
	// 	$config['total_rows'] = $this->OrderModel->getOrderListByUserId($UserId),
	// 	$config['per_page'] = 5;
	// 	$config['uri_segment'] = 3;
	// 	$config['num_links'] = 3;
	// 	$config['full_tag_open'] = '<p>';
	// 	$config['full_tag_close'] = '</p>';
	// 	$config['first_link'] = 'First';
	// 	$config['first_tag_open'] = '<div>';
	// 	$config['first_tag_close'] = '</div>';
	// 	$config['last_link'] = 'Last';
	// 	$config['last_tag_open'] = '<div>';
	// 	$config['last_tag_close'] = '</div>';
	// 	$config['next_link'] = '&gt;';
	// 	$config['next_tag_open'] = '<div>';
	// 	$config['next_tag_close'] = '</div>';
	// 	$config['prev_link'] = '&lt;';
	// 	$config['prev_tag_open'] = '<div>';
	// 	$config['prev_tag_close'] = '</div>';
	// 	$config['cur_tag_open'] = '<b>';
	// 	$config['cur_tag_close'] = '</b>';
		
	// 	$this->pagination->initialize($config);
		
	// 	echo $this->pagination->create_links();
	// }

}
?>