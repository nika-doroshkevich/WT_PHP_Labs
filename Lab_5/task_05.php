<?php

echo "<form method=\"post\" action=\"task_05.php\">";
echo "<input type=\"text\" name=\"username\">";
echo "<input type=\"text\" name=\"login\">";
echo "<input type=\"password\" name=\"pass\">";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST) {
	$mysqli = new mysqli($_POST["username"], $_POST["login"], $_POST["pass"]);

	if (mysqli_connect_errno()) {
		echo "Error: ";
		echo mysqli_connect_error();
		exit();
	}
	echo "MySQL version: $mysqli->server_info";
	$mysqli->close();
}

