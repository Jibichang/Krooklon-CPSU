<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ครูกลอน</title>
  <link rel="icon" href="pic/logox.png">
  <meta name="warunee" content="Adtile">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/style_register.css">
  <link rel="stylesheet" href="css/styles_menu.css">
  <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <link rel="stylesheet" href="css/ie.css">
  <![endif]-->
  <script src="js/responsive-nav.js"></script>


</head>
<body>
<?php include("header.php"); ?>
      <br>
      <div class="row-regist">
        <div class="col-regist">
          <form id="login_form" method="post">
            <img src="pic/logo1.png" width="250px" id="logokk">
            <p>เข้าสู่ระบบ</p>
            <input name="email"  type="email" id="email" placeholder="Email" required autofocus><br>
            <input name="password"  type="password" id="password" placeholder="Password" required><br>
            <input type="submit"  class="regbutton" value="เข้าสู่ระบบ" name="submit" id="login_form"><br>
            <br>
            <div id="response"></div>
            <a href="<?php echo $login_url; ?>" id="api"><img src="pic/twitter.png" class="apilog"></a>
            <a href="#" onclick="facebookLogin();" id="api"><img src="pic/facebook.png" onclick="facebookLogin();" class="apilog"></a>
            <a href="#" id="api"><img src="pic/google-plus.png" class="apilog" id="customBtn"></a><br>
            <p>ยังไม่ได้เป็นสมาชิก  <a href="index_regist.php">สมัครสมาชิก</a></p><br>

          </form>
        </div>
      </div>

  <script src="api/app/member/login_member.js"></script>
        <script src="js/fastclick.js"></script>
        <script src="js/scroll.js"></script>
        <script src="js/fixed-responsive-nav.js"></script>
      </body>
      </html>
