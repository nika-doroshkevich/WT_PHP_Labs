<?php
echo "<form method=\"post\" action=\"task_02.php\">";
echo "<input type=\"text\" name=\"login\">";
echo "<input type=\"password\" name=\"pass\">";
echo "<input type=\"submit\" value=\"Go\">";
echo "</form>";

if ($_POST) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    $file = fopen("logins.txt", "r");

    while (!feof($file)) {
        $data = explode(',', fgets($file, 100));
        if($data[0] == $login && $data[1] == $password) {
            header('Location:task_01.php');
            exit;
        }
    }
    echo "Invalid username or password!";
    fclose($file);
}