<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->


        <div class="container">
          <h1>Add Client Details</h1>

          <ul class="breadcrumb">
            <li><a href="#">Admin</a></li>
            <li><a href="#">Company</a></li>
            <li class="#">Add Company</li>
          </ul>
        </div>
      </header>            
                
                          
<div class="container" >


    <div class= 'col-md-12'>
            <p class="lead"> ADD NEW COMPANY / CLIENT</p>
            <p class="lead" id="adderror" style="color:red"></p>
            <p class="lead" style="color:red"><i id="load2"   class=""></i></p>

           
            <form method="post">

                <!-- BILLING ADDRESS -->
                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-12">
                      <label>COMPANY NAME  </label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Write Company Name" class="form-control cinput" id='name'>
                      <p id="errorname" style="color:red"></p>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-6">
                      <label>DETAILS </label>
                      <textarea type="text"  placeholder="" class="form-control cinput" id='details'></textarea>
                      
                    </div>


                    <div class="col-md-6">
                      <label>ADDRESS </label>
                      <textarea type="text" value=""  placeholder="" class="form-control cinput" id='address'></textarea>
                      
                    </div>
                  </div>
                </div>

                


                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-6">
                      <label>PHONE (LANDLINE)</label>
                      <input type="text"  required value="" class="form-control cinput" id='phone1'>

                    </div>

                     <div class="col-md-6">
                      <label>MOBILE NUMBER</label><span style="color: red">*</span>
                      <input type="text"  required value="" class="form-control cinput" id='phone2'>
                      <p id="errorphone2" style="color:red"></p>

                    </div>
                  
                    
                  </div>
                </div>



                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-6">
                      <label>FAX</label>
                      <input type="text"  required value="" class="form-control cinput" id='fax'>

                    </div>

                     <div class="col-md-6">
                      <label>EMAIL</label><span style="color: red">*</span>
                      <input type="text"  required value="" class="form-control cinput" id='email'>
                      <p id="erroremail" style="color:red"></p>

                    </div>
                  
                    
                  </div>
                </div>



                <div class="row">
                  <div class="form-group">
                    
                    <div class="col-md-6">
                      <label>WEBSITE</label>
                      <input type="text"  required value="" class="form-control cinput" id='web'>

                    </div>

                     <div class="col-md-6">
                      <label>STATUS</label><span style="color: red">*</span>
                      <select type="text"  required value="" class="form-control cinput" id='status'>
                        
                        <option value="">-- SELECT STATUS --</option>
                        <option value="active" >Active</option>
                        <option value="inactive" >Inactive</option>
                      </select>
                      <p id="errorstatus" style="color:red"></p>

                    </div>
                  
                    
                  </div>
                </div>
                
                
               


                <div class="row">
                  <div class="form-group col-md-12">
                    
                    <input  readonly value="submit" onclick="AddNewCompany()" class="form-control btn btn-primary">
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










