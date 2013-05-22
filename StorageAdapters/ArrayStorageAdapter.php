<?php
namespace GroundSix\StringComponent\StorageAdapters;

class ArrayStorageAdapter implements \GroundSix\StringComponent\StorageAdapters\StorageAdapterInterface{

	private $strings = null;

	public function __construct($strings = array())
	{
		$this->strings = $strings;
	}	

	public function setStrings($strings)
	{
		$this->strings = $strings;
	}

	public function getString($key, $language = null)
	{
		return $this->strings[$key];
	}
	
	public function getRelatedStrings($search_term, $language = null)
	{
		$result = array();
		foreach($this->strings as $key => $value){
			if(strstr($key, $search_term) !== FALSE){
				$result[] = $value;
			}
		}
		return $result;
	}
	
	public function getAllStrings($language = null)
	{
		return $this->strings;
	}

	public function containsString($key, $language = null)
	{
		return (isset($this->strings[$key]) && !is_null($this->strings[$key])) ? true : false;
	}
}