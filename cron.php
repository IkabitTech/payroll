<?php

  $email='chrissoemma@gmail.com';
              
 $this->db->insert(' sent_emails',['employee_id'=>11, 'payroll_id'=>11, 'email'=>$email,'created_date'=>date('Y-m-d H:i:s')]);
 
 
    function send_email($from, $to, $subject, $msg){
    
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.grantcarlcare.co.tz',
  'smtp_port' => 2525,
  'smtp_user' => 'noreply@grantcarlcare.co.tz',
   'mailtype'  => 'html', 
  'smtp_pass' => 'grantt#@87p',
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

?>