<!DOCTYPE html>
<html>
<head>
    <title>Online Bus Ticket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="icon/bus.png" sizes="16*16">
    <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/log in.css">
    <link rel="stylesheet" type="text/css" href="css/sign in.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="js/sign in.js"></script>
    <script src="js/cookie.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>
<ul class="nav_custom">
  <li class="nav_custom"><a href="index.html">Home</a></li>
  <li class="nav_custom"><a class="nav_link">Buy a Ticket</a></li>
  <li class="nav_custom"><a href="#contact">Profile</a></li>
  <li class="nav_custom"><a href="#about">Contuct Us</a></li>
  <li class="nav_custom"><a href="#about">Log Out</a></li>
</ul>
<div class="common_div">
  <?php include('php/buses.php'); ?>
  <div id="modal_curtain" class="modal_curtain" ></div>
  <!-- modal for log in -->
  <div id="div_log_in" class="modal_log_in animate_log_in">
    <form action="php/log in.php" method="POST">
      <span onclick="funcCloseLogIn()" class="close_log_in" title="Close">&times;</span>

    <div class="modal_log_in_header">Log in</div>
    <div class="log_in_modal_container">

      <label class="label_log_in" for="mail_log_in"><b>E-mail</b></label><br>
      <input class="input_log_in" type="text" name="mail_log_in" placeholder="Enter E-mail" required>

      <label class="label_log_in" for="pass_log_in"><b>Password</b></label><br>
      <input class="input_log_in" type="Password" name="pass_log_in" placeholder="Enter Password" required>

      <button class="button_log_in" name="button_log_in" type="submit">Log in</button>
      <br>
      <input type="checkbox" checked="checked" name="remember_log_in"> Remember me
    </div>

    <div class="log_in_modal_footer">
      <button onclick="funcCloseLogIn()" class="cancel_log_in">Cancel</button>
      <span class="go_to_sign_in">Not yet account? <a href="#" onclick="funcSignIn()">Sign in</a></span>
    </div>

    </form>
  </div>
  <!-- modal for sign in -->
  <div id="div_sign_in" class="modal_sign_in animate_log_in">
    <form action="php/sign in.php" method="POST">
      <span onclick="funcCloseSignIn()" class="close_log_in" title="Close">&times;</span>

      <div class="modal_sign_in_header">Create an account</div>
      <div class="log_in_modal_container">

      <label class="label_log_in" for="mail_sign_in"><b>E-mail</b></label><br>
      <input class="input_log_in" type="text" name="mail_sign_in" placeholder="Enter E-mail" required>

      <label class="label_log_in" for="pass_sign_in"><b>Password</b></label><br>
      <input class="input_log_in" type="Password" name="pass_sign_in" placeholder="Enter Password" required>

      <label class="label_log_in" for="re_pass_sign_in"><b>Repeat Password</b></label><br>
      <input class="input_log_in" type="Password" name="re_pass_sign_in" placeholder="Re-Enter Password" required>

      <button class="button_log_in" name="button_sign_in" type="submit">Sign in</button>
      <br>
      <input type="checkbox" checked="checked" name="remember_sign_in"> Remember me
    </div>

    <div class="log_in_modal_footer">
      <button onclick="funcCloseSignIn()" class="cancel_log_in">Cancel</button>
      <span class="go_to_sign_in">Already have an account? <a href="#" onclick="funcLogIn()">Log in</a></span>
    </div>

    </form>
    <script type='text/javascript'>
                if (checkCookie()!="") {
                  document.getElementById('modal_curtain').style.display="none";
                  document.getElementById('div_log_in').style.display = "none";

                }
            </script>
  </div>
  <?php include('php/test.php'); ?>
</div>
</body>
</html>