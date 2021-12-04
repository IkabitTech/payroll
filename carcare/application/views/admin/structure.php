<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>COMPANY STRUCTURE</h1>

          <ul class="breadcrumb">
           <li><a href="#">Admin</a></li>
           <li><a href="#">Payroll</a></li>
            <li class="#">pay</li>
          </ul>
        </div>
      </header>            
                



<!-- start me -->

                            


  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive" id='mytablelist'>
<h2> REGISTERED COMPANIES <strong></strong></h2>


<!-- Table start -->



<table class="table  table-hover table-striped table-bordered table-responsive  printable applydt"  style="width:100%; ">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">COMPANY NAME</th>
    
      <th scope="col">STATUS</th> 
      <th scope="col">STRUCTURE</th> 


      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

   <?php if($this->Main->isExist1('clients', 'id>',0)){

    $k = 1;

                
                $this->db->order_by('name','ASC');
                $this->db->order_by('status','ASC');
                 $companies =   $this->db->get('clients');
                 $companies = $companies->result();


                $this->db->where('deleted',0);
                $this->db->order_by('full_name','ASC');
                $this->db->order_by('active','DESC');
                 $admins =   $this->db->get('admins');
                 $admins = $admins->result_array();


                $this->db->order_by('name','ASC');
                $this->db->order_by('active','DESC');
                $branches =   $this->db->get('client_branch');
                $branches = $branches->result_array();


                $cas =   $this->db->get('companyadmins');
                $cas = $cas->result_array();


                $css =   $this->db->get('companystructures');
                $css = $css->result();

              
               if(!empty($companies)){ foreach( $companies as $c){ ?>



    <tr >
      <th scope="row"><?= $k ?></th>
      <td ><?= $c->name ?></td>
    
  
      <td ><?= $c->status ?></td>


      
      <td>
        <p class="label label-primary">MAIN BRANCH</p></br>

 <?php if(!empty($css)){ foreach( $css as $cs){
    if($cs->client_id == $c->id && $cs->branch <= 0){   ?>

        <p class="label label-success" style="margin-left: 30px; margin-bottom: 0px"><?= $cs->title ?></p></br>

      <?php }}} ?>
<hr style="margin-top: 2px;margin-bottom: 5px;padding-top: 0px;padding-bottom: 0px">

 <?php if(!empty($branches)){ foreach( $branches as $b){
    if($b['company'] == $c->id ){   ?>
      <p class="label label-primary"><?= $b['name'] ?></p></br>

<?php if(!empty($css)){ foreach( $css as $cs){
    if($cs->client_id == $b['company'] && $cs->branch > 0 && $cs->branch == $b['id'] ){   ?>

        <p class="label label-success" style="margin-left: 30px; margin-bottom: 0px"><?= $cs->title ?></p></br>

       <?php }}} ?>
<hr style="margin-top: 2px;margin-bottom: 5px;padding-top: 0px;padding-bottom: 0px">

         <?php }}} ?>
        </td>

        <td><a  class="label label-primary" onclick="moredetails(
'<?= $c->details ?>',
'<?= $c->address ?>',
'<?= $c->contact_number ?>',
'<?= $c->mobile_number ?>',
'<?= $c->contact_email ?>',
'<?= $c->company_url ?>'
        )">  More.. </a> </td>


      

      
<!-- <td class="row">

 
  <span> <a href="#editmypayroll<?= '' ?>" data-toggle="modal"><strong><i class="fa fa-eye"></i> </strong></a> </span>
</td>  -->     
    </tr>











  <?php $k++;}   }else{ ?>


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




<?php  if(!empty($companies)){ foreach( $companies as $c){  ?>



<div >
<!-- Modal Description viewp1 -->
<div class="modal fade " id="managers<?= $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>

<div class= 'col-md-12'>
 


<div class="container-fluid  modal-item" id="managers_<?= $c->id ?>">

 <p class="lead">  <?= $c->name ?> MANAGER(S)</p>
  <table class="table  table-hover table-striped table-bordered table-responsive printable applydt"  style="width:100%;">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($admins as $key => $value) {

        if($value['level'] == 2 && $this->Main->isExist2('companyadmins', 'client',$c->id,'admin', $value['id'])){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $value['full_name'] ?></td>
      <td ><?= $value['username'] ?></td>
      <td ><?= $value['email_address'] ?></td>
      <td ><?= $value['phone'] ?></td>
      <td ><?php if($value['active'] == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>
      <td><a onclick="removetocomp('managers_', <?= $c->id ?>, <?= $this->Main->mycolumn2('companyadmins','id','client',$c->id ,'admin',$value['id']) ?>,'manager_')">REMOVE</a></td>

    </tr>

  <?php } } ?>


  </tbody>
</table> 




 <p class="lead">  <?= $c->name ?> MANAGER(S) TO ADD</p>
  <table class="table  table-hover table-striped table-bordered table-responsive printable applydt"  style="width:100%;">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($admins as $key => $value) {

        if($value['level'] == 2 && !$this->Main->isExist2('companyadmins', 'client',$c->id,'admin', $value['id'])){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $value['full_name'] ?></td>
      <td ><?= $value['username'] ?></td>
      <td ><?= $value['email_address'] ?></td>
      <td ><?= $value['phone'] ?></td>
      <td ><?php if($value['active'] == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>
      <td><a onclick="addtocomp('managers_', <?= $c->id ?>, <?= $value['id'] ?>,0,'manager_')">ADD</a></td>
    </tr>

  <?php } } ?>


  </tbody>
</table> 


</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->

</div> </div>

        




<div >
<!-- Modal Description viewp1 -->
<div class="modal fade " id="maccountants<?= $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>

<div class= 'col-md-12'>
 


<div class="container-fluid  modal-item" id="maccountants_<?= $c->id ?>">

 <p class="lead">  <?= $c->name ?> MAIN ACCOUNTANT(S)</p>
  <table class="table  table-hover table-striped table-bordered table-responsive printable applydt"  style="width:100%;">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($admins as $key => $value) {

        if($value['level'] == 3 && $this->Main->isExist2('companyadmins', 'client',$c->id,'admin', $value['id'])){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $value['full_name'] ?></td>
      <td ><?= $value['username'] ?></td>
      <td ><?= $value['email_address'] ?></td>
      <td ><?= $value['phone'] ?></td>
      <td ><?php if($value['active'] == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>
      <td><a onclick="removetocomp('maccountants_', <?= $c->id ?>, <?= $this->Main->mycolumn2('companyadmins','id','client',$c->id ,'admin',$value['id']) ?>,'maccountant_')">REMOVE</a></td>

    </tr>

  <?php } } ?>


  </tbody>
</table> 




 <p class="lead">  <?= $c->name ?> MAIN ACCOUNTANT(S) TO ADD</p>
  <table class="table  table-hover table-striped table-bordered table-responsive printable applydt"  style="width:100%;">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($admins as $key => $value) {

        if($value['level'] == 3 && !$this->Main->isExist2('companyadmins', 'client',$c->id,'admin', $value['id'])){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $value['full_name'] ?></td>
      <td ><?= $value['username'] ?></td>
      <td ><?= $value['email_address'] ?></td>
      <td ><?= $value['phone'] ?></td>
      <td ><?php if($value['active'] == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>
      <td><a onclick="addtocomp('maccountants_', <?= $c->id ?>, <?= $value['id'] ?>,0,'maccountant_')">ADD</a></td>
    </tr>

  <?php } } ?>


  </tbody>
</table> 


</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->

</div> </div>









<div >
<!-- Modal Description viewp1 -->
<div class="modal fade " id="branches<?= $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>

<div class= 'col-md-12'>
 


<div class="container-fluid  modal-item" id="branches_<?= $c->id ?>">

 <p class="lead">  <?= $c->name ?> BRANCH(S)</p>
  <table class="table  table-hover table-striped table-bordered table-responsive printable applydt" style="100%" >
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">EMAIL</th>
      <th scope="col">CONTACT 1</th>
      <th scope="col">CONTACT 2</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($branches as $key => $value) {

        if($this->Main->mycolumn1('client_branch', 'company', 'id',$value['id']) == $c->id){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $value['name'] ?><input id='editname<?= $value['id']?>' value="<?=$value['name']?>" class='hidden'></td>
      <td ><?= $value['address'] ?><input id='editaddress<?= $value['id']?>' value="<?=$value['address']?>" class='hidden'></td>
      <td ><?= $value['email'] ?><input id='editemail<?= $value['id']?>' value="<?=$value['email']?>" class='hidden'></td>
      <td ><?= $value['contact1'] ?><input id='editcontact1_<?= $value['id']?>' value="<?=$value['contact1']?>" class='hidden'></td>
      <td ><?= $value['contact2'] ?><input id='editcontact2_<?= $value['id']?>' value="<?=$value['contact2']?>" class='hidden'><input id='editid<?= $value['id']?>' value="<?=$value['id']?>" class='hidden'></td>
      <td ><?php if($value['active'] == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?><input id='editstatus<?= $value['id']?>' value="<?=$value['active']?>" class='hidden'></td>
      <td><a class="label label-primary" onclick="edittocompbranch(<?= $value['id'] ?>,<?= $c->id ?>)">edit</a> <a class="label label-primary" onclick="removetocompbranch(<?= $value['id'] ?> , <?= $c->id ?>)">delete</a></td>




    </tr>

  <?php } } ?>


  </tbody>
</table> 




 <p class="lead">  <?= $c->name ?> ADD BRANCH</p>


 <form method="post">

                <!-- BILLING ADDRESS -->
                <div class="row">
                  <div class="form-group">
                    <p class="lead" id="errorform<?= $c->id ?>" style="color:red"></p>

                    <div class="col-md-6">
                      <label> Name  </label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Write Branch Name" class="form-control" id='name<?= $c->id ?>'>
                      <p id="errorname<?= $c->id ?>" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-6">
                      <label>Address  </label>
                      <textarea type="text"   required value="" placeholder="Address" class="form-control" id='address<?= $c->id ?>'></textarea>
                      <p id="erroraddress<?= $c->id ?>" style="color:red"></p>
                      
                    </div>
                  </div>
                </div>

                 <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-6">
                      <label> Contact 1  </label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Write First Contact" class="form-control" id='contact1_<?= $c->id ?>'>
                      <p id="errorcontact<?= $c->id ?>" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-6">
                      <label>Contact 2  </label>
                      <input type="text"   required value="" placeholder="Write Second Contact" class="form-control" id='contact2_<?= $c->id ?>'>
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-6">
                      <label> Email  </label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Write Email" class="form-control" id='email<?= $c->id ?>'>
                      <input type="text"   value="<?= $c->id ?>" class="form-control hidden" id='company<?= $c->id ?>'>
                      <input type="text"   value="0" class="form-control hidden" id='id<?= $c->id ?>'>
                      <p id="erroremail<?= $c->id ?>" style="color:red"></p>
                      
                    </div>


                    <div class="col-md-6">
                      <label> Status  </label>
                      <select type="text"   required value="" placeholder="Write Second Contact" class="form-control" id='status<?= $c->id ?>'>

                       <option value="1">Active</option>
                       <option value="0">Not Active</option>
                      </select>
                      
                    </div>
                  </div>
                </div>




                <div class="row">
                  <div class="form-group col-md-6">
                    
                    <input  readonly value="submit" onclick="addedittocomp_branch(<?= $c->id ?>)" class="form-control btn btn-primary">
                </div>

                <div class="form-group col-md-6">
                    
                    <input  readonly value="clear form" onclick="
                    $('#name<?= $c->id ?>').val('')
                    $('#address<?= $c->id ?>').val('')
                    $('#contact1_<?= $c->id ?>').val('')
                    $('#contact2_<?= $c->id ?>').val('')
                    $('#email<?= $c->id ?>').val('')
                    $('#email<?= $c->id ?>').val('')
                    $('#email<?= $c->id ?>').val('')
                    $('#id<?= $c->id ?>').val('')

                    " class="form-control btn btn-primary">
                </div>
              </div>


              </form>


</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->

</div> </div>





<?php if ($this->Main->isExist1('client_branch', 'company',$c->id)){ 

  ?>

<div >
<!-- Modal Description viewp1 -->
<div class="modal fade " id="baccountants<?= $c->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>

<div class= 'col-md-12'>
 


<div class="container-fluid  modal-item" id="baccountants_<?= $c->id ?>">

 <p class="lead">  <?= $c->name ?> BRANCH ACCOUNTANT(S)</p>
  <table class="table  table-hover table-striped table-bordered table-responsive printable applydt" style="width: 100%" >
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">BRANCH</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($cas as $key => $value) {

        if($this->Main->isExist2('admins', 'id',$value['admin'],'level', 4)  && $this->Main->mycolumn1('companyadmins', 'client', 'id',$value['id']) == $c->id){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $this->Main->mycolumn1('admins', 'full_name','id',$value['admin']) ?></td>
      <td ><?= $this->Main->mycolumn1('admins', 'username','id',$value['admin']) ?></td>
      <td ><?= $this->Main->mycolumn1('client_branch','name', 'id', $value['branch']) ?></td>
      <td ><?= $this->Main->mycolumn1('admins', 'email_address','id',$value['admin']) ?></td>
      <td ><?= $this->Main->mycolumn1('admins', 'phone','id',$value['admin']) ?></td>
      <td ><?php if( $this->Main->mycolumn1('admins', 'active','id',$value['admin'])  == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>
      <td><a class="label label-primary" onclick="open_addeditbranchaccountants(<?= $c->id ?>, <?= $value['admin'] ?>, '<?= $this->Main->mycolumn1('admins', 'full_name','id',$value['admin']) ?>', <?= $value['id'] ?>) "> Change Branch</a> <a class="label label-primary" onclick="delete_addeditbranchaccountants(<?= $c->id ?>, <?= $value['id'] ?>) ">REMOVE</a></td>

    </tr>
   
  <?php  $mng2++; } } ?>


  </tbody>
</table> 




 <p class="lead">  <?= $c->name ?> BRANCH ACCOUNTANT(S) TO ADD</p>
 <table class="table  table-hover table-striped table-bordered table-responsive printable applydt"  style="width: 100%">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">STATUS</th>
      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

<?php $mng2 = 1;
       foreach ($admins as $key => $value) {

        if($value['level'] == 4 ){
       ?> 
    <tr >
      <th scope="row"><?= $mng2 ?></th>
      <td ><?= $value['full_name'] ?></td>
      <td ><?= $value['username'] ?></td>
      <td ><?= $value['email_address'] ?></td>
      <td ><?= $value['phone'] ?></td>
      <td ><?php if($value['active'] == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>
      <td><a onclick="open_addeditbranchaccountants(<?= $c->id ?>, <?= $value['id'] ?>, '<?= $value['full_name'] ?>','')">ADD</a></td>
    </tr>

  <?php $mng2++; } } ?>


  </tbody>
</table> 


</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->

</div> </div>



<?php }else{ ?>


  <div class="modal fade" id="baccountants<?= $c->id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="color:red" >This Company have no Branches</p>
      </div>
    </div>
  </div>
</div>


<?php } ?>






















<?php }} ?>





  <div class="modal fade" id="alerting2">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="color:red" id="alerting5"></p>
      </div>
    </div>
  </div>
</div>



  <div class="modal fade" id="alerting">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="color:green" id="alerting4"></p>
      </div>
    </div>
  </div>
</div>




  <div class="modal fade" id="addeditbranchaccountants">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="" id="name_bacc"></p>

        <p class="lead" style="color: red" id="error_bacc"></p>

   
                    <div class=" form-group col-md-12">
                      <label> Branch Selection </label>
                      <select type="text"   required value=""class="form-control" id='branch_bacc'>

                        <?php 


                 if(!empty($branches)){ foreach ($branches as  $value) {   ?>


             <option value="<?= $value['id'] ?>" class="myallopt myopt<?= $value['company'] ?>"><?= $value['name'] ?> </option>

                       <?php }} ?>

                       
                      </select>
                      <p id='errorbacc' style="color: red"></p>
                      
                    </div>


                          <input  id="user_bacc"  class="hidden">
                       <input  id="company_bacc" class="hidden">
                       <input  id="id_bacc" class="hidden">

                      <div class="form-group col-md-12">
                    
                    <input  readonly value="submit" onclick="add_addeditbranchaccountants()" class="form-control btn btn-primary">
                      
                </div>


      </div>
    </div>
  </div>
</div>








  <div class="modal fade" id="moredetails">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="" ><strong>Details : </strong><span id="details_34"></span></p>
        <p class="lead" style="" ><strong>Adress : </strong id="address_34"><span></span></p>
        <p class="lead" style="" ><strong>First Contact : </strong><span id="fc_34"></span></p>
        <p class="lead" style="" ><strong>Second Contact : </strong><span id="sc_34"></span></p>
        <p class="lead" style="" ><strong>Fax : </strong><span id="fax_34"></span></p>
        <p class="lead" style="" ><strong>Web : </strong> <span id="web_34"></span></p>

       


      </div>
    </div>
  </div>
</div>



