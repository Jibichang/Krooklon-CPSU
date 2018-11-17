<?php include("sessionStart.php") ?>
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
  max_count = 11;
  </script>
  <script src="api/app/member/getinfogame.js"></script>
  <script src="api/app/game/History.js"></script>
  <style media="screen">
    *{
      text-align: center;
    }
  </style>
</head>
<body>
  <?php include("topbar.php"); ?>
  <script type="text/javascript"> $('.menu-main').attr('class', 'active'); </script>

  <section id="home" style="margin-top:30px;">
    <h1>ประวัติการเล่นเพิ่มเติม</h1>
    <div class="history-div"></div>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
