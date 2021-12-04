<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();

        if($this->session->userdata('level') <  1 && $this->session->userdata('level') >  5){

        	redirect(base_url(),'refresh');
        }
        
    }
    



	public function info($companyindex = 0)
	{  

		$this->load->model('Main');
		
		
		

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'profile/info/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'profile';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('common/profile2', $data, TRUE);
        
        $values['pageTitle'] = "User Profile";

      $level = $this->session->userdata('level');

               if($level == 1){$this->load->view('admin/top',$values);}
               elseif($level == 2){$this->load->view('manager/top',$values);}
               elseif($level == 3){$this->load->view('accountant/top',$values);}
               elseif($level == 5){$this->load->view('user/top',$values);}
		
		
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


            $token = md5(rand(100,9999).$userame.rand(100,9999));
          $token = substr($token,0, 50);

          $this->insert('passwordtoken',['username'=>$username,'token'=>$token, 'is_employee'=>0]);

            
                     $msg = '<style>p{font-size:20px}b{color:red}</style><p>Hello '. $this->Main->mycolumn1('admins','full_name','id',$id).',  We detected activity of Password Change in your OPS Account  </p><p> please   <a href="'.base_url().'change_password?token='.$token.'" > Click Here</a> if you are not aware about this to reset password </p>';

            $this->emailuser($this->Main->mycolumn1('admins','email_address','id',$id), $msg);





         }else if( $query4->num_rows() > 0 ){

         $json['msg'] = TRUE;
           $json['des'] = 'Successfull Changed';
	   
            $this->db->where('id',$id);
           $this->db->update('employees',['password'=>md5($p2)]);


           $token = md5(rand(100,9999).$userame.rand(100,9999));
          $token = substr($token,0, 50);

          $this->insert('passwordtoken',['username'=>$username,'token'=>$token, 'is_employee'=>1]);


          $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$id).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$id) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$id);
           
               $msg = '<style>p{font-size:20px}b{color:red}</style><p>Hello '.$allnames.',  We detected activity of Password Change in your OPS Account  </p><p> please   <a href="'.base_url().'change_password?token='.$token.'" > Click Here</a> if you are not aware about this to reset password </p>';

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

     

  return $this->email("benson23",$email,'YOUR OPS PASSWORD CHANGED RECENTLY',$msg);


     }






}
