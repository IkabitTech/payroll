
<header id="page-title"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
				<!--
					Enable only if bright background image used
					<span class="overlay"></span>
				-->

				<div class="container">
					<h1>Settings</h1>

					<ul class="breadcrumb">
						<?php if($this->session->userdata('level') == 1){ ?>
                      <li><a href="#">Superadmin</a></li>

        <?php }elseif($this->session->userdata('level') == 10){ ?>

                      <li><a href="#">Human Resource Manager</a></li>

        <?php } ?>
						<li><a href="#">Payroll</a></li>
						<li class="#">Column Settings</li>
					</ul>
				</div>
			</header>     

			   <div class="container" >


			   	     <div class= "col-md-12" >
               
                 <h2>Excel Columns <strong>Settings</strong></h2>


         <a  class=" label label-primary " data-toggle="modal" href="#addcs" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px" onclick="nameschecker2();nameschecker1()">Add  New Column</a>
         <a  class=" label label-success " data-toggle='modal' href="#excelsheet" onclick='$( "#update_excel" ).load(window.location.href + " #update_excel")' >Download Excel of Active Registered Columns to Fill and Upload Payroll</a>


<div id="ourtable">
<table class="table  table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Report Title</th>
      <th scope="col">Excel Title</th>
      <th scope="col">Type</th>
      <th scope="col">Pay Slip Calculations</th>
      <th scope="col">Nature Calculation</th>
      <th scope="col">Status</th>
      <th scope="col"></th>

  </tr>
</thead>
<tbody>


                      	 <?php $mydata = $this->Main->all2('columns','deleted',0,'company', $this->session->userdata('companyarray')[$companyindex]['id'] );
 $i = 1;
                      	 if(!empty($mydata)){foreach ($mydata as $key => $value) {  ?>
	<tr>
		

		<td><?= $i ?></td>
		<td><?= $value['name_to_display'] ?></td>
		<td><?= $value['name_excel'] ?></td>
		<td><?= $this->Main->mycolumn1('types_columns','type','id',$value['type'] ) ?></td>
		<td><?php if($value['type'] == 3 && $value['is_calculated_in_slip'] == 0){echo '<b>No</b>';}elseif($value['type'] == 3 && $value['is_calculated_in_slip'] == 1){echo '<b>Yes</b>';}else{echo '-';} ?></td>
		<td><?php if($value['type'] == 3 && $value['is_calculated_in_slip'] == 1 && $value['is_deduct'] == 1){echo '<b>Deduct</b>';}elseif($value['type'] == 3 && $value['is_calculated_in_slip'] == 1 && $value['is_deduct'] == 0){echo '<b>Earn</b>';}else{echo '-';} ?></td>

		<td><?php if($value['is_active'] == 1){echo '<b style="color:green">Active</b>';}else{echo '<b style="color:red">Not Active</b>';} ?></td>


		<td>

<?php if($i > 5){ ?>
			<a href="#">
						<a  class=" label label-success " data-toggle="modal" href="#addcs2" onclick="$('#namereport2').val('<?= $value['name_to_display'] ?>');$('#nameexcel2').val('<?= $value['name_excel'] ?>');$('#typecal2').val('<?= $value['type'] ?>');$('#is_cal2').val('<?= $value['is_calculated_in_slip'] ?>');$('#is_deduct2').val('<?= $value['is_deduct'] ?>');$('#id2').val('<?= $value['id'] ?>');checkdeducts2()" >Edit Details</a>

			<a  class=" label label-warning " onclick="deactivatecol(<?= $value['id'] ?>)" data-toggle="modal" href="#" ><?php if($value['is_active'] == 1){echo 'Deactivate';}else{echo 'Activate';} ?></a>
						<a  class=" label label-danger " data-toggle="modal" href="#deletecol" onclick="$('#id3').val('<?= $value['id'] ?>');console.log($('#id3').val())" >Delete</a>   <?php  } ?>


		</a></td>
		


	</tr>   <?php  $i++;} }else{echo '<p class="lead"><strong>No Columns Set</strong></p>';}  ?>
