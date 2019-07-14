<?php


namespace App\Classes;


class Temperature
{
	/**
	 * Developed by Khalil Abdeljawad
	 * For Insider PHP Hackathon
	 */

	private $temperature;

	public function __construct($temperature)
	{
		$this->temperature = $temperature;
	}

	public function getTags(){

		if ($this->temperature <= 10 ){
			return ['cold'];
		}
		else if ($this->temperature <= 25 ){
			return ['warm'];
		}
		else return ['hot'];

	}

}
