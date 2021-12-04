<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>Accountants, Managers and Super Admins</h1>

          <ul class="breadcrumb">
          <li><a href="#">Admin</a></li>
            <li><a href="#">Accountants, Managers and Super Admins</a></li>
          </ul>
        </div>
      </header>            
                



<!-- start me -->

  <div id="table2"  class="printable" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= "col-md-12 table-responsive" id='mytablelist'>
<h2> Registered Accountants, Managers and Super Admins <strong></strong></h2>


<!-- Table start -->



<table class="table  table-hover table-striped table-bordered table-responsive printable applydt"  style="width:100%; ">
  <thead>
    <tr style="height: 0px">
      <th scope="col">#</th>
      <th scope="col">FULL NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">ROLE</th>
      <th scope="col">STATUS</th>
      <th scope="col">ACCESS</th>
      <th scope="col">REGISTERED DATE</th>
    

      <th scope="col"></th> 

    </tr>
  </thead>
  <tbody class="" >

   <?php if($this->Main->isExist1('admins', 'deleted ',0)){

    $k = 1;



                $this->db->where('deleted',0);
                $this->db->order_by('full_name','ASC');
                $this->db->order_by('active','DESC');
                 $admins =   $this->db->get('admins');
                 $admins = $admins->result();


                $branches2 =   $this->db->get('companyadmins');
                $branches2 = $branches2->result_array();

              
               if(!empty($admins)){ foreach( $admins as $a){ 

               $role = '-';
                if($a->level == 1){$role = 'Super Admin'; }else
                if($a->level == 2){$role = 'Manager'; }else
                if($a->level == 3){$role = 'Main Accountant'; }else
                if($a->level == 4){$role = 'Branch Accountant'; }
                   
                   ?>



  <div class="modal fade" id="deleteadmin<?= $a->id ?>" >
  <div class="modal-dialog">
    <div class="modal-content">

      
      <div class="modal-body">
       <p class="lead text-center" style="margin: 0 0 2px"> Are You Sure You want to Delete <?= $a->username ?> -  <?= $role ?>!.</p>
       <p class="lead text-center" style="margin: 0 0 2px">Remember that you you can't undo changes</p>
       <p class="lead" id='loadedentry<?= $a->id ?>' style='font-size: 20px;color: violet'></p>
      <p class='lead' id='loadedentry3_<?= $a->id ?>' style="color:red;font-size: 20px"></p>

         <a    class="btn btn-danger btn-lg" onclick='deletenewadmin(<?= $a->id ?>)' >Yes Delete</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>





    <tr >
      <th scope="row"><?= $k ?></th>
      <td ><?= $a->full_name ?></td>
      <td ><?= $a->username ?></td>
      <td ><?= $a->email_address ?></td>
      <td ><?= $a->phone ?></td>
      <td ><?= $role ?></td>
      <td ><?php if($a->active == 1){echo 'ACTIVE';}else{echo 'INACTIVE';} ?></td>

     
      <td id='deleteadmintocomp_<?= $a->id ?>'><?php $mng = 1;

                if($a->level == 1){echo '<p>All Companies</p>'; }else
                if($a->level == 2 || $a->level == 3){
                 

        if(!empty($branches2)){

       foreach ($branches2 as $key => $value) {
        if($value['admin'] == $a->id){
         
       ?> 


       <div class="modal fade" id="deleteadmintocomp<?= $value['id']?>" >
  <div class="modal-dialog">
    <div class="modal-content">

      
      <div class="modal-body">
       <p class="lead text-center" style="margin: 0 0 2px"> Are You Sure You want to remove <?= $a->username ?> -  <?= $role ?> from accessing <?= $this->Main->mycolumn1('clients','name','id',$value['client'])  ?>!.</p>
       <p class="lead" id='loadedentrybb_<?= $a->id ?>' style='font-size: 20px;color: violet'></p>
      <p class='lead' id='loadedentry3bb__<?= $a->id ?>' style="color:red;font-size: 20px"></p>

         <a    class="btn btn-danger btn-lg" onclick='deleteadmintocomp(<?= $value['id']?> , <?= $a->id ?>)' >Yes Remove</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>

       
       <p style="margin: 0 0 2px"><strong><?= $mng ?>: </strong> <?= $this->Main->mycolumn1('clients','name','id',$value['client'])  ?> <a  onclick="$('#loadedentry3bb_'+<?= $a->id ?>).html(''); $('#deleteadmintocomp<?= $value['id']?>').modal('show')"><?= 'remove' ?></a></p>

        <?php  $mng++; }}}

                }else if($a->level == 4){
                 

        if(!empty($branches2)){

       foreach ($branches2 as $key => $value) {
        if($value['admin'] == $a->id && $this->Main->isExist2('client_branch','id',$value['branch'],'company',$value['client'])){
         
       ?> 


<div class="modal fade" id="deleteadmintocomp<?= $value['id']?>" >
  <div class="modal-dialog">
    <div class="modal-content">

      
      <div class="modal-body">
       <p class="lead text-center" style="margin: 0 0 2px"> Are You Sure You want to remove <?= $a->username ?> -  <?= $role ?> from accessing <?= $this->Main->mycolumn1('client_branch','name','id',$value['branch']) ?> (<?= $this->Main->mycolumn1('clients','name','id',$value['client'])  ?>)!.</p>
       <p class="lead" id='loadedentrybb_<?= $a->id ?>' style='font-size: 20px;color: violet'></p>
      <p class='lead' id='loadedentry3bb__<?= $a->id ?>' style="color:red;font-size: 20px"></p>

         <a    class="btn btn-danger btn-lg" onclick='deleteadmintocomp(<?= $value['id']?>, <?= $a->id ?>)' >Yes Remove</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>
  

       
       <p style="margin: 0 0 2px"><strong><?= $mng ?>: </strong> <?= $this->Main->mycolumn1('client_branch','name','id',$value['branch']) ?> (<?= $this->Main->mycolumn1('clients','name','id',$value['client'])  ?>) <a onclick="$('#loadedentry3bb_'+<?= $a->id ?>).html(''); $('#deleteadmintocomp<?= $value['id']?>').modal('show')"><?= 'remove' ?></a></p>

        <?php  $mng++; }}}

                }


    ?></td>

      <td ><?= date('M d,Y', strtotime($a->created))  ?></td>


       <td>
        <a href='<?= base_url() ?>company/edit_user/<?=$companyindex?>?user=<?= $a->id ?>' class="label label-primary"> Edit User </a>  
        <a  class="label label-danger" onclick="$('#loadedentry3_'+<?= $a->id ?>).html(''); $('#deleteadmin<?= $a->id ?>').modal('show')"> Delete User </a>  

      </td> 


      
<!-- <td class="row">

 
  <span> <a href="#editmypayroll<?= '' ?>" data-toggle="modal"><strong><i class="fa fa-eye"></i> </strong></a> </span>
</td>  -->     
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



  <div class="modal fade" id="alerting">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <p class="lead" style="color:green" id="alerting4"></p>
      </div>
    </div>
  </div>
</div>
