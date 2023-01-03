<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<body>
    <?php
    require "connect.php";

    for ($day = 3; $day <= 9; $day++) {
        $keys[] = date('l', mktime(0, 0, 0, 1, $day, date('Y')));
    }
    $calendar = array_fill_keys($keys, "0");

    $query = "SELECT dayname(created_datetime) as day, count(id) as count from posts where week(created_datetime)=week(now()) group by dayname(created_datetime)";

    $result = mysqli_query($db, $query);

    $days = [];
    $count = [];
    while ($post = mysqli_fetch_assoc($result)) {
        $days[] = $post['day'];
        $count[] = $post['count'];
    }

    $fetched_data = array_combine($days, $count);
    $merge = array_merge($calendar, $fetched_data);

    foreach ($merge as $key => $value) {
        $label[] = $key;
        $data[] = $value;
    }
    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-md-1"><a href="weekly.php" class="btn btn-secondary">Weekly</a></div>
            <div class="col-md-1"><a href="monthly.php" class="btn btn-light">Monthly</a></div>
            <div class="col-md-1"><a href="yearly.php" class="btn btn-light">Yearly</a></div>

            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        const labels = <?php echo json_encode($label) ?>;
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# Weekly Created Post',
                    data: <?php echo json_encode($data??$data) ?>,
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

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>