<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Headers: *');
header('Access-Control-Allow-Method: GET,HEAD,OPTIONS,POST,PUT,PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, x-api-key');

class Actions2 extends CI_Controller {

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

	}




	public function index()
	{

		
	
	}


	public function editthingsinpayrollrecords($id, $value, $col){

   
   //    $id = $this->input->post('id');
	  // $value = $this->input->post('value'); 
	  // $col = $this->input->post('col'); 

	    $this->db->where('id', $id);
           $amo = $this->db->update('payrollrecords',[$col=>$value ]);

			     
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

			return $json;



	}




	public function arrearsandbonus($id, $value, $table){


	  $payroll = $this->Main->mycolumn1('payrollrecords', 'payroll', 'id', $id);
	  $employee = $this->Main->mycolumn1('payrollrecords', 'employee', 'id', $id);
	  $company = $this->Main->mycolumn1('payrollrecords', 'company', 'id', $id);

		if($this->Main->isExist3($table, 'payroll', $payroll,'employee', $employee, 'amount >',0 )){

            $this->db->where('company', $company);
            $this->db->where('payroll', $payroll);
            $this->db->where('employee', $employee);

           $amo = $this->db->update($table,['amount'=>$value ]);

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

			// return $json;

		}else{

        
            $this->db->insert($table, ['amount'=>$value, 'company'=>$company,'employee'=>$employee,'payroll'=>$payroll]);

            if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			}

		}


		// echo json_encode($json);

		return $json;

	     
	}



	public function eployerdeducts($id, $value, $re){


	  $payroll = $this->Main->mycolumn1('payrollrecords', 'payroll', 'id', $id);
	  $employee = $this->Main->mycolumn1('payrollrecords', 'employee', 'id', $id);
	  $company = $this->Main->mycolumn1('payrollrecords', 'company', 'id', $id);

		if($this->Main->isExist3('payroll_records_employer_deductions', 'payroll', $payroll,'employee', $employee,'company',$company )){

            $this->db->where('company', $company);
            $this->db->where('payroll', $payroll);
            $this->db->where('employee', $employee);

            $this->db->delete('payroll_records_employer_deductions');

           

		}

        
            $this->db->insert('payroll_records_employer_deductions', ['amount'=>$value, 'company'=>$company,'employee'=>$employee,'payroll'=>$payroll, 'reasons'=>$re]);

            if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

				$json['msg'] = FALSE;
				$json['des'] = 'Fail!, please try again  or Contact Our Support Team';
			

		}


		// echo json_encode($json);

		return $json;

	     
	}




	public function editspecificcell_payrollrecords(){

   
      $a = $this->input->post('a'); //value posted
      $b = $this->input->post('b'); // payrollrecords ID
      $c = $this->input->post('c'); // action to do 
      $d = $this->input->post('d'); //fund id, allowance, id, 
      $e = $this->input->post('e'); // fund, allowance, arrayer

      if($c == 'attendance'){

      	$json = $this->editthingsinpayrollrecords($b,$a, 'daysinwork');
      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }else if($c == 'basic salary'){

      	$json = $this->editthingsinpayrollrecords($b,$a, 'basic');
      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }else if($c == 'day overtime hours'){

      	$json = $this->editthingsinpayrollrecords($b,$a, 'overtime_day_hours');
      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }else if($c == 'night overtime hours'){

      	$json = $this->editthingsinpayrollrecords($b,$a, 'overtime_night_hours');
      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }else if($c == 'holiday overtime hours'){

      	$json = $this->editthingsinpayrollrecords($b,$a, 'overtime_holiday_hours');
      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }

      else if($c == 'arrears'){

      	$json = $this->arrearsandbonus($b,$a, 'payroll_records_arrears');
      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }

      else if($c == 'bonus'){

      	$json = $this->arrearsandbonus($b,$a, 'payroll_records_bonus');

      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }else if($c == 'employer deductions'){

      	$json = $this->eployerdeducts($b,$a, $c);

      	$this->output->set_content_type('application/json')->set_output(json_encode($json));

      }else{

      	// echo 'me';
      }
	 	  

	}


	public function senddata(){


// $_POST2 = file_get_contents('php://input');

// $_POST2 = json_decode($_POST2);

		$data = $_GET['data'];
		$company = $_GET['co'];

		

  $new  = $data;

   $amon = array();
   $k = 1;

if(!empty($data)){
    foreach ($data as $key => $value) {

     $result = $this->employeetoregister($value, $company);

     if($result['msg']){

     	$k++;
     }

    } }
  
  // echo $k;
    $json['msg'] = TRUE;
	$json['des'] = ($k-1). ' Employee Added';
    $this->output->set_content_type('application/json')->set_output(json_encode($json));



	}







	public function senddata10(){

		$data = $_GET['data'];
		$company = $_GET['co'];

		

  $new  = $data;

   $amon = array();
   $k = 1;

if(!empty($data)){
$value = $data;



     $result = $this->employeetoregister($value, $company);

     if($result['msg']){

     	$k++;
     	 $json['msg'] = TRUE;
     }else{ $json['msg'] = FALSE;}

     }else{$json['msg'] = FALSE;}
  
  // echo $k;
 //    $json['msg'] = TRUE;
	// $json['des'] = ($k-1). ' Employee Added';


    $this->output->set_content_type('application/json')->set_output(json_encode($json));



	}




        public function insertjobtitle($name){

      $view = $this->Main->mycolumn1('jobtitles','id', 'name',$name);

   if($name > 0){

  return $view;

  }else{

$this->db->insert('jobtitles',['name'=>$name]);

         if($this->db->affected_rows() > 0 ){

      return $this->db->insert_id();
       }else{return 0;}

   }


          


       }






	public function employeetoregister($value, $co){

		if( $value['first_name'] != null && $value['last_name'] != null  && $value['basic_salary']!= null && (float)str_replace(array(',',' '), '', $value['basic_salary'] ) >  0 && $co != null) {


			if($this->employeetoregister_check2($value, $co) ){

             $this->db->insert('employees',['username'=> $this->username($value['last_name']), 'first_name'=>$value['first_name'], 'last_name'=>$value['last_name'],
              'middle_name'=>isset($value['middle_name'])?$value['middle_name']:'',
              'company_id'=>$co,
              'branch'=>isset($value['branch'])?$this->Main->mycolumn2('client_branch','id', 'name',$value['branch'],'company',$co):0,
              'job_title'=>isset($value['job_title'])?$this->insertjobtitle($value['job_title']):0,
              'department'=>isset($value['department'])?$this->Main->mycolumn2('companystructures','id', 'title',$value['department'], 'client_id', $company):0,
              'employment_status'=>isset($value['employment_status'])?$this->Main->mycolumn1('employmentstatus','id', 'name',$value['employment_status']):3,
              'private_email'=>isset($value['personal_email'])?$value['personal_email']:'',
              'work_email'=>isset($value['work_email'])?$value['work_email']:'',
              'work_phone'=>isset($value['work_phone'])?$value['work_phone']:'',
              'mobile_phone'=>isset($value['mobile_phone'])?$value['mobile_phone']:'',
              'home_phone'=>isset($value['home_phone'])?$value['home_phone']:'',
              'employee_id'=>isset($value['staff_id'])?$value['staff_id']: 'EMP'.rand(100,9999),
              'gender'=>(isset($value['gender'])  && ($value['gender'] == 'M' ) )?1:2]);

            
            if($this->db->affected_rows() > 0 ){
            
            $uid = $this->session->userdata('userid');
            $uname = $this->Main->mycolumn1('admins','full_name', 'id',$uid). ' - '.$this->Main->mycolumn1('admins','username', 'id',$uid);

           $noti = $value['first_name'].' '.(isset($value['middle_name'])?$value['middle_name']:"").' '.$value['last_name'].'  Created  in the System by <b> '.$uname. ' </b> as New Employee';

          $this->db->insert('notifications',['sender'=>$uid, 'type'=>1,'company'=>$co, 'notifications'=>$noti ]);


            	$json['msg'] = TRUE;
			$json['des'] = 'Successful ';

   				$myid = $this->db->insert_id();
            	$this->db->insert('employeesalary',['amount'=>(float)str_replace(array(',',' '), '', $value['basic_salary'] ), 'employee'=>$myid, 'company_id'=>$co ]);


            	$other = (isset($value['other_allowance']) && (float)str_replace(array(',',' '), '', $value['other_allowance'] ) > 0)? $this->db->insert('employeeallowances',['amount'=>(float)str_replace(array(',',' '), '', $value['other_allowance'] ), 'employee'=>$myid, 'company'=>$co,'allowance'=>5 ]):FALSE;

            	$meal = (isset($value['meal_allowance']) && (float)str_replace(array(',',' '), '', $value['meal_allowance'] )> 0)? $this->db->insert('employeeallowances',['amount'=>(float)str_replace(array(',',' '), '', $value['meal_allowance'] ), 'employee'=>$myid, 'company'=>$co,'allowance'=>2 ]):FALSE;


            	$transport = (isset($value['transport_allowance']) && (float)str_replace(array(',',' '), '', $value['transport_allowance'] ) > 0)? $this->db->insert('employeeallowances',['amount'=>(float)str_replace(array(',',' '), '', $value['transport_allowance'] ), 'employee'=>$myid, 'company'=>$co,'allowance'=>1 ]):FALSE;


            	$telephone = (isset($value['telephone_allowance']) && (float)str_replace(array(',',' '), '', $value['telephone_allowance'] ) > 0)? $this->db->insert('employeeallowances',['amount'=>(float)str_replace(array(',',' '), '', $value['telephone_allowance'] ), 'employee'=>$myid, 'company'=>$co,'allowance'=>3 ]):FALSE;

            	$house = (isset($value['house_allowance']) && (float)str_replace(array(',',' '), '', $value['house_allowance'] ) > 0)? $this->db->insert('employeeallowances',['amount'=>(float)str_replace(array(',',' '), '', $value['house_allowance'] ), 'employee'=>$myid, 'company'=>$co,'allowance'=>4 ]):FALSE;


    if(isset($value['bank_name']) && isset($value['account_name']) && isset($value['account_number'])  ){

      $this->db->insert('employee_bankdetails',['employee'=>$myid , 'employee'=>$myid, 'company_id'=>$co,'name'=>$value['bank_name'],'account_name'=>$value['account_name'], 'account_number'=>$value['account_number']]);

     }




			
			}else{

         $json['msg'] = FALSE;
			$json['des'] = 'Fail Please try again ';

			}


			}else{


				$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';
			}

		}

 
    	return $json;
	}







		public function addnewemployeerequest(){


           $fname = $this->input->post('fname');
           $lname = $this->input->post('lname');
           $mname = $this->input->post('mname');
           $basic = $this->input->post('basic');
           $co = $this->input->post('co');
           $jobtitle = $this->input->post('jobtitle');
           $gender = $this->input->post('gender');
           $branch = $this->input->post('branch');
           $department = $this->input->post('department');
           $allowance_5 = $this->input->post('allowance_5');
           $allowance_4 = $this->input->post('allowance_4');
           $allowance_3 = $this->input->post('allowance_3');
           $allowance_2 = $this->input->post('allowance_2');
           $allowance_1 = $this->input->post('allowance_1');
           $staff_id = $this->input->post('staff_id');
           $status = $this->input->post('status');
           $e_status = $this->input->post('e_status');
           $pemail = $this->input->post('pemail');
           $wemail = $this->input->post('wemail');
           $mphone = $this->input->post('mphone');
           $wphone = $this->input->post('wphone');
           $hphone = $this->input->post('hphone');



   


		if( $fname != null && $lname != null  && $basic!= null && $basic >  0 && $co != null) {


			if($this->employeetoregister_check3($lname,$fname, $co) ){

             $this->db->insert('employees',['username'=> $this->username($lname), 'first_name'=>$fname, 'last_name'=>$lname,
              'middle_name'=>isset($mname)?$mname:'',
              'company_id'=>$co,
              'branch'=>isset($branch)?$branch:0,
              'job_title'=>isset($jobtitle)?$jobtitle:0,
              'department'=>isset($department)?$department:0,
              'employment_status'=>isset($e_status)?$e_status:0,
              'private_email'=>isset($pemail)?$pemail:'',
              'work_email'=>isset($wemail)?$wemail:'',
              'work_phone'=>isset($wphone)?$wphone:'',
              'mobile_phone'=>isset($mphone)?$mphone:'',
              'home_phone'=>isset($hphone)?$hphone:'',
              'employee_id'=>isset($staff_id)?$staff_id: 'EMP'.rand(100,9999),
              'gender'=>(isset($gender)  )?$gender:'',
              'status'=>(isset($status)  )?$status:''
          ]);

            
            if($this->db->affected_rows() > 0 ){



            $uid = $this->session->userdata('userid');
            $uname = $this->Main->mycolumn1('admins','full_name', 'id',$uid). ' - '.$this->Main->mycolumn1('admins','username', 'id',$uid);
           $noti = $fname.' '.$mname.' '.$lname.'  Created  in the System by <b> '.$uname. ' </b> as New Employee';
           $this->db->insert('notifications',['sender'=>$uid, 'type'=>1,'company'=>$co, 'notifications'=>$noti ]);



            	$json['msg'] = TRUE;
			    $json['des'] = 'Successful ';

   				$myid = $this->db->insert_id();
            	$this->db->insert('employeesalary',['amount'=>$basic, 'employee'=>$myid, 'company_id'=>$co ]);


            	$other = (isset($allowance_5) && $allowance_5 > 0)? $this->db->insert('employeeallowances',['amount'=>$allowance_5, 'employee'=>$myid, 'company'=>$co,'allowance'=>5 ]):FALSE;

            	$meal = (isset($allowance_2) && $allowance_2 > 0)? $this->db->insert('employeeallowances',['amount'=>$allowance_2, 'employee'=>$myid, 'company'=>$co,'allowance'=>2 ]):FALSE;


            	$transport =(isset($allowance_1) && $allowance_1 > 0)? $this->db->insert('employeeallowances',['amount'=>$allowance_1, 'employee'=>$myid, 'company'=>$co,'allowance'=>1 ]):FALSE;


            	$telephone = (isset($allowance_3) && $allowance_3 > 0)? $this->db->insert('employeeallowances',['amount'=>$allowance_3, 'employee'=>$myid, 'company'=>$co,'allowance'=>3 ]):FALSE;

            	$house = (isset($allowance_4) && $allowance_4 > 0)? $this->db->insert('employeeallowances',['amount'=>$allowance_4, 'employee'=>$myid, 'company'=>$co,'allowance'=>4 ]):FALSE;

			
			}else{

         $json['msg'] = FALSE;
			$json['des'] = 'Fail Please try again ';

			}


			}else{


				$json['msg'] = FALSE;
			$json['des'] = 'User Exist check with Support team';
			}

		}else{

	       $json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';

		}

 
    $this->output->set_content_type('application/json')->set_output(json_encode($json));



	}







		public function editnewemployeerequest(){


           $fname = $this->input->post('fname');
           $lname = $this->input->post('lname');
           $mname = $this->input->post('mname');
           $basic = $this->input->post('basic');
           $co = $this->input->post('co');
           $id = $this->input->post('id');
           $jobtitle = $this->input->post('jobtitle');
           $gender = $this->input->post('gender');
           $branch = $this->input->post('branch');
           $department = $this->input->post('department');
           $allowance_5 = $this->input->post('allowance_5');
           $allowance_4 = $this->input->post('allowance_4');
           $allowance_3 = $this->input->post('allowance_3');
           $allowance_2 = $this->input->post('allowance_2');
           $allowance_1 = $this->input->post('allowance_1');
           $staff_id = $this->input->post('staff_id');
           $status = $this->input->post('status');
           $e_status = $this->input->post('e_status');
           $pemail = $this->input->post('pemail');
           $wemail = $this->input->post('wemail');
           $mphone = $this->input->post('mphone');
           $wphone = $this->input->post('wphone');
           $hphone = $this->input->post('hphone');

		



		if( $fname != null && $lname != null  && $basic != null && $basic >  0 && $co != null && $id != null  && $id > 0 ) {


			if($this->Main->isExist2('employees','id',$id, 'company_id',$co) ){

             $this->db->where('id', $id);
             $this->db->update('employees',[ 'first_name'=>$fname, 'last_name'=>$lname,
              'middle_name'=>isset($mname)?$mname:'',
              'company_id'=>$co,
              'branch'=>isset($branch)?$branch:0,
              'job_title'=>isset($jobtitle)?$jobtitle:0,
              'department'=>isset($department)?$department:0,
              'employment_status'=>isset($e_status)?$e_status:0,
              'private_email'=>isset($pemail)?$pemail:'',
              'work_email'=>isset($wemail)?$wemail:'',
              'work_phone'=>isset($wphone)?$wphone:'',
              'mobile_phone'=>isset($mphone)?$mphone:'',
              'home_phone'=>isset($hphone)?$hphone:'',
              'employee_id'=>isset($staff_id)?$staff_id: 'EMP'.rand(100,9999),
              'gender'=>(isset($gender)  )?$gender:'',
              'status'=>(isset($status)  )?$status:'']);




 $uid = $this->session->userdata('userid');
            $uname = $this->Main->mycolumn1('admins','full_name', 'id',$uid). ' - '.$this->Main->mycolumn1('admins','username', 'id',$uid);

           $noti = $value['first_name'].' '.(isset($value['middle_name'])?$value['middle_name']:"").' '.$value['last_name'].'  Updated   in the System by <b> '.$uname. ' </b> as Employee';

          $this->db->insert('notifications',['sender'=>$uid, 'type'=>1,'company'=>$co, 'notifications'=>$noti ]);


         
            	$json['msg'] = TRUE;
			    $json['des'] = 'Successful ';

   				$myid = $id;


   				if( isset($basic) && $basic > 0 &&  !$this->Main->isExist2('employeesalary','employee', $id , 'company_id',$co )){

            	$this->db->insert('employeesalary',['amount'=>$basic, 'employee'=>$myid, 'company_id'=>$co ]);

            			}elseif ( isset($basic) && $basic > 0 &&  $this->Main->isExist2('employeesalary','employee', $id , 'company_id',$co )) {

            			$this->db->where('employee',$id );
                        $this->db->where( 'company_id',$co );
                        $this->db->update('employeesalary',['amount'=>$basic]);
            			}

               if( isset($allowance_5) && $allowance_5 > 0 ){

               		if($this->Main->isExist3('employeeallowances','employee',$id , 'company',$co,'allowance',5 )){

                        $this->db->where('employee',$id );
                        $this->db->where( 'company',$co );
                        $this->db->where('allowance',5);
                        $this->db->update('employeeallowances',['amount'=>$allowance_5]);

               		    }else{ $this->db->insert('employeeallowances',['amount'=>$allowance_5, 'employee'=>$id, 'company'=>$co,'allowance'=> 5 ]); }

               } 






               if( isset($allowance_4) && $allowance_4 > 0 ){

               		if($this->Main->isExist3('employeeallowances','employee',$id , 'company',$co,'allowance',4 )){

                        $this->db->where('employee',$id );
                        $this->db->where( 'company',$co );
                        $this->db->where('allowance',4);
                        $this->db->update('employeeallowances',['amount'=>$allowance_4]);

               		    }else{ $this->db->insert('employeeallowances',['amount'=>$allowance_4, 'employee'=>$id, 'company'=>$co,'allowance'=> 4 ]); }

               }  





               if( isset($allowance_3) && $allowance_3 > 0 ){

               		if($this->Main->isExist3('employeeallowances','employee',$id , 'company',$co,'allowance',3 )){

                        $this->db->where('employee',$id );
                        $this->db->where( 'company',$co );
                        $this->db->where('allowance',3);
                        $this->db->update('employeeallowances',['amount'=>$allowance_3]);

               		    }else{ $this->db->insert('employeeallowances',['amount'=>$allowance_3, 'employee'=>$id, 'company'=>$co,'allowance'=>  3]); }

               }  

 




               if( isset($allowance_2) && $allowance_2 > 0 ){

               		if($this->Main->isExist3('employeeallowances','employee',$id , 'company',$co,'allowance',2 )){

                        $this->db->where('employee',$id );
                        $this->db->where( 'company',$co );
                        $this->db->where('allowance',2);
                        $this->db->update('employeeallowances',['amount'=>$allowance_2]);

               		    }else{ $this->db->insert('employeeallowances',['amount'=>$allowance_2, 'employee'=>$id, 'company'=>$co,'allowance'=> 2 ]); }

               }  







               if( isset($allowance_1) && $allowance_1 > 0 ){

               		if($this->Main->isExist3('employeeallowances','employee',$id , 'company',$co,'allowance',1 )){

                        $this->db->where('employee',$id );
                        $this->db->where( 'company',$co );
                        $this->db->where('allowance',1);
                        $this->db->update('employeeallowances',['amount'=>$allowance_1]);

               		    }else{ $this->db->insert('employeeallowances',['amount'=>$allowance_1, 'employee'=>$id, 'company'=>$co,'allowance'=>  1]); }

               }  






           

			}else{


				$json['msg'] = FALSE;
			$json['des'] = 'User Not Exist check with Support team';
			

		}



}else{

	       $json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';

		}

 
          $this->output->set_content_type('application/json')->set_output(json_encode($json));



	}










