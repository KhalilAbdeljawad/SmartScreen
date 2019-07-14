<?php


namespace App\Classes;
use App\Classes\Data;
use App\Classes\Time;
class DataConverter
{
	/**
	 * Developed by Khalil Abdeljawad
	 * For Insider PHP Hackathon
	 */

	var  $data;
	public function __construct(Data $data)
	{
		$this->data = $data;
	}

	public function convertData(){

		switch ($this->data->getName()){
			case "time":
				return (new Time($this->data->getValue()))->getTags();

			case "date":
				return (new Date($this->data->getValue()))->getTags();

			case "temperature":
				return (new Temperature($this->data->getValue()))->getTags();

			case "time":
				return (new Time($this->data->getValue()))->getTags();

		}


	}





}
