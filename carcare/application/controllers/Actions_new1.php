<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Headers: *');
header('Access-Control-Allow-Method: GET,HEAD,OPTIONS,POST,PUT,PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, x-api-key');

class Actions_new1 extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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








  public function index()
  {

    
  
  }





  public function nameschecker1(){

         $name = $this->input->post('name');
         $co = $this->input->post('co');

   


    $json['msg']= $this->Main->isExist3('columns','name_to_display', $name,'deleted',0,'company',$co)?FALSE:TRUE;

    $this->output->set_content_type('application/json')->set_output(json_encode($json));


  }





  public function nameschecker2(){

         $name = $this->input->post('name');
         $co = $this->input->post('co');


    $json['msg']= $this->Main->isExist3('columns','name_excel', $name,'deleted',0,'company',$co)?FALSE:TRUE;

    $this->output->set_content_type('application/json')->set_output(json_encode($json));


  }





  public function nameschecker12(){

         $name = $this->input->post('name');
         $id = $this->input->post('id');

   


    $json['msg']= $this->Main->isExist3('columns','name_to_display', $name,'deleted',0,'id !=',$id)?FALSE:TRUE;

    $this->output->set_content_type('application/json')->set_output(json_encode($json));


  }





  public function nameschecker22(){

         $name = $this->input->post('name');
         $id = $this->input->post('id');


    $json['msg']= $this->Main->isExist3('columns','name_excel', $name,'deleted',0,'id != ',$id)?FALSE:TRUE;

    $this->output->set_content_type('application/json')->set_output(json_encode($json));


  }




  public function addnewcol(){

         $co = $this->input->post('co');
         $name1 = $this->input->post('name1');
         $name2 = $this->input->post('name2');
         $slip = $this->input->post('slip');
         $deduct = $this->input->post('deduct');
         $type = $this->input->post('type');


  if($this->Main->isExist3('columns','name_to_display', $name1,'deleted',0,'company',$co)){

$json['msg'] = FALSE;
$json['des'] = "Name to Display in Reports Already Exist..";

  }elseif($this->Main->isExist3('columns','name_excel', $name2,'deleted',0,'company',$co)){

$json['msg'] = FALSE;
$json['des'] = "Name to Display in Excel Already Exist..";

  }else{


  $this->db->insert('columns', ['name_to_display'=>$name1, 'name_excel'=>$name2,'is_deduct'=>$deduct,'is_calculated_in_slip'=>$slip,'type'=>$type,'company'=>$co]);


      if($this->db->affected_rows() > 0 ){

        $json['msg'] = TRUE;
$json['des'] = "Successful";



      }else{

    $json['msg'] = FALSE;;
    $json['des'] = "Fail try again later";


      }



  }
  



    $this->output->set_content_type('application/json')->set_output(json_encode($json));




  }


  public function activatecol(){


            $id = $this->input->post('id');

      if($this->Main->mycolumn1('columns','is_active','id',$id) == 1){

$this->db->where('id',$id);
 $this->db->update('columns', ['is_active'=>0]);

      }else{


$this->db->where('id',$id);
  $this->db->update('columns', ['is_active'=>1]);

      }

  }



  public function deletecol(){

            $id = $this->input->post('id');

      
  $this->db->where('id',$id);
  $this->db->update('columns', ['deleted'=>1]);

      
  }







  public function editcol(){

         $id = $this->input->post('id');
         $name1 = $this->input->post('name1');
         $name2 = $this->input->post('name2');
         $slip = $this->input->post('slip');
         $deduct = $this->input->post('deduct');
         $type = $this->input->post('type');


  if($this->Main->isExist3('columns','name_to_display', $name1,'deleted',0,'id !=',$id)){

$json['msg'] = FALSE;
$json['des'] = "Name to Display in Reports Already Exist..";

  }elseif($this->Main->isExist3('columns','name_excel', $name2,'deleted',0,'id !=',$id)){

$json['msg'] = FALSE;
$json['des'] = "Name to Display in Excel Already Exist..";

  }else{


  $this->db->where('id',$id);
  $let = $this->db->update('columns', ['name_to_display'=>$name1, 'name_excel'=>$name2,'is_deduct'=>$deduct,'is_calculated_in_slip'=>$slip,'type'=>$type]);


      if($this->db->affected_rows() > 0 ){

        $json['msg'] = TRUE;
        $json['des'] = "Successful";



      }      elseif($this->db->affected_rows() <= 0 && $let){

           $json['msg'] = TRUE;
        $json['des'] = "Change atleast One Information";
}else{

    $json['msg'] = FALSE;;
    $json['des'] = "Fail try again later";


      }



  }
  



    $this->output->set_content_type('application/json')->set_output(json_encode($json));




  }







  public function addpayroll(){

    $co = $this->input->post('co');
    $name = $this->input->post('name');
    $name = date('Y-m-d', strtotime($name));

    
if(!$this->Main->isExist3('payroll_rec','name',$name,'company',$co,'deleted <',1)){

    if( $co == null ||  $name==null){

      $json['msg'] = FALSE;
      $json['des'] = 'Error :  Please Try Again';



    }else{


            $this->db->insert('payroll_rec',['admin'=>$this->session->userdata('userid'), 'company'=>$co, 'name'=>$name]);

           
      if($this->db->affected_rows() > 0){
      $json['msg'] = TRUE;
      $json['des'] = 'Successful ';
      }else{

        $json['msg'] = FALSE;
        $json['des'] = 'Fail!, please try again  or Contact Our Support Team';
      }

    }

  }else{
$json['msg'] = FALSE;
      $json['des'] = 'Error :  The Month to pay Exist please choose another or Add details to an existed one.';

  }
  



    $this->output->set_content_type('application/json')->set_output(json_encode($json));


  }



  public function savepayrollsettings(){

    $payroll = $this->input->post('payroll');
    $co = $this->input->post('index');


    $mydata = $this->Main->all3('columns','deleted',0,'company', $co ,'is_active',1);
$i = 0;
                         if(!empty($mydata)){foreach ($mydata as $key => $value) {



if(!$this->Main->isExist3('payroll_columns','columsid',$value['id'], 'payroll',$payroll,'company',$value['company'] )){

  $this->db->insert('payroll_columns', ['payroll'=>$payroll,'name_to_display'=>$value['name_to_display'], 'name_excel'=>$value['name_excel'],'is_deduct'=>$value['is_deduct'],'is_calculated_in_slip'=>$value['is_calculated_in_slip'],'type'=>$value['type'],'company'=>$value['company'], 'columsid'=>$value['id']]);
      $i++;

}
                         }



            return $i;

                       }



  }




  public function editpayroll(){

    $co = $this->input->post('co');
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $name = date('Y-m-d', strtotime($name)); 

    
if(!$this->Main->isExist3('payroll_rec','name',$name,'id !=',$id,'deleted <',1)){


    if( $co == null || $name==null || $id==null){

      $json['msg'] = FALSE;
      $json['des'] = 'Error :  Please Try Again';



    }else{


            $this->db->where('id', $id);
            $this->db->where('company', $co);
            $amo = $this->db->update('payroll_rec',['name'=>$name]);

           
      if($this->db->affected_rows() > 0 ){
      $json['msg'] = TRUE;
      $json['des'] = 'Successful ';
      }else if($this->db->affected_rows() <= 0 && $amo ){


        $json['msg'] = FALSE;
        $json['des'] = 'Fail!, Change atleast one value';

      }else{

        $json['msg'] = FALSE;
        $json['des'] = 'Fail!, please try again  or Contact Our Support Team';
      }

    }
    }else{
$json['msg'] = FALSE;
      $json['des'] = 'Error :  The Month to pay Exist please choose another or Add details to an existed one.';

  }
  
  

    $this->output->set_content_type('application/json')->set_output(json_encode($json));

  }



  public function deletepayroll(){

    $id = $this->input->post('id');
    
    


    if(  $id==null){

      $json['msg'] = FALSE;
      $json['des'] = 'Error :  Please Try Again';



    }else{


            $this->db->where('id', $id);
      
            $amo = $this->db->update('payroll_rec', ['deleted'=>1]);

           
      if($this->db->affected_rows() > 0 ){
      $json['msg'] = TRUE;
      $json['des'] = 'Successful ';
      }else{

        $json['msg'] = FALSE;
        $json['des'] = 'Fail!, please try again  or Contact Our Support Team';
      }

    }
  
    $this->output->set_content_type('application/json')->set_output(json_encode($json));

  }








  public function senddata10(){

    $data = $_GET['data'];
    $company = $_GET['co'];
    $payroll = $_GET['payroll'];
    $json['data'] = $data;
    

  $new  = $data;


if(!empty($data)){
$value = $data;



     $result = $this->employeetoregister($value, $company, $payroll);

     if($result['msg']){

       $json['msg'] = TRUE;
     }else{ $json['msg'] = FALSE;}

     }else{$json['msg'] = FALSE;}
  
  // echo $k;
 //    $json['msg'] = TRUE;
  // $json['des'] = ($k-1). ' Employee Added';


    $this->output->set_content_type('application/json')->set_output(json_encode($json));



  }





  public function employeetoregister($value, $co, $payroll){

 if($value['email'] == null  || $value['names'] == null || $value['phone_no'] == null ){


    $json['msg'] = FALSE;

 }else{

 if($this->Main->isExist2('employees','email', $value['email'], 'company_id', $co)){

 $employee = $this->Main->mycolumn2('employees','id','email', $value['email'], 'company_id', $co);

 }else{

 $this->db->insert('employees', ['full_name'=>$value['names'], 'email'=>$value['email'], 'phone'=>$value['phone_no'], 'company_id'=>$co]);

   if($this->db->affected_rows() > 0 ){

     $employee = $this->db->insert_id();
       }else{ $employee = 0;}


 }


  if($employee == 0){$json['msg'] = FALSE;}else{


   $mydata = $this->Main->all2('payroll_columns','payroll',$payroll,'company',$co);
$i = 0;
    if(!empty($mydata)){foreach ($mydata as $key => $value2) {

    $myvalue = ($value[''.$this->Main->mycolumn1('payroll_columns', 'name_excel','id',$value2['id'])] != null)?$value[''.$this->Main->mycolumn1('payroll_columns', 'name_excel','id',$value2['id'])]:'';

if(!$this->Main->isExist3('payrollrecords','value_id',$value2['id'], 'payroll',$payroll,'employee',$employee )){

  $this->db->insert('payrollrecords', ['payroll'=>$payroll,'employee'=>$employee,'company'=>$co,'value_id'=>$value2['id'],'value'=>$myvalue]);

}else{

    $myvalue = ($value[''.$this->Main->mycolumn1('payroll_columns', 'name_excel','id',$value2['id'])] != null)?$value[''.$this->Main->mycolumn1('payroll_columns', 'name_excel','id',$value2['id'])]:'';

     $this->db->where('value_id',$value2['id']);
     $this->db->where('payroll',$payroll);
     $this->db->where('employee',$employee);
     $this->db->where('company',$co);
    $this->db->update('payrollrecords', ['value'=>$myvalue]);

}
   
       $json['msg'] = TRUE;

    }}

 

  }}
  




return $json;

  }




















}



