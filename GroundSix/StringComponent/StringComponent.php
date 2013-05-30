<?php 
namespace GroundSix\StringComponent;
use StorageAdapters\StorageAdapterInterface;

class StringComponent implements \arrayaccess{

	private $renderer;
	private $storageAdapterContainer;

	public function __construct($renderer,$language,$storageAdapterContainer = null)
	{
		$this->renderer = $renderer;
		$this->language = $language;
		$this->storageAdapterContainer = (is_null($storageAdapterContainer)) ? new \GroundSix\StringComponent\StorageAdapters\StorageAdapterContainer() : $storageAdapterContainer;
	}

	public function addAdapter(\GroundSix\StringComponent\StorageAdapters\StorageAdapterInterface $storageAdapter, $priority)
	{
		$this->storageAdapterContainer->insert($storageAdapter, $priority);
	}

	public function getString($key, $model = array(), $language = null)
	{
		$language = (is_null($language)) ? $this->getLanguage() : $language;
		$key = $key.'.'.$language;
		$storage_adapter = $this->getStorageAdapterFromQueue($key);

		if($storage_adapter == false){
			return false;
		}

		$string = $storage_adapter->getString($key);
		return $this->renderString($string, $model);
	}

	public function getRelatedStrings($key, $language = null)
	{
		$language = (is_null($language)) ? $this->getLanguage() : $language;
		$key = $key.'.'.$language;
		$storage_adapter = $this->getStorageAdapterFromQueue($key);
		return ($storage_adapter !== false) ? $storage_adapter->getRelatedStrings($key) : array();
	}	

	private function getStorageAdapterFromQueue($key)
	{
		$storage_adapters = clone $this->storageAdapterContainer;
		while($storage_adapters->valid()){
		 	$storage_adapter = $storage_adapters->current();
		 	if($storage_adapter->containsString($key) == true){
		 		return $storage_adapter;
		 	} 
			$storage_adapters->next();
		 }
		 return false;
	}

	private function renderString($string,$model)
	{
		return $this->renderer->render($string,$model);
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

	public function offsetExists ( $offset )
	{
		return ($this->getString($offset) !== false) ? true : false;
	}

	public function offsetGet ( $offset )
	{
		return $this->getString($offset);
	}

	public function offsetSet ( $offset , $value )
	{
		return null;
	}

	public function offsetUnset ( $offset )
	{
		return null;
	}
}