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
    $keys[] = date('F', mktime(0, 0, 0, $month, 1, date('Y')));
  }
  $calendar = array_fill_keys($keys, "0");

  $query = "SELECT monthname(created_datetime) as monthname, count(id) as count from posts group by monthname(created_datetime) order by monthname(created_datetime)";

  $result = mysqli_query($db, $query);

  while( $post = mysqli_fetch_assoc($result)){
    $months[] = $post['monthname'];
    $count[] = $post['count'];
  }
  $fetched_data = array_combine($months, $count);
  $merge = array_merge($calendar, $fetched_data);
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
      <div class="col-md-1"><a href="monthly.php" class="btn btn-light">Monthly</a></div>
      <div class="col-md-1"><a href="yearly.php" class="btn btn-secondary">Yearly</a></div>
      
      <div>
        <canvas id="myChart"></canvas>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        const ctx = document.getElementById('myChart');
        const labels = <?php echo json_encode($label) ?>;
        new Chart(ctx, {
          type: 'bar',
          data: {
            //labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            labels: labels,
            datasets: [{
              label: '# Yearly Created Post',
              data: <?php echo json_encode($data); ?>,
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
