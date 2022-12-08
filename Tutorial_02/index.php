<?php
function diamond($n)
{
    $space = 6;
    $forSpace = 0;
    while ($forSpace < $n) {
        $forStar = 0;
        while ($forStar < $space) {
            echo " &nbsp;";
            $forStar++;
        }

        $forStar = 0;
        while ($forStar <= $forSpace) {
            echo "*";
            $forStar++;
        }

        echo "<br>";
        $space--;
        $forSpace += 2;
    }

    //Reverse
    $space = 2;
    $forSpace = $n - 2;
    while ($forSpace > 0) {
        $forStar = 0;
        while ($forStar < $space) {
            echo " &nbsp;";
            $forStar++;
        }

        $forStar = 0;
        while ($forStar < $forSpace) {
            echo "*";
            $forStar++;
        }

        echo "<br>";
        $space++;

        $forSpace -= 2;
    }
}

diamond(11);
?>