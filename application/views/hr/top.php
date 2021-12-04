<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
<link href="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/animate.css" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<link href="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/essentials.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/main/css/layout.css" rel="stylesheet" type="text/css" />
<link href="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
<link href="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" /><!-- orange: default style -->

<!-- CHATTINGSCRIPTS -->
    <link href="<?= base_url() ?>assets/chat/css/style.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/chat/chat/css/style.css" rel="stylesheet" type="text/css" />

<!-- Morenizr -->
<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/modernizr.min.js"></script>



<!-- DATE PICKER -->


<!--<link href="http://nikuze.com/src/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />-->

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
<button class="btn btn-primary" onclick="" >	LOG OUT</button>
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
<b><i class="fa fa-home"></i></b> 
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

</li>
</ul>

</li>


<li class=" <?php if($menuactive == 'employee'){echo 'active';} ?>">
<a  href="<?= base_url() ?>employee/<?=$companyindex?>"><b>
Employee</b> 
</a>



</li>




<li class=" <?php if($menuactive == 'profile'){echo 'active';} ?>">
<a class="dropdown-toggle" href="<?= base_url() ?>profile/info">
<i class="fa fa-user"></i>
</a>
</li>


<li> <a id="k3" onclick="changec()" class=" label label-primary scrollTo" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px">  <?= $this->session->userdata('companyarray')[$companyindex]['name'] ?>  </a> </li>








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


<a class="btn  btn-default col-md-5" style="margin:10px"  href="<?= base_url().$mypage.''.$i ?>"> <?= $Comp['name'] ?> </a>

<?php $i++; } ?>
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->





<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery-2.2.3.min.js"></script>
<!-- <script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.easing.1.3.js"></script>
 --><script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.appear.js"></script>

<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/main/js/index.js"></script>



 <!-- <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script>

     

<!--  <script type="text/javascript" src="http://nikuze.com/src/jquery.datetimepicker.full.js"></script>-->

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
 <script src="<?= base_url() ?>assets/chat/chat/js/index.js"></script>


<script type="text/javascript">
  

  function changec(){

$('#viewcomp').modal('show');
$('#k4').val(null);
$('.filterc > a').show();
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





$(document).ready(function () {
// console.log( "ready!" );

$('#myjobtitles2').DataTable();
$('.applydt').DataTable();


  $('.mpicker').datepicker( {
           changeMonth: true,
             changeYear: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
            });


});







 function salary_slip(user,payroll, co){



        $.ajax({
url: "<?= base_url() ?>actions3/salary_slip/",
method: "POST",
data: { coindex:co, payroll:payroll, employee:user }
}).done(function(rd){

console.log(rd.des);

if(rd.msg === true){


console.log('done');

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 1500);


}else{

  if(!rd.have_email){

$('#writeemail').modal('show');
$('#email').val('');
 $("#email").trigger('focus');
$('#payroll').val(payroll);
$('#user').val(user);
$('#co').val(co);


  }else{

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 1500);


  }


}

}).fail(function(){


$('#alerting2').modal('show');
$('#alerting5').html('Some Error Occured Contact Support team and Try again Later');
setTimeout(function() {$('#alerting').modal('hide');}, 1500);



});


 }






 function salary_slip_all(payroll, co){



        $.ajax({
url: "<?= base_url() ?>actions3/salary_slip_all/",
method: "POST",
data: { coindex:co, payroll:payroll}
}).done(function(rd){

console.log(rd);

if(rd.msg === true){


console.log('done');

$('#alerting').modal('show');
$('#alerting4').html(rd.des);
setTimeout(function() {$('#alerting').modal('hide');}, 30000);


}else{

  if(!rd.have_email){

$('#writeemail').modal('show');
$('#email').val('');
 $("#email").trigger('focus');
$('#payroll').val(payroll);
$('#user').val(user);
$('#co').val(co);


  }else{

$('#alerting2').modal('show');
$('#alerting5').html(rd.des);
setTimeout(function() {$('#alerting2').modal('hide');}, 1500);


  }


}

}).fail(function(error){


//$('#alerting2').modal('show');
//$('#alerting5').html('Some Error Occured Contact Support team and Try again Later');
//setTimeout(function() {$('#alerting').modal('hide');}, 1500);
console.log(error);


});


 }








</script>


</body>
</html>