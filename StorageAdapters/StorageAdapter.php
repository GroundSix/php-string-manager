<?php
namespace GroundSix\StringComponent\StorageAdapters;

interface StorageAdapter{
	public function getString();
	public function getRelatedStrings();
	public function getAllStrings();
}