<?php
$row = $_GET['num_rows'];

$table = "<table border = 1>";

for ($i = 1; $i <= $row; $i++) {
    $table .= "<tr>";
	$table .= "<td>Row: $i </td>";
	$table .= "</tr>";
}

$table .= "</table>";

echo $table;