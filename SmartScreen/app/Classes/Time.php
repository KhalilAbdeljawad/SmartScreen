<?php


namespace App\Classes;


class Hour
{
	private $hour;

	public function __construct($time)
	{

		$this->hour = explode(":", $time)[0];
	}

	public function getTags(){

		if ($this->hour >= 5 and $this->hour < 12 ){
			return ['morning'];
		}
		else if ($this->hour >= 12 and $this->hour <= 17 ){
			return ['afternoon'];
		}
		else return ['evening'];

	}

}
