<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Account_model extends CI_Model{
	
	public function login($data){
			$query = $this->db->get_where('account', $data );
			return $query->row_array(); 			
	}
   
   public function register($data){
       
	   $q = $this->db->insert('account',$data);
       
	   if($q)
		{    
           return true;
		}
       else
		{
           return $this->db->error(); 
		}
   }



}

?>