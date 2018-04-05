<?php

class 	Vector {

		private	$_x;
		private	$_y;
		private	$_z;
		private	$_w = 0.0;

		public	static	$verbose = FALSE;

		function	__construct(array $vector) {
			if (isset($vector['dest']))
			{
				if (!isset($vector['orig']))
					$vector['orig'] = new Vertex(array ('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
				$this->_x = $vector['dest']->getX() - $vector['orig']->getX();
				$this->_y = $vector['dest']->getY() - $vector['orig']->getY();
				$this->_z = $vector['dest']->getZ() - $vector['orig']->getZ();
			}
			if (self::$verbose)
				print($this . " constructed" . PHP_EOL);
		}

		function	__toString() {
			$vector = vsprintf("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f",
			array ($this->getX(), $this->getY(), $this->getZ(), $this->getW()));
			return $vector . " )";
		}

		function	__destruct() {
			if (self::$verbose)
				print($this . " destructed" . PHP_EOL);
		}

		static	function	doc() {
			return file_get_contents("Vector.doc.txt");
		}

		function	magnitude() {
			return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
		}

		function	normalize() {
			$magnitude = $this->magnitude();
			return new Vector(array("dest" => new Vertex(array('x' => $this->getX() / $magnitude,
			'y' => $this->getY() / $magnitude, 'z' => $this->getZ() / $magnitude))));
		}

		function	add(Vector $rhs) {
			return new Vector(array("dest" => new Vertex(array('x' => $this->getX() + $rhs->getX(),
			'y' => $this->getY() + $rhs->getY(), 'z' => $this->getZ() + $rhs->getZ()))));
		}

		function	sub(Vector $rhs) {
			return new Vector(array("dest" => new Vertex(array('x' => $this->getX() - $rhs->getX(),
			'y' => $this->getY() - $rhs->getY(), 'z' => $this->getZ() - $rhs->getZ()))));
		}
		function opposite() {
				return new Vector(array("dest" => new Vertex(array('x' => $this->getX() * -1,
			'y' => $this->getY() * -1, 'z' => $this->getZ() * -1))));
		}

		function scalarProduct($k) {
				return new Vector(array("dest" => new Vertex(array('x' => $this->getX() * $k,
			'y' => $this->getY() * $k, 'z' => $this->getZ() * $k))));
		}

		function	dotProduct(Vector $rhs) {
			return $this->getX() * $rhs->getX() + $this->getY() * $rhs->getY() +
			 $this->getZ() * $rhs->getZ();
		}

		function	cos(Vector $rhs) {
			return $this->dotProduct($rhs) / (($this->magnitude() * $rhs->magnitude()));
		}

		function crossProduct(Vector $rhs){
			return new Vector(array("dest" => new Vertex(array (
			'x' => $this->getY() * $rhs->getZ() - $this->getZ() * $rhs->getY(),
			'y' => $this->getZ() * $rhs->getX() - $this->getX() * $rhs->getZ(),
			'z' => $this->getX() * $rhs->getY() - $this->getY() * $rhs->getX()
		))));
		}

		function	getX() {
			return ($this->_x);
		}

		function	getY() {
			return ($this->_y);
		}

		function	getZ() {
			return ($this->_z);
		}

		function	getW() {
			return ($this->_w);
		}

}

?>
