<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

class Api extends RestController
{
		public function __construct() {
            parent::__construct();
            $this->load->model('account_model');
		}    
	   
		public function accountRegister_post(){
		   
		   //getting json data 
			$json = file_get_contents('php://input');
			$val = json_decode($json,true);
		   
           $data = array(
			'firstname' => $val['firstname'],
			'lastname' => $val['lastname'],
			'password' => $val['password'],
			'gender' => $val['gender'],
			'contact' => $val['contact']
           );
		   
		   if(!empty($data['firstname']) && !empty($data['lastname']) && !empty($data['password']) && !empty($data['gender']) && !empty($data['contact']))
		   {
				$insert = $this->account_model->register($data);
				if($insert === true){
					$this->response([
						'status' => $insert,
						'data' => $data,
						'message' => 'User registration successful. Please Login to proceed further',
						]);
				}   
				else{
					$this->response([
						'status' => false,
						'message' => 'Error : User Already Exists '.$insert['message']
						]);
				}
		   }
		   else{
			   $this->response([
						'message' => 'Please provide complete user details.'
						], RestController::HTTP_BAD_REQUEST);
		   }
		   
       }
	   
	    public function accountlogin_post(){
			
			//getting json data 
			$json = file_get_contents('php://input');
			$val = json_decode($json,true);
           
		   $data = array(
			'contact' => $val['contact'],
			'password' => $val['password']
           );
		    
		   if(!empty($data['contact']) && !empty($data['password']))
		   {
				$insert = $this->account_model->login($data);
				if($insert){
					
					$this->session->set_userdata("logged_in",$insert);
					
					$this->response([
						'logged_in' => true,
						'data' => $insert,
						'message' => 'User Found.'
						]);
				}   
				else{
					$this->response([
						'logged_in' => false,
						'message' => 'No user found with given details.'
						]);
				}
		   }
		   else{
			   $this->response([
						'message' => 'Please provide complete user details.'
						]);
		   }
		   
       }		
		  
	   public function account_logout_get(){
					$this->session->unset_userdata('logged_in');
					$this->response([
						'message' => 'Logout successful.'
						]);
	   }
}
?>