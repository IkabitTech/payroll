<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>Loans</h1>

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
                

                          
<div class="container" >

<?php if(((int)$this->session->userdata('level') == 3 || (int)$this->session->userdata('level') == 1) && $this->Main->isExist2('payroll_rec','id',$payroll,'submitted', 0)){ ?>

  <a  class=" label label-primary " data-toggle="modal" href="#searchemployee" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Add  Another Employee</a>


<a  class=" label label-primary " href="#" onclick=' $("#loadedentry").html(" Loading...");$.get("<?= base_url() ?>actions/createpayroll/<?= $this->session->userdata("companyarray")[$companyindex]["id"] ?>/<?= $payroll ?>",{},function(r){ $("#loadedentry").html("");addednumberemployees(r)  });'  rel="nofollow" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Loading All Employee Who are not in List </a>

 <a  class=" label label-primary " data-toggle="modal" href="#deletemyemployeeall" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Remove/Clear All Employees</a>

   <span id="loadedentry"></span>



<!-- <a  class=" label label-primary " data-toggle="modal" href="#uploadExcel" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px"></a> -->




<?php } ?>
</div>

<!-- container end end -->

<!--  <a  class=" label label-primary " data-toggle="modal" href="#searchemployee" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Add  Another Employee</a>
 -->


<!-- start me -->

                            
<div class="" >

  <div id="table2" style="margin-left: 80px;margin-right: 80px" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= " table-responsive" id='mytablelist'>
<h2 class="container"> PAYMENT IMPORTANT DETAILS <strong></strong></h2>
  <p class="lead" id="statusdeductionerror" style="color:red"></p>


<!-- Table start -->

<table class="table   table-hover table-striped table-bordered " style="width: 100%">
  <thead>
    <tr >
      <th scope="col">#</th>
      <th scope="col">EMPLOYEE</th>
      <th scope="col">BASIC</th>
      <th scope="col">DAYS</th>
      <th scope="col">DAY OVERTIME (hrs)</th>
         <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      <th scope="col">NIGHT OVERTIME  (hrs)</th>
      <?php }?>
      <th scope="col">HOLIDAY OVERTIME  (hrs)</th>



               <?php 

                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
               $allowances =   $this->db->get('have_allowance');

                 $allowances = $allowances->result();
               if(!empty($allowances)){ foreach( $allowances as $all){ ?>

                <th scope="col"><?= $this->Main->mycolumn1('allowances','name', 'id',$all->allowance) ?></th> 

               <?php }}?>



      <th scope="col">Arrears</th>
 


      <th scope="col">Bonus</th>
 



      <th scope="col">Employer deduction</th>



      <th scope="col">Loan Deduct</th>
      <th scope="col">PAYE</th> 



    <?php if($this->Main->isExist3('benefits_funds', 'company_id',$this->session->userdata('companyarray')[$companyindex]['id'],'is_active',1,'is_deleted',0)){

                $this->db->select('*');
                $this->db->where('company_id',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->where('is_deleted',0);
                $this->db->where('is_active',1);
                $this->db->group_by('name');
               $fund =   $this->db->get('benefits_funds');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ ?>

                <th scope="col"><?= $this->Main->mycolumn1('benefittypes','name', 'id',$f->name) ?></th> 

               <?php }}}?>

     
    <th ></th> 
      
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
               if(!empty($payrollrecords)){ foreach( $payrollrecords as $p){ 

                    $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$p->employee).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$p->employee) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$p->employee);

                    $payee22 = 'no';
                    if($p->paye_cut == 1){

                      $payee22 = 'yes';
                    }


                ?>


    <tr style="background:<?php if( $this->Main->isExist5('loans','pay_style',3,'status','active', 'employee', $p->employee, 'startdate <= ',date("Y-m-d"), 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ echo 'lightsalmon';} ?>">
      <th scope="row"><?= $k ?></th>
      <td ><?= $allnames ?></td>
      <td 

onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
       
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('basic salary');

            "


      ><?= $p->basic ?></td>
      <td  onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('attendance');
        $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
        


            "

            ><?= $p->daysinwork ?> </td>

      <td 


onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
       
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('day overtime hours');

            "


      ><?= $p->overtime_day_hours ?></td>
  <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
      
      <td 

       onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
       
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('night overtime hours');

            "


      ><?= $p->overtime_night_hours ?></td>

      <?php }?>

      <td 

onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
       
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('holiday overtime hours');

            "



      ><?= $p->overtime_holiday_hours ?></td>

      <?php 

                $this->db->where('company',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('allowance');
               $allowances2 =   $this->db->get('have_allowance');

                 $allowances2 = $allowances2->result();
               if(!empty($allowances2)){ foreach( $allowances2 as $all2){ ?>

                <td ><?= $this->Main->mycolumn3('payroll_records_allowance','amount', 'payroll',$payroll,'employee',$p->employee,'allowance', $all2->allowance) ?></td> 

               <?php }}?>





      <td


onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('arrears');

            "



      ><?= $this->Main->mycolumn3('payroll_records_arrears','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 


   

      <td



onclick="
      
      $('#editpossibles').modal('show');
          // $('#myvalue').focus();
       $('#myvalue').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
        $('#myvalue0').val(<?= $p->id ?>);
        $('#myvalue1').val('bonus');

            "




      ><?= $this->Main->mycolumn3('payroll_records_bonus','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 


    


       <td 



onclick="
      
      $('#editpossibles2').modal('show');
          // $('#myvalue').focus();
       $('#my2value').val(parseFloat(this.textContent));
        $('td').each(function(){$(this).removeClass('refreshelement')});
        $(this).addClass('refreshelement');
        $('#my2value00').val('<?= $this->Main->mycolumn3('payroll_records_employer_deductions','reasons', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?>');
       
        $('#my2value0').val(<?= $p->id ?>);
        $('#my2value1').val('employer deductions');

            "

        ><?= $this->Main->mycolumn3('payroll_records_employer_deductions','amount', 'payroll',$payroll,'employee',$p->employee,'company', $this->session->userdata('companyarray')[$companyindex]['id']) ?></td> 


       <td ><?= $p->total_loans ?></td> 
       
       <td ><?= $payee22 ?></td> 




     

  


    <?php if($this->Main->isExist3('benefits_funds', 'company_id',$this->session->userdata('companyarray')[$companyindex]['id'],'is_active',1,'is_deleted',0)){

                $this->db->select('*');
                $this->db->where('company_id',$this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->where('is_deleted',0);
                $this->db->where('is_active',1);
                $this->db->group_by('name');
               $fund =   $this->db->get('benefits_funds');

                 $fund = $fund->result();
               if(!empty($fund)){ foreach( $fund as $f){ 

                if($this->Main->isExist3('payroll_records_benefits_fund', 'fund',$f->name,'payroll',$payroll,'employee', $p->employee)){

                ?>

                <td >yes</td> 
              <?php }else{ ?>

                 <td >no</td> 


               <?php }}}}?>

      
<td class="row">

  <?php if($this->Main->isExist2('payroll_rec','id',$payroll,'submitted', 0)){?>

    <?php if(((int)$this->session->userdata('level') == 3 || (int)$this->session->userdata('level') == 1)){ ?>


  <span> <a href="#editmypayroll<?= $p->employee ?>" data-toggle="modal"><strong><i class="fa fa-pencil"></i> </strong></a> </span>
  <span> <a href="#deletemyemployee<?= $p->employee ?>" data-toggle="modal"><strong><i class="fa fa-trash"> </i></strong></a> </span>

<?php } }?>
</td>      
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
<div class="container">
    <?php if(((int)$this->session->userdata('level') == 3 || (int)$this->session->userdata('level') == 1) && $this->Main->mycolumn1('payroll_rec','confirmed','id',$payroll) != 1){ ?>


  <?php if($this->Main->isExist2('payroll_rec','id',$payroll,'submitted', 0)){ ?>



<p class="lead text-center"  >Click the Button below to save Employees to this Payroll Record (<?= date_format(date_create($this->Main->mycolumn1('payroll_rec','name','id',$payroll)), 'M Y') ?>)  . Remember You cant Edit anything Unless you unsave. All Reports Generated from Confirmed Payroll which have been Approved by Supervisor</p>
<button class="btn btn-default" onclick="submittingpayrollrec(<?= $payroll ?>, <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>)">SUBMITTING</button>



  <?php }if($this->Main->isExist2('payroll_rec','id',$payroll,'submitted', 1)){?>



<p class="lead text-center"  >Click the Button below to unsave this Payroll Record (<?= date_format(date_create($this->Main->mycolumn1('payroll_rec','name','id',$payroll)), 'M Y') ?>) . Remember You If you unsave Supervisor caqnt confirm it. All Reports Generated from Confirmed Payroll</p>
<button class="btn btn-default" onclick="unsubmitpayrollrec(<?= $payroll ?>)" >UNSAVE</button>


  <?php }}?>


    <?php if($this->session->userdata('level') == 2 && $this->Main->mycolumn1('payroll_rec','confirmed','id',$payroll) != 1 && $this->Main->isExist2('payroll_rec','id',$payroll,'submitted', 1))  { ?>

<p class="lead text-center"  >Confirm This Payroll (<?= date_format(date_create($this->Main->mycolumn1('payroll_rec','name','id',$payroll)), 'M Y') ?>) . After Confirm Accountant will do nothing, Also you can Unconfirm Later, Remember All calculations from the report came from COnfirmed Payroll.</p>
<button class="btn btn-default" onclick="confirmpayrollrec(<?= $payroll ?>)" >CONFIRM</button>

    <?php } ?>


      <?php if($this->session->userdata('level') == 2 && $this->Main->mycolumn1('payroll_rec','confirmed','id',$payroll) == 1 )  { ?>

<p class="lead text-center"  >Unconfirm This Payroll (<?= date_format(date_create($this->Main->mycolumn1('payroll_rec','name','id',$payroll)), 'M Y') ?>) . After Unconfirm Accountant will do some changes and Submit it back to you/, Also you can confirm Later, Remember All calculations from the report came from Confirmed Payroll.</p>
<button class="btn btn-default" onclick="unconfirmpayrollrec(<?= $payroll ?>)" >UNCONFIRM</button>

    <?php } ?>

      <?php if($this->session->userdata('level') == 2 && $this->Main->isExist2('payroll_rec','id',$payroll,'submitted', 0) )  { ?>

<p class="lead text-center"  >Wait Payroll (<?= date_format(date_create($this->Main->mycolumn1('payroll_rec','name','id',$payroll)), 'M Y') ?>) . To be Submitted .</p>

    <?php } ?>


</div>

</div><!-- container end end -->

    <a id="bleft" href='#' class="left carousel-control" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '-=200px' }, 'slow');">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Left</span>
        </a>
        <a id="bright" href='#'   class="right carousel-control" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '+=200px' }, 'slow');">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Right</span>
        </a>

  <div class="modal fade" id="alerting">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="color:green" id="alerting4"></p>
      </div>
    </div>
  </div>
