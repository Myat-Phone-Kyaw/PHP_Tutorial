<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 1 (Chess Board)</title>

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<table>
    <?php
    $col = 0;

    while ($col < 8) 
    {
        $row = 0;
        echo "<tr>";
        $value = $col;

        while ($row < 8)
        {
            if ($value % 2 == 0)
            {
                echo '<td class="white"></td>';
                $value++;
            }
            else 
            {
                echo '<td class="black"></td>';
                $value++;
            }
            $row++;
        }
        echo "</tr>";
        $col++;
    }
    ?>
    </table>
</body>
</html>