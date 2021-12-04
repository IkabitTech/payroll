<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        

<?php $employeeID = isset($_GET['employee'])?$_GET['employee']:0;  ?>
        <div class="container">
          <h1>Employee ( <?= $this->Main->mycolumn1('employees','first_name', 'id',$employeeID).' ' . $this->Main->mycolumn1('employees','middle_name', 'id',$employeeID).' ' .$this->Main->mycolumn1('employees','last_name', 'id',$employeeID) ?> )</h1>

          <ul class="breadcrumb">
            <li><a href="#">Admin</a></li>
            <li><a href="#">Employee</a></li>
            <li class="#">Edit Employee</li>
          </ul>
        </div>
      </header>            
                
                          
<div class="container" >




    <div class= 'col-md-12'>
            <p class="lead"> EDIT EMPLOYEE</p>
            <p class="lead" id="addemployeerror" style="color:red"></p>
            <p class="lead" style="color:red"><i id=""  class=""></i></p>

           
            <form method="post">

                <!-- BILLING ADDRESS -->
                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-4">
                      <label>First Name  </label><span style="color: red">*</span>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','first_name','id',$employeeID) ?>" placeholder="Write First Name" class="form-control" id='fname'>
                      <p id="errorfname" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Middle Name  </label>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','middle_name','id',$employeeID) ?>" placeholder="Write Middle Name" class="form-control" id='mname'>
                      <p id="errormname" style="color:red"></p>
                      
                    </div>

                    <div class="col-md-4">
                      <label>Last Name</label><span style="color: red">*</span>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','last_name','id',$employeeID) ?>" placeholder="Write Last Name" class="form-control" id='lname'>
                      <p id="errorlname" style="color:red"></p>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-4">
                      <label>Gender</label><span style="color: red">*</span>
                      <select type="text"   required value="" placeholder="" class="form-control" id='gender'>

                        <option value="" >SELECT GENDER</option>

                        <?php $gen = $this->Main->all('genders');
                        foreach ($gen as $key => $value) {
                         
                        ?>
                        <option <?php if($this->Main->mycolumn1('employees','gender','id',$employeeID) ==$value['id'] ){echo 'selected';} ?> value="<?= $value['id'] ?>" ><?= $value['name'] ?></option>
                        <?php  }  ?>
                      </select>
                      <p id="errorgender" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Job Title</label><span style="color: red">*</span>
                      <input type="text" readonly href="#myjobtitles" data-toggle="modal" value="<?= $this->Main->mycolumn1('jobtitles','name','id',$this->Main->mycolumn1('employees','job_title','id',$employeeID)) ?>" placeholder="" class="form-control" id='jobtitle'>
                      <input type="text" value="<?= $this->Main->mycolumn1('employees','job_title','id',$employeeID) ?>" class="hidden" id='jobtitle2'>
                      <p id="errorjobtitle" style="color:red"></p>
                      
                    </div>


                     <div class="col-md-4">
                      <label>Employment Status</label><span style="color: red">*</span>
                      <select type="text"   required value="" placeholder="" class="form-control" id='e_status'>

                        <option value="" >SELECT STATUS</option>

                        <?php $gen = $this->Main->all1('employmentstatus','active',1);
                        foreach ($gen as $key => $value) {
                         
                        ?>
                        <option <?php if($this->Main->mycolumn1('employees','employment_status','id',$employeeID) == $value['id'] ){echo 'selected';} ?>   value="<?= $value['id'] ?>" ><?= $value['name'] ?> - <?= $value['description'] ?></option>
                        <?php  }  ?>
                      </select>
                      <p id="errore_status" style="color:red"></p>
                      
                    </div>


                  </div>
                </div>



                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-4">
                      <label>Home Phone  </label>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','home_phone','id',$employeeID) ?>" placeholder="Write Home Phone" class="form-control" id='hphone'>
                      <p id="errorhphone" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Mobile Phone  </label><span style="color: red">*</span>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','mobile_phone','id',$employeeID) ?>" placeholder="Write Mobile Phone No." class="form-control" id='mphone'>
                      <p id="errormphone" style="color:red"></p>
                      
                    </div>

                    <div class="col-md-4">
                      <label>Work Phone</label>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','work_phone','id',$employeeID) ?>" placeholder="Write Work Phone" class="form-control" id='wphone'>
                      <p id="errorwphone" style="color:red"></p>
                      
                    </div>
                  </div>
                </div>





                    <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-4">
                      <label>Work Email</label>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','work_email','id',$employeeID) ?>" placeholder="Write Work Email" class="form-control" id='wemail'>
                      <p id="errorhphone" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Private Email</label><span style="color: red">*</span>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','private_email','id',$employeeID) ?>" placeholder="Write Private Email" class="form-control" id='pemail'>
                      <p id="errorpemail" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Employee / Staff ID</label>
                      <input type="text"   required value="<?= $this->Main->mycolumn1('employees','employee_id','id',$employeeID) ?>" placeholder="Write Employee Unique ID" class="form-control" id='eid'>
                  
                      
                    </div>

   <input type="text"   required value="<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>"  class="hidden" id='co'>
   <input type="text"   required value="<?= $employeeID ?>"  class="hidden" id='id'>

                   
                  </div>
                </div>



                    <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-4">
                      <label>Branch</label><span style="color: red">*</span>
                      <select type="text" onchange="changebranch($('#branch').val())"   required value="" placeholder="" class="form-control" id='branch'>

                        <option value="" > -- Select Branches -- </option>
                        <option  <?php if($this->Main->mycolumn1('employees','branch','id',$employeeID) == 0 ){echo 'selected';} ?>   value="0" >Main Branch</option>

                        <?php $gen = $this->Main->all1('client_branch','active',1);
                        if(!empty($gen)){
                        foreach ($gen as $key => $value) {
                         
                        ?>
                        <option  <?php if($this->Main->mycolumn1('employees','branch','id',$employeeID) == $value['id'] ){echo 'selected';} ?>   value="<?= $value['id'] ?>" > <?= $value['name'] ?></option>
                        <?php  } } ?>
                      </select>
                      <p id="error_branch" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Department</label><span style="color: red">*</span>
                      <select type="text"   required value="" placeholder="" class="form-control" id='department'>

                        <option value="" >Select Department</option>

                        <?php $gen = $this->Main->all2('companystructures','active',1,'client_id', $this->session->userdata('companyarray')[$companyindex]['id']  );

                        if(!empty($gen)){
                        foreach ($gen as $key => $value) {
                        
                        ?>
                        <option    <?php if($this->Main->mycolumn1('employees','department','id',$employeeID) == $value['id'] ){echo 'selected';} ?>       class="branches branch_de<?= $value['branch'] ?>" value="<?= $value['id'] ?>" ><?= $value['title'] ?></option>
                        <?php  } } ?>
                      </select>
                      <p id="error_department" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-4">
                      <label>Status</label><span style="color: red">*</span>
                      <select type="text"   required value="" placeholder="" class="form-control" id='status'>


                      
                        <option    <?php if($this->Main->mycolumn1('employees','status','id',$employeeID) == 'active' ){echo 'selected';} ?>     >active</option>
                        <option    <?php if($this->Main->mycolumn1('employees','status','id',$employeeID) == 'terminated' ){echo 'selected';} ?>     >terminated</option>
                        <option    <?php if($this->Main->mycolumn1('employees','status','id',$employeeID) == 'retired' ){echo 'selected';} ?>     >retired</option>
                        <option    <?php if($this->Main->mycolumn1('employees','status','id',$employeeID) == 'resigned' ){echo 'selected';} ?>     >resigned</option>
                        <option    <?php if($this->Main->mycolumn1('employees','status','id',$employeeID) == 'abscond' ){echo 'selected';} ?>     >abscond</option>
                        
                      </select>
                      <p id="error_status" style="color:red"></p>
                      
                    </div>

                   
                  </div>
                </div>





                    <div class="row">
                  <div class="form-group">
                    <p class="lead">SALARY</p>
    <?php $mygross = 0; ?>
                    <div class="col-md-4"><span style="color: red">*</span>
                      <label>Actual Basic</label>
                      <input type="number" step="0.001"   required value="<?= $this->Main->mycolumn2('employeesalary','amount','employee',$employeeID,'company_id',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?>" placeholder="Basic Salary per Month" class="form-control" id='basic'>
                      <p id="errorbasic" style="color:red"></p>

                    
                      
                    </div>


                        <?php $gen = $this->Main->all('allowances' );
                        foreach ($gen as $key => $value) {
                   
                        ?>
                     <div class="col-md-4">
                      <label><?=$value['name'] ?></label>
                      <input type="number" step="0.001" value="<?= $this->Main->mycolumn3('employeeallowances','amount','allowance',$value['id'],'employee',$employeeID,'company',$this->session->userdata('companyarray')[$companyindex]['id'] ) ?>"   required value="0" placeholder=" <?=$value['name'] ?> per Month" class="form-control" id='allowance_<?=$value['id'] ?>'>
                      <p id="" style="color:red"></p>


                   <?php $mygross =+  $this->Main->mycolumn3('employeeallowances','amount','allowance',$value['id'],'employee',$employeeID,'company',$this->session->userdata('companyarray')[$companyindex]['id'] ); ?>

                    </div>


                    <?php } ?>

        <div class="col-md-12">
                      <label>Gross</label>
                      <input type="number" step="0.001" readonly  required value="<?= $mygross +  $this->Main->mycolumn2('employeesalary','amount','employee',$employeeID,'company_id',$this->session->userdata('companyarray')[$companyindex]['id'] )  ?>" placeholder="Gross Salary" class="form-control" id='basic'>
                      
                    </div>
                    

                   
                  </div>
                </div>



       
                <div class="row">
                  <div class="form-group col-md-12">
                    
                    <a  readonly  onclick="editnewemployeerequest()" class="form-control btn btn-primary">Submit</a>
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