</div>



  <div class="modal fade" id="alerting2">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="color:red" id="alerting5"></p>
      </div>
    </div>
  </div>
</div>


<!-- Modal for days settings -->





<div id="myemployees">
<!-- Modal Description viewp1 -->
<div class="modal fade " id="searchemployee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
<div class= 'col-md-12'>
<form method="get" action="#" class="input-group " style="margin-bottom:20px; width:100%">
<input type="text" class="form-control" name="searchemp" id="searchvalue"  onchange="filtere2()" onkeyup="filtere2()" value="" placeholder="Filter Employees">
</form></div>

<div class="container-fluid filtere modal-item">

 <?php

           $employee2 = $this->Main->all2('employees', 'status', 'active','company_id', $this->session->userdata('companyarray')[$companyindex]['id'] );



                      if(!empty($employee2)){
                      
                 foreach( $employee2 as $employee){ if(!$this->Main->isExist3('payrollrecords', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'employee', $employee['id'], 'payroll' , $payroll)){
    $allnames = $employee['first_name'].' '. $employee['middle_name'] .' '.$employee['last_name'];

                  ?>


      <!--   <a class="btn col-md-6 empl active" data-toggle="modal" href="#payemployee<?= $employee['id'] ?>" onclick="$('#employerdeductionreason<?= $employee['id']?>').hide();"><strong><?= $allnames ?> </strong></a>
 -->
            <a class="btn col-md-6 empl active"><strong><?= $allnames ?> </strong></a>


<?php } }} ?>
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->

</div>



<div style=" width: 100px; height: 100px;visibility: hidden;" id="toprint"></div>



