<!DOCTYPE html>
<!--[if IE 8]>      <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>      <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?= $pageTitle ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="Author" content="" />
<?php $compname = $this->session->userdata('companyarray')[$companyindex]['name']; ?>

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

<!-- WEB FONTS -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" type="text/css" />

<!-- CORE CSS -->
<!-- <link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 
 --><link href="<?= base_url() ?>assets/main/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/animate.css" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/essentials.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/main/css/layout.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" /><!-- orange: default style -->


<!-- CHATTINGSCRIPTS -->
    <link href="<?= base_url() ?>assets/chat/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/chat/chat/css/style.css" rel="stylesheet" type="text/css" />


<!-- Morenizr -->
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/modernizr.min.js"></script>



<!-- DATE PICKER -->


<link href="http://nikuze.com/src/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />

<!-- orange: default style -->



<!-- DATE PICKER END -->
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>assets/datepicker/monthyear/MonthPicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/datepicker/monthyear/stylesheets/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/datepicker/monthyear/examples.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">



<!-- MONTH PICKER -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


</head>
<body class="printable"><!-- Available classes for body: boxed , pattern1...pattern10 . Background Image - example add: data-background="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/images/boxed_background/1.jpg"  -->

<!-- Top Bar -->
<header id="topHead">
<div class="container">

<!-- PHONE/EMAIL -->
<span class="quick-contact pull-left" onclick="test()">
<i class="fa fa-phone"></i> +2557 686 36 363 &bull; 
<a class="hidden-xs" href="mailto:mail@yourdomain.com">support@vipaji.co.tz</a>
</span>
<!-- /PHONE/EMAIL -->




<!-- SIGN IN -->
<div class="pull-right nav signin-dd">
<a id="quick_sign_in" href="page-signin.html" data-toggle="dropdown"><i class="fa fa-users"></i><span class="hidden-xs"> Log Out</span></a>
<div class="dropdown-menu" role="menu" aria-labelledby="quick_sign_in">

<h4>Are You Sure you want to log Out</h4>
<form action="<?= base_url() ?>logout" method="post" role="form">


<!-- submit button -->
<span class="input-group-btn">
<button class="btn btn-primary" onclick="" >  LOG OUT</button>
</span>



</form>


</div>
</div>
<!-- /SIGN IN -->

<!-- CART MOBILE BUTTON -->
<a class="pull-right" id="btn-mobile-quick-cart" ><i class="fa fa-commenting"></i></a>
<!-- CART MOBILE BUTTON -->

<!-- LINKS -->
<!-- <div class="pull-right nav hidden-xs">
<a href="page-about-us.html"><i class="fa fa-angle-right"></i> About</a>
<a href="contact-us.html"><i class="fa fa-angle-right"></i> Contact</a>
</div> -->
<!-- /LINKS -->

</div>
</header>
<!-- /Top Bar -->

<!-- TOP NAV -->
<header id="topNav" class="topHead" ><!-- remove class="topHead" if no topHead used! -->
<div class="container">

<!-- Mobile Menu Button -->
<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
<i class="fa fa-bars"></i>
</button>

<!-- Logo text or image -->
<a class="logo" href="<?= base_url() ?>">
<img src="<?= base_url() ?>assets/images/company_logo/<?= $this->session->userdata('companyarray')[$companyindex]['logo'] ?>" onerror="this.onerror=null;this.src='<?= base_url() ?>assets/images/logo.png';" style="height:50px"/>
</a>

<!-- Top Nav -->
<div class="navbar-collapse nav-main-collapse collapse pull-right">
<nav class="nav-main mega-menu">
<ul class="nav nav-pills nav-main scroll-menu" id="topMain">
<li class="<?php if($menuactive == 'dashboard'){echo 'active';} ?> ">
<a class="dropdown-toggle" href="<?= base_url() ?>dashboard/<?=$companyindex?>" >
<b>Dashboard</b> 
</a>

</li>
<li class="dropdown mega-menu-item <?php if($menuactive == 'payroll'){echo 'active';} ?>">
<a class="dropdown-toggle  " href="#">
<b>Payroll</b> <i class="fa fa-angle-down"></i>
</a>

<ul class="dropdown-menu">
<li class=""><a href="<?= base_url() ?>payroll/<?=$companyindex?>">Payments</a>

</li>
<li class=""><a href="<?= base_url() ?>records/<?=$companyindex?>">Payroll Records</a>
</li>

<li class=""><a href="<?= base_url() ?>payroll/settings/<?=$companyindex?>">Settings</a>
<!-- <ul class="dropdown-menu">
<li><a href="#">Salaries</a></li>
<li><a href="#">Deductions</a></li>

</ul> -->
</li>
</ul>

</li>


<li class="dropdown ">
<a class="dropdown-toggle  <?php if($menuactive == 'employee'){echo 'active';} ?>" href="#">
Employee <i class="fa fa-angle-down"></i>
</a>

<ul class="dropdown-menu">
<li class=""><a href="<?= base_url() ?>employee/add/<?=$companyindex?>">Add New Employee ( <?= $compname ?> )</a></li>
<li class=""><a href="<?= base_url() ?>employee/<?=$companyindex?>">Manage Employee  ( <?= $compname ?> )</a></li>

</ul>

</li>

<li class="dropdown  <?php if($menuactive == 'loans'){echo 'active';} ?>">
<a class="dropdown-toggle " href="#"><b>
Loans<i class="fa fa-angle-down"></i></b>
</a>


<ul class="dropdown-menu">
  <li class=""><a href="<?= base_url() ?>loans/<?=$companyindex?>">Loans</a></li>

<li class=""><a href="<?= base_url() ?>loans/addloan/<?=$companyindex?>">Add Loan</a></li>



</ul>

</li>

<li class=" <?php if($menuactive == 'profile'){echo 'active';} ?>">
<a class="dropdown-toggle" href="<?= base_url() ?>profile/info">
My Profile 
</a>
</li>


<li><a id="k3" onclick="changec()" class=" label label-primary scrollTo" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px"><?= $this->session->userdata('companyarray')[$companyindex]['name'] ?></a></li>
<!-- GLOBAL SEARCH -->
<!-- <li class="search"> -->

<!-- search form -->
<!-- <form method="get" action="#" class="input-group pull-right">
<input type="text" class="form-control" name="k" id="k"  onclick="changec()" value="" placeholder="Company">
<input type="text" class="form-control hidden" name="k2" id="k2" disabled  value="" >
<span class="input-group-btn">
<button class="btn btn-primary notransition"><i class="fa fa-search"></i></button>
</span>



</form> -->
<!-- /search form -->
<!-- </li> -->
<!-- /GLOBAL SEARCH -->


<!-- inbox start-->
<li class="quick-cart" id='dm'>