public function employeetoregister_check2($value, $co){

		if(  isset($value['first_name']) && isset($value['last_name'])){




			$names = $this->Main->isExist3('employees', 'first_name', $value['first_name'] , 'last_name', $value['last_name'], 'company_id',$co );


			


				if($names){

					return FALSE;
				}else{ return TRUE;}
			
		}else{

				return FALSE;
		}



	}






public function employeetoregister_check3($l,$f, $co){

		if(  $l && $f){




			$names = $this->Main->isExist3('employees', 'first_name', $f , 'last_name', $l, 'company_id',$co );


			


				if($names){

					return FALSE;
				}else{ return TRUE;}
			
		}else{

				return FALSE;
		}



	}









	public function employeetoregister_check($value){

		if((isset($value['work_phone']) || isset($value['mobile_phone']) || isset($value['home_phone']) ) && (isset($value['work_email']) || isset($value['personal_email'])  ) ){

			
			$phone1 = isset($value['work_phone']) ? $this->Main->isExist1('employees', 'home_phone', $value['work_phone'] ): '';
			$phone2 = isset($value['work_phone'])? $this->Main->isExist1('employees', 'work_phone', $value['work_phone'] ): FALSE;
			$phone3 = isset($value['work_phone'])? $this->Main->isExist1('employees', 'mobile_phone', $value['work_phone'] ): FALSE;



			$phone4 = isset($value['home_phone'])? $this->Main->isExist1('employees', 'home_phone', $value['home_phone'] ): FALSE;
			$phone5 = isset($value['home_phone'])? $this->Main->isExist1('employees', 'work_phone', $value['home_phone'] ): FALSE;
			$phone6 = isset($value['home_phone'])? $this->Main->isExist1('employees', 'mobile_phone', $value['home_phone'] ): FALSE;



			$phone7 = isset($value['mobile_phone'])? $this->Main->isExist1('employees', 'home_phone', $value['mobile_phone'] ): FALSE;
			$phone8 = isset($value['mobile_phone'])? $this->Main->isExist1('employees', 'work_phone', $value['mobile_phone'] ): FALSE;
			$phone9 = isset($value['mobile_phone'])? $this->Main->isExist1('employees', 'mobile_phone', $value['mobile_phone'] ): FALSE;


			$phone10 = isset($value['work_email'])? $this->Main->isExist1('employees', 'private_email', $value['work_email'] ): FALSE;
			$phone11 = isset($value['work_email'])? $this->Main->isExist1('employees', 'work_email', $value['work_email'] ): FALSE;
			
			$phone12 = isset($value['personal_email'])? $this->Main->isExist1('employees', 'private_email', $value['personal_email'] ): FALSE;
			$phone13 = isset($value['personal_email'])? $this->Main->isExist1('employees', 'work_email', $value['personal_email'] ): FALSE;


				if($phone1 || $phone2 || $phone3 || $phone4 || $phone5 || $phone6 || $phone7 || $phone8 || $phone9 || $phone10 || $phone11 || $phone12 || $phone13){

					return FALSE;
				}else{ return TRUE;}
			
		}else{

				return FALSE;
		}



	}



	 public function username($lastname){

       $new = $lastname.''.rand(0,999);

       if(!$this->Main->isExist1('employees', 'username', $new) && !$this->Main->isExist2('admins', 'username', $new,'deleted',0)){

       	return $new;
       }else{

       	$this->username($lastname);
       }


	 }


	 public function addnewcompany(){


       $name = $this->input->post('name');
	  $details = $this->input->post('details'); 
	  $address = $this->input->post('address'); 
	  $phone2 = $this->input->post('phone2'); 
	  $phone1 = $this->input->post('phone1'); 
	  $fax = $this->input->post('fax'); 
	  $email = $this->input->post('email'); 
	  $web = $this->input->post('web'); 
	  $status = $this->input->post('status'); 



	  if(!$status || !$phone2 || !$name || !$email){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';

	  }else if($this->Main->isExist1('clients','name',$name)){


	  		$json['msg'] = FALSE;
			$json['des'] = 'Name already taken please fill another name';

	  }else{


	  	$this->db->insert('clients',['name'=>$name,'details'=>$details,'address'=>$address,'fax'=>$fax,'mobile_number'=> $phone2,'contact_number'=>$phone1,'contact_email'=>$email,'company_url'=>$web,'status'=>$status]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Fail to register the company';

			}




	  }




	$this->output->set_content_type('application/json')->set_output(json_encode($json));




	 }



 public function editnewcompany(){


       $name = $this->input->post('name');
       $id = $this->input->post('id');
	  $details = $this->input->post('details'); 
	  $address = $this->input->post('address'); 
	  $phone2 = $this->input->post('phone2'); 
	  $phone1 = $this->input->post('phone1'); 
	  $fax = $this->input->post('fax'); 
	  $email = $this->input->post('email'); 
	  $web = $this->input->post('web'); 
	  $status = $this->input->post('status'); 



	  if(!$status || !$phone2 || !$name || !$email){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';

	  }else if($this->Main->isExist2('clients','name',$name,'id !=',$id)){


	  		$json['msg'] = FALSE;
			$json['des'] = 'Name already taken please fill another name';

	  }else{


	  	$this->db->where('id',$id);
	  	$up = $this->db->update('clients',['name'=>$name,'details'=>$details,'address'=>$address,'fax'=>$fax,'mobile_number'=> $phone2,'contact_number'=>$phone1,'contact_email'=>$email,'company_url'=>$web,'status'=>$status]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else if($up && $this->db->affected_rows() <= 0){

			$json['msg'] = FALSE;
			$json['des'] = 'You Made No change..';
			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Fail to edit the company';

			}


	  }


	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	 }

	 public function username1check(){

       $name = $this->input->post('username');
       // $name = 'amon1';


	  if($this->Main->isExist1('employees', 'username', $name) || $this->Main->isExist2('admins', 'username', $name,'deleted',0)){

	  		$json['msg'] = FALSE;
			$json['des'] = '';

	  }else{


	  		$json['msg'] = TRUE;
			$json['des'] = '';

	  }


	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	 }



	  public function username2check(){

       $name = $this->input->post('username');
       $id = $this->input->post('id');
       // $name = 'amon1';


	  if($this->Main->isExist1('employees', 'username', $name) || $this->Main->isExist3('admins', 'username', $name,'deleted',0,'id!=',$id)){

	  		$json['msg'] = FALSE;
			$json['des'] = '';

	  }else{


	  		$json['msg'] = TRUE;
			$json['des'] = '';

	  }


	$this->output->set_content_type('application/json')->set_output(json_encode($json));

	 }






	 public function addnewadmin(){


       $name = $this->input->post('name');
	  $username = $this->input->post('username'); 
	  $phone = $this->input->post('phone'); 
	  $email = $this->input->post('email'); 
	  $status = $this->input->post('status');

          $password = $this->gen_password(); 
          
     


        



	  if(!$status || !$phone || !$name || !$email || !$username){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';

	  }else if($this->Main->isExist1('employees', 'username', $username) || $this->Main->isExist2('admins', 'username', $username,'deleted',0)){


	  		$json['msg'] = FALSE;
			$json['des'] = 'Username already taken please fill another name';

	  }else{


	  	$this->db->insert('admins',['full_name'=>$name,'username'=>$username,'phone'=> $phone,'email_address'=>$email,'active'=>0,'level'=>$status,'password'=>md5($password)]);

	  	if($this->db->affected_rows() > 0 ){


                   $msg = '<style>p{font-size:30px}b{color:red}</style><p>Hello '. $name.'  You Are Registered to Access Services in OPS </p><p> You will be Able to login if you Assigned a Company. Initially login with </br>Username : <b>'. $username .'</b></br>password : <b>'. $password .'</b> <a href="'.base_url().'">'.base_url().'</a></p>';
              $this->email("",$email,'YOU ARE REGISTERED TO ACCESS OPS', $msg);
                  
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Fail to register the Operator /Admin';

			}




	  }




	$this->output->set_content_type('application/json')->set_output(json_encode($json));




	 }






       
      public function email($from, $to, $subject, $msg){

    
     $headers = "From:  ".$from."noreply@ops.com\r\nReply-To: ". $to;
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$mail_sent = @mail( $to, $subject, $msg, $headers );

return $mail_sent ? true : false;

}




     public function gen_password(){


    $num =  rand(1000,9999);
    $long = md5($num);
    $short = substr($long, 0,8);
    $password = strtolower($short);
    return $password;

     }






	 public function editnewadmin(){


       $name = $this->input->post('name');
	  $username = $this->input->post('username'); 
	  $phone = $this->input->post('phone'); 
	  $email = $this->input->post('email'); 
	  $status = $this->input->post('status'); 
	  $status2 = $this->input->post('status2'); 
	  $id = $this->input->post('id'); 



	  if(!$status || !$phone || !$name || !$email || !$username || !$id  || !$this->Main->isExist2('admins', 'id', $id,'deleted',0)){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing';

	  }else if($this->Main->isExist1('employees', 'username', $username || $this->Main->isExist3('admins', 'username', $username,'deleted',0,'id != ',$id))){


	  		$json['msg'] = FALSE;
			$json['des'] = 'Username already taken please fill another name';

	  }else{

	  	if($status != $this->Main->mycolumn1('admins','level', 'id' ,$id)){

       $this->db->where('admin',$id);
       $this->db->delete('companyadmins');

	  	}


	  	
	  	$this->db->where('id',$id);
	  	$this->db->update('admins',['full_name'=>$name,'username'=>$username,'phone'=> $phone,'email_address'=>$email,'active'=>$status2,'level'=>$status]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Fail to register the Operator /Admin';

			}




	  }




	$this->output->set_content_type('application/json')->set_output(json_encode($json));




	 }





	 public function deleteadmin(){

	  $id = $this->input->post('id'); 


	  if( !$id  || !$this->Main->isExist2('admins', 'id', $id,'deleted',0)){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again';

	  }else{

	  	


	  	
	  	$this->db->where('id',$id);
	  	$this->db->update('admins',['deleted'=>1]);

	  	$this->db->where('admin',$id);
	  	$this->db->delete('companyadmins');

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Value not exist';

			}




	  }$this->output->set_content_type('application/json')->set_output(json_encode($json));

 }



	 public function addtocomp(){

	  $company = $this->input->post('company'); 
	  $branch = $this->input->post('branch'); 
	  $user = $this->input->post('user'); 


	  if( !$company ||  !$user || !$this->Main->isExist2('admins', 'id', $user,'deleted',0) ){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ' .$branch;

	  }elseif($this->Main->isExist3('companyadmins', 'admin', $user,'client',$company, 'branch',$branch)){

          $json['msg'] = FALSE;
			$json['des'] = 'Already added';

	  } else{

	  	


	  	$this->db->insert('companyadmins',['client'=>$company, 'admin'=>$user, 'branch'=>$branch]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';



                     $msg = '<style>p{font-size:30px}b{color:red}</style><p>Hello '. $name.'  You Are Added  to Access Services in OPS with  <b>'.$this->Main->mycolumn1('clients','name','id',$company).'</b></p><p> please  login with your Accounts Username and Password     <a href="'.base_url().'">'.base_url().'</a> </p>';
                $this->email("",$this->Main->mycolumn1('admins','email_address','id',$user),'ACCESS OPS WITH '.strtoupper($this->Main->mycolumn1('clients','name','id',$company)), $msg);


			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';






			}


	  }

	$this->output->set_content_type('application/json')->set_output(json_encode($json));


	 }





