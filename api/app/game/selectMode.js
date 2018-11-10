$(document).ready(function(id){
  //getInfoGame_one(sessionid);
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

  $(document).on('click', '#ch1', function(){
    botplay = 1;
    $('#ch1').attr('class', 'col-ch-ne active');
    $('#ch2').attr('class', 'col-ch-ne');
  });
  // select mode hard
  $(document).on('click', '#ch2', function(){
    botplay = 2;
    $('#ch1').attr('class', 'col-ch-ne');
    $('#ch2').attr('class', 'col-ch-ne active');
  });

  $(document).on('click', '.play-button', function(){
    x = "mode : " + levelplay + " even : " + modeplay + " chapter : " + botplay;
    $('.result').html(x);

    url = "api/member/getMember.php?id=";
    var user = "";
    //var count = "";
    $.getJSON(url + sessionid, function(data){
      this.user = data.username;
      var data = {  "username": this.user,
                    "levelplay": levelplay,
                    "modeplay": modeplay,
                    "botplay": botplay
                  };
       //$('.result').html(form_data);
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
});

function sendLevel(levelplay,	modeplay,	botplay) {
  // 1    ความรัก
  // 2    โอกาสพิเศษ
  // 3    สถานที่
  // 4    บุคคลสำคัญ
  // 5    ดอกไม้
  if (levelplay == 1) {
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
