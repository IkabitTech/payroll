application/x-httpd-php mypayrollslip3.php 
HTML document text
<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<!-- WEB FONTS -->



</head>
	<body style="margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: white;">

<style>

th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #000;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #000;
  border-bottom: solid 1px rgba(0,0,0,0.1);
  border-right: solid 1px rgba(0,0,0,0.1);
}






</style>


<div id="wrapper" style='magin:20px; width:100%'>
<?php

    $co = $this->session->userdata('companyarray')[$companyindex]['id'];
    $co_name = $this->session->userdata('companyarray')[$companyindex]['name'];

 ?>


<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive" id='mytablelist'>





   <?php if($this->Main->isExist3('payrollrecords', 'company',$co,'payroll',$payroll,'employee', $user)){

    $k = 1;

                $this->db->where('payroll',$payroll);
                $this->db->where('employee',$user);
                $this->db->where('company',$co);
                $this->db->order_by('id','ASC');
               $payrollrecords =   $this->db->get('payrollrecords');

                 $payrollrecords = $payrollrecords->result();
                  $mydeductions = 0;
                 
                    $number_rows = 0;
                    $earn = 0;
                    $deduct = 0;
                    $earnname = null;
                    $earnvalue = null;
                    $deductname = null;
                    $deductvalue = null;
                      $sumearn = 0;
                      $sumdeduct = 0;


  $allnames = '';
                    $title = '';
                    $status = '';
                    $attendance = '';
                    $basic_bonus = '';
                    $basic_salary = '';


               if(!empty($payrollrecords)){ foreach( $payrollrecords as $p){ 

                  
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'names'){ $allnames = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'job_title'){ $title = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'employee_status'){ $status = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'attendance'){ $attendance = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'basic_bonus'){ $basic_bonus = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'basic_salary'){ $basic_salary = $p->value ;}
                 

                    
            

              if($this->Main->mycolumn3('payroll_columns','type','is_deduct',0,'id',$p->value_id,'is_calculated_in_slip',1) == 3 && (float)str_replace(array(',',' '), '', $p->value ) > 0){

                      $earnname[$earn] =$this->Main->mycolumn1('payroll_columns', 'name_to_display','id',$p->value_id);
                      $earnvalue[$earn] = (float)str_replace(array(',',' '), '', $p->value );
                      $sumearn += (float)str_replace(array(',',' '), '', $p->value );

                      $earn++;

                    }
                    



              if($this->Main->mycolumn3('payroll_columns', 'is_deduct','type',3,'id',$p->value_id,'is_calculated_in_slip',1) ==1 && (float)str_replace(array(',',' '), '', $p->value ) > 0){


                $deductname[$deduct] = $this->Main->mycolumn1('payroll_columns', 'name_to_display','id',$p->value_id);
                $deductvalue[$deduct] =  (float)str_replace(array(',',' '), '', $p->value );
                $sumdeduct += (float)str_replace(array(',',' '), '', $p->value );
                $deduct++;


              }


              if($deduct > $earn){

                $number_rows  = $deduct;
              }else{

                $number_rows = $earn;
              }



             
           

                    ?>



  <?php $k++; }  }}?>


<!-- Table ended -->

 </div> 

<!--Controls-->
    
        <!--/.Controls-->

</div>
  

<!-- container end end -->

<!-- Modal for days settings -->

<div class="container">
  <div class="col-md-12">



  <p class="lead text-left col-md-3" style="padding-top: 10px"><span style=""><img src="<?= ($this->session->userdata('companyarray')[$companyindex]['logo'] != null)? base_url().'assets/images/company_logo/'.$this->session->userdata('companyarray')[$companyindex]['logo']:base_url().'assets/images/logo.png' ?>" style="height:50px"></span>





</p>
<div class="col-md-6">
<p class="lead text-center" style="margin-top: 80px"><strong><?=$co_name;?></strong></p>
<p class="lead text-center" style="margin-top: -10px"><?=date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll) )).' SALARY SLIP' ;?></p>
</div>

<div class="col-md-12">

  <p style="margin:0 0 0px"><?=$this->Main->mycolumn1('clients','address', 'id', $co) ;?>,</p>
  <p style="margin:0 0 0px"><?=$this->Main->mycolumn1('clients','contact_number', 'id', $co) ;?>,</p>
  <p><?=$this->Main->mycolumn1('clients','contact_email', 'id', $co) ;?></p>
  <p>Employee : <?=$allnames;?></p>
 <?php if($attendance !=''){ ?>
  <p  style="margin:0 0 0px"><b>Attendance : <?=$attendance;?> </b> Days</p>
 <?php } ?>
 <?php if($basic_bonus !=''){ ?>
  <p style="margin:0 0 0px"><b>Basic bonus : <?=$basic_bonus;?> </b> TShs.</p>
 <?php } ?>
 <?php if($basic_salary !=''){ ?>
  <p  style="margin:0 0 0px"><b>Basic salary : <?=$basic_salary;?> </b> TShs.</p>
 <?php } ?>



</div>

<div class="col-md-12">
		<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #F4F5F7;">

    <thead>
      <th style='  border-bottom: solid 2px rgba(0,0,0,0.1);'>Earnings</th>
      <th style='  border-bottom: solid 2px rgba(0,0,0,0.1);'></th>
      <th style='  border-bottom: solid 2px rgba(0,0,0,0.1);'>Deductions</th>
      <th style='  border-bottom: solid 2px rgba(0,0,0,0.1);'></th>

    </thead>
    <tbody>

      <?php if($number_rows > 0 ){
        for ($m=0; $m < $number_rows; $m++) {
          

       ?>
      <tr >

      <td ><?php if(isset($earnname[$m])){echo $earnname[$m];} ?></td>
      <td><?php if(isset($earnvalue[$m])){echo $earnvalue[$m];} ?></td>
      <td><?php if(isset($deductname[$m])){echo $deductname[$m];} ?></td>
      <td><?php if(isset($deductvalue[$m])){echo number_format($deductvalue[$m],2);} ?></td>
      
    </tr>

      
<?php } } ?>
<tr>
  <td style="border-left:10px solid transparent;border-right: 10px solid transparent"></td>
  <td style="border-right:10px solid transparent"></td>
  <td style="border-right:10px solid transparent"></td>
  <td style="border-right:10px solid transparent"></td>
</tr>

<tr>
  <td>Total Addition</td>
  <td><?= number_format($sumearn,2) ?></td>
  <td>Total Deduction</td>
  <td><?= number_format($sumdeduct,2) ?></td>
  


</tr>

<tr>
  <td></td>
  <td></td>
  <td><b>NET SALARY</b></td>
  <td><b><?= number_format(($sumearn - $sumdeduct),2) ?></b></td>
  


</tr>


    </tbody>
  

  </table>

</div>

<div class="col-md-12">
<div class="col-md-12" style="margin-top: 30px">
  <p style="margin:0 0 5px; text-decoration: underline ;color:#39AADB;font-size:12px"><strong> <?=$this->Main->convertNumberToWord($sumearn - $sumdeduct) ; ?> TZS. Only</strong></p>
  </div>
</div>



</div></div>


</body>
</html>