<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'functions.php';


class Actions extends CI_Controller {

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



     public function amontest(){



       echo hash_pass('amon');


       }





	public function index()
	{

		$username2 = null;
		 $password = null;

		 $posted = $this->input->post();

		// $posted = json_decode($posted);
		 $username2 = $this->input->post('username');
		 $password = $this->input->post('password');

		

		
		$this->db->select('*');
	 $this->db->where('username', $username2);
	 $this->db->where('password', md5($password));
	 $query = $this->db->get('admins');

	 $this->db->select('*');
	 $this->db->where('username', $username2);
	 $this->db->where('password', md5($password));
	 $query2 = $this->db->get('employees');
	 

//	echo json_encode($query);
	
	 if( $query->num_rows() > 0){

		
	//return	$query->result_array();
	 
	$query = $query->result_array();
	// echo json_encode($query);


	// echo json_encode($query[0]['id']);

	$company = array();
	$this->db->select('*');
	 $this->db->where('admin', $query[0]['id']);
	 $query2 = $this->db->get('companyadmins');
	 $query2 = $query2->result_array();
	$alladmincompanies = $query2;

	

	if(count($alladmincompanies) > 0){

		 foreach($alladmincompanies as $key=>$value2){
		array_push($company , array('name'=>$this->Main->mycolumn1('clients', 'name', 'id', $value2['client'] ), 'logo'=>$this->Main->mycolumn1('clients', 'logo', 'id', $value2['client'] ),'id'=>$value2['client']));

		}
	}
			$newdata = array(
				'username'  => $username2,
				'email'     => $query[0]['email_address'],
				'logged' => TRUE,
				'userid' => $query[0]['id'],
				'level' => $query[0]['level'],
				'companyarray' => $company
		);
		
		$this->session->set_userdata($newdata);
			$json['msg'] = TRUE;
			$json['data'] = $this->session->userdata();

		}else{ 
			
			$json['msg'] = FALSE;

		 }
		 		 $this->output->set_content_type('application/json')->set_output(json_encode($json));
	
	}


	public function test(){

		echo json_encode($this->Main->mycolumn1('admins','username','id', 1));
	}

