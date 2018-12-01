$(document).ready(function(){

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

$(document).on('submit', '#login_form', function(){
  // get form data
  var login_form=$(this);
  var form_data=JSON.stringify(login_form.serializeObject());
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

$(document).on('click', '#update_account', function(){
  //showUpdateAccountForm();
});

// trigger when 'update account' form is submitted
$(document).on('submit', '#update_account_form', function(){

  // handle for update_account_form
  var update_account_form=$(this);

  // validate jwt to verify access
  var jwt = getCookie('jwt');

  // get form data
  var update_account_form_obj = update_account_form.serializeObject()

  // add jwt on the object
  update_account_form_obj.jwt = jwt;

  // convert object to json string
  var form_data=JSON.stringify(update_account_form_obj);

  // submit form data to api
  $.ajax({
    url: "api/member/update_user.php",
    type : "POST",
    contentType : 'application/json',
    data : form_data,
    success : function(result) {

      // tell the user account was updated
      $('#response').html("<div class='alert alert-success'>Account was updated.</div>");

      // store new jwt to coookie
      setCookie("jwt", result.jwt, 1);
    },

    // show error message to user
    error: function(xhr, resp, text){
      if(xhr.responseJSON.message=="Unable to update user."){
        $('#response').html("<div class='alert alert-danger'>Unable to update account.</div>");
      }

      else if(xhr.responseJSON.message=="Access denied."){
        showLoginPage();
        $('#response').html("<div class='alert alert-success'>Access denied. Please login</div>");
      }
    }
  });

  return false;
});

// logout the user
$(document).on('click', '#logout', function(){
  setCookie("jwt", "", 1);
  alert("ออกจากระบบเรียบร้อยแล้ว");
  location.replace("index.php");
});

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// if the user is logged out
function showLoggedOutMenu(){
  // show login and sign up from navbar & hide logout button
  $("#login, #sign_up").show();
  $("#logout").hide();
}

// show home page
function showHomePage(){
  var jwt = getCookie('jwt');
  $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    location.replace("main.php");
  })
  .fail(function(result){
    location.replace("index.php");
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

// if the user is logged in
function showLoggedInMenu(){

}

function showUpdateAccountForm(){
  // validate jwt to verify access
  var jwt = getCookie('jwt');
  alert("ok");
  $.post("api/member/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
    alert("ok");
  })

  // on error/fail, tell the user he needs to login to show the account page
  .fail(function(result){
    // showLoginPage();
    $('#response').html("<div class='alert alert-danger'>Please login to access the account page.</div>");
  });
}

function clearResponse(){
  $('#response').html('');
}

function showLoginPage(){

    // remove jwt
    setCookie("jwt", "", 1);

    // login page html
    var html = `
    <h2>Login</h2>
    <form id='login_form' method='post'>
    <div class='form-group'>
    <label for='email'>Email address</label>
    <input type='email' class='form-control' id='email' name='email' placeholder='Enter email'>
    </div>

    <div class='form-group'>
    <label for='password'>Password</label>
    <input type='password' class='form-control' id='password' name='password' placeholder='Password'>
    </div>

    <button type='submit' class='btn btn-primary'>Login</button>
    </form>
    `;

    $('#content').html(html);
    clearResponse();
    showLoggedOutMenu();
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


});
