<header id="page-title" class="notprint"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>PAYROLL REPORT4</h1>

          <ul class="breadcrumb">
<?php

    $co = $this->session->userdata('companyarray')[$companyindex]['id'];
    $co_name = $this->session->userdata('companyarray')[$companyindex]['name'];
    $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$user).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$user) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$user);

 ?>
                      <li><a href="#">Employee</a></li>

                  <li><a href="#">Payroll</a></li>
            <li class="#">pay</li>
          </ul>
        </div>
      </header>            
                



<div class="container notprint">

  <span></span><a class="btn btn-default " href="#" onclick="window.print()"> PRINT SALARY SLIP</a>
</div>

<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive" id='mytablelist'>





   <?php if($this->Main->isExist3('payrollrecords', 'company',$co,'payroll',$payroll,'employee', $user)){

    $k = 1;

                $this->db->where('payroll',$payroll);
                $this->db->where('employee',$user);
                $this->db->where('company',$co);
                $this->db->order_by('id','DESC');
               $payrollrecords =   $this->db->get('payrollrecords');

                 $payrollrecords = $payrollrecords->result();
                  $mydeductions = 0;
                    $tt_actual = 0;
                    $tt_basic = 0;
                    $tt_overtime_day1 = 0;
                    $tt_overtime_day2 = 0;
                    $tt_overtime_night1 = 0;
                    $tt_overtime_night2 = 0;
                    $tt_overtime_hol1 = 0;
                    $tt_overtime_hol2 = 0;
                    $tt_arrears = 0;
                    $tt_bonus = 0;
                    $tt_employer_deductions = 0;
                    $tt_gross = 0;
                    $tt_taxable = 0;
                    $tt_gross = 0;
                    $tt_paye = 0;
                    $tt_loandeduct = 0;
                    $tt_social = 0;
                    $tt_social2 = 0;
                    $tt_topup = 0;
                    $number_rows = 0;
                    $earn = 0;
                    $deduct = 0;
                    $earnname = null;
                    $earnvalue = null;
                    $deductname = null;
                    $deductvalue = null;
                      $sumearn = 0;
                      $sumdeduct = 0;





               if(!empty($payrollrecords)){ foreach( $payrollrecords as $p){ 

                    $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$p->employee).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$p->employee) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$p->employee);
                       $title = $this->Main->mycolumn1('job_roles','name', 'id',$this->Main->mycolumn1('employees','job_title', 'id',$p->employee));
                       $status = $this->Main->mycolumn1('employmentstatus','name', 'id',$this->Main->mycolumn1('employees','employment_status', 'id',$p->employee));
                       $mybasic = number_format($p->basic*$p->daysinwork/$p->avgdays, 2);
                      
                  

                       $gross = $p->basic*$p->daysinwork/$p->avgdays + $this->Main->sumArrears($payroll,$co,$p->employee) +$this->Main->sumBonus($payroll,$co,$p->employee) + $this->Main->sumAllowance($payroll,$co,$p->employee) + $p->o_holiday + $p->o_day + $p->o_night;
                       

                       $total_loans = $this->Main->sumLoansDeducted($payroll,$co, $p->employee);


                 
                      // $tt_taxable+=$this->Main->payecalculations($payroll, $co, $p->employee, (int)$gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['taxable'];
                      // $mydeductions+= $total_loans ;
                      //  $tt_paye+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE'];
                      //  $tt_social+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['social'];


                      $earnname[$earn] = 'basic';
                      $earnvalue[$earn] = $mybasic;
                      $sumearn += ($p->basic*$p->daysinwork/$p->avgdays);
                      $earn++;


                      if($this->Main->mycolumn3('payrollrecords', 'overtime_day_hours','company',$co,'payroll',$payroll,'employee',$user) > 0){

                      $earnname[$earn] = 'Day Overtime';
                      $earnvalue[$earn] = $p->o_day;
                      $sumearn += $p->o_day;

                      $earn++;

                    }
                    

                      if($this->Main->mycolumn3('payrollrecords', 'overtime_night_hours','company',$co,'payroll',$payroll,'employee',$user) > 0){

                      $earnname[$earn] = 'Night Overtime';
                      $earnvalue[$earn] = $p->o_night;
                      $sumearn += $p->o_night;

                      $earn++;

                    }


                      if($this->Main->mycolumn3('payrollrecords', 'overtime_holiday_hours','company',$co,'payroll',$payroll,'employee',$user) > 0){

                      $earnname[$earn] = 'Holiday Overtime';
                      $earnvalue[$earn] = $p->o_night;
                      $sumearn += $p->o_night;

                      $earn++;

                    }


                    

 if($this->Main->isExist3('payroll_records_bonus', 'company',$co,'payroll',$payroll,'employee',$user)){

                      $earnname[$earn] = 'Bonus';
                      $earnvalue[$earn] =  $this->Main->mycolumn3('payroll_records_bonus','amount', 'payroll',$payroll,'employee',$user,'company', $co);
                       $sumearn +=  $this->Main->mycolumn3('payroll_records_bonus','amount', 'payroll',$payroll,'employee',$user,'company', $co);

                      $earn++;

                    }


                    if($this->Main->isExist3('payroll_records_arrears', 'company',$co,'payroll',$payroll,'employee',$user)){

                      $earnname[$earn] = 'Arrears';
                      $earnvalue[$earn] =  $this->Main->mycolumn3('payroll_records_arrears','amount', 'payroll',$payroll,'employee',$user,'company', $co);
                       $sumearn += $this->Main->mycolumn3('payroll_records_arrears','amount', 'payroll',$payroll,'employee',$user,'company', $co);

                      $earn++;

                    }


                    if($this->Main->isExist3('payroll_records_allowance', 'company',$co,'payroll',$payroll, 'employee',$user)){

                $this->db->where('payroll',$payroll);
                $this->db->where('employee',$user);
                $this->db->where('company',$co);
                $this->db->group_by('allowance');
                $allowances =   $this->db->get('payroll_records_allowance');

                 $allowances = $allowances->result();
               if(!empty($allowances)){ foreach( $allowances as $all){

                $this->db->select('SUM(amount) as al56');
                $this->db->where('payroll',$payroll);
                $this->db->where('allowance',$all->allowance);
                $this->db->where('company',$co);
                $this->db->where('employee',$user);
                $this->db->group_by('allowance');
                $allowances5 =   $this->db->get('payroll_records_allowance');
                $allowances5 = $allowances5->result_array()[0]['al56'];

                $earnname[$earn] = $this->Main->mycolumn1('allowances','name', 'id',$all->allowance) ;
                $earnvalue[$earn] =  $allowances5;
               $sumearn += $allowances5;

                $earn++;



               }}}  

                    
               if($this->Main->isExist3('payroll_records_employer_deductions', 'company',$co,'payroll',$payroll,'employee',$user)){


                $deductname[$deduct] = 'Employer Deduct : '.$this->Main->mycolumn3('payroll_records_employer_deductions','reasons', 'payroll',$payroll,'employee',$user,'company', $co) ;
                $deductvalue[$deduct] =  $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$user,'company', $co) ;
                $sumdeduct +=$this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$user,'company', $co) ;
                $deduct++;


              }


              if($this->Main->isExist3('payrollrecords','payroll',$payroll,'employee',$user,'paye_cut',1)){


                $deductname[$deduct] = 'PAYE';
                $deductvalue[$deduct] =  $this->Main->payecalculations($payroll, $co, $user, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE'];
                $sumdeduct +=$this->Main->payecalculations($payroll, $co, $user, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE'];
                $deduct++;


              }




              if($this->Main->isExist3('payroll_records_benefits_fund', 'company',$co,'payroll',$payroll,'employee', $user)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('employee',$user);
          
                $this->db->where('company',$co);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 



                  $amount30 = $this->Main->calculatedfund($payroll, $co,  $user, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employee'];

                  if($amount30 > 0){

                $deductname[$deduct] =  $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ;
                $deductvalue[$deduct] =  $amount30;
                $sumdeduct +=$amount30;
                $deduct++;

                  }

              }}}







              if($this->Main->isExist3('payroll_records_loan_deductions', 'company',$co,'payroll',$payroll,'employee', $user)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('employee',$user);
          
                $this->db->where('company',$co);
                $this->db->group_by('loan_id');
               $fund =   $this->db->get('payroll_records_loan_deductions');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 


                $deductname[$deduct] =  $this->Main->mycolumn1('companyloans','name', 'id',$this->Main->mycolumn1('loans','loantype', 'id',$f->loan_id)).' : from '. $this->Main->mycolumn1('loans','giver', 'id',$f->loan_id);
                $deductvalue[$deduct] =  $f->amount;
                $sumdeduct += $f->amount;
                $deduct++;

                  

              }}}




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

  <p class="lead text-left col-md-3" style="padding-top: 10px"><span style=""><img src="<?= base_url() ?>assets/images/company_logo/<?= $this->session->userdata('companyarray')[$companyindex]['logo'] ?>" onerror="this.onerror=null;this.src='<?= base_url() ?>assets/images/logo.png';" style="height:50px"></span>




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



