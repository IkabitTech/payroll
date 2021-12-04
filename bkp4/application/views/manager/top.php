<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?= $pageTitle ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="Author" content="" />

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

<!-- WEB FONTS -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" type="text/css" />

<!-- CORE CSS -->
<!-- <link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 --> 


 <link href="<?= base_url() ?>assets/main/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/animate.css" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<!-- <link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/essentials.css" rel="stylesheet" type="text/css" />
 --><link href="<?= base_url() ?>assets/main/css/essential.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/main/css/layout.css" rel="stylesheet" type="text/css" />

 <link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" />

<!-- orange: default style -->


<!-- Morenizr -->
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/modernizr.min.js"></script>

<!-- CHATTINGSCRIPTS -->
    <link href="<?= base_url() ?>assets/chat/css/style.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/chat/chat/css/style.css" rel="stylesheet" type="text/css" />

<!-- DATE PICKER -->


<link href="http://nikuze.com/src/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />

<!-- orange: default style -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">



<!-- DATE PICKER END -->

</head>
<body class="printable"><!-- Available classes for body: boxed , pattern1...pattern10 . Background Image - example add: data-background="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/images/boxed_background/1.jpg"  -->

<!-- Top Bar -->
<header id="topHead" class="notprint">
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
<a href=""><i class="fa fa-angle-right"></i> About</a>
<a href=""><i class="fa fa-angle-right"></i> Contact</a>
</div> -->
<!-- /LINKS -->

</div>
</header>
<!-- /Top Bar -->

<!-- TOP NAV -->
<header id="topNav" class="topHead notprint" ><!-- remove class="topHead" if no topHead used! -->
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


<li class="">
<a class="dropdown-toggle  <?php if($menuactive == 'employee'){echo 'active';} ?>" href="#">
Employee 
</a>

</li>

<li class=" <?php if($menuactive == 'loans'){echo 'active';} ?>">
<a class="" href="<?= base_url() ?>loans/<?=$companyindex?>"><b>
Loans</b>
</a>
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

<!-- QUICK SHOP CART -->



<!-- notification start-->
<li class="  quick-cart " id='noti'>
<span class="badge pull-right">3</span>

<div class="quick-cart-content">

<p><i class="fa fa-warning"></i> You have  notifications</p>

<a class="item" href="#"><!-- item 1 -->
<img class="pull-left" src="" onerror="this.onerror=null;this.src='https://www.vipaji.co.tz/sites/default/files/vipajlogo.png';"  width="40"  />
<div class="inline-block">
<span class="title"> <b>other user</b></span>
<span class="price">descriptions </span>
</div>
</a><!-- /item 1 -->



<!-- QUICK CART BUTTONS -->
<div class="row cart-footer">
<div class="col-md-6 nopadding-right">
<a href="" class="btn btn-primary btn-xs fullwidth">SEE ALL</a>
</div>

</div>


</div>

</li>
<!-- Nptification end -->




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
if($( '.chat' ).hasClass('hidden')){$('.chat').removeClass('hidden')}
  $('.prime').addClass('fa-times');
  $('.prime').addClass('is-active');
  $('.prime').addClass('is-visible');
  $('#prime').addClass('is-float');
  $('.chat').addClass('is-visible');
  $('.fab').addClass('is-visible');
  readSMS1();
" ><!-- item 1 -->
<div class="inline-block" style="padding-left: 30px">
<span class="title"> <b><?= $value['you_names'] ?></b></span>
<span class="price"><?php if(strlen($value['msg']) > 30 ){echo substr($value['msg'], 0,30).'... :: ';}else{echo $value['msg']. ' :: ';} ?> <?=  $value['time'] ?></span>
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
  if($( '.chat' ).hasClass('hidden')){$('.chat').removeClass('hidden')}

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

<span id="header_shadow" class="notprint"></span>
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


<a class="btn  btn-default col-md-5" style="margin:10px"  href="<?= base_url().$mypage.''.$i ?>"><?= $Comp['name'] ?></a>

<?php $i++; } ?>
<!-- <a class="btn btn-default scrollTo" href="#" onclick="fillcomp( 2,'Company 2')">Company 2</a> -->
</div>
</div>
</div>
</div>
</div>

<!-- Modal Default ends-->





<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.appear.js"></script>

<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://nikuze.com/src/jquery.datetimepicker.full.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/main/js/index.js"></script>


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


</script>

<script>


$( document ).ready(function() {
// console.log( "ready!" );

      $('#confirmed').DataTable({

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
</script>
<script>




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





function confirmpayrollrec(a,b){


$.ajax({
url: "<?= base_url() ?>actions/ConfirmedPayroll2",
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






function unconfirmpayrollrec(a){


$.ajax({
url: "<?= base_url() ?>actions/UnconfirmedPayroll2",
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


   // console.log(rd);

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

// console.log('fail2');

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






</script>







</body>
</html>