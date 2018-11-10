<!DOCTYPE html>

<html ng-app="RadarChart">

<head>
  <meta charset="utf-8">
  <title>ครูกลอน</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">

    <style>
* {
	margin: 0;
	padding: 0;
}



body {
	background-color: transparent;
	color: #333;

}

#textBoxKlon,#textBoxKlon2,#textBoxKlon3,#textBoxKlon4 {
    border: none;
    border-bottom: 2px black solid;
    background-color:transparent;
    font-size:1.3rem;
        }
#exit {

  background-color: transparent;
  border-top-left-radius: 10px 10px;
  border-top-right-radius: 10px 10px;
  margin-right: 6px;
  border-left: 0px solid #000000 ;
  border-right: 0px solid #000000;
  border-top: 0px solid #000000;
    color: black;


        }
#exit:active,
#exit:hover,#exitt:focus{
  background-color:transparent;
    color: #FF9900;
    outline: 0; }
      </style>

</head>

<body>

  <!-- header -->
  <?php include 'checkSession.php';?>
  <?php include 'mainDB.php';
    $sql01 = "UPDATE onlinemember SET onlineLastTime=NOW() WHERE username='$usernameMe'";
    $query = mysqli_query($conn, $sql01);
    ?>
  <?php include 'battleDB.php';?>

  <header class="page-header">


  </header>


  <!-- main content -->
    <div class="callout" style="background-color:rgba(255,163,26,0.09);">
    <div class="row column text-center">


        <h4><p id="mainKlon" class="lead"><?php echo $modeplay; ?></p></h4>
        <div align="center" id="OutputText"><h4> &nbsp; </h4></div>
        <div align="center" id="OutputText"><h5>(กรุณากดส่งก่อนหมดเวลา)</h5></div>


      </div>
<br>

   <!-- main content -->
   <div class="row">
       <div class="small-1 large-1 columns"><h5></h5></div>
       <div id="score" class="small-3 large-3 columns text-left">
       <div class="progress playMe" role="progressbar" tabindex="0" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
       <div class="progress-meter" style="width:0%;"></div>
       </div>
       </div>

       <div class="small-1 large-1 columns"><h5></h5></div>

        </div>
        <!--- SESSION ---->

        <!-- main content -->
 <div class="row">
    <div class="small-2 large-2 columns text-left">
        <h1></h1>
     </div>
  <div class="small-3 large-3 columns text-left">

      <div class="small-6 large-6 columns text-left"><br><?php if($picMe!=""){?><img src="myPic/<?php echo $picMe ;?>" style="width :100px;height:100px;border-radius:50%;" ><?php } if($picMe1!=""){?><img src="<?php echo $picMe1 ;?>" style="width :100px;height:100px;border-radius:50%;" ><?php } ?></div>
      <div class="small-6 large-6 columns"><h5></h5></div>
      <div class="small-12 large-12 columns text-left">ชื่อผู้เล่น : <?php echo $usernameMe;?><br> ยศ : <?php echo $rank;?> <br>เหรียญ : <?php echo $coin;?></div>
     </div>


     <div class="small-6 large-6 columns text-center">
           <div class="small-12 large-12 columns text-center" style="height:500px;background-image: url('pic/notebook4.png');">
               <form action="dotString1.php" method="post" onsubmit="return confirm('คุณแน่ใจที่จะส่งกลอนแล้วใช่มั้ย?');">
               <div class="row" style="height:120px;"><h1></h1></div>
               <div class="small-3 large-3 columns"><h5></h5></div>
               <div class="small-9 large-9 columns"><input type=text id="textBoxKlon" name=klon1 onkeyup="myFunction()"></div>

               <div class="small-2 large-2 columns"><h5></h5></div>
               <div class="small-10 large-10 columns"><input type=text id="textBoxKlon2" name=klon2 onkeyup="myFunction()"></div>

               <div class="small-2 large-2 columns"><h5></h5></div>
               <div class="small-10 large-10 columns"><input type=text id="textBoxKlon3" name=klon3 onkeyup="myFunction()"></div>

               <div class="small-2 large-2 columns"><h5></h5></div>
               <div class="small-10 large-10 columns"><input type=text id="textBoxKlon4" name=klon4 onkeyup="myFunction()"></div>

               <div class="small-3 large-3 columns"><h5></h5></div>
               <input id="sub" type="submit" style="width:100px; height:42;" class="regbutton" value="ส่งกลอน" name="submit">

               </form>
         </div>


     </div>

     <div class="small-1 large-1 columns text-left">
        <h1></h1>
     </div>



</div>

    <!-- configuration -->
     <div class="row" style="padding-top:70px;padding-left:58rem">
         <div class="small-12 large-12 columns text-left">
         <a onclick="return confirm('คุณแน่ใจที่จะออกจากการเล่นเกม?');" href="manageExitGame2.php" id="exit">
         <div class="small-5 large-5 columns text-right"><img class="thumbnail" src="pic/logout.png"></div>
             ออกจากการเล่นเกม</a>
        </div>
        </div>



    </div>

  <!-- details -->



<?php include 'footer.php';?>


  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>

    <script>

  function myFunction() {
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
</script>

    <script>
	sec=480;
    min=(sec/60)-1;
    secc = sec%60;

	function time() {
		sec-=1;
        secc = sec%60;
		document.getElementById("OutputText").innerHTML="<h4>"+"<font color='black'>" + min + " นาที " + secc + " วินาที</font></h4>";

		if (sec==0) {
      $(window).unbind("beforeunload");
			window.location.replace("dotString1.php");

		}
        if (sec%60==0) {

			min-=1;

		}
		if (sec>0) {setTimeout("time()",1000);}

	}
	setTimeout("time()",500);
</script>
<script type="text/javascript" src="http://krooklon.plearnjai.com/clickheat/js/clickheat.js"></script><script type="text/javascript"><!--
clickHeatSite = 'krooklon.plearnjai.com';clickHeatGroup ='playhardonly1.php';clickHeatServer = 'http://krooklon.plearnjai.com/clickheat/click.php';initClickHeat(); //-->
</script>

<?php include_once("analyticstracking.php") ?>

</body>

</html>
