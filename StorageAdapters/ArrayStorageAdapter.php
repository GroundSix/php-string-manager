<?php
namespace GroundSix\StringComponent\StorageAdapters;

class ArrayStorageAdapter implements StorageAdapterInterface{

	private $strings = null;

	public function __construct($strings = array())
	{
		$this->strings = $strings;
	}	

	public function setStrings($strings)
	{
		$this->strings = $strings;
	}

	public function getString($key)
	{
		return $this->strings[$key];
	}
	
	public function getRelatedStrings($search_term)
	{
		$result = array();
		for($this->strings as $key => $value){
			if(strstr($key, $search_term) !== FALSE){
				$result[] = $value;
			}
		}
		return $result;
	}
	
	public function getAllStrings()
	{
		return $this->strings;
	}
}