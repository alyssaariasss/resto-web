function myFunction() {
  var x = document.getElementById('user_pass');
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var y = document.getElementById('user_pass1');
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
  var z = document.getElementById('user_pass2');
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
}

function showLogin() {
  document.getElementById('login_').style.display="block";
}

function closeLogin() {
    document.getElementById('login_').style.display="none";
}

function closeResetpass() {
    document.getElementById('login_').style.display="block";
    document.getElementById('reset').style.display="none";
}

function backtoLogin() {
    document.getElementById('login_').style.display="block";
    document.getElementById('register_').style.display="none";
}

function showDiv() {
  div = document.getElementById('reset');
  div.style.display = "block";
  document.getElementById('login_').style.display="none";
}

function showReset() {
  div = document.getElementById('login_');
  div.style.display = "block";
  document.getElementById('reset').style.display="none";
}

function showRegister() {
  div = document.getElementById('register_');
  div.style.display = "block";
  document.getElementById('login_').style.display="none";
}
