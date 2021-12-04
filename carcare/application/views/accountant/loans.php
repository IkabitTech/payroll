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

        <?php } ?>            <li class="#">Loans</li>
          </ul>
        </div>
      </header>            
                


                            
<div class="container" id"loadit">




   <div id="table1" style="">
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12">
<h2> Loans <strong>Record</strong></h2>

<!-- <a  class=" label label-primary " data-toggle="modal" href="#addBf" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Add  New</a> -->

<!-- Table start -->


<table class="table table-striped table-dark"    
 >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Employee</th>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      <th scope="col">Giver</th>
      <th scope="col">Status</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="table-striped" >
  <?php $i = 1;
  
  if(empty($bfsll)){echo '<p class="lead">No Loan record  for this company ( '.$this->session->userdata("companyarray")[$companyindex]["name"].' )</p>';}else{

  foreach( $bfsll AS  $bfll){ 

    $names =  $this->Main->mycolumn1('employees','first_name', 'id',$bfll->employee).' '.$this->Main->mycolumn1('employees','middle_name', 'id',$bfll->employee).' '.$this->Main->mycolumn1('employees','last_name', 'id',$bfll->employee); 
    $type =  $this->Main->mycolumn1('companyloans','name', 'id',$bfll->loantype); 

    $style =  $this->Main->mycolumn1('loanpayingstyle','style', 'id',$bfll->pay_style); 


    //     $this->db->select('SUM(amount) AS amount');
    // $this->db->where('payroll',$bfll->id);
    // $this->db->group_by('payroll');
    //  $total3 = $this->db->get('loan_installment');
     // $total3 = json_encode($total3->result()[0]->amount);


     $total3 =  $this->Main->InstallementEmployeeLoanId($bfll->id,$this->session->userdata("companyarray")[$companyindex]["id"] ,$bfll->employee);
    
    
    
    ?> 
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $names ?></td>
      <td><?= $type ?></td>
      <td><?= $bfll->amount ?></td>
      <td><?= $bfll->giver ?></td>
      <td><?= $bfll->status ?></td>
      <td>
        <a   style="margin-bottom:30px" class="btn btn-primary btn-sm" data-toggle="modal" href="#myloan<?= $bfll->id ?>"  >More</a>

      
      </td>
    
    </tr>




<div class="modal fade " id="myloan<?= $bfll->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
  <p class="lead" id="dayserror1" style="color:red"></p>


<div class="container-fluid filterc modal-item">
  <p class="lead"><strong><?= $names ?></strong></p>
  <p class="lead"><?= $type ?> - <?= $bfll->amount ?></p>


   

        <p><strong>Loan ID:</strong> #<?= $bfll->id ?> </p>
        <p><strong>Deduction Start:</strong> <?= $bfll->startdate ?></p>
        <p><strong>Amount to Return:</strong> <?= $bfll->amount_to_return ?></p>
        <p><strong>Total Amount Installed:</strong> <?= $this->Main->InstallementEmployeeLoanId($bfll->id,$this->session->userdata("companyarray")[$companyindex]["id"] ,$bfll->employee) ?></p>
        <p><strong>Last Installement Date:</strong></p>
        <p><strong>Last Installement Amount:</strong></p>
        <p><strong>Payment Style</strong>: <?= $style ?></p>
        <p><strong>Percent/Amount:</strong></p>


<a class="btn btn-danger " onclick="$('#myloan<?= $bfll->id ?>').modal('hide');$('#changeloanstatus<?= $bfll->id ?>').modal('show')" >Change Loan Status</a>

<?php if($this->session->userdata('level') == 3 || $this->session->userdata('level') == 1){ ?>

<a class="btn btn-default " onclick="$('#myloan<?= $bfll->id ?>').modal('hide');$('#editloan<?= $bfll->id ?>').modal('show'); 
                <?php if($bfll->paymentmethod !=  'bank'){?>  $('#payedinbank<?= $bfll->id ?>').hide();  <?php  }else{ ?>  $('#payedinbank<?= $bfll->id ?>').show();    <?php  } ?>  
                loanstylechangevalue2(<?= $bfll->id?>,<?= $bfll->period_months?>, <?= $bfll->percent_basic ?>, <?= $bfll->amount_per_month_to_return ?>)
 
">Edit Loan</a>

<?php }?>

<a class="btn btn-success " onclick="$('#myloan<?= $bfll->id ?>').modal('hide');$('#loaninstallments<?= $bfll->id ?>').modal('show')">Installement Records</a>



<!-- <a class="btn btn-warning " onclick="">Admin Actions(Loan)</a> -->



 <!--<a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->




<!-- Modal Default ends-->




  <?php $i++; }} ?>


  
  </tbody>