public function removetocomp(){

	$id = $this->input->post('id'); 
	  
	  if( !$id  || !$this->Main->isExist1('companyadmins', 'id', $id) ){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ';

	  }else{

	  	$this->db->where('id',$id);
	  	$this->db->delete('companyadmins');

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{
			$json['msg'] = FALSE;
			$json['des'] = 'Data not Exist';



                                   $msg = '<style>p{font-size:30px}b{color:red}</style><p>Hello '. $this->Main->mycolumn1('admins','full_name','id',$this->Main->mycolumn1('companyadmins','admin','id',$id)).'  You Are Removed  to Access Services in OPS with  <b>'.$this->Main->mycolumn1('clients','name','id',$this->Main->mycolumn1('companyadmins','client','id',$id)).'</b></p><p> You will no longer have a permission you given for this Company/Organization</p>';
                $this->email("",$this->Main->mycolumn1('admins','email_address','id',$this->Main->mycolumn1('companyadmins','admin','id',$id)),'ACCESS OPS WITH '.strtoupper($this->Main->mycolumn1('clients','name','id',$this->Main->mycolumn1('companyadmins','client','id',$id))), $msg);

			}
	  }$this->output->set_content_type('application/json')->set_output(json_encode($json));

 }





                 


public function addedittocomp_branch(){

	  $id = $this->input->post('id'); 
	  $company = $this->input->post('company'); 
	  $name = $this->input->post('name'); 
	  $address = $this->input->post('address'); 
	  $email = $this->input->post('email'); 
	  $status = $this->input->post('status'); 
	  $contact1 = $this->input->post('contact1'); 
	  $contact2 = $this->input->post('contact2'); 


	   if(!$email || (!$contact1 &&!$contact2) || !$name ){
	  

$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ';

	  }elseif($this->Main->isExist3('client_branch', 'name',$name, 'company',$company,'id !=',$id) ){

$json['msg'] = FALSE;
			$json['des'] = 'Name Exist try another name';

	  }else{

   if($id == 0 || !$id){


     $this->db->insert('client_branch',['company'=>$company, 'name'=>$name, 'address'=>$address, 'email'=>$email,'contact1'=>$contact1,'contact2'=>$contact2,'active'=>$status]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';
			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';

			}


   }else{


   	$this->db->where('id',$id);
   	$update = $this->db->update('client_branch',['company'=>$company, 'name'=>$name, 'address'=>$address, 'email'=>$email,'contact1'=>$contact1,'contact2'=>$contact2,'active'=>$status]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Updated';
			}elseif($this->db->affected_rows() <= 0 &&  $update){

$json['msg'] = FALSE;
			$json['des'] = 'Nothing Changes';

			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';

			}

   }

	  }$this->output->set_content_type('application/json')->set_output(json_encode($json));

}



