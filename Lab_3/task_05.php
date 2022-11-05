<?php

$arr = [1.643, "qwerty", [3, 4.6723, [5.5645, "adcd", 15.7845]], 16, 17.067, [18.5667, 19, "cat"], 32];

function arrTransformation($arr, $lvl) {
    echo '<ul>';
    foreach ($arr as $val)
        if (gettype($val) != 'array') {
            if (gettype($val) === 'integer')
                $val *= 2;
            if (gettype($val) === 'double')
                $val = round($val, 2);
            if (gettype($val) === 'string')
                $val = strtoupper($val);
            echo '<li>' . $val . '</li>';
        } else
            arrTransformation($val, $lvl + 1);

    echo '</ul>';
}

arrTransformation($arr, 0);