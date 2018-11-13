$(document).ready(function(){
  url = "api/member/getMember.php?id=";
  var user = "";
  $.getJSON(url + sessionid, function(data){
    this.user = data.username;
    $('#username').attr("value", this.user);
  });

  $(document).on('click', '#sendcomment', function(){

    var username = $("#username").val();
    var comment = $("#comment").val();
    //alert(comment);
    if (comment != '') {
      var data = {  "username": username,
                    "message": comment
                 };
    $.ajax({
      url: "api/comment/create.php",
      type : "POST",
      contentType : 'application/json',
      data : JSON.stringify(data),
      success : function(result) {
         alert("ส่งข้อความเรียบร้อยแล้ว ขอบคุณสำหรับความคิดเห็นค่ะ");
        //showComment();
        // $.getJSON(url, function(x){
        //   var msg = x.message;
        //   alert(msg);
        // });
      }
    });
  } else {
    alert("กรุณากรอกความคิดเห็น...");
  }
});

});

function showComment(){
  var text = "ส่งข้อความเรียบร้อยแล้ว ขอบคุณสำหรับความคิดเห็นค่ะ";
  $('.rank').html(text);
}

$.fn.serializeObject = function(){
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};
