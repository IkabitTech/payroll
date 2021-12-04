<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>PAYROLL REPORT</h1>

          <ul class="breadcrumb">
<?php if($this->session->userdata('level') == 3){ ?>
                      <li><a href="#">Accountant</a></li>

        <?php }elseif($this->session->userdata('level') == 2){ ?>
                      <li><a href="#">Supervisor</a></li>

        <?php } ?>            <li><a href="#">Payroll</a></li>
            <li class="#">pay</li>
          </ul>
        </div>
      </header>  



<div class="container notprint">

  <span></span><a class="btn btn-default " href="#" onclick="window.print()"> PRINT </a>
</div>

<!-- start me -->

<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->


 
<div class= "col-md-12 table-responsive" id='mytablelist'>
<!-- 
<h2><span><img src="<?= base_url() ?>images/companylogo/<?= $this->session->userdata('companyarray')[$companyindex]['logo'] ?>" onerror="this.onerror=null;this.src='https://www.vipaji.co.tz/sites/default/files/vipajlogo.png';" style="height:40px"></span> <?= $pageTitle ?> <strong></strong></h2> -->



 <p class="lead text-left col-md-3" style="padding-top: 10px"><span style=""><img src="<?= base_url() ?>assets/images/company_logo/<?= $this->session->userdata('companyarray')[$companyindex]['logo'] ?>" onerror="this.onerror=null;this.src='<?= base_url() ?>assets/images/logo.png';" style="height:20px"/></span>







</p>
<div class="col-md-6">
<p class="lead text-center" style="margin-top: 10px"> <?= $pageTitle ?></p>
</div>


<!-- Table start -->

<style type="text/css">

  table tbody td{

    font-size: 70%;
  }

  table thead th{

    font-size: 70%;
  }


</style>

<table class="table  table-hover table-striped table-bordered  printable" id='confirmed9'  style="overflow-x: auto;">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col">TITLE</th>
      <th scope="col">EMPLOYEE STATUS</th>
      <th scope="col">ACTUAL BASIC (TZS)</th>
      <th scope="col">BASIC (TZS)</th>

       <?php if($this->Main->isExist2('payroll_records_arrears', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <th scope="col">ARREARS</th>
    <?php } ?>
      <th scope="col">DAY OVERTIME (hrs)</th>
      <th scope="col">TOTAL PAY</th>
         <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      <th scope="col">NIGHT OVERTIME (hrs)</th>
            <th scope="col">TOTAL PAY</th>

      <?php }?>
      <th scope="col">HORIDAY OVERTIME (hrs)</th>
      <th scope="col">TOTAL PAY</th>
               <?php if($this->Main->isExist2('payroll_records_allowance', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->where('payroll',$payroll);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
               $allowances =   $this->db->get('payroll_records_allowance');

                 $allowances = $allowances->result();
               if(!empty($allowances)){ foreach( $allowances as $all){ ?>

                <th scope="col"><?= $this->Main->mycolumn1('allowances','name', 'id',$all->allowance) ?></th> 

               <?php }}}?>



     <?php if($this->Main->isExist2('payroll_records_bonus', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <th scope="col">Bonus</th>
    <?php } ?>

     <?php if($this->Main->isExist2('payroll_records_employer_deductions', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <th scope="col">Employer deduction</th>

    <?php } ?>

      <th scope="col">GROSS</th>
      <th scope="col">TAXABLE</th>



      <th scope="col">Loan Deduct</th>
      <th scope="col">PAYE</th> 
      <th scope="col">SOCIAL SECURITY</th> 




    <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
                $this->db->where('employee_percent >',0);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

                <th scope="col"><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?></th> 

               <?php }}}?>

        <th scope="col">TOTAL DEDUCTION</th>
        <th scope="col">EMPLOYER SOCIAL SECURITY</th> 



    
