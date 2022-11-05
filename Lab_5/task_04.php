<?php
class LettersCounter {
    public string $inputStr;

    public function __construct(string $inputStr) {
        $this->inputStr = $inputStr;
    }

    public function countLetters(): array {
        $arr = [];
        foreach (str_split($this->inputStr) as $symbol) {
            if (ctype_alpha($symbol))
                if (key_exists($symbol, $arr))
					$arr[$symbol]++;
                else $arr[$symbol] = 1;
        }
        return $arr;
    }
}

echo "<form method=\"post\" action=\"task_04.php\">";
echo "<input type=\"text\" name=\"inputStr\">";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST) {
	$Letters = new LettersCounter($_POST["inputStr"]);

	$array = $Letters->countLetters();
	foreach ($array as $val => $row){
		echo "Count of ($val) = $row <br>";
}
}