</table>




  <?php $i = 1;
  
  if(empty($bfsll)){echo '<p class="lead">No Loan record  for this company ( '.$this->session->userdata("companyarray")[$companyindex]["name"].' )</p>';}else{

  foreach( $bfsll AS  $bfll){ 

    $names =  $this->Main->mycolumn1('employees','first_name', 'id',$bfll->employee).' ' . $this->Main->mycolumn1('employees','middle_name', 'id',$bfll->employee).' ' .$this->Main->mycolumn1('employees','last_name', 'id',$bfll->employee); 
    $type =  $this->Main->mycolumn1('companyloans','name', 'id',$bfll->loantype); 

    $style =  $this->Main->mycolumn1('loanpayingstyle','style', 'id',$bfll->pay_style);

    


      ?>






<div class="modal fade " id="changeloanstatus<?= $bfll->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
 <div class="modal-dialog modal-lg">
 <div class="modal-content">
 <div class="modal-body">
 <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
  <i class="fa fa-close"></i>
  </button>
  <p class="lead" id="dayserror1" style="color:red"></p>


  <div class="container-fluid filterc modal-item">
  <p class="lead"><strong><?= $names ?></strong></p>
  <p class="lead"><?= $type ?> - <?= $bfll->amount ?></p>


   

        <p><strong>STATUS:</strong> <?= $bfll->status ?> </p>
        
<?php if($this->session->userdata('level') == 2){ ?>

<?php if($this->Main->isExist2('loans','id', $bfll->id,'status','active')){ ?>

 <a class="btn btn-danger " onclick="loanchangestatus('inactive',<?= $bfll->id ?>)" >MAKE INACTIVE</a>

<?php }elseif($this->Main->isExist2('loans','id', $bfll->id,'status','inactive')){ ?>

 <a class="btn btn-default " onclick="loanchangestatus('active',<?= $bfll->id ?>)" >MAKE ACTIVE</a>

<?php }else{ ?>
 <a class="btn btn-danger " onclick="loanchangestatus('inactive',<?= $bfll->id ?>)" >MAKE INACTIVE</a>
 <a class="btn btn-default " onclick="loanchangestatus('active',<?= $bfll->id ?>)">MAKE ACTIVE</a>

<?php }} ?>

<?php if($this->session->userdata('level') == 3){ ?>

<?php if($this->Main->isExist2('loans','id', $bfll->id,'status','active')){ ?>



<?php }if($this->Main->isExist2('loans','id', $bfll->id,'status','suspended')){ ?>

 <a class="btn btn-warning " onclick="loanchangestatus('removed',<?= $bfll->id ?>)">REMOVE LOAN</a>
  <a class="btn btn-default " onclick="loanchangestatus('finished',<?= $bfll->id ?>)">FINISHED</a>

<?php }elseif($this->Main->isExist2('loans','id', $bfll->id,'status','removed')){ ?>

  <a class="btn btn-success " onclick="loanchangestatus('suspended',<?= $bfll->id ?>)">SUSPEND LOAN</a>
  <a class="btn btn-default " onclick="loanchangestatus('finished',<?= $bfll->id ?>)">FINISHED</a>

<?php }elseif($this->Main->isExist2('loans','id', $bfll->id,'status','finished')){ ?>



  <a class="btn btn-success " onclick="loanchangestatus('suspended',<?= $bfll->id ?>)">SUSPEND LOAN</a>
 <a class="btn btn-warning " onclick="loanchangestatus('removed',<?= $bfll->id ?>)">REMOVE LOAN</a>

<?php }else{ ?>

  <a class="btn btn-success " onclick="loanchangestatus('suspended',<?= $bfll->id ?>)">SUSPEND LOAN</a>
 <a class="btn btn-warning " onclick="loanchangestatus('removed',<?= $bfll->id ?>)">REMOVE LOAN</a>
  <a class="btn btn-default " onclick="loanchangestatus('finished',<?= $bfll->id ?>)">FINISHED</a>
<?php } ?>







 <?php } ?>


<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
 </div>
 </div>
 </div>
   </div>
</div>

<!-- Modal Default ends-->

<!-- Modal Default ends-->




<div class="modal fade " id="loaninstallments<?= $bfll->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
  <p class="lead" id="dayserror1" style="color:red"></p>


<div class="container-fluid filterc modal-item">
  <p class="lead"><strong><?= $names ?></strong></p>
  <p class="lead"><?= $type ?> - <?= $bfll->amount ?></p>
<p><strong> TOTAL AMOUNT INSTALLED:</strong>  </p>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Payroll</th>
      <th scope="col">Amount</th>
      <th scope="col">Method</th>
      <th scope="col">bank</th>
      <th scope="col">Acc. No</th>
      <th scope="col">Acc. Name</th>
      <th scope="col">Date</th>
    </tr>
   </thead>
    <tbody class="table-striped" >
     <?php $i = 1;

    $bfsnn = $this->Main->all3(' payroll_records_loan_deductions', 'verified',1,'employee',$bfll->employee,'loan_id',$bfll->id);

 

  
      if(empty($bfsnn)){echo '<p class="lead">No record</p>';}else{

      foreach( $bfsnn AS  $bfnn){ 


    $payroll10 =  $this->Main->mycolumn1('payroll_rec', 'name','id',$bfnn['payroll']);
    $bname = $bfnn['bank_name'];
    $accno = $bfnn['acc_no'];
    $accname = $bfnn['acc_name'];
    $method = $bfnn['paymentmethod'];
      if($method== 'cash'){

      $bname = '-';
      $accno = '-';
      $accname = '-';
    }

     ?> 
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= date('M Y', strtotime($payroll10)) ?></td>
      <td><?= $bfnn['amount'] ?></td>
      <td><?= $method ?></td>
      <td><?= $bname?></td>
      <td><?= $accno ?></td>
      <td><?= $accname ?></td>
      <td><?= $bfnn['created'] ?></td>
     
      </tr>


      <?php $i++; } } ?>
   
  </tbody>
</table>

  

<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->

<!-- Modal Default ends-->

<?php if($this->session->userdata('level') == 3 || $this->session->userdata('level') == 1){ ?>





<div class="modal fade " id="editloan<?= $bfll->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="overflow-y: scroll">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
  <p class="lead" id="loanloaderror<?= $bfll->id ?>" style="color:red"></p>


<div class="container-fluid filterc modal-item">
  <p class="lead"><strong><?= $names ?></strong></p>
  <p class="lead"><?= $type ?> - <?= $bfll->amount ?></p>


   

          <form method="post">

                <!-- BILLING ADDRESS -->
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-4">
                      <label>SELECT LOAN TYPE</label><span style="color: red">*</span>
                      <select value='' class="form-control pointer" required id='loantype<?= $bfll->id?>' >
                                                <option value=""> --SELECT-- </option>

                      <?php

                      $loantype2 = $this->Main->all1('companyloans', 'deleted', 0);

                      if(!empty($loantype2)){
                      
                      foreach( $loantype2 as $loantype){?>

            <option <?php if($bfll->loantype ==  $loantype['id']){echo 'selected';} ?>  value="<?= $loantype['id'] ?>"> <?= $loantype['name'] ?></option>

                      <?php }}?>
                      </select>
                   <p id="errorloantype<?= $bfll->id?>" style="color:red"></p>

                    </div>

                    
                 
                    
                    <div class="col-md-4">
                      <label>AMOUNT GIVEN (TZS)</label><span style="color: red">*</span>
                      <input type="number" value="<?= $bfll->amount ?>"" step="0.01" required  placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='given<?= $bfll->id?>'>
                        <p id="erroramount<?= $bfll->id?>" style="color:red"></p>

                    </div>
                  
                    <div class="col-md-4">
                      <label>AMOUNT TO RETURN (TZS)</label>
                      <input type="number"  step="0.01" required value="<?= $bfll->amount_to_return ?>" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='return<?= $bfll->id?>' onchange="$('#stylev2_<?= $bfll->id?>').val($('#return<?= $bfll->id?>').val()/$('#stylev1_<?= $bfll->id?>').val())">
                    <p id="erroramount2_<?= $bfll->id?>" style="color:red"></p>

                    </div>
                  </div>
                </div>


              <!-- BILLING ADDRESS -->
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>PAYMENT STYLE</label><span style="color: red">*</span>
                      <select class="form-control pointer" required id='loanpayingstyle<?= $bfll->id?>' onchange="loanstylechangevalue2(<?= $bfll->id?>,<?= $bfll->period_months?>, <?= $bfll->percent_basic ?>, <?= $bfll->amount_per_month_to_return ?>)" >

                         <option value="" > -- SELECT -- </option>

                      <?php

                      $loantype2 = $this->Main->all1('loanpayingstyle', 'deleted', 0);

                      if(!empty($loantype2)){
                      
                      foreach( $loantype2 as $loantype){?>

            <option <?php if($bfll->pay_style ==  $loantype['id']){echo 'selected';} ?>   value="<?= $loantype['id'] ?>" title="<?= $loantype['description'] ?>"> <?= $loantype['style'] ?></option>

                      <?php }}?>
                      </select>
                     <p id="errorpaymentstyle<?= $bfll->id?>" style="color:red"></p>

                    </div>

                    <div class="col-md-6">
                      <div id="loanstylevalue_<?= $bfll->id?>">

                    </div>
                    </div>

             <div class="col-md-6">
                      <div id="loanstylevalue2_<?= $bfll->id?>">


                    </div>
                    </div>

                  </div>
                </div>


                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-6">
                      <label>INSTALLMENT STARTING DATE</label><span style="color: red">*</span>
                      <input type="text" data-role="date" required value="<?= $bfll->startdate ?>" placeholder="eX 20/04/2020" class="form-control dpicker" id='startingdate<?= $bfll->id?>'>
                      <p id="errorstartdate<?= $bfll->id?>" style="color:red"></p>

                    </div>

                     <div class="col-md-6">
                      <label>INSTALLMENT  END DATE</label>
                      <input type="text" data-role="date" required value="<?= $bfll->enddate ?>" placeholder="eX 20/04/2020" class="form-control dpicker" id='enddate<?= $bfll->id?>'>
                    </div>
                  
                    
                  </div>
                </div>
                
                <div class="row">

                  <div class="form-group">
                    <div class="col-md-6">
                      <label>INSTALLEMNT GOES TO (LOAN GIVER )</label><span style="color: red">*</span>
                      <input type="text"  value="<?= $bfll->giver ?>" required placeholder="eX Vipaji Tech Ltd" class="form-control" id= 'giver<?= $bfll->id?>'>
                      <p id="errorgiver<?= $bfll->id?>" style="color:red"></p>

                    </div>



                    <div class="col-md-6">
                      <label>INSTALLEMENT METHOD</label><span style="color: red">*</span>
                      <select type="text" onchange="payedinbank2(<?= $bfll->id?>)"   required  class="form-control" id= 'bank<?= $bfll->id?>'>

                        <option value=""> --SELECT-- </option>
                        <option <?php if($bfll->paymentmethod ==  'cash'){echo 'selected';} ?>  value="cash">CASH</option>
                        <option  <?php if($bfll->paymentmethod ==  'bank'){echo 'selected';} ?>  value="bank">BANK</option>
                        </select>
                        <p id="errorbank<?= $bfll->id?>" style="color:red"></p>

                    </div>

                    
                </div>
                
                
                </div>



                  <div class="row">
                  <div class="form-group">
                    
                    <div id="payedinbank<?= $bfll->id?>">


                    <div class="col-md-4">
                      <label>BANK NAME</label><span style="color: red">*</span>
                      <input type="text"  value="<?= $bfll->bank_name ?>" required placeholder="eX CRDB" class="form-control" id= 'bankname<?= $bfll->id?>'>
                      <p id="errorbankname<?= $bfll->id?>" style="color:red"></p>

                    </div>

                    <div class="col-md-4">
                      <label>ACCOUNT NAME</label><span style="color: red">*</span>
                      <input type="text"  value="<?= $bfll->acc_name ?>" required placeholder="eX VIPAJI TECH LTD" class="form-control" id= 'accname<?= $bfll->id?>'>
                      <p id="erroraccname<?= $bfll->id?>" style="color:red"></p>

                    </div>

                     <div class="col-md-4">
                      <label>ACCOUNT No.</label><span style="color: red">*</span>
                      <input type="text"  value="<?= $bfll->acc_no ?>" required placeholder="eX J1677773...." class="form-control" id= 'accno<?= $bfll->id?>'>
                      <input type="number"  value="<?= $bfll->id ?>"   class="form-control hidden" id= 'id<?= $bfll->id?>' >
                      <p id="erroraccno<?= $bfll->id?>" style="color:red"></p>
                      

                    </div>
                  </div>
                  
                    
                  </div>
                </div>




              
                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-12">
                      <label>COMMENT OR EXTRA DESCRIPTIONS</label>
                      <textarea type="text" value="" placeholder="" class="form-control " id='loandes<?= $bfll->id?>'><?= $bfll->description ?></textarea>
                    </div>

                   
               
                    
                  </div>
                </div>


                <div class="row">
                  <div class="form-group col-md-6">
                    
                    <input  readonly value="SUBMIT INFORMATIONS" onclick="EditLoan(<?= $bfll->id?>)" class="form-control btn btn-primary">
                </div>
              </div>



                <!-- <a   style="margin-bottom:30px" class="btn btn-primary btn-lg" onclick='Newloan()' >ADD FUND</a> -->

                <!-- /BILLING ADDRESS -->



              </form>



<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->




  <?php $i++; }}} ?>


 

<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->

 

</div>


</div><!-- container end end -->



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







<script>





function loanchangestatus(status, id){






$.ajax({
url: "<?= base_url() ?>actions3/loanchagestatus",
method: "POST",
data: {id:id,status:status}
}).done(function(rd){

console.log(rd.des);



if(rd.msg === true){


console.log('done');


   location.reload();
   $("#changeloanstatusmodal"+id).load(location.href + " #changeloanstatusmodal"+id);

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);



}else{
$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);


}

}).fail(function(){


$('#alerting2').modal('Some Error Occured Contact Support team and Try again Later');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);



});


}


  


</script>









