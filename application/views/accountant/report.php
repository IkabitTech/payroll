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

  <span></span><a class="btn btn-default " href="<?= base_url() ?>/records/summary/<?= $payroll?>/<?= $companyindex?>" > PRINT PDF</a>
</div>

<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive" id='mytablelist'>
<h2> PAYMENT IMPORTANT DETAILS <strong></strong></h2>
  <p class="lead" id="statusdeductionerror" style="color:red"></p>


<!-- Table start -->

<style type="text/css">

  table tbody td{

    font-size: 70%;
  }

  table thead th{

    font-size: 70%;
  }


</style>

<table class="table  table-hover table-striped table-bordered table-responsive printable" id='confirmed' style="width:100%; ">
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
      <th scope="col">DAY OVERTIME</th>
      <th scope="col">TOTAL PAY</th>
         <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      <th scope="col">NIGHT OVERTIME</th>
            <th scope="col">TOTAL PAY</th>

      <?php }?>
      <th scope="col">HORIDAY OVERTIME</th>
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
                  $mydeductions2 = 0;
               if(!empty($payrollrecords)){ foreach( $payrollrecords as $p){ 

                    $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$p->employee).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$p->employee) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$p->employee);
                       $title = $this->Main->mycolumn1('job_roles','name', 'id',$this->Main->mycolumn1('employees','job_title', 'id',$p->employee));
                       $status = $this->Main->mycolumn1('employmentstatus','name', 'id',$this->Main->mycolumn1('employees','employment_status', 'id',$p->employee));
                       $mybasic = number_format($p->basic*$p->daysinwork/$p->avgdays, 2);
                       $co = $this->session->userdata('companyarray')[$companyindex]['id'];
                       $gross = $p->basic*$p->daysinwork/$p->avgdays + $this->Main->sumArrears($payroll,$co,$p->employee) +$this->Main->sumBonus($payroll,$co,$p->employee) + $this->Main->sumAllowance($payroll,$co,$p->employee) + $p->o_holiday + $p->o_day + $p->o_night;

                       $total_loans = $this->Main->sumLoansDeducted($payroll,$co, $p->employee); ?>


    <tr >
      <th scope="row"><?= $k ?></th>
      <td ><?= $allnames ?></td>
      <td ><?= $title ?></td>
      <td ><?= $status ?></td>
      <td ><?= $p->basic ?></td>
      <td ><?= $mybasic ?></td>

       <?php if($this->Main->isExist2('payroll_records_arrears', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <td><?= $this->Main->mycolumn3('payroll_records_arrears','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 
    <?php } ?>

      <td ><?= $p->overtime_day_hours ?></td>
      <td ><?= $p->o_day ?></td>
  <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      
      <td ><?= $p->overtime_night_hours ?></td>
      <td ><?= $p->o_night ?></td>

      <?php }?>

      <td ><?= $p->overtime_holiday_hours ?></td>
      <td ><?= $p->o_holiday ?></td>

      <?php if($this->Main->isExist2('payroll_records_allowance', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){

                $this->db->select('*');
                $this->db->where('payroll',$payroll);
                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
               $allowances2 =   $this->db->get('payroll_records_allowance');

                 $allowances2 = $allowances2->result();
               if(!empty($allowances2)){ foreach( $allowances2 as $all2){ ?>

                <td ><?= $this->Main->mycolumn3('payroll_records_allowance','amount', 'payroll',$payroll,'employee',$p->employee,'allowance', $all2->allowance) ?></td> 
                

               <?php }}}?>




     <?php if($this->Main->isExist2('payroll_records_bonus', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

      <td><?= $this->Main->mycolumn3('payroll_records_bonus','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 


    <?php } ?>

     <?php if($this->Main->isExist2('payroll_records_employer_deductions', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'payroll',$payroll)){ ?>

       <td><?= $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ; $mydeductions += $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id'])  ?></td> 

    <?php } ?>

       <td ><?= number_format($gross) ?></td> 
       <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, (int)$gross, (float)str_replace(array(',',' '), '', $mybasic ) , (float)$p->basic)['taxable'] ,2)?></td> 
       <td ><?= $total_loans ; $mydeductions+= $total_loans   ?></td> 
       <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic ),(float)$p->basic)['PAYE'],2); $mydeductions += $this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic ),$p->basic)['PAYE'] ?> </td> 

       <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic ),(float)$p->basic)['social2'],2); $mydeductions+=$this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', $mybasic ),(float)$p->basic)['social2'] ?> </td> 






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

                <td ><?= number_format($this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic ),$p->basic)['employee']) ; $mydeductions +=$this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic ),$p->basic)['employee']  ?></td> 

              <?php }else{ ?>

                 <td > - </td> 


               <?php }}

             }}?>


              <td ><?= number_format($mydeductions,2) ?> </td> 


               

                <td ><?= number_format($this->Main->payecalculations($payroll, $co, $p->employee, $gross, (float)str_replace(array(',',' '), '', str_replace(array(',',' '), '', $mybasic ) ),$p->basic)['social'],2) ?></td> 

               
    
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

                <td ><?= number_format($this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic ),$p->basic)['employer']) ; $mydeductions2 +=$this->Main->calculatedfund($payroll, $co,  $p->employee, $f->fund,  $gross, (float)str_replace(array(',',' '), '', $mybasic ),$p->basic)['employer']  ?></td> 

              <?php }else{ ?>

                 <td > - </td> 


               <?php }}

             }}?>



           <td ><?= number_format($this->Main->calculatedfund($payroll, $co,  $p->employee, 2,  $gross, (float)str_replace(array(',',' '), '', $mybasic ),$p->basic)['topup'])  ?></td>              

      
<!-- <td class="row">

 
  <span> <a href="#editmypayroll<?= $p->employee ?>" data-toggle="modal"><strong><i class="fa fa-eye"></i> </strong></a> </span>
</td>  -->     
    </tr>

  <?php $k++; }  }}?>
   
  </tbody>
</table>


<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->
<!--Controls-->
    
        <!--/.Controls-->

</div>

<!-- container end end -->

    <a id="bleft" href='#' class="left carousel-control notprint" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '-=200px' }, 'slow');">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Left</span>
        </a>
        <a id="bright" href='#'   class="right carousel-control notprint" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '+=200px' }, 'slow');">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Right</span>
        </a>

  

<!-- Modal for days settings -->

</div>
