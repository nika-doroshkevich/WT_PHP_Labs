<?php
echo "<form method=\"post\" action=\"task_01.php\">";
echo "<label>Link:</label><input type=\"text\" name=\"link\"></label>";
echo "<input type=\"submit\" value=\"Go\">";
echo "</form>";

if ($_POST) {
    $url = $_POST["link"]; //$url = 'https://habr.com/ru/all/';
    $data = file_get_contents($url);

    $images = array();
    preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);
    unset($data);
    $data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);

    foreach ($data as $url) {
        $info = pathinfo($url);
        if (isset($info['extension'])) {
            if (($info['extension'] == 'jpg') ||
                ($info['extension'] == 'jpeg') ||
                ($info['extension'] == 'gif') ||
                ($info['extension'] == 'png'))
                array_push($images, $url);
        }
    }

    //print_r($images);
    $i = '0';
    foreach ($images as $img) {
        if (substr($img, 0, 2) == '//') {
            $img = 'https:' . $img;
        }
        $img_file = file_get_contents($img);

        if (getExtension($img) == 'jpg')
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . "../subfolder/image$i.jpg";
        if (getExtension($img) == 'jpeg')
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . "../subfolder/image$i.jpeg";
        if (getExtension($img) == 'gif')
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . "../subfolder/image$i.gif";
        if (getExtension($img) == 'png')
            $file_loc = $_SERVER['DOCUMENT_ROOT'] . "../subfolder/image$i.png";

        $file_handler = fopen($file_loc, 'w');

        if (fwrite($file_handler, $img_file) == false) {
            echo 'Error';
        }

        fclose($file_handler);
        $i++;
    }
    echo "Done!";
}
function getExtension($fileName) {
    return substr($fileName, strrpos($fileName, '.') + 1);
}