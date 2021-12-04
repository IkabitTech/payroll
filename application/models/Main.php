<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Model {

	public function __construct(){

		parent::__construct();
	}

public function dologin($username, $password){

	$this->db->select('*');
	 $this->db->where('username', $username);
	 $this->db->where('password', md5($password));
	 $query = $this->db->get('admins');

	echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array();
	 }

}


public function mycolumn1($table, $col, $col1, $id1){

	$this->db->select('*');
	 $this->db->where($col1, $id1);
	 $query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array()[0][$col];


	 }else{return FALSE;};

}


public function mycolumn2($table, $col, $col1, $id1, $col2, $id2){

	$this->db->select('*');
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array()[0][$col];


	 }else{return FALSE;};

}


public function mycolumn3($table, $col, $col1, $id1, $col2, $id2,$col3,$id3){

	$this->db->select('*');
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array()[0][$col];


	 }else{return FALSE;};

}




public function mycolumn4($table, $col, $col1, $id1, $col2, $id2,$col3,$id3,$col4,$id4){

	$this->db->select('*');
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$this->db->where($col4, $id4);
	$query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array()[0][$col];


	 }else{return FALSE;};

}



  public function InstallementEmployeePayroll($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->where('verified',1);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_loan_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }

 }




  

  public function InstallementEmployeeLoanId($loanid,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('loan_id',$loanid);
 	$this->db->where('verified',1);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_loan_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }

 }










public function all($table){

	$this->db->select('*');
	
	$query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array();


	 }else{return FALSE;};

}




    public function getColValue($table, $col , $data){
        
        $this->db->where($data);
        $v = $this->db->get($table);
        $v = $v->result_array();
        if(!empty($v)){ return $v[0][$col];}else{return '';}
        
     
    }
    
    
     
    public function exist($table, $data){
        
        $this->db->where($data);
        $v = $this->db->get($table);
        $v = $v->result_array();
        if(!empty($v)){ return TRUE;}else{return FALSE;}
        
     
    }
    
    
     public function updating($table, $data1 , $data2){
        
        $this->db->where($data1);
        $this->db->update($table,$data2);

         if($this->db->affected_rows() > 0){
            return TRUE;
        }
        
        else{
            return FALSE;
        }
        
     
    }
    
  

    
         
       public function all_order($table, $data , $order1 = null, $order2 = null , $order3 = null, $order4 = null , $order5 = null, $order6 = null ){
        
        $this->db->where($data);
        $this->db->order_by($order1, $order2);
        $this->db->order_by($order3, $order4);
        $this->db->order_by($order5, $order6);
    
        $v = $this->db->get($table);
        
        
        $data = array();
        
  if(!empty($v) && $v->num_rows() > 0){
    $data = $v->result_array();
}

    return $data;
      
        
     
    }
    
    
    


public function all1($table, $col1, $id1){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);

	$query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array();


	 }else{return FALSE;};

}










public function all2($table, $col1, $id1, $col2, $id2){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);

	$query = $this->db->get($table);

	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array();


	 }else{return FALSE;};

}




public function all3($table, $col1, $id1, $col2, $id2, $col3, $id3){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array();


	 }else{return FALSE;};

}





public function all4($table, $col1, $id1, $col2, $id2, $col3, $id3, $col4, $id4){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$this->db->where($col4, $id4);
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	$query->result_array();


	 }else{return FALSE;};

}




public function isExist3($table, $col1, $id1, $col2, $id2, $col3, $id3){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	TRUE;


	 }else{return FALSE;};

}




public function isExist4($table, $col1, $id1, $col2, $id2, $col3, $id3, $col4, $id4){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$this->db->where($col4, $id4);
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	TRUE;


	 }else{return FALSE;};

}




public function isExist5($table, $col1, $id1, $col2, $id2, $col3, $id3, $col4, $id4, $col5, $id5){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$this->db->where($col3, $id3);
	$this->db->where($col4, $id4);
	$this->db->where($col5, $id5);
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	TRUE;


	 }else{return FALSE;};

}








public function isExist2($table, $col1, $id1, $col2, $id2){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	$this->db->where($col2, $id2);
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	TRUE;


	 }else{return FALSE;};

}



