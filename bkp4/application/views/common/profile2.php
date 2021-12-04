<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>User Info</h1>

          <ul class="breadcrumb">
            <?php if($this->session->userdata('level') == 3){ ?>
                      <li><a href="#">Accountant</a></li>

        <?php }elseif($this->session->userdata('level') == 2){ ?>
                      <li><a href="#">Supervisor</a></li>

        <?php }elseif($this->session->userdata('level') == 3){ ?>
                      <li><a href="#">Supervisor</a></li>

        
        <?php }elseif($this->session->userdata('level') == 4){ ?>
                      <li><a href="#">Branch Admin</a></li>
        
        <?php }elseif($this->session->userdata('level') == 5){ ?>
                      <li><a href="#">Employee</a></li>

        <?php } ?>           
            <li><a href="#">Profile</a></li>

            <li class="#">Change Password</li>
          </ul>
        </div>
      </header>            
                
                          
<div class="container" >


    <div class= 'col-md-12'>
            <p class="lead text-center"> PERSONAL  DETAILS</p>
          
  
 <?php if($this->session->userdata('level') >= 1 && $this->session->userdata('level') <= 4 ){

if($this->session->userdata('level') == 1){ $me = 'Superadmin';}
elseif($this->session->userdata('level') == 2){$me = 'Manager';}
elseif($this->session->userdata('level') == 3){$me = 'Main Accountant';}
elseif($this->session->userdata('level') == 4){$me = 'Branch Accountant';}

   ?>

        <p class="lead">NAMES : <?= $this->Main->mycolumn1('admins','full_name','id',$this->session->userdata('userid')) ?></p>
        <p class="lead">USERNAME : <?= $this->Main->mycolumn1('admins','username','id',$this->session->userdata('userid')) ?></p>
        <p class="lead">EMAIL : <?= $this->Main->mycolumn1('admins','email_address','id',$this->session->userdata('userid')) ?></p>
        <p class="lead">PHONE : <?= $this->Main->mycolumn1('admins','phone','id',$this->session->userdata('userid')) ?></p>
        <p class="lead">ROLE : <?= $me ?></p>

 <?php }elseif($this->session->userdata('level') ==5){ 
 $id = $this->session->userdata('userid');
 $allnames = $this->Main->mycolumn1('employees','first_name', 'id',$id).' '. $this->Main->mycolumn1('employees','middle_name', 'id',$id) .' '.$this->Main->mycolumn1('employees','last_name', 'id',$id);
  ?>

        <p class="lead">NAMES : <?= $allnames ?></p>
        <p class="lead">USERNAME : <?= $this->Main->mycolumn1('employees','username','id',$id) ?></p>
        <p class="lead">WORK EMAIL : <?= $this->Main->mycolumn1('employees','work_email','id',$id) ?></p>
        <p class="lead">PRIVATE EMAIL : <?= $this->Main->mycolumn1('employees','private_email','id',$id) ?></p>
        <p class="lead">HOME PHONE : <?= $this->Main->mycolumn1('employees','home_phone','id',$id) ?></p>
        <p class="lead">WORK PHONE : <?= $this->Main->mycolumn1('employees','work_phone','id',$id) ?></p>
        <p class="lead">MOBILE PHONE : <?= $this->Main->mycolumn1('employees','mobile_phone','id',$id) ?></p>
 




 <?php  }else{ redirect(base_url());} ?>



 

            <p class="lead text-center"> CHANGE PASSWORD </p>


           
            <form method="post">

      <p class="lead" ><span id="form_error" style="color:red"></span><span id="form_pass" style="color:green"></span><span id="form_load" style="color:blue"></span></p>
                <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-4">
                      <label>OLD PASSWORD</label><span style="color: red">*</span>
                      <input type="password"   required value="" placeholder="WRITE OLD PASSWORD" class="form-control cinput" id='p1'onchange="changenewpassword()" onkeyup="changenewpassword()">
                      <p id="p11" style="color:red"></p>
                      
                    </div>

                     <div class="col-md-4">
                      <label>NEW PASSWORD</label><span style="color: red">*</span>
                      <input type="password"   required value="" placeholder="WRITE NEW PASSWORD" class="form-control cinput" id='p2'onchange="changenewpassword()" onkeyup="changenewpassword()">
                      <p id="p22" style="color:red"></p>
                      
                    </div>


                      <div class="col-md-4">
                      <label>CONFIRM NEW PASSWORD</label><span style="color: red">*</span>
                      <input type="password"   required value="" placeholder="CONFIRM NEW PASSWORD" class="form-control cinput" id='p3'  onchange="changenewpassword()" onkeyup="changenewpassword()">
                      <p><span id="p33" style="color:red"></span><span id="p44" style="color:green"></span></p>
                      
                      
                    </div>
        

                  </div>
                </div>

             
                <div class="row">
                  <div class="form-group col-md-6">
                    
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

  function changenewpassword(){
  
 var p1 = $('#p1').val();
 var p2 = $('#p2').val();
 var p3 = $('#p3').val();
  
  
  !p1?$('#p11').html('Required'):$('#p11').html('');
  !p2?$('#p22').html('Required'):$('#p22').html('');
  !p3?$('#p33').html('Required'):$('#p33').html('');
  
  if(p1 == p2 && p1 != null && p2.length>5){ $('#p11').html('Old Password and New Password Cant be the same');}else{$('#p11').html('');}
  if(p3 != p2 && p2 != null  && p2.length>5){$('#p33').html('Not Match New Password');$('#p44').html('');}else{$('#p33').html('');$('#p44').html('Matched with New Password');}
  
  
    
   (p2.length < 6)?$('#p22').html('Too short at least 6 Characters'):$('#p22').html('');
    

  }
  
  
  
  
     function verifypassword(){
     
    $('#form_load').html('');
    $('#form_pass').html('');
    $('#form_error').html('');

     
    var name = <?= $this->session->userdata('userid') ?>;
 var p1 = $('#p1').val();
 var p2 = $('#p2').val();
 var p3 = $('#p3').val();
 
 
            if(!p1 || !p2 || !p3 || p1 == p2 || p3 != p2){ 
              
     changenewpassword();
     return;
            
            }
            
            
    $('#p11').html('');
    $('#p22').html('');
    $('#p33').html('');
    $('#p44').html('');
            
 
 $('#form_load').html('Loading...');
    $.ajax({
    
    

                url: "<?= base_url() ?>profile/checkpassword",
                method: "POST",
                data: {username: name, old_password:p1,new_password:p2}
            }).done(function(rd){

              $('#form_load').html('');

                if(rd.msg === true){

                
                $('#form_pass').html(rd.des+'');
                setTimeout(function() {$('#form_error').html('');}, 3000);
              p1 = $('#p1').val('');
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














