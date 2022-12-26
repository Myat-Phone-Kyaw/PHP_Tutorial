<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<body>
    <?php
        require "connect.php";

        $total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($day = 1; $day <= $total_days; $day++) {
            $time = mktime(0, 0, 0, date('m'), $day, date('Y'));
            $keys[] = date('d-m-Y', $time);
        }
        $calendar = array_fill_keys($keys, "0");

        $mysql = "SELECT date(created_datetime) as date, COUNT(title) as post_count from posts 
        WHERE MONTH(created_datetime)=MONTH(now()) 
        GROUP BY date(created_datetime) ORDER BY date(created_datetime)";
        $query = mysqli_query($db, $mysql);

        while ($post = mysqli_fetch_assoc($query)) {
            $date[] = date("d-m-Y", strtotime($post['date']));
            $post_count[] = $post['post_count'];
        }

        $fetched_data = array_combine($date, $post_count);
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
            <div class="col-md-1"><a href="weekly.php" class="btn btn-light">Weekly</a></div>
            <div class="col-md-1"><a href="monthly.php" class="btn btn-secondary">Monthly</a></div>
            <div class="col-md-1"><a href="yearly.php" class="btn btn-light">Yearly</a></div>

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
                        labels: labels,
                        datasets: [{
                            label: '# Monthly Created Post',
                            data: <?php echo json_encode($data) ?>,
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


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>