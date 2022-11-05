<?php

class FormBuilder {
	public $METHOD_POST='post';
	private $destination;
	private $method;
	private $TextName;
	private $textField;
	private $submitValue;
	private $radioButName;
	private $radioArr=array();
	
	public function __construct($method, $destination, $submitValue) {
		$this->method=$method;
		$this->destination=$destination;
		$this->submitValue=$submitValue;
	}
	
	public function addRadioGroup($radioButName, $radioArr) {
		$this->radioButName=$radioButName;
		foreach ($radioArr as $value)
			$this->radioArr[]=$value;
	}
	
	public function addTextField($TextName, $textField) {
		$this->TextName=$TextName;
		$this->textField=$textField;
	}

	public function getForm() { 
		echo "<form method=\"".$this->method."\" action=\"".$this->destination."\">";
		echo "<input type=\"text\" name=\"".$this->TextName."\" value=\"".$this->textField."\">";
		foreach ($this->radioArr as $value)
			echo "<input type=\"radio\" name=\"".$this->radioButName."\" value=\"".$value."\"><label for=\"".$value."\">".$value."</label>";
	
	echo "<input type=\"submit\" value=\"".$this->submitValue."\">";
	echo "</form>";
	}
}
