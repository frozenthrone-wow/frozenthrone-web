function chatSystem(selector, file) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function() {
    if(req.readyState == 4 && req.status == 200) {
      document.querySelector(selector).innerHTML =  req.responseText;
    }
  }
  req.open('GET', file, true);
  req.send();
}
setInterval(function(){chatSystem(".chat-screen", "functions/chat.php")},1000);
$(document).ready(function(){
  $('.chat-toggler').on("click", function(){
    $('.chat-box').slideToggle(100);
  });
  $('.myForm').submit(function (event) {
    var data = $(this);
    $.ajax({
      type: data.attr('method'),
      url: data.attr('action'),
      data: data.serialize(),
      success: function (data) {
        $('.output').html(data);
        $('.myForm input:NOT([type=submit])').val('');
        setTimeout(
          function () {
            location.reload();
          }, 2000
        );
      }
    });
    event.preventDefault();
  });
  $('.chatform').submit(function (event) {
    var data = $(this);
    $.ajax({
      type: data.attr('method'),
      url: data.attr('action'),
      data: data.serialize(),
      success: function (data) {
        $('.chatform input:NOT([type=submit])').val('');
      }
    });
    event.preventDefault();
  });
});
