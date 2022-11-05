<?php
$colour = ['red', 'blue', 'green', 'purple', 'yellow'];

$arr = [
    1, 2, [
        3, 4, [
            5, 6, [
                7, 8, [
                    9, 10, [
                        11, 12, [
                            13, 14
                        ]
                    ]
                ]
            ], 15
        ]
    ], 16, 17, [
        18, 19, [
            20, 21, [
                22, 23, [
                    24, 25, [
                        26, 27
                    ], 28
                ], 29
            ], 30
        ], 31
    ], 32
];

function printArr($arr, $lvl) {
    global $colour;
    if ($lvl < 5)
        echo '<ul style="color: ' . $colour[$lvl] . '">';
    else
        echo '<ul style="color: ' . $colour[4] . '">';
	
    foreach ($arr as $val) {
        if (gettype($val) == 'array')
			printArr($val, $lvl + 1);
        else
            echo '<li>' . $val . '</li>';
    }
    echo '</ul>';
}

printArr($arr, 0);
