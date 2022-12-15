<?php
include('login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Logout Form</title>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h1>Form</h1>
    <form action="<?php $_PHP_SELF ?>" method="POST">
      <input type="email" placeholder="Emal" name="email">
      <input type="password" placeholder="Password" name="password">

      <button type="submit" name="login" class="login">Login</button>
    </form>
  </div>
</body>

</html>