</tbody>

          
</table></div>
         </div>




<!-- Modal Description viewp1 -->
<div class="modal fade " id="excelsheet" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12' id='update_excel'>
<a class="btn btn-success" onclick="exportToExcel($('.applydt').html())" style="margin: 20px"> DOWNLOAD EXCEL</a>
<table class="table  table-hover table-striped table-bordered applydt">
  <thead>
    <tr>

                      	 <?php $mydata = $this->Main->all3('columns','deleted',0,'company', $this->session->userdata('companyarray')[$companyindex]['id'] ,'is_active',1);

                      	 if(!empty($mydata)){foreach ($mydata as $key => $value) {  ?>

    	<td><?= $value['name_excel'] ?></td>  <?php }} ?>
    </tr>
</thead>
<tbody>
	
</tbody>
</table>



                                    </div>
                    </div>
             </div>

  </div>

</div>








<!-- Modal Description viewp1 -->
<div class="modal fade " id="addcs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12'>
            <p class="lead"> ADD COLUMN AVAILABLE IN YOUR CURRENT EXCEL SHEET</p>
            <p class="lead" id="eddcs_error" style="color:red"></p>

           
                                    <form>

             <p class="lead" ><span id="form_error" style="color:red"></span><span id="form_pass" style="color:green"></span><span id="form_load" style="color:blue"></span></p>


        <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-6">
                      <label>COLUMN NAME TO DISPLAY IN SYSTEM REPORT</label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Ex NSSF (Staff)" class="form-control cinput" id='namereport'onchange="nameschecker1()" onkeyup="nameschecker1()">
                      <p id="errorname1" style="color:red"></p>
                      
                    </div>

                     <div class="col-md-6">
                      <label>COLUMN TITLE TO DISPLAY IN EXCEL FILE TO UPOADED</label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Ex. Dont leave space  nssf_staff" class="form-control cinput" id='nameexcel'onchange="nameschecker2()" onkeyup="nameschecker2()">

                         <input   required value="<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>" class=" hidden" id='co'>


                      <p id="errorname2" style="color:red"></p>
                      
                    </div>

                  </div>


                <div class="form-group">
                    

                    <div class="col-md-6" id='val1'>
                      <label>DATA TYPE ON COLUMN</label><span style="color: red">*</span>
                      <select type="text"   required value="" class="form-control cinput" id='typecal'onchange="checkdeducts()">
                      	
                      	 <?php $mydata = $this->Main->all('types_columns');

                      	 if(!empty($mydata)){foreach ($mydata as $key => $value) { ?> <option value="<?=$value['id'] ?>"><?=$value['type'] ?></option> <?php }} ?>

                      </select>
                      <p id="p11" style="color:red"></p>
                      
                    </div>

                     <div class="col-md-6"  id='val2'>
                      <label>CALCULATED FROM SALARY SLIP</label><span style="color: red">*</span>
                      <select type="text"   required value="" placeholder="Ex " class="form-control cinput" id='is_cal'onchange="checkdeducts()">
                       <option value="1"> Calculated (Involve Employee Earning ,deduction and Contributions)</option> 
                       <option selected value="0"> Not Calculated (Involve Employer Contributions and other Records)</option> 

                      </select>
                      
                    </div>





                  </div>


                      
                <div class="form-group">
                    


                     <div class="col-md-6"  id='val3'>
                      <label>IS IT CALCULATED AS EARNING OR DEDUCTION</label><span style="color: red">*</span>
                      <select type="text"   required value="" placeholder="Ex " class="form-control cinput" id='is_deduct' >
                       <option value="0"> Earning </option> 
                       <option  value="1"> Deduction</option> 

                      </select>
                      
                    </div>




                  </div>




                <div class="form-group">
                    




                  <div class="form-group col-md-6" id='senddatabtncol'>
                    
                    <input  readonly value="submit" onclick="addnewcol()" class="form-control btn btn-primary">
                </div> 
                    

                  </div>





                </div>


                                    </form>

            
            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modal Default ends-->







