<?php


namespace App\Classes;


class Data
{
	/**
	 * Developed by Khalil Abdeljawad
	 * For Insider PHP Hackathon
	 */

	private $name;
	private $value;

	public function __construct($rawData){

		$obj = json_decode($rawData);
		$this->name = $obj->name;
		$this->value = $obj->value;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value): void
	{
		$this->value = $value;
	}




}
