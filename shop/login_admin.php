<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/style.css">
  <link rel="icon" href="asset/mask.jpg">
  <style type="text/css">
    body{
      font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
      background: url(asset/kafe.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    h3{
      font-size: 50px;
      margin-bottom: 10px;
      background-color: white;
      border: 2px solid black;
      border-radius: 20px;
      padding: 10px;
    }
    div.logo img{
      border-radius: 25%;
      border: 2px solid black;
    }
    .form{
      background: #d6894a;
      border-radius: 20px;
      border: 2px solid black;
    }
  </style>

</head>

<body>
  <div class="login_form">
  <setion class="login-wrapper">

    <h3 style="" class="text-center">Lets Shopping</h3>

    <div class="logo">
     <img src="asset/masker.png" alt="">
    </div>

    <form id="login" method="post" action="valid1.php" class="form">
      <?php if (isset($_SESSION["message"])): ?>
        <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
          <?php echo $_SESSION["message"]["message"]; ?>
          <?php unset($_SESSION["message"]); ?>
        </div>
      <?php endif; ?>
      <span class="fas fa-user" style="font-size: 20px; margin: 10px;"></span><input style="border: 2px solid black; width: 405px; margin-left: 6px; " placeholder="Username" class="email" required name="username" type="text" autocapitalize="off" autocorrect="off" />
      <br>
      <span class="fas fa-key" style="font-size: 20px; margin: 10px; "></span><input style="border: 2px solid black; width: 405px; margin-left: 5px;" placeholder="Password" class="password" required name="password" type="password" />
      <button type="submit" style="background: #613613; color: white; margin-top: 0;">Sign In</button>
    </form>

  </section>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="asset/js/index.js"></script>
</body>
</html>