<?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
                $this->db->where('employer_percent >',0);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

                <th scope="col">EMPLOYER <?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?></th> 

               <?php }}}?>





        <th scope="col">NHIF TOP UP</th>

     
    <!-- <th ></th>  -->
      
    </tr>
  </thead>
  <tbody class="" >

   <?php if($this->Main->isExist2('payrollrecords', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

    $k = 1;

                $this->db->where('payroll',$payroll);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
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
                    $tt_totaldeductions = 0;

               if(!empty($payrollrecords)){ foreach( $payrollrecords as $p){ 

                    $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$p->employee).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$p->employee) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$p->employee);
                       $title = $this->Main->mycolumn1('job_roles','name', 'id',$this->Main->mycolumn1('employees','job_title', 'id',$p->employee));
                       $status = $this->Main->mycolumn1('employmentstatus','name', 'id',$this->Main->mycolumn1('employees','employment_status', 'id',$p->employee));
                       $mybasic = number_format($p->basic*$p->daysinwork/$p->avgdays, 2);
                       $tt_basic += $p->basic*$p->daysinwork/$p->avgdays;
                       $co = $this->session->userdata('companyarray')[$companyindex]['id'];

                       $gross = $p->basic*$p->daysinwork/$p->avgdays + $this->Main->sumArrears($payroll,$co,$p->employee) +$this->Main->sumBonus($payroll,$co,$p->employee) + $this->Main->sumAllowance($payroll,$co,$p->employee) + $p->o_holiday + $p->o_day + $p->o_night;
                       $tt_gross += $gross;

                       $total_loans = $this->Main->sumLoansDeducted($payroll,$co, $p->employee);

                       $tt_loandeduct += $total_loans;


                       ?>


    <tr >
      <th scope="row"><?= $k ?></th>
      <td ><?= $allnames ?></td>
      <td ><?= $title ?></td>
      <td ><?= $status ?></td>
      <td ><?= $p->basic; $tt_actual+=$p->basic; ?></td>
      <td ><?= $mybasic ;  ?></td>

       <?php if($this->Main->isExist2('payroll_records_arrears', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <td><?= number_format($this->Main->mycolumn3('payroll_records_arrears','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id'])); $tt_arrears += $this->Main->mycolumn3('payroll_records_arrears','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 
    <?php } ?>

      <td ><?= $p->overtime_day_hours; $tt_overtime_day1 +=$p->overtime_day_hours  ?></td>
      <td ><?= $p->o_day;  $tt_overtime_day2 +=$p->o_day ?></td>
  <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      
      <td ><?= $p->overtime_night_hours; ; $tt_overtime_night1 +=$p->overtime_night_hours  ?></td>
      <td ><?= $p->o_night;  $tt_overtime_night2 +=$p->o_night ?></td>

      <?php }?>

      <td ><?= $p->overtime_holiday_hours; ; $tt_overtime_hol1 +=$p->overtime_holiday_hours  ?></td>
      <td ><?= $p->o_holiday ; $tt_overtime_hol2 +=$p->o_holiday  ?></td>

      <?php if($this->Main->isExist2('payroll_records_allowance', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
               $allowances2 =   $this->db->get('payroll_records_allowance');

                 $allowances2 = $allowances2->result();
               if(!empty($allowances2)){ foreach( $allowances2 as $all2){ ?>

                <td ><?= $this->Main->mycolumn3('payroll_records_allowance','amount', 'payroll',$payroll,'employee',$p->employee,'allowance', $all2->allowance); ?></td> 
                

               <?php }}}?>




     <?php if($this->Main->isExist2('payroll_records_bonus', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <td><?= $this->Main->mycolumn3('payroll_records_bonus','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ; $tt_bonus+=$this->Main->mycolumn3('payroll_records_bonus','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 


    <?php } ?>

     <?php if($this->Main->isExist2('payroll_records_employer_deductions', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

       <td><?= $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ; $mydeductions += $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']); $tt_employer_deductions+=$this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ; $mydeductions += $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']);   ?></td> 

    <?php } ?>

       <td ><?= number_format($gross) ?></td> 
       <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, (int)$gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['taxable'] ,2); $tt_taxable+=$this->Main->payecalculations($payroll, $co, $p->employee, (float)$gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['taxable']; ?></td> 


       <td ><?= $total_loans ; $mydeductions+= $total_loans   ?></td> 
       <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE'],2); $mydeductions += $this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE']; $tt_paye+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE']; ?> </td> 

       <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['social'],2); $mydeductions+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['social'] ; $tt_social+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['social'] ?> </td> 






    <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
                $this->db->where('employee_percent >',0);

                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 

                if($this->Main->isExist3('payroll_records_benefits_fund', 'fund',$f->fund,'payroll',$payroll,'employee', $p->employee)){

                ?>

                <td ><?= number_format($this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employee']) ; $mydeductions +=$this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employee']  ?>  </td>




 <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
              

                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 

                if($this->Main->isExist3('payroll_records_benefits_fund', 'fund',$f->fund,'payroll',$payroll,'employee', $p->employee)){

                ?>



 <input type="number" step="0.001" class="hidden notprint tt_bfund<?=$f->fund?>" value="<?=$this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employee'] ?>">
 <input type="number" step="0.001" class="hidden notprint tt_2bfund<?=$f->fund?>" value="<?=$this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employer'] ?>">
 <input type="number" step="0.001" class="hidden notprint tt_3bfund<?=$f->fund?>" value="<?=$this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['topup'] ?>">

<?php }}}} ?>




              <?php }else{ ?>

                 <td > - </td> 


               <?php }}

             }}?>


                <td ><?= number_format($mydeductions,2) ; $tt_totaldeductions+=$mydeductions ?> </td> 

