          
                
                          
<div class="container" style="height:100%">


    <div class= 'col-md-12' style="height:100%; padding-top:10%"">
          
  
            <p class='text-center'><img src="<?= base_url() ?>assets/images/logo.png" style="height:80px"/>
</p>
            <p class="lead text-center"> CREATE NEW PASSWORD (<?= $username ?>) </p>


           <div class=' col-md-4' style="height:100%"></div>
            <form method="post" class="card col-md-4 center" style="height:100%;>

      <p class="lead" ><span id="form_error" style="color:red"></span><span id="form_pass" style="color:green"></span><span id="form_load" style="color:blue"></span></p>
                <div class="row">
                  <div class="form-group ">
                    

                    



                  <div class="col-md-12">
                      <input type="password"   required value="" placeholder="WRITE NEW PASSWORD" class="form-control cinput  text-center" id='p2'onchange="checking()" onkeyup="checking()">
                      <p id="p22" style="color:red"></p>
                      
                    </div>


                      <div class="col-md-12">
                      <input type="password"   required value="" placeholder="CONFIRM NEW PASSWORD" class="form-control cinput  text-center" id='p3'  onchange="checking()" onkeyup="checking()">
                      <p><span id="p33" style="color:red"></span><span id="p44" style="color:green"></span></p>
                      
                      
                    </div>

        

                  </div>
                </div>

             
                <div class="row"  >
                  <div class="form-group col-md-12">
                    
                    <input  readonly value="submit" onclick="verifypassword()" class="form-control btn btn-primary">
                </div>
              </div>

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


<script>





 
  function checking(){
  
 var p2 = $('#p2').val();
 var p3 = $('#p3').val();
  
  
    if(!p2 || !p3 || p3 != p2  || p2.length < 6){

   !p2?$('#p22').html('Required'):$('#p22').html('');
   (p2.length < 6)?$('#p22').html('Too Short'):$('#p22').html('');

  !p3?$('#p33').html('Required'):$('#p33').html('');
  (p3+'' != p2+'' )?$('#p44').html(''):$('#p44').html('Matched with New Password');
  (p3+'' != p2+'' )?$('#p33').html('Not Match New Password'):$('#p33').html('');



$('.btn').hide();

     

      }else{




       $('.btn').show();


     }

 if(!p2 && p2===p3){

   $('#p44').html('');
   $('#p22').html('Required');

   }

if(p3 === p2 ){


console.log(' match');
$('#p33').html('');
$('#p44').html('Matched with New Password');

}




    

  }



 function verifypassword(){


 var p2 = $('#p2').val();


$('#form_load').html('Loading...');
    $.ajax({
    
    

                url: "<?= base_url() ?>change_password/savepassword",
                method: "POST",
                data: {username: '<?= $username ?>',new_password:p2}
            }).done(function(rd){

              $('#form_load').html('');

                if(rd.msg === true){

                
                $('#form_pass').html(rd.des+'');
                  $('#form_error').html('');
                setTimeout(function() {$('#form_pass').html('');}, 3000);
setTimeout(function() {window.location.href = "<?= base_url() ?>"}, 3000);

              p2 = $('#p2').val('');
              p3 = $('#p3').val('');

                    
                }else{
                
                $('#form_error').html(rd.des+'');
                setTimeout(function() {$('#form_error').html('');}, 3000);

                 
                }
                
            }).fail(function(){
            
             $('#form_load').html('');
             
                 $('#form_error').html('Network Error, please try Again Later');

            });
           



  }
  
  




</script>