	public function addBeneficialFund(){

		$name = $this->input->post('name');
		$percent = $this->input->post('percent');
		$employee_percent = $this->input->post('epercent');
		$employer_percent = $this->input->post('rpercent');
		$min = $this->input->post('min');
		$topup = $this->input->post('topup');
		$company = $this->input->post('co');
		$caltype = $this->input->post('caltype');
		$amount = $this->input->post('amount');
		$calcfrom = $this->input->post('calcfrom');



		// $name = '2';
		// $percent = 20;
		// $employee_percent = 5;
		// $employer_percent = 3;
		// $min =1;
		// $topup = 100;
		// $company = 3;



		
		if($name == null  || (($employee_percent == null || $employer_percent == null|| $percent == null) && $amount == null) || $company == null || $caltype == null ){

			$json['msg'] = FALSE;
			$json['des'] = 'Enter Required Fields';



		}else if($this->Main->isExist3('benefits_funds','name',$name ,'is_deleted', '0' ,'company_id', $company)){

			$json['msg'] = FALSE;
			$json['des'] = 'Cant Add Value Fund Already Exist';



		}else{


			$this->db->insert('benefits_funds', ['company_id'=>$company, 'name' => $name, 'percent' => $percent, 'employer_contribution' =>$employer_percent, 'employee_contribution' =>$employee_percent, 'min_amount' =>$min , 'topup_payer'=>$topup, 'amount'=> $amount, 'calculation_type' => $caltype,'cut_from'=>$calcfrom]);
			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}




	public function editBeneficialFund(){

		$percent = $this->input->post('percent');
		$employee_percent = $this->input->post('epercent');
		$employer_percent = $this->input->post('rpercent');
		$min = $this->input->post('min');
		$topup = $this->input->post('topup');
		$id = $this->input->post('id');
		$caltype = $this->input->post('caltype');
		$amount = $this->input->post('amount');
		$calcfrom = $this->input->post('calcfrom');



		// $percent = 2;
		// $employee_percent = 1;
		// $employer_percent = 2;
		// $min = 180000;
		// $topup = 'employer';
		// $id = 26;
		// $caltype = 'percentage';
		// $amount = '';
		// $calcfrom = 2;





		
		if($id == null || (($employee_percent == null || $employer_percent == null || $percent ==null) && $amount == null) ){

			$json['msg'] = FALSE;
			$json['des'] = 'Enter Required Fields';



		}else{


            $this->db->where('id',$id);
			$this->db->update('benefits_funds', [ 'percent' => $percent, 'employer_contribution' =>$employer_percent, 'employee_contribution' =>$employee_percent, 'min_amount' =>$min , 'topup_payer'=>$topup, 'amount'=> $amount, 'calculation_type' => $caltype,'cut_from'=>$calcfrom]);
			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}
	

  $json['p'] = $this->input->post();

		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}




	public function deleteBeneficialFund(){

		$id = $this->input->post('id');


		if($id == null  ){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{

            $this->db->where('id',$id);
			$this->db->update('benefits_funds', [ 'is_deleted' => 1]);
			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Deleted';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}






	public function dayscal(){

		$id = $this->input->post('id');
		$co = $this->input->post('co');

		// $id= 0;
		// $co = 4;
		$value='';
		if($id == 0){$value = 'fixed' ;}else{$value = 'attendance';}


		if($id == null || $co == null ){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Againii';



		}else{


            $this->db->where('company_id',$co);
			$me = $this->db->update('average_monthdays', [ 'calculation_type' => $value]);
			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else if($me && $this->db->affected_rows() < 1){


                 $json['msg'] = FALSE;
				$json['des'] = 'Value Already Saved. Please try another value if you really  need to make a change';

			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}

		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}



	public function daysval(){

		$days = $this->input->post('days');
		$co = $this->input->post('co');

		// $days = 25;
		// $co = 4;




		if($days == null || $co == null ){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else if($days > 31 || $days <= 0){

		$json['msg'] = FALSE;
				$json['des'] = 'Values are between 0 days to 31 days';


		}else{


            $this->db->where('company_id',$co);
			$me = $this->db->update('average_monthdays', [ 'no_days' => $days]);
			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else if($me && $this->db->affected_rows() < 1){


                 $json['msg'] = FALSE;
				$json['des'] = ' please Values have to be different';

			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}




	public function bonus(){

	//	$co = $this->input->post('co');
		$co = 4;


		if( $co == null ){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{


            $this->db->where('company',$co);

           $this->Main->mycolumn1('bonus', 'provided','company',$co) == 0 ? $this->db->update('bonus', [ 'provided' => 1]) : $this->db->update('bonus', [ 'provided' => 0]) ;

			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}





	public function bonusname(){

		$co = $this->input->post('co');
		$name = $this->input->post('name');
	

		if( $co == null ){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else if( $name == null || $name == '' ){

			$json['msg'] = FALSE;
			$json['des'] = 'Name Cant be Empty';



		}else{


            $this->db->where('company',$co);

            $me = $this->db->update('bonus', [ 'name' => $name]) ;

			     
			if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else if($me && $this->db->affected_rows() < 1){


                 $json['msg'] = FALSE;
				$json['des'] = 'Value Already Saved. Please try another value if you really  need to make a change';

			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}





	public function nightovertime(){

		$co = $this->input->post('co');
		$action = $this->input->post('id');

		// $co = 4;
		// $action = 0;
	

		if( $co == null || $action == null  ){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{


			if($action == 0){

            $this->db->where('company',$co);

             $this->db->delete('have_night_overtime') ;

             if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Removed';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try againhh  or Contact Our Support Team';
			}

			}else if($action == 1){


            $this->db->insert('have_night_overtime', ['company' => $co]);

             if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}


			}else{


	             $json['msg'] = FALSE;
			  $json['des'] = 'Failling to proceed with your Request';
			  $json['des'] = $co. "  ".$action; 

			}


           

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}






	public function companyallowance(){

		$co = $this->input->post('co');
		$action = $this->input->post('action');
		$allowance = $this->input->post('allowance');

		// $co = 4;
		// $action = 0;
	

		if( $co == null || $action == null  || $allowance == null){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{


			if($action == 0){

            $this->db->where('company',$co);
            $this->db->where('allowance',$allowance);

             $this->db->delete('have_allowance') ;

             if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Removed';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

			}else if($action == 1){


            $this->db->insert('have_allowance', ['company' => $co, 'allowance' => $allowance]);

             if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}


			}else{


	             $json['msg'] = FALSE;
			  $json['des'] = 'Failling to proceed with your Request';
			  $json['des'] = $co. "  ".$action; 

			}


           

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}





	public function statusdeduction(){

		$co = $this->input->post('co');
		$action = $this->input->post('action');
		$status = $this->input->post('status');
		$deduction = $this->input->post('deduction');


		// $co= 4;
		// $action = 1;
		// $status = 1;
		// $deduction = 1;

		// $co = 4;
		// $action = 0;
	

		if( $co == null || $action == null  || $status == null || $deduction == null){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{


			if($action == 0){

            $this->db->where('company',$co);
            $this->db->where('deduction',$deduction);
            $this->db->where('status',$status);

             $this->db->delete('employment_status_deduction') ;

             if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Removed';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

			}else if($action == 1){


            $this->db->insert('employment_status_deduction', ['company' => $co, 'deduction' => $deduction,'status' => $status]);

             if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}


			}else{


	             $json['msg'] = FALSE;
			  $json['des'] = 'Failling to proceed with your Request';
			  $json['des'] = $co. "  ".$action; 

			}


           

		}
	



		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}





	public function addnewloan(){

// {type:loantype, employee:employee, amountreturn:amountreturn,amountgiven:amountgiven,paymentstyle:paymentstyle,stylevalue1:stylevalue1,stylevalue2:stylevalue2,startdate:startdate,enddate:enddate,paymentmethod:paymentmethod,accname:accname,accno:accno,description:description,giver:giver,bankname:bankname}

				$loantype = $this->input->post('loantype');
				$employee = $this->input->post('employee');
				$amountreturn = $this->input->post('amountreturn');
				$amountgiven = $this->input->post('amountgiven');
				$paymentstyle = $this->input->post('paymentstyle');
				$stylevalue1 = $this->input->post('stylevalue1');
				$stylevalue2 = $this->input->post('stylevalue2');
				$startdate = $this->input->post('startdate');
				$enddate = $this->input->post('enddate');
				$paymentmethod = $this->input->post('paymentmethod');
				$accname = $this->input->post('accname');
				$accno = $this->input->post('accno');
				$des = $this->input->post('description');
				$giver = $this->input->post('giver');
				$bankname = $this->input->post('bankname');
				$co = $this->input->post('co');
				$admin = $this->session->userdata('userid');



	
                $data=['loantype'=>$loantype, 'pay_style'=>$paymentstyle, 'employee'=>$employee,'amount'=>$amountgiven,'amount_to_return'=>$amountreturn, 'percent_basic' => $paymentstyle==2? $stylevalue1:0, 'percent_gross' => $paymentstyle==5? $stylevalue1:0, 'period_months'=> $paymentstyle==1? $stylevalue1:0 , 'amount_per_month_to_return' =>$paymentstyle==4? $stylevalue2:0 , 'startdate' => $startdate, 'enddate' => $enddate , 'paymentmethod' =>$paymentmethod, 'bank_name' => $paymentmethod=='bank'? $bankname:'','acc_name' => $paymentmethod=='bank'? $accname:'','acc_no' => $paymentmethod=='bank'? $accno:'', 'admin'=>$admin, 'description'=>$des , 'company'=>$co, 'giver'=>$giver];

				$go = $this->db->insert('loans' ,$data);

				 if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';
			$json['myid'] = $this->db->insert_id();
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
				$json['error'] = json_encode($go);
			}




		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}






     
	public function editnewloan(){



				$loantype = $this->input->post('loantype');
				$employee = $this->input->post('employee');
				$amountreturn = $this->input->post('amountreturn');
				$amountgiven = $this->input->post('amountgiven');
				$paymentstyle = $this->input->post('paymentstyle');
				$stylevalue1 = $this->input->post('stylevalue1');
				$stylevalue2 = $this->input->post('stylevalue2');
				$startdate = $this->input->post('startdate');
				$enddate = $this->input->post('enddate');
				$paymentmethod = $this->input->post('paymentmethod');
				$accname = $this->input->post('accname');
				$accno = $this->input->post('accno');
				$des = $this->input->post('description');
				$giver = $this->input->post('giver');
				$bankname = $this->input->post('bankname');
				$co = $this->input->post('co');
				$admin = $this->session->userdata('userid');
				$id = $this->input->post('id');




	
                $data=['loantype'=>$loantype, 'pay_style'=>$paymentstyle, 'employee'=>$employee,'amount'=>$amountgiven,'amount_to_return'=>$amountreturn, 'percent_basic' => $paymentstyle==2? $stylevalue1:0, 'percent_gross' => $paymentstyle==5? $stylevalue1:0, 'period_months'=> $paymentstyle==1? $stylevalue1:0 , 'amount_per_month_to_return' =>$paymentstyle==4? $stylevalue2:0 , 'startdate' => $startdate, 'enddate' => $enddate , 'paymentmethod' =>$paymentmethod, 'bank_name' => $paymentmethod=='bank'? $bankname:'','acc_name' => $paymentmethod=='bank'? $accname:'','acc_no' => $paymentmethod=='bank'? $accno:'', 'admin'=>$admin, 'description'=>$des , 'company'=>$co, 'giver'=>$giver];

				 $this->db->where('id' ,$id);
				$go = $this->db->insert('loans' ,$data);

				 if($this->db->affected_rows() > 0){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';
			$json['myid'] = $this->db->insert_id();
			}elseif($this->db->affected_rows() <=0 && $go){

            $json['msg'] = FALSE;
			$json['des'] = 'Change at least One Data/Information';
              

			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
				$json['error'] = json_encode($go);
			}




		$this->output->set_content_type('application/json')->set_output(json_encode($json));


	}






	public function addpayroll(){

		$co = $this->input->post('co');

		$name = $this->input->post('name');
		$name = date('Y-m-d', strtotime($name));

		
if(!$this->Main->isExist3('payroll_rec','name',$name,'company',$co,'deleted <',1)){

		if( $co == null || $start1==null || $end1==null || $name==null){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{


            $this->db->insert('payroll_rec',['fromdate'=>$start1 , 'todate'=>$end1, 'admin'=>$this->session->userdata('userid'), 'company'=>$co, 'name'=>$name]);

			     
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




	public function editpayroll(){

		$co = $this->input->post('co');
		$id = $this->input->post('id');
		$start1 = $this->input->post('start1');
		$end1 = $this->input->post('end1');
		$name = $this->input->post('name');
		$name = date('Y-m-d', strtotime($name)); 

		
if(!$this->Main->isExist3('payroll_rec','name',$name,'id !=',$id,'deleted <',1)){


		if( $co == null || $start1==null || $end1==null || $name==null || $id==null){

			$json['msg'] = FALSE;
			$json['des'] = 'Error :  Please Try Again';



		}else{


            $this->db->where('id', $id);
            $this->db->where('company', $co);
            $amo = $this->db->update('payroll_rec',['fromdate'=>$start1 , 'todate'=>$end1, 'name'=>$name]);

			     
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


	function deletepayemployee(){

		$payroll = $this->input->post('a');
		$employee = $this->input->post('b');

		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payrollrecords');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_arrears');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_bonus');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_employer_deductions');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_allowance');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_benefits_fund');



		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_loan_deductions');


$json['msg'] = TRUE;
$json['des'] = 'Successful';
$this->output->set_content_type('application/json')->set_output(json_encode($json));




	}






		function deletepayemployee2($payroll,$employee){

		// $payroll = $this->input->post('a');
		// $employee = $this->input->post('b');

		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payrollrecords');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_arrears');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_bonus');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_employer_deductions');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_allowance');


		$this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_benefits_fund');



	}





	public function payemployee(){


		$data = $this->input->post('mydata');
	

		$employee = $data['employee'];
		$co = $data['company'];
		$basic = $data['basic'];
		$wdays = $data['wdays'];
		$dayovertime = $data['dayovertime'];
		$holidayovertime = $data['holidayovertime'];
		$nightovertime = isset($data['nightovertime'])?$data['nightovertime']:0;
		$arrears = $data['arrears'];
		$employerdeduction = $data['employerdeduction'];
		$bonus = $data['bonus'];
		$reasons = $data['reasonemployerdeduction'];
		$payroll = $data['payroll'];
		$paye_value = $data['paye_value'];
		$paye_cutfrom = $data['paye_value_calcfrom'];
		$paypermonth = $this->Main->mycolumn1('payroll_rec','paypermonth','id',$payroll);



		// $data =  array("basic"=>"390000.00","wdays"=>"24.373","dayovertime"=>"0","holidayovertime"=>"0","allowance3"=>"0","allowance2"=>"0","allowance1"=>"0","arrears"=>"0","employerdeduction"=>"0","reasonemployerdeduction"=>"","bonus"=>"0","employee"=>"610","payroll"=>"6","company"=>"1",""=>"on","paye_value"=>"1","paye_value_calcfrom"=>"3","deductions_value1"=>"1","deductions_value_calcfrom1"=>"3","deductions_value3"=>"1","deductions_value_calcfrom3"=>"3","deductions_value6"=>"1","deductions_value_calcfrom6"=>"3");


		 $avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);

		 if($avgdays>0){}else{$avgdays = 24.373; }


		if($this->Main->isExist3('payrollrecords','payroll',$payroll,'employee',$employee,'company',$co)){

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, The Employee is already Added, Check the Table and Edit Information';


		}else{

			if(!$basic || $basic <= 0 ||  !$wdays || $wdays <= 0   ){


               $json['msg'] = FALSE;
				$json['des'] = 'Fail!, Working Days and Basic Salary Must be Set Correctly!..';


		}else{ 

			// if(1==2){}else{

     $allloans = $this->Main->all3('loans', 'status','active', 'employee', $employee, 'startdate <= ',date("Y-m-d"));

    	$total = 0;

     if($allloans){
    

    	foreach ($allloans as $key => $value) {

    		if($value['pay_style'] == 1){

    			$amount = $value['amount_to_return']/$value['period_months'];
    			$amount = $amount/$paypermonth;

    		}else if($value['pay_style'] == 2){

    			$avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);

    			$amount = ($basic*$wdays/$avgdays) * $value['percent_basic'];

    		}else if($value['pay_style'] == 3){


    			$amount = $data['loan'+$value['id']];


    		}elseif ($value['pay_style'] == 4) {


    			$amount = $value['amount_per_month_to_return'];
    			$amount = $amount/$paypermonth;

    		}else{

    			$amount = 0;
    		}

    		$total +=$amount;

    	}

      }



        $this->db->insert('payrollrecords',['avgdays'=>$avgdays, 'payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'basic'=>$basic, 'daysinwork'=>$wdays, 'overtime_holiday_hours'=>$holidayovertime, 'overtime_day_hours'=>$dayovertime, 'overtime_night_hours'=>$nightovertime, 'paye_cut'=>$paye_value,'payecut_from'=>$paye_cutfrom, 'total_loans'=>$total]);

         if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';


			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

			if(isset($arrears) ){
			if( $arrears > 0){

				$this->db->insert('payroll_records_arrears',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$arrears]);

			}}

        if(isset($bonus) ){
			if( $bonus > 0){
				$this->db->insert('payroll_records_bonus',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$bonus]);
				
			}}


			if(isset($employerdeduction) ){
			if($employerdeduction > 0){

				$this->db->insert('payroll_records_employer_deductions',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$employerdeduction,'reasons'=>$reasons]) ;
				
			}}

			for($i=1; $i <6 ;$i++){

			
			if(isset($data['allowance'.$i])){
			if( $data['allowance'.$i] > 0){

				$this->db->insert('payroll_records_allowance',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$data['allowance'.$i],'allowance'=>$i]) ;
				
			}}}

			$mybs = $this->Main->all('benefittypes');

			$noMybs = count($mybs);

				for($i=1; $i < $noMybs ;$i++){

			if( isset($data['deductions_value'.$i]) ){

			if( $data['deductions_value'.$i] == 1 ){


				$myID = $this->Main->mycolumn4('benefits_funds','id','company_id',$co,'name',$i,'is_active',1,'is_deleted',0);

				$caltype = $this->Main->mycolumn1('benefits_funds','calculation_type','id',$myID);
				$eper = $this->Main->mycolumn1('benefits_funds','employee_contribution','id',$myID);
				$rper = $this->Main->mycolumn1('benefits_funds','employer_contribution','id',$myID);
				$min = $this->Main->mycolumn1('benefits_funds','min_amount','id',$myID);
				$topup = $this->Main->mycolumn1('benefits_funds','topup_payer','id',$myID);
				$amount = $this->Main->mycolumn1('benefits_funds','amount','id',$myID);
				$cut = $this->Main->mycolumn1('benefits_funds','cut_from','id',$myID);
				$bamount = ($eper + $rper)*$basic;

				
					$this->db->insert('payroll_records_benefits_fund',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co,'fund'=>$i,'employer_percent'=>$rper,'employee_percent'=>$eper, 'total_amount_basic'=>$bamount, 'total_amount_fixed'=>$amount, 'top_up_payer'=>$topup, 'cal_type'=>$caltype, 'cut_from'=>$cut, 'minimum_amount'=>$min]) ;
				}}}}}

   	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	}



	public function editpayemployee(){


		$data = $this->input->post('mydata');
	

		$employee = $data['employee'];
		$co = $data['company'];
		$basic = $data['basic'];
		$wdays = $data['wdays'];
		$dayovertime = $data['dayovertime'];
		$holidayovertime = $data['holidayovertime'];
		$nightovertime = $data['nightovertime'];
		$arrears = $data['arrears'];
		$employerdeduction = $data['employerdeduction'];
		$bonus = $data['bonus'];
		$reasons = $data['reasonemployerdeduction'];
		$payroll = $data['payroll'];
		$paye_value = $data['paye_value'];
		$paye_cutfrom = $data['paye_value_calcfrom'];
		$paypermonth = $this->Main->mycolumn1('payroll_rec','paypermonth','id',$payroll);

		$this->deletepayemployee2($payroll,$employee);


		if($this->Main->isExist3('payrollrecords','payroll',$payroll,'employee',$employee,'company',$co)){

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, The Employee is already Added, Check the Table and Edit Information';


		}else{

			if(!$basic || $basic <= 0 ||  !$wdays || $wdays <= 0   ){


               $json['msg'] = FALSE;
				$json['des'] = 'Fail!, Working Days and Basic Salary Must be Set Correctly!..';



		}else{ 

			// if(1==2){}else{


     $allloans = $this->Main->all3('loans', 'status','active', 'employee', $employee, 'startdate <= ',date("Y-m-d"));

    	$total = 0;

     if($allloans){
    

    	foreach ($allloans as $key => $value) {

    		if($value['pay_style'] == 1){

    			$amount = $value['amount_to_return']/$value['period_months'];
    			$amount = $amount/$paypermonth;

    		}else if($value['pay_style'] == 2){

    			$avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);

    			$amount = ($basic*$wdays/$avgdays) * $value['percent_basic'];

    		}else if($value['pay_style'] == 3){


    			$amount = $data['loan'+$value['id']];


    		}elseif ($value['pay_style'] == 4) {


    			$amount = $value['amount_per_month_to_return'];
    			$amount = $amount/$paypermonth;

    		}else{

    			$amount = 0;
    		}

    		$total +=$amount;

    	}

      }







       $this->db->insert('payrollrecords',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'basic'=>$basic, 'daysinwork'=>$wdays, 'overtime_holiday_hours'=>$holidayovertime, 'overtime_day_hours'=>$dayovertime, 'overtime_night_hours'=>$nightovertime, 'paye_cut'=>$paye_value,'payecut_from'=>$paye_cutfrom, 'total_loans'=>$total]);

         if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';


			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

			if(isset($arrears) ){
			if( $arrears > 0){

				$this->db->insert('payroll_records_arrears',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$arrears]);

			}}

            if(isset($bonus) ){
			if( $bonus > 0){
				$this->db->insert('payroll_records_bonus',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$bonus]);
				
			}}


			if(isset($employerdeduction) ){
			if($employerdeduction > 0){

				$this->db->insert('payroll_records_employer_deductions',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$employerdeduction,'reasons'=>$reasons]) ;
				
			}}

			for($i=1; $i <6 ;$i++){

			
			if(isset($data['allowance'.$i])){
			if( $data['allowance'.$i] > 0){

				$this->db->insert('payroll_records_allowance',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$bonus,'allowance'=>$i]) ;
				
			}}}

			$mybs = $this->Main->all('benefittypes');

			$noMybs = count($mybs);

				for($i=1; $i < $noMybs ;$i++){

			if( isset($data['deductions_value'.$i]) ){

			if( $data['deductions_value'.$i] == 1 ){


				$myID = $this->Main->mycolumn4('benefits_funds','id','company_id',$co,'name',$i,'is_active',1,'is_deleted',0);

				$caltype = $this->Main->mycolumn1('benefits_funds','calculation_type','id',$myID);
				$eper = $this->Main->mycolumn1('benefits_funds','employee_contribution','id',$myID);
				$rper = $this->Main->mycolumn1('benefits_funds','employer_contribution','id',$myID);
				$min = $this->Main->mycolumn1('benefits_funds','min_amount','id',$myID);
				$topup = $this->Main->mycolumn1('benefits_funds','topup_payer','id',$myID);
				$amount = $this->Main->mycolumn1('benefits_funds','amount','id',$myID);
				$bamount = ($eper + $rper)*$basic;

				
				$this->db->insert('payroll_records_benefits_fund',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co,'fund'=>$i,'employer_percent'=>$eper,'employee_percent'=>$eper, 'total_amount_basic'=>$bamount, 'total_amount_fixed'=>$amount, 'top_up_payer'=>$topup, 'cal_type'=>$caltype] ) ;
				}}
			}}
		}

   		$this->output->set_content_type('application/json')->set_output(json_encode($json));

	}





	public function editpayemployee2(){

 // $data =  array("employee"=>"2","payroll"=>"7","company"=>"1",""=>"on","paye_value"=>"1","paye_value_calcfrom"=>"3","deductions_value1"=>"1","deductions_value_calcfrom1"=>"1","deductions_value3"=>"0","deductions_value_calcfrom3"=>"1","deductions_value6"=>"1","deductions_value_calcfrom6"=>"1","loan3"=>"9000");

		$data = $this->input->post('mydata');
	

		$employee = $data['employee'];
		$co = $data['company'];
	
		
		$payroll = $data['payroll'];
		$paye_value = $data['paye_value'];
		$paye_cutfrom = $data['paye_value_calcfrom'];
		$paypermonth = $this->Main->mycolumn1('payroll_rec','paypermonth','id',$payroll);

        $this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_benefits_fund');

        $this->db->where('payroll',$payroll);
		$this->db->where('employee',$employee);
		$this->db->delete('payroll_records_loan_deductions');



		if(!$this->Main->isExist3('payrollrecords','payroll',$payroll,'employee',$employee,'company',$co)){

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, The Employee not Exist, Check the Table after page refresh';


		}else{

			


     $allloans = $this->Main->all3('loans', 'status','active', 'employee', $employee, 'startdate <= ',date("Y-m-d"));

     if(!empty($allloans)){


     $me =   $this->addloantoPayroll($payroll,$employee, $data);

    		// echo json_encode($data);
     }

    


       $this->db->where('payroll',$payroll);
	   $this->db->where('employee',$employee);
       $this->db->update('payrollrecords',['paye_cut'=>$paye_value,'payecut_from'=>$paye_cutfrom]);




         if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';


			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

			
			
			

			$mybs = $this->Main->all('benefittypes');

			$noMybs = count($mybs);

				for($i=1; $i < $noMybs ;$i++){

			if( isset($data['deductions_value'.$i]) ){

			if( $data['deductions_value'.$i] == 1 ){


				$myID = $this->Main->mycolumn4('benefits_funds','id','company_id',$co,'name',$i,'is_active',1,'is_deleted',0);

				$caltype = $this->Main->mycolumn1('benefits_funds','calculation_type','id',$myID);
				$eper = $this->Main->mycolumn1('benefits_funds','employee_contribution','id',$myID);
				$rper = $this->Main->mycolumn1('benefits_funds','employer_contribution','id',$myID);
				$min = $this->Main->mycolumn1('benefits_funds','min_amount','id',$myID);
				$topup = $this->Main->mycolumn1('benefits_funds','topup_payer','id',$myID);
				$amount = $this->Main->mycolumn1('benefits_funds','amount','id',$myID);

				
			$go=	$this->db->insert('payroll_records_benefits_fund',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co,'fund'=>$i,'employer_percent'=>$eper,'employee_percent'=>$eper, 'total_amount_fixed'=>$amount, 'top_up_payer'=>$topup, 'cal_type'=>$caltype, 'cut_from'=>$data['deductions_value_calcfrom'.$i]] ) ;
				}}
			}
		}


	        $json['msg'] = TRUE;
			$json['des'] = 'Successful Added';

   		$this->output->set_content_type('application/json')->set_output(json_encode($json));

	}





	public function payemployeenew($data){


		// $data = $this->input->post('mydata');
	

		$employee = $data['employee'];
		$co = $data['company'];
		$basic = $data['basic'];
		$wdays = $data['wdays'];
		$dayovertime = $data['dayovertime'];
		$holidayovertime = $data['holidayovertime'];
		$nightovertime = isset($data['nightovertime'])?$data['nightovertime']:0;
		$arrears = $data['arrears'];
		$employerdeduction = $data['employerdeduction'];
		$bonus = $data['bonus'];
		$reasons = $data['reasonemployerdeduction'];
		$payroll = $data['payroll'];
		$paye_value = $data['paye_value'];
		$paye_cutfrom = $data['paye_value_calcfrom'];
		$paypermonth = $this->Main->mycolumn1('payroll_rec','paypermonth','id',$payroll);



		// $data =  array("basic"=>"390000.00","wdays"=>"24.373","dayovertime"=>"0","holidayovertime"=>"0","allowance3"=>"0","allowance2"=>"0","allowance1"=>"0","arrears"=>"0","employerdeduction"=>"0","reasonemployerdeduction"=>"","bonus"=>"0","employee"=>"610","payroll"=>"6","company"=>"1",""=>"on","paye_value"=>"1","paye_value_calcfrom"=>"3","deductions_value1"=>"1","deductions_value_calcfrom1"=>"3","deductions_value3"=>"1","deductions_value_calcfrom3"=>"3","deductions_value6"=>"1","deductions_value_calcfrom6"=>"3");


		 $avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);

		 if($avgdays>0){}else{$avgdays = 24.373; }


		if($this->Main->isExist3('payrollrecords','payroll',$payroll,'employee',$employee,'company',$co)){}else{

			if(1==2){}else{ 

			// if(1==2){}else{

     $allloans = $this->Main->all3('loans', 'status','active', 'employee', $employee, 'startdate <= ',date("Y-m-d"));

    	$total = 0;

     if($allloans){
    

    	foreach ($allloans as $key => $value) {

    		if($value['pay_style'] == 1){

    			$amount = $value['amount_to_return']/$value['period_months'];
    			$amount = $amount/$paypermonth;

    		}else if($value['pay_style'] == 2){

    			$avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);

    			$amount = ($basic*$wdays/$avgdays) * $value['percent_basic'];

    		}elseif ($value['pay_style'] == 4) {


    			$amount = $value['amount_per_month_to_return'];
    			$amount = $amount/$paypermonth;

    		}else{

    			$amount = 0;
    		}

    		$total +=$amount;
             
    	}

      }



        $this->db->insert('payrollrecords',['avgdays'=>$avgdays, 'payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'basic'=>$basic, 'daysinwork'=>$wdays, 'overtime_holiday_hours'=>$holidayovertime, 'overtime_day_hours'=>$dayovertime, 'overtime_night_hours'=>$nightovertime, 'paye_cut'=>$paye_value,'payecut_from'=>$paye_cutfrom, 'total_loans'=>$total]);

         if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';


			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

			if(isset($arrears) ){
			if( $arrears > 0){

				$this->db->insert('payroll_records_arrears',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$arrears]);

			}}

        if(isset($bonus) ){
			if( $bonus > 0){
				$this->db->insert('payroll_records_bonus',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$bonus]);
				
			}}


			if(isset($employerdeduction) ){
			if($employerdeduction > 0){

				$this->db->insert('payroll_records_employer_deductions',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$employerdeduction,'reasons'=>$reasons]) ;
				
			}}

			for($i=1; $i <6 ;$i++){

			
			if(isset($data['allowance'.$i])){
			if( $data['allowance'.$i] > 0){

				$this->db->insert('payroll_records_allowance',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co, 'amount'=>$data['allowance'.$i],'allowance'=>$i]) ;
				
			}}}

			//add loans with id!=3 payment style

			$this->addloantoPayroll($payroll,$employee, null);

			$mybs = $this->Main->all('benefittypes');

			$noMybs = count($mybs);

				for($i=1; $i < $noMybs ;$i++){

			if( isset($data['deductions_value'.$i]) ){

			if( $data['deductions_value'.$i] == 1 ){


				$myID = $this->Main->mycolumn4('benefits_funds','id','company_id',$co,'name',$i,'is_active',1,'is_deleted',0);

				$caltype = $this->Main->mycolumn1('benefits_funds','calculation_type','id',$myID);
				$eper = $this->Main->mycolumn1('benefits_funds','employee_contribution','id',$myID);
				$rper = $this->Main->mycolumn1('benefits_funds','employer_contribution','id',$myID);
				$min = $this->Main->mycolumn1('benefits_funds','min_amount','id',$myID);
				$topup = $this->Main->mycolumn1('benefits_funds','topup_payer','id',$myID);
				$amount = $this->Main->mycolumn1('benefits_funds','amount','id',$myID);
				$cut = $data['deductions_value_calcfrom'.$i];
				$bamount = ($eper + $rper)*$basic;
				
				$this->db->insert('payroll_records_benefits_fund',['payroll'=>$payroll, 'employee'=>$employee, 'company'=>$co,'fund'=>$i,'employer_percent'=>$rper,'employee_percent'=>$eper, 'total_amount_basic'=>$bamount, 'total_amount_fixed'=>$amount, 'top_up_payer'=>$topup, 'cal_type'=>$caltype, 'cut_from'=>$cut]) ;
				}}}}}

   	  // $this->output->set_content_type('application/json')->set_output(json_encode($json));

	}






