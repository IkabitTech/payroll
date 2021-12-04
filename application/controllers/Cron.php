<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
    
    
    

  public function cron_email()
  
  {
     $payroll_id = $this->db->select('payroll_id')
                  ->get_where('sent_emails', array('sent_status' =>0))
                  ->row()
                  ->payroll_id;
     
       $company_id = $this->db->select('company')
                  ->get_where('payroll_rec', array('id' =>$payroll_id))
                  ->row()
                  ->company;
                  
                  
      $company_info = $this->db
                  ->get_where('clients', array('id' =>$company_id))
                  ->row();
                  
          
                  $minutes_interval =14;
                 //select employes from sent_emails db
               $this->db->where('payroll_id', $payroll_id);
                $this->db->where('sent_status',1);
                $this->db->order_by('id',"desc");
               $last_row = $this->db->get('sent_emails');
               $last_row=$last_row->row();     
               
           
           
               
               $current_date = date('Y-m-d H:i:s');
                
               $last_date = new DateTime($last_row->updated_date);
              $since_start = $last_date->diff(new DateTime($current_date));
          
              
              $total_different_minutes = ($since_start->h*60 + $since_start->i);
              
             
               
                if($total_different_minutes > $minutes_interval){
                 
                   $this->db->where('sent_status',0);
               $this->db->where('payroll_id',$payroll_id);
               $this->db->group_by('employee_id');
               $all =   $this->db->get('sent_emails',80);
               $all = $all->result_array();
               
             
               
               if(!empty($all))
               
                {
                   foreach ($all as $key => $a)
                     {
                         $employee = $a['employee_id'];
if($payroll_id > 0 && $employee > 0 && $company_id >=0){
    
     
      
      if(!$this->Main->isExist3('payrollrecords', 'payroll',$payroll_id,'employee',$employee,'company',  $company_id )){ 
          
      }else{
          
    $this->load->model('Main');

 $data = null;
 $data['payroll'] = $payroll_id;
 $page = 'records/salary_slip/'.$payroll_id.'/'.$employee.'/';
 $data['mypage'] = 'SALARY SLIP';
 $data['secret'] = 'sslip';
 $data['user'] = $employee;
 $data['companyindex'] = $company_id;
$data['menuactive'] = 'payroll';
$data['company_info']=$company_info;
$data['pageTitle'] =strtoupper( $company_info->name." ". date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll_id) )) .' PAYROLL' ) ;



 $msg = $this->load->view('hr/cron_email', $data,TRUE);
  
   $action =  $this->send_email("feedback@vipajijobs.com",$this->Main->mycolumn1('employees','email', 'id',$employee), $data['pageTitle'] , $msg);
   
    if(!$action){
      
      echo 'no email sent';
  }else{
  
   // update sent_emails folder
 $this->db->where('employee_id',$employee);
   $this->db->where('payroll_id',$payroll_id);
  $this->db->update('sent_emails',['sent_status'=>1,'updated_date'=>date('Y-m-d H:i:s')]);
  
  }
  
  
     
             
             
         }
                        
                    }
                   
                     }
                  
                }
                
                }

}
 
 
   public  function send_email($from, $to, $subject, $msg){
    
    $config = Array(
'protocol' => 'smtp',
'smtp_host' => 'mail.vipajijobs.com',
'smtp_port' => 587,
'smtp_user' => 'feedback@vipajijobs.com', 
'smtp_pass' => 'reedq074z4', 
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

         $this->load->library('email', $config);
         $this->email->set_newline("\r\n");
        $this->email->from($from, 'SALARY SLIP');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->reply_to($to,'NAME');
        $this->email->set_header('MIME-Version', '1.0\r\n');
      // $this->email->set_header('Content-Type', 'text/html');
       $this->email->set_mailtype("html");
       
        
        $mail_sent=$this->email->send();
        
        return $mail_sent ? true : false;
          
    
         }
         
         
}

?>