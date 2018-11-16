$(document).ready(function(){
    getUser();
    var data = {"username": user};
    $.ajax({
      url: "api/game/History.php",
      type : "POST",
      contentType : 'application/json',
      data: JSON.stringify(data),///.serializeObject(), //,
      success : function(result) {
        showHistory(result);
      },
      error: function(xhr, resp, text) {
        console.log(xhr, resp, text);
      }
    });
    return false;
});

function showHistory(result) {
  alert(result.count_arr);
  x = "";
  for (var i = 0; i < result.count_arr; i++) {
    if (result.history[i].modegame != 0) {
      x += result.history[i].modegame + " ";
      x += result.history[i].level + " ";
      x += result.history[i].countbot + " ";
      x += result.history[i].prosody + " ";
      x += result.history[i].melody + " ";
      x += result.history[i].fast + " ";
      x += result.history[i].playall + " ";
      x += result.history[i].status + " ";
      x += result.history[i].reg_date + " ";

      x += result.count_arr + "<br>";
      $(".xxl").html(x);
    }
  }
}

function getUser() {
  url = "api/member/getMember.php?id=";
  user = "";
  $.getJSON(url + sessionid, function(data){
    user = data.username;

  });
}
