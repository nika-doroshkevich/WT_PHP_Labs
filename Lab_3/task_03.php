<?php

$data1 = $_POST['Field1'];
$data2 = $_POST['Field2'];
$array1 = array();
$array2 = array();

function getArr($str) {
    $str[iconv_strlen($str)] = " ";
    $word = "";
    $k = 0;
    $arr = [];
    for ($i = 0; $i < iconv_strlen($str); $i++)
        if ($str[$i] != " ")
            $word .= $str[$i];
        else {
            $arr[$k] = $word;
            $k++;
            $word = "";
        }
    return $arr;
}

$array1 = getArr($data1);
$array2 = getArr($data2);
$array3 = $array1;
foreach ($array2 as $value)
    if (!in_array($value, $array1))
        $array3[] = $value;

echo "Result: ";
foreach ($array3 as $value)
    echo "$value ";