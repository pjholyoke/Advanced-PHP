$(function() {
  $('.alert').click(function(e) {
    $(this).alert("close");
  });

  if($('#timer').is(':visible')) {
    var num = parseInt($('#timer').html());
    setInterval(function() {
      if(num > 0) {
        num--;
        $('#timer').html(num);
      }
    }, 1000);
  }
});