<!-- stariting edit  -->



           
 <?php

           $employee2 = $this->Main->all2('employees', 'status', 'active','company_id', $this->session->userdata('companyarray')[$companyindex]['id'] );



                      if(!empty($employee2)){
                      
                 foreach( $employee2 as $employee){ if(!$this->Main->isExist3('payrollrecords', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'employee', $employee['id'], 'payroll' , $payroll)){
    $allnames = $employee['first_name'].' '. $employee['middle_name'] .' '.$employee['last_name'];

                  ?>


<!-- Modal Description viewp1 -->
<div class="modal fade " id="payemployee<?= $employee['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12'>
            <p class="lead"> NAME : <?= $allnames ?> </p>
            <p class="lead"> BASIC: SALARY : <?= $this->Main->mycolumn1('employeesalary','amount','id',$employee['id']) ?></p>
            <p class="lead" id="payeployeeerror<?= $employee['id'] ?>" style="color:red"></p>
                                     <form id='payemployeeform<?= $employee['id']?>''>

                
                <div class="row">
                  <div class="form-group">

             <div class="col-md-6">
                      <label>Basic Salary</label>
                      <input type="number" step="0.01" required value="<?= $this->Main->mycolumn1('employeesalary','amount','id',$employee['id']) ?>"  placeholder="" class="form-control" id='basic<?= $employee['id']?>' name='basic'>
 
                    </div>

                    <div class="col-md-6">
                      <label>Total Working Days </label>
                      <input type="number" required value="<?= $this->Main->mycolumn1('average_monthdays','no_days','company_id',$this->session->userdata('companyarray')[$companyindex]['id']) ?>" <?php if($this->Main->mycolumn1('average_monthdays','calculation_type','company_id',$this->session->userdata('companyarray')[$companyindex]['id']) == 'fixed'){echo 'readonly';} ?> placeholder="" class="form-control" id='wdays<?= $employee['id']?>'  name='wdays'>
 
                    </div>


                    <div class="col-md-6">
                      <label>Day Overtime Hours </label>
                      <input type="number" required value="0" placeholder="" class="form-control" id='dayovertime<?= $employee['id']?>' name='dayovertime'>

                    </div>


             <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
                    <div class="col-md-6">
                      <label>Night Overtime Hours </label>
                      <input type="number" required value="0" placeholder="" class="form-control" id='nightovertime<?= $employee['id']?>' name='nightovertime'>

                    </div>

                  <?php } ?>


                    <div class="col-md-6">
                      <label>Holiday Overtime Hours</label>
                      <input type="number" required value="0" placeholder="" class="form-control" id='holidayovertime<?= $employee['id']?>' name='holidayovertime'>

                    </div>


                  <?php  $allowance = $this->Main->all1('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] );



                      if(!empty($allowance)){foreach( $allowance as $all){ ?>
                    <div class="col-md-6">
                      <label><?= $this->Main->mycolumn1('allowances','name','id',$all['allowance']) ?></label>
                      <input type="number" required value="0" placeholder="" class="form-control" id='allowance<?= $all['allowance'] ?>_<?= $employee['id']?>' name='allowance<?= $all['allowance'] ?>'>

                    </div>


                   <?php }}?>





                    <div class="col-md-6">
                      <label>Arrears</label>
                      <input type="number" step="0.01" required value="0" placeholder="" class="form-control" id='arrears<?= $employee['id']?>' name='arrears'>

                    </div>


                    <div class="col-md-6">
                      <label>Employer Total Deductions</label>
                      <input type="number" step="0.01" required value="0"  placeholder="" class="form-control" id='employeededuction<?= $employee['id']?>' name='employerdeduction' onchange="if($('#employeededuction<?= $employee['id']?>').val() > 0){$('#employerdeductionreason<?= $employee['id']?>').show()}else{$('#employerdeductionreason<?= $employee['id']?>').hide()}">

                    </div>



                    <div class="col-md-6" id='employerdeductionreason<?= $employee['id']?>'>
                      <label>Reason for a Deduction</label>
                      <input type="text"  required  placeholder="" class="form-control"  name='reasonemployerdeduction'>

                    </div>



                    <?php if($this->Main->isExist2('bonus', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'provided',1)){ ?>


                    <div class="col-md-6">
                      <label>Bonus ( <?= $this->Main->mycolumn1('bonus','name','company',$this->session->userdata('companyarray')[$companyindex]['id']) ?>)</label>
                      <input type="number" step=".01" required value="0" placeholder="" class="form-control" id='bonus<?= $employee['id']?>' name='bonus'>

                    </div>

                  <?php } ?>


                  <?php if($this->Main->isExist2('loans', 'status','active','employee',$employee['id'],'pay_style',3)){


                   $loanunfixed = $this->Main->all3('loans', 'status', 'active','employee',$employee['id'],'pay_style',3);

                   if(!empty($loanunfixed)){foreach( $loanunfixed as $all){ ?>

                    <div class="col-md-6">
                      <label>Loan ( <?= $all['giver'] ?>)</label>
                      <input type="number" step=".01" required value="" placeholder="" class="form-control" id='loan<?= $all['id']?>_<?= $employee['id']?>' name='loan<?= $all['id']?>'>

                    </div>

                  <?php } } } ?>


                  </div>
                </div>

          <input type="number" class="hidden"  name='employee'   value='<?= $employee['id']?>'>
          <input type="number" class="hidden"  name='payroll'   value='<?= $payroll?>'>
          <input type="number" class="hidden"  name='company'   value='<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>'>


                <div class="row">
                  <div class="form-group">




                    <div class="col-md-6" style="padding-top: 20px">
                    <div class="col-md-4" >
                      <label> PAYE</label>
                      <input type="checkbox" checked  required  placeholder="" class="form-control" id='paye<?= $employee['id']?>'  onchange="if($('#paye<?= $employee['id']?>').is(':checked')){$('#paye_value<?= $employee['id']?>').val(1);$('#hideshowpayecalfrom_<?= $employee['id']?>').show()}else{$('#paye_value<?= $employee['id']?>').val(0);$('#hideshowpayecalfrom_<?= $employee['id']?>').hide()}">

                      <input type="number" class="hidden"  name='paye_value'  id='paye_value<?= $employee['id']?>' value='1'>

                     </div>

                     <div class="col-md-7" id="hideshowpayecalfrom_<?= $employee['id']?>">
                                                              <label>PAYE Calculated From</label>
                                                                <select class="form-control pointer" required id='paye_value_calcfrom<?= $employee['id']?>' name='paye_value_calcfrom'>
                                                                       <?php

                                                                $typess = $this->Main->all('salartype');

                                                                  if(!empty($typess)){
                      
                                                                     foreach( $typess as $types){ ?>
                                                                     <option  <?php if($types['id'] == 3 ){echo 'selected';} ?> value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option> 

                                                                        <!--  <option value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option> -->
                                                                 <?php }}?>
                                                                   </select>
                                 </div>


                    </div>
                    
       
                  <?php 


                   $bfc = $this->Main->all3('benefits_funds','is_active', '1','is_deleted', '0' ,'company_id', $this->session->userdata('companyarray')[$companyindex]['id']);

      if(!empty($bfc)){foreach( $bfc as $bf){

                    $bfc2 = $this->Main->all3('employment_status_deduction','status',$employee['employment_status'] ,'deduction', $bf['name'] ,'company', $this->session->userdata('companyarray')[$companyindex]['id']);

           if(!empty($bfc2)){foreach( $bfc2 as $bf2){
                    ?>

                    <div class="col-md-6" style="padding-top: 20px">
                    <div class="col-md-4" >
                      <label> <?= $this->Main->mycolumn1('benefittypes','name','id',$bf['name']) ?></label>
                      <input type="checkbox" checked  required  placeholder="" class="form-control" id='deductions<?= $bf['id']?>_<?= $employee['id']?>'  onchange="if($('#deductions<?= $bf['id']?>_<?= $employee['id']?>').is(':checked')){$('#deductions_value<?= $bf['id']?>_<?= $employee['id']?>').val(1); $('#hideshowfundcalfrom<?= $bf2['deduction']?>_<?= $employee['id']?>').show()}else{$('#deductions_value<?= $bf['id']?>_<?= $employee['id']?>').val(0);$('#hideshowfundcalfrom<?= $bf2['deduction']?>_<?= $employee['id']?>').hide()}">

                      <input type="number" class="hidden"  name='deductions_value<?= $bf2['deduction']?>'  id='deductions_value<?= $bf['id']?>_<?= $employee['id']?>' value='1'>

                     </div>

                     <div class="col-md-7" id = 'hideshowfundcalfrom<?= $bf2['deduction']?>_<?= $employee['id']?>'>
                                <label><?= $this->Main->mycolumn1('benefittypes','name','id',$bf['name']) ?> Calculated From</label>
                                       <select class="form-control pointer" required id='deductions_value_calcfrom<?= $bf['id']?>_<?= $employee['id']?>' name='deductions_value_calcfrom<?= $bf2['deduction']?>'>
                                                                       <?php

                                                                $typess = $this->Main->all('salartype');

                                                                  if(!empty($typess)){
                      
                                                                     foreach( $typess as $types){ ?>
                                                                       <!--    <option  <?php if($types['id'] == 3  ){echo 'selected';} ?> value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option> -->

                                                                           <option value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option>
                                                                 <?php }}?>
                                                                   </select>
                                 </div>


                    </div>

                    <!-- <a onclick="console.log($('#deductions<?= $bf['id']?>_<?= $employee['id']?>').is(':checked'))">me</a> -->



                  <?php } } } }  ?>


              
                  </div>
                </div>
                
                

                <a   style="margin-bottom:30px" onclick="addemployeepayrecord(<?= $employee['id']?>)" class="btn btn-primary btn-lg" >ADD RECORD</a>

                <!-- /BILLING ADDRESS -->



              </form>

            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modal Default ends-->






<?php } }} ?>





