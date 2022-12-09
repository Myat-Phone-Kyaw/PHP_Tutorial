<?php
function diamond($n)
{
    //Triangle
    $space = 6;
    $row = 0;
    while ($row < $n) {
        $col = 0;
        while ($col < $space) {
            echo " &nbsp;";
            $col++;
        }

        $col = 0;
        while ($col <= $row) {
            echo "*";
            $col++;
        }

        echo "<br>";
        $space--;
        $row += 2;
    }

    //Reverse Triangle
    $space = 2;
    $row = $n - 2;
    while ($row > 0) {
        $col = 0;
        while ($col < $space) {
            echo " &nbsp;";
            $col++;
        }

        $col = 0;
        while ($col < $row) {
            echo "*";
            $col++;
        }

        echo "<br>";
        $space++;

        $row -= 2;
    }
}

diamond(11);
?>