<td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['social2'],2); $tt_social2+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['social2'] ?> </td> 

                <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
                $this->db->where('employer_percent >',0);

                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 

                if($this->Main->isExist3('payroll_records_benefits_fund', 'fund',$f->fund,'payroll',$payroll,'employee', $p->employee)){

                ?>

                <td ><?= number_format($this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employer'])  ?></td> 

              <?php }else{ ?>

                 <td > - </td> 


               <?php }}

             }}?> 

                <td ><?= number_format($this->Main->calculatedfund($payroll, $co,  $p->employee, 2 ,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['topup']); $tt_topup+= $this->Main->calculatedfund($payroll, $co,  $p->employee, 2,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['topup'] ?></td>              

      
<!-- <td class="row">

 
  <span> <a href="#editmypayroll<?= $p->employee ?>" data-toggle="modal"><strong><i class="fa fa-eye"></i> </strong></a> </span>
</td>  -->     
    </tr>

  <?php $k++; }  }}?>




<tr >
      <td></td>
      <td ><strong>TOTAL</strong></td>
      <th ></th>
      <th ></th>
      <th ><?= number_format($tt_actual,2) ?></th>
      <th><?= number_format($tt_basic,2) ?></th>

       <?php if($this->Main->isExist2('payroll_records_arrears', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <th><?= number_format($tt_arrears,2) ?></th>
    <?php } ?>

      <th><?= number_format($tt_overtime_day1,2) ?></th>
      <th><?= number_format($tt_overtime_day2,2) ?></th>

 <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      
      

      <th><?= number_format($tt_overtime_night1,2) ?></th>
       <th><?= number_format($tt_overtime_night2,2) ?></th>

      <?php }?>   
      <th><?= number_format($tt_overtime_hol1,2) ?></th>
      <th><?= number_format($tt_overtime_hol2,2) ?></th>

               <?php if($this->Main->isExist2('payroll_records_allowance', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->where('payroll',$payroll);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
               $allowances =   $this->db->get('payroll_records_allowance');

                 $allowances = $allowances->result();
               if(!empty($allowances)){ foreach( $allowances as $all){

                $this->db->select('SUM(amount) as al56');
                $this->db->where('payroll',$payroll);
                $this->db->where('allowance',$all->allowance);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
                $allowances5 =   $this->db->get('payroll_records_allowance');
                $allowances5 = $allowances5->result_array()[0]['al56'];


                ?>

                <th><?= number_format($allowances5,2) ?></th>

               <?php }}}?>



     <?php if($this->Main->isExist2('payroll_records_bonus', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

                <th><?= number_format($tt_bonus,2) ?></th>
    <?php } ?>

     <?php if($this->Main->isExist2('payroll_records_employer_deductions', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

                <th><?= number_format($tt_employer_deductions,2) ?></th>

    <?php } ?>

      <th><?= number_format($tt_gross,2) ?>
        
                <input type="number" step="0.001" class="hidden notprint " id='ourtotalgross' value="<?=$tt_gross ?>">

      </th>
      <th><?= number_format($tt_taxable,2) ?></th>



      <th><?= number_format($tt_loandeduct,2) ?></th>
      <th><?= number_format($tt_paye,2);  ?>
        <input type="number" step="0.001" class="hidden notprint " id='ourtotalpaye' value="<?=$tt_paye ?>">
      </th>
      <th><?= number_format($tt_social,2) ?></th>




    <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
                $this->db->where('employee_percent >',0);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 


                ?>

                <th id= "my1fundtotal<?=$f->fund?>"></th>

           
               <?php }

             }}?>

      <th><?= number_format($tt_totaldeductions,2) ?></th>

        <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
             
             
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
               
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

 <input type="number" step="0.001" class="hidden notprint ff_bfund<?=$f->fund?>" value="<?=$this->Main->calculatedfund($payroll, $co,  $f->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employee'] ?>">
 <input type="number" step="0.001" class="hidden notprint ff_2bfund<?=$f->fund?>" value="<?=$this->Main->calculatedfund($payroll, $co,  $f->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['employer'] ?>">
 <input type="number" step="0.001" class="hidden notprint ff_3bfund<?=$f->fund?>" value="<?=$this->Main->calculatedfund($payroll, $co,  $f->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['topup'] ?>">
     <?php }}}?>

      <th><?= number_format($tt_social2,2) ?></th>

          

                <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('fund !=',7);
                $this->db->where('fund !=',1);
                $this->db->where('employer_percent >',0);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 


                ?>

                <th id= "my2fundtotal<?=$f->fund?>"></th> 

           
               <?php }

             }}?>

      <th><?= number_format($tt_topup,2) ?></th>
 
    <!-- <th ></th>  -->
      
    </tr>

  
  </tbody>
