<?php
  function diamond($n)
  {
  $space = 6;
  $i = 0;
  while($i < $n)
  {
    $j = 0;
    while ($j < $space) {
      echo " &nbsp;";
      $j++;
    }

    $j = 0;
    while($j <= $i)
    {
      echo "*";
      $j++;
    }

    echo "<br>";
    $space--;
    $i+=2;
  }

  $space = 2;
  $i = $n-2;
  while($i > 0)
  {
    
    $j = 0;
    while($j < $space){
      echo " &nbsp;";
      $j++;
    }

    $j = 0;
    while($j < $i){
      echo "*";
      $j++;
    }

    echo "<br>";
    $space++;

    $i-=2;
  }
}

diamond(11);
?>