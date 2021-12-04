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
 
 --><link href="<?= base_url() ?>assets/main/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/animate.css" rel="stylesheet" type="text/css" />

<!-- THEME CSS -->
<link href="<?= base_url() ?>assets/main/css/essential.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/main/css/layout.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
<link href="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" /><!-- orange: default style -->


<!-- Morenizr -->
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/modernizr.min.js"></script>



<!-- DATE PICKER -->


<link href="http://nikuze.com/src/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />

<!-- orange: default style -->



<!-- DATE PICKER END -->
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>assets/datepicker/monthyear/MonthPicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/datepicker/monthyear/stylesheets/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/datepicker/monthyear/example.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">



<!-- MONTH PICKER -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">



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
<a href="page-about-us.html"><i class="fa fa-angle-right"></i> About</a>
<a href="contact-us.html"><i class="fa fa-angle-right"></i> Contact</a>
</div> -->
<!-- /LINKS -->

</div>
</header>




<!-- /Top Bar -->

<!-- TOP NAV -->
<header id="topNav" class="topHead"><!-- remove class="topHead" if no topHead used! -->
<div class="container">

<!-- Mobile Menu Button -->
<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
<i class="fa fa-bars"></i>
</button>

<!-- Logo text or image -->
<a class="logo" href="<?= base_url() ?>">
<img src="<?= base_url() ?>assets/images/company_logo/<?= $this->session->userdata('companyarray')['logo'] ?>" onerror="this.onerror=null;this.src='<?= base_url() ?>assets/images/logo.png';" style="height:50px"/>

</a>

<!-- Top Nav -->
<div class="navbar-collapse nav-main-collapse collapse pull-right">
<nav class="nav-main mega-menu">
<ul class="nav nav-pills nav-main scroll-menu" id="topMain">
<li class="<?php if($menuactive == 'dashboard'){echo 'active';} ?> ">
<a class="dropdown-toggle" href="<?= base_url() ?>dashboard" >
<b>Dashboard</b> 
</a>

</li>
<li class=" <?php if($menuactive == 'payroll'){echo 'active';} ?>">
<a class="  " href="<?= base_url() ?>payroll">
<b>Payroll</b> 
</a></li>



<li class=" <?php if($menuactive == 'loans'){echo 'active';} ?>">
<a class=" " href="<?= base_url() ?>"><b>
Loans<i class="fa fa-angle-down"></i></b>
</a>

</li>

<li class=" <?php if($menuactive == 'profile'){echo 'active';} ?>">
<a class="dropdown-toggle" href="<?= base_url() ?>profile/info">
My Profile 
</a>
</li>


<li><a id="k3" onclick="changec()" class=" label label-primary scrollTo" style = "background-color: #F07057; color:white;display: inline-block;font-size:12px"><?= $this->session->userdata('companyarray')['company_name'] ?></a></li>

<li class="quick-cart">

<span class="badge pull-right">3</span>

<div class="quick-cart-content">

<p><i class="fa fa-warning"></i> You have 3 notifications</p>

<a class="item" href="shop-product-full-width.html"><!-- item 1 -->
<img class="pull-left" src="" onerror="this.onerror=null;this.src='https://www.vipaji.co.tz/sites/default/files/vipajlogo.png';"  width="40"  />
<div class="inline-block">
<span class="title"> <b>other user</b></span>
<span class="price">descriptions </span>
</div>
</a><!-- /item 1 -->



<!-- QUICK CART BUTTONS -->
<div class="row cart-footer">
<div class="col-md-6 nopadding-right">
<a href="" class="btn btn-primary btn-xs fullwidth">CHECK DM</a>
</div>
<!-- <div class="col-md-6 nopadding-left">
<a href="shop-cc-pay.html" class="btn btn-info btn-xs fullwidth">CHECKOUT</a>
</div> -->
</div>
<!-- /QUICK CART BUTTONS -->

</div>

</li>
<!-- /QUICK SHOP CART -->


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






<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.appear.js"></script>

<script type="text/javascript" src="http://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://nikuze.com/src/jquery.datetimepicker.full.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/main/js/index.js"></script>



 <!-- <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script>

    <script src="<?= base_url() ?>assets/datepicker/monthyear/MonthPicker.min.js"></script>
    <script src="<?= base_url() ?>assets/datepicker/monthyear/examples.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>








<script>
var totalNewRs5 = jQuery("div.rs5>div").length;
jQuery("#rs5count").html(totalNewRs5);

</script>

<script>


$( document ).ready(function() {
// console.log( "ready!" );



       $('#confirmed18').DataTable({
      responsive: true,

        dom: 'Bft',
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




</script>







</body>
</html>