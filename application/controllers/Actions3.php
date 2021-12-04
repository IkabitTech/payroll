<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Headers: *');
header('Access-Control-Allow-Method: GET,HEAD,OPTIONS,POST,PUT,PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, x-api-key');

class Actions3 extends CI_Controller {

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
        //    $this->genlib->checkLogin();
  }
  public function index(){
  }
  public function nameschecker1(){
    $me_id = $this->input->post('from_id');

  }
  public function chat2(){
    $this->load->view('common/chat2.php');
  }

  public function chattinlist($id,$status){
   // echo   json_encode($this->Main->chattinlist($id,$status));
    $values = $this->Main->chattinlist($id,$status);
    $json = array();
      foreach ($values as  $value) {
        $you_id = ($value->from_id == $id && $value->from_level == $status)?$value->to_id:$value->from_id;
        $you_status = ($value->from_id == $id && $value->from_level == $status)?$value->to_level:$value->from_level;
        if($this->checklistrep($json,$you_id,$you_status)){
        $data['you_id'] = $you_id;
        $data['text_id'] = $value->id;
        $data['you_status'] = $you_status;
        $data['msg'] = $value->msg;
        $data['time'] = date('M d Y, H:i:s', strtotime($value->created));
        array_push($json, $data);
        }
      }
    $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }

  public function userlist($id,$status){
   // echo   json_encode($this->Main->chattinlist($id,$status));
    $values = $this->Main->userlist($id,$status);
    $json = array();
      foreach ($values as  $value) {
        if($status < 5 && $status > 0){
          $presence = $this->Main->isExist2('admins','deleted',0,'id',$id);
        }else{
          $presence = $this->Main->isExist1('employees','id',$id);
        }
        if($this->checkaccessuser($id, $status, $value->id, $value->level) && $presence){
        $data['names'] = $value->names;
        $data['username'] = $value->username;
        $data['id'] = $value->id;
        $data['level'] = $value->level;
        if($value->level == 1){
          $data['working'] = 'Super Admin';
          $data['level'] = 1;
        }else if($value->level == 2){
          $data['working'] = 'Manager';
          $data['level'] = 2;
        }else if($value->level == 3){
          $data['working'] = 'Main Accountant';
          $data['level'] = 3;
        }else if($value->level == 4){
          $data['working'] = 'Branch Accountant';
          $data['level'] = 4;
        }else{
          $data['working'] = 'Employee - '. $this->Main->mycolumn1('clients', 'name','id' , $this->Main->mycolumn1('employees', 'company_id','id', $value->id));
          $data['level'] = 5;
        }  array_push($json, $data);
      }
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }
  public function testin($i, $s){
    echo json_encode($this->Main->chattinlist($i,$s));
  }
  public function checklistrep($data,$val1,$val2){
    if(!empty($data)){
      foreach ($data as  $value){
        if($val1 == $value['you_id'] && $val2 == $value['you_status'] ){
          return FALSE;
        }else{
          return TRUE;
        }
      }
    }else{
      return TRUE;
    }
  }
  public function checkaccessuser($id, $status, $id2, $status2){
    if($id == $id2 && $status == $status2){ return FALSE;}
    elseif($status ==  1 || $status2 == 1){
      return TRUE;
    }elseif($status == 2 || $status == 3 || $status == 4){
        if($status2 == 2 || $status2 == 3 || $status == 4){
          $admins_ass = $this->Main->all('companyadmins');
          if(empty($admins_ass)){ return FALSE;}else{
            $i = 0;
            foreach ($admins_ass as $value) {
               if($value['admin'] == $id){
                 if($this->Main->isExist2('companyadmins','admin',$id2,'client' ,$value['client'])){
                  $i++;
                 }
               }
            }
            if($i > 0){return TRUE;}else{return FALSE;}
          }
        }elseif($status2 != 1 &&$status2 != 2 && $status2 != 3 &&$status2 != 4 ){
          $admins_ass = $this->Main->all('companyadmins');
          if(empty($admins_ass)){ return FALSE;}else{
          $i = 0;
            foreach ($admins_ass as $value) {
              if($value['admin'] == $id){
                if($this->Main->isExist2('employees','id',$id2,'company_id', $value['client'])){
                $i++;
                 }
               }
            }
            if($i > 0){
              return TRUE;
            }else{
              return FALSE;
            }
          }
        }
    }elseif($status != 1 &&$status != 2 && $status != 3 &&$status != 4 ){
      if($status2 != 1 &&$status2 != 2 && $status2 != 3 &&$status2 != 4){
        $comp = $this->Main->mycolumn1('employees','company_id','id',$id2);
        $comp2 = $this->Main->mycolumn1('employees','company_id','id',$id);
        if($comp == $comp2){return TRUE;}else{return FALSE;}
      }else{
        $comp2 = $this->Main->mycolumn1('employees','company_id','id',$id);
        $C = $this->Main->isExist2('companyadmins','admin',$id2,'client', $comp2);
        if($C){return TRUE;}else{return FALSE;}
      }
    }
  }

  public function addmsg(){
    $me_id = $this->input->post('from_id');
    $me_level = $this->input->post('from_status');
    $you_id = $this->input->post('to_id');
    $you_level = $this->input->post('to_status');
    $msg = $this->input->post('msg');
    $amo = $this->db->insert(' chatmessages',['from_id'=>$me_id, 'from_level'=>$me_level, 'to_id'=>$you_id,'to_level'=>$you_level,'msg'=>$msg]);
    if($this->db->affected_rows() > 0 ){
    $json['req'] = TRUE;
    $id= $this->db->insert_id();
    $json['id'] = $id;
    $json['msg'] = $msg;
    $json['time'] = date('M d Y, H:i:s', strtotime($this->Main->mycolumn1('chatmessages','created','id',$id)));
    $this->db->where('id',$id);
    $this->db->update('chatmessages',['from_new'=>0]);
    }else{
      $json['msg'] = FALSE;
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }

  public function viewallmsg(){
    $me_id = $this->input->post('from_id');
    $me_level = $this->input->post('from_status');
    $you_id = $this->input->post('to_id');
    $you_level = $this->input->post('to_status');
    $this->db->select('*');
    $this->db->where('(from_id = "'.$me_id.'" AND from_level = "'.$me_level.'" AND to_id = "'.$you_id.'" AND to_level = "'.$you_level.'" ) OR (from_id = "'.$you_id.'" AND from_level = "'.$you_level.'" AND to_id = "'.$me_id.'" AND to_level = "'.$me_level.'" )');
    $this->db->order_by('created','ASC');
    $q = $this->db->get('chatmessages');
    $q= $q->result();
    $json['req'] = TRUE;
    $json['me_id'] = $me_id;
    $json['me_status'] = $me_level;
    $json['you_name'] = ($you_level==5)? $this->Main->mycolumn1('employees','first_name', 'id',$you_id).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$you_id) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$you_id):$this->Main->mycolumn1('admins','full_name', 'id',$you_id) ;
    $json['you_id'] = $you_id ;
    $json['you_status'] = $you_level;
    $json['chats']= array();
      if(!empty($q)){foreach ($q as  $value) {
        $data['msg'] = $value->msg;
        $data['time'] = date('M d Y, H:i:s', strtotime($value->created));
        $data['from'] = ($value->from_id == $me_id && $value->from_level == $me_level)?'me':'you';
        $data['id'] = $value->id;
        if(($value->from_id == $you_id && $value->from_level == $you_level && $value->to_new == 1)){
          $this->db->where('id',$value->id);
          $this->db->update('chatmessages',['to_new'=>0]);
       }
       array_push($json['chats'], $data);
      }
    }
   $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }

  public function viewallmsg2(){
     $me_id = $this->input->post('to_id');
     $me_level = $this->input->post('to_status');
     $you_id = $this->input->post('from_id');
     $you_level = $this->input->post('from_status');
     $this->db->select('*');
     $this->db->where('(from_id = "'.$you_id.'" AND from_level = "'.$you_level.'" AND to_id = "'.$me_id.'" AND to_level = "'.$me_level.'"  AND to_new = "1" )');
     $this->db->order_by('created','ASC');
     $q = $this->db->get('chatmessages');
     $q= $q->result();
     $json['req'] = TRUE;
     $json['me_id'] = $me_id;
     $json['me_status'] = $me_level;
     $json['you_name'] = ($you_level==5)? $this->Main->mycolumn1('employees','first_name', 'id',$you_id).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$you_id) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$you_id):$this->Main->mycolumn1('admins','full_name', 'id',$you_id) ;
     $json['you_id'] = $you_id ;
     $json['you_status'] = $you_level;
    $json['chats']= array();
     if(!empty($q)){foreach ($q as  $value) {
       $data['msg'] = $value->msg;
       $data['time'] = date('M d Y, H:i:s', strtotime($value->created));
       $data['from'] = ($value->from_id == $me_id && $value->from_level == $me_level)?'me':'you';
       $data['id'] = $value->id;
      if(($value->from_id == $you_id && $value->from_level == $you_level && $value->to_new == 1)){
        $this->db->where('id',$value->id);
        $this->db->update('chatmessages',['to_new'=>0]);
       }
       array_push($json['chats'], $data);
     }}
   $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }


  public function email($from, $to, $subject, $msg){
    // $headers = "From:  carl.care@ops.com\r\nReply-To: ". $to;
    // $headers .= "MIME-Version: 1.0\r\n";
    // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    // $mail_sent = @mail( $to, $subject, $msg, $headers );
    // return $mail_sent ? true : false;

    $this->load->library('email');
        $config = Array(
                'protocol' => 'sendmail',
                'mailpath' => '/usr/sbin/sendmail',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
               );

         $this->email->initialize($config);// add this line

        //$this->email->set_newline("\r\n");
        $this->email->from('noreply@grantcarlcare.co.tz', 'carl care');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($msg);
        return $this->email->send() ? true : false;
        //$this->email->send();
        //return true;
        // echo $this->email->print_debugger();





  }

  public  function send_email($from, $to, $subject, $msg){


//     $config = Array(
//       'protocol' => 'smtp',
//       'smtp_host' => 'mail.vipajijobs.com',
//       'smtp_port' => 587,
//       'smtp_user' => 'feedback@vipajijobs.com',
//       'smtp_pass' => 'reedq074z4',
//       'mailtype' => 'html',
//       'charset' => 'iso-8859-1',
//       'wordwrap' => TRUE
//     );
//     $this->load->library('email', $config);
//     $this->email->set_newline("\r\n");
//     $this->email->from($from, 'SALARY SLIP');
//     $this->email->to($to);
//     $this->email->subject($subject);
//     $this->email->message($msg);
//     $this->email->reply_to($to,'NAME');
//     $this->email->set_header('MIME-Version', '1.0\r\n');
//   // $this->email->set_header('Content-Type', 'text/html');
//     $this->email->set_mailtype("html");
//     $mail_sent=$this->email->send();
//     return $mail_sent ? true : false;


  $this->load->library('email');
        $config = Array(
                'protocol' => 'sendmail',
                'mailpath' => '/usr/sbin/sendmail',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
               );

         $this->email->initialize($config);// add this line

        //$this->email->set_newline("\r\n");
        $this->email->from('noreply@grantcarlcare.co.tz', 'carl care');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($msg);
        return $this->email->send() ? true : false;



  }

   public function testemail(){
      $payroll = 4;
      $employee = 4;
      $companyindex =1;
      if($payroll > 0 && $employee > 0 && $companyindex >=0){
        if(!$this->Main->isExist3('payrollrecords', 'payroll',$payroll,'employee',$employee,'company',  $this->session->userdata('companyarray')[$companyindex]['id'] )  ){
          $json['msg'] = FALSE;
          $json['des'] = 'No Record For User';
        }else{
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
          $msg = $this->load->view('hr/mypayrollslip10', $data,TRUE);
          if($this->Main->isExist4('employees', 'email !=',null, 'email !=', '','id',$employee,'company_id',  $this->session->userdata('companyarray')[$companyindex]['id'] )){
          $action =  $this->email("salaryslip",'amonmfuruki@gmail.com', $data['pageTitle'] , $msg);
          if(!$action){
              $json['msg'] = FALSE;
              $json['des'] = 'Email Fail to be Sent';
            }else{
              $json['msg'] = TRUE;
              $json['des'] = 'Email Sent to '.$this->Main->mycolumn1('employees','email', 'id',$employee);
            }
          }else{
            $json['msg'] = FALSE;
            $json['des'] = 'User have no email' ;
            $json['have_email'] = FALSE;
          }
        }
      }else{
      $json['msg'] = FALSE;
      $json['des'] = 'Missing Some Important Detail';
  }
   $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }


    /**
     * save unfinished email onclick
     */
  public function save_unfinished_emails()
{
    $payroll_id = $this->input->post('payroll');
    $company_id =$this->input->post('coindex');


    //insert data into table
    $this->db->insert(' sent_emails',['employee_id'=>$v['employee'], 'payroll_id'=>$v['payroll'], 'email'=>$third_row->value,'created_date'=>date('Y-m-d H:i:s')]);


}

  public function salary_slip_all(){
    $payroll = $this->input->post('payroll');
    $companyindex =$this->input->post('coindex');
    $json['des'] = '<b>Email Sent to: </b></br> ';
    $json['des2'] = '<b style="color:red">Email Fail to: </b></br> ';
    $i = 0;
    $k = 0;
    $this->db->where('payroll', $payroll);
    $this->db->where('company', $this->session->userdata('companyarray')[$companyindex]['id']);
    $this->db->group_by('employee');
    $all =   $this->db->get('payrollrecords');
    $all = $all->result_array();

     // get payroll id
    $this->db->where('payroll_id', $payroll);
    $exist_payroll = $this->db->get('sent_emails');
    $exist_payroll=$exist_payroll->row();
    if(empty($exist_payroll)){

    //  create a table and imput data in sent emails
      if(!$exist_payroll){
        foreach($all as $key=>$v){
          $payrollrecords = $this->db->select('*')->from('payrollrecords')->where('payroll',$v['payroll'])->where('employee',$v['employee'])->get()->result();
          $third_row= $payrollrecords[2];
          $this->db->insert(' sent_emails',['employee_id'=>$v['employee'], 'payroll_id'=>$v['payroll'], 'email'=>$third_row->value,'created_date'=>date('Y-m-d H:i:s')]);
        }
      }
      //first 90 email to send
      $this->db->where('sent_status',0);
      $this->db->where('payroll_id',$payroll);
      $this->db->group_by('employee_id');
      $all =   $this->db->get('sent_emails',80);
      $all = $all->result_array();
      if(!empty($all)){
        foreach ($all as $key => $a) {
          $employee = $a['employee_id'];
            if($payroll > 0 && $employee > 0 && $companyindex >=0){
              if(!$this->Main->isExist3('payrollrecords', 'payroll',$payroll,'employee',$employee,'company',  $this->session->userdata('companyarray')[$companyindex]['id'] ) ){
              }else{
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
                $msg = $this->load->view('hr/mypayrollslip3', $data,TRUE);
                if($this->Main->isExist4('employees', 'email !=',null, 'email !=', '','id',$employee,'company_id',  $this->session->userdata('companyarray')[$companyindex]['id'] )){
                  $action =  $this->send_email("feedback@vipajijobs.com",$this->Main->mycolumn1('employees','email', 'id',$employee), $data['pageTitle'] , $msg);
                  if(!$action){
                    $json['msg'] = FALSE;
                    $json['des'] = 'Email Fail to be Sent';
                    $json['des2'] .=  '<span style="corol:red">'.$this->Main->mycolumn1('employees','email', 'id',$employee).'<span></br>';
                    $k++;
                  }else{
                    //update sent_emails folder
                    $this->db->where('employee_id',$employee);
                    $this->db->where('payroll_id',$payroll);
                    $this->db->update('sent_emails',['sent_status'=>1,'updated_date'=>date('Y-m-d H:i:s')]);
                    $i++;
                  //  $json['msg'] = TRUE;
                    $json['des'] .=  $this->Main->mycolumn1('employees','email', 'id',$employee).'</br>';
                  }
                }else{
                //      // $json['msg'] = FALSE;
                //      // $json['des'] = 'User have no email' ;
                //       //$json['have_email'] = FALSE;
                }
              }
            }else{
              //$json['msg'] = FALSE;
              //$json['des'] = 'Missing Some Important Detail';
          }
        }
      }
      if($i > 0 && $k<=0){$json['msg'] = TRUE;}
      if($i <= 0 && $k>0){$json['msg'] = FALSE;$json['des'] = $json['des2'];}
      if($i <= 0 && $k<=0){$json['msg'] = FALSE;$json['des'] = 'No Email Sent';}
      if($i > 0 && $k>0){$json['msg'] = TRUE;$json['des'] .=  $json['des2'];}

	  }else{$json['msg'] = FALSE;$json['des'] = 'Allready sent email to this payroll';}

 $this->output->set_content_type('application/json')->set_output(json_encode($json));
 }

  public function salary_slip(){
    $payroll = $this->input->post('payroll');
    $employee = $this->input->post('employee');
    $companyindex =$this->input->post('coindex');
    if($payroll > 0 && $employee > 0 && $companyindex >=0){
      if(!$this->Main->isExist3('payrollrecords', 'payroll',$payroll,'employee',$employee,'company',  $this->session->userdata('companyarray')[$companyindex]['id'] )  ){
        $json['msg'] = FALSE;
        $json['des'] = 'No Record For User';
      }else{
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
        $msg = $this->load->view('hr/mypayrollslip3', $data,TRUE);
        if($this->Main->isExist4('employees', 'email !=',null, 'email !=', '','id',$employee,'company_id',  $this->session->userdata('companyarray')[$companyindex]['id'] )){
          $action =  $this->send_email("feedback@vipajijobs.com",$this->Main->mycolumn1('employees','email', 'id',$employee), $data['pageTitle'] , $msg);
          if(!$action){
            $json['msg'] = FALSE;
            $json['des'] = 'Could not send Email to '.$this->Main->mycolumn1('employees','email', 'id',$employee);
          }else{
            $json['msg'] = TRUE;
            $json['des'] = 'Email Sent to '.$this->Main->mycolumn1('employees','email', 'id',$employee);
          }
          }else{
          $json['msg'] = FALSE;
          $json['des'] = 'User have no email' ;
          $json['have_email'] = FALSE;
        }
      }
    }else{
      $json['msg'] = FALSE;
      $json['des'] = 'Missing Some Important Detail';
    }
   $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }

  public function salary_slip2(){
    $this->load->model('Main');
    $email = ($this->input->post('email') != null )?$this->input->post('email'):null;
    $payroll = ($this->input->post('payroll') != null )?$this->input->post('payroll'):null;
    $employee = ($this->input->post('employee') != null )?$this->input->post('employee'):null;
    $companyindex =($this->input->post('coindex') != null )?$this->input->post('coindex'):0;
      if($email && $payroll && $employee && $companyindex){
        if(!$this->Main->isExist3('payrollrecords', 'payroll',$payroll,'employee',$employee,'company',  $this->session->userdata('companyarray')[$companyindex]['id'] )  ){
          $json['msg'] = FALSE;
          $json['des'] = 'No Record For User';
        }else{
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
          $msg = $this->load->view('user/mypayrollslip3', $data, TRUE);
          $action =  $this->send_email("feedback@vipajijobs.com",$email, $data['pageTitle'] , $msg);
          if(!$action){
          $json['msg'] = FALSE;
          $json['des'] = 'Email Fail to be Sent';
          }else{
            $json['msg'] = TRUE;
            $json['des'] = 'Email Sent.';
          }
        }
      }else{
        $json['msg'] = FALSE;
        $json['des'] = 'Missing Some Important Details';
      }
    $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }

  public function loanchagestatus(){
    $status = ($this->input->post('status') != null )?$this->input->post('status'):null;
    $id = ($this->input->post('id') != null )?$this->input->post('id'):null;
    if($status && $id){
      $json['msg'] = TRUE;
      $json['des'] = 'Successful';
      $this->db->where('id',$id);
      $this->db->update('loans',['status'=>$status]);
    }else{
      $json['msg'] = FALSE;
      $json['des'] = 'Missing Some Important Details';
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($json));
  }



 public function test_amon(){

      $this->load->library('email');
        $config = Array(
                'protocol' => 'sendmail',
                'mailpath' => '/usr/sbin/sendmail',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
               );

         $this->email->initialize($config);// add this line

        $this->email->set_newline("\r\n");
        $this->email->from('vipaji@vipaji.co.tz', 'Garima');
        $this->email->to('amonmfuruki@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        echo $this->email->print_debugger();
 }




}



