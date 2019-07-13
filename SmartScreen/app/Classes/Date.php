<?php


namespace App\Classes;


class Date
{
	private $date;

	public function __construct($date)
	{
		$this->date = $date;
	}

	public function getTags(){

		return [$this->getDayOfWeek($this->date), $this->getSeason($this->date)];

	}

	function getDayOfWeek($date){
		$dayOfWeek = date("l", strtotime($date));
		return $dayOfWeek;
	}

	function getSeason($date){
		$month = (int) explode("-", $date)[1];
		if($month >= 3 and $month<= 5)
			return "spring";
		else if($month >= 6 and $month<= 8)
			return "summer";
		else if($month >= 9 and $month<= 11)
			return "autumn";
		else if($month >= 12 and $month<= 2)
			return "winter";
	}

}