</table>


<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->
<!--Controls-->
    
        <!--/.Controls-->





</div>

<!-- container end end -->

  <!--   <a id="bleft" href='#' class="left carousel-control notprint" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '-=200px' }, 'slow');">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Left</span>
        </a>
        <a id="bright" href='#'   class="right carousel-control notprint" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '+=200px' }, 'slow');">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Right</span>
        </a>
 -->
  

<!-- Modal for days settings -->




<div class="col-md-12">
<div class="row col-md-4" style="padding: 30px">

  
<table class="table table-responsive table-striped table-bordered" style="background: transparent;">
          <thead class="table-bordered">
            <tr class="">
              <th scope="col">SUMMARY OF STATUTORY DEDUCTIONS PAYABLE</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">  TZS</th>
            </tr>
          </thead>
          <tbody class="">
            
            <tr style="background: transparent;">
              <td >PAYE</td>
              <td></td>
              <td></td>
              <td><?= number_format($tt_paye,2) ?></td>
            </tr>

 <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
             
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

            <tr id= "amountfund<?= $f->fund ?>">
              <td><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?></td>
              <td></td>
              <td></td>
              <td id= "amount2fund<?= $f->fund ?>"></td>
            </tr>


            <tr id= "topupfund<?= $f->fund ?>">
              <td><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?> TOPUP</td>
              <td></td>
              <td></td>
              <td id= "topup2fund<?= $f->fund ?>"></td>
            </tr>

             <?php }}}?>

            
            <tr>
              <th >Total</th>
              <td></td>
              <td></td>
              <th class="totalupper"></th>
            </tr>
            <tr style="visibility:hidden">
              <td ></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th >Cost to Compny:</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr style="background: transparent;">
              <td >Gross Pay</td>
              <td></td>
              <td></td>
              <td><?= number_format($tt_gross,2) ?></td>
            </tr>
           
 <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
             
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

            <tr id= "amount2_fund<?= $f->fund ?>">
              <td><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?></td>
              <td></td>
              <td></td>
              <td id= "amount2_2fund<?= $f->fund ?>"></td>
            </tr>


            <tr id= "topup2_fund<?= $f->fund ?>">
              <td><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?> TOPUP</td>
              <td></td>
              <td></td>
              <td id= "topup2_2fund<?= $f->fund ?>"></td>
            </tr>

             <?php }}}?>
            
            <tr>
              <th >Total</th>
              <td></td>
              <td></td>
              <th id="totalupper2"></th>
            </tr>

            <tr style="visibility: hidden;">
              <td ></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>


            <tr>
              <td >Distribution:</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr style="background: transparent;">
              <td >Staff in TShs</td>
              <td></td>
              <td></td>
              <td><?= number_format($tt_gross - $tt_totaldeductions) ?></td>
            </tr>
            <tr>
              <td >Statutory Deductions</td>
              <td></td>
              <td></td>
              <td class="totalupper"></td>
            </tr>
            <tr style="background: transparent;">
              <th >Total</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            
            
          </tbody>
        </table>

