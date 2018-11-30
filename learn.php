<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ครูกลอน</title>
  <link rel="icon" href="pic/logox.png">
  <meta name="warunee" content="Adtile">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/styles_menu.css">
  <link rel="stylesheet" href="css/style_content.css">
  <link rel="stylesheet" href="css/style_content_learn.css">
  <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
  <script type="text/javascript" src="js/learn_canvas.js"></script>

</head>
<body>
  <?php include('topbar.php') ?>
  <section id="home" style="margin-top:30px;">
    <h1>เข้าสู่การเรียนรู้การแต่งกลอน</h1>
    <h3>เรียนรู้การแต่งกลอนให้ไพเราะและถูกต้องตามฉันทลักษณ์</h3><br>
<hr><br>
    <div class = "center_content">
      <div class = "topic_learn">
        <form action = "learn1.php">
          <button type = "submit">
            <h1>บทที่ 1</h1>
            <p>ความรู้เบื้องต้นเกี่ยวกับกลอน</p><br>
            <div class="canvas-wrap">
              <canvas id="chart1" ></canvas><br>
              <span id="procent1"></span>
            </div>
          </button>
        </form>
      </div>
      <div class = "topic_learn">
        <form action = "learn2.php">
          <button type = "submit">
            <h1>บทที่ 2</h1>
            <p>เรียนรู้ข้อบังคับและสัมผัสของกลอนสุภาพ</p><br>
            <div class="canvas-wrap">
              <canvas id="chart2"></canvas><br>
              <span id="procent2"></span>
            </div>
          </button>
        </form>
      </div>
      <div class = "topic_learn">
        <form action = "learn3.php">
          <button type = "submit">
            <h1>บทที่ 3</h1>
            <p>เพิ่มความไพเราะ</p><br>
            <div class="canvas-wrap">
              <canvas id="chart3"></canvas><br>
              <span id="procent3"></span>
            </div>
          </button>
        </form>
      </div>
    </div>
    <br><br>
  </section>

  <?php include('footer.php'); ?>
</body>
</html>
