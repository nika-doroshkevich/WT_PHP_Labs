<?php
$words = $_GET['word'];

$maxW = $words[0];
for ($i = 0; $i < count($words); $i++)
    if(strlen($words[$i]) > strlen($maxW))
        $maxW = $words[$i];
echo $maxW;