</div>

<div class="col-md-12">

  <table class="table-bordered table " style="background: transparent;">
    <thead>
      <th>Earnings</th>
      <th></th>
      <th>Deductions</th>
      <th></th>

    </thead>
    <tbody>

      <?php if($number_rows > 0 ){
        for ($m=0; $m < $number_rows; $m++) {
          

       ?>
      <tr>

      <td><?php if(isset($earnname[$m])){echo $earnname[$m];} ?></td>
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
  <th></th>
  <td></td>
  <th>NET SALARY</th>
  <th><?= number_format(($sumearn - $sumdeduct),2) ?></th>
  


</tr>


    </tbody>
  

  </table>

</div>

<div class="col-md-12">
<div class="col-md-12" style="margin-top: 10px">
  <p style="margin:0 0 5px" style="text-decoration: underline"><strong> <?=$this->Main->convertNumberToWord($sumearn - $sumdeduct) ; ?> TZS. Only</strong></p>
  </div>
</div>
<div class="col-md-12" style="margin-top: 10px">

<div class="col-md-6">

  <p style="margin:0 0 5px"><strong>Employee Signature : </strong>_____________________</p>
  <p style="margin:0 0 5px"><strong>Date : </strong>_____________________________________</p>
  
</div>
<div class="col-md-6">

  <p style="margin:0 0 5px"><strong>Employer Signature : </strong>_____________________</p>
  <p style="margin:0 0 5px"><strong>Date : </strong>_____________________________________</p>
  
</div>
  
</div>


</div>



 <script> 
 



</script>
