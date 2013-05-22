<?php 
namespace GroundSix\StringComponent;
use StorageAdapters\StorageAdapterInterface;

class StringComponent extends \SplPriorityQueue{

	private $language;
	private $storageAdapterContainer;

	public function __construct($storageAdapterContainer = null)
	{
		$this->storageAdapterContainer = (is_null($storageAdapterContainer)) ? new StorageAdapterContainer() : $storageAdapterContainer;
	}

	public function addAdapter(StorageAdapterInterface $storageAdapter, $priority)
	{
		$this->storageAdapterContainer->insert($storageAdapter, $priority);
	}

	public function getString($key)
	{
		$storage_adapters = clone $this->storageAdapterContainer;
		while($storage_adapters->valid()){
			$storage_adapter = $storage_adapters->current();
			if($storage_adapter->containsString($key)){
				return $storage_adapter->getString($key);
			}
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

}