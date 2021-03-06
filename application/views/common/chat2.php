<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <!-- 
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="../css/style.css"> -->

      <link href="<?= base_url() ?>assets/chat/css/style.css" rel="stylesheet" type="text/css" />
      <link href="<?= base_url() ?>assets/chat/chat/css/style.css" rel="stylesheet" type="text/css" />


</head>

<body>

<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
      <h3>Click on Arrow button to see next screen</h3> <button onclick="clear4()">Click to clear</button>
      <button onclick="readSMS1()">click this</button>
  <div class="fabs">
  <div class="chat">
    <div class="chat_header">
      <div class="chat_option">
   <!--    <div class="header_img"> -->
<!--         <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/>
 --> 
        <div style="background: #42a5f5"></div>
<!--         </div>
 -->        <span id="chat_head">Jane Doe</span> <br> <span class="agent">Agent</span> <span class="online">(Online)</span>
       <span id="chat_fullscreen_loader" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>

      </div>

    </div>


 
      <div id="chat_fullscreen" class="chat_conversion chat_converse chats">
        <ul style="margin:10px"></ul>
     
     
    </div>

    <div class="fab_field">
      <a id="fab_send" class="fab" onclick="sendSMS()"><i class="zmdi zmdi-mail-send is-visible"></i></a>
      <textarea id="chatSend" rows="20" name="chat_message" placeholder="Send a message" class="chat_field chat_message"></textarea>
    </div>
  </div>
    <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
</div>
  <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>

    <script src="<?= base_url() ?>assets/chat/chat/js/index.js"></script>



    <script>


   var json;
   readSMS1();

   setInterval(function() { readSMS2(); }, 5000);

 $(function(){

 console.log(json);
   
    
  init();
  function init () {
    // renderData();

   // readSMS1();
  

  };  
  
  // RENDER METHODS
  function renderData () {
    var _now = $.now();
    getDateTime(_now);
    
      // var userID = _json.user_id;
      // console.log(userID);
    
     
       json.chats.forEach(function (chat) {
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


       ;

  };
  
  function newMsgRender (data) {
   
  
      var _cl = 'me';
             
      $('.chats ul')
        .append('<li><div class="msg '+_cl+'">'+
              '<span class="partner">'+ '' +'</span>'+
              data.msg +
              '<span class="time">' + data.time + '</span>'+
              '</div>'+
              '</li>'); 


        $( "#chat_fullscreen" ).scrollTop($("#chat_fullscreen > ul").height());

  }








  
  function pendingRender (typingUser) {
    var pending = '<li class="pending">'+
       '<div class="msg load">'+
       '<div class="dot"></div>'+
       '<div class="dot"></div>'+
       '<div class="dot"></div>'+
       '</div>'+
       '</li>';
    _json.users.forEach( function (user) {
      user = user.replace(/ /g,"_");
      if(user !== typingUser) {
        if(!($('#'+ user +' .chats ul>li').hasClass('pending')))
          $('#'+ user +' .chats ul').append(pending);
      }
    });   
  }
  
  // HELPER FUNCTION
  function getDateTime (t) {
    var month   = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; 
    var d     = new Date(t/1000),
       month  = (month[d.getMonth()]),
       day    = d.getDate().toString(),
       hour   = d.getHours().toString(),
       min    = d.getMinutes().toString();
    (day.length < 2) ? day = '0' + day : '';
    (hour.length < 2) ? hour = '0' + hour : '';
    (min.length < 2) ? min = '0' + min : '';    
    var res = ''+month+' '+day+' '+hour+ ':' + min;
    return res;
  }
  

  // EVENT HANDLER
  $('#viewport .sendBox>input').focusout(function() {
    $('#viewport .chats ul>li.pending').remove();
  });
});


function clear4(){

    json = {
    // users: ["Gupi Gain","amon"],
    me_id:2,
    me_status:2,
    me_name:'Amon Mfuruki',

    you_id:1,
    you_status:5,
    you_name:'Person init',

    chats: [{
      id: 8,
      from: 'you',      
      msg: 'Mora Dujonai Rajar Jamai! first first first',
      time: '1533263925814',
      action: ''
    }
    ]
  };

$('.chats>ul').html('');

var _now = $.now();
    getDateTime(_now);
    
 

       json.chats.forEach(function (chat) {
        var _cl;
        // (chat.from === user) ? _cl = 'you' : _cl = 'him';
        _cl = chat.from;
        var dataString = '<li>'+
           '<div class="msg ' + _cl +'">'+
           '<span class="partner">'+ '' +'</span>'+
           chat.msg +
           '<span class="time">' + getDateTime (chat.time) + '</span>'+
           '</div></li>';
        $('.chats>ul').append(dataString);   
      });

$( "#chat_fullscreen" ).scrollTop($("#chat_fullscreen > ul").height());
       console.log(json);
}


  
  // HELPER FUNCTION
  function getDateTime (t) {
    var month   = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; 
    var d     = new Date(t/1000),
       month  = (month[d.getMonth()]),
       day    = d.getDate().toString(),
       hour   = d.getHours().toString(),
       min    = d.getMinutes().toString();
    (day.length < 2) ? day = '0' + day : '';
    (hour.length < 2) ? hour = '0' + hour : '';
    (min.length < 2) ? min = '0' + min : '';    
    var res = ''+month+' '+day+' '+hour+ ':' + min;
    return res;
  }



 function sendSMS2() {      
   
     
   
      var msg = $('#chatSend').val();
      console.log(msg);

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
        console.log(json);
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


  function scrollin(){

    $( "#chat_fullscreen" ).scrollTop($("#chat_fullscreen > ul").height());
    console.log($("#chat_fullscreen > ul").height() );


  }

$("#chat_fullscreen").scroll(function () {

  
  });




function sendSMS(){
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
data: {from_id:1, from_status:5, to_id:2, to_status:2, msg:msg}
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


$('.chats>ul').html('');
$.ajax({
url: "<?= base_url() ?>actions3/viewallmsg/",
method: "POST",
data: {from_id:1, from_status:5, to_id:2, to_status:2}
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


$.ajax({
url: "<?= base_url() ?>actions3/viewallmsg2/",
method: "POST",
data: {from_id:2, from_status:2, to_id:1, to_status:5}
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



</body>

</html>
