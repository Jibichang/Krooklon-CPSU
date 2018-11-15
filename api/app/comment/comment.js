$(document).ready(function(){
  getUser();
  $(document).on('click', '#sendcomment', function(){
    //var username = $("#username").val();
    if (comment != '') {
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

function getUser() {
  url = "api/member/getMember.php?id=";
  user = "";
  $.getJSON(url + sessionid, function(data){
    user = data.username;
    $('#username').attr("placeholder", user);
    //$('#username').attr("value", this.user);
  });
}
