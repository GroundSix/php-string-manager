<?php 
namespace GroundSix\StringComponent;

class StringComponent{

	private $storageAdapter;
	private $language;

	public function __construct(){

	}

	public function setStorageAdapter( $storageAdapter )
	{
		$this->storageAdapter = $storageAdapter;
	}

	public function setLanguage( $language )
	{
		$this->language = $language;
	}

	public function getStorageAdapter()
	{
	 	return $this->storageAdapter;
	}

	public function getLanguage()
	{
	 	return $this->language;
	}

}