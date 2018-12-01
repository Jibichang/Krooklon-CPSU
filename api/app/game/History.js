$(document).ready(function(){
  // showHomePage();
  // getUser();
  var user;
  var jwt = getCookie('jwt');
  $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    user = result.data.username;
    id = result.data.id;
    // alert(result.data.id);
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
  }).fail(function(result){
    location.replace("index.php");
  });


});

function showHistory(result) {
  //alert(result.count_arr);
  table_history_html = "";
  table_history_html += "<table style='width:98%' id='history-table'>";
  count_loop = 0;
  if (max_count != 10) {
    for (var i = 0; i < result.count_arr; i++) {
      if (result.history[i].modegame != 0) {
        table_history_html += "<tr>";
        imgStatus(result.history[i].status);
        table_history_html += "<td style='width:12%'><img src='"+picStatus+"'></td>";
        table_history_html += "<td style='width:10%;text-align:right;'>" +
                "หมวดหมู่: <br>"+
                "ระดับ: <br>"+
                "บท: <br>"+
              "</td>";
        table_history_html += "<td style='width:10%;text-align:left;'>" +
                result.history[i].modegame + "<br>"+
                result.history[i].level + "<br>"+
                result.history[i].countbot + "<br>"+
              "</td>";
        table_history_html += "<td style='width:12%'><img src='pic/pung.png'><br><p>" +
                result.history[i].prosody + "</p>"+
              "</td>";
        table_history_html += "<td style='width:12%'><img src='pic/melody.png'><br><p>" +
                result.history[i].melody + "</p>"+
              "</td>";
        table_history_html += "<td style='width:12%'><img src='pic/timer1.png'><br><p>" +
                result.history[i].fast + "</p>"+
              "</td>";
        table_history_html += "<td style='width:12%'><h1>" + result.history[i].playall + "</h1></td>";
        table_history_html += "<td style='width:12%'><button type='button' id='klon'><h5>ดูกลอน</h5></button></td>";
        //x += result.history[i].reg_date + " ";

        //x += result.count_arr + "<br>";
        table_history_html += "</tr>";
        count_loop++;
      }
    }
    table_history_html += "</table>";
    $(".history-div").html(table_history_html);
  } else {
    for (var i = 0; count_loop < max_count; i++) {
      if (result.history[i].modegame != 0) {
        table_history_html += "<tr>";
        imgStatus(result.history[i].status);
        table_history_html += "<td style='width:12%'><img src='"+picStatus+"'></td>";
        table_history_html += "<td style='width:10%;text-align:right;'>" +
                "หมวดหมู่: <br>"+
                "ระดับ: <br>"+
                "บท: <br>"+
              "</td>";
        table_history_html += "<td style='width:10%;text-align:left;'>" +
                result.history[i].modegame + "<br>"+
                result.history[i].level + "<br>"+
                result.history[i].countbot + "<br>"+
              "</td>";
        table_history_html += "<td style='width:12%'><img src='pic/pung.png'><br><p>" +
                result.history[i].prosody + "</p>"+
              "</td>";
        table_history_html += "<td style='width:12%'><img src='pic/melody.png'><br><p>" +
                result.history[i].melody + "</p>"+
              "</td>";
        table_history_html += "<td style='width:12%'><img src='pic/timer1.png'><br><p>" +
                result.history[i].fast + "</p>"+
              "</td>";
        table_history_html += "<td style='width:12%'><h1>" + result.history[i].playall + "</h1></td>";
        table_history_html += "<td style='width:12%'><button type='button' id='klon'><h5>ดูกลอน</h5></button></td>";
        //x += result.history[i].reg_date + " ";

        //x += result.count_arr + "<br>";
        table_history_html += "</tr>";
        count_loop++;
      }
    }
    table_history_html += "</table>";
    $(".history-div").html(table_history_html);
  }

}

function imgStatus(status) {
  picStatus = "";
  if(status == 'win'){
    picStatus = "pic/happy.png";
  } else if (status == 'lose') {
    picStatus = "pic/sad%20(1).png";
  } else if (status == 'Only') {
    picStatus = "pic/only.png";
  } else {
    picStatus = "pic/equal.png";
  }
}

function getUser() {
  url = "api/member/getMember.php?id=";
  user = "";
  $.getJSON(url + sessionid, function(data){
    user = data.username;
  });
}

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
