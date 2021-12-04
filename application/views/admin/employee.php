<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>EMPLOYEE ( <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?> )</h1>

          <ul class="breadcrumb">
           <li><a href="#">Admin</a></li>
           <li><a href="#">Employee</a></li>
          </ul>
        </div>
      </header>            
                



<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive" id='mytablelist'>
<h2> REGISTERED USER <strong></strong></h2>


<!-- Table start -->



<table class="table  table-hover table-striped table-bordered table-responsive printable" id='confirmed' style="width:100%; ">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Basic Salary</th>

<?php 

      $al = $this->Main->all('allowances');
       
   foreach ($al as $key => $value) {
         # code...
     

 ?>

      <th scope="col"><?= $value['name'] ?></th>

<?php  } ?>

      <th scope="col">Branch</th> 
      <th scope="col">Department</th> 
      <th scope="col">mobile phone</th> 
      <th scope="col">work phone</th> 
      <th scope="col">home phone</th> 
      <th scope="col">work email</th> 
      <th scope="col">private email</th> 


      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

   <?php if($this->Main->isExist1('employees', 'company_id',$this->session->userdata('companyarray')[$companyindex]['id'])){

    $k = 1;

        
                $this->db->order_by('status','ASC');
                $this->db->order_by('first_name','ASC');
                $this->db->where('company_id', $this->session->userdata('companyarray')[$companyindex]['id']);
                 $employee =   $this->db->get('employees');
                 $employee = $employee->result();


              
               if(!empty($employee)){ foreach( $employee as $c){ 


// 0686822411
                   
                   ?>


    <tr >
      <th scope="row"><?= $k ?></th>
      <td ><?= $c->first_name ?></td>
      <td ><?= $c->middle_name ?></td>
      <td ><?= $c->last_name ?></td>
      <td ><?= $this->Main->mycolumn1('genders','name', 'id',$c->gender)?$this->Main->mycolumn1('genders','name', 'id',$c->gender):'-' ?></td>
      <td ><?= $this->Main->mycolumn1('jobtitles','name', 'id',$c->job_title)?$this->Main->mycolumn1('jobtitles','name', 'id',$c->job_title):'not yet' ?></td>
      <td ><?= $c->status ?></td>
     
      <td ><?= $this->Main->mycolumn2('employeesalary','amount', 'employee', $c->id,'company_id', $c->company_id) ?></td>


<?php 

$al = $this->Main->all('allowances');
       
   foreach ($al as $key => $value) {

 ?>

      <th scope="col"><?= $this->Main->mycolumn3('employeeallowances','amount', 'allowance', $value['id'],'employee',$c->id,'company',$c->company_id)
       ?></th>

<?php  } ?>


      <td ><?= $this->Main->mycolumn1('client_branch','name', 'id', $c->branch)?$this->Main->mycolumn1('client_branch','name', 'id', $c->branch):'Main Branch'  ?></td>
      <td ><?= $this->Main->mycolumn1('companystructures','title', 'id', $c->department)?$this->Main->mycolumn1('companystructures','title', 'id', $c->department):'No Department'  ?></td>
      <td><?= $c->mobile_phone ?></td>
      <td><?= $c->work_phone ?></td>
      <td><?= $c->home_phone ?></td>
      <td><?= $c->work_email ?></td>
      <td><?= $c->private_email ?></td>
     



       <td> <a href='<?= base_url() ?>employee/edit/<?= $companyindex ?>?employee=<?= $c->id ?>' class="label label-primary"> Edit Employee  </a>

     
    </tr>

  <?php $k++;} }else{ ?>


<p class="lead"> No Any Data of Companies, Please Add</p>



  <?php }  }?>
   
  </tbody>
</table>


<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->
<!--Controls-->
    
        <!--/.Controls-->

</div>

<!-- container end end -->

    <a id="bleft" href='#' class="left carousel-control" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '-=200px' }, 'slow');">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Left</span>
        </a>
        <a id="bright" href='#'   class="right carousel-control" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '+=200px' }, 'slow');">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Right</span>
        </a>

  

<!-- Modal for days settings -->

</div>
