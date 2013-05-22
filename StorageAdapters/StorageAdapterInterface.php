<?php
namespace GroundSix\StringComponent\StorageAdapters;

interface StorageAdapterInterface{
	public function containsString();
	public function getString();
	public function getRelatedStrings();
	public function getAllStrings();
}