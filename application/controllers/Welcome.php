<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
  public function __construct(){
       parent::__construct();
        
        if(!empty($_SESSION['userid'])){
            redirect('dashboard');

            // echo $_SESSION['userid'];
        }
    }
    







	public function index()
	{  
		

		$data['try'] = null;
		$this->load->view('common/login',$data);

	}



	}
