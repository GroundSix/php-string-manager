<?php
namespace GroundSix\StringComponent\StorageAdapters;

class ArrayStorageAdapter implements StorageAdapter{

	private $strings = null;

	public function __construct($strings = array())
	{
		$this->strings = $strings;
	}	

	public function setStrings($strings)
	{
		$this->strings = $strings;
	}

	public function getString()
	{
		
	}
	
	public function getRelatedStrings()
	{

	}
	
	public function getAllStrings()
	{

	}
}