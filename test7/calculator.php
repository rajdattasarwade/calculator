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
		$numbers = $this->count_negatives($result);
		if(isset($numbers['negative']) && count($numbers['negative'])>0){
			echo "Negative numbers [".implode(",", $numbers['negative'])."] not allowed.";
		} else {
			echo array_sum($numbers['positive']);
		}
	}

	public function count_negatives(array $array) 
	{
	    $i = 0;
	    $numbers = array();
	    foreach ($array as $x){
	        if ($x < 0){
	        	$numbers['negative'][] = $x;
        	} else {
        		if($x<=1000){
	        		$numbers['positive'][] = $x;
	        	}
	        }
        	$i++;
	    }
	    return $numbers;
	}
}

$callCalc = new Calculator($argv);
