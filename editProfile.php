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
  <!-- <script src="api/app/member/login_member.js"></script> -->

  <script type="text/javascript">

    $(document).ready(function(){
        var jwt = getCookie('jwt');
        // alert(jwt);
        $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
          // alert("ok");
          // if response is valid, put user details in the form
          $('#username').attr("value", result.data.username);
          $('#email').attr("value", result.data.email);
          $('#id').attr("value", result.data.id);
          // $("#username").val(result.data.username);
          // $("#email").val(result.data.email);
        })
        .fail(function(result){
          location.replace("index.php");
        });

        $(document).on('submit', '#update_account_form', function(){

          var update_account_form=$(this);
          var jwt = getCookie('jwt');

          // get form data
          var update_account_form_obj = update_account_form.serializeObject()
          update_account_form_obj.jwt = jwt;
          var form_data=JSON.stringify(update_account_form_obj);
            $('#response').html(form_data);
          $.ajax({
            url: "api/member/update_user.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
              alert("ok");
              // tell the user account was updated
              $('#response').html("<div class='alert alert-success'>Account was updated.</div>");

              // store new jwt to coookie
              setCookie("jwt", result.jwt, 1);
            },

            // show error message to user
            error: function(xhr, resp, text){
              alert("no");
              if(xhr.responseJSON.message=="Unable to update user."){
                $('#response').html("<div class='alert alert-danger'>Unable to update account.</div>");
              }
              else if(xhr.responseJSON.message=="Access denied."){
                // showLoginPage();
                $('#response').html("<div class='alert alert-success'>Access denied. Please login</div>");
              }

            }
          });

          return false;
        });


    });

    function getCookie(cname){
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){
          c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }


            $.fn.serializeObject = function(){

              var o = {};
              var a = this.serializeArray();
              $.each(a, function() {
                if (o[this.name] !== undefined) {
                  if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                  }
                  o[this.name].push(this.value || '');
                } else {
                  o[this.name] = this.value || '';
                }
              });
              return o;
            };

  </script>
</head>
<body>
  <?php include("topbar.php"); ?>
  <section id="home" style="margin-top:30px;">
    <h1>แก้ไขข้อมูลส่วนตัว</h1>
    <br>

    <div class="row-com">
      <div class="img-com">
        <a href="#">
          <img src="pic/avatar.png"></a>
        </div>
        <div class="form-com">
          <form method="post" id="update_account_form" >
            <!-- <input type="text" name="id" value="" id="id"> -->
            ชื่อผู้เล่น :<br>
            <input type=text name="username" value="" id="username"/><br>
            อีเมล์ :<br>
            <input type=text name="email" value="" id="email" readonly/><br>
            รหัสผ่าน : <br>
            <input type="password" class="form-control" name="password" id="password" /><br>
            <input type="submit" style="width:120px; height:40px; margin-top:4px;"
            class="regbutton" value="แก้ไขข้อมูลส่วนตัว" name="submit" id="update_account_form">

          </form><br><div id="response">  </div>
        </div>

      </div>
      <div class="rank" id="table" > </div><br>
    </section>

    <?php include('footer.php'); ?>
  </body>
  </html>
