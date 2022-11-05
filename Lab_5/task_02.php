<?php

class DirectorySize {
	
    public function __construct() {
    }

    public function countSize(string $directory, bool $incl): int
    {
		$size = 0;
        $content = scandir($directory);
        foreach ($content as $val) {
            if ($val !== '.' && $val !== '..') {
         
          
                if (is_dir($directory . '//' . $val)) {
                
                    if ($incl) $size += $this->countSize($directory . '//' . $val, true);
                
                } 
				else {
                    $size += filesize($directory . '//' . $val);
                    
                }
            }
        }
        return $size;
    }
}

echo "<form method=\"post\" action=\"task_02.php\">";
echo "<input type=\"text\" name=\"directory\">";
echo "<input type=\"submit\" value=\"Run\">";
echo "</form>";

if ($_POST){
	$SizeCheck=new DirectorySize();

	print_r(scandir($_POST["directory"]));
	echo "Directory size: ";
	echo $SizeCheck->countSize($_POST["directory"], true);
}