<!-- Modal Description viewp1 -->
<div class="modal fade " id="addcs2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" >
                        <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                                    </button>
                                    <div class= 'col-md-12'>
            <p class="lead"> EDIT COLUMN AVAILABLE IN YOUR CURRENT EXCEL SHEET</p>
            <p class="lead" id="eddcs_error2" style="color:red"></p>

           
                                    <form>

             <p class="lead" ><span id="form_error2" style="color:red"></span><span id="form_pass2" style="color:green"></span><span id="form_load2" style="color:blue"></span></p>


        <div class="row">
                  <div class="form-group">
                    

                    <div class="col-md-6">
                      <label>COLUMN NAME TO DISPLAY IN SYSTEM REPORT</label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Ex NSSF (Staff)" class="form-control cinput" id='namereport2'onchange="nameschecker12()" onkeyup="nameschecker12()">
                      <p id="errorname12" style="color:red"></p>
                      
                    </div>

                     <div class="col-md-6">
                      <label>COLUMN TITLE TO DISPLAY IN EXCEL FILE TO UPOADED</label><span style="color: red">*</span>
                      <input type="text"   required value="" placeholder="Ex. Dont leave space  nssf_staff" class="form-control cinput" id='nameexcel2'onchange="nameschecker22()" onkeyup="nameschecker22()">

                         <input   required value="" class=" hidden" id='id2'>


                      <p id="errorname22" style="color:red"></p>
                      
                    </div>

                  </div>


                <div class="form-group">
                    

                    <div class="col-md-6" id='val12'>
                      <label>DATA TYPE ON COLUMN</label><span style="color: red">*</span>
                      <select type="text"   required value="" class="form-control cinput" id='typecal2'onchange="checkdeducts2()">
                      	
                      	 <?php $mydata = $this->Main->all('types_columns');

                      	 if(!empty($mydata)){foreach ($mydata as $key => $value) { ?> <option value="<?=$value['id'] ?>"><?=$value['type'] ?></option> <?php }} ?>

                      </select>
                      
                    </div>

                     <div class="col-md-6"  id='val22'>
                      <label>CALCULATED FROM SALARY SLIP</label><span style="color: red">*</span>
                      <select type="text"   required value="" class="form-control cinput" id='is_cal2'onchange="checkdeducts2()">
                       <option value="1"> Calculated (Involve Employee Earning ,deduction and Contributions)</option> 
                       <option  value="0"> Not Calculated (Involve Employer Contributions and other Records)</option> 

                      </select>
                      
                    </div>





                  </div>


                      
                <div class="form-group">
                    


                     <div class="col-md-6"  id='val32'>
                      <label>IS IT CALCULATED AS EARNING OR DEDUCTION</label><span style="color: red">*</span>
                      <select type="text"   required value=""  class="form-control cinput" id='is_deduct2' >
                       <option value="0"> Earning </option> 
                       <option  value="1"> Deduction</option> 

                      </select>
                      
                    </div>




                  </div>




                <div class="form-group">
                    




                  <div class="form-group col-md-6" id='senddatabtncol2'>
                    
                    <input  readonly value="submit" onclick="editcol()" class="form-control btn btn-primary">
                </div> 
                    

                  </div>





                </div>


                                    </form>

            
            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modal Default ends-->






  <div class="modal fade" id="deletecol" >
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead"> Are You Sure You want to Remove  This column!</p>
         <input   required  class=" hidden" id='id3'>


         <a    class="btn btn-danger btn-lg" onclick="deletecol();console.log($('#id3').val()+1)">Yes</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>








    <script type="text/javascript">
    	


function nameschecker1(){



    var name = $("#namereport").val();
    var co = $("#co").val();
              
            
             
    
     changeInnerHTML(['errorname1'],
        "");


      if(!name){

            !name ? changeInnerHTML('errorname1', "required") : "";
            $('#senddatabtncol').hide();

            return;
            
        }


        $.ajax({
url: "<?= base_url() ?>actions_new1/nameschecker1/",
method: "POST",
data: {name:name, co:co}
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){

console.log('done');

$('#errorname1').html('');
            $('#senddatabtncol').show();


}else{

 $('#errorname1').html('Name Exist Please Try another one');
             $('#senddatabtncol').hide();


 // alert(rd.msg);
}

}).fail(function(){

console.log('Fail');


});


 }


