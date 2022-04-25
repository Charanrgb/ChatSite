<!DOCTYPE html>
<html lang="en" style="background-color: #a9c8fd;">

<head>
  <link rel="stylesheet" href="style.css">
  <title>Registration Page</title>
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
  <div class="everything">
    <header class="Center"><a href="home.php"><img src="logo.png" alt="logo" width="250px" height="70px"></a></header>

    <form method="POST" action="Reg.php" enctype="multipart/form-data">

      <table class="Center">
        <tr>
          <td style="padding-bottom: 1%;"><b style="font-size: 25px; color:#fdfdfe">Create Account</b></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="User name" name="username" required></td>
        </tr>
        <tr>
          <td><input type="password" placeholder="At least 6 characters" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required></td>
        </tr>
        <tr>
          <td>
            <label>Profile pic:</label><input type="file" name="profilePic">
          </td>
        </tr>
        <tr>
          <td><button type="submit" value="Register" name="register" value="upload">Register</button></td>
        </tr>
      </table>
    </form>

    <table>
      <tr>
        <td style="padding-bottom: 5px;font-size: 18px; color:#fdfdfe"><b>Already have an Account? <a href="index.php"><button style="background-color: #04aeee;color:white; font-weight:bold; width:150px;"> Login</button></a></b></td>
      </tr>
    </table>
  </div>
</body>

</html>