public function addloantoPayroll($payroll,$employee, $data = null){


    $allloans = $this->Main->all3('loans', 'status','active', 'employee', $employee, 'startdate <= ',date("Y-m-d"));
        		$paypermonth = $this->Main->mycolumn1('payroll_rec','paypermonth','id',$payroll);

    	$total = 0;
    	$amount  = 0;

    if($allloans){
    

    	foreach ($allloans as $key => $value) {
if($value['pay_style'] != 3){
    		if($value['pay_style'] == 1){

    			$amount = $value['amount_to_return']/$value['period_months'];
    			$amount = $amount/$paypermonth;

    			

    		}else if($value['pay_style'] == 2){

    			$avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $this->Main->mycolumn1('employees', 'company_id','id', $employee));

    			$amount = ($basic*$wdays/$avgdays) * $value['percent_basic'];


    		}else if($value['pay_style'] == 3){


    			$amount = $data['loan'+$value['id']];


    		}elseif ($value['pay_style'] == 4) {


    			$amount = $value['amount_per_month_to_return'];
    			$amount = $amount/$paypermonth;

    		}else if($value['pay_style'] == 5){


    			$amount = ($this->employeegross($payroll,$employee,$this->Main->mycolumn1('employees', 'company_id','id', $employee) )/100) * $value['percent_gross'];


    		}



    		$this->addloantoPayroll2($payroll,$value['company'],$employee,$value['id'],$amount,$value['paymentmethod'],$value['acc_name'],$value['acc_no'],$value['bank_name']);

         }else{ 

          if($data != null  && isset($data['loan'.$value['id']])){

            $amount = $data['loan'.$value['id']];
            $this->addloantoPayroll2($payroll,$value['company'],$employee,$value['id'],$amount,$value['paymentmethod'],$value['acc_name'],$value['acc_no'],$value['bank_name']);
          }

         }

    	}

    }



}







	public function employeegross($payroll, $emp, $co){

		



		 $avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);
		 $avghrs = $avgdays*8;

		
			# code...

				$mylist2 = $this->Main->all3('payrollrecords', 'payroll',$payroll, 'company',$co, 'employee',$emp);
		       $employee = $mylist2[0];



			$o1 = $employee['basic']* 2*$employee['overtime_holiday_hours']/$avghrs;
			$o2 = $employee['basic']* 1.5 *$employee['overtime_day_hours']/$avghrs;
			$o3 = 	$employee['basic']* 1.55 *$employee['overtime_night_hours']/$avghrs;

			if(!$o1){$o1=0;}if(!$o2){$o2=0;}if(!$o3){$o3=0;}



			$calculated_basic = ($employee['basic']*$employee['daysinwork']/$avgdays) ;
			$actual_basic = $employee['basic'];
			$gross = ($employee['basic']*$employee['daysinwork']/$avgdays) + $this->sumArrears($payroll,$co,$emp) +$this->sumBonus($payroll,$co,$emp) + $this->sumAllowance($payroll,$co,$emp) + $o1 + $o2 + $o3;

			

			return $gross;

		// echo json_encode($gross);


	}






