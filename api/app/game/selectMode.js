$(document).ready(function(id){
  var levelplay = Math.floor(Math.random() * (3 - 1) + 1);
  var modeplay = Math.floor(Math.random() * (6 - 1) + 1);
  var botplay = Math.floor(Math.random() * (3 - 1) + 1);
  // levelplay	modeplay	botplay
  // select mode medium
  $(document).on('click', '#medMode', function(){
    levelplay = "ปานกลาง";
    $('#medMode').attr('class', 'col-about active');
    $('#hardMode').attr('class', 'col-about');
  });
  // select mode hard
  $(document).on('click', '#hardMode', function(){
    levelplay = "ยาก";
    $('#medMode').attr('class', 'col-about');
    $('#hardMode').attr('class', 'col-about active');
  });

  // select mode even selectModeEven();
  $(document).on('click', '#pic1', function(){
    modeplay = "โอกาสพิเศษ";
    $('#pic1').attr('class', 'col-p-ne active');
    $("#pic2").attr('class', 'col-p-ne');
    $("#pic3").attr('class', 'col-p-ne');
    $("#pic4").attr('class', 'col-p-ne');
    $("#pic5").attr('class', 'col-p-ne');
  });
  $(document).on('click', '#pic2', function(){
    modeplay = "ความรัก";
    $("#pic1").attr('class', 'col-p-ne');
    $('#pic2').attr('class', 'col-p-ne active');
    $("#pic3").attr('class', 'col-p-ne');
    $("#pic4").attr('class', 'col-p-ne');
    $("#pic5").attr('class', 'col-p-ne');
  });
  $(document).on('click', '#pic3', function(){
    modeplay = "ดอกไม้";
    $("#pic1").attr('class', 'col-p-ne');
    $("#pic2").attr('class', 'col-p-ne');
    $('#pic3').attr('class', 'col-p-ne active');
    $("#pic4").attr('class', 'col-p-ne');
    $("#pic5").attr('class', 'col-p-ne');
  });
  $(document).on('click', '#pic4', function(){
    modeplay = "บุคคลสำคัญ";
    $("#pic1").attr('class', 'col-p-ne');
    $("#pic2").attr('class', 'col-p-ne');
    $("#pic3").attr('class', 'col-p-ne');
    $('#pic4').attr('class', 'col-p-ne active');
    $("#pic5").attr('class', 'col-p-ne');
  });
  $(document).on('click', '#pic5', function(){
    modeplay = "สถานที่";
    $("#pic1").attr('class', 'col-p-ne');
    $("#pic2").attr('class', 'col-p-ne');
    $("#pic3").attr('class', 'col-p-ne');
    $("#pic4").attr('class', 'col-p-ne');
    $('#pic5').attr('class', 'col-p-ne active');
  });
  // select bot 1 or 2
  $(document).on('click', '#ch1', function(){
    botplay = 1;
    $('#ch1').attr('class', 'col-ch-ne active');
    $('#ch2').attr('class', 'col-ch-ne');
  });
  $(document).on('click', '#ch2', function(){
    botplay = 2;
    $('#ch1').attr('class', 'col-ch-ne');
    $('#ch2').attr('class', 'col-ch-ne active');
  });

  $(document).on('click', '.play-button', function(){
    showPage();
    var data = {  "username": user,
    "levelplay": levelplay,
    "modeplay": modeplay,
    "botplay": botplay
  };
  $.ajax({
    url: "api/game/create.php",
    type : "POST",
    contentType : 'application/json',
    data: JSON.stringify(data),///.serializeObject(), //,
    success : function(result) {
      sendLevel(levelplay, modeplay, botplay);
    },
    error: function(xhr, resp, text) {
      console.log(xhr, resp, text);
    }
  });
  return false;
});
});

function sendLevel(levelplay,	modeplay,	botplay) {
  if (levelplay == "ปานกลาง") {
    if (botplay == 1) {

    } else {

    }
  } else {
    if (botplay == 1) {
      location.replace("playHard1.php");
    } else {
      location.replace("playHard2.php");
    }
  }
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

function showPage() {
  var jwt = getCookie('jwt');
  $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    user = result.data.username;
    id = result.data.id;
    // alert(result.data.id + " " + result.data.username);
    getInfoGame_one(id);
  }).fail(function(result){
    location.replace("index.php");
  });
}