<!-- EDIT MYPAYROLL EMPLOYEE -->
<!-- EDIT MYPAYROLL EMPLOYEE -->
<!-- EDIT MYPAYROLL EMPLOYEE -->
<!-- EDIT MYPAYROLL EMPLOYEE -->
<!-- EDIT MYPAYROLL EMPLOYEE -->
<!-- EDIT MYPAYROLL EMPLOYEE -->
<!-- EDIT MYPAYROLL EMPLOYEE -->

<div id='modaledit'>

        
 <?php

           $employee2 = $this->Main->all2('employees', 'status', 'active','company_id', $this->session->userdata('companyarray')[$companyindex]['id'] );



                      if(!empty($employee2)){
                      
                 foreach( $employee2 as $employee){ if($this->Main->isExist3('payrollrecords', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'employee', $employee['id'], 'payroll' , $payroll)){
    $allnames = $employee['first_name'].' '. $employee['middle_name'] .' '.$employee['last_name'];

    $payrollrec5 = $this->Main->all3('payrollrecords','company',$this->session->userdata('companyarray')[$companyindex]['id'],'employee',$employee['id'],'payroll', $payroll);
    $payrollrec5 = $payrollrec5[0];

                  ?>

<!-- Modal Description viewp1 -->
<div class="modal fade " id="editmypayroll<?= $employee['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12'>
            <p class="lead"> NAME : <?= $allnames ?> </p>
<!--             <p class="lead"> BASIC: SALARY : <?= $payrollrec5['basic'] ?></p>
 -->            <p class="lead" id="editpayeployeeerror<?= $employee['id'] ?>" style="color:red"></p>
                                     <form id='editpayemployeeform<?= $employee['id']?>''>

                
                <div class="row">
                  <div class="form-group">

           <!--   <div class="col-md-6">
                      <label>Basic Salary</label>
                      <input type="number" step="0.01" required value="<?= $payrollrec5['basic'] ?>"  placeholder="" class="form-control" id='basic<?= $employee['id']?>' name='basic'>
 
                    </div>
 -->
             <!--        <div class="col-md-6">
                      <label>Total Working Days </label>
                      <input type="number" required value="<?= $payrollrec5['daysinwork'] ?>" <?php if($this->Main->mycolumn1('average_monthdays','calculation_type','company_id',$this->session->userdata('companyarray')[$companyindex]['id']) == 'fixed'){echo 'readonly';} ?> placeholder="" class="form-control" id='wdays<?= $employee['id']?>'  name='wdays'>
 
                    </div> -->

<!-- 
                    <div class="col-md-6">
                      <label>Day Overtime Hours </label>
                      <input type="number" required  placeholder="" value="<?= $payrollrec5['overtime_day_hours'] ?>" class="form-control" id='dayovertime<?= $employee['id']?>' name='dayovertime'>

                    </div> -->

<!-- 
             <?php if($this->Main->isExist1('have_night_overtime', 'company',$this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
                    <div class="col-md-6">
                      <label>Night Overtime Hours </label>
                      <input type="number" required  placeholder="" class="form-control" value="<?= $payrollrec5['overtime_night_hours'] ?>" id='nightovertime<?= $employee['id']?>' name='nightovertime'>

                    </div>

                  <?php } ?> -->

<!-- 
                    <div class="col-md-6">
                      <label>Holiday Overtime Hours</label>
                      <input type="number" required placeholder="" value="<?= $payrollrec5['overtime_holiday_hours'] ?>" class="form-control" id='holidayovertime<?= $employee['id']?>' name='holidayovertime'>

                    </div> -->

<!-- 
                  <?php  $allowance = $this->Main->all1('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] );



                      if(!empty($allowance)){foreach( $allowance as $all){ ?>

                    <div class="col-md-6">
                      <label><?= $this->Main->mycolumn1('allowances','name','id',$all['allowance']) ?></label>
                      <input type="number" required  placeholder="" class="form-control" id='allowance<?= $all['allowance'] ?>_<?= $employee['id']?>' name='allowance<?= $all['allowance'] ?>'>

                    </div>


                   <?php }}?> -->





           <!--          <div class="col-md-6">
                      <label>Arrears</label>
                      <input type="number" step="0.01" required value="<?= $this->Main->mycolumn2('payroll_records_arrears','amount','payroll',$payroll,'employee',$employee['id']) ?>" placeholder="" class="form-control" id='arrears<?= $employee['id']?>' name='arrears'>

                    </div>


                    <div class="col-md-6">
                      <label>Employer Total Deductions</label>
                      <input type="number" step="0.01" required value="<?= $this->Main->mycolumn2('payroll_records_employer_deductions','amount','payroll',$payroll,'employee',$employee['id']) ?>"   class="form-control" id='editemployeededuction<?= $employee['id']?>' name='employerdeduction' onchange="if($('#editemployeededuction<?= $employee['id']?>').val() > 0){$('#editemployerdeductionreason<?= $employee['id']?>').show()}else{$('#editemployerdeductionreason<?= $employee['id']?>').hide()}">

                    </div>



                    <div class="col-md-6" id='editemployerdeductionreason<?= $employee['id']?>'>
                      <label>Reason for a Deduction</label>
                      <input type="text"  required   class="form-control"  name='reasonemployerdeduction' value="<?= $this->Main->mycolumn2('payroll_records_employer_deductions','reasons','payroll',$payroll,'employee',$employee['id']) ?>" >

                    </div> -->



               <!--      <?php if($this->Main->isExist2('bonus', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'provided',1)){ ?>


                    <div class="col-md-6">
                      <label>Bonus ( <?= $this->Main->mycolumn1('bonus','name','company',$this->session->userdata('companyarray')[$companyindex]['id']) ?>)</label>
                      <input type="number" step=".01" required value="<?= $this->Main->mycolumn2('payroll_records_bonus','amount','payroll',$payroll,'employee',$employee['id']) ?>" placeholder="" class="form-control" id='bonus<?= $employee['id']?>' name='bonus'>

                    </div>

                  <?php } ?>
 -->

                  <?php if($this->Main->isExist2('loans', 'status','active','employee',$employee['id'],'pay_style',3)){


                   $loanunfixed = $this->Main->all3('loans', 'status', 'active','employee',$employee['id'],'pay_style',3);

                   if(!empty($loanunfixed)){foreach( $loanunfixed as $all){ ?>

                    <div class="col-md-6">
                      <label>Loan ( <?= $all['giver'] ?>)</label>
                      <input type="number" step=".01" required value="<?= $this->Main->mycolumn3('payroll_records_loan_deductions', 'amount', 'payroll',$payroll,'employee',$employee['id'],'loan_id',$all['id'] ) ?>" placeholder="" class="form-control" id='loan<?= $all['id']?>_<?= $employee['id']?>' name='loan<?= $all['id']?>'>

                    </div>

                  <?php } } } ?>

                  </div>
                </div>

          <input type="number" class="hidden"  name='employee'   value='<?= $employee['id']?>'>
          <input type="number" class="hidden"  name='payroll'   value='<?= $payroll?>'>
          <input type="number" class="hidden"  name='company'   value='<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>'>


                <div class="row">
                  <div class="form-group">


                    <div class="col-md-6" style="padding-top: 20px">
                    <div class="col-md-4" >
                      <label> PAYE</label>
                      <?php if($this->Main->mycolumn2('payrollrecords', 'paye_cut', 'employee', $employee['id'],'payroll', $payroll) == 1){$checkit = 'checked';$v2=1;}else{$checkit = '';$v2=0;} ?>
                      <input type="checkbox"   required  <?= $checkit ?> class="form-control" id='editpaye<?= $employee['id']?>'  onchange="if($('#editpaye<?= $employee['id']?>').is(':checked')){$('#editpaye_value<?= $employee['id']?>').val(1);$('#edithideshowpayecalfrom<?= $employee['id']?>').show()}else{$('#editpaye_value<?= $employee['id']?>').val(0);$('#edithideshowpayecalfrom<?= $employee['id']?>').hide()}">

                      <input type="number" class="hidden"  name='paye_value'  id='editpaye_value<?= $employee['id']?>' value='<?= $v2 ?>'>

                     </div>

                     <div class="col-md-7 hidden" id="edithideshowpayecalfrom<?= $employee['id']?>">
                                                              <label>PAYE Calculated From</label>
                                                                <select class="form-control pointer" required id='edit_paye_value_calcfrom<?= $employee['id']?>' name='paye_value_calcfrom'>
                                                                       <?php

                                                                $typess = $this->Main->all('salartype');

                                                                  if(!empty($typess)){
                      
                                                                     foreach( $typess as $types){ ?>
                                                                       <option  <?php if($types['id'] == 3  ){echo 'selected';} ?> value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option> 

                                                                 <?php }}?>
                                                                   </select>
                                 </div>


                    </div>
                    
       
                 <?php 


                   $bfc = $this->Main->all3('benefits_funds','is_active', '1','is_deleted', '0' ,'company_id', $this->session->userdata('companyarray')[$companyindex]['id']);

      if(!empty($bfc)){foreach( $bfc as $bf){

                    $bfc2 = $this->Main->isExist3('employment_status_deduction','status',$employee['employment_status'] ,'deduction', $bf['name'] ,'company', $this->session->userdata('companyarray')[$companyindex]['id']);

           if($bfc2){

 $bfc3 = $this->Main->mycolumn3('payroll_records_benefits_fund','cut_from','employee',$employee['id'] ,'fund', $bf['name'] ,'payroll', $payroll);

 if($this->Main->isExist3('payroll_records_benefits_fund', 'fund',$bf['name'], 'employee', $employee['id'],'payroll', $payroll )){$checkit = 'checked'; $v2 = 1;}else{$checkit = ''; $v2 =0;}

                    ?>

                    <div class="col-md-6" style="padding-top: 20px">
                    <div class="col-md-4" >
                      <label> <?= $this->Main->mycolumn1('benefittypes','name','id',$bf['name']) ?></label>
                      <input type="checkbox" <?= $checkit ?> required  placeholder="" class="form-control" id='deductions<?= $bf['id']?>_<?= $employee['id']?>'  onchange="if($('#deductions<?= $bf['id']?>_<?= $employee['id']?>').is(':checked')){$('#deductions_value<?= $bf['id']?>_<?= $employee['id']?>').val(1); $('#hideshowfundcalfrom<?= $bf['name'] ?>_<?= $employee['id']?>').show()}else{$('#deductions_value<?= $bf['id']?>_<?= $employee['id']?>').val(0);$('#hideshowfundcalfrom<?= $bf['name'] ?>_<?= $employee['id']?>').hide()}">

                      <input type="number" class="hidden"  name='deductions_value<?= $bf['name']  ?>'  id='deductions_value<?= $bf['id']?>_<?= $employee['id']?>' value='<?= $v2 ?>'>

                     </div>

                     <div class="col-md-7" id = 'hideshowfundcalfrom<?= $bf['name'] ?>_<?= $employee['id']?>'>
                                <label><?= $this->Main->mycolumn1('benefittypes','name','id',$bf['name']) ?> Calculated From</label>
                                       <select class="form-control pointer" required id='deductions_value_calcfrom<?= $bf['id']?>_<?= $employee['id']?>' name='deductions_value_calcfrom<?= $bf['name'] ?>'>
                                                                       <?php

                                                                $typess = $this->Main->all('salartype');

                                                                  if(!empty($typess)){
                      
                                                                     foreach( $typess as $types){ ?>
                                                                        <option  <?php if($bfc3 == $types['id']  ){echo 'selected';} ?> value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option> 

                                                                          <!--   <option value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option>  -->
                                                                 <?php }}?>
                                                                   </select>
                                 </div>


                    </div>

                    <!-- <a onclick="console.log($('#deductions<?= $bf['id']?>_<?= $employee['id']?>').is(':checked'))">me</a> -->



                  <?php } } }  ?>


              
                  </div>
                </div>
                
                

                <a   style="margin-bottom:30px" onclick="editemployeepayrecord2(<?= $employee['id']?>)" class="btn btn-primary btn-lg" >SUBMIT</a>

                <!-- /BILLING ADDRESS -->



              </form>

            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
        



<!-- end editing modal
 -->



  <div class="modal fade" id="deletemyemployee<?= $employee['id']?>" >
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead"> Are You Sure You want to Remove <?= $allnames ?>) in the List!</p>

         <a    class="btn btn-danger btn-lg" onclick="removemyemployeefromlist(<?= $payroll ?>, <?= $employee['id']?>)" >Yes</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>




<?php } }} ?>


</div>




  <div class="modal fade" id="deletemyemployeeall" >
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead text-center"> Are You Sure You want to Remove All Employee In this Payroll!.</p>
       <p class="lead text-center">Remember that you will loose all Changes You made, We recommend to remove Specific Employee</p>

         <a    class="btn btn-danger btn-lg" onclick=' $("#loadedentry").html(" Loading...");$.get("<?= base_url() ?>actions/dli/<?= $payroll ?>",{},function(r){ $("#loadedentry").html("");location.reload();  });' >Yes Remove All</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>


<!-- Modal Description viewp1 -->
<div class="modal " id="editpossibles"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
<div class= 'col-md-12'>
<form method="get" action="#" class="input-group " style="margin-bottom:20px; width:80%">
<input type="number" step="0.01" class="form-control" id="myvalue" value="">
<input type="text" class="form-control hidden" id="myvalue0" >
<input type="text" class="form-control hidden" id="myvalue1" >
<input type="text" class="form-control hidden" id="myvalue2" >
<input type="text" class="form-control hidden" id="myvalue3" >
</form></div>

<div class="container-fluid filterc modal-item">


</div>
</div>
</div>
</div>
</div>







<!-- Modal Description viewp1 -->
<div class="modal " id="editpossibles2"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
<div class= 'col-md-12'>
<form method="get" action="#" class="input-group col-md-12" style="margin-bottom:20px;">
<input style="margin-bottom:20px;"  type="number"  class="form-control col-md-3" id="my2value" value="" placeholder="Add Deduction Amount">
<input style="margin-bottom:20px;"type="text" step="0.01" class="form-control col-md-3" id="my2value00" value="" placeholder="Enter Reasons for Deductions">



</form></div>

<input type="text" class="form-control hidden" id="my2value0" >
<input type="text" class="form-control hidden" id="my2value1" >
<input type="text" class="form-control hidden" id="my2value2" >
<input type="text" class="form-control hidden" id="my2value3" >
<div class="container-fluid filterc modal-item">


<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

