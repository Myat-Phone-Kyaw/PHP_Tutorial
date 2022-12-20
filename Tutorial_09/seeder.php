<?php
include("lib/vendor/autoload.php");
include("connect.php");

$faker = Faker\Factory::create();
for ($i = 0; $i < 60; $i++) {
    $title = $faker->name();
    $content = $faker->paragraph();
    $publish =  $faker->numberBetween(0, 1);
    $createDate = $faker->dateTimeThisYear($max = "now", 'UTC')->format('Y-m-d H:i:s');
    $query = "insert into posts(title,content,is_published,created_datetime) values('" . $title . "','" . $content . "','" . $publish . "','" . $createDate . "')";
    $result = mysqli_query($db, $query);
}
?>
