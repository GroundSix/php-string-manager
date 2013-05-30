<?php
namespace GroundSix\StringComponent\StorageAdapters;

class YamlStorageAdapter implements \GroundSix\StringComponent\StorageAdapters\StorageAdapterInterface{

	private $strings = null;
	private $yaml = null;

	public function __construct($yaml_file_path)
	{
		$this->yaml = new \Symfony\Component\Yaml\Parser();
        $this->setStrings($yaml_file_path);
	}	

	public function setStrings($yaml_file_path)
	{
		if(!is_null($yaml_file_path) && file_exists($yaml_file_path)){
            $this->strings = $this->yaml->parse(file_get_contents($yaml_file_path));
		}
	}

	public function getString($key)
	{
		return $this->strings[$key];
	}
	
	public function getRelatedStrings($search_term)
	{
		$result = array();
		foreach($this->strings as $key => $value){
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

	public function containsString($key)
	{
		return (isset($this->strings[$key]) && !is_null($this->strings[$key])) ? true : false;
	}
}