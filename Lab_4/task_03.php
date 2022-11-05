<?php

class Logger {
    private string $outputKind;

    public function __construct(bool $output = true, string $fileName = 'task_03.txt') {
        if ($output)
			$this->outputKind = 'Screen';
		else
			$this->outputKind = $fileName;
    }

    public function log(string $message) {
        $msg = date('[D M j G:i:s T Y]') . ' ' . $message;
        if ($this->outputKind == 'Screen')
            echo $msg;
        else {
            file_put_contents($this->outputKind, $msg."\n", FILE_APPEND);
            echo 'The data is recorded.';
        }
    }
}

echo "<form method=\"post\" action=\"task_03.php\">";
echo "<input type=\"radio\" name=\"Choice\" value=\"Screen\"><label for=\"Screen\">Screen</label>";
echo "<input type=\"radio\" name=\"Choice\" value=\"File\"><label for=\"File\">File</label>";
echo "<input type=\"text\" name=\"Msg\" value=\"Your message\">";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST) {
	$flag = false;
	if ($_POST['Choice'] == "Screen")
		$flag=true;
	
	$Logger=new Logger($flag);
	$Logger->log($_POST['Msg']);
}