<input class="hidden" value="<?= $this->session->userdata('userid') ?>" id='me_id'>
<input class="hidden" value="1" id='you_id'>
<input class="hidden" value='<?= $this->session->userdata('level') ?>' id='me_st'>
<input class="hidden" value='1' id='you_st'>
<input class="hidden" value='Super Admin' id='ynames'>
<input class="hidden" value='' id='ytitle'>


<span class="badge pull-right">3</span>

<div class="quick-cart-content" style="max-height: 300px; overflow-y: scroll; overflow-x: hidden;" >

  <form method="get" action="#" class="input-group " style="margin-bottom:0px; width:100%; ">
<input style="height: 10px;border-radius: 10px" type="text" class="form-control" name="kus" id="kus"  onchange="filterchatlist()" onkeyup="filterchatlist()" value="" placeholder="Filter Users">
</form>

<?php 
$go = $this->Main->chattinlist($this->session->userdata('userid'),$this->session->userdata('level'));
$go2 = $this->Main->userlist($this->session->userdata('userid'),$this->session->userdata('level'));

      
      
 ?>
<!-- <p><i class="fa fa-warning"></i> You have 3 notifications</p>
 -->


<?php if(!empty($go)){foreach ($go as $value) { ?>

<a class="item"     

onclick="
$('#you_id').val(<?= $value['you_id'] ?>);
$('#you_st').val(<?= $value['you_status'] ?>);
$('#ynames').val('<?= $value['you_names'] ?>');
$('#ytitle').val('<?= $value['working'] ?>');

if($( '.prime' ).hasClass('fa-comments-o')){$('.prime').removeClass('fa-comments-o')}
  $('.prime').addClass('fa-times');
  $('.prime').addClass('is-active');
  $('.prime').addClass('is-visible');
  $('#prime').addClass('is-float');
  $('.chat').addClass('is-visible');
  $('.fab').addClass('is-visible');
  readSMS1();
" 




><!-- item 1 -->
<div class="inline-block" style="padding-left: 30px">
<span class="title"> <b><?= $value['you_names'] ?></b></span>
<span class="price"><?php if(strlen($value['msg']) > 30 ){echo substr($value['msg'], 0,30).'... ';} ?> <?=  $value['time'] ?></span>
</div>
</a><!-- /item 1 -->


<?php    }}   ?>

 
<hr style="margin:0px">
<?php $i = 1; if(!empty($go2)){foreach ($go2 as $value) { ?>
<?php if($i == 1){  ?><a  class=" label label-primary" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px" > <?= count($go2) ?> Contact(s) </a> <?php }  ?>
<a class="item"  style="background: white"   

onclick="
$('#you_id').val(<?= $value['id'] ?>);
$('#you_st').val(<?= $value['level'] ?>);
$('#ynames').val('<?= $value['names']?>  <?= $value['username'] ?>');
$('#ytitle').val('<?= $value['working'] ?>');
if($( '.prime' ).hasClass('fa-comments-o')){$('.prime').removeClass('fa-comments-o')}
  $('.prime').addClass('fa-times');
  $('.prime').addClass('zmdi-close');
  $('.prime').addClass('is-active');
  $('.prime').addClass('is-visible');
  $('#prime').addClass('is-float');
  $('.chat').addClass('is-visible');
  $('.fab').addClass('is-visible');
  readSMS1();
" 



><!-- item 1 -->
<div class="inline-block" style="padding-left: 30px">
<span class="title"> <b><?= $value['names'].'  <b style="color:red">' .$value['username'].'</b>' ?></b></span>
<span class="price"><?= $value['working']  ?></span>
</div>
</a><!-- /item 1 -->


<?php  $i++;  }}   ?>



<!-- QUICK CART BUTTONS -->
<div class="row cart-footer">
<div class="col-md-6 nopadding-right">

</div>

</div>


</div>

</li>
<!-- Inbox end -->


</ul>
</nav>
</div>
<!-- /Top Nav -->

</div>
</header>

<span id="header_shadow"></span>
<!-- /TOP NAV -->


<div id="wrapper">

<?= isset($view) ? $view : "" ?>
<?php $this->load->view('common/chat.php');   ?>

</div>








<!-- Modal Description viewp1 -->
<div class="modal fade " id="viewcomp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
<i class="fa fa-close"></i>
</button>
<div class= 'col-md-12'>
<form method="get" action="#" class="input-group " style="margin-bottom:20px; width:80%">
<input type="text" class="form-control" name="k4" id="k4"  onchange="filterc()" onkeyup="filterc()" value="" placeholder="Filter Companies">
</form></div>

<div class="container-fluid filterc modal-item">

<?php $i = 0;
foreach( $this->session->userdata('companyarray') AS  $Comp){ ?>


<a class="btn btn-default " href="<?= base_url().$mypage.''.$i ?>"><?= $Comp['name'] ?></a>

<?php $i++; } ?>
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->





<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery-2.2.3.min.js"></script>
<!-- <script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.easing.1.3.js"></script>
 --><script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.appear.js"></script>

<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/main/js/index.js"></script>



 <!-- <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script>

     

  <script type="text/javascript" src="http://nikuze.com/src/jquery.datetimepicker.full.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>

 <script src="<?= base_url() ?>assets/chat/chat/js/index.js"></script>








<script>
var totalNewRs5 = jQuery("div.rs5>div").length;
jQuery("#rs5count").html(totalNewRs5);

function changec(){

$('#viewcomp').modal('show');
$('#k4').val(null);
$('.filterc > a').show();
}








function payedinbank(){

var bank = $('#bank').val();

if(bank =='bank'){

        $('#payedinbank').show();

}else{

        $('#payedinbank').hide();


}


}




function payedinbank2(id){

var bank = $('#bank'+id).val();

if(bank =='bank'){

        $('#payedinbank'+id).show();

}else{

        $('#payedinbank'+id).hide();


}


}




function filterc(){



var valThis = $('#k4').val().toLowerCase();
if(valThis == ""){
$('.filterc > a').show();
} else {
$('.filterc > a').each(function(){
var text = $(this).text().toLowerCase();
(text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
});
};


}





function filtere(){



var valThis = $('#searchvalue').val().toLowerCase();
if(valThis == ""){
$('.filtere > button').show();
} else {
$('.filtere > button').each(function(){
var text = $(this).text().toLowerCase();
(text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
});
};


}








function filterchatlist(){



var valThis = $('#kus').val().toLowerCase();
if(valThis == ""){
$('.quick-cart-content > .item').show();
} else {
$('.quick-cart-content > .item').each(function(){
var text = $(this).text().toLowerCase();
(text.indexOf(valThis) >= 0) ? $(this).show() : $(this).hide();
});
};


}











function openemployee(){

        $('#searchemployee').modal('show');
        // console.log('clicked');

}






function loanstylechangevalue(){

       var value =  $('#loanpayingstyle').val();
          // $( "#loanstylevalue" ).html(value);
          var value2 = '';
          var value3 = '';

          if(value == 1){

           value2 = '<label>PERIOD MONTHS</label><span style="color: red">*</span><input type="number" min="0"  required value="" placeholder="Select period of Moths ex 13" class="form-control" onchange="$('+"$('#stylev2').val($('#return').val()/$('#stylev1').val())"+')" id="stylev1"><p id="errorstylev1" style="color:red"></p>';

           


            value3 = '<label>AMOUNT TO BE INSTALLED EACH MONTH</label><input type="text" disabled  required value="" placeholder="Amount" class="form-control " id="stylev2">';

          }else if(value == 2){


   
           value2 = '<label>PERCENT OF BASIC</label><span style="color: red">*</span><input type="number" step="0.01" min="0" max="100"  required value="" placeholder="Percentage of Basic" class="form-control" id="stylev1"><p id="errorstylev1" style="color:red"></p>';


            value3 = '<input class="form-control hidden" id="stylev2" >';

          }else if(value == 3){


   
           value2 = '<input class="form-control hidden" id="stylev1" >';


            value3 = '<input class="form-control hidden" id="stylev2" >';

          }else if(value == 4){


   
           value2 = '<input class="form-control hidden" id="stylev1" >';


            value3 = '<label>AMOUNT TO BE INSTALLED EACH MONTH</label><span style="color: red">*</span><input type="number" step="0.01"  required value="" placeholder="Add Constant Amount" class="form-control" id="sylev2"><p id="errorstylev2" style="color:red"></p';
          }else if(value == 5){


   
           value2 = '<label>PERCENT OF GROSS</label><span style="color: red">*</span><input type="number" step="0.01" min="0" max="100"  required value="" placeholder="Percentage of Gross" class="form-control" id="stylev1"><p id="errorstylev1" style="color:red"></p>';


            value3 = '<input class="form-control hidden" id="stylev2" >';

          }

            $( "#loanstylevalue" ).html(value2);
              $( "#loanstylevalue2" ).html(value3);


        console.log(value);


}





function loanstylechangevalue2(id,pm,pb,fa){

       var value =  $('#loanpayingstyle'+id).val();
          // $( "#loanstylevalue" ).html(value);
          var value2 = '';
          var value3 = '';

          if(value == 1){

           value2 = '<label>PERIOD MONTHS</label><span style="color: red">*</span><input type="number" min="0"  required value="'+pm+'" placeholder="Select period of Moths ex 13" class="form-control" onchange="$('+"'#stylev2_"+id+"').val($('#return"+id+"'"+').val()/$('+"'#stylev1_"+id+"').val())"+'"'+ ' id="stylev1_'+id+'"><p id="errorstylev1_'+id+'" style="color:red"></p>';


            value3 = '<label>AMOUNT TO BE INSTALLED EACH MONTH</label><input type="text" disabled  required value="" placeholder="Amount" class="form-control " id="stylev2_'+id+'">';
          }else if(value == 2){


   
           value2 = '<label>PERCENT OF BASIC</label><span style="color: red">*</span><input type="number" step="0.01" min="0" max="100"  required value="'+pb+'" placeholder="Percentage of Basic" class="form-control" id="stylev1_'+id+'"><p id="errorstylev1_'+id+'" style="color:red"></p>';


            value3 = '<input class="form-control hidden" id="stylev2_'+id+'" >';

          }else if(value == 3){


   
           value2 = '<input class="form-control hidden" id="stylev1_'+id+'" >';


            value3 = '<input class="form-control hidden" id="stylev2_'+id+'" >';

          }else if(value == 4){


   
           value2 = '<input class="form-control hidden" id="stylev1_'+id+'" >';


            value3 = '<label>AMOUNT TO BE INSTALLED EACH MONTH</label><span style="color: red">*</span><input type="number" step="0.01"  required value="'+fa+'" placeholder="Add Constant Amount" class="form-control" id="sylev2_'+id+'"><p id="errorstylev2_'+id+'" style="color:red"></p';
          }else if(value == 5){


   
           value2 = '<label>PERCENT OF GROSS</label><span style="color: red">*</span><input type="number" step="0.01" min="0" max="100"  required value="'+pb+'" placeholder="Percentage of Gross" class="form-control" id="stylev1_'+id+'"><p id="errorstylev1_'+id+'" style="color:red"></p>';


            value3 = '<input class="form-control hidden" id="stylev2_'+id+'" >';

          }

            $( "#loanstylevalue_"+id ).html(value2);
              $( "#loanstylevalue2_"+id ).html(value3);


        console.log(value);


}



</script>

<script>


$( document ).ready(function() {
// console.log( "ready!" );
 setInterval(function() { readSMS2(); }, 5000);
$('#load2').hide();

$('.percentclass').show();
  $('.fixedclass').hide();

    $( "#startingdate" ).datetimepicker({

        timepicker:false,
        defaultTime:false,
        format:'Y-m-d'
     
    });


     $( "#enddate" ).datetimepicker({

        timepicker:false,
        defaultTime:false,
        format:'Y-m-d',
        minDate:0,
    });

 $( ".dpicker" ).datetimepicker({

        timepicker:false,
        defaultTime:false,
        format:'Y-m-d'
    });

     $('#payedinbank').hide();

       $('#confirmed').DataTable({
      responsive: true,

        dom: 'Bfpltpil',
        buttons: [
            'print', 'csv', 'excel', 'copy',
               {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'A2',
             download: 'open',

            customize: function (doc) {
                var tblBody = doc.content[1].table.body;
                doc.content[1].layout = {
                hLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.body.length) ? 2 : 1;},
                vLineWidth: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 2 : 1;},
                hLineColor: function(i, node) {
                    return (i === 0 || i === node.table.body.length) ? 'black' : 'gray';},
                vLineColor: function(i, node) {
                    return (i === 0 || i === node.table.widths.length) ? 'black' : 'gray';}
                };



                 doc['footer']=(function(page, pages) {
            return {
                columns: [
                    '<?= $pageTitle ?>',
                    {
                        // This is the right column
                        alignment: 'right',
                        text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    }
                ],
                margin: [10, 0]
            }
        });

               
                $('#confirmed').find('tr').each(function (ix, row) {
                    var index = ix;
                    var rowElt = row;
                    $(row).find('td').each(function (ind, elt) {
                        tblBody[index][ind].border
                        if (tblBody[index][1].text == '' && tblBody[index][2].text == '') {
                            delete tblBody[index][ind].style;
                            tblBody[index][ind].fillColor = '#FFF9C4';
                        }
                        else
                        {
                            if (tblBody[index][2].text == '') {
                                delete tblBody[index][ind].style;
                                tblBody[index][ind].fillColor = '#FFFDE7';
                            }
                        }
                    });
                });
            }
        }
        ]
    } );


});
</script>
<script>


  function percentfixed2(a){

var b = $('#caltype'+a).val();

console.log(b);

 if(b==='fixed'){
  $('.percentclass'+a).hide();
  $('.fixedclass'+a).show();
}else{
  $('.percentclass'+a).show();
  $('.fixedclass'+a).hide();
}

  }




  function percentfixed(){

var a = $('#caltype').val();

console.log(a);

 if(a==='fixed'){
  $('.percentclass').hide();
  $('.fixedclass').show();
}else{
  $('.percentclass').show();
  $('.fixedclass').hide();
}

  }