</div>




<div class="col-md-7" style="padding-top: 30px">
  <h3 class="text-center" style="margin-bottom: 20px">SUMMARY OF EACH COMPANY - PERMANENT & PROBATION</h3>


  
<table class="table table-responsive table-striped table-bordered">
          <thead class="table-bordered">
            <tr class="">
              <th scope="col">No of Employees</th>
              <th>GROSS PAY</th>
              <th>PAYE</th>
              <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
             
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

     
              <th class="hidemyfundname<?=$f->fund?>"><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund) ?></th>
              <tH class="hidemyfundtopup<?=$f->fund?>"><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->fund). ' TOP UP' ?></th>
             



             <?php }}}?>
              <th scope="col">BANK</th>
             
            </tr>
          </thead>
          <tbody class="">
            
            <tr>
            <th ><?= $k-1 ?></th>
            <td><?= number_format($tt_gross) ?></td>
            <td><?= number_format($tt_paye) ?></td>
<?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
             
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

     
              <td class="hidemyfundname<?=$f->fund?> fundfname<?=$f->fund?>"></td>
              <td class="hidemyfundtopup<?=$f->fund?> fundtopup<?=$f->fund?>"></td>
             

             <?php }}}?>
            <td></td>             
            </tr>

             <tr>
              <tH >GRAND TOTAL</tH>
            <td><?= number_format($tt_gross) ?></td>
            <td><?= number_format($tt_paye) ?></td>
            <?php if($this->Main->isExist2('payroll_records_benefits_fund', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
             
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('fund');
               $fund =   $this->db->get('payroll_records_benefits_fund');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

     
              <td class="hidemyfundname<?=$f->fund?> fundfname<?=$f->fund?>"></td>
              <td class="hidemyfundtopup<?=$f->fund?> fundtopup<?=$f->fund?>"></td>
             

             <?php }}}?>
              <td></td>
            </tr>

            
          </tbody>
        </table>

 <div class="col-md-12" style="margin-top: 10px">
  <p class="col-md-12"><strong>For Vipaji</strong></p>

<div class="col-md-4" style="margin:0px;padding: 0px">
    <p style="margin:0 0 0px;padding: 0px">PREPARED BY:</br><strong>ACCOUNTANT ___________________</strong></p>

  
</div>


<div class="col-md-4" style="margin:0px">

    <p style="margin:0 0 0px;">CHECKED BY:</br><strong>OPERATIONAL MANAGER _________________</strong></p>

</div>



<div class="col-md-4" style="margin:0px;padding: 0px">
 
    <p style="margin:0 0 0px;padding: 0px">AUTHORIZED BY:</br><strong>MANAGING DIRECTOR __________________</strong></p>

</div>



</div>


 <div class="col-md-12" style="margin-top: 10px">
  <p class="col-md-12"><strong>For <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?></strong></p>

<div class="col-md-4" style="margin:0px;padding: 0px">
    <p style="margin:0 0 0px;padding: 0px">PREPARED BY:</br><strong>SUPERVISOR ___________________</strong></p>

  
</div>


<div class="col-md-4" style="margin:0px">

    <p style="margin:0 0 0px;">CHECKED BY:</br><strong>MANAGER _________________</strong></p>

</div>



<div class="col-md-4" style="margin:0px;padding: 0px">
 
    <p style="margin:0 0 0px;padding: 0px">AUTHORIZED BY:</br><strong>MANAGING DIRECTOR __________________</strong></p>

</div>



</div>





</div>







</div>
