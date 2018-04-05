<?php

class 	Vertex {

	private	$_x;
	private	$_y;
	private	$_z;
	private	$_w = 1.0;
	private	$_color;

	public	static	$verbose = FALSE;

	function	__construct(array $vertex) {
		if (isset($vertex['x']) && isset($vertex['y']) && isset($vertex['z'])) {
			if (!isset($vertex['color']))
				$this->setColor(new Color(["rgb" => 0xFFFFFF]));
			else
				$this->setColor($vertex['color']);
			$this->setX($vertex['x']);
			$this->setY($vertex['y']);
			$this->setZ($vertex['z']);
			if (isset($vertex['w']))
				$this->setW($vertex['w']);
		}
		if (self::$verbose)
			print($this . " constructed" . PHP_EOL);
	}

	function	__toString() {
		$vertex = vsprintf("Vertex( x: %4.2f, y: %4.2f, z:%4.2f, w:%4.2f",
		array ($this->getX(), $this->getY(), $this->getZ(), $this->getW()));
		if (!self::$verbose)
			return $vertex . " )";
		else
			return $vertex . ", " . $this->_color . " )";
	}

	function	__destruct() {
		if (self::$verbose)
			print($this . " destructed" . PHP_EOL);
	}

	static	function	doc() {
		return file_get_contents("Vertex.doc.txt");
	}

	function	setX($x) {
		$this->_x = floatval($x);
	}

	function	getX() {
		return ($this->_x);
	}

	function	setY($y) {
		$this->_y = floatval($y);
	}

	function	getY() {
		return ($this->_y);
	}

	function	setZ($z) {
		$this->_z = floatval($z);
	}

	function	getZ() {
		return ($this->_z);
	}

	function	setW($w) {
		$this->_w = floatval($w);
	}

	function	getW() {
		return ($this->_w);
	}

	function setColor(Color $color) {
		$this->_color = $color;
	}

	function	getColor() {
		return $this->_color;
	}
}

?>
