<?php
class icg{
	protected $_name = null;
	public function __contruct($name)
	{
		$this->_name = $name;
		return $this->_name;
	}

}