function nameschecker2(){



   

    var name = $("#nameexcel").val();

     name = name.replace(/\s\s+/g, ' ');

     name = name.replace(' ', '_');

     $("#nameexcel").val(name);





    var co = $("#co").val();
              
            
             
    
     changeInnerHTML(['errorname2'],
        "");


      if(!name){

            !name ? changeInnerHTML('errorname2', "required") : "";
                        $('#senddatabtncol').hide();


            return;
            
        }


        $.ajax({
url: "<?= base_url() ?>actions_new1/nameschecker2/",
method: "POST",
data: {name:name, co:co}
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){

console.log('done');

$('#errorname2').html('');
            $('#senddatabtncol').show();


}else{

 $('#errorname2').html('Name Exist Please Try another one');
             $('#senddatabtncol').hide();


 // alert(rd.msg);
}

}).fail(function(){

console.log('Fail');


});


 }





  function checkdeducts(){


    var a = $("#typecal").val();
    var b = $("#is_cal").val();
    var c = $("#is_deduct").val();

    if(a == 3 && b==1){

    $("#val2").show();
    $("#val3").show();


    }
    else if(a == 3 && b==0){

    	    $("#val2").show();
    	        $("#val3").hide();




    }else{

 $("#val2").hide();
  $("#val3").hide();

    }




  }



//amon




function nameschecker12(){



    var name = $("#namereport2").val();
    var id = $("#id2").val();
              
            
             
    
     changeInnerHTML(['errorname12'],
        "");


      if(!name){

            !name ? changeInnerHTML('errorname12', "required") : "";
            $('#senddatabtncol2').hide();

            return;
            
        }


        $.ajax({
url: "<?= base_url() ?>actions_new1/nameschecker12/",
method: "POST",
data: {name:name, id:id}
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){

console.log('done');

$('#errorname12').html('');
            $('#senddatabtncol2').show();


}else{

 $('#errorname12').html('Name Exist Please Try another one');
             $('#senddatabtncol2').hide();


 // alert(rd.msg);
}

}).fail(function(){

console.log('Fail');


});


 }


function nameschecker22(){



   

    var name = $("#nameexcel2").val();

     name = name.replace(/\s\s+/g, ' ');

     name = name.replace(' ', '_');

     $("#nameexcel2").val(name);





    var id = $("#id2").val();
              
            
             
    
     changeInnerHTML(['errorname22'],
        "");


      if(!name){

            !name ? changeInnerHTML('errorname22', "required") : "";
                        $('#senddatabtncol2').hide();


            return;
            
        }


        $.ajax({
url: "<?= base_url() ?>actions_new1/nameschecker22/",
method: "POST",
data: {name:name, id:id}
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){

console.log('done');

$('#errorname22').html('');
            $('#senddatabtncol2').show();


}else{

 $('#errorname22').html('Name Exist Please Try another one');
             $('#senddatabtncol2').hide();


 // alert(rd.msg);
}

}).fail(function(){

console.log('Fail');


});


 }





  function checkdeducts2(){


    var a = $("#typecal2").val();
    var b = $("#is_cal2").val();
    var c = $("#is_deduct2").val();

    if(a == 3 && b==1){

    $("#val22").show();
    $("#val32").show();


    }
    else if(a == 3 && b==0){

    	    $("#val22").show();
    	        $("#val32").hide();




    }else{

 $("#val22").hide();
  $("#val32").hide();

    }




  }







//smon

















