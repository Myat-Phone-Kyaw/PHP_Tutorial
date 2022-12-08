<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Date Calculator</title>
</head>
<body>
  <h1>Date Calculator</h1>
  <div class="container">
    <form action="" method="POST">
      <h1>Choose the date</h1>
      <input type="date" name="calDate" max="<?= date('Y-m-d'); ?>">

      <input type="submit" name="submit" value="Calculate date">

    </form>
  </div>
</body>
</html>

<?php
include ('date-diff.php');
?>