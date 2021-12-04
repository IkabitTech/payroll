          
                
                          
<div class="container" style="height:100%">


    <div class= 'col-md-12' style="height:100%; padding-top:10%"">
            <p class="lead text-center"> </p>
          
  
            <p class='text-center'><img src="<?= base_url() ?>assets/images/logo.png" style="height:80px"/>
</p>
            <p class="lead text-center"> FORGET/RESET PASSWORD </p>


           <div class=' col-md-4' style="height:100%"></div>
            <form method="post" class="card col-md-4 center" style="height:100%;>

      <p class="lead text-center" ><span id="form_error" style="color:red"></span><span id="form_pass" style="color:green"></span><span id="form_load" style="color:blue"></span></p>
                <div class="row">
                  <div class="form-group ">
                    

                    <div class="col-md-12">
                      <input type="text"   required value="" placeholder="ENTER USERNAME" class="form-control cinput text-center" id='username' onchange="checking()" onkeyup="checking()">
                      <p id="p11" style="color:red" class="text-center"></p>
                      
                    </div>

        

                  </div>
                </div>

             
                <div class="row"  >
                  <div class="form-group col-md-12">
                    
                    <input  readonly value="SEND REQUEST" onclick="sendrequesttoreset()" class="form-control btn btn-primary">
                </div>
               <p class="text-center">After Sending Request you will Receive <b>Confirmation link</b> Use that to Continue With the Process before it Became Invalid</p>

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

    var p = $('#username').val();
    

   if(p && p.length > 4){
   
   $('.btn').show();
      
   }else{

$('.btn').hide();

   }



    }



  
  




     function sendrequesttoreset(){
     

 var p = $('#username').val();
 
 
            if(!p){ 
              
    $('.btn').hide();
  $('#p11').html('Required **');
     return;
            
            }
            
            
 
 
 $('#form_load').html('Loading...');
 $('#form_pass').html('');
 $('#form_error').html('');
    $.ajax({
    
    

                url: "<?= base_url() ?>forget_password/sendrequest",
                method: "POST",
                data: {username: p}
            }).done(function(rd){

              $('#form_load').html('');

                if(rd.msg === true){

                
                $('#form_pass').html(rd.des+'');

                setTimeout(function() {$('#form_pass').html('');}, 10000);
             $('#p11').val('');
         

                    
                }else{
                
                $('#form_error').html(rd.des+'');
                setTimeout(function() {$('#form_error').html('');}, 10000);

                 
                }
                
            }).fail(function(){
            
             $('#form_load').html('');
             
                 $('#form_error').html('Network Error, please try Again Later');

            });
           
    

        }





</script>














