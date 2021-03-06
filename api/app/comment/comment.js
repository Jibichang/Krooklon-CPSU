$(document).ready(function(){
  var jwt = getCookie('jwt');
  $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    user = result.data.username;
    id = result.data.id;
    $('#username').attr("placeholder", result.data.username);
  }).fail(function(result){
    location.replace("index.php");
  });

  $(document).on('click', '#sendcomment', function(){
    var comment=document.forms["comment_form"]["comment"].value;
    if (comment != "") {
      var dataJSON = {  "username": user,
      "message": $("#comment").val()
    };
    $.ajax({
      url: "api/comment/create.php",
      type : "POST",
      contentType : 'application/json',
      data : JSON.stringify(dataJSON),
      success : function() {
        alert("ส่งข้อความเรียบร้อยแล้ว ขอบคุณสำหรับความคิดเห็นค่ะ");
        document.getElementById("form-comment").reset();
        location.replace("main.php#home");
      },
      error: function(xhr, resp, text) {
        console.log(xhr, resp, text);
      }
    });
    return false;
  } else {
    alert("กรุณากรอกความคิดเห็น...");
  }
});

});

function getCookie(cname){
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' '){
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
