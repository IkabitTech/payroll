<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();
        
    }
    



	public function index($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'dashboard/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'dashboard';
		$data['secretvalue'] = '';


         $level = $this->session->userdata('level');
		
		$this->session->set_userdata('current_page', $page);
	

 if($level == 1){

$values['view'] = $this->load->view('admin/dashboard', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard - Super Admin";

		$this->load->view('admin/top',$values);

 } elseif($level == 2){

$values['view'] = $this->load->view('manager/dashboard', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard - Supervisor";

		$this->load->view('manager/top',$values);

 }elseif($level == 3){

$values['view'] = $this->load->view('accountant/dashboard', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard - Accountant";

		$this->load->view('accountant/top',$values);

 }elseif($level == 4){

$values['view'] = $this->load->view('brancaccountant/dashboard', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard - Branch Accountant";

		$this->load->view('accountant2/top',$values);

 }elseif($level == 5){

$values['view'] = $this->load->view('user/dashboard', $data, TRUE);
        
        $values['pageTitle'] = "Dashboard - Employee";

		$this->load->view('user/top',$values);

 }



 

		
	}


}




