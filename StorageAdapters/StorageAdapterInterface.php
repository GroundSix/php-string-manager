<?php
namespace GroundSix\StringComponent\StorageAdapters;

interface StorageAdapterInterface{
	public function containsString($key);
	public function getString($key);
	public function getRelatedStrings($key);
	public function getAllStrings();
}