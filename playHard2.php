<?php include("sessionStart.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ครูกลอน</title>
    <link rel="icon" href="pic/logox.png">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/styles_menu.css">
    <link rel="stylesheet" href="css/style_content.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <script type="text/javascript">
      var sessionid = "<?php echo $_SESSION['id']; ?>";
      var sec = 600;
    </script>
    <script src="api/app/game/playHard.js"></script>

  <style media="screen">
  a {
    text-decoration: none;
  }
  .row-about {
    width: 95%;
    box-sizing: border-box;
    margin: 2.5%;
    text-align: center;
    margin-top: 30px;
    display: flex;
  }

  .row-about:after {
    display: table;
    clear: both;
  }

  .col-about, .col-about-game {
    float: none;
    width: 100%;
    padding: 10px;
    display: table-cell;
    text-align: center;
    vertical-align: top;
    flex: 1;
  }
  .col-about-game {
    text-align: left;

  }
  .col-about-game input[type=text] {
    font-size: 20px;
    padding: 8px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #ffcc66;
    width: 70%;
    outline: none;
  }
  .col-about-game input[type=text]:focus {
    border: 2px solid #ffcc66;
  }
  .col-about img {
    width: 70%;
    cursor: pointer;
  }


  @media screen and (max-width: 600px) {
    .row-about {
      display: table;
    }
     .col-about, .col-about-game {
      width: 100%;
      float: left;
      padding: 10px;
      text-align: center;
      font-size: 30%;
    }

    .col-about img {
      width: 60%;
    }

  }

  .play-button {
    -webkit-transition-duration: 0.3s;
    text-decoration: none;
    color: black;
    padding: 15px 30px 15px 30px;
    background-color: #ffcc66;
    border-radius: 8px;
    border: 2px solid #ffcc66;
    cursor: pointer;
  }
  .play-button a {
    text-decoration: none;
    color: black;
  }
  .play-button:hover {
    background-color: #fff;
    box-shadow: 0px 5px 0px  #ffcc66;
  }
  </style>
  </head>
  <body>
    <?php include("topbar.php"); ?>
    <script>$('.menu-game').attr('class', 'active');</script>
    <section id="mainPlay" style="margin-top:30px;">
    <h1 id="modeplay_header">เล่นเกมแต่งกลอน</h1>
    <div id="OutputText"><h4> &nbsp; </h4></div>
    <div id="OutputText"><h5 style="color:red;">(กรุณากดส่งก่อนหมดเวลา)</h5></div>
      <div class="row-about">
        <div class="col-about" id="medMode">
            <img src="pic/avatar.png" style="width: 72px" ><br>
              <script src="api/app/member/getinfogame.js"></script>
              <h3><span id="username"></span></h3><br>
              <h4>ระดับยศ : <span id="rank"></span>
              <p class="lead">
                <span id="coin"></span> เหรียญ
              </p></h4>
        </div>

        <div class="col-about-game">
          <form action="#" method="post" onsubmit="return confirm('คุณแน่ใจที่จะส่งกลอนแล้วใช่มั้ย?');">
            <input type=text id="textBoxKlon" name="klon1" onkeyup="Hard2()"><br>
            <input type=text id="textBoxKlon2" name="klon2" onkeyup="Hard2()"><br>
            <input type=text id="textBoxKlon3" name="klon3" onkeyup="Hard2()"><br>
            <input type=text id="textBoxKlon4" name="klon4" onkeyup="Hard2()"><br>
            <br>
            <input type=text id="textBoxKlon5" name="klon5" onkeyup="Hard2()"><br>
            <input type=text id="textBoxKlon6" name="klon6" onkeyup="Hard2()"><br>
            <input type=text id="textBoxKlon7" name="klon7" onkeyup="Hard2()"><br>
            <input type=text id="textBoxKlon8" name="klon8" onkeyup="Hard2()"><br>
            <button id="sub" type="submit" name="button" class="play-button">
            <a href="#" ><h3>ส่งกลอน</h3></a>
            </button>
          </form>
          <div style="padding-top:20px; text-align: right; margin-right: 1em;">
            <a onclick="return confirm('คุณแน่ใจที่จะออกจากการเล่นเกม?');" href="playMode.php" id="exit">
            <div><img class="thumbnail" src="pic/logout.png" width="10%"></div>
                <h5>ออกจากการเล่นเกม</h5></a>
          </div>
        </div>
      </div>

      <div class="result">


      </div>

    </section>

    <?php include('footer.php'); ?>

  </body>
</html>
