<header id="page-title" class="notprint"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>PAYROLL REPORT</h1>

          <ul class="breadcrumb">
<?php

    $co = $this->session->userdata('companyarray')[$companyindex]['id'];
    $co_name = $this->session->userdata('companyarray')[$companyindex]['name'];
    

 ?>
                      <li><a href="#">Employee</a></li>

                  <li><a href="#">Payroll</a></li>
            <li class="#">pay</li>
          </ul>
        </div>
      </header>            
                



<div class="container notprint">

  <span></span><a class="btn btn-default " href="#" onclick="cmd()"> PRINT SALARY SLIP</a>
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


               if(!empty($payrollrecords)){ foreach( $payrollrecords as $p){ 

                  
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'names'){ $allnames = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'job_title'){ $title = $p->value ;}
                    if($this->Main->mycolumn1('payroll_columns', 'name_excel','id',$p->value_id) == 'employee_status'){ $status = $p->value ;}
                 

                    
            

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

  <p class="lead text-left col-md-3" style="padding-top: 10px"><span style=""><img src="<?= base_url() ?>assets/images/logo.png" onerror="this.onerror=null;this.src='<?= base_url() ?>assets/images/logo.png';" style="height:50px"></span>




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
