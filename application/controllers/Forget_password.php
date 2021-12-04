<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget_password extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
    
        
    }
    



	public function index()
	{  

		$this->load->model('Main');
		
		
		

		$data = null;
		$page = 'profile/info/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'profile';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('common/forgetpassword', $data, TRUE);
        
        $values['pageTitle'] = "Forget Password";

      $this->load->view('common/top2',$values);


}



        public function checkpassword(){

        $id = $this->input->post('username');
	 $p1 = $this->input->post('old_password');
	$p2 = $this->input->post('new_password');
	
	
	
	


         $this->db->select('*');
	 $this->db->where('id', $id);
	 $this->db->where('password', md5($p1));
	 $this->db->where('active', 1);
	 $this->db->where('deleted', 0);
	 $query = $this->db->get('admins');

	 $this->db->select('*');
	  $this->db->where('id', $id);
	 $this->db->where('password', md5($p1));
	 $this->db->where('status', 'active');

	 $query4 = $this->db->get('employees');


         if( $query->num_rows() > 0 ){


           $json['msg'] = TRUE;
           $json['des'] = 'Successfull Changed';
	   
            $this->db->where('id',$id);
           $this->db->update('admins',['password'=>md5($p2)]);

            
                     $msg = '<style>p{font-size:20px}b{color:red}</style><p>Hello '. $this->Main->mycolumn1('admins','full_name','id',$id).',  We detected activity of Password Change in your OPS Account  </p><p> please   <a href="#" > Click Here</a> if you are not aware about this to reset password </p>';

            $this->emailuser($this->Main->mycolumn1('admins','email_address','id',$id), $msg);





         }else if( $query4->num_rows() > 0 ){

         $json['msg'] = TRUE;
           $json['des'] = 'Successfull Changed';
	   
            $this->db->where('id',$id);
           $this->db->update('employees',['password'=>md5($p2)]);

          $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$id).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$id) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$id);
           
               $msg = '<style>p{font-size:20px}b{color:red}</style><p>Hello '.$allnames.',  We detected activity of Password Change in your OPS Account  </p><p> please   <a href="#" > Click Here</a> if you are not aware about this to reset password </p>';

        if($this->Main->mycolumn1('employees','work_email','id',$id) != null){

$this->emailuser($this->Main->mycolumn1('employees','work_email','id',$id), $msg);
        }else{ 
        
    $this->emailuser($this->Main->mycolumn1('employees','private_email','id',$id), $msg);
    
     }

            
        

        }else{ 
			
			$json['msg'] = FALSE;
			$json['des'] = 'Wrong Old Password!';

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

     

  return $this->email("benson23",$email,'CONFIRMATION LINK TO CHANGE OPS ACCOUNT PASSWORD',$msg);


     }




    public function sendrequest(){


   $username = $this->input->post('username');

   


   
         $this->db->select('*');
	 $this->db->where('username', $username);
	 $this->db->where('active', 1);
	 $this->db->where('deleted', 0);
	 $query = $this->db->get('admins');

	 $this->db->select('*');
	 $this->db->where('username', $username);
	 $this->db->where('status', 'active');

	 $query4 = $this->db->get('employees');


      
         if( $query->num_rows() > 0 && $this->Main->mycolumn1('admins','email_address','username',$username) != null){


           $json['msg'] = TRUE;
           $json['des'] = 'Email have been sent to <b>'. substr($this->Main->mycolumn1('admins','email_address','username',$username),0,5).'******'.substr($this->Main->mycolumn1('admins','email_address','username',$username),-8,9). '</b> Use the link sent to Change Password. ';

          $token = md5(rand(100,9999).$username.rand(100,9999));
          $token = substr($token,0, 50);

          $this->db->insert('passwordtoken',['username'=>$username,'token'=>$token, 'is_employee'=>0]);
	   
   

            
                     $msg = '<style>p{font-size:20px}b{color:red}</style><p>Hello '. $this->Main->mycolumn1('admins','full_name','username',$username).',  To change Your OPS Account password Click here  </p><p> please   <a href="'.base_url().'change_password?token='.$token.'" > Click Here</a></p>';

            $this->emailuser($this->Main->mycolumn1('admins','email_address','username',$username), $msg);





         }else if( $query4->num_rows() > 0 && ($this->Main->mycolumn1('employees','work_email','username',$username) != null || $this->Main->mycolumn1('employees','private_email','username',$username) != null)){


          $json['msg'] = TRUE;
       
	   
       

           $token = md5(rand(100,9999).$username.rand(100,9999));
          $token = substr($token,0, 50);

          $this->db->insert('passwordtoken',['username'=>$username,'token'=>$token, 'is_employee'=>1]);


          $allnames = $this->Main->mycolumn1('employees','first_name', 'username',$username).' '. $this->Main->mycolumn1('employees','middle_name', 'username',$username) .' '.$this->Main->mycolumn1('employees','last_name', 'username',$username);
        


        $msg = '<style>p{font-size:20px}b{color:red}</style><p>Hello '. $allnames.',  To change Your OPS Account password Click here  </p><p> please   <a href="'.base_url().'change_password?token='.$token.'" > Click Here</a></p>';

        if($this->Main->mycolumn1('employees','work_email','username',$username) != null){

         $this->emailuser($this->Main->mycolumn1('employees','work_email','username',$username), $msg);

         $json['des'] = 'Email have been sent to <b>'. substr($this->Main->mycolumn1('employees','work_email','username',$username),0,5).'******'.substr($this->Main->mycolumn1('employees','work_email','username',$username),-8,9). '</b> Use the link sent to Change Password. ';


        }else{ 
        
    $this->emailuser($this->Main->mycolumn1('employees','private_email','username',$username), $msg);

   $json['des'] = 'Email have been sent to <b>'. substr($this->Main->mycolumn1('employees','private_email','username',$username),0,5).'******'.substr($this->Main->mycolumn1('employees','private_email','username',$username),-8,9). '</b> Use the link sent to Change Password. ';
    
     }

            
        

        }else{ 
			
			$json['msg'] = FALSE;
			$json['des'] = 'Not Existing Username or User is not Active or User have no email, contact your supervisor or Our Support team.';

		 }



               $this->output->set_content_type('application/json')->set_output(json_encode($json));


     }



  

}
