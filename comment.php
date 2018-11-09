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
    <script src="api/app/comment/comment.js"></script>
    <script type="text/javascript">
      var sessionid = "<?php echo $_SESSION['id']; ?>";
    </script>

  </head>

  <body>
    <?php include("topbar.php"); ?>
    <script type="text/javascript"> $('.menu-comm').attr('class', 'active'); </script>
    <section id="home" style="margin-top:30px; height:500px;">
      <h1>แก้ไขข้อมูลส่วนตัว</h1>
      <br>

      <div class="row-com">
          <div class="img-com">
            <a href="#">
              <img src="pic/avatar.png"></a>
          </div>

          <div class="form-com">
            <form action="#" method="post" id='send-comment' >
              ชื่อผู้เล่น :<br>
              <input type="text" value="" id="username"  readonly/><br>
              <br>
              แสดงความคิดเห็น (200ตัวอักษร) : <br>
              <textarea id="comment" maxlength=200></textarea> <br>
              <button type="submit" name="button" class="regbutton" style="width:120px; height:42;" >ส่งความคิดเห็น</button>

            </form>
          </div>

      </div>
      <div class="rank" id="table" ></div><br>
    </section>

    <?php include('footer.php'); ?>

  </body>
</html>
