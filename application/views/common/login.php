

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OPS</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="https://colorlib.com/etc/lf/Login_v2/image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/bootstrap/css/bootstrap.min.css">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/vendor/select2/select2.min.css">


<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v2/css/util.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/main.css">


</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<form class="login100-form validate-form"  >

<span class="login100-form-title p-b-48">
<img src="<?= base_url() ?>assets/images/logo.png" style="height:150px"/>
</span>
<span class="login100-form-title p-b-26">

</span>
<div class="wrap-input100 validate-input" data-validate="Enter Username">
<input class="input100" type="text"  id="name" required>
<span class="focus-input100" data-placeholder="Username"  ></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Enter password" style="margin-bottom: 5px">
<span class="btn-show-pass">
<i class="zmdi zmdi-eye"></i>
</span>
<input class="input100" type="password"  id="pswd" required>
<span class="focus-input100" data-placeholder="Password"></span>
</div>
<p class='text-center' >Forget or you want reset your password Click <b> <a href="<?=base_url()?>forget_password"> Here </a> </b></p>

<div class="container-login100-form-btn">
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
<button type="button" class="login100-form-btn" id= "btn2" onclick='go()'>
Login 
</button>
</div>
</div>

<div class="alert alert-danger show"  id="alert"   style="margin:5px">
  
</div>



</form>
</div>
</div>
</div>
<div id="dropDownSelect1"></div>



<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/jquery.appear.js"></script>

<script type="text/javascript" src="https://theme.stepofweb.com/Atropos/v1.9.1/HTML/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v2/vendor/animsition/js/animsition.min.js"></script>


<script src="https://colorlib.com/etc/lf/Login_v2/vendor/select2/select2.min.js"></script>



<script src="https://colorlib.com/etc/lf/Login_v2/vendor/countdowntime/countdowntime.js"></script>

<script src="<?= base_url() ?>assets/login/index.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>





$(document).ready(function () {
// console.log( "ready!" );

$('#name').val('');
$('#pswd').val('');

   setTimeout(function() {


    $('.input100').each(function(){$(this).on('blur',function(){if($(this).val().trim()!=""){$(this).addClass('has-val');}
   else{$(this).removeClass('has-val');}})})


 }, 1000);


});






	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
      
      $( document ).ready(function() {
   // console.log( "ready!" );
      $('#alert').hide();

});
</script>

<script>
        function go(){

    var name = $('#name').val();
    var pswd = $('#pswd').val();

    $.ajax({
                url: "<?= base_url() ?>login",
                method: "POST",

                data: {username: name, password: pswd}
            }).done(function(rd){

                console.log(rd);

                if(rd.msg === true){


                    console.log('done');

                    $('#alert').hide();

                    setTimeout(function() {window.location.href = "<?= base_url() ?>dashboard"}, 1000);

                    
                }else{

                 $('#alert').show();
                 // console.log('wrong input');
                 // $('#alert').show();
                 $('#alert').html(rd.data);
                 
                }
                
            }).fail(function(){
                console.log('Req Failed');

                $('#alert').show();
                 $('#alert').html('Try again later');

            });
           
    

        }

	</script>
</body>
</html>