public function isExist1($table, $col1, $id1){

	
	$this->db->select('*');
	
	$this->db->where($col1, $id1);
	
	$query = $this->db->get($table);


	//echo json_encode($query);
	
	 if( $query->num_rows() > 0){
	return	TRUE;


	 }else{return FALSE;};

}






  public function sumBonus($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_bonus');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }




  public function sumAllowance($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_allowance');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }








  public function sumArrears($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_arrears');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }




      public function payecalculations($payroll, $company, $empl, $gross, $cal,$basic){

      	 $avgdays = $this->mycolumn1('average_monthdays', 'no_days','company_id', $company);
		 $avghrs = $avgdays*8;
		 $mylist = $this->all3('payrollrecords', 'payroll',$payroll, 'company',$company, 'employee',$empl);
		 $employee = $mylist[0];

		 if($employee['paye_cut'] == 1){

		 	$socialsecurityfund = 0;
		 	$nssf = $this->isExist3('payroll_records_benefits_fund','payroll',$payroll, 'employee',$empl,'fund',7);
		 	$pssf = $this->isExist3('payroll_records_benefits_fund','payroll',$payroll, 'employee',$empl,'fund',1);

		 	if($nssf){ $socialsecurityfund4 = $this->calculatedfund($payroll, $company, $empl, 7, $gross, $cal,$basic); }else
		 	if($pssf){ $socialsecurityfund4 = $this->calculatedfund($payroll, $company, $empl, 1, $gross, $cal,$basic); }else
		 			 { $socialsecurityfund4 =0; }

		 			 if($socialsecurityfund4 != 0 && $socialsecurityfund4 != null){

		 			 	$socialsecurityfund = $socialsecurityfund4['employee'];
		 			 	$socialsecurityfund2 =$socialsecurityfund4['employer'];
                      $socialsecurityfund3 =$socialsecurityfund4['topup'];
		 			 }else{

                      $socialsecurityfund =0;
                      $socialsecurityfund2 =0;
                      $socialsecurityfund3 =0;

		 			 }



//FINDING WHAT SALARY TO RESPONSIBLE FOR PAYE

                 // if($employee['payecut_from'] ==1){$gross_salary = $basic; }else
                 // if($employee['payecut_from'] ==2){$gross_salary = $cal; }else
                 // 								  {$gross_salary = $gross; }

				$taxable_salary = ($gross - $socialsecurityfund);
				$PAYE = 0;

if ($taxable_salary > 720000 )
	{
		$amt1 = 98100;
		$amt2 = 720000;
		$PAYE = $amt1 + (0.3 * ($taxable_salary-$amt2));
	}
elseif ($taxable_salary <= 720000  && $taxable_salary > 540000) {
		$amt1 = 53100;
		$amt2 = 540000;
		$PAYE = $amt1 + (0.25 * ($taxable_salary-$amt2));
	}
elseif ($taxable_salary <= 540000 && $taxable_salary > 360000) {
		$amt1 = 17100;
		$amt2 = 360000;
		$PAYE = $amt1 + (0.2 * ($taxable_salary-$amt2));
	}
elseif($taxable_salary <= 360000 && $taxable_salary > 170000)
	{
		$amt1 = 170000;
		$PAYE = 0.09 * ($taxable_salary-$amt1);
	}
elseif($taxable_salary <= 170000 )
	{
		$PAYE = (0 * $taxable_salary);
	}
else{
		$PAYE = 0 ;
	}

	return ['PAYE'=>$PAYE,'social'=>$socialsecurityfund, 'social2'=>$socialsecurityfund2, 'topup'=>$socialsecurityfund3, 'taxable'=>$taxable_salary];


		 }else{

		 	$socialsecurityfund = 0;
		 	$nssf = $this->isExist3('payroll_records_benefits_fund','payroll',$payroll, 'employee',$empl,'fund',7);
		 	$pssf = $this->isExist3('payroll_records_benefits_fund','payroll',$payroll, 'employee',$empl,'fund',1);

if($nssf){ $socialsecurityfund4 = $this->calculatedfund($payroll, $company, $empl, 7, $gross, $cal,$basic); }else
		 	if($pssf){ $socialsecurityfund4 = $this->calculatedfund($payroll, $company, $empl, 1, $gross, $cal,$basic); }else
		 			 { $socialsecurityfund4 =0; }

		 			 if($socialsecurityfund4 != 0 && $socialsecurityfund4 != null){

		 			 	$socialsecurityfund = $socialsecurityfund4['employee'];
		 			 	$socialsecurityfund2 =$socialsecurityfund4['employer'];
                      $socialsecurityfund3 =$socialsecurityfund4['topup'];
		 			 }else{

                      $socialsecurityfund =0;
                      $socialsecurityfund2 =0;
                      $socialsecurityfund3 =0;

		 			 }


		 			 return ['PAYE'=>0,'social'=>$socialsecurityfund, 'social2'=>$socialsecurityfund2, 'topup'=>$socialsecurityfund3, 'taxable'=>($gross)];

		 }
		 // else{return FALSE; }

      }



        public function calculatedfund($payroll, $company, $empl, $fund, $gross, $cal,$basic){

      	$avgdays = $this->mycolumn1('average_monthdays', 'no_days','company_id', $company);
		 $avghrs = $avgdays*8;
		 $mylist = $this->all3('payrollrecords', 'payroll',$payroll, 'company',$company, 'employee',$empl);
		 $employee = $mylist[0];

		 $myfund = $this->all4('payroll_records_benefits_fund','payroll',$payroll, 'company',$company, 'employee',$empl,'fund',$fund);
		 $myfund = $myfund[0];

		 

		 if($myfund){

           if($myfund['cal_type'] == 'fixed'){

           $amount =  $myfund['total_amount_fixed'];
           return  ['employee'=> $amount,'employer' => 0 ,'topup'=>0,'topup_payer'=> '','actual'=> $amount];
          // echo json_encode($amon = array('me' => 7, 'you',8));

           }else{

           	if($myfund['cut_from'] == 1){

           		$employee_share = $basic *  $myfund['employee_percent']/100 ;
           		$topup_payer = $myfund['top_up_payer'];
           		$employer_share = $basic * $myfund['employer_percent']/100;
           		$topup = $basic * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 < $myfund['minimum_amount']? $myfund['minimum_amount'] - $basic * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 : 0 ;
                        $actual = $basic * ($myfund['employee_percent'] + $myfund['employer_percent'])/100;

           return  ['employee'=> $employee_share,'employer' => $employer_share ,'topup'=>$topup,'topup_payer'=> $topup_payer,'actual'=> $actual ];
  
           	}else if($myfund['cut_from'] == 2){

           		$employee_share = $cal * $myfund['employee_percent']/100 ;
           		$topup_payer = $myfund['top_up_payer'];
           		$employer_share = $cal * $myfund['employer_percent']/100;
           		$topup = $cal * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 < $myfund['minimum_amount']? $myfund['minimum_amount'] - $cal * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 : 0 ;
                        $actual = $cal * ($myfund['employee_percent'] + $myfund['employer_percent'])/100;

           return  ['employee'=> $employee_share,'employer' => $employer_share ,'topup'=>$topup,'topup_payer'=> $topup_payer ,'actual'=> $actual];
  
           	}else{

           		$employee_share = $gross * $myfund['employee_percent']/100 ;
           		$topup_payer = $myfund['top_up_payer'];
           		$employer_share = $gross * $myfund['employer_percent']/100;
           		$topup = $gross * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 < $myfund['minimum_amount']? $myfund['minimum_amount'] - $gross * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 : 0 ;
                        $actual = $gross * ($myfund['employee_percent'] + $myfund['employer_percent'])/100;

           return  ['employee'=> $employee_share,'employer' => $employer_share ,'topup'=>$topup,'topup_payer'=> $topup_payer ,'actual'=> $actual ];
  
           	}


           }

		 }else{return ['employee'=> 0,'employer' => 0 ,'topup'=>0,'topup_payer'=> '','actual'=>0 ];}


      }







  public function sumLoansDeducted($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->where('verified',1);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_loan_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }




  public function sumLoansDeducted0($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->where('verified',0);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_loan_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }



 function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}




 // public function chattinlist($me_id,$me_level){

   

 //     $this->db->select('*');
 //     $this->db->where('(from_id = "'.$me_id.'" AND from_level = "'.$me_level.'" ) OR ( to_id = "'.$me_id.'" AND to_level = "'.$me_level.'" )');
 //     $this->db->order_by('created','DESC');
     
 //     $q = $this->db->get('chatmessages');
 //     $q= $q->result();

 //     return $q;


 // }




 // public function userlist(){

   
 //     // $this->db->order_by('names','ASC');
 //     $q = $this->db->query('select employees.id as "id",  employees.username as  "username" ,  employees.level as  "level" , concat(employees.first_name," ",employees.middle_name," ",employees.last_name) as "names" from employees UNION select admins.id as "id",  admins.username as "username" ,  admins.level as  "level", admins.full_name as "names"   from admins ORDER BY names ');

   
 //     $q= $q->result();

 //     return $q;


 // }









	public function chattinlist($id,$status){

   // echo   json_encode($this->chattinlist($id,$status));



     $this->db->select('*');
     $this->db->where('(from_id = "'.$id.'" AND from_level = "'.$status.'" ) OR ( to_id = "'.$id.'" AND to_level = "'.$status.'" )');
     $this->db->order_by('created','DESC');
     
     $q = $this->db->get('chatmessages');
     $q= $q->result();

     $values = $q;

	  // $values = $this->chattinlist($id,$status);
      $json = array();
$i = 0;
      foreach ($values as  $value) {

      	$you_id = ($value->from_id == $id && $value->from_level == $status)?$value->to_id:$value->from_id;
      	$you_status = ($value->from_id == $id && $value->from_level == $status)?$value->to_level:$value->from_level;



      	if($this->checklistrep($json,$you_id,$you_status) || $i == 0){

// echo '__'.$you_id.'__'.$you_status.'__</br>';
    
 if($id == $you_id && $status == $you_status ){}else{

      $data['you_names'] = ($you_status > 0 && $you_status < 5)?
      $this->mycolumn1('admins','full_name','id',$you_id).'  -  '.$this->mycolumn1('admins','username','id',$you_id).'':
      $this->mycolumn1('employees','first_name','id',$you_id).' '.$this->mycolumn1('employees','last_name','id',$you_id).' - '.$this->mycolumn1('employees','username','id',$you_id).'';




        $data['working'] = $this->workinguser($you_id ,$you_status );
      	$data['you_id'] = $you_id;
      	$data['text_id'] = $value->id;
      	$data['you_status'] = $you_status;
      	$data['msg'] = $value->msg;
        $data['time'] = date('M d Y, H:i:s', strtotime($value->created));
        array_push($json, $data);
      	
    }}
       $i++;
   }

    return $json;

	}


	public function userlist($id,$status){


 $q = $this->db->query('select employees.id as "id",  employees.username as  "username" ,  employees.level as  "level" , concat(employees.first_name," ",employees.middle_name," ",employees.last_name) as "names" from employees UNION select admins.id as "id",  admins.username as "username" ,  admins.level as  "level", admins.full_name as "names"   from admins ORDER BY names ');

   
     $q= $q->result();

     $values = $q;


	  // $values = $this->userlist($id,$status);
      $json = array();

      foreach ($values as  $value) {

      	if($status < 5 && $status > 0){

           $presence = $this->isExist2('admins','deleted',0,'id',$id);

      	}else{

      		$presence = $this->isExist1('employees','id',$id);
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

      			$data['working'] = 'Employee - '. $this->mycolumn1('clients', 'name','id' , $this->mycolumn1('employees', 'company_id','id', $value->id));
      			$data['level'] = 5;

      	}  array_push($json, $data);



      }


      
      	
    
      }

    return $json;

	}




 function workinguser($id,$status){

   if($status == 1){

      		$data['working'] = 'Super Admin';

      	}else if($status == 2){

      		$data['working'] = 'Manager';

      	}else if($status == 3){

      		$data['working'] = 'Main Accountant';

      	}else if($status == 4){

      		$data['working'] = 'Branch Accountant';

      	}else{

      			$data['working'] = 'Employee - '. $this->mycolumn1('clients', 'name','id' , $this->mycolumn1('employees', 'company_id','id', $id));

      	}


      	return $data['working'];

 }


	



	public function checklistrep($data,$val1,$val2){


     $i= 0;
     foreach ($data as  $value){
     	if($val1 == $value['you_id'] && $val2 == $value['you_status'] ){
         
           $i++;
     	}

     }

     
     	if($i>0){return FALSE;}else {
     		return TRUE;
     	}

 }



	public function checkaccessuser($id, $status, $id2, $status2){


		if($id == $id2 && $status == $status2){ return FALSE;}

		elseif($status ==  1 || $status2 == 1){
      return TRUE;

		}elseif($status == 2 || $status == 3 || $status == 4){

        if($status2 == 2 || $status2 == 3 || $status == 4){

        	$admins_ass = $this->all('companyadmins');

        	if(empty($admins_ass)){ return FALSE;}else{
               $i = 0;
        		foreach ($admins_ass as $value) {
               if($value['admin'] == $id){

               	 if($this->isExist2('companyadmins','admin',$id2,'client' ,$value['client'])){

               	 	$i++;
               	 }

               }
        			
        			
        		}

             if($i > 0){return TRUE;}else{return FALSE;}
        	}


        }elseif($status2 != 1 &&$status2 != 2 && $status2 != 3 &&$status2 != 4 ){


        	$admins_ass = $this->all('companyadmins');

        	if(empty($admins_ass)){ return FALSE;}else{
               $i = 0;
        		foreach ($admins_ass as $value) {

               if($value['admin'] == $id){

               	 if($this->isExist2('employees','id',$id2,'company_id', $value['client'])){

               	 	$i++;
               	 }

               }
        			
        			
        		}

             if($i > 0){return TRUE;}else{return FALSE;}
        	}

        }

    }elseif($status != 1 &&$status != 2 && $status != 3 &&$status != 4 ){

    	if($status2 != 1 &&$status2 != 2 && $status2 != 3 &&$status2 != 4){

    		$comp = $this->mycolumn1('employees','company_id','id',$id2);
    		$comp2 = $this->mycolumn1('employees','company_id','id',$id);
    		if($comp == $comp2){return TRUE;}else{return FALSE;}


    	}else{

    		$comp2 = $this->mycolumn1('employees','company_id','id',$id);
    		$C = $this->isExist2('companyadmins','admin',$id2,'client', $comp2);
    		if($C){return TRUE;}else{return FALSE;}

    	}

    }

	}





   



















	
}
