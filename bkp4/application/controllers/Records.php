<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends CI_Controller {

	
 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
        	


        
    }


  

	public function index($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'records/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';




        $this->db->select('*');
        $this->db->where('active', '1');
        $this->db->where('deleted', '0');
        $this->db->where('confirmed', '1');
        $this->db->where('company', $this->session->userdata('companyarray')[$companyindex]['id']);
        $this->db->order_by('name', 'DESC');
        $all = $this->db->get('payroll_rec');
        $all = $all->result_array();


		$data['pys'] = $all;

		// $data['bfs2'] = $this->Main->all1('employmentstatus','active', '1');

		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('accountant/report_set', $data, TRUE);
        
        $values['pageTitle'] = "Confirmed Payroll Records";

        


         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }		


	}






	public function more($payroll = 0, $companyindex = 0)
	{  
		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex);
		}

		$this->load->model('Main');


  

		$data = null;
		$data['companyindex'] = $companyindex;
		$data['payroll'] = $payroll;
		$page = 'records/more/'.$payroll.'/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';
$data['secretvalue']='summary';


		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('accountant/report', $data, TRUE);
        
        $values['pageTitle'] =strtoupper( $this->session->userdata('companyarray')[$companyindex]['name']." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )) .' PAYROLL' );


         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }		
	}





	public function salaryslips($payroll = 0, $companyindex = 0)
	{  
		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex);
		}

		$this->load->model('Main');


  

		$data = null;
		$data['companyindex'] = $companyindex;
		$data['payroll'] = $payroll;
		$page = 'records/salaryslips/'.$payroll.'/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';
$data['secretvalue']='summary';


		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('accountant/report_slips', $data, TRUE);
        
        $values['pageTitle'] =strtoupper( $this->session->userdata('companyarray')[$companyindex]['name']." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )) .' PAYROLL' );


         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }		
	}

	public function summary($payroll = 0, $companyindex = 0)
	{  
		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex);
		}

		$this->load->model('Main');


  

		$data = null;
		$data['companyindex'] = $companyindex;
		$data['payroll'] = $payroll;
		$page = 'records/summary/'.$payroll.'/'.$companyindex;
		$data['secretvalue']='summary';
		$data['mypage'] = $page;
		$data['menuactive'] = 'payroll';
		$data['pageTitle'] =strtoupper( $this->session->userdata('companyarray')[$companyindex]['name']." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )) .' PAYROLL' );




		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('manager/printsummary', $data, TRUE);
        




         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }		
	}






	
	public function salary_slip($payroll = 0, $employee, $companyindex = 0)
	{  

              if(!$this->Main->isExist3('payrollrecords', 'payroll',$payroll,'employee',$employee,'company',  $this->session->userdata('companyarray')[$companyindex]['id'] )  ){
               redirect(base_url().'records/'.$companyindex );

                 }
       

		if($payroll ==0){

			redirect(base_url().'payroll/'.$companyindex );
		               }

		$this->load->model('Main');


  

		$data = null;
		$data['payroll'] = $payroll;
		$page = 'records/salary_slip/'.$payroll.'/'.$employee.'/';
		$data['mypage'] = $page;
		$data['secret'] = 'sslip';
		$data['user'] = $employee;
		$data['companyindex'] = $companyindex;
		$data['menuactive'] = 'payroll';
		$data['pageTitle'] =strtoupper( $this->session->userdata('companyarray')[$companyindex]['name']." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )) .' PAYROLL' ) ;



		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('user/mypayrollslip2', $data, TRUE);
        
        

		
         if($this->session->userdata('level') == 3){ 

		$this->load->view('accountant/top',$values);

       }elseif($this->session->userdata('level') == 2){ 
		$this->load->view('manager/top',$values);

        }elseif($this->session->userdata('level') == 1){ 
		$this->load->view('admin/top',$values);

        }


	
	}

        







	
}
