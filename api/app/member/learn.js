$(document).ready(function(){
  var jwt = getCookie('jwt');
  $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    user = result.data.username;
    id = result.data.id;

    var dataJSON = {  "id": id,
    "subChapt" : subChapter,
    "learnPage" : page
  };
  $.ajax({
    url: "api/member/update_learn.php",
    type : "POST",
    contentType : 'application/json',
    data : JSON.stringify(dataJSON),
    success : function() {},
    error: function(xhr, resp, text) {
      console.log(xhr, resp, text);
    }
  });
  return false;

}).fail(function(result){
  location.replace("index.php");
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
