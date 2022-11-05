<?php

require_once('FormBuilder.php');

class SafeFormBuilder extends FormBuilder {
	public function processing() {
		if ($_GET) {
			$text=$_GET['someName'];
			$RadBut=$_GET['RadioButName'];
			$this->addRadioGroup('RadioButName',$RadBut);
		}

		else if ($_POST) {
			$text=$_POST['someName'];
			$RadBut=$_POST['RadioButName'];
			$radButArr[]=$RadBut;
			$this->addRadioGroup('RadioButName',$radButArr);
		}
		
		$this->addTextField('someName',$text);
	}
}

$safeformBuilder=new SafeFormBuilder('post','task_02.php','Run');
$safeformBuilder->processing();
$safeformBuilder->getForm();
