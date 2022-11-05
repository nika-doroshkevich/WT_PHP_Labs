<?php
class Age {
    private DateTime $inputDate;

    public function __construct(DateTime $inputDate) {
        $this->inputDate = $inputDate;
    }

    public function findDifference(string $format = '%Y y. %M m. %D d.'): string {
        $result = date_diff(date_create(), $this->inputDate);
        return $result->format($format) . "<br>";
    }
}

echo "<form method=\"post\" action=\"task_01.php\">";
echo "<input type=\"date\" name=\"Date\">";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST) {
    $Date = new Age(DateTime::createFromFormat('Y-m-d', $_POST['Date']));
    echo $Date->findDifference();
}