function addnewcol(){

    $('#form_load').html('');
    $('#form_pass').html('');
    $('#form_error').html('');

     
 var name1 = $('#namereport').val();
 var name2 = $('#nameexcel').val();
 var type = $('#typecal').val();
 var slip = $('#is_cal').val();
 var deduct = $('#is_deduct').val();
 var co = $('#co').val();
 
 
            if(!name1 || !name2 || !type){ 
              
     
     nameschecker2();
     nameschecker1();
     return;
            
            }
            
            
    $('#errorname1').html('');
    $('#errorname2').html('');

            
 
 $('#form_load').html('Loading...');
    $.ajax({
    
    

                url: "<?= base_url() ?>actions_new1/addnewcol",
                method: "POST",
                data: {name1:name1,name2:name2,type:type,slip:slip,deduct:deduct,co:co}
            }).done(function(rd){

              $('#form_load').html('');

                if(rd.msg === true){

                
                $('#form_pass').html(rd.des+'');
                setTimeout(function() {$('#form_error').html('');}, 3000);
              p1 = $('#namereport').val('');
              p2 = $('#nameexcel').val('');
               $( "#ourtable" ).load(window.location.href + " #ourtable");

                    
                }else{
                
                $('#form_error').html(rd.des+'');
                setTimeout(function() {$('#form_error').html('');}, 3000);

                 
                }
                
            }).fail(function(){
            
             $('#form_load').html('');
             
                 $('#form_error').html('Network Error, please try Again Later');

            });
           
    

        }










function editcol(){

    $('#form_load2').html('');
    $('#form_pass2').html('');
    $('#form_error2').html('');

     
 var name1 = $('#namereport2').val();
 var name2 = $('#nameexcel2').val();
 var type = $('#typecal2').val();
 var slip = $('#is_cal2').val();
 var deduct = $('#is_deduct2').val();
 var id = $('#id2').val();
 
 
            if(!name1 || !name2 || !type){ 
              
     
     nameschecker22();
     nameschecker12();
     return;
            
            }
            
            
    $('#errorname12').html('');
    $('#errorname22').html('');

            
 
 $('#form_load2').html('Loading...');
    $.ajax({
    
    

                url: "<?= base_url() ?>actions_new1/editcol",
                method: "POST",
                data: {name1:name1,name2:name2,type:type,slip:slip,deduct:deduct,id:id}
            }).done(function(rd){

              $('#form_load2').html('');

                if(rd.msg === true){

                
                $('#form_pass2').html(rd.des+'');
                setTimeout(function() {$('#form_error').html('');}, 3000);
              p1 = $('#namereport2').val('');
              p2 = $('#nameexcel2').val('');
               $( "#ourtable" ).load(window.location.href + " #ourtable");

                    
                }else{
                
                $('#form_error2').html(rd.des+'');
                setTimeout(function() {$('#form_error2').html('');}, 3000);

                 
                }
                
            }).fail(function(){
            
             $('#form_load2').html('');
             
                 $('#form_error2').html('Network Error, please try Again Later');

            });
           
    

        }








function deactivatecol(id){

  
     
    $.ajax({
    
    

                url: "<?= base_url() ?>actions_new1/activatecol",
                method: "POST",
                data: {id:id}
            }).done(function(rd){

          $( "#ourtable" ).load(window.location.href + " #ourtable");

                
            }).fail(function(){
            
             

            });
           
    

        }




function deletecol(){

  var id = $('#id3').val();
     
    $.ajax({
    
    

                url: "<?= base_url() ?>actions_new1/deletecol",
                method: "POST",
                data: {id:id}
            }).done(function(rd){

          $( "#ourtable" ).load(window.location.href + " #ourtable");

                
            }).fail(function(){
            
             

            });
           
    

        }




function exportToExcel(data){
var htmls = "";
            var uri = 'data:application/vnd.ms-excel;base64,';
            var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>'+data+'</table></body></html>'; 
            var base64 = function(s) {
                return window.btoa(unescape(encodeURIComponent(s)))
            };

            var format = function(s, c) {
                return s.replace(/{(\w+)}/g, function(m, p) {
                    return c[p];
                })
            };

            htmls = "SAMPLE SHEET"

            var ctx = {
                worksheet : 'Worksheet',
                table : htmls
            }


            var link = document.createElement("a");
            link.download = "payroll_upload_sample_sheet.xls";
            link.href = uri + base64(format(template, ctx));
            link.click();
}



    </script>