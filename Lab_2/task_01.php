<?php
$arr = $_GET['param'];

for ($i = 0; $i < count($arr); $i++) {
    if (ctype_digit($arr[$i]) == true)
        echo "$arr[$i] - is Integer <br>";
    else
        if (is_numeric($arr[$i]) == true)
            echo "$arr[$i] - is Float <br>";
        else
			echo "$arr[$i] - is String <br>";
}