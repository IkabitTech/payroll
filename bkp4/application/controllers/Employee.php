<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();

        if($this->session->userdata('level') != 1 && $this->session->userdata('level') != 3 ){

        	redirect(base_url(),'refresh');
        }
        		$this->load->model('Main');

        
    }
    



	public function add($companyindex = 0)
	{  


		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'employee/add/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'employee';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/addemployee', $data, TRUE);
        
        $values['pageTitle'] = "Add Employee";

		$this->load->view('admin/top',$values);
		
	}





	public function index($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'employee/';
		$data['mypage'] = $page;
				$data['menuactive'] = 'employee';


	
		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/employee', $data, TRUE);
        
        $values['pageTitle'] = "Employee";

       if($this->session->userdata('level') == 1){ 

		$this->load->view('admin/top',$values);

       }	
	}







	public function edit($companyindex = 0)
	{  

		if( $this->Main->isExist1('employees','company_id', $this->session->userdata('companyarray')[$companyindex]['id'], 'id', $_GET['employee'])){


		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'employee/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'employee';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/editemployee', $data, TRUE);
        
        $values['pageTitle'] = "Edit Employee";

		$this->load->view('admin/top',$values);
	
	}else{


		redirect(base_url().'employee/'.$companyindex);
	}



}





}

