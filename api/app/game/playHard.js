$(document).ready(function(id){
  setTimeout("time()",500);
  $(window).on("beforeunload",function(event){
    var msg="ยืนยันการปิดหน้านี้?";
    $(window).on("unload",function(event){
      event.stopImmediatePropagation();
      $.ajax({
        type: "POST",
        url: "manageExitGame.php",
        success: function(data) {
          $("#chatbox").append(data+"<br/>");//instead this line here you can call some function to read database values and display
        },
      });
      // แทรก ajax code ลบ session หรืออื่น ๆ
    });
    return msg;
  });

  $("#sub").click(function(){ // กรณีคลิกลิ้งค์ ไม่ต้องแสดง การแจ้งเตือน
    $(window).unbind("beforeunload");
  });

  $("#exit").click(function(){ // กรณีคลิกลิ้งค์ ไม่ต้องแสดง การแจ้งเตือน
    $(window).unbind("beforeunload");
  });
});

var min=(sec/60)-1;
var secc = sec%60;

function time() {
  sec-=1;
  secc = sec%60;
  document.getElementById("OutputText").innerHTML="<h4>"+"<font color='black'>" + min + " นาที " + secc + " วินาที</font></h4>";

  if (sec==0) {
    $(window).unbind("beforeunload");
    window.location.replace("playMode.php");
  }
  if (sec%60==0) { min-=1;}
  if (sec>0) {setTimeout("time()",1000);}
}

function Hard1() {
  var klon = document.getElementById("textBoxKlon").value;
  var klon2 = document.getElementById("textBoxKlon2").value;
  var klon3 = document.getElementById("textBoxKlon3").value;
  var klon4 = document.getElementById("textBoxKlon4").value;
  //var count = document.getElementById("count").value;
  var percent = 0;
  if(klon!=""){
    percent=percent+25;
  }
  if(klon2!=""){
    percent=percent+25;
  }
  if(klon3!=""){
    percent=percent+25;
  }
  if(klon4!=""){
    percent=percent+25;
  }
  document.getElementById("score").innerHTML= "<div class='progress playMe' role='progressbar' tabindex='0' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'>"+"<div class='progress-meter' style='width:"+percent+"%;'>"+"</div>"+"</div>";


}

function Hard2() {
  var klon = document.getElementById("textBoxKlon").value;
  var klon2 = document.getElementById("textBoxKlon2").value;
  var klon3 = document.getElementById("textBoxKlon3").value;
  var klon4 = document.getElementById("textBoxKlon4").value;
  var klon5 = document.getElementById("textBoxKlon5").value;
  var klon6 = document.getElementById("textBoxKlon6").value;
  var klon7 = document.getElementById("textBoxKlon7").value;
  var klon8 = document.getElementById("textBoxKlon8").value;
  //var count = document.getElementById("count").value;
  var percent = 0;
  if(klon!=""){
    percent=percent+12.5;
  }
  if(klon2!=""){
    percent=percent+12.5;
  }
  if(klon3!=""){
    percent=percent+12.5;
  }
  if(klon4!=""){
    percent=percent+12.5;
  }
  if(klon5!=""){
    percent=percent+12.5;
  }
  if(klon6!=""){
    percent=percent+12.5;
  }
  if(klon7!=""){
    percent=percent+12.5;
  }
  if(klon8!=""){
    percent=percent+12.5;
  }
  document.getElementById("score").innerHTML= "<div class='progress playMe' role='progressbar' tabindex='0' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'>"+"<div class='progress-meter' style='width:"+percent+"%;'>"+"</div>"+"</div>";
}
var rank = getInfoGame_one(sessionid);



function getInfoGame_one(sessionid){
  url = "api/member/getinfogame.php?id=";
  if (sessionid == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(data) {
      if (this.readyState == 4 && this.status == 200) {
        //  var data = JSON.parse(this.responseText);
        $.getJSON(url + sessionid, function(data){
          this.rank = data.rank;
          this.sumScore = data.sumScore;
          this.coin = data.coin;

          $('#rank').html(this.rank);
          $('#sumScore').html(this.sumScore);
          $('#coin').html(this.coin);

          showTimeline(this.rank);
          showTimelineSelect(this.rank);
        });
      }
    };
    xmlhttp.open("GET",url + sessionid,true);
    xmlhttp.send();
  }
}


function showTimeline(rank){
  //  alert(rank);
  var text2 = "มดน้อยแสนขยัน";
  var text3 = "แมวเมี๊ยวสุดเป๊ะ";
  var text4 = "ไนติงเกลร้องเพลง";
  var text5 = "ชีต้าวิ่งล่า";
  var text6 = "เจ้าป่าแสนชำนาญ";
}

function showTimelineSelect(rank) {
  if(rank=="มดน้อยแสนขยัน"){
    $('.active2').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
  }
  else if(rank=="มดน้อยป่วย"){
    $('.active2').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2-1.png');
    $('#text2').html(rank);
  }
  else if(rank=="แมวเมี๊ยวสุดเป๊ะ"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
  }
  else if(rank=="แมวเมี๊ยวขี้เซา"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3-1.png');
    $('#text3').html(rank);
  }
  else if(rank=="ไนติงเกลร้องเพลง"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('.active4').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
    $('#pic4').attr('src', 'pic/4.png');
  }
  else if(rank=="ไนติงเกลเจ็บคอ"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('.active4').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
    $('#pic4').attr('src', 'pic/4-1.png');
    $('#text4').html(rank);
  }
  else if(rank=="ชีต้าร์วิ่งล่า"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('.active4').attr('class', 'active');
    $('.active5').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
    $('#pic4').attr('src', 'pic/4.png');
    $('#pic5').attr('src', 'pic/5.png');
  }
  else if(rank=="ชีต้าร์เหนื่อย"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('.active4').attr('class', 'active');
    $('.active5').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
    $('#pic4').attr('src', 'pic/4.png');
    $('#pic5').attr('src', 'pic/5-1.png');
    $('#text5').html(rank);
  }
  else if(rank=="เจ้าป่าแสนชำนาญ"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('.active4').attr('class', 'active');
    $('.active5').attr('class', 'active');
    $('.active6').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
    $('#pic4').attr('src', 'pic/4.png');
    $('#pic5').attr('src', 'pic/5.png');
    $('#pic6').attr('src', 'pic/6.png');
  }
  else if(rank=="เจ้าป่าง่วงนอน"){
    $('.active2').attr('class', 'active');
    $('.active3').attr('class', 'active');
    $('.active4').attr('class', 'active');
    $('.active5').attr('class', 'active');
    $('.active6').attr('class', 'active');
    $('#pic2').attr('src', 'pic/2.png');
    $('#pic3').attr('src', 'pic/3.png');
    $('#pic4').attr('src', 'pic/4.png');
    $('#pic5').attr('src', 'pic/5.png');
    $('#pic6').attr('src', 'pic/6-1.png');
    $('#text6').html(rank);
  }
  else {

  }
}