function addBf4(){

$('#load2').show();


var name = $('#name').val();
var per  = $('#p').val();
var eper = $('#ep').val();
var  rper= $('#rp').val();
var  min= $('#min').val();
var tp = $('#tp').val();
var co = $('#co').val();
var amount = $('#amount').val();
var caltype = $('#caltype').val();
var calcfrom  = $('#calcfrom').val();



$.ajax({
url: "<?= base_url() ?>actions/addBeneficialFund",
method: "POST",
data: {name: name, percent:per,epercent:eper,rpercent:rper,min:min,topup:tp,co:co,caltype:caltype,amount:amount, calcfrom:calcfrom}
}).done(function(rd){

console.log(rd.des);
//  var newp = JSON.parse(rd); 

$('#load2').hide();

//console.log(newp);

if(rd.msg === true){

console.log('done');
$('#addBf').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 3000);

// $('#addbferror').html(rd.des+"");

setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 500);

setTimeout(function() { $( "#table2" ).load(window.location.href + " #table2" );
}, 500);
setTimeout(function() { $( "#addBfbody" ).load(window.location.href + " #addBfbody" );
}, 500);





}else{

$('#addbferror').html(rd.des+"");
$('#load2').hide();

}

}).fail(function(){

$('#addbferror').html('Some Error Occured Contact Support team and Try again Later');
$('#load2').hide();

});


}

 <?php  if(!empty($bfs)){

  foreach( $bfs AS  $bf){ ?>

function editBf<?= $bf['id'] ?>(){


//$("#tableBf1234").load(location.href + "#tableBf1234");


var per  = $('#p<?= $bf['id'] ?>').val();
var calcfrom  = $('#calcfrom<?= $bf['id'] ?>').val();
var eper = $('#ep<?= $bf['id'] ?>').val();
var  rper= $('#rp<?= $bf['id'] ?>').val();
var  min= $('#min<?= $bf['id'] ?>').val();
var tp = $('#tp<?= $bf['id'] ?>').val();
var id = $('#id<?= $bf['id'] ?>').val();
var amount = $('#amount<?= $bf['id'] ?>').val();
var caltype = $('#caltype<?= $bf['id'] ?>').val();

$.ajax({
url: "<?= base_url() ?>actions/editBeneficialFund",
method: "POST",
data: { percent:per,epercent:eper,rpercent:rper,min:min,topup:tp,id:id,caltype:caltype,amount:amount,calcfrom:calcfrom}
}).done(function(rd){

console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);


if(rd.msg === true){


console.log('done');

$('#editBf<?= $bf['id'] ?>').modal('hide');


$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);
// $('#editbferror<?= $bf['id'] ?>').html(rd.des+"");
setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 500);


setTimeout(function() { $( "#table2" ).load(window.location.href + " #table2" );
}, 500);

setTimeout(function() { $( "#addBfbody" ).load(window.location.href + " #addBfbody" );
}, 500);

$('#load2').hide();





}else{

$('#editbferror<?= $bf['id'] ?>').html(rd.des+"");
$('#load2').hide();
}

}).fail(function(){

$('#editbferror<?= $bf['id'] ?>').html('Some Error Occured Contact Support team and Try again Later');
$('#load2').hide();
});





}



