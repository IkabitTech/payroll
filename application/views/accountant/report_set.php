<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>Settings</h1>

          <ul class="breadcrumb">


        <?php if($this->session->userdata('level') == 3){ ?>
                      <li><a href="#">Accountant</a></li>

        <?php }elseif($this->session->userdata('level') == 2){ ?>
                      <li><a href="#">Supervisor</a></li>

        <?php } ?>
            <li><a href="#">Payroll</a></li>
            <li class="#">Payroll List</li>
          </ul>
        </div>
      </header>            
                 
                 
                            
   
                            
<div class="container" >

  <div id="table1">
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12">
<h2> Confirmed Payroll  <strong>Records</strong></h2>


  

<!-- Table start -->


<table class="table table-striped table-dark"    
 >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Created</th>
      <th scope="col">Name</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
  
      <th></th>
    </tr>
  </thead>
  <tbody class="table-striped" >
  <?php $i = 1;
  
  if(empty($pys)){echo '<p class="lead">No record </p>';}else{

  foreach( $pys AS  $py){ 
    
    
    
    ?> 
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= date('M d,Y', strtotime($py['created'])) ?></td>
      <td><?=   date('M Y', strtotime($py['name']))   ?></td>

      
      <td><?= $py['fromdate'] ?></td>
      <td><?= $py['todate'] ?></td>
   
      <th>

       
     

        <a href="<?= base_url().'records/more/'.$py['id'].'/'.$companyindex ?>" >View</a>
        <a style='margin-left:20px' class='badge badge-primary' href="<?= base_url().'records/salaryslips/'.$py['id'].'/'.$companyindex ?>" >Salary Slips</a>


      </th>
    </tr>






<!-- stariting edit  -->


        <?php

        if($this->session->userdata('level') != 2){ ?>


<!-- Modal Description viewp1 -->
<div class="modal fade " id="editPy<?= $py['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12'>
            <p class="lead"> EDIT PAYROLL ( <?= $py['name'] ?> ) </p>
            <p class="lead" id="editpyerror<?= $py['id'] ?>" style="color:red"></p>
                                     <form>

                
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>Name Payroll  </label>
                      <input type="text"required value="<?= date('M Y', strtotime($py['name']))  ?>" readonly placeholder="Ex April 2019" class="form-control mpicker" id='payrollnameedit<?= $py['id'] ?>'>
                      <input type="text"required value="<?= $py['id'] ?>"  class="form-control hidden" id='payrollIDedit<?= $py['id'] ?>'>
                       <p id="errornameedit<?= $py['id'] ?>" style="color:red"></p>

                    </div>
                    <div class="col-md-12">
                      <label>From Date</label>
                      <input type="text" readonly required value="<?= $py['fromdate'] ?>" placeholder="" class="form-control dpicker" id='payrollstartedit<?= $py['id'] ?>'>
                      <p id="errorstartedit<?= $py['id'] ?>" style="color:red"></p>

                    </div>
                  
                    <div class="col-md-12">
                      <label>To Date</label>
                      <input type="text" readonly  required value="<?= $py['todate'] ?>" placeholder="" class="form-control dpicker" id='payrollendedit<?= $py['id'] ?>'>
                      <p id="errorendedit<?= $py['id'] ?>" style="color:red"></p>

                    </div>


                   <div class="col-md-12">
                      <label>Payment Period</label>
                      <select type="text"   required value="<?= $py['paypermonth'] ?>" placeholder="" class="form-control " id='payotedit<?= $py['id'] ?>'>
                        
                        <option value="1">Pay Once in a Month</option>
                        <option value="2">Pay Twice in a Month</option>

                      </select>
                      

                    </div>


                  </div>
                </div>
                
                

                <a   style="margin-bottom:30px" class="btn btn-primary btn-lg" onclick='editpayroll(<?= $py["id"] ?>)' >EDIT PAYROLL</a>

                <!-- /BILLING ADDRESS -->



              </form>

            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modal Default ends-->


<style type="text/css">
   .ui-datepicker-calendar {
        display: none;
    }
</style>

<!-- end editing modal
 -->



  <div class="modal fade" id="deletePy<?= $py['id'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead"> Are You Sure You want to Remove (<?= $py['name'] ?>)!</p>

         <a    class="btn btn-danger btn-lg" onclick="deletepy(<?= $py['id'] ?>)" >Yes</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>








<?php } ?>


  <?php $i++; } }?>
   
  </tbody>
</table>

<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->

 

</div></div><!-- container end end -->



<!-- end me -->







        <?php

        if($this->session->userdata('level') != 2){ ?>


<!-- MODALS -->



<!-- Modal Description viewp1 -->
<div id="addpybody">
<di
v class="modal fade " id="addPy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
            </button>
            <div class= 'col-md-12'>
            <p class="lead"> ADD PAYROLL( <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?> )</p>
            <p class="lead" id="addpayrollerror" style="color:red"></p>

           
            <form>

                
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>Name Payroll  </label>
                      <input type="text"  required value="" readonly placeholder="Ex April 2019" class="form-control mpicker" id='payrollname' >
                      <p id="errorname" style="color:red"></p>

                    </div>
                    <div class="col-md-12">
                      <label>From Date</label>
                      <input type="text" readonly required value="" placeholder="" class="form-control dpicker" id='payrollstart'>
                        <p id="errorstart" style="color:red"></p>

                    </div>
                  
                    <div class="col-md-12">
                      <label>To Date</label>
                      <input type="text" readonly  required value="" placeholder="" class="form-control dpicker" id='payrollend'>
                                              <p id="errorend" style="color:red"></p>

                    </div>

                    <div class="col-md-12">
                      <label>Payment Period</label>
                      <select type="text"   required value="" placeholder="" class="form-control " id='payot'>
                        
                        <option value="1">Pay Once in a Month</option>
                        <option value="2">Pay Twice in a Month</option>

                      </select>
                      

                    </div>
                  </div>
                </div>
                
                

                <a   style="margin-bottom:30px" class="btn btn-primary btn-lg" onclick='addpayroll()' >ADD PAYROLL</a>

                <!-- /BILLING ADDRESS -->



              </form>

            
            </div>

                        
                    </div>
                </div>
            </div>
        </div>
      </div>
    
    <!-- Modal Default ends-->




<?php } ?>



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













