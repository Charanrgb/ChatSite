<!DOCTYPE html>
<html lang="en" style="background-color: #479CA9">

<head>
  <link rel="stylesheet" href="style.css">
  <title>Login Page</title>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
    }
  </style>

</head>

<body>
  <?php if (isset($_GET['error'])) : ?>
    <p><?php echo $_GET['error']; ?></p>
  <?php endif ?>
  <div class="everything">
    <header class="Center"><a href="home.php"><img src="logo.png" alt="logo" width="250px" height="70px"></a></header>


    <form method="POST" action="verify.php">

      <table class="Center">
        <tr>
          <td style="padding-bottom: 1%;"><b style="font-size: 25px; color:#fdfdfe">Login</b></td>
        </tr>
        <tr>
          <td><input id="username" type="text" placeholder="Your Name.." name="username" required></td>
        </tr>
        <tr>
          <td><input type="password" placeholder="Enter Password" name="pass" required></td>
        </tr>
        <tr>
          <td><button type="submit" value="Login" name="login">Login</button></td>
        </tr>
      </table>
    </form>

    <table>
      <tr>
        <td style="padding-bottom: 5px;font-size: 18px; color:#fdfdfe"><b>New to the Circle? <a href="registration.php"><button style="background-color: #04aeee;color:white; font-weight:bold; width:170px;"> Create Account</button></a></b></td>
      </tr>
    </table>

  </div>
</body>
<?php

if (isset($_GET['flag'])) {
  if ($_GET['flag'] == false) {
    echo '<script src = "JavaScript.js">
      </script>
      <script>
      change();
      </script>
      ';
  }
}
?>

</html>