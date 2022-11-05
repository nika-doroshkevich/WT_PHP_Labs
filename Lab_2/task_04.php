<?php
$num = $_GET['number'];
$sum = 0;

for ($i = 0; $i < strlen($num); $i++)
    $sum += $num[$i];

echo "Sum = {$sum}";