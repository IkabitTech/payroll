<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>Payroll</h1>

          <ul class="breadcrumb">


        <?php if($this->session->userdata('level') == 10){ ?>
                      <li><a href="#">Human Resource Manager</a></li>

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
<h2> Payroll Plan <strong>Settings</strong></h2>


        <?php

        if($this->session->userdata('level') != 2){ ?>

<a  class=" label label-primary " data-toggle="modal" href="#addPy" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">Add  New</a>


<?php } ?>

<!-- Table start -->


<table class="table table-striped table-dark"    
 >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Created</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>

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
      <td><?= $py['created'] ?></td>
      <td><?=   date('M Y', strtotime($py['name']))   ?></td>

      <?php if(!$this->Main->isExist1('payrollrecords','payroll',$py['id'])){ ?>
      <td style="color: <?= 2==1?'blue':'red' ?>"><?= $py['submitted']==1?'submitted':'on process..' ?></td>
    <?php }else{ ?>

      <td style="color: <?= $py['submitted']==1?'green':'green' ?>">Have Data</td>
    <?php }?>
     
      <th>

       
        <?php

        if($this->session->userdata('level') != 2){

          if($py['submitted'] !=1){ ?>
        <a href="#deletePy<?= $py['id'] ?>" data-toggle="modal">Delete</a>
      <?php


       }} ?>


        <a href="<?= base_url().'payroll/pay/'.$py['id'].'/'.$companyindex ?>" >View</a>


      </th>
    </tr>






<!-- stariting edit  -->


        <?php

        if($this->session->userdata('level') != 2){ ?>







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
                      <input style="width: 100%"  type="text"  required value="" readonly placeholder="Ex April 2019" class="form-control mpicker" id='payrollname' >
                      <p id="errorname" style="color:red"></p>

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






<script type="text/javascript">
  






function addpayroll(){



var name = $('#payrollname').val();

  var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>  ; 

  changeInnerHTML(['addpayrollerror','errorstart','errorname', 'errorend'],  "");


  if(!name ){

    changeInnerHTML('addpayrollerror', "Incorrect Input");


  !name ? changeInnerHTML('errorname', "Name field is Required") : "";



return;

  }



$.ajax({
url: "<?= base_url() ?>actions_new1/addpayroll",
method: "POST",
data: {name:name, co:co}
}).done(function(rd){

console.log(rd.des);
//  var newp = JSON.parse(rd); 


//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#addPy').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 3000);

// $('#addbferror').html(rd.des+"");

setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 500);






}else{

$('#addpayrollerror').html(rd.des+"");

}

}).fail(function(){

$('#addpayrollerror').html('Some Error Occured Contact Support team and Try again Later');


});


}


  



function editpayroll(a){



var name = $('#payrollnameedit'+a).val();

var id = $('#payrollIDedit'+a).val();
  var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>  ; 

  changeInnerHTML(['errornameedit'+a,'errorstartedit'+a,'errorendedit'+a, 'editpyerror'+a],  "");


  if(!name){

    changeInnerHTML('editpyerror'+a, "Incorrect Input");


  !name ? changeInnerHTML('errornameedit'+a, "Name field is Required") : "";



return;

  }



$.ajax({
url: "<?= base_url() ?>actions_new1/editpayroll",
method: "POST",
data: {name:name, co:co,id:id}
}).done(function(rd){

console.log(rd.des);
//  var newp = JSON.parse(rd); 


//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#addPy').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 3000);

// $('#addbferror').html(rd.des+"");

setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 500);






}else{

 changeInnerHTML('editpyerror'+a, ""+rd.des);




}

}).fail(function(){

$('#editpyerror'+a).html('Some Error Occured Contact Support team and Try again Later');


});


}





function deletepy(a){


//$("#tableBf1234").load(location.href + "#tableBf1234");



$.ajax({
url: "<?= base_url() ?>actions_new1/deletepayroll",
method: "POST",
data: { id:a}
}).done(function(rd){

console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#deletePy'+a).modal('hide');


$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);


setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 2000);


setTimeout(function() { $( "#table2" ).load(window.location.href + " #table2" );
}, 500);






}else{

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);


}

}).fail(function(){

$('#alerting2').modal('show');
$('#alerting5').html('Some Error Occured Contact Support team and Try again Later');
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);



});


}





</script>






