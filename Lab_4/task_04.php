<?php

class SmartDate {
    private int $inputDate;
    private DateTime $msTime;
    public bool $isWeekend;
    public bool $isLeap;

    public function __construct(DateTime $inputDate)
    {
        $this->inputDate = $inputDate->getTimestamp();
        $this->msTime = $inputDate;

        $temp = date('N', $this->inputDate);
        if ($temp >= 6 && $tempa <= 7)
			$this->isWeekend = true;
		else
			$this->isWeekend = false;
		
        if (date('L', $this->inputDate))
			$this->isLeap = true;
		else
			$this->isLeap = false;
    }
    
    public function findDifference(string $format = '%Y y. %M m. and %D d. difference') : string {
        $result = date_diff($this->msTime, date_create());
        return $result->format($format)."<br>";
    }
}

echo "<form method=\"post\" action=\"task_04.php\">";
echo "<input type=\"date\" name=\"DateTime\" value=\"".date('Y-m-d')."\">";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST){
	$Date=new SmartDate(DateTime::createFromFormat('Y-m-d',$_POST['DateTime']));

	if ($Date->isWeekend)
		echo "This day is a weekend.<br>";
	else
		echo "This day is not a weekend.<br>";

	echo $Date->findDifference();

	if ($Date->isLeap)
		echo "This is a leap year.";
	else
		echo "This is not a leap year.";
}
