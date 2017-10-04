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

		$delimiters = array(";");
		$this->input = stripslashes($this->input);
		$this->input = str_replace("\\",'',$this->input);
		$this->input = str_replace($delimiters,',',$this->input);
		$result = explode(',',$this->input);
		echo array_sum($result);
	}
	
}

$callCalc = new Calculator($argv);