public function removetocompbranch(){


	  $id = $this->input->post('id'); 
	
	  if( !$id  || !$this->Main->isExist1('client_branch', 'id', $id) ){

	  		$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ';

	  }else{

	  	$this->db->where('id',$id);
	  	$this->db->delete('client_branch');

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful ';
			}else{
			$json['msg'] = FALSE;
			$json['des'] = 'Data not Exist';

			}
	  }$this->output->set_content_type('application/json')->set_output(json_encode($json));


}




public function add_addeditbranchaccountants(){

	  $user = $this->input->post('user'); 
	  $company = $this->input->post('company'); 
	  $branch = $this->input->post('branch');


	  // $user = 4;
	  // $company = 34;
	  // $branch =  5;
	  $id = $this->input->post('id'); 
	 
	  if(!$company ||  !$user || !$branch){

$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ';

	  }else{

   if(!$this->Main->isExist3('companyadmins','admin',$user,'client',$company ,'branch',$branch )){


     $this->db->insert('companyadmins',['client'=>$company, 'admin'=>$user, 'branch'=>$branch]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Added';


    $msg = '<style>p{font-size:30px}b{color:red}</style><p>Hello '. $this->Main->mycolumn1('admins','full_name','id',$user).'  You Are Added  to Access Services in OPS with  <b>'.$this->Main->mycolumn1('client_branch','name','id',$branch).' - </b>   <b>'.$this->Main->mycolumn1('clients','name','id',$company).'</b></p><p> please  login with your Accounts Username and Password</p>';
                $this->email("",$this->Main->mycolumn1('admins','email_address','id',$user),'ACCESS OPS WITH '.strtoupper($this->Main->mycolumn1('clients','name','id',$company)), $msg);




			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';

			}


   }else{


   	$this->db->where('id',$id);
   	$update = $this->db->update('companyadmins',['client'=>$company, 'admin'=>$user, 'branch'=>$branch]);

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Updated';


                         $msg = '<style>p{font-size:30px}b{color:red}</style><p>Hello '. $this->Main->mycolumn1('admins','full_name','id',$user).'  You Are Added  to Access Services in OPS with  <b>'.$this->Main->mycolumn1('client_branch','name','id',$branch).' - </b>   <b>'.$this->Main->mycolumn1('clients','name','id',$company).'</b></p><p> please  login with your Accounts Username and Password</p>';
                $this->email("",$this->Main->mycolumn1('admins','email_address','id',$user),'ACCESS OPS WITH '.strtoupper($this->Main->mycolumn1('clients','name','id',$company)), $msg);


			}elseif($this->db->affected_rows() <= 0 &&  $update){

                         $json['msg'] = FALSE;
			$json['des'] = 'Data Already Available';

			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';

			}

   }

	  }

	  $this->output->set_content_type('application/json')->set_output(json_encode($json));

}


