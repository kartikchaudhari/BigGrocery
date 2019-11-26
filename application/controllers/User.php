<?php
class User extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'cookie','form','mail']);
        $this->load->model(['UsersModel', 'ProductsModel', 'OrderModel']);
        $this->load->library("pagination");
    }
    
    
    public function index() {
        if ($this->session->userdata('bg_sys_ss_user_id')) {
            return redirect('user/dashboard');
        } else {
            $this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
            return redirect('user/login');
        }
    }
    
    //User dashboard
    public function dashboard() {
    if ($this->session->userdata('bg_sys_ss_user_id')) {
            $userId = $this->session->userdata('bg_sys_ss_user_id');
            $data = array('usr_wish_list_count' => $this->getWishListCount($userId),
                'usr_order_history_count' => $this->countUserOrderList($userId),
                'hasNullAddress' => $this->isAddressProvided($userId)
            );
            $this->load->view('customer/dashboard', ['data' => $data]);
        } else {
            $this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
            return redirect('user/login');
        }
    }

    //Display user profile
    public function profile() {
        if ($this->session->userdata('bg_sys_ss_user_id')) {
            $UserId = $this->session->userdata('bg_sys_ss_user_id');
            $data = $this->UsersModel->FethcUserInfo($UserId);
            $this->load->view('customer/profile', ['data' => $data]);
        } else {
            $this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-danger" role="alert">
					<strong>Sorry the session has expired, please re-login below.</strong> 
				</div>');
            return redirect('user/login');
        }
    }
    
    //update user profile
    public function updateProfile() {
        $data = $this->input->post();
        $UserId = $this->session->userdata('bg_sys_ss_user_id');
        if ($this->UsersModel->updateProfileInfo($data, $UserId)) {
            echo "Profile Updated Successfully.";
        } else {
            echo "An Error occured while updating your Profile.";
        }
    }

    /*
      View Loading methods
     */
    public function register() {
        $this->load->view('customer/register');
    }

    public function login() {
        $this->load->view('customer/login');
    }

    public function order_history() {

        if ($this->session->userdata('bg_sys_ss_user_id')) {

            $userId = $this->session->userdata('bg_sys_ss_user_id');

            $config = array();
            $config["base_url"] = base_url() . "user/order_history";
            $config["total_rows"] = $this->OrderModel->getCountOrderListByUserId($userId);
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;

            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
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
            $data["results"] = $this->OrderModel->getOrderListByUserId($userId, $page, $config["per_page"]);
            $this->load->view('order/list', ['order_history_data' => $data["results"]]);
        } else {
            return redirect('user/login');
        }
    }

    public function shipping() {
        $this->load->view('customer/shipping');
    }
    

    /*
      Data getter methods
      used to pass the fetched data from db to view
     */
    public function wishlist($UserId = null) {
        if ($this->session->userdata('bg_sys_ss_user_id')) {
            $UserId = $this->session->userdata('bg_sys_ss_user_id');
            $data = $this->ProductsModel->returnWishListProducts($UserId);
            $this->load->view('customer/wishlist', ['wishlist_products' => $data]);
        } else {
            return redirect('user/login');
        }
    }

    public function getWishListCount($UserId) {
        return $this->UsersModel->WishListCount($UserId);
    }

    public function getUserOrderList($UserId, $limit, $offset) {
        $this->load->model('OrderModel');
        return $this->OrderModel->getOrderListByUserId($UserId, $limit, $offset);
    }

    public function countUserOrderList($UserId) {
        return $this->OrderModel->getCountOrderListByUserId($UserId);
    }

    /*
     * 	user registration action
     */

    public function register_user() {
        if ($this->input->post()) {
            if ($this->UsersModel->InsertUserData($this->input->post())) {
                $this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-success alert-dismissable" style="margin:0px;"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>Congatulations! You are successfully registerd. click <a href="login">here</a> to login.</div>');
                return redirect('user/register');
            }
        } else {
            show_404("");
        }
    }

    /*
     * user login action
     */
    public function login_user() {
        $info = array(
            'uname' => $this->security->xss_clean($this->input->post('uname')),
            'pass' => md5($this->security->xss_clean($this->input->post('password')))
        );
        //get user id
        $user_id = $this->UsersModel->FetchLoginInfo($info);
        $user_id;
        if ($user_id > 0) {
            $this->session->set_userdata('bg_sys_ss_user_id', $user_id);
            return redirect('user');
        } else {
            $this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-danger" role="alert">
					<strong>Invalid username or password, please retry below.</strong>
				</div>');
            return redirect('user/login');
        }
    }



    //forgot password
    public function forgot_password() {
        if(isset($_POST['btnSendPassword'])){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('customer/forget_pass',['forgot_link'=>$message]);   
            }
            else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->UsersModel->getUserInfoByEmail($clean);

                if(!$userInfo){
                    $this->session->set_flashdata('bg_sys_msg', '<div style="border:1px solid red;">We cant find your email address.</div>');
                    return redirect('User/forgot_password','refresh');
                }
                $token = $this->UsersModel->insertToken($userInfo->user_id);
                $qstring = $this->base64url_encode($token);
                $url = site_url() . 'User/reset_password/token/' . $qstring;

                //collect forgot password data for email
                $data=array(
                            'receiver'=>$userInfo->fname.' '.$userInfo->lname,
                            'receiver_email'=>$userInfo->email,
                            'link'=>$url
                        );

                
                
                $message = '<strong>'.$this->config->item('forget_password_message').'</strong><br>';

                //send email
                send_forgot_password($data);
                //display user-friendly message on view
                $this->load->view('customer/forget_pass',['forgot_password_msg'=>$message]);
            }
        }
        else{
            $this->load->view('customer/forget_pass');
        }
    }

    //reset password
    public function reset_password(){
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);
        $user_info = $this->UsersModel->isTokenValid($cleanToken);
        
        if(!$user_info){
            $this->session->set_flashdata('bg_sys_msg', '<div class="alert alert-danger" role="alert">
                    <strong>Token is invalid or expired</strong> 
                </div>');
            redirect(base_url('User/login'));
        }         
           
        $data = array(
            'firstName'=> $user_info->fname, 
            'email'=>$user_info->email, 
            'token'=>$this->base64url_encode($token)
        );

        if(isset($_POST['btnResetPassword'])){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|matches[pass]');              
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('customer/reset_pass');
            }else{
                                
                $post = $this->input->post();
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = md5($cleanPost['pass']);                
                $cleanPost['user_id'] = $user_info->user_id;
                $cleanPost['pass']=$hashed;
                unset($cleanPost['cpass']);                
                if(!$this->UsersModel->updatePassword($cleanPost)){
                    $this->session->set_flashdata('bg_sys_msg', '<div class="panel panel-danger" role="alert"><div class="panel-body">There was a problem updating your password</div></div>');
                }else{
                    $this->session->set_flashdata('bg_sys_msg', '<div class="panel panel-success" role="alert"><div class="panel-body">Your password has been updated.</div></div>');
                }
                redirect(base_url('User/login'));                
            }
        }
        $this->load->view('customer/reset_pass',['data'=>$data]);  
    }



    /*
      User logout
     */

    public function logout() {
        $this->session->sess_destroy();
        return redirect('home');
    }

    /*
      check wheather user has provided address or not
     */

    public function isAddressProvided($UserId) {
        if ($this->UsersModel->checkAddressStatus($UserId)) {
            return 1;
        } else {
            return 0;
        }
    }


    //encode url
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    //decode url
    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }

//========================== json methods for android ==========================

    public function login_user_json() {
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        $info = array($this->security->xss_clean($uname), md5($this->security->xss_clean($pass)));
        //get user id
        $user_id = $this->UsersModel->FetchLoginInfo($info);
        if ($user_id) {
            $data = $this->UsersModel->FethcUserInfo($user_id);
            $status = true;
            $user_info = array(
                'name' => $data['fname'] . " " . $data['lname'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'address' => $data['address'],
                'delivery_address' => $data['delivery_address'],
                'avatar' => base_url($data['avatar']));
            echo json_encode(array('status' => $status, 'user' => $user_info));
        } else {
            $status = false;
            echo json_encode(array('status' => $status));
        }
    }

}

?>