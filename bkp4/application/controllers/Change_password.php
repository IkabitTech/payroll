<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
    
        
    }
    



	public function index()
	{  

		$this->load->model('Main');

               $token = isset($_GET['token'])?$_GET['token']:null;

        if($token!= null && $this->checktoken($token)){
        
            


                
		$data = null;
		$page = 'profile/info/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'profile';
		$data['secretvalue'] = '';
		$data['username'] = $this->Main->mycolumn1('passwordtoken','username','token', $token);





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('common/resetpassword', $data, TRUE);
        
        $values['pageTitle'] = "Change Password";

      $this->load->view('common/top2',$values);









}
       else{echo "<h2>Invalid or Expired token, Click <a href='".base_url()."forget_password'>Here</a> to request Access to Change Password</h2>";}
		
		
		


}





    public function checktoken($token=null){

 $now = date("Y-m-d H:i:s");
 $valid = date('Y-m-d H:i:s',strtotime(' -20 minutes',strtotime($now)));
 
$this->db->where('created <',$valid) ;
$this->db->delete('passwordtoken') ;

  if($this->Main->isExist1('passwordtoken','token', $token)){
  
  
  return TRUE;
  
  }else{   return FALSE; }
 
 



}



        public function savepassword(){

        $username = $this->input->post('username');
	 $p2 = $this->input->post('new_password');
	
	
	
	


         $this->db->select('*');
	 $this->db->where('username', $username);
	 $this->db->where('active', 1);
	 $this->db->where('deleted', 0);
	 $query = $this->db->get('admins');

	 $this->db->select('*');
	 $this->db->where('username', $username);
	 $this->db->where('status', 'active');

	 $query4 = $this->db->get('employees');


         if( $query->num_rows() > 0 ){


           $json['msg'] = TRUE;
           $json['des'] = 'Successfull Changed';
	   
	 $this->db->where('username', $username);
           $this->db->update('admins',['password'=>md5($p2)]);

  
         }else if( $query4->num_rows() > 0 ){

         $json['msg'] = TRUE;
           $json['des'] = 'Successfull Changed';
	   
	 $this->db->where('username', $username);
           $this->db->update('employees',['password'=>md5($p2)]);

        
            
        

        }else{ 
			
			$json['msg'] = FALSE;
			$json['des'] = 'Wrong Request!';

		 }




               $this->output->set_content_type('application/json')->set_output(json_encode($json));



         }








public function email($from, $to, $subject, $msg){

    
     $headers = "From:  ".$from."account-security@ops.com\r\nReply-To: ". $to;
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

     $mail_sent = @mail( $to, $subject, $msg, $headers );

      return $mail_sent ? true : false;

     }



public function emailuser($email, $msg){

     

  return $this->email("benson23",$email,'YOUR OPS PASSWORD CHANGED RECENTLY',$msg);


     }






}
