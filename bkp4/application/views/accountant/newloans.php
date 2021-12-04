<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>Loans</h1>

          <ul class="breadcrumb">
            <li><a href="#">Accountant</a></li>
            <li><a href="#">Loans</a></li>
            <li class="#">Add Loan</li>
          </ul>
        </div>
      </header>            
                







                            
<div class="container" >


    <div class= 'col-md-12'>
            <p class="lead"> ADD NEW LOAN ( <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?> )</p>
            <p class="lead" id="addloanerror" style="color:red"></p>
            <p class="lead" style="color:red"><i id="loadloan2"  class=""></i></p>

           
            <form method="post">

                <!-- BILLING ADDRESS -->
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>SELECT LOAN TYPE</label><span style="color: red">*</span>
                      <select class="form-control pointer" required id='loantype' >
                                                <option value=""> --SELECT-- </option>

                      <?php

                      $loantype2 = $this->Main->all1('companyloans', 'deleted', 0);

                      if(!empty($loantype2)){
                      
                      foreach( $loantype2 as $loantype){?>

            <option value="<?= $loantype['id'] ?>"> <?= $loantype['name'] ?></option>

                      <?php }}?>
                      </select>
                   <p id="errorloantype" style="color:red"></p>

                    </div>

                    <div class="col-md-6">
                      <label>EMPLOYEE NAMES  </label><span style="color: red">*</span>
                      <input type="text" readonly="true" onclick="openemployee()" required value="" placeholder="Click to Select Employee" class="form-control" id='employeenames'>
                      <p id="errorname" style="color:red"></p>
                      <input type="text" readonly="true"  required value="" placeholder=""  class="form-control hidden" id='employeeID'>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-6">
                      <label>AMOUNT GIVEN (TZS)</label><span style="color: red">*</span>
                      <input type="number" step="0.01" required value="" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='given'>
                        <p id="erroramount" style="color:red"></p>

                    </div>
                  
                    <div class="col-md-6">
                      <label>AMOUNT TO RETURN (TZS)</label>
                      <input type="number" step="0.01" required value="" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='return' onchange="$('#stylev2').val($('#return').val()/$('#stylev1').val())">
                    <p id="erroramount2" style="color:red"></p>

                    </div>
                  </div>
                </div>


              <!-- BILLING ADDRESS -->
                <div class="row">   
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>PAYMENT STYLE</label><span style="color: red">*</span>
                      <select class="form-control pointer" required id='loanpayingstyle' onchange="loanstylechangevalue()" >

                         <option value="" > -- SELECT -- </option>

                      <?php

                      $loantype2 = $this->Main->all1('loanpayingstyle', 'deleted', 0);

                      if(!empty($loantype2)){
                      
                      foreach( $loantype2 as $loantype){?>

            <option value="<?= $loantype['id'] ?>" title="<?= $loantype['description'] ?>"> <?= $loantype['style'] ?></option>

                      <?php }}?>
                      </select>
                     <p id="errorpaymentstyle" style="color:red"></p>

                    </div>

                    <div class="col-md-6">
                      <div id="loanstylevalue">

                    </div>
                    </div>

             <div class="col-md-6">
                      <div id="loanstylevalue2">


                    </div>
                    </div>

                  </div>
                </div>


                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-6">
                      <label>INSTALLMENT STARTING DATE</label><span style="color: red">*</span>
                      <input type="text" data-role="date" required value="" placeholder="eX 20/04/2020" class="form-control " id='startingdate'>
                      <p id="errorstartdate" style="color:red"></p>

                    </div>

                     <div class="col-md-6">
                      <label>INSTALLMENT  END DATE</label>
                      <input type="text" data-role="date" required value="" placeholder="eX 20/04/2020" class="form-control " id='enddate'>
                    </div>
                  
                    
                  </div>
                </div>
                
                <div class="row">

                  <div class="form-group">
                    <div class="col-md-6">
                      <label>INSTALLEMNT GOES TO (LOAN GIVER )</label><span style="color: red">*</span>
                      <input type="text"  value="" required placeholder="eX Vipaji Tech Ltd" class="form-control" id= 'giver'>
                      <p id="errorgiver" style="color:red"></p>

                    </div>



                    <div class="col-md-6">
                      <label>INSTALLEMENT METHOD</label><span style="color: red">*</span>
                      <select type="text" onchange="payedinbank()"  value="" required  class="form-control" id= 'bank'>

                        <option value=""> --SELECT-- </option>
                        <option value="cash">CASH</option>
                        <option value="bank">BANK</option>
                        </select>
                        <p id="errorbank" style="color:red"></p>

                    </div>

                    
                </div>
                
                
                </div>



                  <div class="row">
                  <div class="form-group">
                    
                    <div id="payedinbank">


                    <div class="col-md-4">
                      <label>BANK NAME</label><span style="color: red">*</span>
                      <input type="text"  value="" required placeholder="eX CRDB" class="form-control" id= 'bankname'>
                      <p id="errorbankname" style="color:red"></p>

                    </div>

                    <div class="col-md-4">
                      <label>ACCOUNT NAME</label><span style="color: red">*</span>
                      <input type="text"  value="" required placeholder="eX VIPAJI TECH LTD" class="form-control" id= 'accname'>
                      <p id="erroraccname" style="color:red"></p>

                    </div>

                     <div class="col-md-4">
                      <label>ACCOUNT No.</label><span style="color: red">*</span>
                      <input type="text"  value="" required placeholder="eX J1677773...." class="form-control" id= 'accno'>
                      <p id="erroraccno" style="color:red"></p>

                    </div>
                  </div>
                  
                    
                  </div>
                </div>




              
                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-12">
                      <label>COMMENT OR EXTRA DESCRIPTIONS</label>
                      <textarea type="text" value="" placeholder="" class="form-control " id='loandes'> </textarea>
                    </div>

                   
                  
                    
                  </div>
                </div>


                <div class="row">
                  <div class="form-group col-md-6">
                    
                    <input  readonly value="submit" onclick="Newloan()" class="form-control btn btn-primary">
                </div>
              </div>



                <!-- <a   style="margin-bottom:30px" class="btn btn-primary btn-lg" onclick='Newloan()' >ADD FUND</a> -->

                <!-- /BILLING ADDRESS -->



              </form>

            
            </div>



