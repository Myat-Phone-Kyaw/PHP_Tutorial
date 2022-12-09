<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Age Calculator</title>

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Age Calculator</h1>
  <div class="container">
    <form action="" method="POST">
      <label>Choose the date</label>
      <input type="date" name="calDate" max="<?= date('Y-m-d'); ?>" class="datepicker">

      <input type="submit" name="submit" value="Calculate date" class="submit">

    </form>
  </div>
</body>
</html>

<?php
include ('date-diff.php');
?>