// hideChat();


$('#prime').click(function() {
  toggleFab();
});


//Toggle chat and links
function toggleFab() {


  $('.prime').toggleClass('fa-comments-o');
  $('.prime').toggleClass('fa-times');
  $('.chat').toggleClass('hidden');

  $('.prime').toggleClass('is-active');
  $('.prime').toggleClass('is-visible');
  $('#prime').toggleClass('is-float');
  $('.chat').toggleClass('is-visible');
  $('.fab').toggleClass('is-visible');

}

