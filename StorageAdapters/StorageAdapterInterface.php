<?php
namespace GroundSix\StringComponent\StorageAdapters;

interface StorageAdapterInterface{
	public function containsString($key,$language);
	public function getString($key,$language);
	public function getRelatedStrings($key,$language);
	public function getAllStrings($language);
}