</div><!-- container end end -->


<!-- MODALS -->


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
                      
                 foreach( $employee2 as $employee){
    $allnames = $employee['first_name'].' '. $employee['middle_name'] .' '.$employee['last_name'];

                  ?>


        <a class="btn col-md-6 empl active" onclick="putemployee(<?= $employee['id'] ?>, '<?= $allnames ?>')"><strong><?= $allnames ?> </strong></a>


<?php } } ?>
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->





<script>





 function Newloan(){


                var loantype = $("#loantype").val();
                var employee = $("#employeeID").val();
                var paymentstyle = $("#loanpayingstyle").val();
                var startdate = $("#startingdate").val();
                var enddate = $("#enddate").val();
                var amountgiven = $("#given").val();
                var amountreturn = $("#return").val();
                var stylevalue1 = $("#stylev1").val();
                var stylevalue2 = $("#stylev2").val();
                var paymentmethod = $("#bank").val();
                var accname = $("#accname").val();
                var bankname = $("#bankname").val();
                var accno = $("#accno").val();
                var description = $("#loandes").val();
                var giver = $("#giver").val();
                var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>  ; 

     changeInnerHTML(['errorloantype', 'errorname', 'erroramount', 'erroramount2', 'errorgiver','errorbank','errorpaymentstyle','errorstartdate','erroraccno','erroraccname','errorstylev1','errorstylev2','errorbankname'],
        "");


      if(!loantype || !employee || !paymentmethod || !amountgiven || !giver || !paymentstyle || !startdate ||
       (paymentmethod == 'bank' && !accno)  || (paymentmethod == 'bank' && !accname) || (paymentmethod == 'bank' && !bankname) || (paymentstyle == 1 && !stylevalue1) ||
        (paymentstyle == 2 && !stylevalue1) || (paymentstyle == 4 && !stylevalue2) || (paymentstyle == 2 && !stylevalue1) || (paymentstyle == 5 && !stylevalue1) || (paymentstyle == 4 && !stylevalue2) ||
        (paymentstyle == 1 && !amountreturn) ||  (amountreturn && amountreturn < 0 ) || (paymentstyle == 2 && (stylevalue1 > 100 || stylevalue1 < 0) ) || (paymentstyle == 5 && (stylevalue1 > 100 || stylevalue1 < 0) ) ||  (paymentstyle == 1 && stylevalue1 < 0) ||  (paymentstyle == 4 &&  stylevalue2 < 0 )  ){

            !loantype ? changeInnerHTML('errorloantype', "required") : "";
            !employee ? changeInnerHTML('errorname', "required") : "";
            !amountgiven ? changeInnerHTML('erroramount', "required") : "";
            !giver ? changeInnerHTML('errorgiver', "required") : "";
            !paymentmethod ? changeInnerHTML('errorbank', "required") : "";
            !paymentstyle ? changeInnerHTML('errorpaymentstyle', "required") : "";
            !startdate ? changeInnerHTML('errorstartdate', "required") : "";
            (paymentmethod == 'bank' && !accno) ? changeInnerHTML('erroraccno', "required") : "";
            (paymentmethod == 'bank' && !accname) ? changeInnerHTML('erroraccname', "required") : "";
            (paymentmethod == 'bank' && !bankname) ? changeInnerHTML('errorbankname', "required") : "";
            (paymentstyle == 1 && !stylevalue1) ? changeInnerHTML('errorstylev1', "required") : "";
            (paymentstyle == 2 && !stylevalue1) ? changeInnerHTML('errorstylev1', "required") : "";
            (paymentstyle == 5 && !stylevalue1) ? changeInnerHTML('errorstylev1', "required") : "";
            (paymentstyle == 4 && !stylevalue2) ? changeInnerHTML('errorstylev2', "required") : "";
           
            (paymentstyle == 1 && !amountreturn) ? changeInnerHTML('erroramount2', "required") : "";
            (amountreturn && amountreturn < 0 ) ? changeInnerHTML('erroramount2', "Put valid Amount to Return") : "";

            (paymentstyle == 2 && (stylevalue1 > 100 || stylevalue1 < 0) )? changeInnerHTML('errorstylev1', "Percent start from 0 to 100") : "";
            (paymentstyle == 5 && (stylevalue1 > 100 || stylevalue1 < 0) )? changeInnerHTML('errorstylev1', "Percent start from 0 to 100") : "";
            (paymentstyle == 1 && ( stylevalue1 < 0) )? changeInnerHTML('errorstylev1', "Put valid number of Months") : "";
            (paymentstyle == 4 && ( stylevalue2 < 0) )? changeInnerHTML('errorstylev2', "Put valid Amount") : "";


            return;
        }
$('#addloanerror').html("processing...");


$.ajax({
url: "<?= base_url() ?>actions/addnewloan",
method: "POST",
data: {loantype:loantype, employee:employee, amountreturn:amountreturn,amountgiven:amountgiven,paymentstyle:paymentstyle,stylevalue1:stylevalue1,stylevalue2:stylevalue2,startdate:startdate,enddate:enddate,paymentmethod:paymentmethod,accname:accname,accno:accno,description:description,giver:giver,bankname:bankname,co:co}
}).done(function(rd){

        $('#addloanerror').html("");


console.log(rd);
//      var newp = JSON.parse(rd); 



//console.log(newp);

if(rd.msg === true){
console.log('done');
$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
setTimeout(function() {window.location.href = "<?= base_url() ?>loans/<?= $companyindex ?>"}, 2000);

}else{
console.log('fail');

console.log(rd);

}

}).fail(function(){


 $('#addloanerror').html("Some Error Occured Contact Support team and Try again Later");

 

});


 }



</script>




