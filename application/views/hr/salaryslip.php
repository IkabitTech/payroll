<header id="page-title"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- style="background-image:url('assets/images/demo/parallax_bg.jpg')" -->
        <!--
          Enable only if bright background image used
          <span class="overlay"></span>
        -->

        <div class="container">
          <h1>Payroll (<?= date('M Y', strtotime($this->Main->mycolumn1('payroll_rec','name','id',$payroll))) ?>)</h1>

          <ul class="breadcrumb">
<?php if($this->session->userdata('level') == 10){ ?>
                      <li><a href="#">Human Resource Manager</a></li>

        <?php }elseif($this->session->userdata('level') == 2){ ?>
                      <li><a href="#">Supervisor</a></li>

        <?php } ?>            <li><a href="#">Payroll</a></li>
            <li class="#">pay</li>
          </ul>
        </div>
      </header>            
                

 
<div class="container notprint">

  <span></span><a class="btn btn-default " onclick = "salary_slip_all(<?= $payroll ?>,<?= $companyindex ?>)" > SEND EMAIL TO ALL</a>
</div>






                            
<div class="" >

  <div id="table2" style="margin-left: 80px;margin-right: 80px" >
 <!-- MD 6 START FOR OVERTIME -->

 
<div class= " table-responsive" id='mytablelist'>
<h2 class="container"> EMPLOYEES <strong></strong></h2>
  <p class="lead" id="statusdeductionerror" style="color:red"></p>


<!-- Table start -->

<table class="table   table-hover table-striped table-bordered " style="width: 100%">
  <thead>
    <tr >
      <th scope="col">#</th>


     

    <?php $mydata = $this->Main->all2('payroll_columns','payroll',$payroll,'company', $this->session->userdata('companyarray')[$companyindex]['id']);

            if(!empty($mydata)){foreach ($mydata as $key => $value) {  ?>

      <th><?= $value['name_to_display'] ?>   
      </th>


        <?php }} ?>      
    </tr>
  </thead>
  <tbody class="" >
    
<?php 

$i = 0;
$this->db->where('payroll', $payroll);
$this->db->where('company', $this->session->userdata('companyarray')[$companyindex]['id']);
                $this->db->group_by('employee');
                 $all =   $this->db->get('payrollrecords');
                 $all = $all->result_array();
                 
                 $this->db->where('payroll', $payroll);
$this->db->where('company', $this->session->userdata('companyarray')[$companyindex]['id']);
                //$this->db->group_by('employee');
                 $all2 =   $this->db->get('payrollrecords');
                 $all2 = $all2->result_array();
                 
                 if(!empty($all2)){foreach ($all2 as $key => $a) {
                     
                     
                     $new[$a['employee']][$a['value_id']] = $a['value'];
                     
                 }}
                 
                  $mydata = $this->Main->all2('payroll_columns','payroll',$payroll,'company', $this->session->userdata('companyarray')[$companyindex]['id']);
                 
                 

if(!empty($all)){foreach ($all as $key => $a) {

$i++;

 ?>
    <tr>
      <td><?= $i ?></td>

    <?php

            if(!empty($mydata)){foreach ($mydata as $key => $value) {  ?>

      <td><?= isset($new[$a['employee']][$value['id']])?$new[$a['employee']][$value['id']]:'' ?>
          
         
 <?php if($value['name_excel'] == 'names'){ ?> </br>

<a style='margin-left:20px; margin :5px' class='badge badge-primary' href="#" onclick="salary_slip(<?= $a['employee'] ?>,<?= $payroll ?>,<?= $companyindex ?>)" >Send an Email to View Slip</a></br>

       <a  href="<?= base_url() ?>records/salary_slip/<?= $payroll ?>/<?= $a['employee'] ?>/<?= $companyindex ?>" class="badge badge-primary" style='background:#F07057; margin :5px' >View Slip and Print</a>

<?php } ?>

      </td>


        <?php }} ?> 

    </tr>

  <?php }} ?>
  </tbody>

</table>


<!-- Table ended -->

 </div> 

  <!-- OVERTIME TABLE END -->
<!--Controls-->
    
        <!--/.Controls-->

</div>


