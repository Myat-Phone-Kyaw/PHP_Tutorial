<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
  require "connect.php";

  for ($month = 1; $month <= 12; $month++){
    $keys[] = date('Y-m-d', mktime(0, 0, 0, , $date, date('Y')));
  }
  $calendar = array_fill_keys($keys, "0");
echo "<pre>";
print_r($calendar);
echo "</pre>";

  $query = "SELECT date(created_datetime) as forday,count(day(created_datetime)) as count from posts group by forday order by forday ASC";
  

  $result = mysqli_query($db, $query);

  while( $post = mysqli_fetch_assoc($result)){
    $forday[] = $post['forday'];
    $count[] = $post['count'];
  }

  echo "<pre>";
print_r($forday);
print_r($count);
echo "</pre>";
  
  $fetched_data = array_combine($forday, $count);
  $merge = array_merge($calendar, $fetched_data);
  echo "<pre>";
print_r($fetched_data);
print_r($merge);
echo "</pre>";
  foreach ($merge as $key => $value){
    $label[] = $key;
    $data[] = $value;
  }
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <a href="index.php" class="btn btn-secondary">Back</a>
      </div>
      <div class="col-md-1"><a href="weekly.php" class="btn btn-light">Weekly</a></div>
      <div class="col-md-1"><a href="monthly.php" class="btn btn-secondary">Monthly</a></div>
      <div class="col-md-1"><a href="yearly.php" class="btn btn-light">Yearly</a></div>

      <div>
        <canvas id="myChart"></canvas>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        const ctx = document.getElementById('myChart');
        const labels = <?php json_encode($label) ?>
        new Chart(ctx, {
          type: 'bar',
          data: {
            //labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            labels: labels,
            datasets: [{
              label: '# Monthly Created Post',
              data: <?php json_encode($data) ?>,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>
  </div>   
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