public function delete_addeditbranchaccountants(){

	


	  // $user = 4;
	  // $company = 34;
	  // $branch =  5;
	  $id = $this->input->post('id'); 
	 
	  if(!$id){

$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ';

	  }else{


   	$this->db->where('id',$id);
   	$update = $this->db->delete('companyadmins');

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Deleted';
			}elseif($this->db->affected_rows() <= 0 &&  $update){

$json['msg'] = FALSE;
			$json['des'] = 'Data Not Exist';

			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';

			}

   }

	  

	  $this->output->set_content_type('application/json')->set_output(json_encode($json));

}








public function deleteadmintocomp(){

	
	  $id = $this->input->post('id'); 
	 
	  if(!$id){

$json['msg'] = FALSE;
			$json['des'] = 'Some Important Details Missing, Refresh and try again ';

	  }else{


   	$this->db->where('id',$id);
   	$update = $this->db->delete('companyadmins');

	  	if($this->db->affected_rows() > 0 ){
			$json['msg'] = TRUE;
			$json['des'] = 'Successful Deleted';
			}elseif($this->db->affected_rows() <= 0 &&  $update){

$json['msg'] = FALSE;
			$json['des'] = 'Data Not Exist';

			}else{

			$json['msg'] = FALSE;
			$json['des'] = 'Error please try again';

			}

   }

	  

	  $this->output->set_content_type('application/json')->set_output(json_encode($json));

}







}
