<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loans extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
    }
    



	public function addloan($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'loans/addloan/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'loans';
	$data['secretvalue'] = '';




		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('accountant/newloans', $data, TRUE);
        
        $values['pageTitle'] = "New Loan";

		$this->load->view('accountant/top',$values);
		
	}





	public function index($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'loans/';
		$data['mypage'] = $page;
				$data['menuactive'] = 'loans';
	$data['secretvalue'] = '';

		$this->db->select('*');
		$this->db->where('company' ,$this->session->userdata('companyarray')[$companyindex]['id']);

		$this->db->order_by('id' ,'desc');
		$allloans = $this->db->get('loans');
		$allloans = $allloans->result();
		$data['bfsll'] = $allloans;

		
		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('accountant/loans', $data, TRUE);
        
        $values['pageTitle'] = "Loans";

if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }	elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }	
	}


}

