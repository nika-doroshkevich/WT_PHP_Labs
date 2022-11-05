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

function arrTransformation($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        if (($i + 1) % 3 == 0)
            $arr[$i] = mb_strtoupper($arr[$i]);

        if (iconv_strlen($arr[$i]) >= 3)
            for ($j = 0; $j < iconv_strlen($arr[$i]); $j++)
                if (($j + 1) % 3 == 0)
                    echo "<text style = color:purple>" . ($arr[$i])[$j] . "</text>";
                else
                    echo ($arr[$i])[$j];
        else
            echo $arr[$i];

        echo " ";
    }
}

if (!empty($text)) {
    $textMas = getArr($text);
    arrTransformation($textMas);
}
else echo "Enter data!";