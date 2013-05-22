<?php 
namespace GroundSix\StringComponent;
use StorageAdapters\StorageAdapterInterface;

class StringComponent extends \SplPriorityQueue{

	private $language;

	public function __construct()
	{

	}

	public function addAdapter(StorageAdapterInterface $storageAdapter, $priority)
	{
		parent::insert($storageAdapter, $priority);
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