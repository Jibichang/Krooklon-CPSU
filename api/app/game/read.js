$(document).ready(function(){
    showGames();
});

function showGames(){
  $.getJSON("api/game/read.php", function(data){
    var x = "";

    $.each(data.records, function(key, val) {
      x = val.$username+" "+val.$levelplay+" "+val.$modeplay+" "+val.$botplay+" "+
      val.$status+" "+val.$onlineLastTime;
      
    });
  });
}