</div><!-- container end end -->

    <a id="bleft" href='#' class="left carousel-control" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '-=200px' }, 'slow');">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Left</span>
        </a>
        <a id="bright" href='#'   class="right carousel-control" href="#table2" role="button" onclick="event.preventDefault();$('#mytablelist').animate({scrollLeft: '+=200px' }, 'slow');">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Right</span>
        </a>

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









  <div class="modal fade" id="deletemyemployee" >
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead"> Are You Sure You want to Remove >) in the List!</p>

         <a    class="btn btn-danger btn-lg" onclick="removemyemployeefromlist(<?= $payroll ?>, )" >Yes</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>





  <div class="modal fade" id="deletemyemployeeall" >
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
       <p class="lead text-center"> Are You Sure You want to Remove All Entries In this Payroll!.</p>
       <p class="lead text-center">Remember that you will loose all Changes You made, We recommend to remove Specific Entry</p>

         <a    class="btn btn-danger btn-lg" onclick=' $("#loadedentry").html(" Loading...");$.get("<?= base_url() ?>actions/dli/<?= $payroll ?>",{},function(r){ $("#loadedentry").html("");location.reload();  });' >Yes Remove All</a>
          <a   class="btn btn-primary btn-lg" data-dismiss="modal"  >Not Now</a>
      </div>
    </div>
  </div>
</div>





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

 <input  readonly value="Click Insert Payroll Data" id='submitexcelwithdata' onclick="suid()" class="form-control btn btn-primary">
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->




<script type="text/javascript">
  
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












 function suid() {

            //Reference the FileUpload element.
            var fileUpload = $("#myexcel")[0];

            //Validate whether File is valid Excel file.
            var regex = /^([a-zA-Z0-9\s\()_\\.\-:])+(.xls|.xlsx)$/;
               savepayrollsettings();
            if (regex.test(fileUpload.value.toLowerCase())) {
                if (typeof (FileReader) != "undefined") {
                    var reader = new FileReader();

                    //For Browsers other than IE.
                    if (reader.readAsBinaryString) {
                        reader.onload = function (e) {
                            ProcessExcel(e.target.result);
                            console.log(100);
                        };
                        reader.readAsBinaryString(fileUpload.files[0]);
                    } else {
                        //For IE Browser.
                        reader.onload = function (e) {
                            var data = "";
                            var bytes = new Uint8Array(e.target.result);
                            for (var i = 0; i < bytes.byteLength; i++) {
                                data += String.fromCharCode(bytes[i]);
                            }
                            ProcessExcel(data);
                            console.log(2);

                            // console.log(data);
                            
                        };
                        reader.readAsArrayBuffer(fileUpload.files[0]);
                    }
                } else {
                    alert("This browser does not support HTML5.");
                }
            } else {
                alert("Please upload a valid Excel file.");
            }
        }
        function ProcessExcel(data) {
            //Read the Excel File data.
            var workbook = XLSX.read(data, {
                type: 'binary'
            });

            //Fetch the name of First Sheet.
            var firstSheet = workbook.SheetNames[0];

            //Read all rows from First Sheet into an JSON array.
            var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);

             savepayrollsettings();
            senddata4(excelRows);

          
        };


function senddata4(mydata){

var len2 = mydata.length;
// console.log(mydata.length)
var m = 0;
var  n= 0;
  mydata.forEach(function (mydata2) {
     
     console.log(mydata2);
            
    $.ajax({
url: "<?= base_url() ?>actions_new1/senddata10?co=<?=$this->session->userdata('companyarray')[$companyindex]['id']?>&payroll=<?= $payroll ?>",
method: "GET",
data: {data:mydata2},
}).done(function(rd){

console.log(rd.data);
  if(rd.msg){

    m++;
    n++;

console.log('m : '+ m);
console.log('n : '+ n);
 
  }else{
   n++;
  console.log('n : '+ n);

  }

  if(n == len2 ){

      console.log('wat3');


 $('#uploadExcel').modal('hide')
  $('#alerting').modal('show');
$('#alerting4').html((m)+ ' Employee Added');   
setTimeout(function() {$('#alerting').modal('hide');}, 2000); 
setTimeout(function() {window.location.reload();}, 2000); 


  }

}).fail(function(){

  console.log('wat');
 n++;
console.log('n : '+ n);
   if(n == len2 ){

 $('#uploadExcel').modal('hide')
  $('#alerting').modal('show');
$('#alerting4').html((m)+ ' Employee Added');   
setTimeout(function() {$('#alerting').modal('hide');}, 2000); 
setTimeout(function() {window.location.reload();}, 2000); 

  }

});


}); 


    
}







function savepayrollsettings(){


//$("#tableBf1234").load(location.href + "#tableBf1234");



$.ajax({
url: "<?= base_url() ?>actions_new1/savepayrollsettings",
method: "POST",
data: { payroll: <?= $payroll ?>, index:<?= $this->session->userdata('companyarray')[$companyindex]['id'] ?> }

}).done(function(rd){console.log(rd)}).fail(function(){console.log('amon')});


}







</script>