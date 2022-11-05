<?php
$towns = $_GET['arg'];
$uniqueTowns = [];
$k = 0;

function checkArr($arr, $str)
{
    for ($i = 0; $i < count($arr); $i++)
        if (strcasecmp($arr[$i], $str) == 0) {
            return true;
        }
    return false;
}

if (!empty($towns)) {
    for ($i = 0; $i < count($towns); $i++)
        if (!checkArr($uniqueTowns, $towns[$i])) {
            $uniqueTowns[$k] = $towns[$i];
            $k++;
        }

    sort($uniqueTowns);
    for ($i = 0; $i < count($uniqueTowns); $i++) {
        echo "$uniqueTowns[$i] <br>";
    }
}
else echo "Enter data!";

