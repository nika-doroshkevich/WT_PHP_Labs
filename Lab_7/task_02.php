<?php

echo "<form method=\"post\" action=\"task_02.php\">";
echo "<input type=\"text\" name=\"url\" value=\"\">";
echo "<input type=\"submit\" value=\"Send\">";
echo "</form>";

if ($_POST) {
    $url = $_POST["url"];
    $dom = new DOMDocument();
    $content = file_get_contents($url);
    @$dom->loadHTML($content);
    $xpath = new DOMXPath($dom);
    $elem = $dom->getElementById('content')->getElementsByTagName('ul')[0]->getElementsByTagName('a');
    $urls = parse_url($url);
    $categories = [];
    for ($i = 0; $i < $elem->length; $i++) {
        $href = $elem->item($i);
        $path = $href->getAttribute('href');
        array_push($categories, $path);
    }

    foreach ($categories as $category) {
        $path = dirname(__FILE__) . '/pics2' . $category;
        $external = true;
        $url = $urls['scheme'] . '://' . $urls['host'] . $category;
        $html = file_get_contents($url);
        preg_match_all('/<img.*?src=["\'](.*?)["\'].*?>/i', $html, $images, PREG_SET_ORDER);

        $url = parse_url($url);
        $path = rtrim($path, '/');

        foreach ($images as $image) {
            if (strpos($image[1], 'data:image/') !== false) {
                continue;
            }

            if (substr($image[1], 0, 2) == '//') {
                $image[1] = 'http:' . $image[1];
            }

            $ext = strtolower(substr(strrchr($image[1], '.'), 1));

            if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                $img = parse_url($image[1]);


                if (is_file($path . $img['path'])) {
                    continue;
                }

                $path_img = $path . '/' . dirname($img['path']);
                if (!is_dir($path_img)) {
                    mkdir($path_img, 0777, true);
                }

                if (!empty($img['host']) && !empty($img['path'])) {

                    copy($url['scheme'] . '://' . $url['host'] . $img['path'], $path . $img['path']);
                } elseif ($external || ($external == false && $img['host'] == $url['host'])) {
                    copy($image[1], $path . $img['path']);
                }
            }
        }
        echo $category . ' Is downloaded!<br>';
    }
}
