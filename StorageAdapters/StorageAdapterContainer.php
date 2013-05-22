<?php
namespace GroundSix\StringComponent\StorageAdapters;

class StorageAdapterContainer extends \SplPriorityQueue{

	public function insert(\GroundSix\StringComponent\StorageAdapters\StorageAdapterInterface $storageAdapter, $priority)
	{
		parent::insert($storageAdapter, $priority);
	}
}