public function addloantoPayroll2($payroll,$company,$employee,$loan,$amount,$method='cash',$accname=null,$accno=null,$bank=null){

 $mao = $this->db->insert('payroll_records_loan_deductions',['loan_id'=>$loan,'amount'=>$amount,'payroll'=>$payroll,'employee'=>$employee,'paymentmethod'=>$method,'bank_name'=>$bank,'acc_name'=>$accname,'acc_no'=>$accno,'company'=>$company]);

 return TRUE;

}



public function ConfirmedPayroll(){

		$co = $this->input->post('co');
		$payroll = $this->input->post('payroll');

		$mylist = $this->Main->all2('payrollrecords', 'payroll',$payroll, 'company',$co);


		 $avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $co);
		 $avghrs = $avgdays*8;

		if($mylist){foreach ($mylist as $key => $value) {
			# code...

				$mylist2 = $this->Main->all3('payrollrecords', 'payroll',$payroll, 'company',$co, 'employee',$value['employee']);
		       $employee = $mylist2[0];



			$o1 = $value['basic']* 2*$value['overtime_holiday_hours']/$avghrs;
			$o2 = $value['basic']* 1.5 *$value['overtime_day_hours']/$avghrs;
			$o3 = 	$value['basic']* 1.55 *$value['overtime_night_hours']/$avghrs;

			if(!$o1){$o1=0;}if(!$o2){$o2=0;}if(!$o3){$o3=0;}



			$calculated_basic = ($employee['basic']*$employee['daysinwork']/$avgdays) ;
			$actual_basic = $employee['basic'];
			$gross = ($employee['basic']*$employee['daysinwork']/$avgdays) + $this->sumArrears($payroll,$co,$value['employee']) +$this->sumBonus($payroll,$co,$value['employee']) + $this->sumAllowance($payroll,$co,$value['employee']) + $o1 + $o2 + $o3;

			$paye = $this->payecalculations($payroll, $co, $value['employee'], $gross, $calculated_basic,$actual_basic);

			$this->db->where('id',$value['id']);
			$this->db->update('payrollrecords',['o_holiday'=>$o1,'o_day'=>$o2,'o_night'=>$o3, 'paye'=>$paye]);

						$this->db->where('id',$payroll);
						$this->db->update('payroll_rec',['submitted'=>1]);

		// $me = 	$this->addloantoPayroll($payroll,$value['employee']);

		}
$json['msg'] = TRUE;
$json['des'] = 'Successful';
	}else{
			$json['msg'] = FALSE;
				$json['des'] = 'No any Record For Payroll';
		}
				   	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	}





	public function UnconfirmedPayroll(){

		$payroll = $this->input->post('payroll');

		$this->db->where('id',$payroll);
		$this->db->update('payroll_rec',['submitted'=>0]);

				$this->db->where('payroll',$payroll);
				$this->db->delete('payroll_records_loan_deductions');

				$json['msg'] = TRUE;
				$json['des'] = 'Successful';
				   	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	}



	public function ConfirmedPayroll2(){

		$payroll = $this->input->post('payroll');

		$this->db->where('id',$payroll);
		$this->db->update('payroll_rec',['confirmed'=>1]);


		$this->db->where('payroll',$payroll);
		$this->db->update('payroll_records_loan_deductions',['verified'=>1]);

				

				$json['msg'] = TRUE;
				$json['des'] = 'Successful';
				   	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	}




	public function UnconfirmedPayroll2(){

		$payroll = $this->input->post('payroll');

		$this->db->where('id',$payroll);
		$this->db->update('payroll_rec',['confirmed'=>0]);

		$this->db->where('payroll',$payroll);
		$this->db->update('payroll_records_loan_deductions',['verified'=>0]);

				

				$json['msg'] = TRUE;
				$json['des'] = 'Successful';
				   	$this->output->set_content_type('application/json')->set_output(json_encode($json));

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





  public function sumLoansDeducted($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_loan_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }




  public function sumAllLoansDeducted($company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_loan_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


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


 public function sumemployerDeductions($payroll,$company,$employee){

 	$this->db->select('SUM(amount) as amount');
 	$this->db->where('company', $company);
 	$this->db->where('employee',$employee);
 	$this->db->where('payroll',$payroll);
 	$this->db->group_by('employee');
 	$query = $this->db->get('payroll_records_employer_deductions');
 	

 if($query->num_rows() > 0){

 	$query = $query->result();

 	return $query[0]->amount;

 }else{

 	return 0;
 }


 }









      public function payecalculations($payroll, $company, $empl, $gross, $cal,$basic){

      	 $avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $company);
		 $avghrs = $avgdays*8;
		 $mylist = $this->Main->all3('payrollrecords', 'payroll',$payroll, 'company',$company, 'employee',$empl);
		 $employee = $mylist[0];

		 if($employee['paye_cut'] == 1){

		 	$socialsecurityfund = 0;
		 	$nssf = $this->Main->isExist3('payroll_records_benefits_fund','payroll',$payroll, 'employee',$empl,'fund',7);
		 	$pssf = $this->Main->isExist3('payroll_records_benefits_fund','payroll',$payroll, 'employee',$empl,'fund',1);

		 	if($nssf){ $socialsecurityfund = $this->calculatedfund($payroll, $company, $empl, 7, $gross, $cal,$basic); }else
		 	if($pssf){ $socialsecurityfund = $this->calculatedfund($payroll, $company, $empl, 1, $gross, $cal,$basic); }else
		 			 { $socialsecurityfund =0; }

		 			 if($socialsecurityfund != 0 && $socialsecurityfund != null){

		 			 	$socialsecurityfund = $socialsecurityfund['employee'];
		 			 }else{

                      $socialsecurityfund =0;

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

	return $PAYE;


		 }else{return 0; }

      }




      public function amon(){

 echo json_encode($this->calculatedfund(1, 1, 2, 1, 700000, 700000,700000));

      }



      public function calculatedfund($payroll, $company, $empl, $fund, $gross, $cal,$basic){

      	$avgdays = $this->Main->mycolumn1('average_monthdays', 'no_days','company_id', $company);
		 $avghrs = $avgdays*8;
		 $mylist = $this->Main->all3('payrollrecords', 'payroll',$payroll, 'company',$company, 'employee',$empl);
		 $employee = $mylist[0];

		 $myfund = $this->Main->all4('payroll_records_benefits_fund','payroll',$payroll, 'company',$company, 'employee',$empl,'fund',$fund);
		 $myfund = $myfund[0];

		 

		 if($myfund){

           if($myfund['cal_type'] == 'fixed'){

           $amount =  $myfund['total_amount_fixed'];
           return  ['employee'=> $amount,'employer' => 0 ,'topup'=>0,'topup_payer'=> ''];
          // echo json_encode($amon = array('me' => 7, 'you',8));

           }else{

           	if($myfund['cut_from'] == 1){

           		$employee_share = $basic *  $myfund['employee_percent']/100 ;
           		$topup_payer = $myfund['top_up_payer'];
           		$employer_share = $basic * $myfund['employer_percent']/100;
           		$topup = $basic * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 < $myfund['minimum_amount']? $myfund['minimum_amount'] - $basic * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 : 0 ;

           return  ['employee'=> $employee_share,'employer' => $employer_share ,'topup'=>$topup,'topup_payer'=> $topup_payer ];
  
           	}else if($myfund['cut_from'] == 2){

           		$employee_share = $cal * $myfund['employee_percent']/100 ;
           		$topup_payer = $myfund['top_up_payer'];
           		$employer_share = $cal * $myfund['employer_percent']/100;
           		$topup = $cal * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 < $myfund['minimum_amount']? $myfund['minimum_amount'] - $cal * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 : 0 ;

           return  ['employee'=> $employee_share,'employer' => $employer_share ,'topup'=>$topup,'topup_payer'=> $topup_payer ];
  
           	}else{

           		$employee_share = $gross * $myfund['employee_percent']/100 ;
           		$topup_payer = $myfund['top_up_payer'];
           		$employer_share = $gross * $myfund['employer_percent']/100;
           		$topup = $gross * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 < $myfund['minimum_amount']? $myfund['minimum_amount'] - $gross * ($myfund['employee_percent'] + $myfund['employer_percent'])/100 : 0 ;

           return  ['employee'=> $employee_share,'employer' => $employer_share ,'topup'=>$topup,'topup_payer'=> $topup_payer ];
  
           	}


           }

		 }


      }


      public function createpayroll($company, $payroll){



           $employee2 = $this->Main->all2('employees', 'status', 'active','company_id', $company );


$k = 0;
            if(!empty($employee2)){
                      
            foreach( $employee2 as $employee){

             if(!$this->Main->isExist3('payrollrecords', 'company',$company,'employee', $employee['id'], 'payroll' , $payroll) && $this->Main->isExist3('payroll_rec', 'id', $payroll, 'active', 1, 'deleted',0)  && $this->Main->isExist3('payroll_rec', 'id', $payroll, 'submitted', 0, 'confirmed',0)){


   $data = array();

             
	$data =  array(
		"basic"=>$this->Main->mycolumn2('employeesalary','amount','employee',$employee['id'],'company_id',$employee['company_id']),
		"wdays"=>$this->Main->mycolumn1('average_monthdays','no_days','company_id',$company),
		"dayovertime"=>"0",
		"holidayovertime"=>"0",
		"nightovertime"=>"0",
	     "arrears"=>"0",
	     "employerdeduction"=>"0",
	     "reasonemployerdeduction"=>"",
	     "bonus"=>"0",
	     "employee"=>$employee['id'],
	     "payroll"=>$payroll,
	     "company"=>$company,
		 "paye_value"=>"1",
		 "paye_value_calcfrom"=>"3" );



 //fee; allowances
	for($i=1; $i <6 ;$i++){

			
		
			if($this->Main->mycolumn3('employeeallowances','amount','company',$company,'employee', $employee['id'], 'allowance', $i)  > 0){

       // array($data , array('allowance'.$i.'' => $this->Main->mycolumn2('employeeallowances','amount','company',$company,'employee', $employee['id']) ));

				$data['allowance'.$i.''] = $this->Main->mycolumn2('employeeallowances','amount','company',$company,'employee', $employee['id']);
				
			}

		}



	 $bfc = $this->Main->all3('benefits_funds','is_active', '1','is_deleted', '0' ,'company_id', $company);

      if(!empty($bfc)){foreach( $bfc as $bf){

       $bfc2 = $this->Main->isExist3('employment_status_deduction','status',$employee['employment_status'] ,'deduction', $bf['name'] ,'company', $company);

           
      if($bfc2){

         $data['deductions_value'.$bf['name'].''] =1;
        $data['deductions_value_calcfrom'.$bf['name'].''] =$this->Main->mycolumn2('benefits_funds','cut_from','name', $bf['name'] ,'company_id', $company);

   } } }


    $this->payemployeenew($data);




        // echo json_encode($data).'END </br> </br> </br> </br> </br>';
     $k++;
  }

}


} echo  $k;}

//delete data of payroll
  public function dli($payroll){


		$this->db->where('payroll',$payroll);
		$this->db->delete('payrollrecords');


		$this->db->where('payroll',$payroll);
		$this->db->delete('payroll_records_arrears');


		$this->db->where('payroll',$payroll);
		$this->db->delete('payroll_records_bonus');


		$this->db->where('payroll',$payroll);
		$this->db->delete('payroll_records_employer_deductions');


		$this->db->where('payroll',$payroll);
		$this->db->delete('payroll_records_allowance');


		$this->db->where('payroll',$payroll);
		$this->db->delete('payroll_records_benefits_fund');


		$this->db->where('payroll',$payroll);
		$this->db->delete('payroll_records_loan_deductions');





  }



 
	
}
