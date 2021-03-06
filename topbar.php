<header>
  <script src="api/app/member/login_member.js">
  $(document).ready(function(){
    $(document).on('click', '#logout', function(){
      setCookie("jwt", "", 1);
      alert("ออกจากระบบเรียบร้อยแล้ว");
      location.replace("index.php");
    });
  });
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  </script>
  <a href="main.php" class="logo" data-scroll>
    <img src="pic/logo1.png" style="height: 48px" class="logo"></a>

    <div class="dropdown" style="float:right;">
      <a href="#">
        <img src="pic/avatar.png" style="height: 48px" class="user"></a>
        <div class="dropdown-user">
          <a href="editProfile.php" >แก้ไขข้อมูล</a>
          <a href="" id="logout">ออกจากระบบ</a>
        </div>
      </div>

      <nav class="nav-collapse">
        <ul>
          <li class="menu-main"><a href="main.php" data-scroll>หน้าแรก</a></li>
          <li class="menu-learn"><a href="learn.php" data-scroll>เรียนรู้การแต่งกลอน</a></li>
          <li class="menu-game"><a href="playMode.php#mainPlay" >เล่นเกม</a></li>
          <!-- target="_blank" -->
          <li class="menu-comm"><a href="comment.php" data-scroll>แสดงความคิดเห็น</a></li>
          <li class="menu-rank"><a href="rankPlayer.php" data-scroll>อันดับ</a></li>
          <li class="menu-about"><a href="main.php#about" data-scroll>เกี่ยวกับ</a></li>
        </ul>
      </nav>

      <script src="js/responsive-nav.js"></script>
      <script src="js/fastclick.js"></script>
      <script src="js/scroll.js"></script>
      <script src="js/fixed-responsive-nav.js"></script>
</header>
