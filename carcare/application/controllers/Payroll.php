<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
    }
    




		public function Settings($companyindex = 0){


       $this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'payroll/settings/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';
		$data['secretvalue'] = '';




		$values['view'] = $this->load->view('hr/settings', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard";


         if($this->session->userdata('level') == 1){ 

		$this->load->view('admin/top',$values);

       }elseif($this->session->userdata('level') == 10){ 
		$this->load->view('hr/top',$values);

        }



		}
		





	public function index($companyindex = 0)
	{  

		$this->load->model('Main');



if($this->session->userdata('level') != 5){
		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'payroll/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';
				$data['secretvalue'] = '';





        $this->db->select('*');
        $this->db->where('active', '1');
        $this->db->where('deleted', '0');
        $this->db->where('company', $this->session->userdata('companyarray')[$companyindex]['id']);
        $this->db->order_by('name', 'DESC');
        $all = $this->db->get('payroll_rec');
        $all = $all->result_array();


		$data['pys'] = $all;

		// $data['bfs2'] = $this->Main->all1('employmentstatus','active', '1');

		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('hr/payroll_set', $data, TRUE);
        
        $values['pageTitle'] = "Payroll";

        


         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }elseif($this->session->userdata('level') == 10){ 
		$this->load->view('hr/top',$values);

        }			

        }else{

           $data = null;
		$page = 'payroll/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';

        $this->db->select('*');
        $this->db->where('active', '1');
        $this->db->where('deleted', '0');
        $this->db->where('confirmed', '1');
        $this->db->where('company', $this->session->userdata('companyarray')['company_id']);
        $this->db->order_by('name', 'DESC');
        $all = $this->db->get('payroll_rec');
        $all = $all->result_array();


		$data['pys'] = $all;
		$this->session->set_userdata('current_page', $page);
       $values['view'] = $this->load->view('user/payrolllist', $data, TRUE);
        
        $values['pageTitle'] = "Payroll";

     $values['view'] = $this->load->view('user/top', $values);



        }	


	}






	public function pay($payroll = 0, $companyindex = 0)
	{  
		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex);
		}

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$data['payroll'] = $payroll;
		$page = 'payroll/pay/'.$payroll.'/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';
		$data['secretvalue'] = '';





		//$data['pys'] = $this->Main->all3('payroll_rec','active', '1','deleted', '0' ,'company', $this->session->userdata('companyarray')[$companyindex]['id']);

		// $data['bfs2'] = $this->Main->all1('employmentstatus','active', '1');

		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('hr/uploadpayroll', $data, TRUE);
        
        $values['pageTitle'] = "Payroll Pay";


         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }elseif($this->session->userdata('level') == 10){ 
		$this->load->view('hr/top',$values);

        }			
	}





	public function more($payroll = 0)
	{  


       

		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex);
		}

		$this->load->model('Main');


  

		$data = null;
		$data['payroll'] = $payroll;
		$page = 'payroll/more/'.$payroll.'/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';



		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('user/mypayroll', $data, TRUE);
        
        $values['pageTitle'] =strtoupper( $this->session->userdata('companyarray')['company_name']." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )) .' PAYROLL' ) ;

		$this->load->view('user/top',$values);
	
	}






	public function salary_slip($payroll = 0)
	{  


       

		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex);
		}

		$this->load->model('Main');


  

		$data = null;
		$data['payroll'] = $payroll;
		$page = 'payroll/salary_slip/'.$payroll.'/';
		$data['mypage'] = $page;
		$data['secret'] = 'sslip';
		$data['menuactive'] = 'payroll';
		$data['pageTitle'] =strtoupper( $this->session->userdata('companyarray')['company_name']." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )) .' PAYROLL' ) ;



		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('user/mypayrollslip', $data, TRUE);
        
        

		$this->load->view('user/top',$values);
	
	}


	
}
