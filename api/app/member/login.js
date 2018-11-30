$(document).ready(function(){
  // show sign up / registration form
  $(document).on('click', '#sign_up', function(){

    var html = `
    <div class="col-regist">
      <form id='sign_up_form'>
        <img src="pic/logo1.png" width="250px">
        <p>สมัครสมาชิก</p>
        <input name="email"  type="email" id="email" placeholder="Email" required autofocus><br>
        <input name="password"  type="password" id="password" placeholder="Password" required><br>
        <input name="conpass" type="password" id="conpass" placeholder="Confirm password" required><br>
        <input type="submit"  class="regbutton" value="สมัครสมาชิก" name="submit"><br>

        <a href="<?php echo $login_url; ?>" id="api"><img src="pic/twitter.png" width="50px"></a>
        <a href="#" onclick="facebookLogin();" id="api"><img src="pic/facebook.png" onclick="facebookLogin();" width="50px"></a>
        <a href="#" id="api"><img src="pic/google-plus.png" width="50px" id="customBtn"></a><br>
        <p>เป็นสมาชิกอยู่แล้ว  <a href="" id="log_in">เข้าสู่ระบบ</a></p><br>
      </form>
    </div>
  </div>  `;

    clearResponse();
    $('#content').html(html);
  });

  // trigger when registration form is submitted
  $(document).on('submit', '#sign_up_form', function(){

    // get form data
    var sign_up_form=$(this);
    var form_data=JSON.stringify(sign_up_form.serializeObject());

    // submit form data to api
    $.ajax({
      url: "api/member/create.php",
      type : "POST",
      contentType : 'application/json',
      data : form_data,
      success : function(result) {
        // if response is a success, tell the user it was a successful sign up & empty the input boxes
        $('#response').html("<div class='alert alert-success'>Successful sign up. Please login.</div>");
        sign_up_form.find('input').val('');
      },
      error: function(xhr, resp, text){
        // on error, tell the user sign up failed
        $('#response').html("<div class='alert alert-danger'>Unable to sign up. Please contact admin.</div>");
      }
    });

    return false;
  });

  // show login form
  $(document).on('click', '#login', function(){
    showLoginPage();
  });

  // trigger when login form is submitted
  $(document).on('submit', '#login_form', function(){
    // get form data
    var login_form=$(this);
    var form_data=JSON.stringify(login_form.serializeObject());
    alert(form_data);
    // submit form data to api

    $.ajax({
      url: "api/member/login.php",
      type : "POST",
      contentType : 'application/json',
      data : form_data,
      success : function(result){
        // store jwt to cookie
        setCookie("jwt", result.jwt, 1);
        // show home page & tell the user it was a successful login
        showHomePage();
        $('#response').html("<div class='alert alert-success'>Successful login.</div>");
      },
      error: function(xhr, resp, text){
        // on error, tell the user login has failed & empty the input boxes
        $('#response').html("<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>");
        login_form.find('input').val('');
      }
    });
    return false;
  });

  // show home page
  $(document).on('click', '#home', function(){
    showHomePage();
    clearResponse();
  });


  // remove any prompt messages
  function clearResponse(){
    $('#response').html('');
  }

  // show login page
  function showLoginPage(){

    // remove jwt
    setCookie("jwt", "", 1);

    // login page html
    var html = `
    <div class="row-regist">
      <div class="col-regist">
        <form class="register" action="">
          <img src="pic/logo1.png" width="250px">
          <p>เข้าสู่ระบบ</p>
          <input name="email"  type="email" id="email" placeholder="Email" required autofocus><br>
          <input name="password"  type="password" id="password" placeholder="Password" required><br>
          <button type='submit' class=''>เข้าสู่ระบบ</button>

          <a href="<?php echo $login_url; ?>" id="api"><img src="pic/twitter.png" width="50px"></a>
          <a href="#" onclick="facebookLogin();" id="api"><img src="pic/facebook.png" onclick="facebookLogin();" width="50px"></a>
          <a href="#" id="api"><img src="pic/google-plus.png" width="50px" id="customBtn"></a><br>
          <p>ยังไม่ได้เป็นสมาชิก  <a href="" id="sing_up">สมัครสมาชิก</a></p><br>

        </form>
      </div>
    </div>
    `;

    $('#content').html(html);
    clearResponse();
  }

  // function to set cookie
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  // show home page
  function showHomePage(){

    // validate jwt to verify access
    var jwt = getCookie('jwt');
    $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {

      location.replace("main.php");

      // if valid, show homepage
      // var html = `
      // <div class="card">
      // <div class="card-header">Welcome to Home!</div>
      // <div class="card-body">
      // <h5 class="card-title">You are logged in.</h5>
      // <p class="card-text">You won't be able to access the home and account pages if you are not logged in.</p>
      // </div>
      // </div>
      // `;

      // $('#content').html(html);
      // showLoggedInMenu();
    })

    // show login page on error
    .fail(function(result){
      showLoginPage();
      // $('#response').html("<div class='alert alert-danger'>Please login to access the home page.</div>");
    });
  }

  // get or read cookie
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

    // on error/fail, tell the user he needs to login to show the account page
    .fail(function(result){
      showLoginPage();
      $('#response').html("<div class='alert alert-danger'>Please login to access the account page.</div>");
    });
  }

  // function to make form values to json format
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
});
