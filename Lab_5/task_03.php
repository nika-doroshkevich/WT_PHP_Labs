<?php

class ChangeArray {
    public function __construct() {
    }

	private function changePrep(array $arr): array {
        $mas = [];
        foreach ($arr as $val) {
            if (is_array($val)) {
                $mas = array_merge($mas, $this->changePrep($val));
            } 
			else {
                $mas[] = $val;
            }
        }
        return $mas;
    }

    public function change(array $arr): array {
        $mas = $this->changePrep($arr);
        foreach ($mas as $key => $val) {
            foreach ($mas as $key2 => $val2)
                if ($val === $val2 && $key != $key2)
                    unset($mas[$key]);
        }
        return $mas;
    } 
}

$arr = [1, 1, 1, 2,1,[1,3,4,4,[1,2,3,5,6]],7];

$newArr = new ChangeArray();
echo implode(" ", $newArr->change($arr));