<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body>
  <div class="signupFrm">
    <div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
      <h1 class="title">Registrarse</h1>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a" id="email" name="email" value="">
        <label for="" class="label">Email</label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a" id="userName" name="userName" value="">
        <label for="" class="label">Username</label>
      </div>

      <div class="inputContainer">
        <input type="password" class="input" placeholder="a" id="password" name="password" >
        <label for="" class="label">Password</label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a" id="confirm-password" name="confirmPassword">
        <label for="" class="label">Confirm Password</label>
      </div>

      <input type="submit" class="submitBtn" value="Sign up" name="submit">
    </form>
    </div>
  </div>
</body>
</html>