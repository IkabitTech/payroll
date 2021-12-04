<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
				<!--
					Enable only if bright background image used
					<span class="overlay"></span>
				-->

				<div class="container">
					<h1>Settings</h1>

					<ul class="breadcrumb">
						<li><a href="#">Accountant</a></li>
						<li><a href="#">Payroll</a></li>
						<li class="#">Settings</li>
					</ul>
				</div>
			</header>            
                 
                 <div class="container" >



                 <div class= "col-md-6" >
                 <div  id="container1">
                 <h2>Allowance <strong>Settings</strong></h2>

                 <p class="lead">Check and <b>Uncheck</b> Allowance type provided by a company</p>

<!-- Table start -->

                 <div class="row mega-price-table" >

             <div class="col-md-6 col-sm-6  pricing-desc">

                           <ul class="list-unstyled">
								<li>Transport Allowance</li>
								<li class="alternate">Meal / Lunch Allowance</li>
								<li>Telephone Allowance</li>
                                <li class="alternate">House Allowance</li>
                                <li>Other Allowance</li>

							</ul>

                        </div>



                <div class="col-md-6 col-sm-6 block" >
    

                         <ul class="pricing-table list-unstyled">
                                   


                    <?php if($this->Main->isExist2('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] ,'allowance', 1) ){ ?>
                     <li><i class="fa fa-check"></i><span> Have</span> <a onclick="Allowance(0, 1)"><strong>remove</strong></a></li><?php }else{ ?>
                      <li><i class="fa fa-times"></i><span> Dont have</span> <a onclick="Allowance(1, 1)"><strong>add</strong></a></li><?php } ?>


                        <?php if($this->Main->isExist2('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] ,'allowance', 2) ){ ?>
                     <li class="alternate"><i class="fa fa-check"></i><span> Have</span> <a onclick="Allowance(0, 2)"><strong>remove</strong></a></li><?php }else{ ?>
                      <li class="alternate"><i class="fa fa-times"></i><span> Dont have</span> <a onclick="Allowance(1, 2)"><strong>add</strong></a></li><?php } ?>


                        <?php if($this->Main->isExist2('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] ,'allowance', 3) ){ ?>
                     <li><i class="fa fa-check"></i><span> Have</span> <a onclick="Allowance(0, 3)"><strong>remove</strong></a></li><?php }else{ ?>
                      <li><i class="fa fa-times"></i><span> Dont have</span> <a onclick="Allowance(1, 3)"><strong>add</strong></a></li><?php } ?>


                        <?php if($this->Main->isExist2('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] ,'allowance', 4) ){ ?>
                     <li class="alternate"><i class="fa fa-check"></i><span> Have</span> <a onclick="Allowance(0, 4)"><strong>remove</strong></a></li><?php }else{ ?>
                      <li class="alternate"><i class="fa fa-times"></i><span> Dont have</span> <a onclick="Allowance(1, 4)"><strong>add</strong></a></li><?php } ?>


                        <?php if($this->Main->isExist2('have_allowance','company', $this->session->userdata('companyarray')[$companyindex]['id'] ,'allowance', 5) ){ ?>
                     <li><i class="fa fa-check"></i><span> Have</span> <a onclick="Allowance(0, 5)"><strong>remove</strong></a></li><?php }else{ ?>
                      <li><i class="fa fa-times"></i><span> Dont have</span> <a onclick="Allowance(1, 5)"><strong>add</strong></a></li><?php } ?>




<!-- 


                    <li><a><i class="fa fa-check"></i></a></li>
                                    <li class="alternate"><a><i class="fa fa-check"></i></a></li>
                                    <li><a><i class="fa fa-check"></i></a></li>
                                    <li class="alternate"><a><i class="fa fa-times"></i></a></li>
                                    <li><a><i class="fa fa-check"></i></a></li> -->
									

								</ul>

  
                 </div>

</div>
    </div>
 <!-- Table ended -->







                  </div>  <!--//col 6 end -->



                  <!-- MD 6 START FOR OVERTIME -->

                  
                 <div class= "col-md-6">
                                   <div  id="container2">

                 <h2>Overtime <strong>Settings</strong></h2>

                 <p class="lead">Check and <b>Uncheck</b> Overtime type provided by a company</p>

<!-- Table start -->

                 <div class="row mega-price-table">

             <div class="col-md-6 col-sm-6  pricing-desc">

                           <ul class="list-unstyled">
								<li>Holiday Overtime</li>
								<li class="alternate">Normal Overtime Day</li>
								<li>Normal Overtime Night</li>
                              

							</ul>

                        </div>



                <div class="col-md-6 col-sm-6 block">
    

                         <ul class="pricing-table list-unstyled">
                                    <li><i class="fa fa-check"></i><span> Always provided</span></li>
                                    <li class="alternate"><i class="fa fa-check"></i><span> Always provided</span></li>

                                     <?php if($this->Main->isExist1('have_night_overtime','company', $this->session->userdata('companyarray')[$companyindex]['id'] ) ){ ?>

                   <li><i class="fa fa-check"></i><span> Have</span> <a onclick="NightOvertime(0)"><strong>remove</strong></a></li>
                   

                   <?php }else{ ?>


                   <li><i class="fa fa-times"></i><span> Dont have</span> <a onclick="NightOvertime(1)"><strong>add</strong></a></li>

                   <?php } ?>

                                  
									

								</ul>

  
                 </div>


    </div>
 <!-- Table ended -->




</div>


                  </div> 

                  <!-- OVERTIME TABLE END -->

                  
                
                </div><!-- container end end -->



                            
                <div class="container">



<div class= "col-md-6">
<div id="container5">

<h2>Working Days <strong>Settings</strong></h2>



<!-- Table start -->

<div class="row mega-price-table">

<div class="col-md-7 col-sm-7   pricing-desc">

          <ul class="list-unstyled">
                                               <li>Avg working Days/Month</li>
                                               <li class="alternate">Fixed Or Attendance</li>
               

                                       </ul>

       </div>



<div class="col-md-2 col-sm-2 block">


        <ul class="pricing-table list-unstyled">
                   <li><span><?= $this->Main->mycolumn1('average_monthdays', 'no_days','company_id',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?></span></li>
                   <li class="alternate"><span> <strong><?= $this->Main->mycolumn1('average_monthdays', 'calculation_type','company_id',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?></strong></span></li>
                  
                                                       

           </ul>


</div>


<div class="col-md-3 col-sm-3 block">


        <ul class="pricing-table list-unstyled">
        <li><span><a href="#daysval" data-toggle="modal"><strong>Edit Days</strong></a></span></li>
          <li class="alternate"><span> <a href="#dayscal" data-toggle="modal"><strong>Edit</strong></a></span></li>
                     </ul>


</div>


</div>
<!-- Table ended -->



</div>
 </div>  <!--//col 6 end -->



 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-6">
                                     <div  id="container3">

<h2> Bonus <strong>Settings</strong></h2>



<!-- Table start -->

<div class="row mega-price-table">

<div class="col-md-6 col-sm-6  pricing-desc">

          <ul class="list-unstyled">
                                               <li>Bonus </li>
               <?php if($this->Main->mycolumn1('bonus','provided','company', $this->session->userdata('companyarray')[$companyindex]['id'] ) == 1){ ?>

                                               <li class="alternate">Descriptio/Type/Name</li>
                                               
                <?php } ?>

          </ul>

       </div>



<div class="col-md-6 col-sm-6  block">


        <ul class="pricing-table list-unstyled">

               <?php if($this->Main->mycolumn1('bonus','provided','company', $this->session->userdata('companyarray')[$companyindex]['id'] ) == 1){ ?>

                   <li><i class="fa fa-check"></i><span> provided</span> <a onclick="Bonus()"><strong>remove</strong></a></li>
                   <li class="alternate"><a data-toggle="modal" href="#bonusname"><i class="fa fa-pencil"></i></a><span> <?= $this->Main->mycolumn1('bonus', 'name','company',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?> </span></li>

                   <?php }else{ ?>


                   <li><i class="fa fa-times"></i><span> not provided</span> <a onclick="Bonus()"><strong>add</strong></a></li>

                   <?php } ?>
              
          </ul>


</div>


</div>
<!-- Table ended -->
</div>

 </div> 

 <!-- OVERTIME TABLE END -->

 

</div><!-- container end end -->







                            
<div class="container" >

  <div id="table1">
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12">
<h2> Contributions <strong>Settings</strong></h2>

<a  class=" label label-primary " data-toggle="modal" href="#addBf" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Add  New</a>

<!-- Table start -->


<table class="table table-striped table-dark"    
 >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">calculation type</th>
      <th scope="col">Amount</th>
      <th scope="col">From</th>
      <th scope="col">Percent of Basic/Gross</th>
      <th scope="col">Employee Percent</th>
      <th scope="col">Employer Percent</th>
      <th scope="col">Minimal Amount</th>
      <th scope="col">Topup Payer</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="table-striped" >
  <?php $i = 1;
  
  if(empty($bfs)){echo '<p class="lead">No record Set for benefit Funds</p>';}else{

  foreach( $bfs AS  $bf){ 
    
 $amount1 = '--';  
$percent1 = '--';
$percente = '--';
$percentr = '--';

   if($bf['calculation_type'] == 'fixed'){


$percent1 = '--';
$percente = '--';
$percentr = '--';
$amount1 = $bf['amount'];

   }else{

    $amount1 = '--';
  $percent1 = $bf['percent'] ;
   $percente = $bf['employee_contribution'];
   $percentr = $bf['employer_contribution'];


   }

    
    ?> 
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $this->Main->mycolumn1('benefittypes','name', 'id',$bf['name']) ?></td>
      <td><?= $bf['calculation_type'] ?></td>
      <td><?= $amount1 ?></td>
      <td><?= $this->Main->mycolumn1('salartype','salary', 'id',$bf['salarytype'])?></td>
      <td><?= $percent1?></td>
      <td><?= $percente ?></td>
      <td><?= $percentr ?></td>
      <td><?= $bf['min_amount'] ?></td>
      <td><?= $bf['topup_payer'] ?></td>
      <th><a href="#editBf<?= $bf['id'] ?>" onclick="$('#calcfrom<?= $bf['id'] ?>').val(<?=$bf['salarytype']?>)" data-toggle="modal">Edit</a>  <a href="#deleteBf<?= $bf['id'] ?>" data-toggle="modal">Delete</a></th>
    </tr>






<!-- stariting edit  -->




<!-- Modal Description viewp1 -->
<div class="modal fade " id="editBf<?= $bf['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12'>
            <p class="lead"> EDIT BENEDICIAL FUND <?= $this->Main->mycolumn1('benefittypes','name', 'id',$bf['name']) ?> ( <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?> ) </p>
            <p class="lead" id="editbferror<?= $bf['id'] ?>" style="color:red"></p>

           
                                    <form>

                                                <!-- BILLING ADDRESS -->



         <div class="row">
                  <div class="form-group">
                  
                
                    <div class="col-md-12">
                      <label>Calculaation Type</label>
                      <select type="text" required  onchange="percentfixed2(<?= $bf['id'] ?>)" class="form-control" id='caltype<?= $bf['id'] ?>'>

                       <?php if($bf['calculation_type'] == 'fixed'){ ?> 

                   

                           <option value="fixed">Fixed</option>
                        <option value="percentage">Percentage</option>

                      <?php }else{ ?>

                    <option value="percentage">Percentage</option>
                      <option value="fixed">Fixed</option>
                          <?php } ?>  

                      </select>

                     

                    </div>
                  </div>
                </div> 




                <div class="row fixedclass<?= $bf['id'] ?>" >
                  <div class="form-group">
                  
                
                    <div class="col-md-12">
                     <label>Fixed Amount</label>
                      <input type="number" step="0.01"  required value="<?= $bf['amount'] ?>" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='amount<?= $bf['id'] ?>'>
                    </div>
                  </div>
                </div>
               






                                              
                                                <div class="row percentclass<?= $bf['id'] ?> ">
                                                      <div class="form-group">
                                                            <div class="col-md-2">
                                                                  <label>Total Percent </label>
                                                                  <input type="number" readonly step="0.01" required value="<?= $bf['percent'] ?>" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='p<?= $bf['id'] ?>'>
                                                            </div>
                                                            <div class="col-md-3">
                                                                  <label>Employee Percent</label>
                                                                  <input type="number" step="0.01" onchange="$('#p<?= $bf['id'] ?>').val(eval($('#ep<?= $bf['id'] ?>').val()) + eval($('#rp<?= $bf['id'] ?>').val()))"  required value="<?= $bf['employee_contribution'] ?>" onchange="$('#p').val(eval($('#ep<?= $bf['id'] ?>').val()) + eval($('#rp<?= $bf['id'] ?>').val()))" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='ep<?= $bf['id'] ?>'>
                                                            </div>
                                                      
                                                            <div class="col-md-3">
                                                                  <label>Employer Percent</label>
                                                                  <input type="number" step="0.01" required value="<?= $bf['employer_contribution'] ?>" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='rp<?= $bf['id'] ?>'>
                                                            </div>


                                                            <div class="col-md-4">
                                                              <label>Calculated from</label>
                                                                <select class="form-control pointer" required id='calcfrom<?= $bf['id'] ?>' >
                                                                       <?php

                                                                $typess = $this->Main->all('salartype');

                                                                  if(!empty($typess)){
                      
                                                                     foreach( $typess as $types){ ?>
                                                                          <option value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option>
                                                                 <?php }}?>
                                                                   </select>
                                                            </div>



                       
                                                      </div>
                                                </div>


                   
                                                
                                                <div class="row">

                                                    <div class="form-group">
                                                            <div class="col-md-6">
                                                                  <label>Minimal Amount</label>
                                                                  <input type="number" step="0.01" value="<?= $bf['min_amount'] ?>" required placeholder="Ex 18000.00, 19000.9 17000" class="form-control" id= 'min<?= $bf['id'] ?>'>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                  <label>Topup payer</label>
                                                                  <select type="text" required value="<?= $bf['topup_payer'] ?>" class="form-control" id='tp<?= $bf['id'] ?>'>

                      <option value="employee">Employee</option>
                      <option calue="employer">Employer</option>

                      </select>

                      <input type="number" step="0.01" value="<?= $bf['id'] ?>" required placeholder="Ex 18000.00, 19000.9 17000" class="form-control hidden" id= 'id<?= $bf['id'] ?>'>

                                                            </div>
                                                      </div>
                                                </div>

                <a   style="margin-bottom:30px" class="btn btn-primary btn-lg" onclick="editBf<?= $bf['id'] ?>()" >EDIT FUND</a>

                                                <!-- /BILLING ADDRESS -->



                                          </form>

            
            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modal Default ends-->




<!-- end editing modal
 -->



  <div class="modal fade" id="deleteBf<?= $bf['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead"> Are You Sure You want to Remove (<?= $this->Main->mycolumn1('benefittypes','name', 'id',$bf['name']) ?>)!</p>

         <a    class="btn btn-danger btn-lg" onclick="deleteBf<?= $bf['id'] ?>()" >Yes</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>






  <?php $i++; } }?>
   
  </tbody>
</table>

<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->

 

</div></div><!-- container end end -->




<!-- start me -->

                            
<div class="container" >

  <div id="table2">
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive">
<h2> Employee Deduction Based on status <strong>Settings</strong></h2>
  <p class="lead" id="statusdeductionerror" style="color:red"></p>


<!-- Table start -->

<table class="table  table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"></th>

       <?php 
  
  if(!empty($bfs)){ foreach( $bfs AS  $bf){  ?> 

      <th scope="col"><?= $this->Main->mycolumn1('benefittypes','name', 'id',$bf['name']) ?></th>


  <?php  } }?>
   
      
    </tr>
  </thead>
  <tbody class="" >
  <?php $k = 1;
  
  if(empty($bfs2)){echo '<p class="lead"></p>';}else{

  foreach( $bfs2 AS  $bf2){  ?> 
    <tr>
      <th scope="row"><?= $k ?></th>
      <td ><?= $bf2['name'] ?></td>

       <?php if(!empty($bfs)){ foreach( $bfs AS  $bf){ if($this->Main->isExist3('employment_status_deduction', 'company', $this->session->userdata('companyarray')[$companyindex]['id'], 'status', $bf2['id'], 'deduction',$bf['name'] )){  ?> 


       <td ><a onclick="statusdeduction(0,<?= $bf2['id'] ?>, <?= $bf['name'] ?>, <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>)"><strong>remove</strong></a></td>

        
       <?php }else{ ?>

       <td><a onclick="statusdeduction(1,<?= $bf2['id'] ?>, <?= $bf['name'] ?> ,<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>)"><strong>add</strong></a></td>


   <?php    } } }?>
     
      
    </tr>

  <?php $k++; }  }?>
   
  </tbody>
</table>


<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->

 

</div></div><!-- container end end -->





<!-- end me -->






<!-- MODALS -->



<!-- Modal Description viewp1 -->
<div id="addBfbody">
<div class="modal fade " id="addBf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
						</button>
						<div class= 'col-md-12'>
            <p class="lead"> ADD BENEDICIAL FUND ( <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?> )</p>
            <p class="lead" id="addbferror" style="color:red"></p>
            <p class="lead" style="color:red"><i id="load2"  class=""></i></p>

           
						<form>

								<!-- BILLING ADDRESS -->
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>SELECT FUND TYPE</label>
											<select class="form-control pointer" required id='name' >
                      <?php

                      $bfs2 = $this->Main->all2('benefittypes', 'deleted', 0, 'active', 1);

                      if(!empty($bfs2)){
                      
                      foreach( $bfs2 as $bf){if(!$this->Main->isExist3('benefits_funds','name',$bf['id'] ,'is_deleted', '0' ,'company_id', $this->session->userdata('companyarray')[$companyindex]['id'])){ ?>
            <option value="<?= $bf['id'] ?>"> <?= $bf['name'] ?></option>
                      <?php }}}?>
											</select>
										</div>
									</div>
								</div>



                <div class="row">
                  <div class="form-group">
                  
                
                    <div class="col-md-12">
                      <label>Calculaation Type</label>
                      <select type="text" required  onchange="percentfixed()" class="form-control" id='caltype'>

                      <option value="percentage">Percentage</option>
                      <option value="fixed">Fixed</option>

                      </select>

                     

                    </div>
                  </div>
                </div> 





                <div class="row fixedclass" >
                  <div class="form-group">
                  
                
                    <div class="col-md-12">
                     <label>Fixed Amount</label>
                      <input type="number" step="0.01"  required value="" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='amount'>
                    </div>
                  </div>
                </div>
               











								<div class="row percentclass">
									<div class="form-group">
										<div class="col-md-2">
											<label>Total Percent </label>
											<input type="number" step="0.01" readonly required value="" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='p'>
										</div>
										<div class="col-md-3">
											<label>Employee Percent</label>
											<input type="number" step="0.01" onchange="$('#p').val(eval($('#ep').val()) + eval($('#rp').val()))" required value="" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='ep'>
										</div>
									
										<div class="col-md-3">
											<label>Employer Percent</label>
											<input type="number" step="0.01" onchange="$('#p').val(eval($('#ep').val()) + eval($('#rp').val()))"  required value="" placeholder="Ex 20.55 or 20 or 23.5" class="form-control" id='rp'>
										</div>

                    <div class="col-md-4">
                      <label>Calculated from</label>
                      <select class="form-control pointer" required id='calcfrom' >
                      <?php

                      $typess = $this->Main->all('salartype');

                      if(!empty($typess)){
                      
                      foreach( $typess as $types){ ?>
            <option value="<?= $types['id'] ?>"> <?= $types['salary'] ?></option>
                      <?php }}?>
                      </select>
									</div>
								</div>
								
								<div class="row">

                  <div class="form-group">
										<div class="col-md-6">
											<label>Minimal Amount</label>
											<input type="number" step="0.01" value="" required placeholder="Ex 18000.00, 19000.9 17000" class="form-control" id= 'min'>
										</div>
								
										<div class="col-md-6">
											<label>Topup payer</label>
											<select type="text" required value="" class="form-control" id='tp'>

                      <option value="employee">Employee</option>
                      <option calue="employer">Employer</option>

                      </select>

                      <input type="number" step="0.01" value="<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>" required placeholder="Ex 18000.00, 19000.9 17000" class="form-control hidden" id= 'co'>

										</div>
									</div>
								</div>

                <a   style="margin-bottom:30px" class="btn btn-primary btn-lg" onclick='addBf4()' >ADD FUND</a>

								<!-- /BILLING ADDRESS -->



							</form>

            
            </div>

                        
                    </div>
                </div>
            </div>
        </div>
      </div>
    
    <!-- Modal Default ends-->




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
<div class="modal fade " id="dayscal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
  <p class="lead" id="dayserror1" style="color:red"></p>


<div class="container-fluid filterc modal-item">




<a class="btn btn-default " onclick="DaysCal(0)" >Fixed</a>
<a class="btn btn-default " onclick="DaysCal(1)">Attendance Based</a>


<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->








<!-- Modal Description viewp1 -->
<div class="modal fade " id="daysval" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
  <p class="lead" id="dayserror2" style="color:red"></p>

<div class= 'col-md-12'>
<form method="get" action="#" class="input-group " style="margin-bottom:20px; width:80%">

<input type="number" step=".0001"> class="form-control"  id="numdays" max="31" min="0"  value="<?= $this->Main->mycolumn1('average_monthdays', 'no_days','company_id',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?>" placeholder="Filter Companies">
</form></div>
<div class="col-md-12"><a class="btn btn-default " onclick="DaysVal()" >Submit Value</a></div>

<div class="container-fluid filterc modal-item">

<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->











<!-- Modal Description viewp1 -->
<div class="modal fade " id="bonusname" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
  <p class="lead" id="bonuserror" style="color:red"></p>

<div class= 'col-md-12'>
<form method="get" action="#" class="input-group " style="margin-bottom:20px; width:80%">

<input type="text" class="form-control"  id="bname"   value="<?= $this->Main->mycolumn1('bonus', 'name','company',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?>" placeholder="Add bonus Name">
</form></div>
<div class="col-md-12"><a class="btn btn-default " onclick="BonusName()" >Submit Value</a></div>

<div class="container-fluid filterc modal-item">

<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->










