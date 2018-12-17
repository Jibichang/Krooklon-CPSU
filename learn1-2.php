<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ครูกลอน</title>
  <link rel="icon" href="pic/logox.png">
  <meta name="warunee" content="Adtile">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/styles_menu.css">
  <link rel="stylesheet" href="css/style_content.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="css/style_content_learn.css"> -->
  <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
  <script type="text/javascript">
  page = "learn1";
  subChapter = "100";
  </script>
  <script src="api/app/member/learn.js"></script>

</head>
<body>
  <?php include('topbar.php') ?>
  <section style="margin-top:30px;" id="content-learn">
    <h2>บทที่ 1 : เรียนรู้กลอนเบื้องต้น</h2>
    <div class="row-learn-content">
      <img src="pic/learn.jpg">
      <p align="left">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>โครงสร้างและองค์ประกอบของกลอนสุภาพ</b><br><br>
        1) พยางค์ คือ เสียงที่เปล่งออกมา จะมีความหมายหรือไม่มีความหมายก็ได้ <br><br>
        2) โดยกลอนสุภาพ 1 วรรค จะมี 8 พยางค์ (อนุโลมให้มี 7-9 พยางค์) <br><br>
        3) โดยกลอนสุภาพ 1 บท มี 2 บาท แบ่งได้ดังนี้ <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	บาทที่ 1 เรียกว่า บาทเอก ประกอบด้วย วรรคสลับ และวรรครับ<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	บาทที่ 2 เรียกว่า บาทโท  ประกอบด้วย วรรครอง และ วรรคส่ง<br><br>
        4) 	บท โดยกลอนสุภาพ 1 บท มี 4 วรรค แต่ละวรรคมีชื่อเรียกดังนี้<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	วรรคที่ 1 เรียกว่า วรรคสดับ (สลับ) เป็นวรรคแรกของบทและทิ้งสัมผัสเสียงไปยังวรรครับ<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	วรรคที่ 2 เรียกว่า วรรครับ เป็นวรรคที่รับสัมผัสจากคำสุดท้ายจากบทกลอน และรับสัมผัสเสียงจากคำสุดท้ายของวรรคสดับ <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	วรรคที่ 3 เรียกว่า วรรครอง เป็นวรรครองสุดท้ายของกลอนแต่ละบท และรับสัมผัสมาจากวรรครับ<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-	วรรคที่ 4 เรียกว่า วรรคส่ง เป็นวรรคที่ส่งสัมผัสเสียงไปยังวรรครับของบทถัดไป

        <br><br>
      </p>
      </div>
      <div class="button-learn">
        <button type="submit" class="buttonlearn" value="learn1" name="ch" id="pre">
          <a href="learn.php">หน้าหลักบทเรียน</a></button>
          <a href="learn1.php" class="mini_button">1</a>
          <a href="" class="mini_button">2</a>
          <button type="submit" class="buttonlearn" value="learn1" name="ch" id="next">
            <a href="learn2.php">หน้าถัดไป</a></button>
      </div>
      </section>
      <br><br><br><br>
        <?php include('footer.php'); ?>
      </body>
      </html>
