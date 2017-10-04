<?php

class Calculator
{
	protected $input;
	public function __construct($argv)
    {
        $this->input = (isset($argv[2])) ? $argv[2] : 0;
        if(strtolower($argv[1])=="add"){
        	$this->add();
        } elseif (strtolower($argv[1])=="sum") {
        	$this->sum();
        }
    }

    public function sum()
	{
		$result = explode(',',$this->input);
		if(count($result)>2){
			echo "Only two numbers are allowed.";
		} else {
			echo array_sum($result);
		}
	}

	public function add()
	{
		$this->input = stripslashes($this->input);
		$this->input = str_replace("n",',',$this->input);
		$result = explode(',',$this->input);
		//preg_match_all('/-?[0-9]+/', $this->input, $result);
		echo array_sum($result);
	}
}

$callCalc = new Calculator($argv);
