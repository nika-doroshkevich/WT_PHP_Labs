<?php
echo "<form method=\"post\" action=\"task_03.php\">";
echo "<input type=\"text\" name=\"login\">";
echo "<input type=\"password\" name=\"pass\">";
echo "<input type=\"submit\" value=\"Go\">";
echo "</form>";

if ($_POST) {
    $login = $_POST["login"];
    $password = $_POST["pass"];

    $mysqli = new mysqli('localhost', 'root', '', 'users');
    $queryResult = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'  AND `password`='$password'");
    $user = $queryResult->fetch_assoc();
    header('Location:task_01.php');
    $mysqli->close();
}
