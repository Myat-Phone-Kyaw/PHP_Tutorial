<?php
date_default_timezone_set('Asia/Rangoon');
if (isset($_POST['submit'])) {
    $date1 = date_create($_POST['calDate']);
    $date2 = date_create(date('Y-m-d'));

    $diff = date_diff($date1, $date2);
    echo "Date Difference is : " . $diff->format("%y year, %m month and %d days");
}
?>