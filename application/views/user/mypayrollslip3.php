<!DOCTYPE html>

<head>
<meta charset="utf-8" />


<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

<!-- WEB FONTS -->



</head>
<body style='width:100%;'>

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

table{width:80%}
@media only screen and (min-device-width: 600px){

table{width:100%}

}



</style>


<div id="wrapper" style='magin:20px'>
<?php

    $co = $this->session->userdata('companyarray')[$companyindex]['id'];
    $co_name = $this->session->userdata('companyarray')[$companyindex]['name'];

 ?>


<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 " style='width:80%'>





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
                      

              if($this->Main->isExist3('payrollrecords','payroll',$payroll,'employee',$user,'paye_cut',1)){


                $deductname[$deduct] = 'PAYE';
                $deductvalue[$deduct] =  $this->Main->payecalculations($payroll, $co, $user, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE'];
                $sumdeduct +=$this->Main->payecalculations($payroll, $co, $user, $gross, (float)str_replace(array(',',' '), '', $mybasic),$p->basic)['PAYE'];
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



</div>

<div class="col-md-12">

  <table style="background: transparent;table-layout: fixed;" cellpadding="0" cellspacing="0" border="0">
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
  <td>NET SALARY</td>
  <td><?= number_format(($sumearn - $sumdeduct),2) ?></td>
  


</tr>


    </tbody>
  

  </table>

</div>

<div class="col-md-12">
<div class="col-md-12" style="margin-top: 10px">
  <p style="margin:0 0 5px; text-decoration: underline ;color:#39AADB;font-size:12px"><strong> <?=$this->Main->convertNumberToWord($sumearn - $sumdeduct) ; ?> TZS. Only</strong></p>
  </div>
</div>



</div></div>


</body>
</html>