<!-- Modal Description viewp1 -->
<div class="modal fade " id="uploadExcel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
<div class= 'col-md-12'>
<form method="get" action="#" class="input-group " style="margin-bottom:20px; width:100%"   enctype="multipart/form-data" >
<input type="file" class="form-control" name="myexcel" accept=".xlsx, .xls" id="myexcel"    value="" placeholder="Filter Employees">
</form></div>

<div class="container-fluid filtere modal-item">

 <input  readonly value="Click Insert Employees" onclick="" id='submitexcelwithdata' class="form-control btn btn-primary">
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->


<!-- Modal Description viewp1 -->
<div class="modal fade " id="myjobtitles" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
<div class= 'col-md-12'>
<table class="table table-stripped" id='myjobtitles2'>
  <thead>
    <tr><th>Titles</th></tr>
    
  </thead>
  
  <tbody>

                        <?php $gen = $this->Main->all('jobtitles');
                        foreach ($gen as $key => $value) {
                           # code...
                        ?>
    <tr onclick="$('#jobtitle').val('<?= $value['name'] ?>'); $('#jobtitle2').val('<?= $value['id'] ?>') ;$('#myjobtitles').modal('hide')" ><td><?= $value['name'] ?></td></tr>


  <?php } ?>

    
  </tbody>

</table>

</div>

<div class="container-fluid filtere modal-item">

<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>










