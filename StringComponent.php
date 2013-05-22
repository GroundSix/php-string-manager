<?php 
namespace GroundSix\StringComponent;
use StorageAdapters\StorageAdapterInterface;

class StringComponent implements \arrayaccess{

	private $language;
	private $storageAdapterContainer;

	public function __construct($language,$storageAdapterContainer = null)
	{
		$this->language = $language;
		$this->storageAdapterContainer = (is_null($storageAdapterContainer)) ? new \GroundSix\StringComponent\StorageAdapters\StorageAdapterContainer() : $storageAdapterContainer;
	}

	public function addAdapter(\GroundSix\StringComponent\StorageAdapters\StorageAdapterInterface $storageAdapter, $priority)
	{
		$this->storageAdapterContainer->insert($storageAdapter, $priority);
	}

	public function getString($key, $language = null)
	{
		
		$language = (is_null($language)) ? $this->getLanguage() : $language;
		$storage_adapters = clone $this->storageAdapterContainer;
		while($storage_adapters->valid()){
		 	$storage_adapter = $storage_adapters->current();
		 	if($storage_adapter->containsString($key.'.'.$language) == true){
		 		return $storage_adapter->getString($key.'.'.$language);
		 	} 
			$storage_adapters->next();
		 }
		return false;
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

	public function offsetExists ( $offset ){
		return ($this->getString($offset) !== false) ? true : false;
	}

	public function offsetGet ( $offset ){
		return $this->getString($offset);
	}

	public function offsetSet ( $offset , $value ){
		return null;
	}

	public function offsetUnset ( $offset ){
		return null;
	}
}