function deleteBf<?= $bf['id'] ?>(){


//$("#tableBf1234").load(location.href + "#tableBf1234");



$.ajax({
url: "<?= base_url() ?>actions/deleteBeneficialFund",
method: "POST",
data: { id:<?= $bf['id'] ?>}
}).done(function(rd){

console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#deleteBf<?= $bf['id'] ?>').modal('hide');


$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);


setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 2000);


setTimeout(function() { $( "#table2" ).load(window.location.href + " #table2" );
}, 500);
setTimeout(function() { $( "#addBfbody" ).load(window.location.href + " #addBfbody" );
}, 2000);
$('#load2').hide();




}else{

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);
$('#load2').hide();

}

}).fail(function(){

$('#alerting2').modal('show');
$('#alerting5').html('Some Error Occured Contact Support team and Try again Later');
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);

$('#load2').hide();


});





}


<?php }} ?>



 function DaysCal(id){


var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>;
 console.log(co+"  "+ id);  

$.ajax({
url: "<?= base_url() ?>actions/dayscal/",
method: "POST",
data: {id:id,co:co}
}).done(function(rd){



console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#dayscal').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);
setTimeout(function() { $( "#container5" ).load(window.location.href + " #container5" );
}, 2000);



}else{

// $('#alerting2').modal('show');
// $('#alerting5').html(rd.des);
// setTimeout(function() {$('#alerting2').modal('hide');}, 2000);

$('#dayserror1').html(rd.des+"");


}

}).fail(function(){

// $('#alerting2').modal('show');
// $('#alerting5').html('Some Error Occured Contact Support team and Try again Later');
// setTimeout(function() {$('#alerting2').modal('hide');}, 2000);
$('#dayserror1').html("Some Error Occured Contact Support team and Try again Later");


});


 }




 function DaysVal(){

days = $('#numdays').val();


var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>;

$.ajax({
url: "<?= base_url() ?>actions/daysval/",
method: "POST",
data: {days: days,co:co}
}).done(function(rd){

console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#daysval').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);

setTimeout(function() { $( "#container5" ).load(window.location.href + " #container5" );
}, 2000);



}else{

// $('#alerting2').modal('show');
// $('#alerting5').html(rd.des);
// setTimeout(function() {$('#alerting2').modal('hide');}, 2000);
$('#dayserror2').html(rd.des+"");


}

}).fail(function(){

///$('#alerting2').modal('show');
// $('#dayserror2').html('Some Error Occured Contact Support team and Try again Later');
// setTimeout(function() {$('#alerting2').modal('hide');}, 2000);

$('#dayserror2').html("Some Error Occured Contact Support team and Try again Later");

});


 }




  function Bonus(){




var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>;

$.ajax({
url: "<?= base_url() ?>actions/bonus/",
method: "POST",
data: {co:co}
}).done(function(rd){

console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');


$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 1000);
setTimeout(function() { $( "#container3" ).load(window.location.href + " #container3" );
}, 2000);

}else{

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);


}

}).fail(function(){

$('#alerting2').modal('show');
$('#dayserror2').html('Some Error Occured Contact Support team and Try again Later');
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);


});


 }



   function BonusName(){




var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>;
var val = $('#bname').val();

$.ajax({
url: "<?= base_url() ?>actions/bonusname/",
method: "POST",
data: {co:co,name:val}
}).done(function(rd){

console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#bonusname').modal('hide');

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 1000);
setTimeout(function() {location.reload();}, 1000);


}else{
$('#bonuserror').html(rd.des+"");



}

}).fail(function(){

$('#bonuserror').html("Some Error Occured Contact Support team and Try again Later");



});


 }





 function NightOvertime(id){


var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>;

$.ajax({
url: "<?= base_url() ?>actions/nightovertime/",
method: "POST",
data: {id:id,co:co}
}).done(function(rd){



console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#dayscal').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
setTimeout(function() { $( "#container2" ).load(window.location.href + " #container2" );
}, 2000);



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




 function Allowance(action , allowance){


var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>;

$.ajax({
url: "<?= base_url() ?>actions/companyallowance/",
method: "POST",
data: {action:action,allowance:allowance,co:co}
}).done(function(rd){



console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#dayscal').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
//setTimeout(function() {location.reload();}, 2000);
setTimeout(function() { $( "#container1" ).load(window.location.href + " #container1" );
}, 2000);




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







 function statusdeduction(action , status,deduction , co){



$.ajax({
url: "<?= base_url() ?>actions/statusdeduction/",
method: "POST",
data: {action:action,deduction:deduction,status:status,co:co}
}).done(function(rd){



console.log(rd.des);
//      var newp = JSON.parse(rd); 

//console.log(newp);

if(rd.msg === true){


console.log('done');

$('#dayscal').modal('hide');
//$("#tableBf").load(location.href + "#tableBf");

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
//setTimeout(function() {location.reload();}, 2000);
setTimeout(function() { $( "#table1" ).load(window.location.href + " #table1" );
}, 500);

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







 function EditLoan(a){

                var loantype = $("#loantype"+a).val();
                var id = $("#id"+a).val();
                var employee = $("#employeeID"+a).val();
                var paymentstyle = $("#loanpayingstyle"+a).val();
                var startdate = $("#startingdate"+a).val();
                var enddate = $("#enddate"+a).val();
                var amountgiven = $("#given"+a).val();
                var amountreturn = $("#return"+a).val();
                var stylevalue1 = $("#stylev1_"+a).val();
                var stylevalue2 = $("#stylev2_"+a).val();
                var paymentmethod = $("#bank"+a).val();
                var accname = $("#accname"+a).val();
                var bankname = $("#bankname"+a).val();
                var accno = $("#accno"+a).val();
                var description = $("#loandes"+a).val();
                var giver = $("#giver"+a).val();
                var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>  ; 

     changeInnerHTML(['errorloantype'+a, 'errorname'+a, 'erroramount'+a, 'erroramount2'+a, 'errorgiver'+a,'errorbank'+a,'errorpaymentstyle'+a,'errorstartdate'+a,'erroraccno'+a,'erroraccname'+a,'errorstylev1_'+a,'errorstylev2_'+a,'errorbankname'+a,'loanloaderror'+a],
        "");


   $('#loanloaderror'+a).html("processing...");


$.ajax({
url: "<?= base_url() ?>actions/editnewloan",
method: "POST",
data: {loantype:loantype, employee:employee, amountreturn:amountreturn,amountgiven:amountgiven,paymentstyle:paymentstyle,stylevalue1:stylevalue1,stylevalue2:stylevalue2,startdate:startdate,enddate:enddate,paymentmethod:paymentmethod,accname:accname,accno:accno,description:description,giver:giver,bankname:bankname,co:co,id:id}
}).done(function(rd){

        $('#loanloaderror').html("");


console.log(rd);
//      var newp = JSON.parse(rd); 



//console.log(newp);

if(rd.msg === true){
console.log('done');
$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
setTimeout(function() {window.location.href = "<?= base_url() ?>loans/<?= $companyindex ?>"}, 2000);

}else{
console.log('fail');

console.log(rd);

}

}).fail(function(){


 $('#addloanerror').html("Some Error Occured Contact Support team and Try again Later");

 

});  


 }





function addpayroll(){



var name = $('#payrollname').val();
var start1  = $('#payrollstart').val();
var end1 = $('#payrollend').val();
  var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>  ; 

  changeInnerHTML(['addpayrollerror','errorstart','errorname', 'errorend'],  "");


  if(!name || !start1 || !end1 || end1 < start1){

    changeInnerHTML('addpayrollerror', "Incorrect Input");


  !name ? changeInnerHTML('errorname', "Name field is Required") : "";
  !start1 ? changeInnerHTML('errorstart', "Start Date field is Required") : "";
  !end1 ? changeInnerHTML('errorend', "End Date field is Required") : "";
  end1 < start1 ? changeInnerHTML('errorend', "Incorrect Date End Date Should be not less than Starting Date") : "";


return;

  }



$.ajax({
url: "<?= base_url() ?>actions/addpayroll",
method: "POST",
data: {name:name, start1:start1,end1:end1, co:co}
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
var start1  = $('#payrollstartedit'+a).val();
var end1 = $('#payrollendedit'+a).val();
var id = $('#payrollIDedit'+a).val();
  var co = <?= $this->session->userdata('companyarray')[$companyindex]['id'] ?>  ; 

  changeInnerHTML(['errornameedit'+a,'errorstartedit'+a,'errorendedit'+a, 'editpyerror'+a],  "");


  if(!name || !start1 || !end1 || end1 < start1){

    changeInnerHTML('editpyerror'+a, "Incorrect Input");


  !name ? changeInnerHTML('errornameedit'+a, "Name field is Required") : "";
  !start1 ? changeInnerHTML('errorstartedit'+a, "Start Date field is Required") : "";
  !end1 ? changeInnerHTML('errorendedit'+a, "End Date field is Required") : "";
  end1 < start1 ? changeInnerHTML('errorendedit'+a, "Incorrect Date End Date Should be not less than Starting Date") : "";


return;

  }



$.ajax({
url: "<?= base_url() ?>actions/editpayroll",
method: "POST",
data: {name:name, start1:start1,end1:end1, co:co,id:id}
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
url: "<?= base_url() ?>actions/deletepayroll",
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


function addempmodal(a){



  $('#searchemployee').modal('hide');
  $('#payemployee'+a).modal('show');
}





  function changeInnerHTML(elementId, newValue){
    //just change value if it's a single element
    if(typeof(elementId) === "string"){
        $("#"+elementId).html(newValue);
    }
    
    //loop through if it's an array
    else{
        var i;
    
        for(i in elementId){
            $("#"+elementId[i]).html(newValue);
        }
    }
    
    
    return "";
}



function addemployeepayrecord(a){


 var elements = document.getElementById("payemployeeform"+a).elements;
    var obj ={};
    for(var i = 0 ; i < elements.length ; i++){
        var item = elements.item(i);
        obj[item.name] = item.value;
    }

    // document.getElementById("demo").innerHTML = JSON.stringify(obj);


 console.log(JSON.stringify(obj));



$.ajax({
url: "<?= base_url() ?>actions/payemployee",
method: "POST",
data: {mydata:obj}
}).done(function(rd){

console.log(rd.des);
//  var newp = JSON.parse(rd); 


//console.log(newp);

if(rd.msg === true){

$('#searchemployee').modal('hide');
$('#payemployee'+a).modal('hide');
console.log('done');



$('#alerting').modal('show');
$('#alerting4').html(rd.des);
 $( "#table2" ).load(window.location.href + " #table2" );
 $( "#modaledit" ).load(window.location.href + " #modaledit" );
 $( "#myemployees" ).load(window.location.href + " #myemployees" );



setTimeout(function() {$('#alerting').modal('hide');}, 2000);


}else{

$('#payeployeeerror'+a).html(""+rd.des);


}

}).fail(function(){

$('#payeployeeerror'+a).html('Some Error Occured Contact Support team and Try again Later');



});



}




function editemployeepayrecord(a){


 var elements = document.getElementById("editpayemployeeform"+a).elements;
    var obj ={};
    for(var i = 0 ; i < elements.length ; i++){
        var item = elements.item(i);
        obj[item.name] = item.value;
    }

    // document.getElementById("demo").innerHTML = JSON.stringify(obj);


 console.log(JSON.stringify(obj));



$.ajax({
url: "<?= base_url() ?>actions/editpayemployee",
method: "POST",
data: {mydata:obj}
}).done(function(rd){

console.log(rd.des);
//  var newp = JSON.parse(rd); 


//console.log(newp);

if(rd.msg === true){

// $('#searchemployee').modal('hide');
$('#editmypayroll'+a).modal('hide');
console.log('done');



$('#alerting').modal('show');
$('#alerting4').html(rd.des);
 $( "#table2" ).load(window.location.href + " #table2" );
 $( "#modaledit" ).load(window.location.href + " #modaledit" );
 // $( "#myemployees" ).load(window.location.href + " #myemployees" );



setTimeout(function() {$('#alerting').modal('hide');}, 2000);


}else{

$('#editpayeployeeerror'+a).html(""+rd.des);


}

}).fail(function(){

$('#editpayeployeeerror'+a).html('Some Error Occured Contact Support team and Try again Later');



});



}




function editemployeepayrecord2(a){


 var elements = document.getElementById("editpayemployeeform"+a).elements;
    var obj ={};
    for(var i = 0 ; i < elements.length ; i++){
        var item = elements.item(i);
        obj[item.name] = item.value;
    }

    // document.getElementById("demo").innerHTML = JSON.stringify(obj);


 console.log(JSON.stringify(obj));



$.ajax({
url: "<?= base_url() ?>actions/editpayemployee2",
method: "POST",
data: {mydata:obj}
}).done(function(rd){

console.log(rd.des);
//  var newp = JSON.parse(rd); 


//console.log(newp);

if(rd.msg === true){

// $('#searchemployee').modal('hide');
$('#editmypayroll'+a).modal('hide');
console.log('done');



$('#alerting').modal('show');
$('#alerting4').html(rd.des);
 $( "#table2" ).load(window.location.href + " #table2" );
 $( "#modaledit" ).load(window.location.href + " #modaledit" );
 // $( "#myemployees" ).load(window.location.href + " #myemployees" );



setTimeout(function() {$('#alerting').modal('hide');}, 2000);


}else{

$('#editpayeployeeerror'+a).html(""+rd.des);


}

}).fail(function(){

$('#editpayeployeeerror'+a).html('Some Error Occured Contact Support team and Try again Later');



});



}









function submittingpayrollrec(a,b){


$.ajax({
url: "<?= base_url() ?>actions/ConfirmedPayroll",
method: "POST",
data: { payroll: a, co:b}
}).done(function(rd){

console.log(rd.des);


if(rd.msg === true){


console.log('done');


$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);


setTimeout(function() { document.location.reload() ;
}, 2000);




}else{

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);


}

}).fail(function(error){

  console.log(error);

$('#alerting2').modal('show');
$('#alerting5').html('Some Error Occured Contact Support team and Try again Later');
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);



});


}






function unsubmitpayrollrec(a){


$.ajax({
url: "<?= base_url() ?>actions/UnconfirmedPayroll",
method: "POST",
data: { payroll: a}
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){


console.log('done');

$('#deletePy'+a).modal('hide');


$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() {location.reload();}, 2000);


setTimeout(function() { document.location.reload() ;
}, 2000);




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







function removemyemployeefromlist(a,b){

 var elements = document.getElementById("editpayemployeeform"+b).elements;
    var obj ={};
    for(var i = 0 ; i < elements.length ; i++){
        var item = elements.item(i);
        obj[item.name] = item.value;
    }

    // document.getElementById("demo").innerHTML = JSON.stringify(obj)
 console.log(JSON.stringify(obj));

$.ajax({
url: "<?= base_url() ?>actions/deletepayemployee",
method: "POST",
data: {a:a,b:b}
}).done(function(rd){

console.log(rd.des);
if(rd.msg === true){

$('#deletemyemployee'+b).modal('hide');
console.log('done');



$('#alerting').modal('show');
$('#alerting4').html(rd.des);
 $( "#table2" ).load(window.location.href + " #table2" );
 $( "#modaledit" ).load(window.location.href + " #modaledit" );
 $( "#myemployees" ).load(window.location.href + " #myemployees" );
 setTimeout(function() {$('#alerting').modal('hide');}, 2000);


}else{

// $('#payeployeeerror'+a).html(""+rd.des);
$('#deletemyemployee'+b).modal('hide');

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);



}

}).fail(function(){


// $('#payeployeeerror'+a).html('Some Error Occured Contact Support team and Try again Later');
$('#deletemyemployee'+b).modal('hide');

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 2000);
});
}






function openeditloanform(id,style,type,paymethod,pm,pb,fa){

  $('#loantype'+id).val(type);
  $('#loanpayingstyle'+id).val(style);
  $('#bank'+id).val(paymethod);

  loanstylechangevalue2(id,pm,pb,fa);
  payedinbank2(id);  


  if(style==1){

   var a =  $('#return'+id).val();



      $('#stylev2_'+id).val(a/pm);


  }



}


function changeCalcfromfield(a,b,c){

$('#deductions_value_calcfrom'+a+'_'+b+'').val(c);
}




$(document).ready(function () {
// console.log( "ready!" );


           
 <?php if($mypage=='payroll/pay/'){

           $employee2 = $this->Main->all2('employees', 'status', 'active','company_id', $this->session->userdata('companyarray')[$companyindex]['id'] );



                      if(!empty($employee2)){
                      
                 foreach( $employee2 as $employee){ if(!$this->Main->isExist3('payrollrecords', 'company',$this->session->userdata('companyarray')[$companyindex]['id'],'employee', $employee['id'], 'payroll' , $payroll)){
    // $allnames = $employee['first_name'].' '. $employee['middle_name'] .' '.$employee['last_name'];

                  ?>

                  $('#paye_value_calcfrom<?= $employee['id']?>').val(3);
     <?php 


                   $bfc = $this->Main->all3('benefits_funds','is_active', '1','is_deleted', '0' ,'company_id', $this->session->userdata('companyarray')[$companyindex]['id']);

      if(!empty($bfc)){foreach( $bfc as $bf){

                    $bfc2 = $this->Main->all3('employment_status_deduction','status',$employee['employment_status'] ,'deduction', $bf['name'] ,'company', $this->session->userdata('companyarray')[$companyindex]['id']);

           if(!empty($bfc2)){foreach( $bfc2 as $bf2){
                    ?>


                    changeCalcfromfield(<?= $bf['id']?>, <?= $employee['id']?>,<?=$bf['cut_from']?>);

        <?php } } } }  ?>

<?php }} }} ?>



  $('.mpicker').datepicker( {
           changeMonth: true,
             changeYear: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
            });




<?php if($secretvalue == 'summary'){ 

foreach ($this->Main->all2('benefittypes','id !=',1,'id!=',7) as $key => $value) {

  if($this->Main->isExist2('payroll_records_benefits_fund', 'fund',$value['id'],'payroll',$payroll)){
    $myid =  $value['id'] ;
 
  ?>

 var tt_bfund<?=$myid ?> = 0;
$('.tt_bfund<?=$myid?>').each(function()
{
    tt_bfund<?=$myid?> += parseFloat($(this).val());
    console.log($(this).val());
});

$('#myfundtotal<?=$myid?>').html((tt_bfund<?= $myid ?>).toFixed(2));

console.log(tt_bfund<?=$myid?> );

<?php }}} ?>



 var mytotal =0;
 var mytotal2 =0;

<?php if($secretvalue == 'summary'){ 

foreach ($this->Main->all('benefittypes') as $key => $value) {



  if($this->Main->isExist2('payroll_records_benefits_fund', 'fund',$value['id'],'payroll',$payroll)){
    $myid =  $value['id'] ;
 
  ?>

 var ff_bfund<?=$myid ?> = 0;
 var ff_2bfund<?=$myid ?> = 0;
 var ff_3bfund<?=$myid ?> = 0;

$('.ff_bfund<?=$myid?>').each(function()
{
    ff_bfund<?=$myid?> += parseFloat($(this).val());
    console.log($(this).val());
});

$('.ff_2bfund<?=$myid?>').each(function()
{
    ff_2bfund<?=$myid?> += parseFloat($(this).val());
    console.log($(this).val());
});

$('.ff_3bfund<?=$myid?>').each(function()
{
    ff_3bfund<?=$myid?> += parseFloat($(this).val());
    console.log($(this).val());
});



if(( ff_2bfund<?=$myid ?> +  ff_bfund<?=$myid ?>) > 0 ){


$('#amount2fund<?=$myid?>').html((ff_2bfund<?=$myid ?> +  ff_bfund<?=$myid ?>).toFixed(2));


}else{

$('#amountfund<?=$myid?>').hide();

}


if(( ff_3bfund<?=$myid ?>) > 0 ){

$('#topup2fund<?=$myid?>').html((ff_3bfund<?=$myid ?>).toFixed(2));
$('#topup2_2fund<?=$myid?>').html((ff_3bfund<?=$myid ?>).toFixed(2));
$('.fundtopup<?=$myid?>').html((ff_2bfund<?=$myid ?>).toFixed(2));


}else{

$('#topupfund<?=$myid?>').hide();
$('#topup2_fund<?=$myid?>').hide();
$('.hidemyfundtopup<?=$myid?>').hide();

}


if(( ff_2bfund<?=$myid ?>) > 0 ){


$('#amount2_2fund<?=$myid?>').html((ff_2bfund<?=$myid ?>).toFixed(2));
$('.fundfname<?=$myid?>').html((ff_2bfund<?=$myid ?>).toFixed(2));

}else{

$('#amount2_fund<?=$myid?>').hide();
$('.hidemyfundname<?=$myid?>').hide();

}

$('#my2fundtotal<?=$myid?>').html((ff_2bfund<?=$myid ?>).toFixed(2));
$('#my1fundtotal<?=$myid?>').html((ff_bfund<?=$myid ?>).toFixed(2));



mytotal += parseFloat( ff_2bfund<?=$myid ?> + parseFloat( ff_3bfund<?=$myid ?>) +  ff_bfund<?=$myid ?>) ;
mytotal2 += parseFloat( ff_2bfund<?=$myid ?> + parseFloat( ff_3bfund<?=$myid ?>) ) ;





// console.log(tt_bfund<?=$myid?> );

<?php }}} ?>


$('.totalupper').html( (parseFloat($('#ourtotalpaye').val()) + mytotal).toFixed(2));
$('.totalupper2').html( (parseFloat($('#ourtotalgross').val()) + mytotal2).toFixed(2));

 

});



  function addednumberemployees(r){


 if(r > 0){

$('#alerting').modal('show');
$('#alerting4').html(r +' Employee(s) Successfull Added ');
setTimeout(function() {$('#alerting').modal('hide');}, 2000);
setTimeout(function() {location.reload();}, 2000);
 

 }else{

  $('#alerting2').modal('show');
$('#alerting5').html('None of employeemployee Added');
setTimeout(function() {$('#alerting2').modal('hide');}, 1900);

 }
 
 }



function editspecificcell_payrollrecords(a,b,c,d,e){ //allowance , employeew, arrear



$.ajax({
url: "<?= base_url() ?>actions2/addmsg/",
method: "POST",
data: {}
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){


console.log('done');

// $('#addPy').modal('hide');
// //$("#tableBf").load(location.href + "#tableBf");

// $('#alerting').modal('show');
// $('#alerting4').html(rd.des);
// setTimeout(function() {$('#alerting').modal('hide');}, 2000);
// setTimeout(function() { $( "#table2" ).load(window.location.href + " #table2" );
// }, 0);


$( "#table2" ).load(window.location.href + " #table2" );



}else{

 // changeInnerHTML('editpyerror'+a, ""+rd.des);

 // alert(rd.msg);

}

}).fail(function(){

// $('#editpyerror'+a).html('Some Error Occured Contact Support team and Try again Later');


});

}



 $('#editpossibles').on('hidden.bs.modal', function (e) {
  
  var a = $('#myvalue').val();
  var b = $('#myvalue0').val();
  var c = $('#myvalue1').val();
  var d = $('#myvalue2').val();
  var e = $('#myvalue3').val();


  editspecificcell_payrollrecords(a,b,c,d,e);

  // alert(a);



});


 $('#editpossibles2').on('hidden.bs.modal', function (e) {
  
  var a = $('#my2value').val();
  var e = $('#my2value00').val();
  var b = $('#my2value0').val();
  var c = $('#my2value1').val();
  var d = $('#my2value2').val();


  editspecificcell_payrollrecords(a,b,c,d,e);

  // alert(a);



});


 $('#myvalue').keyup(function (e) {
    if ($("#myvalue").is(":focus") && (e.keyCode == 13)) {

      $('#editpossibles').modal('hide');
        
    }
});


$('#my2value').keyup(function (e) {
    if ($("#my2value").is(":focus") && (e.keyCode == 13)) {

      // $('#editpossibles').modal('hide');
      $("#my2value00").trigger('focus');
        
    }
});


$('#my2value00').keyup(function (e) {
    if ($("#my2value00").is(":focus") && (e.keyCode == 13)) {

      $('#editpossibles2').modal('hide');
      // $("#my2value00").trigger('focus');
        
    }
});



 $('#editpossibles').on('shown.bs.modal', function (e) {
  // do something...
  $("#myvalue").trigger('focus');
  // alert(6);
});


 $('#editpossibles2').on('shown.bs.modal', function (e) {
  // do something...
  $("#my2value").trigger('focus');
  // alert(6);
});






// CHATTINGSCRIPTS




 function sendSMS2() {      
   
     
   
      var msg = $('#chatSend').val();
    

      // msg = msg.replace(/\"/g,'\\"');
      msg =msg.replace(/\n\r?/g, '<br />'); 
      var t = $.now();
      $('#chatSend').val('');
      if(msg.replace(/\s/g, '') !== ''){
        var temp = {
          id: t.toString(),
          from: 'me',
          msg: msg,
          time: t.toString(),
          action: ''
      
        }

        json.chats.push(temp);
        // console.log(json);
        newMsgRender (temp);
      } else {
        // $('#viewport .chats ul>li.pending').remove();
      }
    
  } 


  function newMsgRender (data) {
   
  
     var _cl = data.from;
             
      $('.chats ul')
        .append('<li id="li_msg'+data.id+'"><div class="msg '+_cl+'">'+
              '<span class="partner">'+ '' +'</span>'+
              data.msg +
              '<span class="time">' + data.time + '</span>'+
              '</div>'+
              '</li>'); 

        if(data.from == 'me'){
         $( "#chat_fullscreen" ).scrollTop($("#chat_fullscreen > ul").height());

       }


         console.log(data.msg);
  
  }





function sendSMS(){


var me_id = $('#me_id').val();
 var you_id = $('#you_id').val();
 var me_st = $('#me_st').val();
 var you_st = $('#you_st').val();
 var names = $('#ynames').val();


var msg = $('#chatSend').val();
      console.log(msg);

      // msg = msg.replace(/\"/g,'\\"');
      msg = msg.replace(/\n\r?/g, '<br />'); 
      var t = $.now();
      // $('#chatSend').val('');
      if(msg.replace(/\s/g, '') !== ''){


$.ajax({
url: "<?= base_url() ?>actions3/addmsg/",
method: "POST",
data: {from_id:me_id, from_status:me_st, to_id:you_id, to_status:you_st, msg:msg}
}).done(function(rd){

console.log(rd);

if(rd.req === true){


console.log('done');
$('#chatSend').val('');
 var temp = {
          id: rd.id,
          from: 'me',
          msg: rd.msg,
          time: rd.time,
          action: ''
        }
        // json.chats.push(temp);
        // console.log(json);
        newMsgRender (temp);

}else{

 console.log('fail')

}

}).fail(function(){

console.log('fail2');

});


}}






function readSMS1(){

 var me_id = $('#me_id').val();
 var you_id = $('#you_id').val();
 var me_st = $('#me_st').val();
 var you_st = $('#you_st').val();
 var names = $('#ynames').val();
  var title = $('#ytitle').val();

 if(names.length > 15){
  names = names.substring(0, 15)+'...';
 }

if(title.length > 20){
  title = title.substring(0, 20)+'...';
 }


 $('#chat_head').html(names);
 $('#agentuser').html(title);


$('.chats>ul').html('');
$.ajax({
url: "<?= base_url() ?>actions3/viewallmsg/",
method: "POST",
data: {from_id:me_id, from_status:me_st, to_id:you_id, to_status:you_st}
}).done(function(rd){


   console.log(rd);

rd.chats.forEach(function (chat) {
        var _cl;
        // (chat.from === user) ? _cl = 'you' : _cl = 'him';
        _cl = chat.from;
        var dataString = '<li id="li_msg'+chat.id+'"><div class="msg ' + _cl +'">'+
           '<span class="partner">'+ '' +'</span>'+
           chat.msg +
           '<span class="time">' + chat.time + '</span>'+
           '</div></li>';
        $('.chats>ul').append(dataString);   
      });
$( "#chat_fullscreen" ).scrollTop($("#chat_fullscreen > ul").height());


}).fail(function(){

console.log('fail2');

});


}


 



function readSMS2(){



var me_id = $('#me_id').val();
 var you_id = $('#you_id').val();
 var me_st = $('#me_st').val();
 var you_st = $('#you_st').val();
 var names = $('#ynames').val();


$.ajax({
url: "<?= base_url() ?>actions3/viewallmsg2/",
method: "POST",
data: {from_id:you_id, from_status:you_st, to_id:me_id, to_status:me_st}
}).done(function(rd){


  

rd.chats.forEach(function (chat) {
        var temp = {
          id: chat.id,
          from: 'you',
          msg: chat.msg,
          time: chat.time,
          action: ''
        }
      
        newMsgRender (temp);

}); 

        
     
// $( "#chat_fullscreen" ).scrollTop($("#chat_fullscreen > ul").height());


}).fail(function(){

console.log('fail2');

});




}









</script>


<!-- <script src="<?= base_url() ?>assets/datepicker/monthyear/MonthPicker.js"></script>   
 -->



<!--   <script src="<?= base_url() ?>assets/datepicker/monthyear/examples.js"></script>
 -->




</body>
</html>