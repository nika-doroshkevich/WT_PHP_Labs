<?php
$text = $_GET['arg'];
$textMas = [];

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

if (!empty($text)) {
    $textMas = getArr($text);
    for ($i = count($textMas) - 1; $i >= 0; $i--)
        echo "$textMas[$i] ";
}
else echo "Enter data!";