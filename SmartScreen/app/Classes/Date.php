<?php


namespace App\Classes;


class Date
{
	/**
	 * Developed by Khalil Abdeljawad
	 * For Insider PHP Hackathon
	 */
	private $date;

	public function __construct($date)
	{
		$this->date = $date;
	}

	public function getTags(){

		if($this->getDayOfWeek($this->date)==null)
			return [$this->getSeason($this->date)];
		else
			return [$this->getDayOfWeek($this->date), $this->getSeason($this->date)];

	}

	function getDayOfWeek($date){
		$dayOfWeek = date("l", strtotime($date));
		if($dayOfWeek == 'Saturday' or $dayOfWeek == 'Sunday')
			return "weekend";
		return null;
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
