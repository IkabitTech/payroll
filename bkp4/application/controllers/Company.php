<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
        $this->genlib->checkLogin();

        if($this->session->userdata('level') != 1){

        	redirect(base_url(),'refresh');
        }
        
    }
    



	public function add($companyindex = 0)
	{  

		$this->load->model('Main');
		
		
		

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/add/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'company';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/addcompany', $data, TRUE);
        
        $values['pageTitle'] = "Add Company/Client";

		$this->load->view('admin/top',$values);
		
	}



		public function edit($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/edit/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'company';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/editcompany', $data, TRUE);
        
        $values['pageTitle'] = "Edit Company/Client";

		$this->load->view('admin/top',$values);
		
	}





	public function index($companyindex = 0)
	{  

		$this->load->model('Main');
		
		
		
		
		if(isset($_POST['send_image'])){
		
		 $id = ($this->input->post("id"));

    $upload= $this->uploadfile('./assets/images/company_logo', $id, 'image');
  if($upload){

   $this->db->where('id',$id);
   $this->db->update('clients',['logo'=>$id.'.png?id='.rand(100,9999)]);
   
   
   
 echo json_encode($upload);
      

}else{

    echo json_encode($upload);
       

}

		
		
		
		
		
		
		
		
		
		}
		
		
		
		
		
		
		
		

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/';
		$data['mypage'] = $page;
				$data['menuactive'] = 'company';
				$data['secretvalue'] = '';


	
		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/company', $data, TRUE);
        
        $values['pageTitle'] = "Company";

if($this->session->userdata('level') == 1){ 

		$this->load->view('admin/top',$values);

       }	
	}




	public function structure($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/structure';
		$data['mypage'] = $page;
				$data['menuactive'] = 'company';
				$data['secretvalue'] = '';


	
		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/structure', $data, TRUE);
        
        $values['pageTitle'] = "Company Structure";

if($this->session->userdata('level') == 1){ 

		$this->load->view('admin/top',$values);

       }	
	}






	public function add_user($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/add_user/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'company';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/addadmins', $data, TRUE);
        
        $values['pageTitle'] = "Accountants, Managers and Super Admins";

		$this->load->view('admin/top',$values);
		
	}


	public function edit_user($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/edit_user/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'company';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/editadmins', $data, TRUE);
        
        $values['pageTitle'] = "Accountants, Managers and Super Admins";

		$this->load->view('admin/top',$values);
		
	}



	public function user($companyindex = 0)
	{  

		$this->load->model('Main');

		$data = null;
		$data['companyindex'] = $companyindex;
		$page = 'company/user/';
		$data['mypage'] = $page;
		$data['menuactive'] = 'company';
		$data['secretvalue'] = '';





		$this->session->set_userdata('current_page', $page);
	

		$values['view'] = $this->load->view('admin/user', $data, TRUE);
        
        $values['pageTitle'] = "Accountants, Managers and Super Admins";

		$this->load->view('admin/top',$values);
		
	}



  
	public function changelogo(){

$id = ($this->input->post("id"));

    $upload= $this->uploadfile('./assets/images/company_logo', $id, 'image');
  if($upload){

   $this->db->where('id',$id);
   $this->db->update('clients',['logo'=>$id.'.png?id='.rand(100,9999)]);

       // redirect(base_url().'company/'.$companyindex, 'refresh');

}else{


        echo $upload;

}





     }



   

public function uploadfile($path,$name, $filename){

   $config =  array(
                  'upload_path'     => $path,
                  'allowed_types'   => "*",
                  'overwrite'       => TRUE,
                  'max_size'        => "2048000" , // Can be set to particular file size
                  // 'max_height'      => "768",
                  // 'max_height'      => "2000",

                  // 'max_width'       => "2000"  
                  'file_name' => $name

                ); 

$this->load->library('upload', $config);
        if($this->upload->do_upload($filename))
        {
          $data = array('upload_data' => $this->upload->data());
          // $this->load->view('upload_success',$data);



          $this->load->library('upload', $config);
          return true;
      
        }
        else
        {
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('file_view', $error);
        // $this->load->view('test', $error);
      //  return false;

        return $error;

        } 



}




}

