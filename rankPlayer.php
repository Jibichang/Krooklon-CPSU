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
    <script src="api/app/member/Rank.js"></script>
  </head>
  <body>
    <?php include("topbar.php"); ?>

    <script type="text/javascript"> $('.menu-rank').attr('class', 'active'); </script>
    <section id="home" style="margin-top:30px;">
      <h1>ตารางอันดับผู้เล่น</h1>
      <h4>เรียงตามลำดับคะแนนและยศ</h4>
      <br>
      <div class="rank" id="table" > </div><br>
    </section>

    <?php include('footer.php'); ?>
  </body>
</html>
