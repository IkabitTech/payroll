<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{

		// $this->genlib->ajaxOnly();

		// $username2 = 'amon1';
		//  $password = 'amon1';

		 	//	 $username2 = 'kingmagaga';
		        //  $password = 'king10';

		 // $username2 = "jpeter";
		 // $password = "jpeter";

		 // $posted = $this->input->post();

		// $posted = json_decode($posted);


	 $username2 = $this->input->post('username');
	 $password = $this->input->post('password');


		  // $body2 =   file_get_contents('php://input');
			 // $body =  json_decode($body2, true);

	 //  $username2 = 'amon1';
	 // $password = 'amon1';


		
	 $this->db->select('*');
	 $this->db->where('username', $username2);
	 $this->db->where('password', md5($password));
	 $this->db->where('active', 1);
	 $this->db->where('deleted', 0);
	 $query = $this->db->get('admins');

	 $this->db->select('*');
	 $this->db->where('username', $username2);
	 $this->db->where('password', md5($password));
	 	 $this->db->where('is_active', 1);

	 $query4 = $this->db->get('employees');
	 $company = array();

	 

//	echo json_encode($query);
	
	 if( $query->num_rows() > 0){

	
	 
	$query = $query->result_array();

	$this->db->select('*');


	 $this->db->where('admin', $query[0]['id']);
	 $query2 = $this->db->get('companyadmins');
	 $query2 = $query2->result_array();
	$alladmincompanies = $query2;




	if( $query[0]['level'] == 1){

	 $this->db->select('*');
	 $this->db->order_by('status', 'ASC');
	 $this->db->order_by('name', 'ASC');
	 $query2 = $this->db->get('clients');
	 $query2 = $query2->result_array();
	 $alladmincompanies = $query2;


		 foreach($alladmincompanies as $key=>$value2){

		array_push($company , array('name'=>$value2['name'] ,'logo'=>$value2['logo'],'id'=>$value2['id']));

		}

	}

	

	if(count($alladmincompanies) > 0 && (($query[0]['level'] < 4 && $query[0]['level'] > 1) || $query[0]['level'] == 10)){

		 foreach($alladmincompanies as $key=>$value2){
   if($this->Main->mycolumn1('clients', 'status', 'id', $value2['client'] ) == 'Active'){


		array_push($company , array('name'=>$this->Main->mycolumn1('clients', 'name', 'id', $value2['client'] ), 'logo'=>$this->Main->mycolumn1('clients', 'logo', 'id', $value2['client'] ),'id'=>$value2['client']));

		}}

	}




	




if(count($alladmincompanies) > 0 && ($query[0]['level'] == 4)){

		 foreach($alladmincompanies as $key=>$value2){
		 	if($this->Main->mycolumn1('clients', 'status', 'id', $value2['client'] ) == 'Active'){

		array_push($company , array('company_name'=>$this->Main->mycolumn1('clients', 'name', 'id', $value2['client'] ),'branch_name'=>$this->Main->mycolumn1('client_branch', 'name', 'id', $value2['branch'] ), 'logo'=>$this->Main->mycolumn1('clients', 'logo', 'id', $value2['client'] ),'company_id'=>$value2['client'],'branch_id'=>$value2['branch']));

		} }
	}



			$newdata = array(
				'username'  => $username2,
				'email'     => $query[0]['email_address'],
				'logged' => TRUE,
				'userid' => $query[0]['id'],
				'level' => $query[0]['level'],
				'companyarray' => $company
		);
		
		$this->session->set_userdata($newdata);
			$json['msg'] = TRUE;
			$json['data'] = $this->session->userdata();

		}else if( $query4->num_rows() > 0 ){                     //if the user is Employee

$query4 = $query4->result_array();



	$newdata = array(
				'username'  => $username2,
				'email'     => $query4[0]['private_email'],
				'logged' => TRUE,
				'userid' => $query4[0]['id'],
				'level' => 5,
				'companyarray' => ['company_name'=>$this->Main->mycolumn1('clients', 'name', 'id', $query4[0]['company_id'] ),'branch_name'=>$this->Main->mycolumn1('client_branch', 'name', 'id', $query4[0]['branch'] ), 'logo'=>$this->Main->mycolumn1('clients', 'logo', 'id', $query4[0]['company_id'] ),'company_id'=>$query4[0]['company_id'],'branch_id'=>$query4[0]['branch']]
		);

	if($this->Main->mycolumn1('clients', 'status', 'id', $query4[0]['company_id'] ) == 'Active'){

		$this->session->set_userdata($newdata);

			$json['msg'] = TRUE;
			$json['data'] = $this->session->userdata();

		}//to verify the company
else{

	$json['msg'] = FALSE;
	$json['data'] = 'The Company You Registered is No longer Active Active Please Communicate with you Supervisor/Manager';
}

		}else{ 
			
			$json['msg'] = FALSE;
			$json['data'] = 'Username and Password do not Match!';

		 }



        if(($json['msg'] == TRUE && count($company) <= 0 ) &&  $this->session->userdata('level') != 5){

        	$_SESSION = array();

             $json['msg'] = FALSE;
			$json['data'] = 'You are not Assigned a company, Contact the Administrator!';
        	
        }
	 $this->output->set_content_type('application/json')->set_output(json_encode($json));

		 		 
	}

	public function test(){
		echo json_encode($this->Main->mycolumn1('admins','username','id', 1));
	}







	
}
