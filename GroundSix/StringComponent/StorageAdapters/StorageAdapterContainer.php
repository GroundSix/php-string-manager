<?php
namespace GroundSix\StringComponent\StorageAdapters;

class StorageAdapterContainer extends \SplPriorityQueue{

	public function insert($storageAdapter, $priority)
	{
		parent::insert($storageAdapter, $priority);
	}
}